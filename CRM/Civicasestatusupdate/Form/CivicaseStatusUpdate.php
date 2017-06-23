<?php

/**
 * Form controller class
 *
 * @see https://wiki.civicrm.org/confluence/display/CRMDOC/QuickForm+Reference
 */
class CRM_Civicasestatusupdate_Form_CivicaseStatusUpdate extends CRM_Core_Form {
  public function buildQuickForm() {

  $caseid = $_GET['caseid'];
    $this->add(
      'select', 
      'case_status',
      'Case Status',
      $this->getStatusOptions() 
    );

    $this->add(
      'hidden',
      'case_status2',
      'Case Status2'
    );	
	
    $defaults['case_status2'] = $caseid;
    $this->setDefaults($defaults);
    $this->addButtons(array(
      array(
        'type' => 'submit',
        'name' => ts('Submit'),
        'isDefault' => TRUE,
      ),
    ));
	
    $this->assign('elementNames', $this->getRenderableElementNames());
    parent::buildQuickForm();
	
  }

  public function postProcess() {
    $values = $this->exportValues();
	$query2 = "UPDATE civicrm_case SET status_id = ".$values['case_status']." WHERE id=".$values['case_status2'];
	CRM_Core_DAO::executeQuery($query2);	
	
    CRM_Core_Session::setStatus(ts('Status Changed'));
    parent::postProcess();
  }

public function getStatusOptions() {
	$query = "SELECT value, label FROM civicrm_option_value WHERE option_group_id = 28";
	$result = CRM_Core_DAO::executeQuery($query);
	while ($result->fetch()) {
		$options[$result->value] = $result->label;
	}
    return $options;
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
