<?php

function _civicrm_api3_attac_start_donation_spec(&$spec)
{
    $spec["first_name"] = [
        "name" => "first_name",
        "title" => ts("First name"),
        "description" => ts("First name"),
        "type" => CRM_Utils_Type::T_STRING,
        "api.required" => 0,
        "api.default" => "",
    ];
    $spec["last_name"] = [
        "name" => "last_name",
        "title" => ts("Last name"),
        "description" => ts("Last name"),
        "type" => CRM_Utils_Type::T_STRING,
        "api.required" => 0,
        "api.default" => "",
    ];
    $spec["email"] = [
        "name" => "email",
        "title" => ts("E-mail"),
        "description" => ts("E-mail"),
        "type" => CRM_Utils_Type::T_STRING,
        "api.required" => 0,
        "api.default" => "",
    ];
    $spec["postal_code"] = [
        "name" => "postal_code",
        "title" => ts("Postal code"),
        "description" => ts("Postal code"),
        "type" => CRM_Utils_Type::T_STRING,
        "api.required" => 0,
        "api.default" => "",
    ];
    $spec["country"] = [
        "name" => "country",
        "title" => ts("Country"),
        "description" => "Country ISO code",
        "type" => CRM_Utils_Type::T_STRING,
        "api.required" => 0,
        "api.default" => "",
    ];
    $spec["phone"] = [
        "name" => "phone",
        "title" => ts("Phone"),
        "description" => "Phone",
        "type" => CRM_Utils_Type::T_STRING,
        "api.required" => 0,
        "api.default" => "",
    ];
    $spec["transaction_idx"] = [
        "name" => "transaction_idx",
        "title" => ts("Donation external identifier"),
        "description" => "Unique identifier",
        "type" => CRM_Utils_Type::T_STRING,
        "api.default" => "",
    ];
    $spec["campaign_id"] = [
        "name" => "campaign_id",
        "title" => ts("Campaign External ID"),
        "description" => "Unique campaign id",
        "type" => CRM_Utils_Type::T_INT,
        "api.default" => "",
    ];
    $spec["amount"] = [
        "title" => "Membership amount",
        "type" => CRM_Utils_Type::T_INT,
        "api.required" => 1,
    ];
}
function civicrm_api3_attac_start_donation($params)
{
    $params["action_name"] = "text xavier";
}

function _civicrm_api3_attac_create_member_spec(&$spec)
{
    $spec["first_name"] = [
        "name" => "first_name",
        "title" => ts("First name"),
        "description" => ts("First name"),
        "type" => CRM_Utils_Type::T_STRING,
        "api.required" => 0,
        "api.default" => "",
    ];
    $spec["last_name"] = [
        "name" => "last_name",
        "title" => ts("Last name"),
        "description" => ts("Last name"),
        "type" => CRM_Utils_Type::T_STRING,
        "api.required" => 0,
        "api.default" => "",
    ];
    $spec["email"] = [
        "name" => "email",
        "title" => ts("E-mail"),
        "description" => ts("E-mail"),
        "type" => CRM_Utils_Type::T_STRING,
        "api.required" => 0,
        "api.default" => "",
    ];
    $spec["postal_code"] = [
        "name" => "postal_code",
        "title" => ts("Postal code"),
        "description" => ts("Postal code"),
        "type" => CRM_Utils_Type::T_STRING,
        "api.required" => 0,
        "api.default" => "",
    ];
    $spec["country"] = [
        "name" => "country",
        "title" => ts("Country"),
        "description" => "Country ISO code",
        "type" => CRM_Utils_Type::T_STRING,
        "api.required" => 0,
        "api.default" => "",
    ];
    $spec["street_address"] = [
        "name" => "street_address",
        "title" => ts("Street address"),
        "description" => "10, rue de la paix",
        "type" => CRM_Utils_Type::T_STRING,
        "api.required" => 0,
    ];

    $spec["phone"] = [
        "name" => "phone",
        "title" => ts("Phone"),
        "description" => "Phone",
        "type" => CRM_Utils_Type::T_STRING,
        "api.required" => 0,
        "api.default" => "",
    ];
    $spec["external_identifier"] = [
        "name" => "external_identifier",
        "title" => ts("External identifier"),
        "description" => "Unique contactRef",
        "type" => CRM_Utils_Type::T_STRING,
        "api.default" => "",
    ];
    $spec["campaign_id"] = [
        "name" => "campaign_id",
        "title" => ts("Campaign External ID"),
        "description" => "Unique campaign id",
        "type" => CRM_Utils_Type::T_INT,
        "api.default" => "",
    ];
    $spec["amount"] = [
        "title" => "Membership amount",
        "type" => CRM_Utils_Type::T_INT,
        "api.required" => 1,
    ];

    $spec["payment_instrument"] = [
        "title" => "Payment Method",
        "type" => CRM_Utils_Type::T_INT,
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
function civicrm_api3_attac_create_member($params)
{
    $params["action_name"] = "text xavier";
    $params["action_type"] = "website_adhesion";
    $resultC = civicrm_api3("ActionContact", "create", $params);
    $params2 = [
        "contact_id" => $result["id"],
        "amount" => $params["amount"],
    ];
    $result = civicrm_api3("Attac", "create_membership", $params2);
    // TODO, merge resultC too;
    return $result;
}

function _civicrm_api3_attac_confirm_membership_spec(&$spec)
{
    $spec["transaction_idx"] = [
        "name" => "transaction_idx",
        "title" => ts("Donation external identifier"),
        "description" => "Unique identifier",
        "type" => CRM_Utils_Type::T_STRING,
        "api.default" => "",
    ];
    $spec["donation_amount"] = [
        "title" => "Donation amount on the top of the membership",
        "type" => CRM_Utils_Type::T_INT,
        "api.default" => 0,
    ];
    $spec["subscription_amount"] = [
        "title" => "Subscription to the magazine amount",
        "type" => CRM_Utils_Type::T_INT,
        "api.default" => 0,
    ];
    $spec["membership_amount"] = [
        "title" => "Membership amount",
        "type" => CRM_Utils_Type::T_INT,
        "api.required" => 1,
    ];
}

function civicrm_api3_attac_confirm_membership($params)
{
}

function _civicrm_api3_attac_create_membership_spec(&$spec)
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
    $spec["payment_processor"] = [
        "name" => "payment_processor",
        "title" => "Payment Processor ID",
        "description" => "ID of payment processor used for this contribution",
        // field is called payment processor - not payment processor id but can only be one id so
        // it seems likely someone will fix it up one day to be more consistent - lets alias it from the start
        "api.aliases" => ["payment_processor_id"],
        "type" => CRM_Utils_Type::T_INT,
    ];

    $spec["payment_instrument"] = [
        "title" => "Payment Method",
        "type" => CRM_Utils_Type::T_INT,
    ];
}

/**
 * Attac membership API
 *
 * @param array $params
 * @return array API result descriptor
 * @see civicrm_api3_create_success
 * @see civicrm_api3_create_error
 * @throws API_Exception
 */
function civicrm_api3_attac_create_membership($params)
{
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
        throw $e;
        //        return civicrm_api3_create_error("Error creating the attac membership");
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
