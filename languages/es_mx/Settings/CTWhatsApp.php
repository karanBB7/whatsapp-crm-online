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
	'LBL_WHATSAPP_CONFIGURATION' => 'Configuración de WhatsApp',
	'LBL_WHATSAPP_INFORMATION' => 'Información de WhatsApp',
	'LBL_ACCESS_MODULE_TO_WHATSAPP' => 'Elija módulos / campos para obtener acceso a WhatsApp',
	'API_URL' => 'API URL',
	'API_KEY' => 'API Key',
	'AUTH_TOKEN' => 'Token de autenticación',
	'CUSTOMFIELD1' => 'Código de País',
	'COUNRTYCODEINFO' => '(Especifique el código de país solo si el número de WhatsApp en el registro no tiene código de país)',
	'CUSTOMFIELD2' => 'Número de WhatsApp',
	'WHATSAPPNO' => 'My WhatsApp No',
	'MODULES' => 'Módulo',
	'WHATSAPP_NO_FIELD' => 'Whasapp # campo',
	'LBL_CHANGE_NUMBER' => 'Cambie el número',
	'ACTIVE' => 'Activo',
	'LBL_LICENSE_SETUP' => 'Configuración de licencia',
	'ACTION' => 'Acción',
	'ALLOW_MODULE' => 'Permitir módulo seleccionado',
	'WHATSAPP_PHONE_FIELD' => 'Campo Teléfono de WhatsApp',
	'ASSIGNTO' => 'Permitir acceso a usuarios',
	'LBL_SHOWUNKNOWNMESSAGES' => 'Mostrar mensajes desconocidos',
	'LBL_THEME' => 'Vista WhatsApp',
	'LBL_DEACTIVATE'=>'Desactivar',
	'LBL_RTL' => 'Vista de derecha a izquierda (preferiblemente país de Medio Oriente)',
	'LBL_LTR' => 'Vista de izquierda a derecha (predeterminado)',
	'LBL_SCANQR_CODE' => 'Conecta WhatsApp',
	'LBL_LOGOUT' => 'Cerrar sesión',
	'LBL_REBOOT_WHATSAPP' => 'Reiniciar WhatsApp',
	'LBL_CHANGE_NUMBER' => 'Cambie el número',
	'LBL_SELECT_AN_OPTION' => 'Seleccione una opción',
	'LBL_CLOSE'=>'Cerca',
	'LBL_YES'=>'si',
	'LBL_NO'=>'No',
	'LBL_UPGRADE' => 'Prima',
	'LBL_EXPIRE' => 'Expira en',
	'LBL_DAYS' => 'dias',
	'LBL_UPDATE' => 'Actualizar',
	'WHATSAPPCONNECTED' => 'Estás conectado con WhatsApp',
	'CODEINFORMATION' => 'Escanee el código QR: espere 60 segundos para que WhatsApp se conecte',
	'LBL_MASS_CONFIGURATION' => 'Configuración de mensajes masivos',
	'LBL_BATCHSIZE' => 'Tamaño del lote (# de mensajes)',
	'LBL_TIMEINTERVAL' => 'Intervalo de tiempo (En minutos)',
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
	'BATCHINFORMATION' => 'El <b> tamaño de lote </b> permite al usuario enviar mensajes masivos en lotes de mensajes para evitar el envío de spam. <br>
Ejemplo: si desea enviar 500 mensajes y establece un tamaño de lote de 15 y un intervalo de tiempo de 15 minutos. Luego se enviarán 15 mensajes en cada lote en función del intervalo de tiempo basado en el cálculo a continuación. <br>
<b> Tiempo para enviar 500 mensajes </b> = (500 mensajes / 15 Tamaño de lote) * 15 minutos = 500 minutos = 8 horas aproximadamente.',
	'RANDOMINFORMATION' => '<b> Aleatorio </b>: la selección aleatoria selecciona dinámicamente cualquier número del 1 al 25 como tamaño de lote al enviar un mensaje al cliente, lo que significa que si hay 500 mensajes para enviar y Tamaño de lote: aleatorio, enviará 5 mensajes en primer lote, 8 mensajes en un segundo lote, etc.',
	'TIMEINTREVALINFORMATION' => '<b> Intervalo de tiempo </b>: permite a los usuarios enviar mensajes masivos en un lote de mensajes para evitar el spam o el bloqueo de WhatApp #. <br>
