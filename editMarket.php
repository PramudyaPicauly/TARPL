<?php
    include_once("config.php");
    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $name=$_POST['market_name'];
        $symbol=$_POST['market_symbol'];
        $result = mysqli_query($mysqli, "UPDATE markets SET market_name='$name', market_symbol='$symbol' WHERE market_id=$id");
        header("Location: markets.php");
    }
?>

<?php
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "SELECT * FROM markets WHERE market_id=$id");
    while($markets = mysqli_fetch_array($result)){
        $market_name = $markets['market_name'];
        $market_symbol = $markets['market_symbol'];
    }
?>

<html>

<head>
    <title>Edit Market</title>
</head>

<body>
    <h1>Crypto Exchange</h1>
    <a href="adminMarketplace.php">Marketplace</a>
    <a href="cryptocurrencies.php">Cryptocurrencies</a>
    <a href="markets.php">Markets</a>
    <h3>Edit Market</h3>
    <form name="update_market" method="post" action="editMarket.php">
        <table border="0">
            <tr>
                <td>Market</td>
                <td><input type="text" name="market_name" value=<?php echo $market_name;?>></td>
            </tr>
            <tr>
                <td>Symbol</td>
                <td><input type="text" name="market_symbol" value=<?php echo $market_symbol;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Edit"></td>
            </tr>
        </table>
    </form>
</body>

</html>