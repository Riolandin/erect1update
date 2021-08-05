<?php
include 'app/Apis/database/DataBase.php';
if (!DataBase::is_login()) {

    header('location:login');
}

$f = DataBase::getCampain("f");
$s = DataBase::getCampain("s");
$t = DataBase::getCampain("t");
$btc_f = DataBase::USDtoBTC($f);
$btc_s = DataBase::USDtoBTC($s);
$btc_t = DataBase::USDtoBTC($t);
$btc_price= $_SESSION['btcprice'];
//echo $btc_f;

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title> Buy || Sell </title>
    <link rel="stylesheet" href="./css/firststyle.css">
    <link rel="stylesheet" href="./css/buysell.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style_2.css">
    <link rel="stylesheet" href="./css/external.css">
    <link rel="stylesheet" href="./fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- <script src="./js/jquery-3.5.1.js"> </script> -->
    <!-- ------------------------- new --------------------  -->
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="./images/logo.png">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css"
        integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- --- ---- MY STYLESHEETS -- -----  -->
    <link rel="stylesheet" href="./css/cardslide.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <script src="https://kit.fontawesome.com/e20b2f8784.js" crossorigin="anonymous"></script>
    <style>
    a {
        text-decoration: none;
        color: black;
    }

    .usd:focus {
        outline: none;

    }

    .usd {
        background-color: transparent;
    }
    </style>
    <script async="async" src="https://static.mobilemonkey.com/js/mm_d8ad3f03-2416-4b1e-ba73-25a730d24877-57224585.js">
    </script>
    <script src="https://www.momentcrm.com/embed"></script>
    <script>
    MomentCRM('init', {
        'teamId': 'erect1',
        'doChat': true,
        'doTracking': true,
    });
    </script>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
</head>

<!-- ----- --- - The Body - ---- -----  -->
<?php
// require "./buysellbody.php";
?>

