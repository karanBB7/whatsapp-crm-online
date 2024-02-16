<?php
/* Smarty version 3.1.39, created on 2023-09-01 07:35:46
  from 'C:\xampp\htdocs\vtigercrm\modules\whatsapp\VTwhatsappsms.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_64f19452113ba9_30769318',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6289b0020a28a4d89426e5495b59c727d83c436c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\modules\\whatsapp\\VTwhatsappsms.tpl',
      1 => 1693553735,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64f19452113ba9_30769318 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container"><form id="whatsappForm" action="modules/whatsapp/VTWhatsappTask.php" method="post"><div class="form-group"><label for="to">To:</label><input type="text" id="to" name="to" class="form-control" required></div><div class="form-group"><label for="body">Message Body:</label><textarea id="body" name="body" class="form-control" required></textarea></div><div class="form-group"><input type="hidden" name="action" value="sendWhatsApp"><input type="submit" id="submitBtn" value="Submit" class="btn btn-primary"></div></form></div><?php }
}
