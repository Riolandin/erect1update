<?php
require 'app/Apis/database/DataBase.php';

if (!DataBase::is_login()) {

    header('location:login');
}
$qry = "SELECT * FROM `cards` WHERE `id`=:id";
$stm =DataBase::getConn()->prepare($qry);
$id = $_SESSION["userid"];
$stm->execute(array(":id" => $id));
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
    <script async="async" src="https://static.mobilemonkey.com/js/mm_d8ad3f03-2416-4b1e-ba73-25a730d24877-57224585.js">
    </script>
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

    <style>
    a {
        text-decoration: none;
        color: black;
    }



    .atmcard {
        width: 430px;
        height: 250px;
        background-color: white;
        margin-top: 24px;
        margin-bottom: 24px;
        margin-left: 24px;
        border-radius: 20px;
        padding: 22px;
    }

    .contain {
        display: flex;
        justify-content: center;
    }

    .atmlogo {
        /* display: flex;
        justify-content: right; */
        width: 100px;
        float: right;
        text-align: right;

    }

    .input {
        border: 0.4px solid black;
        height: 35px;
        padding-left: 10px;
        padding-right: 10px;
    }

    .card-number {
        border: none;
        height: 30px;
        width: 200px;
        background-color: transparent;
        border: none;
    }

    .ccv {
        border: none;
        height: 30px;
        width: 50px;
        margin-left: 100px;
        background-color: transparent;
    }

    .ccv:focus {
        outline: none;
    }

    .expinput {
        border: 0.4px solid black;
        height: 35px;
        width: 100px;
        padding-left: 10px;
        padding-right: 10px;
        /* margin-top: 22px; */
    }

    .expinput input {
        height: 30px;
        width: 70px;
        border: none;
        font-size: 50;
        background-color: transparent;
        /* margin: 5px; */
    }

    .expinput input:focus {
        outline: none;
        border: none;

    }

    .input input:focus {
        outline: none;
        border: none;
    }

    .card-input {
        margin-top: 70px;
    }

    .allcards {
        padding: 24px;
    }

    body {
        background-color: wheat;
    }
    </style>

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
                        <a class="nav-link active" style="color: white;" aria-current="page" href="#">CARDS</a>
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
                            href="#">Eth<?php echo (DataBase::getethBalance()); ?></a>
                    </li>


                </ul>
                <form class="d-flex">
                    <a href="check"> <button type="button" class="btn btn-primary">Deposit</button></a>
                    &nbsp;
                    <button type="button" class="btn btn-primary">Widthraw</button>
                </form>
            </div>
        </div>
    </nav>


    <!-- cadinf -->
    <form action="addcard" method="post">
        <div class="contain">
            <div class="atmcard">
                <div class="atmlogo">
                    <div style="display: flex; justify-content: right; ">
                        <img src="images/mastercard.svg" alt="" height="50px" width="50px">
                        <img src="images/visa.svg" alt="" height="50px" width="50px">
                    </div>
                </div>
                <div class="card-input">
                    <label for="">card number</label><br>
                    <div class="input">
                        <input required type="text" autocomplete="on" class="card-number" name="cnumber" id=""
                            placeholder="xxxx xxxx xxxx xxxx">
                        <input name="chrome-autofill-dummy1" style='display:none' disabled />
                        <input name="chrome-autofill-dummy2" style='display:none' disabled />

                        <input type="text" required autocomplete="on" class="ccv" name="ccv" id="" placeholder="ccv">
                    </div>
                    <!-- <small for="">please enter your payment card</small><br> -->
                    <div class="atmlogo">
                        <br>
                        <label for="">expired date</label><br>
                        <div class="expinput">
                            <input type="text" required name="expdate" id="" autocomplete="on"
                                x-autocompletetype="cc-number" placeholder="MM/YY">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <center><button type="submit" class="btn btn-primary">Save Card</button></center>
        <br>
    </form>
    <!-- show cards -->
    <div class="allcards">
        <?php
