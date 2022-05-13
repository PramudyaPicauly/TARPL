<?php
    include_once("config.php");
    $trading_pairs = mysqli_query($mysqli, "SELECT pair_symbol, pair_price FROM trading_pairs WHERE market_id = 1 ORDER BY pair_id ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>IDR Market</title>
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
        <h3>Indonesian Rupiah Market</h3>
        <table class="table text-center table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Pair</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $id = 1;
                while($item = mysqli_fetch_array($trading_pairs)) {
                    echo "<tr>";
                    echo "<td>".$id."</td>";
                    echo "<td>".$item['pair_symbol']."</td>";
                    echo "<td>".$item['pair_price']."</td></tr>";
                    $id += 1;
                }
            ?>
            </tbody>
        </table>
        <a class="btn btn-danger mt-3 mb-3" href="index.php">Log Out</a>
    </div>
</body>
</html>