<?php
require("./db_config.php");

if (isset($_POST['addAddress'])) {
    try{
        $_con = getDatabaseConnection();
        $postData = sanitizeInput([
            'id'          => $_POST['id'] ?? '0',
            'firstname'   => $_POST['firstname'] ?? '',
            'designation' => $_POST['designation'] ?? '',
            'city'        => $_POST['city'] ?? '',
            'state'       => $_POST['state'] ?? '',
            'email'       => $_POST['email'] ?? '',
        ]);
        $rawAddresses = json_decode($_POST['addresses'] ?? '{}', true);
        $sanitizedAddresses = [];
        foreach ($rawAddresses as $key => $value) {
            $sanitizedKey = htmlspecialchars(strip_tags(trim($key)), ENT_QUOTES, 'UTF-8');
            $sanitizedValue = htmlspecialchars(strip_tags(trim($value)), ENT_QUOTES, 'UTF-8');
            $sanitizedAddresses[$sanitizedKey] = $sanitizedValue;
        }
        $addressJson = json_encode($sanitizedAddresses);
        $params = [
            $postData['id'],
            $postData['firstname'],
            $postData['designation'],
            $addressJson,
            $postData['city'],
            $postData['state'],
            $postData['email']
        ];
        $result = executeStoredProcedureUpdate('sp_addUpdateddressBook', $params, 'issssss');
        echo $result;
        mysqli_close($_con);
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}
if (isset($_POST['getAllAddressBooks'])) {
    try{
        $_con = getDatabaseConnection();
        $result = executeStoredProcedure('sp_getAllAddressBook');
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data);
        mysqli_close($_con);
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}
if (isset($_POST['deleteAddressBook'])) {
    try{
        $_con = getDatabaseConnection();
        $postData = sanitizeInput([
            'id'   => $_POST['id']
        ]);
        $params = [
            $postData['id']
        ];
        $result = executeStoredProcedureUpdate('sp_deleteAddressBook', $params, 'i');
        echo $result;
        mysqli_close($_con);
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

if (isset($_POST['getAddressBookById'])) {
    try{
        $_con = getDatabaseConnection();
        $postData = sanitizeInput([
            'id'   => $_POST['id']
        ]);
        $params = [
            $postData['id']
        ];
        $result = executeStoredProcedure('sp_getAddressBookById', $params, 'i');
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data);
        mysqli_close($_con);
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}
?>

