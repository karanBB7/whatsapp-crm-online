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
	'LBL_WHATSAPP_CONFIGURATION' => 'Configuração de WhatsApp',
	'LBL_WHATSAPP_INFORMATION' => 'Informações do WhatsApp',
	'LBL_ACCESS_MODULE_TO_WHATSAPP' => 'Escolha módulos / campos para obter acesso ao WhatsApp',
	'API_URL' => 'URL API',
	'API_KEY' => 'Chave API',
	'AUTH_TOKEN' => 'Token de autenticação',
	'CUSTOMFIELD1' => 'Código do país',
	'COUNRTYCODEINFO' => '(Especifique o código do país apenas se o número do WhatsApp registrado não tiver o código do país)',
	'CUSTOMFIELD2' => 'Número do WhatsApp',
	'WHATSAPPNO' => 'Meu WhatsApp Não',
	'MODULES' => 'Módulo',
	'WHATSAPP_NO_FIELD' => 'Campo WhatsApp #',
	'ACTIVE' => 'Ativa',
	'ACTION' => 'Açao',
	'ALLOW_MODULE' => 'Permitir módulo selecionado',
	'WHATSAPP_PHONE_FIELD' => 'Campo WhatsApp Phone',
	'ASSIGNTO' => 'Permitir acesso aos usuários',
	'LBL_SHOWUNKNOWNMESSAGES' => 'Mostrar mensagens desconhecidas para usuário não administrador',
	'LBL_THEME' => 'Visualização da janela do WhatsApp',
	'LBL_LICENSE_SETUP' => 'Configuração de licença',
	'LBL_LICENSE_CONFIGURATION' => 'Configuração de Licença',
	'LBL_WHATSPP_LICENSE_KEY' => 'Chave de licença do Whatspp',
	'Enter License Key'=>'Insira chave da licença',
	'LBL_DEACTIVATE'=>'Desativar',
	'LBL_RTL'=>'Visualização da direita para a esquerda (país preferencial do Oriente Médio)',
	'LBL_LTR'=>'Visão da esquerda para a direita (padrão)',
	'LBL_SCANQR_CODE' => 'Conectar WhatsApp',
	'LBL_LOGOUT' => 'Sair',
	'LBL_REBOOT_WHATSAPP' => 'Reiniciar WhatsApp',
	'LBL_CHANGE_NUMBER' => 'Mudar o número',
	'LBL_SELECT_AN_OPTION' => 'Selecione uma opção',
	'LBL_CLOSE'=>'Perto',
	'LBL_YES'=>'sim',
	'LBL_NO'=>'Não',
	'LBL_UPGRADE' => 'Prêmio',
	'LBL_EXPIRE' => 'dias',
	'LBL_DAYS' => 'Expira em',
	'LBL_UPDATE' => 'Atualizar',
	'CLOSE' => 'Perto',
	'REQUIREDMISSING' => 'Campo obrigatório ausente',
	'LBL_SELECTANOPTION' => 'Selecione uma opção',
	'LBL_CANCEL' => 'Cancelar',
	'WHATSAPPCONNECTED' => 'Você está conectado com <br> número do WhatsApp:',
	'CODEINFORMATION' => 'Digitalize o código QR - aguarde 60 segundos para que o WhatsApp seja conectado',
	'LBL_MASS_CONFIGURATION' => 'Configuração de mensagens em massa',
	'LBL_BATCHSIZE' => 'Tamanho do lote (número de mensagens)',
	'LBL_TIMEINTERVAL' => 'Intervalo de tempo (em minutos)',
	'COUNTRYCODE_POPUP' => 'Código do país',
	'COUNTRYCODE_POPUP0' => 'Código do país',
	'COUNTRYCODE_POPUP1' => 'Esta é uma configuração importante antes de você começar a usar a integração com o WhatsApp. Número de telefone da loja do WhatsApp com código do país Significa que se o seu número de telefone é 6308618263 e o código do país é +1, o número da loja do WhatsApp é “16308618263”',
	'COUNTRYCODE_POPUP2' => 'Se você tiver algum registro com um número de telefone sem código de país, siga as instruções abaixo.',
	'COUNTRYCODE_POPUP3' => 'Número de telefone do WhatsApp sem código do país nos registros:',
	'COUNTRYCODE_POPUP4' => 'Neste cenário, insira o código do país, se desejar aplicar o código do país como um prefixo a todos os “Número de telefone” de todos os módulos em que você ativou a integração com o WhatsApp. Portanto, sempre que uma mensagem do WhatsApp for enviada do CRM, ele adicionará um Prefixo porque o WhatsApp exigiu o “Código do País” para enviar uma mensagem para o contato. <br>
