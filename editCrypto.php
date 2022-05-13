<?php
    include_once("config.php");
    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $name=$_POST['crypto_name'];
        $symbol=$_POST['crypto_symbol'];
        $result = mysqli_query($mysqli, "UPDATE cryptocurrencies SET crypto_name='$name', crypto_symbol='$symbol' WHERE crypto_id=$id");
        header("Location: cryptocurrencies.php");
    }
?>

<?php
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "SELECT * FROM cryptocurrencies WHERE crypto_id=$id");
    while($cryptocurrencies = mysqli_fetch_array($result)){
        $crypto_name = $cryptocurrencies['crypto_name'];
        $crypto_symbol = $cryptocurrencies['crypto_symbol'];
    }
?>

<html>

<head>
    <title>Edit Cryptocurrency</title>
</head>

<body>
    <h1>Crypto Exchange</h1>
    <a href="adminMarketplace.php">Marketplace</a>
    <a href="cryptocurrencies.php">Cryptocurrencies</a>
    <a href="markets.php">Markets</a>
    <h3>Edit Cryptocurrency</h3>
    <form name="update_crypto" method="post" action="editCrypto.php">
        <table border="0">
            <tr>
                <td>Cryptocurrency</td>
                <td><input type="text" name="crypto_name" value=<?php echo $crypto_name;?>></td>
            </tr>
            <tr>
                <td>Symbol</td>
                <td><input type="text" name="crypto_symbol" value=<?php echo $crypto_symbol;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Edit"></td>
            </tr>
        </table>
    </form>
</body>

</html>