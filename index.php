<?php
require 'Users.php';
$sql = "Select * FROM users";
$pdo = Users::connect();

?>

<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="css/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <div class="row">
        <h4 align="center">BDD CHECKPOINT</h4>

    </div>
    <hr>
    <div class="row">
        <p>
            <a href="add.php" class="btn btn-info">Add</a>
        </p>
        <table class="table table-striped table-bordered">
            <thead class="table-danger">
            <tr >
                <th>Id</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Email</th>
            </tr>
            </thead>

            <tbody>
            <?php

            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['firstname'] . '</td>';
                echo '<td>' . $row['lastname'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '</tr>';
            }

            Users::disconnect();
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>