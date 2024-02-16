<!DOCTYPE html>
<html lang="en">
<head>
  <title>Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.5.2/css/buttons.bootstrap5.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.5.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.5.2/js/buttons.html5.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container mt-5">
    <div class="col-sm-12 p-5">
        <form method="POST">
            <label class="p-2">Query</label>
                <textarea id="query" class="form-control" required></textarea>
            <label class="p-2">Reply for the Query</label>
                <textarea id="reply" class="form-control" required></textarea>
            <input type="Submit" value="Add" class="col-sm-3 mx-auto d-block btn btn-primary mt-4 "  onclick="submitForm()">
        </form>

    </div>
<table class="table table-bordered table-striped table-responsive" id="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Query</th>
        <th>Reply</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>

<script>
$(document).ready(function () {
    $('#table').DataTable({
        "processing": true,
        // "serverSide": true,
        "ajax": {
            "url": "api/get_template.php",
            "type": "POST"
        },
        "columns": [
            { "data": "id" },
            { "data": "query" },
            { "data": "reply" }
        ],
        "buttons": [
            'copy', 'excel', 'pdf', 'print'
        ]
    });
});

function submitForm() {
    $.ajax({
        type: "POST",
        url: "api/add_template.php",  
        data: {
            query : $("#query").val(),
            reply : $("#reply").val(),
        },
        success: function(response) {
            alert("Data Inserted");
            location.reload();
        },
        error: function(error) {
            alert("Error Inserting");
            location.reload();
        }
    });
}




</script>
</body>
</html>