<body>


    <!-- ------ ---- The Main nav Bar ------ ------ ---  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">

            <a class="navbar-brand" href="./index.php">
                <img src="images/logo.png" alt="logo" class="logo" />
            </a>
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

    <!-- ------ The 2nd nav Bar ----- -- -->
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
                        <a class="nav-link active" href="#">$<?php echo (DataBase::getdollaBalance()); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">E<?php echo (DataBase::geteroBalance()); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">B<?php echo (DataBase::getbtcBalance()); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="#">Eth<?php echo (DataBase::getethBalance("eth")); ?></a>
                    </li>


                </ul>
                <div class="d-flex">
                    <!-- <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalToggle"
                        role="button">Deposit</a> -->
                    <!-- <form action="app/buy.php" method="post">
                        <input type="hidden" name="price" value="1000">
                        <button type=" submit" class="btn btn-info">Deposit</button>
                    </form> -->
                    <a href="check"> <button type="button" class="btn btn-primary">Deposit</button></a>
                    &nbsp;
                    <button type="button" class="btn btn-primary">Widthraw</button>
                </div>
            </div>
        </div>
    </nav>



    <!--  ---- ---- Alert Bar ----- -- -->
    <div class="alert alert-success al3" role="alert">
        A simple success alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
    </div>

    <!-- ---- Buy Options ------ -->
    <div class="alert alert-light al3" role="alert">

        <!-- ---- Sub-topic ---  -->
        <h1>Buy Bitcoin with VISA or Mastercard in USD</h1>

        <!-- ---  Buying Transactions -----  -->
        <div class="buying">

            <!-- --- Buy side ---  -->
            <div class="buy">
                <label>BUY</label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            <!-- --- Sell side ---  -->
            <div class="sell">
                <label>FOR</label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>
    </div>


    <!--  ---- ---- Sales Cards ----- -- -->
    <div class="cards-container">

        <!--  ---- ---- first Cards ----- -- -->
        <div class="200-dollar">
            <div class="w3-card card two-h">
                <button class="price-tag">
                    <h1 class="font-topic"> $ <label class="font-topic" id="f"><?php echo $f;?></label> </h1>
                </button>
                <div class="timer">
                    <h2>Get</h2>
                    <b class="f-bigi"> <label class="f-bigi"><?php echo $btc_f?></label> </b>
                    <br>
                    <b class="f-bigi">BTC</b>
                </div>
                <p class="padding-sides"> <button id="f_buy" class="buy-btn"> BUY </button> </p>
            </div>
        </div>

        <!--  ---- ---- Second Cards ----- -- -->
        <div class="500-dollar">
            <div class="w3-card card five-h">
                <button class="price-tag">
                    <h1 class="font-topic"> $ <label class="font-topic" id="s"><?php echo $s;  ?> </h1>
                </button>
                <div class="timer">
                    <h2>Get</h2>
                    <b class="f-bigi"> <label class="f-bigi"><?php echo $btc_s?></label> </b>
                    <br>
                    <b class="f-bigi">BTC</b>
                </div>
                <p class="padding-sides"> <button id="s_buy" class="buy-btn"> BUY </button> </p>
                <div class="ff-bigi"> POPULAR </div>
            </div>
        </div>

        <!--  ---- ---- Third Cards ----- -- -->
        <div class="1000-dollar">
            <div class="w3-card card breeze one-k">
                <button class="price-tag">
                    <h1 class="font-topic"> $ <label class="font-topic" id="t"><?php echo $t; ?> </h1>
                </button>
                <div class="timer">
                    <h2>Get</h2>
                    <b class="f-bigi"> <label class="f-bigi"><?php echo $btc_t?></label> </b>
                    <br>
                    <b class="f-bigi">BTC</b>
                </div>
                <p class="padding-sides"> <button id="t_buy" class="buy-btn"> BUY </button> </p>
            </div>
        </div>

        <!--  ---- ---- Custom Cards ----- -- -->
        <div class="custom-dollar">
            <!-- ===== card =====  -->
            <div class="w3-card card your-amt">
                <!-- ==== head =====  -->
                <button class="price-tag">
                    <h1 class="font-topic-2"> Your Amount </h1>
                </button>

                <!-- ==== tablets =====  -->
                <p class="input-con">
                <div class="input-con-main">
                    <label> <input type="number" name="usd" id="usd" class="usd"></label>
                    <label>USD </label>
                </div>
                <small class="warn">
                    Min: 20 Max: 10000;
                </small>
                </p>

                <!-- ====== Tablets two =====  -->
                <p class="input-con">
                <div class="input-con-main">
                    <label> <input type="number" name="btc" id="btc" class="usd"></label>
                    <label>BTC </label>
                </div>
                <small class="warn">
                    Min: 0.0009
                </small>
                </p>
                <br><br><br><br>
                <p class="padding-sides"> <button id="conv_buy" class="buy-btn"> BUY </button> </p>
            </div>
        </div>

    </div>

    <br>

    <br>
    <br>
    <br>

    <!-- ----- --- - footer - ---- -----  -->
    <?php
