{strip}
<div class="row-fluid">
    <div class="span2">{vtranslate('LBL_RECEPIENTS', $QUALIFIED_MODULE)}<span class="redColor">*</span></div>
    <div class="span8 row-fluid">
        <input type="text" class="span5 fields form-control" data-validation-engine="validate[required]" name="whatsapp_recipient" value="{$whatsapp_recipient}" />
    </div>
</div>
<div class="row-fluid	">
    <div class="span2">{vtranslate('LBL_WHATSAPP_MESSAGE', $QUALIFIED_MODULE)}<span class="redColor">*</span></div>
    <textarea name="whatsapp_content" class="span8 fields form-control">{$whatsapp_content}</textarea>
</div>
{/strip}
