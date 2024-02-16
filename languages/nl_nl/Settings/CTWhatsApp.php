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
	'LBL_WHATSAPP_CONFIGURATION' => 'WhatsApp-configuratie',
	'LBL_WHATSAPP_INFORMATION' => 'WhatsApp-informatie',
	'LBL_ACCESS_MODULE_TO_WHATSAPP' => 'Kies modules/velden om toegang tot WhatsApp te krijgen',
	'API_URL' => 'API URL',
	'API_KEY' => 'API-sleutel',
	'AUTH_TOKEN' => 'Verificatie-token',
	'CUSTOMFIELD1' => 'Landcode',
	'COUNRTYCODEINFO' => '(Specificeer de landcode alleen als het geregistreerde WhatsApp-nummer geen landcode heeft)',
	'CUSTOMFIELD2' => 'WhatsApp-nummer',
	'WHATSAPPNO' => 'Mijn WhatsApp Nee',
	'MODULES' => 'Module',
	'WHATSAPP_NO_FIELD' => 'WhatsApp # veld',
	'ACTIVE' => 'Actief',
	'ACTION' => 'Actie',
	'ALLOW_MODULE' => 'Sta geselecteerde module toe',
	'WHATSAPP_PHONE_FIELD' => 'WhatsApp-telefoonveld',
	'ASSIGNTO' => 'Sta toegang toe aan gebruikers',
	'LBL_SHOWUNKNOWNMESSAGES' => 'Toon onbekende berichten aan niet-admin gebruiker',
	'LBL_THEME' => 'WhatsApp-vensterweergave',
	'LBL_LICENSE_SETUP' => 'Licentie instellen',
	'LBL_LICENSE_CONFIGURATION' => 'Licentieconfiguratie',
	'LBL_WHATSPP_LICENSE_KEY' => 'Whatspp Licentiesleutel',
	'Enter License Key' => 'Voer licentiecode in',
	'LBL_DEACTIVATE' => 'Deactiveren',
	'LBL_RTL' => 'Weergave van rechts naar links (bij voorkeur Midden-Oostenland)',
	'LBL_LTR' => 'Weergave van links naar rechts (standaard)',
	'LBL_SCANQR_CODE' => 'WhatsApp verbinden',
	'LBL_LOGOUT' => 'Uitloggen',
	'LBL_REBOOT_WHATSAPP' => 'Herstart WhatsApp',
	'LBL_CHANGE_NUMBER' => 'Nummer wijzigen',
	'LBL_SELECT_AN_OPTION' => 'Selecteer een optie',
	'LBL_CLOSE' => 'Sluiten',
	'LBL_YES' => 'Ja',
	'LBL_NO' => 'Nee',
	'LBL_UPGRADE' => 'Premium',
	'LBL_EXPIRE' => 'dagen',
	'LBL_DAYS' => 'Verloopt over',
	'LBL_UPDATE' => 'Update',
	'CLOSE' => 'Sluiten',
	'REQUIREDMISSING' => 'Verplicht veld ontbreekt',
	'LBL_SELECTANOPTION' => 'Selecteer een optie',
	'LBL_CANCEL' => 'Annuleren',
	'WHATSAPPCONNECTED' => 'Je bent verbonden met <br> WhatsApp-nummer:',
	'CODEINFORMATION' => 'Scan QR-code - wacht 60 seconden totdat WhatsApp is verbonden',
	'LBL_MASS_CONFIGURATION' => 'Configuratie van massaberichten',
	'LBL_BATCHSIZE' => 'Batchgrootte (aantal berichten)',
	'LBL_TIMEINTERVAL' => 'Tijdsinterval (in minuten)',
	'COUNTRYCODE_POPUP' => 'Landcode',
	'COUNTRYCODE_POPUP0' => 'Landcode',
	'COUNTRYCODE_POPUP1' => 'Dit is een belangrijke instelling voordat je WhatsApp-integratie gaat gebruiken. WhatsApp Store-telefoonnummer met landcode Dit betekent dat als uw telefoonnummer 6308618263 is en de landcode +1 is, dan het WhatsApp-winkelnummer "16308618263" ',
	'COUNTRYCODE_POPUP2' => 'Als je een record hebt met een telefoonnummer zonder landcode, volg dan de onderstaande instructies.',
	'COUNTRYCODE_POPUP3' => 'WhatsApp telefoonnummer zonder landcode in records:',
	'COUNTRYCODE_POPUP4' => 'Voer in dit scenario de landcode in, als je de landcode als voorvoegsel wilt toepassen op alle "Telefoonnummer" van alle modules waarin je WhatsApp-integratie hebt ingeschakeld. Dus wanneer een WhatsApp-bericht wordt verzonden vanuit CRM, wordt een voorvoegsel toegevoegd omdat WhatsApp een "landcode" nodig heeft om een ​​bericht naar contact te verzenden. <br>
	Bijvoorbeeld: als het telefoonnummer van het record ‘987654321’ is en de landcode ‘+1’, dan wordt het WhatsApp-nummer ‘1987654321’
	',
	'COUNTRYCODE_POPUP5' => 'Record met landcode als voorvoegsel:',
	'COUNTRYCODE_POPUP6' => 'Als je al een record met landcode hebt, houd dan in dit scenario het landcodeveld "Blanco"',
	'BATCHINFORMATION' => '<b> Batchgrootte </b> stelt de gebruiker in staat massaberichten in een reeks berichten te verzenden om spam te voorkomen. <br>
	Voorbeeld: als u 500 berichten wilt verzenden en u stelt een batchgrootte in op 15 en een tijdsinterval op 15 minuten. Vervolgens worden in elke batch 15 berichten verzonden op basis van het tijdsinterval op basis van onderstaande berekening. <br>
	<b> Tijd om 500 berichten te verzenden </b> = (500 berichten / 15 batchgrootte) * 15 minuten = 500 minuten = 8 uur ongeveer. ',
	'RANDOMINFORMATION' => '<b> Willekeurig </b>: willekeurige selectie selecteert dynamisch elk nummer van 1 tot 25 als een batchgrootte bij het verzenden van een bericht naar de klant. Dit betekent dat er 500 berichten moeten worden verzonden en de batchgrootte - willekeurig dan het verzendt 5 berichten in de eerste batch, 8 berichten in een tweede batch enzovoort. ',
	'TIMEINTREVALINFORMATION' => '<b> Tijdsinterval </b>: gebruikers toestaan ​​massaberichten in een reeks berichten te verzenden om spamming te voorkomen of WhatApp # te blokkeren .. <br>
	<b> Voorbeeld </b>: als u 500 berichten wilt verzenden en u stelt een batchgrootte in op 15 en een tijdsinterval op 15 minuten. Vervolgens verzendt het 15 berichten in elke batch op elk gespecificeerd tijdsinterval zoals in onderstaande berekening.
	Tijd om 500 berichten te verzenden = (500 berichten / 15 batchgrootte) * 15 minuten = 500 minuten = ongeveer 8 uur. ',
	'WHATSAPP_POLICY' => 'WhatsApp-beleid',
	'POLICYINFORMATION' => 'Belangrijke opmerkingen: <br> 1. We raden aan om ',
	'POLICYINFORMATION1' => 'bij het verzenden van massaal WhatsApp-bericht vanuit CRM. <br>
	2. Het is raadzaam om de minimale batchgrootte en het maximale tijdsinterval tussen elk bericht in te stellen om veilig WhatsApp-berichten te verzenden wanneer u de functie voor massaberichten gebruikt. <br>
	3. WhatsApp slaat nummers op met landcode, dus als je nummer geen landcode heeft, stel dan "Landcode" in WhatsApp Configuratie in voor alle WhatsApp-nummers van CRM. <br> <br>
	Aanbevolen indeling om record met WhatsApp-nummer op te slaan, voorbeeldformaat: 1987654321 waarbij "1" de landcode is en "987654321" uw lokale nummer. ',
	'Whatsapp Configuration' => 'WhatsApp-configuratie',
	'LBL_UNKNOWNINFORMATION' => 'Als het WhatsApp-bericht is verzonden door een klant wiens nummer niet in CRM staat als een record en als je wilt dat alle niet-admin-gebruikers dat nummer kunnen zien, schakel dan deze functie in. Dus alle niet-admin gebruikers kunnen dat bericht zien door op het Global WhatsApp-pictogram te klikken en het te zien onder "Bericht van onbekende nummers" ',
	'LBL_CLOSE_ACCOUNT' => 'Sluit mijn account',

	'LBL_ACTIVE' => 'Actief',
	'RQRCODEINFORMATION' => 'Opmerking: volg de onderstaande instructies voordat u de QR-code scant. <br> <br>',
	'RQRCODEINFORMATION1' => '1. Open WhatsApp op je telefoon. <br>
	2. Tik op Menu of Instellingen en selecteer WhatsApp Web <br>
	3. Richt uw telefoon op de weergave van de QR-code wanneer u op de knop "QR-code scannen" klikt <br> <br> ',

	'RQRCODEINFORMATION2' => 'Voor meer informatie klik',
	'RQRCODEINFORMATION3' => 'Hoe scan ik een QR-code',
	'CLICKHERE' => 'hier',
	'HOWTOSCANCODE' => 'Hoe scan ik een QR-code',
	'LBL_LICENSE_CONFIGURATION' => 'WhatsApp-licentie configureren',
	'LICENSEKEY' => 'Licentiecode',
	'APIKEY' => 'API-sleutel',
	'NEXTBUTTON1' => 'Klik pas op de "Volgende" knop na de volgende stappen hieronder. <br>',
	'NEXTBUTTON2' => '1. Scan de QR-code vanaf uw mobiele telefoon.
	2. Na het scannen van de QR-code, klik nogmaals op "Scan QR-code" en het zal verschijnen <br>
	"Geen afbeelding QR-code". Klik pas op de knop Volgende nadat "Geen afbeelding van QR-code" wordt weergegeven. <br>
	3. Wacht 1 minuut na het scannen van de QR-code ',
	'Save' => 'Opslaan',
	'Cancel' => 'Annuleren',
	'WHATSAPPCONNECTED' => 'Je bent verbonden met <br> WhatsApp-nummer:',
	'WhatsApp' => 'WhatsApp',
	'LBL_UPGRADETITLE' => 'Klik om te upgraden naar premium versie',
	'LBL_LICENSETITLE' => 'Klik om licentiecode te updaten',
	'LBL_UPDATETITLE' => 'Klik om een ​​bijgewerkte versie van “WhatsApp-integratie” te krijgen van CRMTiger.com',
	'LBL_IMPORT_CONTACTS' => 'WhatsApp-contacten downloaden',
	'LBL_IN_APP_NOTIFICATION' => 'InApp-melding',
    'NO_NOTIFICATION_INTERVAL' => 'Geen meldingsinterval',

    // Nieuwe functionaliteit toevoegen
    'WHATSAPPMANAGEMENT' => 'WhatsApp # beheer',
    'SINGLE_WHATSAPP' => 'Eén WhatsApp-nummer voor de CRM',
    'MULTIPLE_WHATSAPP' => 'Meerdere WhatsApp-nummers voor gebruikers',
    'ALLOCATEMULTIPLEWHATSAPP' => 'Voeg gebruikers / groepen toe om meerdere WhatsApp te openen of te scannen',
    'LBL_EXPORTRECORD' => 'Exporteer record',
	'LBL_EXPORTRECORDDES1' => 'Klik op de knop Contacten downloaden om het contacts.csv-bestand van al je WhatsApp-contacten te downloaden en te importeren naar je gerespecteerde module van vTiger CRM om WhatsApp-berichten te verzenden / ontvangen.',
	'LBL_EXPORTRECORDDES2' => 'WhatsApp contacten overzicht',
	'LBL_EXPORTRECORDDES3' => 'Totaal record',
	'LBL_EXPORTRECORDDES4' => 'Opmerking: CSV-bestand bevat alleen naam en nummer, in sommige gevallen als contactpersoon geen naam heeft, wordt ir niet weergegeven in CSV',
	'LBL_EXPORTRECORDDES5' => 'Contacten downloaden',
	'QRCODE_ERROR' => 'Probleem met QR-code op het scherm - probeer het later',
	'RQRCODEINFORMATION4' => 'WhatsApp-integratie werkt alleen als het nummer dat u hier scant
