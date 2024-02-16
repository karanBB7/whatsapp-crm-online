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
	'LBL_WHATSAPP_CONFIGURATION' => 'Configurazione di WhatsApp',
	'LBL_WHATSAPP_INFORMATION' => 'Informazioni di WhatsApp',
	'LBL_ACCESS_MODULE_TO_WHATSAPP' => 'Scegli moduli/campi per ottenere laccesso a WhatsApp',
	'API_URL' => 'API URL',
	'API_KEY' => 'Chiave API',
	'AUTH_TOKEN' => 'Token di autenticazione',
	'LBL_SCANQR_CODE' => 'Connetti WhatsApp',
	'LBL_SELECTANOPTION' => 'Seleziona un opzione',
	'WhatsApp Configuration' => 'Configurazione di WhatsApp',
	'Next' => 'Il prossimo',
	'LBL_LOGOUT' => 'Disconnettersi',
	'LBL_DEACTIVATE'=>'Disattivare',
	'LBL_SELECT_AN_OPTION' => 'Seleziona un opzione',
	'LBL_REBOOT_WHATSAPP' => 'Riavvia WhatsApp',
	'LBL_LICENSE_SETUP' => 'Configurazione della licenza',
	'LBL_WHATSPP_LICENSE_KEY' => 'Chiave di licenza Whatspp',
	'LBL_CHANGE_NUMBER' => 'Cambia numero',
	'CUSTOMFIELD1' => 'Prefisso paese',
	'COUNRTYCODEINFO' => '(Especifique el código de país solo si el número de WhatsApp en el registro no tiene código de país)',
	'CUSTOMFIELD2' => 'Numero WhatsApp',
	'WHATSAPPNO' => 'My WhatsApp No',
	'MODULES' => 'Modulo',
	'WHATSAPP_NO_FIELD' => 'WhatsApp # campo',
	'ACTIVE' => 'Attivo',
	'ACTION' => 'Azione',
	'ALLOW_MODULE' => 'Consenti modulo selezionato',
	'WHATSAPP_PHONE_FIELD' => 'Campo telefono di WhatsApp',
	'ASSIGNTO' => 'Permetti accesso a utenti',
	'LBL_SHOWUNKNOWNMESSAGES' => 'Mostra messaggi sconosciuti',
	'LBL_THEME' => 'Vista WhatsApp',
	'LBL_RTL' => 'Vista da destra a sinistra (paese del Medio Oriente preferibile)',
	'LBL_LTR' => 'Vista da sinistra a destra (impostazione predefinita)',
	'LBL_UPGRADE' => 'premio',
	'LBL_EXPIRE' => 'Scade tra',
	'LBL_DAYS' => 'giorni',
	'LBL_UPDATE' => 'Aggiornare',
	'WHATSAPPCONNECTED' => 'Sei connesso con WhatsApp',
	'CODEINFORMATION' => 'Scansiona codice QR - Attendi 60 secondi per la connessione di WhatsApp',
	'LBL_MASS_CONFIGURATION' => 'Configurazione dei messaggi di massa',
	'LBL_BATCHSIZE' => 'Dimensione del lotto (N. di messaggi)',
	'LBL_TIMEINTERVAL' => 'Intervallo di tempo (In minuti)',
	'COUNTRYCODE_POPUP' => 'Código de país',
	'COUNTRYCODE_POPUP0' => 'Código de país',
	'COUNTRYCODE_POPUP1' => 'Esta es una configuración importante antes de comenzar a usar la integración de WhatsApp. Número de teléfono de WhatsApp Store con código de país Significa que si su número de teléfono es 6308618263 y el código de país es +1 que el número de tienda de WhatsApp como "16308618263"',
	'COUNTRYCODE_POPUP2' => 'Si tiene algún registro de tener un número de teléfono sin código de país, siga las instrucciones a continuación.',
	'COUNTRYCODE_POPUP3' => 'Número de teléfono de WhatsApp sin código de país en Registros:',
	'COUNTRYCODE_POPUP4' => 'En este escenario, ingrese el código de país, si desea aplicar el código de país como prefijo a todos los "números de teléfono" de todos los módulos donde ha habilitado la integración de WhatsApp. Por lo tanto, cada vez que se envía un mensaje de WhatsApp desde CRM, se agregará Prefijo porque WhatsApp requirió "Código de país" para enviar un mensaje de contacto. <br>
