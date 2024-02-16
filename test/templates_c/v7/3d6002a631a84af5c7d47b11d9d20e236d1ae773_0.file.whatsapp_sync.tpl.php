<?php
/* Smarty version 3.1.39, created on 2023-08-30 06:40:22
  from 'C:\xampp\htdocs\vtigercrm\modules\whatsapp\whatsapp_sync.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_64eee456708e98_05525604',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d6002a631a84af5c7d47b11d9d20e236d1ae773' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\modules\\whatsapp\\whatsapp_sync.tpl',
      1 => 1693377612,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64eee456708e98_05525604 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container"><form id="whatsappForm"><div class="form-group"><label for="to">To:</label><input type="text" id="to" name="to" class="form-control" required></div><div class="form-group"><label for="body">Message Body:</label><textarea id="body" name="body" class="form-control" required></textarea></div><div class="form-group"><input type="submit" id="submitBtn" value="Submit" class="btn btn-primary"></div></form></div><?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
>
$(document).ready(function() {
    $("#submitBtn").click(function(e) {
    e.preventDefault();
        var toValue = $("#to").val();
        var bodyValue = $("#body").val();
        
        $.ajax({
            type: "POST",
            url: "modules/whatsapp/store_data.php",
            data: { to: toValue, body: bodyValue },
            success: function(response) {
               
            }
        });
    });
});
<?php echo '</script'; ?>
>
<?php }
}