Por exemplo: se o número de telefone do registro for “987654321” e o código do país for “+1”, o número do WhatsApp se tornará “1987654321”',
	'COUNTRYCODE_POPUP5' => 'Registre com o código do país como prefixo:',
	'COUNTRYCODE_POPUP6' => 'Se você já tiver um registro com o código do país, então, nestes cenários, mantenha o campo do código do país “Em branco”',
	'BATCHINFORMATION' => '<b> Tamanho do lote </b> permite ao usuário enviar mensagens em massa em lote de mensagens para evitar spam. <br>
Exemplo: se você deseja enviar 500 mensagens e é, defina um tamanho de lote 15 e o intervalo de tempo para 15 minutos. Em seguida, serão enviadas 15 mensagens em cada lote com base no Intervalo de Tempo com base no cálculo abaixo. <br>
<b> Tempo para enviar 500 mensagens </b> = (500 mensagens / 15 tamanho do lote) * 15 minutos = 500 minutos = 8 horas aproximadamente.',
	'RANDOMINFORMATION' => '<b> Aleatório </b>: a seleção aleatória seleciona dinamicamente qualquer número de 1 a 25 como tamanho de lote ao enviar mensagem ao cliente. Isso significa que se houver 500 mensagens para enviar e Tamanho de lote - Aleatório, enviará 5 mensagens em primeiro lote, 8 mensagens em um segundo lote e assim por diante.',
	'TIMEINTREVALINFORMATION' => '<b> Intervalo de tempo </b>: permite que os usuários enviem mensagens em massa em um lote de mensagens para evitar spam ou o WhatApp # bloqueado. <br>
<b> Exemplo </b>: se você deseja enviar 500 mensagens e define um tamanho de lote 15 e intervalo de tempo definido para 15 minutos. Em seguida, ele enviará 15 mensagens em cada lote em cada intervalo de tempo especificado conforme o cálculo abaixo.
Tempo para enviar 500 mensagens = (500 mensagens / 15 tamanho do lote) * 15 minutos = 500 minutos = 8 horas aproximadamente.',
	'WHATSAPP_POLICY' => 'Política de WhatsApp',
	'POLICYINFORMATION' => 'Observações importantes: <br> 1. Recomendamos seguir',
	'POLICYINFORMATION1' => 'ao enviar mensagens em massa do WhatsApp do CRM. <br>
2. É aconselhável configurar o tamanho mínimo do lote e o intervalo de tempo máximo entre cada mensagem para enviar mensagens do WhatsApp com segurança quando você estiver usando o recurso Mensagem em massa. <br>
3. O WhatsApp armazena números com o código do país, portanto, se o seu número não tiver o código do país, defina "Código do País" na Configuração do WhatsApp para todos os números do WhatsApp do CRM. <br> <br>
Formato sugerido para armazenar o registro com o número do WhatsApp, formato de exemplo: 1987654321 onde “1” é o código do país e “987654321” é o seu número local.',
	'Whatsapp Configuration' => 'Configuração de WhatsApp',
	'LBL_UNKNOWNINFORMATION' => 'Se a mensagem do WhatsApp foi enviada por um cliente cujo número não está no CRM como um registro e se você deseja permitir que todos os usuários não administradores vejam esse número, ative este recurso. Assim, todos os usuários que não são administradores podem ver essas mensagens clicando no ícone Global WhatsApp e vê-lo em "Mensagem de números desconhecidos"',
	'LBL_CLOSE_ACCOUNT'=>'Fechar minha conta',

	'LBL_ACTIVE' => 'Ativa',
	'RQRCODEINFORMATION' => 'Observação: antes de escanear o código QR, siga as instruções abaixo. <br> <br>',
	'RQRCODEINFORMATION1' => '1. Abra o WhatsApp no ​​seu telefone. <br>
