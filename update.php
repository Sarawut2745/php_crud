<?php
include("connect.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $ProductName = $_POST['ProductName'];
        $Picture = $_POST['Picture'];
        $Category = $_POST['Category'];
        $ProductDescription = $_POST['ProductDescription'];
        $Price = $_POST['Price'];
        $QuantityStock = $_POST['QuantityStock'];
        $sql = "UPDATE products SET ProductName='$ProductName', Picture='$Picture', Category='$Category', ProductDescription='$ProductDescription', Price=$Price, QuantityStock=$QuantityStock WHERE ProductID=$id";

        if ($conn->query($sql) === TRUE) {
            header('Location: /php_project/mangage.php');
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    $sql_fetch = "SELECT * FROM products WHERE ProductID=$id";
    $result = $conn->query($sql_fetch);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found.";
        exit();
    }

} else {
    header('Location: http://127.0.0.1/php_project/update.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h1>EDIT PRODUCT</h1>
    <form method="POST">
        <label>ProductName:</label><br>
        <input type="text" name="ProductName" value="<?php echo $product['ProductName']; ?>"><br>

        <label>Picture:</label><br>
        <input type="text" name="Picture" value="<?php echo $product['Picture']; ?>"><br>

        <label>Category:</label><br>
        <input type="text" name="Category" value="<?php echo $product['Category']; ?>"><br>

        <label>ProductDescription:</label><br>
        <input type="text" name="ProductDescription" value="<?php echo $product['ProductDescription']; ?>"><br>

        <label>Price:</label><br>
        <input type="text" name="Price" value="<?php echo $product['Price']; ?>"><br>

        <label>QuantityStock:</label><br>
        <input type="text" name="QuantityStock" value="<?php echo $product['QuantityStock']; ?>"><br>
        <br>
        <input type="submit" name="submit">
    </form>
    <a href="/php_project/index.php">Back to home</a>
</body>
</html>