// require "./footerwmain.php";
?>

    <br>
    <!-- ------ ------ Footer accessories ----- ---------  -->
    <div class="container-footer">
        <!-- ------ ------ Sub container ----- ---------  -->
        <div class="footer-sub-con">

            <!-- ------ ------ SERVIVCES ----- ---------  -->
            <div class="footer-services">

                <!-- --- service head ----  -->
                <h2 class="service-head"> Services </h2>

                <!-- --- list of service -----  -->
                <div class="service-list">
                    <p class="serv-list w3-hover-text-light-blue">Buy Bitcoin</p>
                    <p class="serv-list w3-hover-text-light-blue"> Buy Ethereum </p>
                    <p class="serv-list w3-hover-text-light-blue"> Buy Cryptocurrency </p>
                    <p class="serv-list w3-hover-text-light-blue"> BTC to USD </p>
                    <p class="serv-list w3-hover-text-light-blue"> SELL Bitcoin (BTC) </p>
                    <p class="serv-list w3-hover-text-light-blue"> BITCOIN Exchange </p>
                    <p class="serv-list w3-hover-text-light-blue"> Crypto Margin Trading </p>
                    <p class="w3-hover-text-light-blue" id="showmore"> Show more... </p>
                    <div class="show-more" id="show-more">
                        <p class="serv-list w3-hover-text-light-blue"> Buy DASH </p>
                        <p class="serv-list w3-hover-text-light-blue"> BTC to GBP </p>
                        <p class="serv-list w3-hover-text-light-blue"> BTC to EUR </p>
                        <p class="serv-list w3-hover-text-light-blue"> ETH to USD </p>
                        <p class="serv-list w3-hover-text-light-blue"> ETH to GBP </p>
                        <p class="serv-list w3-hover-text-light-blue"> Buy Bitcoin Cash </p>
                        <p class="serv-list w3-hover-text-light-blue"> Buy Cosmos (ATOM) </p>
                        <p class="serv-list w3-hover-text-light-blue"> Buy Litcoin (LTC) </p>
                        <p class="serv-list w3-hover-text-light-blue"> Buy Neo </p>
                        <p class="serv-list w3-hover-text-light-blue"> Buy Ontology (ONT) </p>
                        <p class="serv-list w3-hover-text-light-blue"> Buy Ripple (XRP) </p>
                        <p class="serv-list w3-hover-text-light-blue"> Buy Stellar Lumens </p>
                        <p class="serv-list w3-hover-text-light-blue"> Buy Tezos (XTZ) </p>
                        <p class="serv-list w3-hover-text-light-blue"> Buy Tron (TRX) </p>
                        <p class="serv-list w3-hover-text-light-blue"> Buy Cardano (ADA) </p>
                        <p class="serv-list w3-hover-text-light-blue"> Buy BAT </p>
                        <p class="serv-list w3-hover-text-light-blue"> Buy Ziliqa (ZIL) </p>
                        <p class="serv-list w3-hover-text-light-blue"> Buy ZRX </p>
                        <p class="serv-list w3-hover-text-light-blue"> Buy Holochain (HOT) </p>
                        <p class="serv-list w3-hover-text-light-blue"> Buy Tether (USDT) </p>
                        <p class="serv-list w3-hover-text-light-blue"> Buy Golem (GNT) </p>
                        <p class="w3-hover-text-light-blue" id="showless">
                            Hide/Show less. <i class='fas fa-angle-double-up'></i>
                        </p>
                    </div>
                </div>
            </div>

            <!-- ------ ------ INFORMATION ----- ---------  -->
            <div class="footer-information">

                <!-- --- Information head ----  -->
                <h2 class="service-head"> Information </h2>

                <div class="service-list">
                    <p class="serv-list w3-hover-text-light-blue">
                        <a href="./limitscomm.php" class="w3-hover-text-light-blue">
                            Limits and Commissions
                        </a>
                    </p>
                    <p class="serv-list w3-hover-text-light-blue">
                        <a href="#" class="w3-hover-text-light-blue"> How to Buy Crypto
                        </a>
                    </p>
                    <p class="serv-list w3-hover-text-light-blue">
                        <a href="#" class="w3-hover-text-light-blue"> Bitcoin Halving </a>
                    </p>
                    <p class="serv-list w3-hover-text-light-blue">
                        <a href="#" class="w3-hover-text-light-blue"> Fee Schedule </a>
                    </p>
                    <p class="serv-list w3-hover-text-light-blue">
                        <a href="./registerpage.php" class="w3-hover-text-light-blue"> Getting Started </a>
                    </p>
                    <p class="serv-list w3-hover-text-light-blue">
                        <a href="#" class="w3-hover-text-light-blue"> Identity Verification Guide </a>
                    </p>
                    <p class="serv-list w3-hover-text-light-blue">
                        <a href="#" class="w3-hover-text-light-blue"> Card Verification Guide </a>
                    </p>
                </div>
            </div>

            <!-- ------ ------ TOOLS ----- ---------  -->
            <div class="footer-tools">
                <!-- --- TOOLS head ----  -->
                <h2 class="service-head"> Tools </h2>

                <div class="service-list">
                    <p class="serv-list w3-hover-text-light-blue">
                        <a href="./limitscomm.php" class="w3-hover-text-light-blue"> API </a>
                    </p>
                    <p class="serv-list w3-hover-text-light-blue">
                        <a href="#" class="w3-hover-text-light-blue"> Bitcoin Calculator
                        </a>
                    </p>
                    <p class="serv-list w3-hover-text-light-blue">
                        <a href="#" class="w3-hover-text-light-blue"> Bitcoin Price Widget </a>
                    </p>
                    <p class="serv-list w3-hover-text-light-blue">
                        <a href="#" class="w3-hover-text-light-blue"> Mobile App </a>
                    </p>
                    <p class="serv-list w3-hover-text-light-blue">
                        <a href="#" class="w3-hover-text-light-blue"> Cryptocurrency Afilliate Program </a>
                    </p>

                </div>
            </div>

            <!-- ------ ------ ABOUT ----- ---------  -->
            <div class="footer-about">
                <!-- --- Information head ----  -->
                <h2 class="service-head"> About </h2>

                <div class="service-list">
                    <p class="serv-list w3-hover-text-light-blue">
                        <a href="#" class="w3-hover-text-light-blue"> About Us </a>
                    </p>
                    <p class="serv-list w3-hover-text-light-blue">
                        <a href="#" class="w3-hover-text-light-blue"> Contacts
                        </a>
                    </p>
                    <p class="serv-list w3-hover-text-light-blue">
                        <a href="#" class="w3-hover-text-light-blue"> Legal & Security </a>
                    </p>
                    <p class="serv-list w3-hover-text-light-blue">
                        <a href="#" class="w3-hover-text-light-blue"> Terms of Use </a>
                    </p>
                    <p class="serv-list w3-hover-text-light-blue">
                        <a href="./registerpage.php" class="w3-hover-text-light-blue"> Refund Policy </a>
                    </p>
                    <p class="serv-list w3-hover-text-light-blue">
                        <a href="#" class="w3-hover-text-light-blue"> Press </a>
                    </p>
                    <p class="serv-list w3-hover-text-light-blue">
                        <a href="#" class="w3-hover-text-light-blue"> Blog </a>
                    </p>
                </div>
            </div>

            <!-- ------ ------ FOLLOW ----- ---------  -->
            <div class="footer-follow">
                <h2 class="service-head"> Follow </h2>

                <div class="service-list">
                    <div class="social-links">
                        <i class="fab fa-twitter" id="twi"></i>
                        <i class="fab fa-telegram" id="twi"></i>
                        <i class="fab fa-facebook" id="twi"></i>
                        <i class="fab fa-linkedin" id="twi"></i>
                    </div>

                    <button type="submit" class="divflexxbuttmaxx">ERECT-ONE Status</button>
                    <br>
                    <div class="imageflexmax">
                        <img src="./images/visaimage.png">
                        <img src="./images/mastercard.png">
                        <img src="./images/skrill.jpg">
                        <!-- <img src="./images/sepa-payments.svg"> -->
                    </div>
                </div>
            </div>

        </div>

        <div class="bottomfoot">
            <div class="bottomfoot-min">
                <div class="fooma">
                    <div class="fooma-l"> ERECT-ONE LTD, ERECT-ONE Corp. and ERECT-ONE Limited are collectively
                        managing
                        the Platform.</div>
                    <div class="fooma-r"> Server time: </div>
                </div>

                <p>
                    ERECT-ONE Corp. serves United States residents only in jurisdictions where it is licensed to
                    operate.
                </p>
                <p>
                    ERECT-ONE Limited serves companies from the European Union and is regulated by the Gibraltar
                    Financial Services Commission as a DLT Provider under the authorization number: FSC1345B.
                </p>

                <p>
                    ERECT-ONE LTD serves residents throughout countries all over the world in which it operates.
                </p>
                <p>
                    ERECT-ONE Overseas LTD provides technical support for Users from the list countries prescribed
                    by
                    ERECT-ONE’s <a href="#">Terms of Use</a>.
                </p>

            </div>
        </div>



        <!-- ---------------- ALL THE <SCRIPTS> PEOPLE ARE HERE ---------  -->
        <script>
        $(document).ready(function() {
            // --- for footer ---
            $("#showmore").click(function() {
                $("#show-more").show().slideDown();
                $(this).fadeIn().slideUp();
            });

            $("#showless").click(function() {
                $("#show-more").slideUp();
                $("#showmore").slideDown();
            });
        })
        </script>
        <!-- <script src="./js/script.js"></script> -->
        <script src="./js/mainy.js"></script>

        <!-- Optional JavaScript; choose one of the two! -->
        <!-- ------ ---- your code not mine! ---  -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
        </script>