moet worden losgekoppeld (Uitloggen) van Web.WhatsApp Interface.',
    //Add new functionality

	'LBL_AUTORESPONDER' => 'Automatische beantwoorder',
	'LBL_AUTORESPONDERTEXT' => 'Auto-responder-tekst',
	'LBL_WHATSAPP_CONFIGURATION_USERS' => 'WhatsApp verbonden gebruikers',
	'LBL_USERS' => 'Gebruikersnaam',
	'LBL_CONNECTED' => 'Verbonden',
	'LBL_DISCONNECTED' => 'Niet verbonden',
	'LBL_SCAN_YOUR_NUMBER' => 'Scan je WhatsApp-nummer',
	
	'LBL_WHATSAPP_MODULE_NUMBERTO_ACCESS' => 'WhatsApp module/nummer Toegang tot gebruiker',
	'LBL_GENERAL_SEETINGS' => 'Algemene instellingen',
	'LBL_AUTO_MESSAGE_RESPONDER' => 'Automatische berichtbeantwoorder',
	'LBL_COUNTRYCODE_DESCRIPTION' => "- WhatsApp vereist dat een nummer een landcode is, dus als het telefoonnummer van de klant # geen landcode heeft en is gemarkeerd als WhatsApp #, voeg dan hier de landcode toe die het als voorvoegsel aan al uw nummers toevoegt bij het verzenden bericht.<br>- GEBRUIK deze functie NIET als je een telefoonnummer voor meerdere landen hebt, aangezien deze functie van toepassing is op alle telefoonnummers.",
	'LBL_AUTO_MESSAGE_RESPONDER_DESCRIPTION' => '<b>Opmerking: </b>Automatische berichtbeantwoorder stuurt alleen naar gebruiker als bericht voor het eerst in 24 uur is verzonden.',
	'LBL_SELECT_MODULE_ERROR' => 'Selecteer ten minste één module voor WhatsApp',
	'LBL_SELECT_MULTIPLEUSER_ERROR' => 'Selecteer ten minste één gebruiker in Meerdere WhatsApp toewijzen aan.',
	'MULTIPLE_WHATSAPP_NOTES' => 'Opmerking:<br> 1. Om ervoor te zorgen dat gebruikers WhatsApp door de andere gebruikers kunnen zien, voegt u die gebruikers toe aan één groep.<br>2. Elke gebruiker van een groep scant WhatsApp dan heeft hij toegang tot WhatsApp voor andere gebruikers van dezelfde groep.<br>3. U kunt individuele gebruikers toevoegen aan WhatsApp Too.',

	'MULTIPLE_WHATSAPP_NOTES1' => 'Gebruikers/groepen toevoegen/verwijderen om meerdere WhatsApp # te gebruiken',
	'MW_LABEL1' => 'Wie scant WhatsApp? (Gebruiker)',
	'MW_LABEL2' => 'Wie gebruiken WhatsApp? (Gebruikers/Groepen)',
	'MW_ACTIVE' => 'Actief',
	'MW_ACTION' => 'Actie',

	'LBL_ADD_MORE_USERS' => 'Meer gebruikers toevoegen',
	'LBL_PLEASE_WAIT' => 'Even geduld aub....',
	'LBL_PHONECONNECTED' => 'Telefoon internet verbroken',
	'NAVIGATETIMELINE' => 'om WhatsApp-berichten naar uw contacten te verzenden / ontvangen',
	'CLICK' => 'Klik',
	'PLEASEWAITSCANQRCODE' => 'Even geduld a.u.b. Het kan tot 30 seconden duren voordat de QR-code is geladen...',
	'LBL_AUTORESPONDER_LABEL' => 'Klant heeft dit bericht de eerste keer automatisch ontvangen',
);

