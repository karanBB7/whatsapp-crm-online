#Vtiger CRM Customer Portal

##Pre-requisites

* Enable php cURL extension.
* Write permission for webserver (Apache) process owner  on writeable folder.
* Vtiger CRM 7.3 with CustomerPortal module enabled.

##Installation

* Download customer portal.
* Unzip into Vtiger CRM source folder.
* Rename vtigercrm-customerportal-x.x.x directory as customerportal.
* In customerportal directory copy config.sample.php to config.php
* Open config.php and now add crm.url as your source and portal.url as there in customerportal settings page. 
* Make sure Outgoing server is configured.
* Now create a contact with email id field and enable portal user.
* Mail with credentials will be sent to Contact.