<!--        <script src="https://js.paystack.co/v1/inline.js"></script>-->
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>
        <script src="./js/crypto.js"> </script>
        <script src="./js/myjavacode.js"></script>
        <script src="js/jq.js"></script>
        <script src="https://js.paystack.co/v1/inline.js"></script>
        <script>
        $(document).ready(function() {

            function payWithPaystack(amt,btcamt) {

                let key = "<?php
                    echo DataBase::getApiPublic("paystack");
                    ?>";
                let gmail = "<?php
                    echo DataBase::getValue("email", "users")
                    ?>";
                let handler = PaystackPop.setup({
                    key: key.trim()??"pk_live_c0c951cc9ca521c1cccf99b4360221b121d87108", // Replace with your public key
                    email: gmail.trim(),
                    amount: amt*100,
                    currency:"USD",
                    ref: '' + Math.floor(Math.random() * 1000000000 + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                    // label: "Optional string that replaces customer email"
                    onClose: function () {
                        alert('Window closed.')
                    },
                    callback: function (response) {
                        let url="app/Apis/api.php";
                        // console.log(response)
                        if(response['message']==="Approved" || response['status']==="success"){
                            $.ajax({
                                url:url,
                                method: 'post',
                                data:{
                                    action:"mainpay",
                                    response:response,
                                    amt:btcamt
                                },
                                success: function (httpresponse) {
                                    console.log(httpresponse)
                                    alert(httpresponse);

                                    // the transaction status is in response.data.status
                                },
                            });
                        }else{
                            alert(response['message']);
                        }

                    },
                });
                handler.openIframe();
            }

            $("#f_buy").click(function () {

                let amt="<?php echo $f?>";
                let btc_amt="<?php echo $btc_f ?>";

                if(amt.trim().length>0){
                   payWithPaystack(amt.trim(),btc_amt);
                }
            })

            $("#s_buy").click(function () {

                let amt="<?php echo $s?>";
                let btc_amt="<?php echo $btc_s ?>";

                if(amt.trim().length>0){
                    payWithPaystack(amt.trim(),btc_amt);
                }
            })

            $("#t_buy").click(function () {

                let amt="<?php echo $t?>";
                let btc_amt="<?php echo $btc_t ?>";

                if(amt.trim().length>0){
                    payWithPaystack(amt.trim(),btc_amt);
                }
            })




            $("#usd").keyup(function () {
                let usdamt=$(this).val().trim();
                let btcprice="<?php echo $btc_price; ?>";
                let cp= (parseFloat(usdamt)/parseFloat(btcprice)).toFixed(9);
                $("#btc").val(cp);
            })
            $("#usd").change(function () {
                let usdamt=$(this).val().trim();
                let btcprice="<?php echo $btc_price; ?>";
                let cp= (parseFloat(usdamt)/parseFloat(btcprice)).toFixed(9);
                    $("#btc").val(cp);
                // return round((int)$amount / $price,5,PHP_ROUND_HALF_UP);
            });
            $("#btc").keyup(function () {
                let usdamt=$(this).val().trim();
                let btcprice="<?php echo $btc_price; ?>";
                let cp= (parseFloat(usdamt)*parseFloat(btcprice)).toFixed(2);
                $("#usd").val(cp);
            })
            $("#btc").change(function () {
                let usdamt=$(this).val().trim();
                let btcprice="<?php echo $btc_price; ?>";
                let cp= (parseFloat(usdamt)*parseFloat(btcprice)).toFixed(2);
                $("#usd").val(cp);
                // return round((int)$amount / $price,5,PHP_ROUND_HALF_UP);
            });
            // alert("iii");
            // let currency = 1;
            // $("#curchanger").change(function() {
            //     currency = $(this).val();
            // });
            // $("#pay").click(function() {
            //     // console.log(currency)
            //     let amt = $("#amt").val();
            //     if (amt.trim().length > 0) {
            //         // switch (currency) {
            //         //     case 1:
            //         //         $.ajax({
            //         //             type: "get",
            //         //             url: "app/buy.php",
            //         //             data: {
            //         //                 price: amt
            //         //             },
            //         //             // dataType: "dataType",
            //         //             success: function(response) {
            //         //                 $(".modal-body").html(response);
            //         //                 let myModal = new bootstrap.Modal(document
            //         //                     .getElementById('exampleModalToggle2'), {
            //         //                         keyboard: false
            //         //                     })
            //         //                 let myModal1 = new bootstrap.Modal(document
            //         //                     .getElementById('exampleModalToggle'), {
            //         //                         keyboard: false
            //         //                     })
            //         //                 myModal1.hide()
            //         //
            //         //
            //         //             }
            //         //         });
            //         //         break;
            //         // }
            //     } else {
            //         console.log("not ok")
            //     }
            //
            // })
        })
        </script>
</body>

</html>