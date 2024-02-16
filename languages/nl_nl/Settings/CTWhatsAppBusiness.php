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
	'LBL_WhatsApp Business_CONFIGURATION' => 'WhatsApp Business-configuratie',
	'LBL_WhatsApp Business_INFORMATION' => 'WhatsApp Business-informatie',
	'LBL_ACCESS_MODULE_TO_WhatsApp Business' => 'Kies modules/velden om toegang tot WhatsApp Business te krijgen',
	'API_URL' => 'API URL',
	'API_KEY' => 'API-sleutel',
	'AUTH_TOKEN' => 'Verificatie-token',
	'CUSTOMFIELD1' => 'Landcode',
	'COUNRTYCODEINFO' => '(Specificeer de landcode alleen als het geregistreerde WhatsApp Business-nummer geen landcode heeft)',
	'CUSTOMFIELD2' => 'WhatsApp Business-nummer',
	'WhatsApp BusinessNO' => 'Mijn WhatsApp Business Nee',
	'MODULES' => 'Module',
	'WhatsApp Business_NO_FIELD' => 'WhatsApp Business # veld',
	'ACTIVE' => 'Actief',
	'ACTION' => 'Actie',
	'ALLOW_MODULE' => 'Sta geselecteerde module toe',
	'WhatsApp Business_PHONE_FIELD' => 'WhatsApp Business-telefoonveld',
	'ASSIGNTO' => 'Sta toegang toe aan gebruikers',
	'LBL_SHOWUNKNOWNMESSAGES' => 'Toon onbekende berichten aan niet-admin gebruiker',
	'LBL_THEME' => 'WhatsApp Business-vensterweergave',
	'LBL_LICENSE_SETUP' => 'Licentie instellen',
	'LBL_LICENSE_CONFIGURATION' => 'Licentieconfiguratie',
	'LBL_WHATSPP_LICENSE_KEY' => 'Whatspp Licentiesleutel',
	'Enter License Key' => 'Voer licentiecode in',
	'LBL_DEACTIVATE' => 'Deactiveren',
	'LBL_RTL' => 'Weergave van rechts naar links (bij voorkeur Midden-Oostenland)',
	'LBL_LTR' => 'Weergave van links naar rechts (standaard)',
	'LBL_SCANQR_CODE' => 'WhatsApp Business verbinden',
	'LBL_LOGOUT' => 'Uitloggen',
	'LBL_REBOOT_WhatsApp Business' => 'Herstart WhatsApp Business',
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
	'WhatsApp BusinessCONNECTED' => 'Je bent verbonden met <br> WhatsApp Business-nummer:',
	'CODEINFORMATION' => 'Scan QR-code - wacht 60 seconden totdat WhatsApp Business is verbonden',
	'LBL_MASS_CONFIGURATION' => 'Configuratie van massaberichten',
	'LBL_BATCHSIZE' => 'Batchgrootte (aantal berichten)',
	'LBL_TIMEINTERVAL' => 'Tijdsinterval (in minuten)',
	'COUNTRYCODE_POPUP' => 'Landcode',
	'COUNTRYCODE_POPUP0' => 'Landcode',
	'COUNTRYCODE_POPUP1' => 'Dit is een belangrijke instelling voordat je WhatsApp Business-integratie gaat gebruiken. WhatsApp Business Store-telefoonnummer met landcode Dit betekent dat als uw telefoonnummer 6308618263 is en de landcode +1 is, dan het WhatsApp Business-winkelnummer "16308618263" ',
	'COUNTRYCODE_POPUP2' => 'Als je een record hebt met een telefoonnummer zonder landcode, volg dan de onderstaande instructies.',
	'COUNTRYCODE_POPUP3' => 'WhatsApp Business telefoonnummer zonder landcode in records:',
	'COUNTRYCODE_POPUP4' => 'Voer in dit scenario de landcode in, als je de landcode als voorvoegsel wilt toepassen op alle "Telefoonnummer" van alle modules waarin je WhatsApp Business-integratie hebt ingeschakeld. Dus wanneer een WhatsApp Business-bericht wordt verzonden vanuit CRM, wordt een voorvoegsel toegevoegd omdat WhatsApp Business een "landcode" nodig heeft om een ​​bericht naar contact te verzenden. <br>
	Bijvoorbeeld: als het telefoonnummer van het record ‘987654321’ is en de landcode ‘+1’, dan wordt het WhatsApp Business-nummer ‘1987654321’
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
	'WhatsApp Business_POLICY' => 'WhatsApp Business-beleid',
	'POLICYINFORMATION' => 'Belangrijke opmerkingen: <br> 1. We raden aan om ',
	'POLICYINFORMATION1' => 'bij het verzenden van massaal WhatsApp Business-bericht vanuit CRM. <br>
	2. Het is raadzaam om de minimale batchgrootte en het maximale tijdsinterval tussen elk bericht in te stellen om veilig WhatsApp Business-berichten te verzenden wanneer u de functie voor massaberichten gebruikt. <br>
	3. WhatsApp Business slaat nummers op met landcode, dus als je nummer geen landcode heeft, stel dan "Landcode" in WhatsApp Business Configuratie in voor alle WhatsApp Business-nummers van CRM. <br> <br>
	Aanbevolen indeling om record met WhatsApp Business-nummer op te slaan, voorbeeldformaat: 1987654321 waarbij "1" de landcode is en "987654321" uw lokale nummer. ',
	'WhatsApp Business Configuration' => 'WhatsApp Business-configuratie',
	'LBL_UNKNOWNINFORMATION' => 'Als het WhatsApp Business-bericht is verzonden door een klant wiens nummer niet in CRM staat als een record en als je wilt dat alle niet-admin-gebruikers dat nummer kunnen zien, schakel dan deze functie in. Dus alle niet-admin gebruikers kunnen dat bericht zien door op het Global WhatsApp Business-pictogram te klikken en het te zien onder "Bericht van onbekende nummers" ',
	'LBL_CLOSE_ACCOUNT' => 'Sluit mijn account',

	'LBL_ACTIVE' => 'Actief',
	'RQRCODEINFORMATION' => 'Opmerking: volg de onderstaande instructies voordat u de QR-code scant. <br> <br>',
	'RQRCODEINFORMATION1' => '1. Open WhatsApp Business op je telefoon. <br>
	2. Tik op Menu of Instellingen en selecteer WhatsApp Business Web <br>
	3. Richt uw telefoon op de weergave van de QR-code wanneer u op de knop "QR-code scannen" klikt <br> <br> ',

	'RQRCODEINFORMATION2' => 'Voor meer informatie klik',
	'RQRCODEINFORMATION3' => 'Hoe scan ik een QR-code',
	'CLICKHERE' => 'hier',
	'HOWTOSCANCODE' => 'Hoe scan ik een QR-code',
	'LBL_LICENSE_CONFIGURATION' => 'WhatsApp Business-licentie configureren',
	'LICENSEKEY' => 'Licentiecode',
	'APIKEY' => 'API-sleutel',
	'NEXTBUTTON1' => 'Klik pas op de "Volgende" knop na de volgende stappen hieronder. <br>',
	'NEXTBUTTON2' => '1. Scan de QR-code vanaf uw mobiele telefoon.
	2. Na het scannen van de QR-code, klik nogmaals op "Scan QR-code" en het zal verschijnen <br>
	"Geen afbeelding QR-code". Klik pas op de knop Volgende nadat "Geen afbeelding van QR-code" wordt weergegeven. <br>
	3. Wacht 1 minuut na het scannen van de QR-code ',
	'Save' => 'Opslaan',
	'Cancel' => 'Annuleren',
	'WhatsApp BusinessCONNECTED' => 'Je bent verbonden met <br> WhatsApp Business-nummer:',
	'WhatsApp Business' => 'WhatsApp Business',
	'LBL_UPGRADETITLE' => 'Klik om te upgraden naar premium versie',
	'LBL_LICENSETITLE' => 'Klik om licentiecode te updaten',
	'LBL_UPDATETITLE' => 'Klik om een ​​bijgewerkte versie van “WhatsApp Business-integratie” te krijgen van CRMTiger.com',
	'LBL_IMPORT_CONTACTS' => 'WhatsApp Business-contacten downloaden',
	'LBL_IN_APP_NOTIFICATION' => 'InApp-melding',
    'NO_NOTIFICATION_INTERVAL' => 'Geen meldingsinterval',

    // Nieuwe functionaliteit toevoegen
    'WhatsApp BusinessMANAGEMENT' => 'WhatsApp Business # beheer',
    'SINGLE_WhatsApp Business' => 'Eén WhatsApp Business-nummer voor de CRM',
    'MULTIPLE_WhatsApp Business' => 'Meerdere WhatsApp Business-nummers voor gebruikers',
    'ALLOCATEMULTIPLEWhatsApp Business' => 'Voeg gebruikers / groepen toe om meerdere WhatsApp Business te openen of te scannen',
    'LBL_EXPORTRECORD' => 'Exporteer record',
	'LBL_EXPORTRECORDDES1' => 'Klik op de knop Contacten downloaden om het contacts.csv-bestand van al je WhatsApp Business-contacten te downloaden en te importeren naar je gerespecteerde module van vTiger CRM om WhatsApp Business-berichten te verzenden / ontvangen.',
	'LBL_EXPORTRECORDDES2' => 'WhatsApp Business contacten overzicht',
	'LBL_EXPORTRECORDDES3' => 'Totaal record',
	'LBL_EXPORTRECORDDES4' => 'Opmerking: CSV-bestand bevat alleen naam en nummer, in sommige gevallen als contactpersoon geen naam heeft, wordt ir niet weergegeven in CSV',
	'LBL_EXPORTRECORDDES5' => 'Contacten downloaden',
	'QRCODE_ERROR' => 'Probleem met QR-code op het scherm - probeer het later',
	'RQRCODEINFORMATION4' => 'WhatsApp Business-integratie werkt alleen als het nummer dat u hier scant
