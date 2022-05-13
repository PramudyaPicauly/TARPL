<?php
    include_once("config.php");
    $cryptocurrencies = mysqli_query($mysqli, "SELECT * FROM cryptocurrencies ORDER BY crypto_id ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Cryptocurrencies</title>
</head>
<body>
    <h1 class="text-center m-4">Crypto Exchange</h1>
    <nav class="container w-75 m-auto nav mb-3">
        <a class="nav-link btn btn-light" href="adminMarketplace.php">Marketplace</a>
        <a class="nav-link btn btn-light" href="cryptocurrencies.php">Cryptocurrencies</a>
        <a class="nav-link btn btn-light" href="markets.php">Markets</a>
    </nav>
    <div class="container w-75 m-auto">
        <h3>Cryptocurrencies</h3>
        <a class="btn btn-primary my-3" href="addCrypto.php">Add Crypto</a>
        <table class="table text-center table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Crypto Name</th>
                    <th scope="col">Crypto Symbol</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $id = 1;
                while($item = mysqli_fetch_array($cryptocurrencies)) {
                    echo "<tr>";
                    echo "<td>".$id."</td>";
                    echo "<td>".$item['crypto_name']."</td>";
                    echo "<td>".$item['crypto_symbol']."</td>";
                    echo "<td class='btn-group' role='group' aria-label='Basic outlined example'><a class='btn btn-outline-warning' href='editCrypto.php?id=$item[crypto_id]'>Edit</a> <a class='btn btn-outline-danger' href='deleteCrypto.php?id=$item[crypto_id]'>Delete</a></td></tr>";
                    $id += 1;
                }
                ?>
            </tbody>
        </table>
        <a class="btn btn-danger mt-3 mb-3" href="index.php">Log Out</a>
    </div>
</body>
</html>