<b> Ejemplo </b>: si desea enviar 500 mensajes y establece un tamaño de lote de 15 y un intervalo de tiempo establecido en 15 minutos. Luego enviará 15 mensajes en cada lote en cada intervalo de tiempo especificado según el cálculo a continuación.
Tiempo para enviar 500 mensajes = (500 mensajes / 15 Tamaño de lote) * 15 minutos = 500 minutos = 8 horas aproximadamente.',
	'WHATSAPP_POLICY' => 'Política de WhatsApp',
	'POLICYINFORMATION' => 'Notas importantes: <br> 1. Recomendamos seguir',
	'POLICYINFORMATION1' => 'al enviar mensajes masivos de WhatsApp desde CRM. <br>
2. Es aconsejable configurar el Tamaño de lote mínimo y el Intervalo de tiempo máximo entre cada mensaje para enviar mensajes de WhatsApp de forma segura cuando esté utilizando la función Mensaje masivo. <br>
3. WhatsApp almacena números con código de país, por lo tanto, si su número no tiene código de país, configure el "Código de país" en Configuración de WhatsApp para todos los números de CRM de WhatsApp. <br> <br>
Formato sugerido para almacenar registros con el número de WhatsApp, formato de ejemplo: 1987654321 donde "1" es el código del país y "987654321" es su número local.',
	'Whatsapp Configuration' => 'Configuración de WhatsApp',
	'LBL_UNKNOWNINFORMATION' => 'Si el mensaje de WhatsApp ha sido enviado por un cliente cuyo número no está en CRM como Registro y si desea permitir que todos los usuarios que no sean administradores vean ese número, habiliten esta función. Por lo tanto, todos los usuarios que no sean administradores pueden ver esos mensajes haciendo clic en el ícono Global WhatsApp y verlo en "Mensaje de números desconocidos"',
	'LBL_CLOSE_ACCOUNT'=>'Cerrar mi cuenta',
	'LBL_CLOSE' => 'Cerca',
	'CLOSE' => 'Cerca',

	'LBL_ACTIVE' => 'Activo',
	'RQRCODEINFORMATION' => 'Nota: antes de escanear el código QR, siga las instrucciones a continuación. <br> <br>',
	'RQRCODEINFORMATION1' => '1. Abra WhatsApp en su teléfono. <br>
2. Toque Menú o Configuración y seleccione WhatsApp Web <br>
3. Apunte su teléfono a la pantalla del código QR cuando haga clic en el botón "Escanear código QR" <br> <br>',

	'RQRCODEINFORMATION2' => 'Para obtener más información, haga clic en',
	'RQRCODEINFORMATION3' => 'Cómo escanear un código QR',
	'CLICKHERE' => 'haga clic aquí',
	'HOWTOSCANCODE' => 'Cómo escanear un código QR',
	'LBL_LICENSE_CONFIGURATION' => 'Configurar la licencia de WhatsApp',
	'LICENSEKEY' => 'Clave de licencia',
	'APIKEY' => 'Clave API',
	'NEXTBUTTON1' => 'Haga clic en el botón "Siguiente" solo después de los siguientes pasos a continuación.',
	'NEXTBUTTON2' => '1. Escanee el código QR desde su teléfono móvil.