Por ejemplo: si el número de teléfono registrado es "987654321" y el código del país es "+1", el número de WhatsApp se convertirá en "1987654321"
',
	'COUNTRYCODE_POPUP5' => 'Grabe con el código de país como prefijo:',
	'COUNTRYCODE_POPUP6' => 'Si ya tiene un registro con el código de país, en este caso, mantenga el campo de código de país "En blanco"',
	'BATCHINFORMATION' => '<b> Dimensione batch </b> consente allutente di inviare messaggi di massa in batch di messaggi per evitare lo spamming. <br>
Esempio: se si desidera inviare 500 messaggi e si imposta una dimensione batch 15 e Intervallo di tempo su 15 minuti. Quindi verranno inviati 15 messaggi in ciascun batch in base allintervallo di tempo basato sul calcolo di seguito. <br>
<b> Tempo per inviare 500 messaggi </b> = (500 messaggi / 15 Dimensioni batch) * 15 minuti = 500 minuti = 8 ore circa.',
	'RANDOMINFORMATION' => '<b> Casuale </b>: la selezione casuale seleziona dinamicamente qualsiasi numero compreso tra 1 e 25 come dimensione batch quando si invia un messaggio al cliente, significa che ci sono 500 messaggi da inviare e Dimensione batch - Casuale di quanto invierà 5 messaggi in primo batch, 8 messaggi in un secondo batch e così via ..',
	'TIMEINTREVALINFORMATION' => '<b> Intervallo di tempo </b>: consente agli utenti di inviare messaggi di massa in una serie di messaggi per evitare lo spamming o WhatApp # da bloccare. <br>
<b> Esempio </b>: se si desidera inviare 500 messaggi e si imposta una dimensione batch 15 e un intervallo di tempo impostato su 15 minuti. Quindi invierà 15 messaggi in ciascun batch in ogni intervallo di tempo specificato come da calcolo di seguito.
Tempo di invio 500 messaggi = (500 messaggi / 15 Dimensioni batch) * 15 minuti = 500 minuti = 8 ore circa.',
	'WHATSAPP_POLICY' => 'Politica di WhatsApp',
	'POLICYINFORMATION' => 'Note importanti: <br> 1. Si consiglia di seguire',
	'POLICYINFORMATION1' => 'quando si invia un messaggio WhatsApp di massa da CRM. <br>
2. È consigliabile configurare le dimensioni minime di lotto e lintervallo di tempo massimo tra ciascun messaggio per inviare messaggi WhatsApp in sicurezza quando si utilizza la funzione Messaggio di massa. <br>
3. WhatsApp memorizza i numeri con il prefisso internazionale, quindi se il tuo numero non ha un prefisso internazionale, imposta "Prefisso internazionale" nella configurazione di WhatsApp per tutti i numeri di CRM di WhatsApp. <br>
Formato suggerito per memorizzare i record con il numero WhatsApp, formato di esempio: 1987654321 dove "1" è il prefisso internazionale e "987654321" è il tuo numero locale.',
	'Whatsapp Configuration' => 'Configurazione di WhatsApp',
	'LBL_UNKNOWNINFORMATION' => 'Se il messaggio WhatsApp è stato inviato dal cliente il cui numero non è in CRM come record e se si desidera consentire a tutti gli utenti non amministratori di vedere quel numero, è necessario abilitare questa funzione. Quindi tutti gli utenti non amministratori possono vedere quei messaggi facendo clic sullicona Global WhatsApp e vederli in "Messaggio da numeri sconosciuti"',
	'LBL_CLOSE_ACCOUNT'=>'Chiudi il mio account',
	'LBL_CLOSE' => 'Cerca',
	'CLOSE' => 'Cerca',

	'LBL_ACTIVE' => 'Attiva',
	'RQRCODEINFORMATION' => 'Nota: prima di eseguire la scansione del codice QR, seguire le istruzioni riportate di seguito. <br> <br>',
	'RQRCODEINFORMATION1' => '1. Apri WhatsApp sul tuo telefono. <br>
