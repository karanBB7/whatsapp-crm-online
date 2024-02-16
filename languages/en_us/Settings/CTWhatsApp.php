<?php
/*+**********************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
 ************************************************************************************/

$languageStrings = Array(
	'LBL_WHATSAPP_CONFIGURATION' => 'WhatsApp Configuration',
	'LBL_WHATSAPP_INFORMATION' => 'WhatsApp Information',
	'LBL_ACCESS_MODULE_TO_WHATSAPP' => 'Choose modules/fields to get WhatsApp access',
	'API_URL' => 'API URL',
	'API_KEY' => 'API Key',
	'AUTH_TOKEN' => 'Auth Token',
	'CUSTOMFIELD1' => 'Country Code',
	'COUNRTYCODEINFO' => '(Specify country code only if WhatsApp number in record do not have country code)',
	'CUSTOMFIELD2' => 'WhatsApp Number',
	'WHATSAPPNO' => 'My WhatsApp No',
	'MODULES' => 'Module',
	'WHATSAPP_NO_FIELD' => 'WhatsApp # field',
	'ACTIVE' => 'Active',
	'ACTION' => 'Action',
	'ALLOW_MODULE' => 'Allow selected module',
	'WHATSAPP_PHONE_FIELD' => 'WhatsApp Phone field',
	'ASSIGNTO' => 'Allow access to users',
	'LBL_SHOWUNKNOWNMESSAGES' => 'Show Unknown Messages to non-admin User',
	'LBL_THEME' => 'WhatsApp Window view',
	'LBL_LICENSE_SETUP' => 'License Setup',
	'LBL_LICENSE_CONFIGURATION' => 'License Configuration',
	'LBL_WHATSPP_LICENSE_KEY' => 'Whatspp License Key',
	'Enter License Key'=>'Enter License Key',
	'LBL_DEACTIVATE'=>'Deactivate',
	'LBL_RTL'=>'Right to Left view(Preferable Middle East Country)',
	'LBL_LTR'=>'Left to Right view(Default)',
	'LBL_SCANQR_CODE' => 'Connect WhatsApp',
	'LBL_LOGOUT' => 'Logout',
	'LBL_REBOOT_WHATSAPP' => 'Reboot WhatsApp',
	'LBL_CHANGE_NUMBER' => 'Change Number',
	'LBL_SELECT_AN_OPTION' => 'Select an Option',
	'LBL_CLOSE'=>'Close',
	'LBL_YES'=>'Yes',
	'LBL_NO'=>'No',
	'LBL_UPGRADE' => 'Premium',
	'LBL_EXPIRE' => 'days',
	'LBL_DAYS' => 'Expires in',
	'LBL_UPDATE' => 'Update',
	'CLOSE' => 'Close',
	'REQUIREDMISSING' => 'Required Field missing',
	'LBL_SELECTANOPTION' => 'Select an Option',
	'LBL_CANCEL' => 'Cancel',
	'WHATSAPPCONNECTED' => 'You are connected with <br> WhatsApp Number :',
	'CODEINFORMATION' => 'Scan QR Code - Wait for 60 Seconds for WhatsApp to be Connected',
	'LBL_MASS_CONFIGURATION' => 'Mass Message Configuration',
	'LBL_BATCHSIZE' => 'Batch Size (# of Messages)',
	'LBL_TIMEINTERVAL' => 'Time Interval (In Minutes)',
	'COUNTRYCODE_POPUP' => 'Country code',
	'COUNTRYCODE_POPUP0' => 'Country code',
	'COUNTRYCODE_POPUP1' => 'This is an important setting before you start using WhatsApp integration. WhatsApp Store phone number with Country Code It means if your phone number is 6308618263 and Country code is +1 than WhatsApp store number as “16308618263”',
	'COUNTRYCODE_POPUP2' => 'If you’ve some record having a phone number without country code than follow the instructions below.',
	'COUNTRYCODE_POPUP3' => 'WhatsApp phone number without country code in Records :',
	'COUNTRYCODE_POPUP4' => 'In this scenario enter country code, if you want to apply country code as a prefix to all “Phone number” of all modules where you’ve enabled WhatsApp Integration. So whenever a WhatsApp message is sent out from CRM it will add Prefix because WhatsApp required “Country Code” to send a message to contact.<br>
For example : If record phone number is “987654321” and country code is “+1” than WhatsApp number become “1987654321”
',
	'COUNTRYCODE_POPUP5' => 'Record with country code as a prefix :',
	'COUNTRYCODE_POPUP6' => 'If you already have a record with country code than In this scenarios keep country code field “Blank”',
	'BATCHINFORMATION' => '<b>Batch size</b> allow to user to send mass message in batch of messages to avoid Spamming.<br>
			       		Example :  If you wish to send 500 messages and is you set a batch size 15 and Time Interval to 15 minutes. Then it will be send 15 messages in each batch based on Time Interval based on calculating below. <br>
			       		<b>Time to send 500 messages</b> = (500 messages / 15 Batch size) * 15 minutes = 500 minutes = 8 Hours Approximately.',
	'RANDOMINFORMATION' => '<b>Random</b> : Random selection dynamically select any number from 1 to 25 as a batch size when sending message to customer, It means if there is 500 messages to send and Batch Size - Random than it will send 5 messages in first Batch, 8 messages in a second Batch and so on..',
	'TIMEINTREVALINFORMATION' => '<b>Time interval</b> :  allow users to send mass messages in a batch of messages to avoid spamming or WhatApp # to be blocked..<br>
<b>Example</b> : If you wish to send 500 messages and you set a batch size 15 and Time Interval set to 15 minutes. Then it will send 15 messages in each batch on every specified Time Interval as per calculation below..
Time to send 500 messages = (500 messages / 15 Batch size) * 15 minutes = 500 minutes = 8 Hours Approximately.',
	'WHATSAPP_POLICY' => 'WhatsApp Policy',
	'POLICYINFORMATION' => 'Important Notes :<br>1. We recommend to follow ',
	'POLICYINFORMATION1' => 'when sending mass WhatsApp message from CRM.<br>
2. It is advisable to configured minimum Batch Size and maximum Time Interval between each message to safely send WhatsApp messages when you are using the Mass Message feature.<br>
3. WhatsApp stores numbers with country code, so If your number does not have country code than set "Country Code" in WhatsApp Configuration for all WhatsApp numbers of CRM. <br><br>
Suggested Format to store record with WhatsApp number, example format : 1987654321 where “1” is country code and “987654321” is your local number.',
	'Whatsapp Configuration' => 'WhatsApp Configuration',
	'LBL_UNKNOWNINFORMATION' => 'If WhatsApp message has been sent by customer whose number is not in CRM as a Record and if you want to allow all non-admin user to see those number than enable this feature. So all non-admin users can see those message by clicking on Global WhatsApp icon and see it under "Message from Unknown numbers"',
	'LBL_CLOSE_ACCOUNT'=>'Close My Account',

	'LBL_ACTIVE' => 'Active',
	'RQRCODEINFORMATION' => 'Note: Before scanning the QR code follow the instructions below.<br><br>',
	'RQRCODEINFORMATION1' => '1. Open WhatsApp on your Phone.<br>
							  2. Tap Menu or Settings and select WhatsApp Web<br>
							  3. Point your phone to QR code display when you click on “Scan QR Code” button<br><br>',

	'RQRCODEINFORMATION2' => 'For more information click',
	'RQRCODEINFORMATION3' => 'How to scan a QR code',
	'CLICKHERE' => 'here',
	'HOWTOSCANCODE' => 'How to scan a QR code',
	'LBL_LICENSE_CONFIGURATION' => 'Configure WhatsApp License',
	'LICENSEKEY' => 'License Key',
	'APIKEY' => 'API Key',
	'NEXTBUTTON1' => 'Click the "Next" button only after the following steps below.<br>',
	'NEXTBUTTON2' => '1. Scan the QR code from your mobile phone.
2. After scanning the QR code, click "Scan QR code" again and it will appear <br>
"No picture QR code". Click next button only after it displays "No QR code picture". <br>
3. Please wait for 1 minute after scanning the QR code',
	'Save' => 'Save',
	'Cancel' => 'Cancel',
	'WHATSAPPCONNECTED' => 'You are connected with <br> WhatsApp Number:',
	'WhatsApp' => 'WhatsApp',
	'LBL_UPGRADETITLE' => 'Click to upgrade to premium version',
	'LBL_LICENSETITLE' => 'Click to update License Key',
	'LBL_UPDATETITLE' => 'Click to get a updated version of “WhatsApp Integration” from CRMTiger.com',
	'LBL_IMPORT_CONTACTS' => 'Download WhatsApp Contacts',
	'LBL_IN_APP_NOTIFICATION' => 'InApp Notification',
    'NO_NOTIFICATION_INTERVAL' => 'No Notification Interval',

    //Add new functionality
    'WHATSAPPMANAGEMENT' => 'WhatsApp # management',
    'SINGLE_WHATSAPP' => 'Single WhatsApp number for the CRM',
    'MULTIPLE_WHATSAPP' => 'Multiple WhatsApp number for Users',
    'ALLOCATEMULTIPLEWHATSAPP' => 'Add Users / Groups to access or scan Multiple WhatsApp',
    'LBL_EXPORTRECORD' => 'Export Record',
	'LBL_EXPORTRECORDDES1' => 'Click Download Contacts button to Download contacts.csv file of all your WhatsApp contacts and Import to your respected module of vTiger CRM to Send/Receive WhatsApp messages.',
	'LBL_EXPORTRECORDDES2' => 'WhatsApp contacts summary',
	'LBL_EXPORTRECORDDES3' => 'Total Record',
	'LBL_EXPORTRECORDDES4' => 'Note : CSV file only contains Name and Number, for some cases if contact does not have name than ir will not display in CSV',
	'LBL_EXPORTRECORDDES5' => 'Download Contacts',
	'QRCODE_ERROR' => 'Issue in display QR code - try after sometime',
	'RQRCODEINFORMATION4' => 'WhatsApp Integration only works if number which you scan here 
should be disconnected(Logout) from Web.WhatsApp Interface.',
    //Add new functionality

	'LBL_AUTORESPONDER' => 'Auto Responder',
	'LBL_AUTORESPONDERTEXT' => 'Auto Responder Text',

	'LBL_WHATSAPP_CONFIGURATION_USERS' => 'WhatsApp Connected Users',
	'LBL_USERS' => 'User Name',
	'LBL_CONNECTED' => 'Connected',
	'LBL_DISCONNECTED' => 'Not Connected',
	'LBL_SCAN_YOU_NUMBER' => 'Scan your WhatsApp number',
	
	'LBL_WHATSAPP_MODULE_NUMBERTO_ACCESS' => 'WhatsApp module/number Access to user',
	'LBL_GENERAL_SEETINGS' => 'General Settings',
	'LBL_AUTO_MESSAGE_RESPONDER' => 'Auto message responder',
	'LBL_COUNTRYCODE_DESCRIPTION' => "- WhatsApp required a number is a country code so if customer's phone # record doesn't have country code and its marked as WhatsApp # than add country code here which will add it as prefix to all your number when sending message.<br>- DO NOT USE this feature if you've multi country phone number as this feature applies to all phone number.",
	'LBL_AUTO_MESSAGE_RESPONDER_DESCRIPTION' => '<b>Note : </b>Auto message responder only send to user if message sent first time in 24 hours.',
	'LBL_SELECT_MODULE_ERROR' => 'Please select at least one module use for WhatsApp',
	'LBL_SELECT_MULTIPLEUSER_ERROR' => 'Please select at least one user in Allocate Multiple WhatsApp To.',
	'MULTIPLE_WHATSAPP_NOTES' => 'Note :<br> 1. In order for users to see WhatsApp scan by the other users then add those users in one group.<br>2. Any user of group scan WhatsApp than it will access WhatsApp to other users of the same group.<br>3. You can add Individual users to the WhatsApp Too.',

	'MULTIPLE_WHATSAPP_NOTES1' => 'Add / Delete users / groups to use WhatsApp numbers',
	'MW_LABEL1' => 'Who scans WhatsApp? (User)',
	'MW_LABEL2' => 'Who uses WhatsApp? (Users / Groups)',
	'MW_ACTIVE' => 'Active',
	'MW_ACTION' => 'Action',

	'LBL_ADD_MORE_USERS' => 'Add more Users',
	'LBL_PLEASE_WAIT' => 'Please wait....',
	'LBL_STATUS' => 'Status',
	'LBL_PHONECONNECTED' => 'Phone Internet disconnected',
	'NAVIGATETIMELINE' => 'to Send/Receive WhatsApp message to your contacts',
	'CLICK' => 'Click',
	'PLEASEWAITSCANQRCODE' => 'Please wait.. It may take upto 30 seconds for QR code to load...',
	'LBL_AUTORESPONDER_LABEL' => 'Customer received this message automatically first time',
	'LBL_NOTIFICATION_TONE' => 'Notification Tone',
	'LBL_SILENT' => 'Silent',
	'LBL_WHATSAPPLOG' => 'WhatsApp Log',
	'LBL_WHATSAPPNOTIFICATION' => 'WhatsApp Push Notification',

	'LBL_WHASAPP_TON' => 'WhatsApp Default',
	'LBL_WHASAPP_HANGOUT_MESSAGE' => 'Hangout Message',
	'LBL_BOT_IDEALTIME' => 'Bot Ideal Time',
	'LBL_GROUP_NAME' => 'Group Name',
	'LBL_ATLEAST_CREATE_RECORD' => 'Please add atleast one WhatsApp number access to user!!!',
	'LBL_ALLOW_MASS_MESSAGE_USERS' => 'Allow mass messages access',
);

