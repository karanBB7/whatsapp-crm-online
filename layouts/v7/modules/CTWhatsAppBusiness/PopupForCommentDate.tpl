{*+**********************************************************************************
* The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
************************************************************************************}

<div id="popupForCommentDateContainer" class=''>
	<div class="modal-header">
        <div class="clearfix">
            <div class="pull-right " >
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true" class='fa fa-close'></span>
                </button>
            </div>
            <h4 class="pull-left">
                Add Comments
            </h4>
        </div>
    </div>
    <div class ="modal-content">
		<input type="hidden" name="module" value="{$MODULE}" />
		<input type="hidden" name="recordid" value={$RECORDID}>
		
		<div class="modal-body">
			<label>Select Date</label>
			<select class="select2 task-fields" style="min-width: 185px;margin-left: 40px;">
				<option value="today">Today</option>
				<option value="yesterday">Yesterday</option>
				<option value="thisweek">This Week</option>
				<option value="lastweek">Last Week</option>
				<option value="customdate">Custom</option>
			</select><br>
		</div>
	
		<div class="modal-footer">
			<center>
				<button class="btn btn-success" id="savecomment"><strong>{vtranslate('LBL_SAVE', $MODULE)}</strong></button>
				<a class="cancelLink" type="reset" data-dismiss="modal">{vtranslate('LBL_CANCEL', $MODULE)}</a>
			</center>
		</div>
    </div>
</div>
