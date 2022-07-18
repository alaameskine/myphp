<?php
    $conn= new mysqli('localhost','root', '', 'exam');
    if ($conn->connect_error) {
        die('Connect Error: ' . $conn->connect_error);
    }
    else {
        echo "Vous êtes connecté!";
    }
?>