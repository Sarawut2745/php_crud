<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SHOP MIKE</title>
</head>

<body>
    <table width=100% border="2">

        <tr>
            <td colspan="4">
                <center>
                    <h1>SHOP MIKE</h1>
                </center>
            </td>
        </tr>

        <tr>
            <td>Home</td>
            <td>Mangage Product</td>
            <td>Create a new Product</td>
            <td>Link</td>
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
                <table width="100%" border="1">
                    <tr>
                        <th>No.</th>
                        <th>Picture</th>
                        <th>Name Product</th>
                        <th>Category</th>
                        <th>ProductDescription</th>
                        <th>Price</th>
                        <th>QuantityStock</th>
                    </tr>

                    <?php
                    if ($result->num_rows > 0) {
                        $count =  1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                                echo "<td>". $count; "</td>";
                               echo "<td><img src='picture/$row[Picture]' width=100px; hight=100px></td>"; 
                               echo "<td>". $row["ProductName"] ."</td>";
                               echo "<td>". $row["Category"] ."</td>";
                               echo "<td>". $row["ProductDescription"] ."</td>";
                               echo "<td>". $row["Price"] ."</td>";
                               echo "<td>". $row["QuantityStock"];
                                $count++;
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
            </td>
        </tr>

    </table>
</body>

</html>