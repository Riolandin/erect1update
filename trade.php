<?php
require "app/vendor/autoload.php";
require 'app/Apis/database/DataBase.php';
if (!DataBase::is_login()) {

    header('location:login');
}

use Codenixsv\CoinGeckoApi\CoinGeckoClient;

$client = new CoinGeckoClient();
if (isset($_SESSION['currency']) and !empty($_SESSION['currency'])) {
    $currency = $_SESSION['currency'];

} else {
    $currency = 'usd';

}

// $data = $client->derivatives()->getExchanges();
// $data = $client->simple()->getPrice('0x,bitcoin', 'usd,rub');
// $data = $client->coins()->getList();
$data = $result = $client->coins()->getMarkets($currency);
$response = $client->getLastResponse();
$headers = $response->getHeaders();

$btc_usd_current_price = $data['0']['current_price'];
$btc_usd_price_change_24h = $data['0']['price_change_24h'];
$btc_usd_total_volume = $data['0']['total_volume'];
$btc_usd_current_price = $data['0']['current_price'];

// return $btc_usd;

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jq.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title> Trades </title>
    <link rel="stylesheet" href="./css/firststyle.css">
    <style>
        .al3 {
            text-align: center;
            justify-content: center;
    }

    .buying {
        display: flex;
        justify-content: center;
        margin-top: 50px;
    }

    .buy {
        margin: 10px;
    }

    .sell {
        margin: 10px;
    }

    .mg2 {
        margin: 20px;
    }

    .hover:hover {
        background-color: blue;
        color: white;
        border: 2px solid transparent;
    }

    .maket {
        display: flex;
        justify-content: center;
    }

    .maket .view {
        width: 100px;
        height: 60px;
        border-radius: 5px;
        box-shadow: 2px 2px 5px black;
        background-color: whitesmoke;
        margin-left: 24px;
        text-align: center;
    }

        .maket .view :hover {
            box-shadow: 2px 2px 5px gray;
        }

        .sect {
            display: grid;
            grid-template-columns: 25% 70%;
            height: auto;
        }
    </style>
    <script>
        window.mmDataLayer = window.mmDataLayer || [];

        function mmData(o) {
            mmDataLayer.push(o);
        }
    </script>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">

        <a class="navbar-brand" href="./index.php"><img src="images/logo.png" alt="logo" class="logo"/></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item ml-4">
                    <a class="nav-link active" style="color: white;" aria-current="page" href="buysell">BUY/SELL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="color: white;" aria-current="page" href="trade">TRADE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="color: white;" aria-current="page" href="#">FINANCE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="color: white;" aria-current="page" href="card">CARDS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="color: white;" aria-current="page" href="#">AFFILIATE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="color: white;" aria-current="page" href="#">MARGIN TRADING</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="color: white;" aria-current="page" href="#">STAKING</a>
                </li>

                </ul>
                <form class="d-flex">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            up12345678
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item active" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout">logout</a></li>
                        </ul>
                    </div>
                    &nbsp;
                    <button type="button" class="btn btn-outline-dark" style="color: white;">Support</button>


                    <!-- <button type="button" class="btn btn-outline-dark" style="color: white;">up12345678</button> -->
                    <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                </form>
        </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">$ <?php echo (DataBase::getdollaBalance()); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">E <?php echo (DataBase::geteroBalance()); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">B <?php echo (DataBase::getbtcBalance()); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">ETHEth <?php echo (DataBase::getethBalance("eth")); ?></a>
                    </li>


                </ul>
                <form class="d-flex">
                    <a href="check">
                        <button type="button" class="btn btn-primary">Deposit</button>
                    </a>
                    &nbsp;
                    <button type="button" class="btn btn-primary">Widthraw</button>
                </form>
            </div>
        </div>
    </nav>

<div class="alert alert-success   al3 " role="alert">
    A simple success alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
</div>

    <div class="alert alert-light al3" role="alert">

        <div class="maket">
            <button class="view" id="c1">
                <strong>BTC/USD</strong><br>
                <b>$
                    <?php echo $btc_usd_current_price; ?>
                </b>

            </button>
            <button class="view" id="c2">
                <strong> ETH/USD </strong><br>
            </button>
            <button class="view" id="c3">
                <strong>XRP/USD</strong><br>
            </button>
            <button class="view" id="c4">
                <strong>BTC/EUR</strong><br>
            </button>
            <button class="view" id="c5">
                <strong> ETH/EUR</strong><br>
            </button>
            <button class="view" id="c6">
                <strong>XRP/EUR</strong><br>
            </button>
        </div>

    </div>
    <div class="alert alert-light" role="alert">
        <form class="row g-3">
            <div class="col-auto">
                <label for="search" class="visually-show mt-2">Market</label>
            </div>
            <!-- <label for="staticSearch" class="sm-2 col-form-label">Market</label> -->
            <div class="col-auto">

                <input type="text" class="form-control" id="search" placeholder="search...">

            </div>
            <div class="col-auto">
                <h3>BTC/USD</h3>
            </div>
            &nbsp;

            &nbsp;
            <div class="col-auto">
                <label for="">Last price: <?php echo $btc_usd_current_price; ?></label>
            </div>
            &nbsp;
            &nbsp;

            <div class="col-auto">
                <label for="">Daily change: <?php echo $btc_usd_price_change_24h; ?></label>
            </div>
            &nbsp;
            &nbsp;

            <div class="col-auto">
                <label for="">Today's open:<?php echo $btc_usd_current_price; ?></label>
            </div>
            &nbsp;
            &nbsp;

            <div class="col-auto">
                <label for="">24h volume: <?php echo $btc_usd_total_volume; ?> </label>

            </div>


        </form>
    </div>

