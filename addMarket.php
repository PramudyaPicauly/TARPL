<?php
    // include database connection file
    include_once("config.php");
    // Check if form is submitted for data update, then redirect to hompage after update
    if(isset($_POST['insert'])){
        $market_id=$_POST['market_id'];
        $market_name=$_POST['market_name'];
        $market_symbol=$_POST['market_symbol'];
        // update data
        $result = mysqli_query($mysqli, "INSERT INTO markets VALUES('$market_id','$market_name', '$market_symbol')");
        // Redirect to homepage to display updated data in list
        header("Location: markets.php");
    }
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Market</title>
</head>

<body>
<h1 class="text-center m-4">Crypto Exchange</h1>
    <nav class="container w-75 mx-auto nav mb-3">
        <a class="nav-link btn btn-light" href="adminMarketplace.php">Marketplace</a>
        <a class="nav-link btn btn-light" href="cryptocurrencies.php">Cryptocurrencies</a>
        <a class="nav-link btn btn-light" href="markets.php">Markets</a>
    </nav>
    <div class="container w-75 m-auto">
    <h3>Add Market</h3>
    <form name="insert_market" method="post" action="addMarket.php">
        <div class="form-floating mb-3">
            <input type="text" name="market_id" class="form-control" id="floatingInput" placeholder="Market ID">
            <label for="floatingInput">Market ID</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="market_name" class="form-control" id="floatingInput" placeholder="Market Name">
            <label for="floatingInput">Market Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="market_symbol" class="form-control" id="floatingInput" placeholder="Market Symbol">
            <label for="floatingInput">Market Symbol</label>
        </div>
                <!-- Market ID
                <input type="text" name="market_id">
            
            
                Market Name
                <input type="text" name="market_name">
            
            
                Market Symbol
                <input type="text" name="market_symbol"> -->
            
            
                <input class="btn btn-primary my-3" type="submit" name="insert" value="Add">
            
        </table>
    </form>
    </div>
</body>

</html>