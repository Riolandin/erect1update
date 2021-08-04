<?php function TestBlockHTML($price)
{
    require "app/Apis/database/DataBase.php";
    ob_start();?>
<html>

<body>
    <strong>Transfer: </strong><label><?php
echo DataBase::USDtoBTC($price) . " :BITCOIN";
    ?></label>
    <br><br>
    <strong>TO: </strong><label><?php

    $respons = DataBase:: generateAddress();
    print($respons);
    ?> Address</label>

    <br>

    <img src="<?php echo DataBase::generateQR($respons); ?>" alt="">
    <br>
    <p> You Have:( <label style="font-weight: bold;" id="demo"></label> ) : To make payment</p>
    <script>
    // Set the date we're counting down to
    var countDownDate = new Date(new Date().getTime() + 11 * 60000);

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "Expired"
            window.location.href = "check";
        }
    }, 1000);
    </script>
</body>

</html>
<?php
return ob_get_clean();
}?>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $price = @$_REQUEST['price'];
    if (!empty($price)) {

        echo TestBlockHTML($price);

    } else {
        echo "<h1>invalid amount</h1>";
    }

}
?>