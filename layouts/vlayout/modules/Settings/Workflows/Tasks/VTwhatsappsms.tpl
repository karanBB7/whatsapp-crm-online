{strip}
<div class="container">
    <form id="whatsappForm">
        <div class="form-group">
            <label for="to">To:</label>
            <input type="text" id="to" name="to" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="body">Message Body:</label>
            <textarea id="body" name="body" class="form-control" required></textarea>
        </div>
        
        <div class="form-group">
            <input type="submit" id="submitBtn" value="Submit" class="btn btn-primary">
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
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
</script>
{/strip}
