<?php
include 'connect_dbfile.php';

if (isset($_GET['msg'])) {
    echo "<p style='color: green;'>" . $_GET['msg'] . "</p>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <style>
        table {
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>

<h2>Product List</h2>

<?php
$viewProduct = $conn-> query("SELECT * FROM product_data");
if($viewProduct-> num_rows > 0){
    ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php
while($rowProduct = $viewProduct-> fetch_assoc()){
    ?>
    <tr>
        <td><?php echo $rowProduct['product_id']; ?></td>
        <td><?php echo $rowProduct['product_name']; ?></td>
        <td><?php echo $rowProduct['category']; ?></td>
        <td><?php echo $rowProduct['quantity']; ?></td>
        <td><?php echo $rowProduct['price']; ?></td>
        <td>
            <a href="update_data.php?product_id=<?php echo $rowProduct['product_id']; ?>">Edit</a> |
            <a href="delete_data.php?product_id=<?php echo $rowProduct['product_id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
<?php } ?>
</table>

<?php
}else{
    echo "No product found";
}
$conn->close();


?>

</body>
</html>