2. Después de escanear el código QR, haga clic en "Escanear código QR" nuevamente y aparecerá <br/>
"Sin código QR de imagen". Haga clic en el botón Siguiente solo después de que aparezca "Sin imagen de código QR". <br/>
3. Espere 1 minuto después de escanear el código QR',
	'Save' => 'Salvar',
	'Cancel' => 'Cancelar',
	'WHATSAPPCONNECTED' => 'Estas conectada a <br> Número de WhatsApp:',
	'LBL_UPGRADETITLE' => 'haga clic para actualizar a la versión premium',
	'LBL_LICENSETITLE' => 'haga clic para actualizar la clave de licencia',
	'LBL_UPDATETITLE' => 'haga clic para obtener una versión actualizada de "Integración de WhatsApp" de CRMTiger.com',
	'LBL_IMPORT_CONTACTS' => 'Importar contactos',
	'LBL_IN_APP_NOTIFICATION' => 'Notificación InApp',//In App Notification
	'NO_NOTIFICATION_INTERVAL' => 'Sin intervalo de notificación',//In App Notification

	//Add new functionality
    'WHATSAPPMANAGEMENT' => 'Gestión de # de WhatsApp',
    'SINGLE_WHATSAPP' => 'Número único de WhatsApp para CRM',
    'MULTIPLE_WHATSAPP' => 'Número múltiple de WhatsApp para usuarios o grupos',
    'ALLOCATEMULTIPLEWHATSAPP' => 'Agregue usuarios / grupos para acceder o escanear múltiples WhatsApp',
    'LBL_EXPORTRECORD' => 'Exportar registro',
	'LBL_EXPORTRECORDDES1' => 'Haga clic en el botón Descargar contactos para descargar el archivo Contacts.csv de todos sus contactos de WhatsApp e importarlo a su módulo respetado de vTiger CRM para enviar / recibir mensajes de WhatsApp.',
	'LBL_EXPORTRECORDDES2' => 'Resumen de contactos de WhatsApp',
	'LBL_EXPORTRECORDDES3' => 'Tregistro total',
	'LBL_EXPORTRECORDDES4' => 'Nota: el archivo CSV solo contiene Nombre y Número, en algunos casos si el contacto no tiene nombre, ir no se mostrará en CSV',
	'LBL_EXPORTRECORDDES5' => 'Descargar contactos',
	'QRCODE_ERROR' => 'Problema en el código QR de la pantalla; inténtelo más tarde',
	'RQRCODEINFORMATION4' => 'La integración de WhatsApp solo funciona si el número que escanea aquí
debe desconectarse (Cerrar sesión) de la interfaz Web.WhatsApp.',
    //Add new functionality
	
	'LBL_AUTORESPONDER' => 'Respuesta automática',
	'LBL_AUTORESPONDERTEXT' => 'Texto de respuesta automática',

	'LBL_WHATSAPP_CONFIGURATION_USERS' => 'Usuarios conectadas de WhatsApp',
	'LBL_USERS' => 'Nombre de usuario',
	'LBL_CONNECTED' => 'Conectada',
	'LBL_DISCONNECTED' => 'No conectada',
	'LBL_SCAN_YOU_NUMBER' => 'Escanea tu número de WhatsApp',

	'LBL_WHATSAPP_MODULE_NUMBERTO_ACCESS' => 'Módulo / número de WhatsApp Acceso al usuario',
	'LBL_GENERAL_SEETINGS' => 'Configuración general',
	'LBL_AUTO_MESSAGE_RESPONDER' => 'Respuesta automática de mensajes',
	'LBL_COUNTRYCODE_DESCRIPTION' => "- WhatsApp requiere un número que es un código de país, por lo que si el registro del número de teléfono del cliente no tiene el código de país y está marcado como número de WhatsApp, agregue el código de país aquí, que lo agregará como prefijo a todos sus números al enviar mensaje. <br> - NO USE esta función si tiene un número de teléfono de varios países, ya que esta función se aplica a todos los números de teléfono. ",
	'LBL_AUTO_MESSAGE_RESPONDER_DESCRIPTION' => '<b> Nota: </b> El contestador automático de mensajes solo se envía al usuario si el mensaje se envía por primera vez en 24 horas.',
	'LBL_SELECT_MODULE_ERROR' => 'Seleccione al menos un uso de módulo para WhatsApp',
	'LBL_SELECT_MULTIPLEUSER_ERROR' => 'Seleccione al menos un usuario en Asignar varios WhatsApp a.',
	'MULTIPLE_WHATSAPP_NOTES' => 'Nota: <br> 1. Para que los usuarios vean el escaneo de WhatsApp de los otros usuarios, agregue a esos usuarios en un grupo. <br> 2. Cualquier usuario de WhatsApp de escaneo grupal, accederá a WhatsApp a otros usuarios del mismo grupo. <br> 3. También puede agregar usuarios individuales a WhatsApp.',

	'MULTIPLE_WHATSAPP_NOTES1' => 'Agregar / Eliminar usuarios / grupos para usar varios números de WhatsApp',
	'MW_LABEL1' => '¿Quién escanea WhatsApp? (Usuario)',
	'MW_LABEL2' => '¿Quién usa WhatsApp? (Usuarios / Grupos) ',
	'MW_ACTIVE' => 'Activo',
	'MW_ACTION' => 'Acción',

	'LBL_ADD_MORE_USERS' => 'Agregar más usuarios',
	'LBL_PLEASE_WAIT' => 'Espere por favor....',
	'LBL_STATUS' => 'Estado',
	'LBL_PHONECONNECTED' => 'Internet del teléfono desconectado',
	'NAVIGATETIMELINE' => 'para enviar / recibir mensajes de WhatsApp a sus contactos',
	'CLICK' => 'Hacer clic',
	'PLEASEWAITSCANQRCODE' => 'Espere ... Es posible que el código QR tarde hasta 30 segundos en cargarse ...',
	'LBL_AUTORESPONDER_LABEL' => 'El cliente recibió este mensaje automáticamente la primera vez',
	'LBL_WHATSAPPNOTIFICATION' => 'Notificación de inserción de WhatsApp',
	'LBL_NOTIFICATION_TONE' => 'Tono de notificación',
	'LBL_SILENT' => 'Silencioso',
	'LBL_WHATSAPPLOG' => 'Registro de WhatsApp',
	'LBL_WHATSAPPNOTIFICATION' => 'Notificación de inserción de WhatsApp',

	'LBL_WHASAPP_TON' => 'Predeterminado de WhatsApp',
	'LBL_WHASAPP_HANGOUT_MESSAGE' => 'Mensaje de conversación',
	'LBL_BOT_IDEALTIME' => 'Hora ideal del bot',

	'Bot Ideal Time' => 'Hora ideal del bot',
	'Minutes' => 'Minutos',
	'WhatsApp Bot' => 'Robot de Whatsapp',
	'Hangout Message'=>'Mensaje de conversación',
	'WhatsApp Default'=>'Predeterminado de WhatsApp',
	'LBL_ATLEAST_CREATE_RECORD' => '¡Agregue al menos un acceso de número de WhatsApp al usuario!',
	'LBL_ALLOW_MASS_MESSAGE_USERS' => 'Permitir acceso a mensajes masivos',
);

