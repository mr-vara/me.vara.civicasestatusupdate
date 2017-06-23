<?php

require_once 'civicasestatusupdate.civix.php';

function civicasestatusupdate_civicrm_alterContent( &$content, $context, $tplName, &$object ) {
	if($context == "page"){
if(($tplName == "CRM\Case\Page\DashBoard.tpl")||($tplName == "CRM/Case/Page/DashBoard.tpl")){
			$content = str_replace('</td><td class="crm-case-case_type">','&nbsp;&nbsp;<a class="action-item crm-hover-button" href="index.php?q=civicrm/civicasestatusupdate?cid=203&amp;caseid=1&amp;action=update&amp;id=777" title="Edit activity"><i class="crm-i fa-pencil"></i></a></td><td class="crm-case-case_type">',$content);
		}
	}		
}

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function civicasestatusupdate_civicrm_config(&$config) {
  _civicasestatusupdate_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function civicasestatusupdate_civicrm_xmlMenu(&$files) {
  _civicasestatusupdate_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function civicasestatusupdate_civicrm_install() {
  _civicasestatusupdate_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function civicasestatusupdate_civicrm_postInstall() {
  _civicasestatusupdate_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function civicasestatusupdate_civicrm_uninstall() {
  _civicasestatusupdate_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function civicasestatusupdate_civicrm_enable() {
  _civicasestatusupdate_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function civicasestatusupdate_civicrm_disable() {
  _civicasestatusupdate_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function civicasestatusupdate_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _civicasestatusupdate_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function civicasestatusupdate_civicrm_managed(&$entities) {
  _civicasestatusupdate_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function civicasestatusupdate_civicrm_caseTypes(&$caseTypes) {
  _civicasestatusupdate_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function civicasestatusupdate_civicrm_angularModules(&$angularModules) {
  _civicasestatusupdate_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function civicasestatusupdate_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _civicasestatusupdate_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function civicasestatusupdate_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function civicasestatusupdate_civicrm_navigationMenu(&$menu) {
  _civicasestatusupdate_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'me.vara.civicasestatusupdate')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _civicasestatusupdate_civix_navigationMenu($menu);
} // */