2. Tocca Menu o Impostazioni e seleziona WhatsApp Web <br>
3. Puntare il telefono sul display del codice QR quando si fa clic sul pulsante "Scansione codice QR" <br> <br>',

	'RQRCODEINFORMATION2' => 'Per maggiori informazioni clicca',
	'RQRCODEINFORMATION3' => 'How to scan a QR code',
	'CLICKHERE' => 'qui',
	'HOWTOSCANCODE' => 'Come scansionare un codice QR',
	'LBL_LICENSE_CONFIGURATION' => 'Configura licenza WhatsApp',
	'LICENSEKEY' => 'Chiave di licenza',
	'APIKEY' => 'Chiave API',
	'NEXTBUTTON1' => 'Fare clic sul pulsante "Avanti" solo dopo i seguenti passaggi.',
	'NEXTBUTTON2' => '1. Scansiona il codice QR dal tuo cellulare. <br>
2. Dopo aver scansionato il codice QR, fai di nuovo clic su "Scansiona codice QR" e apparirà <br>
"Nessuna immagine QR code". Fare clic sul pulsante successivo solo dopo che viene visualizzato "Nessuna immagine del codice QR". <br>
3. Attendere 1 minuto dopo la scansione del codice QR',
	'Save' => 'Salva',
	'Cancel' => 'Annulla',
	'WHATSAPPCONNECTED' => 'Sei connesso a <br> Numero WhatsApp:',
	'WhatsApp' => 'WhatsApp',
	'LBL_UPGRADETITLE' => 'fare clic per passare alla versione premium',
	'LBL_LICENSETITLE' => 'fare clic per aggiornare il codice di licenza',
	'LBL_UPDATETITLE' => 'fare clic per ottenere una versione aggiornata di "Integrazione WhatsApp" da CRMTiger.com',
	'LBL_IMPORT_CONTACTS' => 'Importar contactos',
	'LBL_IN_APP_NOTIFICATION' => 'Notifica InApp',//In App Notification
	'NO_NOTIFICATION_INTERVAL' => 'Nessuna notifica Intervallo',//In App Notification

	//Add new functionality
    'WHATSAPPMANAGEMENT' => 'Gestione WhatsApp #',
    'SINGLE_WHATSAPP' => 'Numero unico WhatsApp per il CRM',
    'MULTIPLE_WHATSAPP' => 'Numero multiplo di WhatsApp per utenti o gruppi',
    'ALLOCATEMULTIPLEWHATSAPP' => 'Aggiungi utenti/gruppi per accedere o scansionare più WhatsApp',
    'LBL_EXPORTRECORD' => 'Esporta record',
	'LBL_EXPORTRECORDDES1' => 'Fai clic sul pulsante Scarica contatti per scaricare il file contacts.csv di tutti i tuoi contatti WhatsApp e importalo nel tuo rispettato modulo di vTiger CRM per inviare / ricevere messaggi WhatsApp.',
	'LBL_EXPORTRECORDDES2' => 'Riepilogo contatti WhatsApp',
	'LBL_EXPORTRECORDDES3' => 'Record totale',
	'LBL_EXPORTRECORDDES4' => 'Nota: il file CSV contiene solo nome e numero, per alcuni casi se il contatto non ha un nome, ir non verrà visualizzato in CSV',
	'LBL_EXPORTRECORDDES5' => 'Scarica contatti',
	'QRCODE_ERROR' => 'Problema nel codice QR visualizzato: riprova più tardi',
	'RQRCODEINFORMATION4' => 'Lintegrazione di WhatsApp funziona solo se il numero di cui esegui la scansione qui
