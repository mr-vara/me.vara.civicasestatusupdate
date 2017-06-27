<?php

/**
 * Form controller class
 *
 * @see https://wiki.civicrm.org/confluence/display/CRMDOC/QuickForm+Reference
 */
class CRM_Civicasestatusupdate_Form_CivicaseStatusUpdate extends CRM_Core_Form {
  public function buildQuickForm() {

    $this->set('caseid', (int) $_GET['caseid']);
    $this->add(
      'select', 
      'case_status',
      'Case Status',
      $this->getStatusOptions($this->get('caseid')) 
    );

    $this->addButtons(array(
      array(
        'type' => 'submit',
        'name' => ts('Submit'),
        'isDefault' => TRUE,
      ),
    ));
	
    $this->assign('elementNames', $this->getRenderableElementNames());
  }

  public function postProcess() {
    $values = $this->exportValues();

    $statusOptions = $this->getStatusOptions();
    $case = civicrm_api3('Case', 'getsingle', array('id' => $this->get('caseid'), 'return' => 'status_id'));

    $message = ts('Case status changed from %1 to %2', array(
      1 => $statusOptions[$case['case_type_id']],
      2 => $statusOptions[$values['case_status']])
    );

    civicrm_api3('Case', 'create', array('id' => $this->get('caseid'), 'status_id' => $values['case_status']));
    civicrm_api3('Activity', 'create', array(
      'case_id' => $this->get('caseid'),
      'activity_type_id' => 'Change Case Status',
      'status_id' => 'Completed',
      'subject' => $message,
    ));

    CRM_Core_Session::setStatus($message, ts('Saved'), 'success');
  }

  public function getStatusOptions($caseId = NULL) {
    $params = array('field' => 'status_id');
    if ($caseId) {
      // Pass case type to getoptions api so appropriate options are returned
      $case = civicrm_api3('Case', 'getsingle', array('id' => $caseId, 'return' => 'case_type_id'));
      $params['case_type_id'] = $case['case_type_id'];
    }
    $result = civicrm_api3('Case', 'getoptions', $params);
    return $result['values'];
  }

   /**
   * Get the fields/elements defined in this form.
   *
   * @return array (string)
   */
  public function getRenderableElementNames() {
    // The _elements list includes some items which should not be
    // auto-rendered in the loop -- such as "qfKey" and "buttons".  These
    // items don't have labels.  We'll identify renderable by filtering on
    // the 'label'.
    $elementNames = array();
    foreach ($this->_elements as $element) {
      /** @var HTML_QuickForm_Element $element */
      $label = $element->getLabel();
      if (!empty($label)) {
        $elementNames[] = $element->getName();
      }
    }
    return $elementNames;
  }

}