moet worden losgekoppeld (Uitloggen) van Web.WhatsApp Business Interface.',
    //Add new functionality

	'LBL_AUTORESPONDER' => 'Automatische beantwoorder',
	'LBL_AUTORESPONDERTEXT' => 'Auto-responder-tekst',
	'LBL_WhatsApp Business_CONFIGURATION_USERS' => 'WhatsApp Business verbonden gebruikers',
	'LBL_USERS' => 'Gebruikersnaam',
	'LBL_CONNECTED' => 'Verbonden',
	'LBL_DISCONNECTED' => 'Niet verbonden',
	'LBL_SCAN_YOUR_NUMBER' => 'Scan je WhatsApp Business-nummer',
	
	'LBL_WhatsApp Business_MODULE_NUMBERTO_ACCESS' => 'WhatsApp Business module/nummer Toegang tot gebruiker',
	'LBL_GENERAL_SEETINGS' => 'Algemene instellingen',
	'LBL_AUTO_MESSAGE_RESPONDER' => 'Automatische berichtbeantwoorder',
	'LBL_COUNTRYCODE_DESCRIPTION' => "- WhatsApp Business vereist dat een nummer een landcode is, dus als het telefoonnummer van de klant # geen landcode heeft en is gemarkeerd als WhatsApp Business #, voeg dan hier de landcode toe die het als voorvoegsel aan al uw nummers toevoegt bij het verzenden bericht.<br>- GEBRUIK deze functie NIET als je een telefoonnummer voor meerdere landen hebt, aangezien deze functie van toepassing is op alle telefoonnummers.",
	'LBL_AUTO_MESSAGE_RESPONDER_DESCRIPTION' => '<b>Opmerking: </b>Automatische berichtbeantwoorder stuurt alleen naar gebruiker als bericht voor het eerst in 24 uur is verzonden.',
	'LBL_SELECT_MODULE_ERROR' => 'Selecteer ten minste één module voor WhatsApp Business',
	'LBL_SELECT_MULTIPLEUSER_ERROR' => 'Selecteer ten minste één gebruiker in Meerdere WhatsApp Business toewijzen aan.',
	'MULTIPLE_WhatsApp Business_NOTES' => 'Opmerking:<br> 1. Om ervoor te zorgen dat gebruikers WhatsApp Business door de andere gebruikers kunnen zien, voegt u die gebruikers toe aan één groep.<br>2. Elke gebruiker van een groep scant WhatsApp Business dan heeft hij toegang tot WhatsApp Business voor andere gebruikers van dezelfde groep.<br>3. U kunt individuele gebruikers toevoegen aan WhatsApp Business Too.',

	'MULTIPLE_WhatsApp Business_NOTES1' => 'Gebruikers/groepen toevoegen/verwijderen om meerdere WhatsApp Business # te gebruiken',
	'MW_LABEL1' => 'Wie scant WhatsApp Business? (Gebruiker)',
	'MW_LABEL2' => 'Wie gebruiken WhatsApp Business? (Gebruikers/Groepen)',
	'MW_ACTIVE' => 'Actief',
	'MW_ACTION' => 'Actie',

	'LBL_ADD_MORE_USERS' => 'Meer gebruikers toevoegen',
	'LBL_PLEASE_WAIT' => 'Even geduld aub....',
	'LBL_PHONECONNECTED' => 'Telefoon internet verbroken',
	'NAVIGATETIMELINE' => 'om WhatsApp Business-berichten naar uw contacten te verzenden / ontvangen',
	'CLICK' => 'Klik',
	'PLEASEWAITSCANQRCODE' => 'Even geduld a.u.b. Het kan tot 30 seconden duren voordat de QR-code is geladen...',
	'LBL_AUTORESPONDER_LABEL' => 'Klant heeft dit bericht de eerste keer automatisch ontvangen',
);