dovrebbe essere disconnesso (Logout) dallinterfaccia Web.WhatsApp.',
    //Add new functionality

	'LBL_AUTORESPONDER' => 'Risposta automatica',
	'LBL_AUTORESPONDERTEXT' => 'Testo risposta automatica',
	'LBL_WHATSAPP_CONFIGURATION_USERS' => 'Utenti connessi a WhatsApp',
	'LBL_USERS' => 'Nome utente',
	'LBL_CONNECTED' => 'Collegata',
	'LBL_DISCONNECTED' => 'Non connesso',
	'LBL_SCAN_YOU_NUMBER' => 'Scansiona il tuo numero WhatsApp',

	'LBL_WHATSAPP_MODULE_NUMBERTO_ACCESS' => 'Modulo/numero WhatsApp Accesso utente',
	'LBL_GENERAL_SEETINGS' => 'Impostazioni generali',
	'LBL_AUTO_MESSAGE_RESPONDER' => 'Risponditore automatico dei messaggi',
	'LBL_COUNTRYCODE_DESCRIPTION' => "- WhatsApp ha richiesto che un numero sia un prefisso nazionale, quindi se il numero di telefono del cliente non ha il prefisso internazionale ed è contrassegnato come WhatsApp #, aggiungi il prefisso internazionale qui che lo aggiungerà come prefisso a tutto il tuo numero durante l'invio messaggio.<br>- NON UTILIZZARE questa funzione se disponi di un numero di telefono di più paesi poiché questa funzione si applica a tutti i numeri di telefono.",
	'LBL_AUTO_MESSAGE_RESPONDER_DESCRIPTION' => "<b>Nota: </b>Il risponditore automatico dei messaggi invia all'utente solo se il messaggio viene inviato per la prima volta in 24 ore.",
	'LBL_SELECT_MODULE_ERROR' => 'Seleziona almeno un modulo da utilizzare per WhatsApp',
	'LBL_SELECT_MULTIPLEUSER_ERROR' => 'Seleziona almeno un utente in Assegna più WhatsApp a.',
	'MULTIPLE_WHATSAPP_NOTES' => 'Nota:<br> 1. Affinché gli utenti possano vedere la scansione di WhatsApp da parte degli altri utenti, aggiungere tali utenti in un gruppo.<br>2. Qualsiasi utente del gruppo scansiona WhatsApp che accederà a WhatsApp ad altri utenti dello stesso gruppo.<br>3. Puoi aggiungere anche singoli utenti a WhatsApp.',

	'MULTIPLE_WHATSAPP_NOTES1' => 'Aggiungi/Rimuovi Utenti/Gruppi per usare WhatsApp #',
	'MW_LABEL1' => 'Chi esegue la scansione di WhatsApp? (Utente)',
	'MW_LABEL2' => 'Chi usa WhatsApp? (Utenti/Gruppi)',
	'MW_ACTIVE' => 'Attivo',
	'MW_ACTION' => 'Azione',

	'LBL_ADD_MORE_USERS' => 'Aggiungi altri utenti',
	'LBL_PLEASE_WAIT' => 'Attendere prego....',
	'LBL_STATUS' => 'Stato',
	'LBL_PHONECONNECTED' => 'Telefono Internet disconnesso',
	'NAVIGATETIMELINE' => 'per inviare/ricevere messaggi WhatsApp ai tuoi contatti',
	'CLICK' => 'Clic',
	'PLEASEWAITSCANQRCODE' => 'Attendere.. Il caricamento del codice QR potrebbe richiedere fino a 30 secondi...',
	'LBL_AUTORESPONDER_LABEL' => 'Il cliente ha ricevuto questo messaggio automaticamente la prima volta',
	'LBL_WHATSAPPNOTIFICATION' => 'Notifica push di WhatsApp',
	'LBL_NOTIFICATION_TONE' => 'Tono di notifica',
	'LBL_SILENT' => 'Silenzioso',
	'LBL_WHATSAPPLOG' => 'Registro WhatsApp',
	'LBL_WHATSAPPNOTIFICATION' => 'Notifica push WhatsApp',

	'LBL_WHASAPP_TON' => 'Predefinito WhatsApp',
	'LBL_WHASAPP_HANGOUT_MESSAGE' => 'Messaggio Hangout',
	'LBL_BOT_IDEALTIME' => 'Tempo ideale del robot',

	'Bot Ideal Time' => 'Bot Tempo ideale',
	'Minutes' => 'Minuti',
	'WhatsApp Bot' => 'Bot WhatsApp',
	'Hangout Message'=>'Impostazione predefinita di WhatsApp',
	'WhatsApp Default'=>'Impostazione predefinita di WhatsApp',
	'LBL_GROUP_NAME'=>'Nombre del grupo',
	'LBL_ATLEAST_CREATE_RECORD' => "Aggiungi almeno un accesso al numero WhatsApp all'utente!!!",
	'LBL_ALLOW_MASS_MESSAGE_USERS' => "Consenti l'accesso ai messaggi di massa",
);

