<?php
    include_once("config.php");
    if(isset($_POST['insert'])){
        $pair=$_POST['pair_symbol'];
        $amount=$_POST['amount'];
        $result = mysqli_query($mysqli, "INSERT INTO wallet(pair, amount) VALUES('$pair','$amount')");
        header("Location: marketplace.php");
    }
?>

<?php
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "SELECT * FROM trading_pairs WHERE pair_id=$id");
    while($trading_pairs = mysqli_fetch_array($result)){
        $pair_symbol = $trading_pairs['pair_symbol'];
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
    <a class="nav-link btn btn-light" href="marketplace.php">Marketplace</a>
    <a class="nav-link btn btn-light" href="idrMarket.php">IDR Market</a>
    <a class="nav-link btn btn-light" href="usdMarket.php">USD Market</a>
</nav>
<div class="container w-75 m-auto">
    <h3>Buy Crypto</h3>
    <form name="insert_wallet" method="post" action="buyCrypto.php">
        <div class="form-floating mb-3">
            <input type="text" name="pair_symbol" class="form-control" id="floatingInput" placeholder="Pair" value=<?php echo $pair_symbol;?>>
            <label for="floatingInput">Pair</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="amount" class="form-control" id="floatingInput" placeholder="Amount" value=<?php echo 0;?>>
            <label for="floatingInput">Amount</label>
        </div>
                <!-- Pair
                <input type="text" name="pair_symbol" value=<?php echo $pair_symbol;?>>
            
            
                Amount
                <input type="text" name="amount" value=<?php echo 0;?>> -->
            
            
                <input class="btn btn-primary my-3" type="submit" name="insert" value="Buy">
            
    </form>
</body>

</html>