<?php
class Vtiger_RadioField_UIType extends Vtiger_Base_UIType {
  public function getDBColumnType() {
    return 'varchar(100)'; 
  }

  public function getEditViewSmartyTplName($params) {
    return 'edit/field/RadioField.tpl'; 
  }
}
