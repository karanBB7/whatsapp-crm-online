<div class="modal-xs modal-dialog">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">{vtranslate('LBL_ACCESS_MODULE_TO_WHATSAPP', $QUALIFIED_MODULE)}</h4>
	</div>
	<div class="modal-body">
		<div class="clearfix">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<h4 style="margin-top: 0px;">{vtranslate('LBL_ACCESS_MODULE_TO_WHATSAPP', $QUALIFIED_MODULE)}</h4>
			</div>
		</div><hr>
		
		<table class="table editview-table no-border">
			<tbody>
				<tr>
					<td class="fieldLabel alignMiddle" style="width: 300px;">{vtranslate('ALLOW_MODULE', $QUALIFIED_MODULE)}</td>
					<td class="fieldValue">
						<select class="inputElement select2  select2-offscreen" id="select_module" name="select_module" style="width: 50%;">
							<option value="">{vtranslate('LBL_SELECT_AN_OPTION',$QUALIFIED_MODULE)}</option>
							{foreach from=$ALLOW_WHATSAPP_MODULES key=ALLOW_WHATSAPP_KEY  item=ALLOW_WHATSAPP_VALUE}
								<option value="{$ALLOW_WHATSAPP_VALUE}">{vtranslate($ALLOW_WHATSAPP_VALUE, $ALLOW_WHATSAPP_VALUE)}</option>
							{/foreach}
						</select>
					</td>
				</tr>

			<tr>
				<td class="fieldLabel alignMiddle" style="width: 300px;">{vtranslate('WHATSAPP_PHONE_FIELD', $QUALIFIED_MODULE)}</td>
				<td class="fieldValue">
					<select class="inputElement select2 select2-offscreen" id="phone_field" name="phone_field" style="width: 50%;">
						<option value="">{vtranslate('LBL_SELECT_AN_OPTION',$QUALIFIED_MODULE)}</option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="fieldLabel alignMiddle" style="width: 300px;">{vtranslate('ACTIVE', $QUALIFIED_MODULE)}</td>
				<td class="fieldValue">
					<input type="checkbox" class="inputElement" name="active" id="active" value="">
				</td>
			</tr>
			</tbody>
		</table>
		<div class="row-fluid">
			<div class="span12">
				<span>
					<center><button class="btn btn-success" id="submitbutton" type="button"><strong>{vtranslate('LBL_SAVE', $MODULE)}</strong></button>
					<a class="cancelLink" data-dismiss="modal"  href="#" type="reset">{vtranslate('LBL_CANCEL',$QUALIFIED_MODULE)}</a></center>
				</span>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">{vtranslate('CLOSE',$QUALIFIED_MODULE)}</button>
	</div>
</div>