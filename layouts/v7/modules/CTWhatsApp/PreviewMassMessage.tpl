{*+**********************************************************************************
* The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
************************************************************************************}

<div class="modal-xs modal-dialog">
	<div class="modal-header" style="height: 50px;">
        <button type="button" class="close " data-dismiss="modal" aria-hidden="true" style="float: right;">&times;</button>
       	<h4>{vtranslate('LBL_PREVIEWMASSMESSAGE', $MODULE)}</h4>&nbsp;
    </div>
    <div class ="modal-content" style="height: 145px;padding: 12px;max-height: 145px;overflow: auto;">
    	{$MASSMESSAGE}
    </div>
</div>