$jsLanguageStrings = Array(
	'MSG_WHATSAPP_DEACTIVATE_POPUP'=>'Sei sicuro di voler disattivare la tua chiave di licenza?',
	'MSG_WHATSAPP_POPUP1'=>'Questo disinstallerà tutti i moduli di CTWhatsApp con i dati memorizzati relativi a CTWhatsApp e il tuo account con CRMTiger.com. <br/>
     Se sei abbonato premium, la fatturazione verrà annullata dal ciclo di fatturazione successivo.',
	'MSG_WHATSAPP_POPUP1_2'=>'Sei sicuro di voler chiudere il tuo account?',
    'MSG_WHATSAPP_POPUP2'=>'Stiamo chiudendo il tuo account. Vuoi procedere ?',
    'MSG_WHATSAPP_UNISTALL_SUCCESS'=>'CTWhatsApp disinstallato!',
    'WHATSAPP_UNISTALL_SUCCESS'=>'CTWhatsApp è stato disinstallato correttamente',
    'MSG_WHATSAPP_UNISTALL_FAILED'=>'Disinstallazione non riuscita! Si prega di contattarci.',
    'WHATSAPP_UNISTALL_FAILED'=>'Disinstallazione non riuscita!',
    'DELETEMODULE' => 'Eliminare questo record?',
    'MSG_UPDATEMODULE' => 'Sei sicuro di aggiornare WhtasappModule?',
    'UPDATEMODULE' => 'Qualche problema nellaggiornamento del modulo Whatsapp',
    'LBL_SCANQRCODEAGAIN' => 'La tua istanza non è ancora stata attivata: scansiona di nuovo il codice QR',
    'LBL_LICENSEEXPIRE' => 'La tua licenza è scaduta',
    'ENTERLICENSEKEY' => 'Immettere la chiave di licenza',
    'ENTERAPIKEY' => 'Immettere la chiave API',
    'ENTERAPIKEYAUTHKEY' => 'Immettere il token di autenticazione',
    'MULTIPLETOSINGLE'=>'Cambiare da singolo a più utenti o più utenti a singolo cancellerà tutte le connessioni WhatsApp - Conferma',
    'JS_SELECT_MODULE' => 'Si prega di selezionare il modulo.',
    'CURENT_VERSION' => 'La tua versione di WhatsApp',
    'LATEST_VERSION' => 'Versione attuale di WhatsApp',
);

?>