if ($stm->rowCount() > 0) {
    while ($data = $stm->fetch()) {
        ?>
        <img src="images/mastercard.svg" alt="" height="30px" width="30px">
        <img src="images/visa.svg" alt="" height="30px" width="30px">

        &nbsp;
        &nbsp;
        <strong><label for=""> <?php echo substr($data->card_number,0,4); ?> **** **** ****</label></strong>
        <?php
        echo("<br>");
}
}
?>
    </div>
    <!-- ========================== FOOTER ACCESSORIES ============================== -->
    <div class="footer-main">

        <!-- ========================== SECTION 4 ============================================ -->
        <section class="sec4">
            <div class="foooter">
                <div class="divv2">
                    <h3>SERVICES</h3>
                    <ul class="ulstyle">
                        <li><a href="#" class="listyle">Buy Bitcoin</a></li>
                        <li><a href="#" class="listyle">Buy Ethereum</a></li>
                        <li><a href="#" class="listyle">Buy DASH</a></li>
                        <li><a href="#" class="listyle">BTC TO USD</a></li>
                        <li><a href="#" class="listyle">Sell Bitcoin (BTC)</a></li>
                        <li><a href="#" class="listyle">Bitcoin Exchange</a></li>
                        <li><a href="#" class="listyle">Crypto Margin Trading</a></li>
                        <li><a href="#" class="listyle">BTC to GBP</a></li>
                        <li><a href="#" class="listyle">BTC to EUR </a></li>
                        <li><a href="#" class="listyle"> ETH to GBP </a></li>
                        <li><a href="#" class="listyle">Buy Bitcoin Cash</a></li>
                        <li><a href="#" class="listyle">Buy Cosmos (ATOM)</a></li>
                        <li><a href="#" class="listyle">Buy Litecoin (LTC) (ATOM)</a></li>
                        <li><a href="#" class="listyle">Buy Neo</a></li>
                        <li><a href="#" class="listyle">Buy Ontology (ONT)</a></li>
                        <li><a href="#" class="listyle">Buy Ripple (XRP)</a></li>
                        <li><a href="#" class="listyle">Buy Stellar Lumens</a></li>
                        <li><a href="#" class="listyle">Buy Tezos (XTZ)</a></li>
                        <li><a href="#" class="listyle">Buy TRON (TRX)</a></li>
                    </ul>
                </div>

                <div class="divv2">
                    <h3>INFORMATION</h3>
                    <ul class="ulstyle">
                        <li><a href="#" class="listyle">Limits and Commissions</a></li>
                        <li><a href="#" class="listyle">How to Buy Crypto</a></li>
                        <li><a href="#" class="listyle">Bitcoin Halving</a></li>
                        <li><a href="#" class="listyle">Fee Schedule</a></li>
                        <li><a href="#" class="listyle">Getting Started</a></li>
                        <li><a href="#" class="listyle">Bitcoin Exchange</a></li>
                        <li><a href="#" class="listyle">Identity verification Guide</a></li>
                        <li><a href="#" class="listyle">Card Verifiication Guide</a></li>
                    </ul>
                </div>

                <div class="divv2">
                    <h3>TOOLS</h3>
                    <ul class="ulstyle">
                        <li><a href="#" class="listyle">API</a></li>
                        <li><a href="#" class="listyle">Bitcoin Calculator</a></li>
                        <li><a href="#" class="listyle">Bitcoin Price Widget</a></li>
                        <li><a href="#" class="listyle">Mobile App</a></li>
                        <li><a href="#" class="listyle">Cryptocurrency Affliate Program</a></li>
                    </ul>
                </div>

                <div class="divv2">
                    <h3>ABOUT</h3>
                    <ul class="ulstyle">
                        <li><a href="#" class="listyle">About Us</a></li>
                        <li><a href="#" class="listyle">Contacts</a></li>
                        <li><a href="#" class="listyle">Legal & Security</a></li>
                        <li><a href="#" class="listyle">Terms of Use</a></li>
                        <li><a href="#" class="listyle">Refund Policy</a></li>
                        <li><a href="#" class="listyle">Press</a></li>
                        <li><a href="#" class="listyle">Blog</a></li>
                        <li><a href="#" class="listyle"> Help Centre </a></li>
                    </ul>
                </div>

                <div class="divvflexx">
                    <h3>FOLLOW</h3>

                    <div class="social-links">
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-telegram"></i>
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-linkedin"></i>
                    </div>

                    <button type="submit" class="divflexxbutt">CEX.iO Status</button>

                    <div class="imageflex">
                        <img src="./images/visaimage.png">
                        <img src="./images/mastercard.png">
                        <img src="./images/skrill.jpg">
                        <!-- <img src="./images/sepa-payments.svg"> -->
                    </div>
                </div>
            </div>
        </section>

        <!-- ================FOOTER DISPLAY FOR MAX WIDTH================================ -->
        <section class="secc4">
            <div class="footergrid">
                <div class="maxgrid1">
                    <div class="maxdivv1">
                        <h3>Services</h3>
                        <ul class="ulstyle">
                            <li><a href="#" class="listyle">Buy Bitcoin</a></li>
                            <li><a href="#" class="listyle">Buy Ethereum</a></li>
                            <li><a href="#" class="listyle">Buy DASH</a></li>
                            <li><a href="#" class="listyle">BTC TO USD</a></li>
                            <li><a href="#" class="listyle">Sell Bitcoin (BTC)</a></li>
                            <li><a href="#" class="listyle">Bitcoin Exchange</a></li>
                            <li><a href="#" class="listyle">Crypto Margin Trading</a></li>
                            <li><a href="#" class="listyle">BTC to GBP</a></li>
                            <li><a href="#" class="listyle">BTC to EUR </a></li>
                            <li><a href="#" class="listyle"> ETH to GBP </a></li>
                            <li><a href="#" class="listyle">Buy Bitcoin Cash</a></li>
                            <li><a href="#" class="listyle">Buy Cosmos (ATOM)</a></li>
                            <li><a href="#" class="listyle">Buy Litecoin (LTC) (ATOM)</a></li>
                            <li><a href="#" class="listyle">Buy Neo</a></li>
                            <li><a href="#" class="listyle">Buy Ontology (ONT)</a></li>
                            <li><a href="#" class="listyle">Buy Ripple (XRP)</a></li>
                            <li><a href="#" class="listyle">Buy Stellar Lumens</a></li>
                            <li><a href="#" class="listyle">Buy Tezos (XTZ)</a></li>
                            <li><a href="#" class="listyle">Buy TRON (TRX)</a></li>
                        </ul>
                    </div>

                    <div class="maxdivv1">
                        <h3>Information</h3>
                        <ul class="ulstyle">
                            <li><a href="#" class="listyle">Limits and Commissions</a></li>
                            <li><a href="#" class="listyle">How to Buy Crypto</a></li>
                            <li><a href="#" class="listyle">Bitcoin Halving</a></li>
                            <li><a href="#" class="listyle">Fee Schedule</a></li>
                            <li><a href="#" class="listyle">Getting Started</a></li>
                            <li><a href="#" class="listyle">Bitcoin Exchange</a></li>
                            <li><a href="#" class="listyle">Identity verification Guide</a></li>
                            <li><a href="#" class="listyle">Card Verifiication Guide</a></li>
                        </ul>
                    </div>
                </div>

                <div class="maxgrid2">
                    <div class="divv2">
                        <h3>Tools</h3>
                        <ul class="ulstyle">
                            <li><a href="#" class="listyle">API</a></li>
                            <li><a href="#" class="listyle">Bitcoin Calculator</a></li>
                            <li><a href="#" class="listyle">Bitcoin Price Widget</a></li>
                            <li><a href="#" class="listyle">Mobile App</a></li>
                            <li><a href="#" class="listyle">Cryptocurrency Affliate Program</a></li>
                        </ul>
                    </div>

                    <div class="divv2">
                        <h3>About</h3>
                        <ul class="ulstyle">
                            <li><a href="#" class="listyle">About Us</a></li>
                            <li><a href="#" class="listyle">Contacts</a></li>
                            <li><a href="#" class="listyle">Legal & Security</a></li>
                            <li><a href="#" class="listyle">Terms of Use</a></li>
                            <li><a href="#" class="listyle">Refund Policy</a></li>
                            <li><a href="#" class="listyle">Press</a></li>
                            <li><a href="#" class="listyle">Blog</a></li>
                            <li><a href="#" class="listyle"> Help Centre </a></li>
                        </ul>
                    </div>
                </div>


                <h3 class="h3follow">Follow</h3><br>
                <div class="socialimgge">
                    <div class="social-links">
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-telegram"></i>
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-linkedin"></i>
                    </div>

                    <button type="submit" class="divflexxbuttmax">CEX.iO Status</button>

                    <div class="imageflexmax">
                        <img src="./images/visaimage.png">
                        <img src="./images/mastercard.png">
                        <img src="./images/skrill.jpg">
                        <!-- <img src="./images/sepa-payments.svg"> -->
                    </div>
                </div>

            </div>
        </section>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->

    <script src="mainy.js"></script>
</body>

</html>