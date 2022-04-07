<?php

function _civicrm_api3_attac_adhere_spec(&$spec)
{
    $spec["contact_id"] = [
        "title" => "Contact ID",
        "api.required" => 1,
    ];
    $spec["amount"] = [
        "title" => "Membership amount",
        "type" => CRM_Utils_Type::T_INT,
        "api.required" => 1,
    ];
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
function civicrm_api3_attac_membership($params)
{
    print_r($params);
    // todo read the memberships
    if ($params["amount"] < 13) {
        return civicrm_api3_create_error("minimum amount 13", [
            "amount" => $params["amount"],
        ]);
    }
    //    return error...

    $tx = new CRM_Core_Transaction();
    try {
        $subscriptionContribution = civicrm_api3("contribution", "create", [
            "financial_type_id" => 5,
            "contact_id" => $params["contact_id"],
            "total_amount" => 12,
        ]);

        $contribution = civicrm_api3("contribution", "create", [
            "financial_type_id" => 2,
            "contact_id" => $params["contact_id"],
            "total_amount" => $params["amount"] - 12,
        ]);

        $membership = civicrm_api3("membership", "create", [
            "membership_type_id" => 1,
            "contact_id" => $params["contact_id"],
        ]);
        $subscription = civicrm_api3("membership", "create", [
            "membership_type_id" => 2,
            "contact_id" => $params["contact_id"],
        ]);

        $membershipPayment = civicrm_api3("MembershipPayment", "create", [
            "membership_id" => $subscription["id"],
            "contribution_id" => $subscriptionContribution["id"],
        ]);
        $subscriptionPayment = civicrm_api3("MembershipPayment", "create", [
            "membership_id" => $membership["id"],
            "contribution_id" => $contribution["id"],
        ]);
    } catch (Exception $e) {
        print_r($e);
        $tx->rollback();
        return civicrm_api3_create_error("Error creating the attac membership");
    }
    $tx->commit();
    $result = [
        "donation" => $contribution,
        "subscription" => $subscriptionContribution,
    ];
    return civicrm_api3_create_success($result, $params, "Attac", "membership");

    return civicrm_api3_create_success("Error creating the attac membership");

    //rule: the amount is split between two or 3 items:
    // "ligne attac" (publication): 12€ financialType=5
    // membership (amount-12€) financialType=2
    //to clarify: what is the rule to split between a donation and membership?
}