2. Toque em Menu ou Configurações e selecione WhatsApp Web <br>
3. Aponte seu telefone para a tela do código QR ao clicar no botão “Digitalizar código QR” <br> <br>',

	'RQRCODEINFORMATION2' => 'Para mais informações clique',
	'RQRCODEINFORMATION3' => 'Como ler um código QR',
	'CLICKHERE' => 'aqui',
	'HOWTOSCANCODE' => 'Como ler um código QR',
	'LBL_LICENSE_CONFIGURATION' => 'Configurar licença do WhatsApp',
	'LICENSEKEY' => 'Chave de Licença',
	'APIKEY' => 'Chave API',
	'NEXTBUTTON1' => 'Clique no botão "Avançar" somente após as etapas a seguir. <br>',
	'NEXTBUTTON2' => '1. Digitalize o código QR do seu telefone celular.
2. Depois de escanear o código QR, clique em "Ler código QR" novamente e ele aparecerá <br>
"Código QR sem imagem". Clique no botão próximo somente depois que ele exibir "Nenhuma imagem de código QR". <br>
3. Aguarde 1 minuto após escanear o código QR',
	'Save' => 'Salve',
	'Cancel' => 'Cancelar',
	'WHATSAPPCONNECTED' => 'Você está conectado com o <br> número do WhatsApp:',
	'WhatsApp' => 'WhatsApp',
	'LBL_UPGRADETITLE' => 'Clique para atualizar para a versão premium',
	'LBL_LICENSETITLE' => 'Clique para atualizar a chave de licença',
	'LBL_UPDATETITLE' => 'Clique para obter uma versão atualizada de “Integração com WhatsApp” em CRMTiger.com',
	'LBL_IMPORT_CONTACTS' => 'Baixar contatos do WhatsApp',
	'LBL_IN_APP_NOTIFICATION' => 'Notificação InApp',
    'NO_NOTIFICATION_INTERVAL' => 'Sem intervalo de notificação',

    //Add new functionality
    'WHATSAPPMANAGEMENT' => 'Gerenciamento do WhatsApp #',
    'SINGLE_WHATSAPP' => 'Número único do WhatsApp para o CRM',
    'MULTIPLE_WHATSAPP' => 'Vários números do WhatsApp para usuários',
    'ALLOCATEMULTIPLEWHATSAPP' => 'Adicione usuários / grupos para acessar ou verificar vários WhatsApp',
    'LBL_EXPORTRECORD' => 'Exportar registro',
	'LBL_EXPORTRECORDDES1' => 'Clique no botão Baixar contatos para baixar o arquivo contacts.csv de todos os seus contatos do WhatsApp e importar para o seu módulo respeitado do vTiger CRM para enviar / receber mensagens do WhatsApp.',
	'LBL_EXPORTRECORDDES2' => 'Resumo dos contatos do WhatsApp',
	'LBL_EXPORTRECORDDES3' => 'Registro Total',
	'LBL_EXPORTRECORDDES4' => 'Observação: o arquivo CSV contém apenas Nome e Número, para alguns casos, se o contato não tiver nome, ele não será exibido em CSV',
	'LBL_EXPORTRECORDDES5' => 'Baixar contatos',
	'QRCODE_ERROR' => 'Problema no código QR de exibição - tente depois de algum tempo',
	'RQRCODEINFORMATION4' => 'Integração com WhatsApp só funciona se o número que você escanear aqui
