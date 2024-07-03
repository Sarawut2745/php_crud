<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table width=100% border="2">

<tr>
    <td colspan="5">
        <center>
            <h1>SHOP Mangage MIKE</h1>
        </center>
    </td>
</tr>

<tr>
    <td><a href="index.php">Home</a></td>
    <td><a href="mangage.php">Mangage Product</a></td>
    <td><a href="addform.php">Create a new Product</a></td>
    <td><a href="">Link</a></td>
</tr>

<tr>
    <td>
        <?php $search = "";

        if ($_SERVER["REQUEST_METHOD"] == "post") {
            $search = $_POST['search'];
        }

        $sql = "SELECT * FROM products WHERE ProductName LIKE '%$search%' OR Category LIKE '%$search%' ";

        $result = mysqli_query($conn, $sql) or die("Error Query" . mysqli_error($conn));
        ?>

        <form action="" method="post">
            <input type="text" name="search">
            <input type="submit" name="submit" value="Search">
        </form>
    </td>
    <table width="100%" border="1">
            <tr>
                <th>No.</th>
                <th>Picture</th>
                <th>Name Product</th>
                <th>Category</th>
                <th>ProductDescription</th>
                <th>Price</th>
                <th>QuantityStock</th>
                <th>mangage</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                $count =  1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                        echo "<td>". $count; "</td>";
                       echo "<td><img src='images/$row[Picture]' width=100px; hight=100px></td>"; 
                       echo "<td>". $row["ProductName"] ."</td>";
                       echo "<td>". $row["Category"] ."</td>";
                       echo "<td>". $row["ProductDescription"] ."</td>";
                       echo "<td>". $row["Price"] ."</td>";
                       echo "<td>". $row["QuantityStock"];
                       echo "<td>". '<a href="update.php/?id='.$row["ProductID"].'">edit</a>' . ' '. '<a href="delete.php/?id='.$row["ProductID"].'">delete</a>'. "</td>";
                       
                        $count++;
                    echo "</tr>";
                }
            }
            ?>

        </table>
</tr>

</table>

</body>
</html>