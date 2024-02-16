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
	'LBL_WhatsApp Business_CONFIGURATION' => 'Configuração de WhatsApp Business',
	'LBL_WhatsApp Business_INFORMATION' => 'Informações do WhatsApp Business',
	'LBL_ACCESS_MODULE_TO_WhatsApp Business' => 'Escolha módulos / campos para obter acesso ao WhatsApp Business',
	'API_URL' => 'URL API',
	'API_KEY' => 'Chave API',
	'AUTH_TOKEN' => 'Token de autenticação',
	'CUSTOMFIELD1' => 'Código do país',
	'COUNRTYCODEINFO' => '(Especifique o código do país apenas se o número do WhatsApp Business registrado não tiver o código do país)',
	'CUSTOMFIELD2' => 'Número do WhatsApp Business',
	'WhatsApp BusinessNO' => 'Meu WhatsApp Business Não',
	'MODULES' => 'Módulo',
	'WhatsApp Business_NO_FIELD' => 'Campo WhatsApp Business #',
	'ACTIVE' => 'Ativa',
	'ACTION' => 'Açao',
	'ALLOW_MODULE' => 'Permitir módulo selecionado',
	'WhatsApp Business_PHONE_FIELD' => 'Campo WhatsApp Business Phone',
	'ASSIGNTO' => 'Permitir acesso aos usuários',
	'LBL_SHOWUNKNOWNMESSAGES' => 'Mostrar mensagens desconhecidas para usuário não administrador',
	'LBL_THEME' => 'Visualização da janela do WhatsApp Business',
	'LBL_LICENSE_SETUP' => 'Configuração de licença',
	'LBL_LICENSE_CONFIGURATION' => 'Configuração de Licença',
	'LBL_WHATSPP_LICENSE_KEY' => 'Chave de licença do Whatspp',
	'Enter License Key'=>'Insira chave da licença',
	'LBL_DEACTIVATE'=>'Desativar',
	'LBL_RTL'=>'Visualização da direita para a esquerda (país preferencial do Oriente Médio)',
	'LBL_LTR'=>'Visão da esquerda para a direita (padrão)',
	'LBL_SCANQR_CODE' => 'Conectar WhatsApp Business',
	'LBL_LOGOUT' => 'Sair',
	'LBL_REBOOT_WhatsApp Business' => 'Reiniciar WhatsApp Business',
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
	'WhatsApp BusinessCONNECTED' => 'Você está conectado com <br> número do WhatsApp Business:',
	'CODEINFORMATION' => 'Digitalize o código QR - aguarde 60 segundos para que o WhatsApp Business seja conectado',
	'LBL_MASS_CONFIGURATION' => 'Configuração de mensagens em massa',
	'LBL_BATCHSIZE' => 'Tamanho do lote (número de mensagens)',
	'LBL_TIMEINTERVAL' => 'Intervalo de tempo (em minutos)',
	'COUNTRYCODE_POPUP' => 'Código do país',
	'COUNTRYCODE_POPUP0' => 'Código do país',
	'COUNTRYCODE_POPUP1' => 'Esta é uma configuração importante antes de você começar a usar a integração com o WhatsApp Business. Número de telefone da loja do WhatsApp Business com código do país Significa que se o seu número de telefone é 6308618263 e o código do país é +1, o número da loja do WhatsApp Business é “16308618263”',
	'COUNTRYCODE_POPUP2' => 'Se você tiver algum registro com um número de telefone sem código de país, siga as instruções abaixo.',
	'COUNTRYCODE_POPUP3' => 'Número de telefone do WhatsApp Business sem código do país nos registros:',
	'COUNTRYCODE_POPUP4' => 'Neste cenário, insira o código do país, se desejar aplicar o código do país como um prefixo a todos os “Número de telefone” de todos os módulos em que você ativou a integração com o WhatsApp Business. Portanto, sempre que uma mensagem do WhatsApp Business for enviada do CRM, ele adicionará um Prefixo porque o WhatsApp Business exigiu o “Código do País” para enviar uma mensagem para o contato. <br>