deve ser desconectado (Logout) da Interface Web.WhatsApp.',
    //Add new functionality

	'LBL_AUTORESPONDER' => 'Resposta Automática',
	'LBL_AUTORESPONDERTEXT' => 'Texto de resposta automática',
	'LBL_WHATSAPP_CONFIGURATION_USERS' => 'Usuários conectados pelo WhatsApp',
	'LBL_USERS' => 'Nome do usuário',
	'LBL_CONNECTED' => 'Conectada',
	'LBL_DISCONNECTED' => 'Não conectado',
	'LBL_SCAN_YOUR_NUMBER' => 'Verifique o seu número do WhatsApp',

	'LBL_WHATSAPP_MODULE_NUMBERTO_ACCESS' => 'Módulo WhatsApp / número de acesso ao usuário',
	'LBL_GENERAL_SEETINGS' => 'Configurações gerais',
	'LBL_AUTO_MESSAGE_RESPONDER' => 'Resposta automática de mensagem',
	'LBL_COUNTRYCODE_DESCRIPTION' => "- O WhatsApp requer um número é um código de país, então se o número do telefone do cliente não tiver o código do país e estiver marcado como WhatsApp #, adicione o código do país aqui que o adicionará como prefixo a todos os seus números ao enviar mensagem. <br> - NÃO USE este recurso se você tiver um número de telefone de vários países, pois ele se aplica a todos os números de telefone. ",
	'LBL_AUTO_MESSAGE_RESPONDER_DESCRIPTION' => "<b> Nota: </b> A resposta automática de mensagens só é enviada ao usuário se a mensagem for enviada pela primeira vez em 24 horas",
	'LBL_SELECT_MODULE_ERROR' => 'Selecione pelo menos um módulo para usar no WhatsApp',
	'LBL_SELECT_MULTIPLEUSER_ERROR' => 'Selecione pelo menos um usuário em Alocar vários WhatsApp para.',
	'MULTIPLE_WHATSAPP_NOTES' => 'Nota: <br> 1. Para que os usuários vejam a varredura do WhatsApp pelos outros usuários, adicione esses usuários a um grupo. <br> 2. Qualquer usuário do grupo fará a varredura do WhatsApp do que irá acessar o WhatsApp para outros usuários do mesmo grupo. <br> 3. Você também pode adicionar usuários individuais ao WhatsApp.',

	'MULTIPLE_WHATSAPP_NOTES1' => 'Adicionar / Remover usuários / grupos para usar vários WhatsApp #',
	'MW_LABEL1' => 'Quem faz a varredura do WhatsApp? (Do utilizador)',
	'MW_LABEL2' => 'Quem usa o WhatsApp? (Usuários / Grupos) ',
	'MW_ACTIVE' => 'Ativo',
	'MW_ACTION' => 'Ação',

	'LBL_ADD_MORE_USERS' => 'Adicionar mais usuários',
	'LBL_PLEASE_WAIT' => 'Por favor, espere....',
	'LBL_PHONECONNECTED' => 'Telefone Internet desconectado',
	'NAVIGATETIMELINE' => 'enviar / receber mensagem do WhatsApp para seus contatos',
	'CLICK' => 'Clique',
	'PLEASEWAITSCANQRCODE' => 'Aguarde .. Pode demorar até 30 segundos para o código QR carregar ...',
	'LBL_AUTORESPONDER_LABEL' => 'O cliente recebeu esta mensagem automaticamente na primeira vez',
);

$jsLanguageStrings = Array(
	'MSG_WHATSAPP_DEACTIVATE_POPUP'=>'Tem certeza de que deseja desativar sua chave de licença?',
	'MSG_WHATSAPP_POPUP1'=>'Isso desinstalará todos os módulos de CTWhatsApp com dados armazenados relacionados a CTWhatsApp, bem como sua conta com CRMTiger.com. <br/>
     Se você for assinante premium, o faturamento será cancelado no próximo ciclo de faturamento.',
	'MSG_WHATSAPP_POPUP1_2'=>'Tem certeza de que deseja encerrar sua conta?',
    'MSG_WHATSAPP_POPUP2'=>'Estamos fechando sua conta. Você quer prosseguir ?',
    'MSG_WHATSAPP_UNISTALL_SUCCESS'=>'CTWhatsApp desinstalado!',
    'WHATSAPP_UNISTALL_SUCCESS'=>'CTWhatsApp foi desinstalado com sucesso',
    'MSG_WHATSAPP_UNISTALL_FAILED'=>'A desinstalação falhou! Entre em contato conosco.',
    'WHATSAPP_UNISTALL_FAILED'=>'A desinstalação falhou!',
    'DELETEMODULE' => 'Tem certeza que deseja deletar este registro?',
    'MSG_UPDATEMODULE' => 'Tem certeza de que deseja atualizar o WhtasappModule?',
    'UPDATEMODULE' => 'Algum problema no módulo de atualização do Whatsapp',
    'LBL_SCANQRCODEAGAIN' => 'Sua instância ainda não está ativada - leia o código QR novamente',
    'LBL_LICENSEEXPIRE' => 'Sua licença expirou',
    'ENTERLICENSEKEY' => 'Digite a chave de licença',
    'ENTERAPIKEY' => 'Insira a chave API',
    'ENTERAPIKEYAUTHKEY' => 'Por favor, insira o token de autenticação',
    'MULTIPLETOSINGLE'=>'Alterar de um único para vários usuários ou de vários usuários para um único apagará todas as conexões do WhatsApp - confirme',
    'CURENT_VERSION' => 'Sua versão do WhatsApp',
    'LATEST_VERSION' => 'Versão atual do WhatsApp',
);

?>
