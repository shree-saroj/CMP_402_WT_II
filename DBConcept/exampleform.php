<?php
include './connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD WebTech (AJAX)</title>
    <script src="./../includes/jquery-3.7.1.min.js"></script>
</head>
<body>

<h2 id="header">Add New Record</h2>
<form id="crudForm">
    <input type="hidden" name="id" id="id" />
    <label>Name: <input id="inpname" name="name" type="text" required /></label><br>
    <label>Password: <input id="inppass" name="password" type="password" required /></label><br>
    <button type="submit" id="btnSubmit">Submit</button>
</form>

<div id="response" style="margin-top: 10px; color: green;"></div>

<h3>Records:</h3>
<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Password</th>
            <th>CreatedDate</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<script src="./../includes/jquery-3.7.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    loadtable();
    function loadtable() {
        $.ajax({
            url: 'form-handler.php',
            type: 'GET',
            dataType: 'json',
            data: { action: 'fetch' },
            success: function(data) {
                var tableBody = '';
                $.each(data, function(index, record) {
                    tableBody += '<tr>';
                    tableBody += '<td class="name">' + record.Name + '</td>';
                    tableBody += '<td class="password">' + record.Password + '</td>';
                    tableBody += '<td>' + record.CreatedDate + '</td>';
                    tableBody += '<td><button class="edit" value="' + record.Id + '">Edit</button></td>';
                    tableBody += '<td><button class="delete" value="' + record.Id + '" onclick="return confirm(\'Are you sure?\')">Delete</button></td>';
                    tableBody += '</tr>';
                });
                $('tbody').empty().append(tableBody);
            }
        });
    }
    $('#crudForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'form-handler.php',
            data: $(this).serialize(),
            success: function(response) {
                $('#response').html(response);
                setTimeout(function(){
                    $('#response').fadeOut();
                    $('#crudForm')[0].reset();
                    loadtable();
                    $("#header").text("Add New Record");
                    $("#btnSubmit").text("Submit");
                }, 500);
            },
            error: function() {
                $('#response').css("color", "red").html("An error occurred.");
            }
        });
    });
    $(document).on('click',".edit",function() {
        $("#header").text("Update Record");
        $("#btnSubmit").text("Update");
        $("#id").val($(this).val());
        $("#inpname").val($(this).closest('tr').find('.name').text());
        $("#inppass").val($(this).closest('tr').find('.password').text());
        $("#inpname").focus();
    });
    $(document).on('click',".delete",function() {
        var deleteId = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'form-handler.php',
            data: { delete: deleteId },
            success: function(response) {
                $('#response').html(response);
                setTimeout(function(){
                    $('#response').fadeOut();
                    loadtable();
                }, 500);
            }
        });
    });
});
</script>

</body>
</html>
