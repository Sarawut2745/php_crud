<?php
include ("connect.php");
    
    $id = $_GET["id"];
    echo"$id";
    $sql = "DELETE FROM products WHERE ProductID = $id";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        header('location:/php_project/mangage.php');
}
    
else{
    header('Location'.'http://127.0.0.1/php_project/mangage.php');
}


?>