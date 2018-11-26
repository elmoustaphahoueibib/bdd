<?php
/**
 * Created by PhpStorm.
 * User: Tafa
 * Date: 11/26/2018
 * Time: 10:34 AM
 */

require 'Users.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container" align="center">
        <div class="row" align="center">
            <h3>Delete a User</h3>
        </div>

    <hr>
    <p class="alert alert-danger" align="center">Are you sure to delete This User ?</p>
            <div>
                <a class="btn btn-success" href="deleteu.php?id=<?=$_GET['id']?>">Yes</a>
                <a class="btn btn-info" href="index.php">No</a>
            </div>
        </form>
</div>
</body>
</html>
