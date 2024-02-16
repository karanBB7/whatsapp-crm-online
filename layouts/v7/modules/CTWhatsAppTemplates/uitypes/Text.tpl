{*<!--
/*********************************************************************************
  ** The contents of this file are subject to the vtiger CRM Public License Version 1.0
   * ("License"); You may not use this file except in compliance with the License
   * The Original Code is: vtiger CRM Open Source
   * The Initial Developer of the Original Code is vtiger.
   * Portions created by vtiger are Copyright (C) vtiger.
   * All Rights Reserved.
  *
 ********************************************************************************/
-->*}

<!-- FOR EMOJIS-->
<link rel="stylesheet" href="layouts/v7/modules/CTWhatsApp/assets/css/reset.css">
<link rel="stylesheet" href="layouts/v7/modules/CTWhatsApp/assets/css/style.css">
<script src="layouts/v7/modules/CTWhatsApp/assets/js/jquery.emojiarea.js"></script>

{strip}

<div class="searchForm conversation-compose" data-emojiarea data-type="unicode" data-global-picker="false">

    {assign var="FIELD_INFO" value=$FIELD_MODEL->getFieldInfo()}
    {assign var="SPECIAL_VALIDATOR" value=$FIELD_MODEL->getValidator()}
    {if (!$FIELD_NAME)}
      {assign var="FIELD_NAME" value=$FIELD_MODEL->getFieldName()}
    {/if}
    {if $FIELD_MODEL->get('uitype') eq '19' || $FIELD_MODEL->get('uitype') eq '20'}
        <textarea rows="3" id="{$MODULE}_editView_fieldName_{$FIELD_NAME}" class="inputElement textAreaElement col-lg-12 {if $FIELD_MODEL->isNameField()}nameField{/if}" name="{$FIELD_NAME}" {if $FIELD_NAME eq "notecontent"}id="{$FIELD_NAME}"{/if} {if !empty($SPECIAL_VALIDATOR)}data-validator='{Zend_Json::encode($SPECIAL_VALIDATOR)}'{/if}
            {if $FIELD_INFO["mandatory"] eq true} data-rule-required="true" {/if}
            {if count($FIELD_INFO['validator'])}
                data-specific-rules='{ZEND_JSON::encode($FIELD_INFO["validator"])}'
            {/if}
            >
        {$FIELD_MODEL->get('fieldvalue')}</textarea>
        <div class="emoji emoji-button">
            <i class="fa fa-grin">&#x1f604;</i>
        </div>
    {else}
        <textarea rows="5" id="{$MODULE}_editView_fieldName_{$FIELD_NAME}" class="inputElement {if $FIELD_MODEL->isNameField()}nameField{/if}" name="{$FIELD_NAME}" {if !empty($SPECIAL_VALIDATOR)}data-validator='{Zend_Json::encode($SPECIAL_VALIDATOR)}'{/if}
            {if $FIELD_INFO["mandatory"] eq true} data-rule-required="true" {/if}
            {if count($FIELD_INFO['validator'])}
                data-specific-rules='{ZEND_JSON::encode($FIELD_INFO["validator"])}'
            {/if}
            >
        {$FIELD_MODEL->get('fieldvalue')}</textarea>
        <div class="emoji emoji-button">
            <i class="fa fa-grin">&#x1f604;</i>
        </div>
    {/if}

</div>
{/strip}