<div class="alert alert-light sect" role="alert">
    <div class="letf">
        <ul class="list-group list-group-flush">
            <div style="display:flex;">
                <button id="usd" type="button">USD</button>
                <button id="eur" type="button">EUR</button>
                <button id="aud" type="button">AUD</button>
                <button id="gbp" type="button">GBP</button>
            </div>
            <?php

            for ($i = 0; $i < 20; $i++) {

                ?>
                <li class="list-group-item">
                    <Strong
                            style="text-transform:uppercase"><?php echo $data[$i]['symbol'] . "/" . $currency; ?></Strong>
                    <label for=""><?php echo $data[$i]['current_price'] ?> </label><br>
                    <small>
                        <label>24h change</label>
                        <label for=""><?php echo $data[$i]['price_change_percentage_24h']; ?> </label>
                    </small><br>
                    <small>
                        <label>24h volume</label>
                        <label for=""><?php echo $data[$i]['total_volume']; ?> </label>
                    </small><br>
                </li>


                <?php
            }

            ?>
        </ul>
    </div>
    <div class="right">
        <div id="r1">
            <div
                    style="height:560px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #56667F; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #56667F;padding:1px;padding: 0px; margin: 0px; width: 100%;">
                <div style="height:540px; padding:0px; margin:0px; width: 100%;">
                    <iframe
                            src="https://widget.coinlib.io/widget?type=chart&theme=light&coin_id=859&pref_coin_id=1505"
                            width="100%" height="536px" scrolling="auto" marginwidth="0" marginheight="0"
                            frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe>
                    </div>

                </div>
            </div>
            <div id="r2" style="display:none;">
                <div
                    style="height:560px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #56667F; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #56667F;padding:1px;padding: 0px; margin: 0px; width: 100%;">
                    <div style="height:540px; padding:0px; margin:0px; width: 100%;"><iframe
                            src="https://widget.coinlib.io/widget?type=chart&theme=light&coin_id=145&pref_coin_id=1505"
                            width="100%" height="536px" scrolling="auto" marginwidth="0" marginheight="0"
                            frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe>
                    </div>

                </div>
            </div>
            <div id="r3" style="display:none;">
                <div
                    style="height:560px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #56667F; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #56667F;padding:1px;padding: 0px; margin: 0px; width: 100%;">
                    <div style="height:540px; padding:0px; margin:0px; width: 100%;"><iframe
                            src="https://widget.coinlib.io/widget?type=chart&theme=light&coin_id=619&pref_coin_id=1505"
                            width="100%" height="536px" scrolling="auto" marginwidth="0" marginheight="0"
                            frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe>
                    </div>

                </div>
            </div>
            <div id="r4" style="display:none;">
                <div
                    style="height:560px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #56667F; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #56667F;padding:1px;padding: 0px; margin: 0px; width: 100%;">
                    <div style="height:540px; padding:0px; margin:0px; width: 100%;"><iframe
                            src="https://widget.coinlib.io/widget?type=chart&theme=light&coin_id=859&pref_coin_id=1506"
                            width="100%" height="536px" scrolling="auto" marginwidth="0" marginheight="0"
                            frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe>
                    </div>

                </div>
            </div>
            <div id="r5" style="display:none;">
                <div
                    style="height:560px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #56667F; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #56667F;padding:1px;padding: 0px; margin: 0px; width: 100%;">
                    <div style="height:540px; padding:0px; margin:0px; width: 100%;"><iframe
                            src="https://widget.coinlib.io/widget?type=chart&theme=light&coin_id=145&pref_coin_id=1506"
                            width="100%" height="536px" scrolling="auto" marginwidth="0" marginheight="0"
                            frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe>
                    </div>

                </div>
            </div>
            <div id="r6" style="display:none;">
                <div
                    style="height:560px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #56667F; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #56667F;padding:1px;padding: 0px; margin: 0px; width: 100%;">
                    <div style="height:540px; padding:0px; margin:0px; width: 100%;"><iframe
                            src="https://widget.coinlib.io/widget?type=chart&theme=light&coin_id=619&pref_coin_id=1506"
                            width="100%" height="536px" scrolling="auto" marginwidth="0" marginheight="0"
                            frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe>
                    </div>

                </div>
            </div>

        </div>
    </div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>

<script src="js/crypto.js">

</script>
<script>
    $(document).ready(function () {
        var url = "app/Apis/api.php";
        $("#usd").click(function (param) {
            $.ajax({
                type: "post",
                url: url,
                data: {
                    action: "currency",
                    currency: "usd"
                },

                success: function (response) {
                    window.location.reload();
                }
            });
        })
        $("#aud").click(function (param) {
            $.ajax({
                type: "post",
                url: url,
                data: {
                    action: "currency",
                    currency: "aud"
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        })
        $("#gbp").click(function (param) {
            $.ajax({
                type: "post",
                url: url,
                data: {
                    action: "currency",
                    currency: "gbp"
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        })
        $("#eur").click(function (param) {
            $.ajax({
                type: "post",
                url: url,
                data: {
                    action: "currency",
                    currency: "eur"
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        })
    })
</script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
< script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
integrity = "sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
crossorigin = "anonymous" > < /script> <
    script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
integrity = "sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
crossorigin = "anonymous" > < /script>
-->
</body>

</html>