Por exemplo: se o número de telefone do registro for “987654321” e o código do país for “+1”, o número do WhatsApp Business se tornará “1987654321”',
	'COUNTRYCODE_POPUP5' => 'Registre com o código do país como prefixo:',
	'COUNTRYCODE_POPUP6' => 'Se você já tiver um registro com o código do país, então, nestes cenários, mantenha o campo do código do país “Em branco”',
	'BATCHINFORMATION' => '<b> Tamanho do lote </b> permite ao usuário enviar mensagens em massa em lote de mensagens para evitar spam. <br>
Exemplo: se você deseja enviar 500 mensagens e é, defina um tamanho de lote 15 e o intervalo de tempo para 15 minutos. Em seguida, serão enviadas 15 mensagens em cada lote com base no Intervalo de Tempo com base no cálculo abaixo. <br>
<b> Tempo para enviar 500 mensagens </b> = (500 mensagens / 15 tamanho do lote) * 15 minutos = 500 minutos = 8 horas aproximadamente.',
	'RANDOMINFORMATION' => '<b> Aleatório </b>: a seleção aleatória seleciona dinamicamente qualquer número de 1 a 25 como tamanho de lote ao enviar mensagem ao cliente. Isso significa que se houver 500 mensagens para enviar e Tamanho de lote - Aleatório, enviará 5 mensagens em primeiro lote, 8 mensagens em um segundo lote e assim por diante.',
	'TIMEINTREVALINFORMATION' => '<b> Intervalo de tempo </b>: permite que os usuários enviem mensagens em massa em um lote de mensagens para evitar spam ou o WhatApp # bloqueado. <br>
<b> Exemplo </b>: se você deseja enviar 500 mensagens e define um tamanho de lote 15 e intervalo de tempo definido para 15 minutos. Em seguida, ele enviará 15 mensagens em cada lote em cada intervalo de tempo especificado conforme o cálculo abaixo.
Tempo para enviar 500 mensagens = (500 mensagens / 15 tamanho do lote) * 15 minutos = 500 minutos = 8 horas aproximadamente.',
	'WhatsApp Business_POLICY' => 'Política de WhatsApp Business',
	'POLICYINFORMATION' => 'Observações importantes: <br> 1. Recomendamos seguir',
	'POLICYINFORMATION1' => 'ao enviar mensagens em massa do WhatsApp Business do CRM. <br>
2. É aconselhável configurar o tamanho mínimo do lote e o intervalo de tempo máximo entre cada mensagem para enviar mensagens do WhatsApp Business com segurança quando você estiver usando o recurso Mensagem em massa. <br>
3. O WhatsApp Business armazena números com o código do país, portanto, se o seu número não tiver o código do país, defina "Código do País" na Configuração do WhatsApp Business para todos os números do WhatsApp Business do CRM. <br> <br>
Formato sugerido para armazenar o registro com o número do WhatsApp Business, formato de exemplo: 1987654321 onde “1” é o código do país e “987654321” é o seu número local.',
	'WhatsApp Business Configuration' => 'Configuração de WhatsApp Business',
	'LBL_UNKNOWNINFORMATION' => 'Se a mensagem do WhatsApp Business foi enviada por um cliente cujo número não está no CRM como um registro e se você deseja permitir que todos os usuários não administradores vejam esse número, ative este recurso. Assim, todos os usuários que não são administradores podem ver essas mensagens clicando no ícone Global WhatsApp Business e vê-lo em "Mensagem de números desconhecidos"',
	'LBL_CLOSE_ACCOUNT'=>'Fechar minha conta',

	'LBL_ACTIVE' => 'Ativa',
	'RQRCODEINFORMATION' => 'Observação: antes de escanear o código QR, siga as instruções abaixo. <br> <br>',
	'RQRCODEINFORMATION1' => '1. Abra o WhatsApp Business no ​​seu telefone. <br>
2. Toque em Menu ou Configurações e selecione WhatsApp Business Web <br>
3. Aponte seu telefone para a tela do código QR ao clicar no botão “Digitalizar código QR” <br> <br>',

	'RQRCODEINFORMATION2' => 'Para mais informações clique',
	'RQRCODEINFORMATION3' => 'Como ler um código QR',
	'CLICKHERE' => 'aqui',
	'HOWTOSCANCODE' => 'Como ler um código QR',
	'LBL_LICENSE_CONFIGURATION' => 'Configurar licença do WhatsApp Business',
	'LICENSEKEY' => 'Chave de Licença',
	'APIKEY' => 'Chave API',
	'NEXTBUTTON1' => 'Clique no botão "Avançar" somente após as etapas a seguir. <br>',
	'NEXTBUTTON2' => '1. Digitalize o código QR do seu telefone celular.
