<?php
class CustomInvokeFunction_DetailView_Model extends Vtiger_DetailView_Model {
    public function postProcess(Vtiger_Request $request) {
        parent::postProcess($request);
        $toNumber = $request->get('to_number');
        $addField = $request->get('add_field');
        $smsText = $request->get('sms_text');
        $curlData = [
            'messaging_product' => 'whatsapp',
            'to' => $toNumber,
            'text' => [
                'body' => $smsText,
            ],
        ];
        if ($curlResponse) {
            $this->recordModel->set('send_status', 'Success');
        } else {
            $this->recordModel->set('send_status', 'Error');
        }
        $this->recordModel->save();
    }
}
?>