$jsLanguageStrings = Array(
	'MSG_WhatsApp Business_DEACTIVATE_POPUP' => 'Weet u zeker dat u uw licentiecode wilt deactiveren?',
	'MSG_WhatsApp Business_POPUP1' => 'Hiermee worden alle modules van CTWhatsApp BusinessBusiness met opgeslagen gegevens met betrekking tot CTWhatsApp BusinessBusiness en uw account bij CRMTiger.com verwijderd. <br/>
     Als u premium-abonnees bent, wordt de facturering geannuleerd vanaf de volgende betalingscyclus. ',
	'MSG_WhatsApp Business_POPUP1_2' => 'Weet u zeker dat u uw account wilt sluiten?',
    'MSG_WhatsApp Business_POPUP2' => 'We sluiten uw account. Wil je doorgaan ?',
    'MSG_WhatsApp Business_UNISTALL_SUCCESS' => 'CTWhatsApp BusinessBusiness verwijderd!',
    'WhatsApp Business_UNISTALL_SUCCESS' => 'CTWhatsApp BusinessBusiness is succesvol verwijderd',
    'MSG_WhatsApp Business_UNISTALL_FAILED' => 'Verwijderen mislukt! Neem contact met ons op. ',
    'WhatsApp Business_UNISTALL_FAILED' => 'Verwijderen mislukt!',
    'DELETEMODULE' => 'Weet u zeker dat u dit record wilt verwijderen?',
    'MSG_UPDATEMODULE' => 'Weet u zeker dat u WhtasappModule wilt updaten?',
    'UPDATEMODULE' => 'Een probleem bij het bijwerken van WhatsApp Business-module',
    'LBL_SCANQRCODEAGAIN' => 'Uw instantie is nog niet geactiveerd - Scan de QR-code opnieuw',
    'LBL_LICENSEEXPIRE' => 'Uw licentie is verlopen',
    'ENTERLICENSEKEY' => 'Voer de licentiecode in',
    'ENTERAPIKEY' => 'Voer de API-sleutel in',
    'ENTERAPIKEYAUTHKEY' => 'Voer de verificatietoken in',
    'MULTIPLETOSINGLE' => 'Wijziging van Single naar meerdere gebruikers of Meerdere gebruikers naar Single zal alle WhatsApp Business-verbindingen wissen - Bevestig alstublieft',
    'CURENT_VERSION' => 'Jouw WhatsApp Business-versie',
    'LATEST_VERSION' => 'Huidige WhatsApp Business-versie',
);

?>
