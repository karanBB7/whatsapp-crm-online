<?php
/* Smarty version 3.1.39, created on 2023-10-25 11:14:23
  from 'C:\xampp\htdocs\vtigercrm\layouts\v7\modules\Vtiger\uitypes\Filewhatsapp.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6538f88f93b1f8_91676077',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8feea3b694c94a6ec05022df55786362b3f4444d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\layouts\\v7\\modules\\Vtiger\\uitypes\\Filewhatsapp.tpl',
      1 => 1698230058,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6538f88f93b1f8_91676077 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('FIELD_INFO', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldInfo());
$_smarty_tpl->_assignInScope('FIELD_VALUE', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue'));
$_smarty_tpl->_assignInScope('SPECIAL_VALIDATOR', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getValidator());?>
			<?php echo '<script'; ?>
>
				jQuery(document).ready(function() {
					var fileElements = jQuery('input[type="file"]',jQuery(this).data('fieldinfo') == 'file');
					fileElements.on('change',function(e) {
						var element = jQuery(this);
						var fileSize = e.target.files[0].size;
						var maxFileSize = element.closest('form').find('.maxUploadSize').data('value');
						if(fileSize > maxFileSize) {
							alert(app.vtranslate('JS_EXCEEDS_MAX_UPLOAD_SIZE'));
							element.val(null);
						}
					});
				});

				var currentUrl = window.location.href;
var url = new URL(currentUrl);
var modulename = url.searchParams.get('module');
var record = url.searchParams.get('record');
if (modulename && record) {
    var dataToSend = {
        module: modulename,
        record: record
    };
    // console.log('Data to send:', dataToSend);
    $.ajax({
        url: 'get_number_api.php',
        type: 'POST',
        data: dataToSend,
        success: function(response) {
            var phone = response.phone;
            // console.log('API response:', phone);
            const apiUrl = `recivedmessage.php?fromNumber=91${phone}`;
            fetchMessages(apiUrl); 
            // setInterval(function() {
            //     fetchMessages(apiUrl);
            // }, 1000);
        },
        error: function(error) {
            console.error('Error sending data to API:', error);
        }
    });
} else {
    console.error('Module or record not found in URL');
}

function fetchMessages(apiUrl) {
    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            const repliesSection = document.querySelector('.replies');
            if (repliesSection) {
                repliesSection.innerHTML = '';
                data.forEach(item => {
                    const message = item.message;
                    const timestamp = item.timestamp;
                    const timeAgo = calculateTimeAgo(timestamp);

                    const messageElement = document.createElement('div');
                    messageElement.className = 'media-reply';
                    messageElement.innerHTML = message + ' |' + timeAgo;
                    repliesSection.appendChild(messageElement);
                });
            }
        })
        .catch(error => {
            console.error('Error fetching messages:', error);
        });
}

function calculateTimeAgo(timestamp) {
    const currentTime = Math.floor(Date.now() / 1000);
    const timeDifference = currentTime - timestamp;

    if (timeDifference < 60) {
        return `<span class="time-ago">a while ago</span>`;
    } else if (timeDifference < 3600) {
        return `<span class="time-ago">a while ago</span>`;
    } else if (timeDifference < 86400) {
        const hours = Math.floor(timeDifference / 3600);
        return `<span class="time-ago">${hours} hours ago</span>`;
    } else {
        const days = Math.floor(timeDifference / 86400);
        return `<span class="time-ago">${days} days ago</span>`;
    }
}

			<?php echo '</script'; ?>
>
		
<?php }
}