$jsLanguageStrings = Array(
	'MSG_WHATSAPP_DEACTIVATE_POPUP'=>'Are you Sure you wish to Deactivate Your License Key ?',
	'MSG_WHATSAPP_POPUP1'=>'This will uninstall all modules of CTWhatsApp With Data Stored related to CTWhatsApp as well as your account with CRMTiger.com.<br/>
     If you are premium subcribers than billing will cancel from next billing cycle.',
	'MSG_WHATSAPP_POPUP1_2'=>'Are you Sure you wish to Close Your account ?',
    'MSG_WHATSAPP_POPUP2'=>'We are closing your account. Do you Want to Proceed ?',
    'MSG_WHATSAPP_UNISTALL_SUCCESS'=>'CTWhatsApp Uninstalled!',
    'WHATSAPP_UNISTALL_SUCCESS'=>'CTWhatsApp has been uninstall successfully',
    'MSG_WHATSAPP_UNISTALL_FAILED'=>'Uninstall Failed! Please Contact to Us.',
    'WHATSAPP_UNISTALL_FAILED'=>'Uninstall Failed!',
    'DELETEMODULE' => 'Are you sure to delete this record?',
    'MSG_UPDATEMODULE' => 'Are you sure to Update WhtasappModule?',
    'UPDATEMODULE' => 'Some problem in Update Whatsapp Module',
    'LBL_SCANQRCODEAGAIN' => 'Your instance is not activated yet - Please scan QR code again',
    'LBL_LICENSEEXPIRE' => 'Your License has been expired',
    'ENTERLICENSEKEY' => 'Please Enter License Key',
    'ENTERAPIKEY' => 'Please Enter API Key',
    'ENTERAPIKEYAUTHKEY' => 'Please Enter Auth Token',
    'MULTIPLETOSINGLE'=>'Change from Single to multiple users or Multiple users to Single will Clear all WhatsApp Connections - Please confirm',
    'JS_SELECT_MODULE' => 'Please select module.',
    'CURENT_VERSION' => 'Your WhatsApp version',
    'LATEST_VERSION' => 'Current WhatsApp version',
);

?>