2. Depois de escanear o código QR, clique em "Ler código QR" novamente e ele aparecerá <br>
"Código QR sem imagem". Clique no botão próximo somente depois que ele exibir "Nenhuma imagem de código QR". <br>
3. Aguarde 1 minuto após escanear o código QR',
	'Save' => 'Salve',
	'Cancel' => 'Cancelar',
	'WhatsApp BusinessCONNECTED' => 'Você está conectado com o <br> número do WhatsApp Business:',
	'WhatsApp Business' => 'WhatsApp Business',
	'LBL_UPGRADETITLE' => 'Clique para atualizar para a versão premium',
	'LBL_LICENSETITLE' => 'Clique para atualizar a chave de licença',
	'LBL_UPDATETITLE' => 'Clique para obter uma versão atualizada de “Integração com WhatsApp Business” em CRMTiger.com',
	'LBL_IMPORT_CONTACTS' => 'Baixar contatos do WhatsApp Business',
	'LBL_IN_APP_NOTIFICATION' => 'Notificação InApp',
    'NO_NOTIFICATION_INTERVAL' => 'Sem intervalo de notificação',

    //Add new functionality
    'WhatsApp BusinessMANAGEMENT' => 'Gerenciamento do WhatsApp Business #',
    'SINGLE_WhatsApp Business' => 'Número único do WhatsApp Business para o CRM',
    'MULTIPLE_WhatsApp Business' => 'Vários números do WhatsApp Business para usuários',
    'ALLOCATEMULTIPLEWhatsApp Business' => 'Adicione usuários / grupos para acessar ou verificar vários WhatsApp Business',
    'LBL_EXPORTRECORD' => 'Exportar registro',
	'LBL_EXPORTRECORDDES1' => 'Clique no botão Baixar contatos para baixar o arquivo contacts.csv de todos os seus contatos do WhatsApp Business e importar para o seu módulo respeitado do vTiger CRM para enviar / receber mensagens do WhatsApp Business.',
	'LBL_EXPORTRECORDDES2' => 'Resumo dos contatos do WhatsApp Business',
	'LBL_EXPORTRECORDDES3' => 'Registro Total',
	'LBL_EXPORTRECORDDES4' => 'Observação: o arquivo CSV contém apenas Nome e Número, para alguns casos, se o contato não tiver nome, ele não será exibido em CSV',
	'LBL_EXPORTRECORDDES5' => 'Baixar contatos',
	'QRCODE_ERROR' => 'Problema no código QR de exibição - tente depois de algum tempo',
	'RQRCODEINFORMATION4' => 'Integração com WhatsApp Business só funciona se o número que você escanear aqui
