<?php
$module = 'RadioField';

$models = array(
  'default' => array(
    'field' => array(
      'radiofield' => array(
        'uitype' => 5020, 
        'column' => array(
          'varchar(100)', 
          'default' => ''
        ),
        'label' => 'LBL_RADIO_FIELD',
        'mandatory' => false,
        'masseditable' => true,
        'typeofdata' => 'V~M',
      ),
    ),
  ),
);
