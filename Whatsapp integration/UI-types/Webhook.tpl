{*+**********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
*************************************************************************************}

{strip}
	{literal}
        <script>
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
				console.log('API response:', phone);
				const apiUrl = `recivedmessage.php?fromNumber=91${phone}&related_to=${record}`;
				fetchMessages(apiUrl);
				setInterval(function() {
					fetchMessages(apiUrl);
				}, 1000);
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
					if (data.length === 0) {
						const noMessagesElement = document.createElement('div');
						noMessagesElement.className = 'media-reply';
						noMessagesElement.innerText = 'Start A Conversation';
						repliesSection.appendChild(noMessagesElement);
					} else {
						data.forEach(item => {

							const sourcetype = item.source;
							console.log("sourcetype", sourcetype);
							if (sourcetype === 'recieved') {
								const containerDiv = document.createElement('div');
								containerDiv.setAttribute('style', 'width: 100%; text-align: right;');
								const row = document.createElement('div');
								row.className = 'row';
								const messageCol = document.createElement('div');
								messageCol.className = 'col-sm-11 received';
								const message = item.message;
								const timestamp = item.timestamp;
								const timeAgo = timestamp ? calculateTimeAgo(timestamp) : '';
								const messageElement = document.createElement('div');
								messageElement.className = 'media-replyreceived';
								messageElement.innerHTML = message + (timeAgo ? ' ' + timeAgo : '');
								messageCol.appendChild(messageElement);
								const yellowboxCol = document.createElement('div');
								yellowboxCol.className = 'col-sm-1';

								const yellowbox = document.createElement('div');
								yellowbox.className = 'bgcol1 fa fa-user';
								yellowboxCol.appendChild(yellowbox);
								row.appendChild(messageCol);
								row.appendChild(yellowboxCol);
								containerDiv.appendChild(row);
								repliesSection.appendChild(containerDiv);
							} else {
								const containerDiv = document.createElement('div');
								containerDiv.setAttribute('style', 'width: 100%; text-align: left;');
								const row = document.createElement('div');
								row.className = 'row';
								const yellowboxCol = document.createElement('div');
								yellowboxCol.className = 'col-sm-1';
								const yellowbox = document.createElement('div');
								yellowbox.className = 'bgcol2 fa fa-building';
								yellowboxCol.appendChild(yellowbox);
								const messageCol = document.createElement('div');
								messageCol.className = 'col-sm-11';
								const message = item.message;
								const timestamp = item.timestamp;
								const timeAgo = timestamp ? calculateTimeAgo(timestamp) : '';
								const messageElement = document.createElement('div');
								messageElement.className = 'media-replysend';
								messageElement.innerHTML = message + (timeAgo ? ' ' + timeAgo : '');
								messageCol.appendChild(messageElement);
								row.appendChild(yellowboxCol);
								row.appendChild(messageCol);
								containerDiv.appendChild(row);
								repliesSection.appendChild(containerDiv);
							}
						});
					}
				}
			})
			.catch(error => {
				console.error('Error fetching messages:', error);
			});
	}
    function calculateTimeAgo(timestamp) {
    const currentTime = Math.floor(Date.now() / 1000); 
    const messageTime = Math.floor(new Date(timestamp).getTime() / 1000);

    const timeDifference = currentTime - messageTime;

    if (timeDifference < 60) {
        return `<span class="time-ago">a while ago</span>`;
    } else if (timeDifference < 3600) {
        const minutes = Math.floor(timeDifference / 60);
        return `<span class="time-ago">${minutes} minute${minutes > 1 ? 's' : ''} ago</span>`;
    } else if (timeDifference < 86400) {
        const hours = Math.floor(timeDifference / 3600);
        return `<span class="time-ago">${hours} hour${hours > 1 ? 's' : ''} ago</span>`;
    } else {
        const days = Math.floor(timeDifference / 86400);
        return `<span class="time-ago">${days} day${days > 1 ? 's' : ''} ago</span>`;
    }
}



</script>
	{/literal}
{/strip}
