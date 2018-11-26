<?php
/**
 * Created by PhpStorm.
 * User: Tafa
 * Date: 11/26/2018
 * Time: 3:04 PM
 */
require 'Users.php';
$pdo = Users::connect();
var_dump($_GET);
$sql = "SELECT * FROM users where id =".$_GET ['id'];
$q = $pdo->prepare($sql);
$q->execute(array($_GET['id']));
$data = $q->fetch(PDO::FETCH_ASSOC);
$fname = $data['firstname'];
$email = $data['email'];
$lname = $data['lastname'];
$id = $data ['id'];


    $sql2 = "UPDATE users  set firstname = ?, email = ?, lastname =? WHERE id = $id";
    $q2 = $pdo->prepare($sql2);
    $q2->execute(array($_GET['firstname'], $_GET['email'], $_GET['lastname']));
    //Users::disconnect();

   header("Location: index.php");
