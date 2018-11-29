<?php
/**
 * Created by PhpStorm.
 * User: Tafa
 * Date: 11/25/2018
 * Time: 12:24 PM
 */
require 'Users.php';
if (!empty($_POST)) {

    $fisrtError = null;
    $emailError = null;
    $lastError = null;
   

    $fname = $_POST['firstname'];
    $email = $_POST['email'];
    $lname = $_POST['lastname'];

    $valid = true;
    if (empty($fname)) {
        $nameError = 'Please enter Name';
        $valid = false;
    }

    if (empty($email)) {
        $emailError = 'Please enter Email Address';
        $valid = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Please enter a valid Email Address';
        $valid = false;
    }

    if (empty($lname)) {
        $lastError = 'Please enter Last name';
        $valid = false;
    }



    if ($valid) {
        $pdo = Users::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO users (firstname, lastname, email) VALUES ('$fname', '$lname','$email')";
        $q = $pdo->prepare($sql);
        $q->execute(array($id, $fname, $lname ,$email));
        Users::disconnect();
        header("Location: index.php");
    }
}
?>


<!doctype html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.js">
</head>
<style>
    body {
        font-family:  'Noto Sans TC', sans-serif;
    }
</style>
<body>

<div class="container">
    <div class="row">
        <h4>Add new user</h4>
    </div>
    <hr>
    <form class="form" action="add.php" method="post">
        <div class="control-group ">
            <label class="control-label">Firstname</label>
            <div class="controls">
                <input name="firstname" class="form-control" type="text" placeholder="FirstName" value="">
            </div>
        </div>
        <div class="control-group ">
            <label class="control-label">LastName</label>
            <div class="controls">
                <input name="lastname" class="form-control" type="text" placeholder="LastName" value="">
            </div>
        </div>
        <div class="control-group ">
            <label class="control-label">Email Address</label>
            <div class="controls">
                <input name="email" class="form-control" type="text" placeholder="Email Address" value="">
            </div>
        </div>
        <br>
        <div class="form-actions" align="center">
            <button type="submit" class="btn btn-success">Create</button>
            <a class="btn btn-warning" href="index.php">Back</a>
        </div>
    </form>
</div>
</body>
</html>