$jsLanguageStrings = Array(
	'MSG_WHATSAPP_DEACTIVATE_POPUP'=>'¿Estás segura de que deseas desactivar tu clave de licencia?',
	'MSG_WHATSAPP_POPUP1'=>'Esto desinstalará todos los módulos de CTWhatsApp con datos almacenados relacionados con CTWhatsApp, así como su cuenta con CRMTiger.com. <br/>
     Si es suscriptor premium, la facturación se cancelará a partir del próximo ciclo de facturación.',
	'MSG_WHATSAPP_POPUP1_2'=>'¿Estás segura de que deseas cerrar tu cuenta?',
    'MSG_WHATSAPP_POPUP2'=>'Estamos cerrando su cuenta. Quieres proceder ?',
    'MSG_WHATSAPP_UNISTALL_SUCCESS'=>'CTWhatsApp desinstalada!',
    'WHATSAPP_UNISTALL_SUCCESS'=>'CTWhatsApp se ha desinstalado correctamente',
    'MSG_WHATSAPP_UNISTALL_FAILED'=>'Desinstalar Falló! Por favor contáctenos.',
    'WHATSAPP_UNISTALL_FAILED'=>'Desinstalar Falló!',
    'DELETEMODULE' => '¿Estás segura de eliminar WhtasappModule?',
    'MSG_UPDATEMODULE' => '¿Estás segura de actualizar WhtasappModule?',
    'UPDATEMODULE' => 'Algún problema en el módulo de actualización de Whatsapp',
    'LBL_SCANQRCODEAGAIN' => 'Su instancia aún no está activada. Vuelva a escanear el código QR',
    'LBL_LICENSEEXPIRE' => 'Su licencia ha expirado',
    'ENTERLICENSEKEY' => 'Por favor, introduzca la clave de licencia',
    'ENTERAPIKEY' => 'Por favor, introduzca la clave API',
    'ENTERAPIKEYAUTHKEY' => 'Por favor, introduzca el token de autenticación',
    'MULTIPLETOSINGLE'=>'Cambiar de Único a múltiples usuarios o Múltiples usuarios a Único borrará todas las conexiones de WhatsApp - Confirme',
    'JS_SELECT_MODULE' => 'Seleccione el módulo.',
    'CURENT_VERSION' => 'Tu versión de WhatsApp',
    'LATEST_VERSION' => 'Versión actual de WhatsApp',
);

?>
