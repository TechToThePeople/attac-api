<?php

function _civicrm_api3_attac_adhere_spec(&$spec) {
  $spec['contact_id'] = array(
        'title' => 'Contact ID',
    'api.required' => 1,
        );
  $spec['amount'] = array(
        'title' => 'Membership amount',
    'type' => CRM_Utils_Type::T_INT,
    'api.required' => 1,
  );
}
/**
 * Attac adhere API
 *
 * @param array $params
 * @return array API result descriptor
 * @see civicrm_api3_create_success
 * @see civicrm_api3_create_error
 * @throws API_Exception
 */
function civicrm_api3_attac_adhere($params) {
  console.log($params);
}
