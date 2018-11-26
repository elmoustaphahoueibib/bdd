<?php
/**
 * Created by PhpStorm.
 * User: Tafa
 * Date: 11/26/2018
 * Time: 2:51 PM
 */

require 'Users.php';
$id=$_GET['id'];
$pdo = Users::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "DELETE FROM users  WHERE id = ? ";
$q = $pdo->prepare($sql);
$q->execute(array($id));
Users::disconnect();
header("Location:index.php");
