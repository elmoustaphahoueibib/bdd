<?php
/**
 * Created by PhpStorm.
 * User: Tafa
 * Date: 11/26/2018
 * Time: 11:09 AM
 */

require 'Users.php';

$pdo = Users::connect();
$sql = "SELECT * FROM users where id = ?";
$q = $pdo->prepare($sql);
$q->execute(array($_GET['id']));
$data = $q->fetch(PDO::FETCH_ASSOC);
$id = $data ['id'];
$fname = $data['firstname'];
$email = $data['email'];
$lname = $data['lastname'];
Users::disconnect();

?>

<!doctype html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<style>
    body {
        font-family:  'Noto Sans TC', sans-serif;
    }

</style>
<body>
<div class="container">
    <div class="row">
        <h4 align="center">Update User</h4>
    </div>
    <hr>

    <form class="form" action="updateu.php" method="get">
        <div class="control-group ">
            <label class="control-label">ID</label>
            <div class="controls">
                <input name="id" class="form-control" type="text" placeholder="Email Address" value = <?= $id; ?> hidden >
            </div>
        </div>

        <div class="control-group ">
            <label class="control-label">Firstname</label>
            <div class="controls">
                <input name="firstname" class="form-control" type="text" placeholder="FirstName" value=<?= $fname; ?> >
            </div>
        </div>
        <div class="control-group ">
            <label class="control-label">LastName</label>
            <div class="controls">
                <input name="lastname" class="form-control" type="text" placeholder="LastName" value= <?= $lname; ?>>
            </div>
        </div>
        <div class="control-group ">
            <label class="control-label">Email Address</label>
            <div class="controls">
                <input name="email" class="form-control" type="text" placeholder="Email Address" value = <?= $email; ?>  >
            </div>
        </div>
        <br>
        <div class="form-actions" align="center">
            <input type="submit" value="Yes" class="btn btn-success" href="updateu.php?id=<?=$_GET['id']?>">
            <a class="btn btn-warning" href="index.php">Back</a>
        </div>
    </form>
</div>
</body>
</html>