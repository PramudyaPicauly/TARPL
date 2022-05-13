<?php
    include_once("config.php");
    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $symbol=$_POST['pair_symbol'];
        $price=$_POST['pair_price'];
        $result = mysqli_query($mysqli, "UPDATE trading_pairs SET pair_symbol='$symbol', pair_price='$price' WHERE pair_id=$id");
        header("Location: adminMarketplace.php");
    }
?>

<?php
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "SELECT * FROM trading_pairs WHERE pair_id=$id");
    while($trading_pairs = mysqli_fetch_array($result)){
        $pair_symbol = $trading_pairs['pair_symbol'];
        $pair_price = $trading_pairs['pair_price'];
    }
?>

<html>

<head>
    <title>Edit Pair</title>
</head>

<body>
    <h1>Crypto Exchange</h1>
    <a href="adminMarketplace.php">Marketplace</a>
    <a href="cryptocurrencies.php">Cryptocurrencies</a>
    <a href="markets.php">Markets</a>
    <h3>Edit Pair</h3>
    <form name="update_pair" method="post" action="editPair.php">
        <table border="0">
            <tr>
                <td>Pair</td>
                <td><input type="text" name="pair_symbol" value=<?php echo $pair_symbol;?>></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="pair_price" value=<?php echo $pair_price;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Edit"></td>
            </tr>
        </table>
    </form>
</body>

</html>