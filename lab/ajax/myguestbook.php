<!DOCTYPE html>
<html>
<head>
  <title>Ajax</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <style>
  body{
    background: linear-gradient(#0f0c29, #302b63, #24243e);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    color: white;
    font-family: Montserrat;
  }
  .mypanel{
    background-color: #101133;
  }
  h2{
    font-weight: bold;
  }
</style>
</head>
<body>
  <div class="container">
    <div>
      <br>
      <h2>Manage MyGuestBook</h2>
    </div><hr>
    <div class="panel panel-default mypanel">
      <div class="panel-body">
        <form id="theform">
          <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" name="user" class="form-control" id="inputName">
          </div>
          <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="text" name="email" class="form-control" id="inputEmail">
          </div>
          <div class="form-group">
            <label for="inputComment">Comment</label>
            <textarea name="comment" class="form-control" id="inputComment" rows="3"></textarea>
          </div>
          <input type="hidden" name="id">
          <button type="button" id="submit" class="btn btn-primary">Add a New Comment</button>
          <button type="button" id="update" class="btn btn-primary">Edit This Comment</button>
          <button type="button" id="cancel" class="btn btn-warning">Cancel</button>
          <button type="button" id="reset" class="btn btn-danger">Reset</button>
        </form>
      </div>
    </div>
    <br>
    <h2>List of Comments</h2><hr>
    <div id="listing" class="mypanel"></div>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script type="text/javascript">

    $(document).ready(function () {
      const url = 'http://lrgs.ftsm.ukm.my/users/a173823/lab/week14lab'
      hideUpdateButtons();
      listing();
      $('#listing').on('click', '.delete', function () {
        $.ajax({
          type: 'DELETE',
          url: url + "/myguestbook_api/guestbook/" + $(this).val(),
          beforeSend: function (xhr) {
            $("#listing").html("<img src='ajax.gif'>");
          },
          success: function (result) {
            listing();
          },
          error: function (xhr, status) {
            $("#listing").html(xhr.responseText);
          },
        });
      });
      $("#cancel").click(function () {
        hideUpdateButtons();
        resetForm($('#theform'));
      });
      $("#update").click(function () {
        var data = $('#theform').serialize();
        $.ajax({
          type: 'PUT',
          data: data,
          url: url + "/myguestbook_api/guestbook/" + $('[name=id]').val(),
          beforeSend: function (xhr) {
            $("#listing").html("<img src='ajax.gif'>");
          },
          success: function (result) {
            listing();
            hideUpdateButtons();
            resetForm($('#theform'));
          },
          error: function (xhr, status) {
            $("#listing").html(xhr.responseText);
          },
        });
      });
      $('#listing').on('click', '.edit', function () {
        $.ajax({
          type: 'GET',
          url: url + "/myguestbook_api/guestbook/" + $(this).val(),
          success: function (result) {
            $('[name=user]').val(result[0].user);
            $('[name=email]').val(result[0].email);
            $('[name=comment]').val(result[0].comment);
            $('[name=id]').val(result[0].id);
            $('#update').show();
            $('#cancel').show();
            $('#submit').hide();
          },
          error: function (xhr, status) {
            $("#listing").html(xhr.responseText);
          },
        });
      });
      $("#submit").click(function () {
        var data = $('#theform').serialize();
        $.ajax({
          type: 'POST',
          data: data,
          url: url + "/myguestbook_api/guestbook/",
          beforeSend: function (xhr) {
            $("#listing").html("<img src='ajax.gif'>");
          },
          success: function (result) {
            listing();
            resetForm($('#theform'));
          },
          error: function (xhr, status) {
            $("#listing").html(xhr.responseText);
          },
        });
      });
      $("#reset").click(function () {
        resetForm($('#theform'));
      });
      function listing() {
        $.ajax({
          type: 'GET',
          cache: false,
          url: url + "/myguestbook_api/guestbooks/",
          beforeSend: function (xhr) {
            $("#listing").html("<img src='ajax.gif'>");
          },
          success: function (result) {
            let textToInsert = '';
            let id = '';
            const header = '<thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Comment</th><th>Date</th><th>Time</th><th>Action</th></tr></thead>';
            $.each(result, function (row, rowdata) {
              textToInsert += '<tr>';
              $.each(rowdata, function (idx, eledata) {
                if (idx === 'id') {
                  id = eledata;
                }
                textToInsert += '<td>' + eledata + '</td>';
              });
              textToInsert += '<td><button class="btn btn-info edit" value="' + id + '">Edit</button> <button value="' + id + '" class="btn btn-danger delete">Delete</button></td>';
              textToInsert += '</tr>';
            });
            $("#listing").html('<table class="table table-bordered text-white" border=1>' + header + '<tbody>' + textToInsert + '</tbody></table>');
          },
          error: function (xhr, status) {
            $("#listing").html(xhr.responseText);
          },
        });
      }
      function hideUpdateButtons() {
        $('#update').hide();
        $('#cancel').hide();
        $('#submit').show();
      }
      function resetForm($form) {
        $form.find('input:text, input:password, input:file, select, textarea').val('');
        $form.find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
      }
    });

  </script>

</body>
</html>