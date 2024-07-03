<?php include ("connect.php");

if (isset($_POST["submit"])) {
    $productName = $_POST['ProductName'];
    $picture = $_POST['Picture'];
    $category = $_POST['Category'];
    $productDescription = $_POST['ProductDescription'];
    $price = $_POST['Price'];
    $quantityStock = $_POST['QuantityStock'];

    $sql = "INSERT INTO products (ProductName,Picture,Category,ProductDescription,Price,QuantityStock) 
    VALUES ('$productName','$picture', '$category', '$productDescription', '$price', '$quantityStock')";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($result) {
        echo " <script>alert('ADD successfully');window.location='index.php';</script>";
    } else {
        echo " <script>alert('ERROR ADD');window.location='addform.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <h1>ADD PRODUCT</h1>
    <form method="POST">

        <span>ProductName</span> <br>
        <input type="text" name="ProductName"><br>

        <span>Picture</span><br>
        <input type="text" name="Picture"><br>

        <span>Category</span><br>
        <input type="text" name="Category"><br>

        <span>ProductDescription</span><br>
        <input type="text" name="ProductDescription"><br>

        <span>Price</span><br>
        <input type="text" name="Price"><br>

        <span>QuantityStock</span><br>
        <input type="text" name="QuantityStock"><br>
        <br>
        <input type="submit" name="submit">
    </form>
    <a href="index.php">back to home</a>
</body>

</html>