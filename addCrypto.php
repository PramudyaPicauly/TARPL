<?php
    include_once("config.php");
    if(isset($_POST['insert'])){
        $crypto_id=$_POST['crypto_id'];
        $crypto_name=$_POST['crypto_name'];
        $crypto_symbol=$_POST['crypto_symbol'];
        $result = mysqli_query($mysqli, "INSERT INTO cryptocurrencies VALUES('$crypto_id','$crypto_name', '$crypto_symbol')");
        header("Location: cryptocurrencies.php");
    }
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Crypto</title>
</head>

<body>
    <h1 class="text-center m-4">Crypto Exchange</h1>
    <nav class="container w-75 mx-auto nav mb-3">
        <a class="nav-link btn btn-light" href="adminMarketplace.php">Marketplace</a>
        <a class="nav-link btn btn-light" href="cryptocurrencies.php">Cryptocurrencies</a>
        <a class="nav-link btn btn-light" href="markets.php">Markets</a>
    </nav>
    <div class="container w-75 m-auto">
        <h3>Add Cryptocurrency</h3>
        <form name="insert_crypto" method="post" action="addCrypto.php">
                
                    <div class="form-floating mb-3">
                    <input type="text" name="crypto_id" class="form-control" id="floatingInput" placeholder="Crypto ID">
                    <label for="floatingInput">Crypto ID</label>
                    </div>
                
                    <div class="form-floating mb-3">
                    <input type="text" name="crypto_name" class="form-control" id="floatingInput" placeholder="Crypto Name">
                    <label for="floatingInput">Crypto Name</label>
                    </div>

                    <div class="form-floating mb-3">
                    <input type="text" name="crypto_symbol" class="form-control" id="floatingInput" placeholder="Crypto Symbol">
                    <label for="floatingInput">Crypto Symbol</label>
                    </div>
                
                    <input class="btn btn-primary my-3" type="submit" name="insert" value="Add">
                
        </form>
    </div>
</body>
</html>