$jsLanguageStrings = Array(
	'MSG_WHATSAPP_DEACTIVATE_POPUP' => 'Weet u zeker dat u uw licentiecode wilt deactiveren?',
	'MSG_WHATSAPP_POPUP1' => 'Hiermee worden alle modules van CTWhatsApp met opgeslagen gegevens met betrekking tot CTWhatsApp en uw account bij CRMTiger.com verwijderd. <br/>
     Als u premium-abonnees bent, wordt de facturering geannuleerd vanaf de volgende betalingscyclus. ',
	'MSG_WHATSAPP_POPUP1_2' => 'Weet u zeker dat u uw account wilt sluiten?',
    'MSG_WHATSAPP_POPUP2' => 'We sluiten uw account. Wil je doorgaan ?',
    'MSG_WHATSAPP_UNISTALL_SUCCESS' => 'CTWhatsApp verwijderd!',
    'WHATSAPP_UNISTALL_SUCCESS' => 'CTWhatsApp is succesvol verwijderd',
    'MSG_WHATSAPP_UNISTALL_FAILED' => 'Verwijderen mislukt! Neem contact met ons op. ',
    'WHATSAPP_UNISTALL_FAILED' => 'Verwijderen mislukt!',
    'DELETEMODULE' => 'Weet u zeker dat u dit record wilt verwijderen?',
    'MSG_UPDATEMODULE' => 'Weet u zeker dat u WhtasappModule wilt updaten?',
    'UPDATEMODULE' => 'Een probleem bij het bijwerken van Whatsapp-module',
    'LBL_SCANQRCODEAGAIN' => 'Uw instantie is nog niet geactiveerd - Scan de QR-code opnieuw',
    'LBL_LICENSEEXPIRE' => 'Uw licentie is verlopen',
    'ENTERLICENSEKEY' => 'Voer de licentiecode in',
    'ENTERAPIKEY' => 'Voer de API-sleutel in',
    'ENTERAPIKEYAUTHKEY' => 'Voer de verificatietoken in',
    'MULTIPLETOSINGLE' => 'Wijziging van Single naar meerdere gebruikers of Meerdere gebruikers naar Single zal alle WhatsApp-verbindingen wissen - Bevestig alstublieft',
    'CURENT_VERSION' => 'Jouw WhatsApp-versie',
    'LATEST_VERSION' => 'Huidige WhatsApp-versie',
);

?>
