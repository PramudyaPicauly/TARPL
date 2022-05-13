<!-- <?php
    // include_once("config.php");
    // if(isset($_POST['search'])){
    //     $search=$_POST['search-text'];
    //     $trading_pairs = mysqli_query($mysqli, "SELECT a.pair_id, a.pair_symbol, a.pair_price, b.crypto_name 
    //     FROM trading_pairs a INNER JOIN cryptocurrencies b ON a.crypto_id = b.crypto_id WHERE b.crypto_name LIKE '$search%'");
    //     header("Location: search.php");
    // }
    // $trading_pairs = mysqli_query($mysqli, "SELECT a.pair_id, a.pair_symbol, a.pair_price, b.crypto_name 
    // FROM trading_pairs a INNER JOIN cryptocurrencies b ON a.crypto_id = b.crypto_id WHERE b.crypto_name LIKE '-%'");
?> -->
<?php
    include_once("config.php");
    $search=$_GET['search-text'];
    $trading_pairs = mysqli_query($mysqli, "SELECT a.pair_id, a.pair_symbol, a.pair_price, b.crypto_name 
    FROM trading_pairs a INNER JOIN cryptocurrencies b ON a.crypto_id = b.crypto_id WHERE b.crypto_name LIKE '$search%'");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Marketplace</title>
</head>
<body>
    <h1 class="text-center m-4">Crypto Exchange</h1>
    <nav class="container w-75 m-auto nav mb-3">
        <a class="nav-link btn btn-light" href="marketplace.php">Marketplace</a>
        <a class="nav-link btn btn-light" href="idrMarket.php">IDR Market</a>
        <a class="nav-link btn btn-light" href="usdMarket.php">USD Market</a>
        <a class="nav-link btn btn-light" href="wallet.php">Wallet</a>
    </nav>

    <div class="container w-75 m-auto">
        <a class="btn btn-primary mb-4" href="marketplace.php">Search</a>
        <h3>Cryptocurrencies Marketplace</h3>
        <table class="table text-center table-striped table-hover">
            <?php
                if ($trading_pairs) {
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th scope='col'>No</th>";
                    echo "<th scope='col'>Pair</th>";
                    echo "<th scope='col'>Crypto Name</th>";
                    echo "<th scope='col'>Price</th>";
                    echo "<th scope='col'>Action</th>";
                    echo "</tr>";
                    echo "</thead>";
                    $id = 1;
                    echo "<tbody>";
                    while($item = mysqli_fetch_array($trading_pairs)) {
                        echo "<tr>";
                        echo "<td>".$id."</td>";
                        echo "<td>".$item['pair_symbol']."</td>";
                        echo "<td>".$item['crypto_name']."</td>";
                        echo "<td>".$item['pair_price']."</td>";
                        echo "<td><a href='buyCrypto.php?id=$item[pair_id]'>Buy</a></td></tr>";
                        $id += 1;
                    }
                    echo "</tbody>";
                } else {
                    echo "<thead>";
                    echo "<th>No</th>";
                    echo "<th>Pair</th>";
                    echo "<th>Crypto Name</th>";
                    echo "<th>Price</th>";
                    echo "<th>Action</th>";
                    echo "</thead>";
                }
            ?>
        </table>
        <a class="btn btn-danger mt-3 mb-3" href="index.php">Log Out</a>
    </div>
</body>
</html>