deve ser desconectado (Logout) da Interface Web.WhatsApp Business.',
    //Add new functionality

	'LBL_AUTORESPONDER' => 'Resposta Automática',
	'LBL_AUTORESPONDERTEXT' => 'Texto de resposta automática',
	'LBL_WhatsApp Business_CONFIGURATION_USERS' => 'Usuários conectados pelo WhatsApp Business',
	'LBL_USERS' => 'Nome do usuário',
	'LBL_CONNECTED' => 'Conectada',
	'LBL_DISCONNECTED' => 'Não conectado',
	'LBL_SCAN_YOUR_NUMBER' => 'Verifique o seu número do WhatsApp Business',

	'LBL_WhatsApp Business_MODULE_NUMBERTO_ACCESS' => 'Módulo WhatsApp Business / número de acesso ao usuário',
	'LBL_GENERAL_SEETINGS' => 'Configurações gerais',
	'LBL_AUTO_MESSAGE_RESPONDER' => 'Resposta automática de mensagem',
	'LBL_COUNTRYCODE_DESCRIPTION' => "- O WhatsApp Business requer um número é um código de país, então se o número do telefone do cliente não tiver o código do país e estiver marcado como WhatsApp Business #, adicione o código do país aqui que o adicionará como prefixo a todos os seus números ao enviar mensagem. <br> - NÃO USE este recurso se você tiver um número de telefone de vários países, pois ele se aplica a todos os números de telefone. ",
	'LBL_AUTO_MESSAGE_RESPONDER_DESCRIPTION' => "<b> Nota: </b> A resposta automática de mensagens só é enviada ao usuário se a mensagem for enviada pela primeira vez em 24 horas",
	'LBL_SELECT_MODULE_ERROR' => 'Selecione pelo menos um módulo para usar no WhatsApp Business',
	'LBL_SELECT_MULTIPLEUSER_ERROR' => 'Selecione pelo menos um usuário em Alocar vários WhatsApp Business para.',
	'MULTIPLE_WhatsApp Business_NOTES' => 'Nota: <br> 1. Para que os usuários vejam a varredura do WhatsApp Business pelos outros usuários, adicione esses usuários a um grupo. <br> 2. Qualquer usuário do grupo fará a varredura do WhatsApp Business do que irá acessar o WhatsApp Business para outros usuários do mesmo grupo. <br> 3. Você também pode adicionar usuários individuais ao WhatsApp Business.',

	'MULTIPLE_WhatsApp Business_NOTES1' => 'Adicionar / Remover usuários / grupos para usar vários WhatsApp Business #',
	'MW_LABEL1' => 'Quem faz a varredura do WhatsApp Business? (Do utilizador)',
	'MW_LABEL2' => 'Quem usa o WhatsApp Business? (Usuários / Grupos) ',
	'MW_ACTIVE' => 'Ativo',
	'MW_ACTION' => 'Ação',

	'LBL_ADD_MORE_USERS' => 'Adicionar mais usuários',
	'LBL_PLEASE_WAIT' => 'Por favor, espere....',
	'LBL_PHONECONNECTED' => 'Telefone Internet desconectado',
	'NAVIGATETIMELINE' => 'enviar / receber mensagem do WhatsApp Business para seus contatos',
	'CLICK' => 'Clique',
	'PLEASEWAITSCANQRCODE' => 'Aguarde .. Pode demorar até 30 segundos para o código QR carregar ...',
	'LBL_AUTORESPONDER_LABEL' => 'O cliente recebeu esta mensagem automaticamente na primeira vez',
);

$jsLanguageStrings = Array(
	'MSG_WhatsApp Business_DEACTIVATE_POPUP'=>'Tem certeza de que deseja desativar sua chave de licença?',
	'MSG_WhatsApp Business_POPUP1'=>'Isso desinstalará todos os módulos de CTWhatsApp BusinessBusiness com dados armazenados relacionados a CTWhatsApp BusinessBusiness, bem como sua conta com CRMTiger.com. <br/>
     Se você for assinante premium, o faturamento será cancelado no próximo ciclo de faturamento.',
	'MSG_WhatsApp Business_POPUP1_2'=>'Tem certeza de que deseja encerrar sua conta?',
    'MSG_WhatsApp Business_POPUP2'=>'Estamos fechando sua conta. Você quer prosseguir ?',
    'MSG_WhatsApp Business_UNISTALL_SUCCESS'=>'CTWhatsApp BusinessBusiness desinstalado!',
    'WhatsApp Business_UNISTALL_SUCCESS'=>'CTWhatsApp BusinessBusiness foi desinstalado com sucesso',
    'MSG_WhatsApp Business_UNISTALL_FAILED'=>'A desinstalação falhou! Entre em contato conosco.',
    'WhatsApp Business_UNISTALL_FAILED'=>'A desinstalação falhou!',
    'DELETEMODULE' => 'Tem certeza que deseja deletar este registro?',
    'MSG_UPDATEMODULE' => 'Tem certeza de que deseja atualizar o WhtasappModule?',
    'UPDATEMODULE' => 'Algum problema no módulo de atualização do WhatsApp Business',
    'LBL_SCANQRCODEAGAIN' => 'Sua instância ainda não está ativada - leia o código QR novamente',
    'LBL_LICENSEEXPIRE' => 'Sua licença expirou',
    'ENTERLICENSEKEY' => 'Digite a chave de licença',
    'ENTERAPIKEY' => 'Insira a chave API',
    'ENTERAPIKEYAUTHKEY' => 'Por favor, insira o token de autenticação',
    'MULTIPLETOSINGLE'=>'Alterar de um único para vários usuários ou de vários usuários para um único apagará todas as conexões do WhatsApp Business - confirme',
    'CURENT_VERSION' => 'Sua versão do WhatsApp Business',
    'LATEST_VERSION' => 'Versão atual do WhatsApp Business',
);

?>
