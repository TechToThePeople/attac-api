# attac-api

This extension provides two apis specific to attac to handle the flow spip->civicrm
They are meant to be called as rest apis

### attac.member
This api does two things:
- create or update a contact (the member)
- create the membership (using the api below)

params:
- first_name
- last_name
- email
- address
- postal_code
- city
- amount
- payment_method (eg check, transfer, card...)?


### attac.membership
this takes the params:
- contact_id
- amount
- financial_type_id (eg check, transfer, card...)?
- transaction_id (spip bank reference?)

the minimal amount has to be 13 euros and will be split into two: 12 euros for the subscription to the magazine, the rest for a membership

TODO: 
- clarify the rules and implement if there is already a membership


The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Requirements

* PHP v7.2+
* CiviCRM (*FIXME: Version number*)

## Installation (Web UI)

Learn more about installing CiviCRM extensions in the [CiviCRM Sysadmin Guide](https://docs.civicrm.org/sysadmin/en/latest/customize/extensions/).

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl attac-api@https://github.com/FIXME/attac-api/archive/master.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git) repo for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/FIXME/attac-api.git
cv en attac_api
```

## Getting Started

(* FIXME: Where would a new user navigate to get started? What changes would they see? *)

## Known Issues

(* FIXME *)
# attac-api
