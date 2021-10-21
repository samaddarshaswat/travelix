<?php
    $cookie_name="paymenttime";
    $cookie_value=1;
    setcookie($cookie_name, $cookie_value, time()+240, "/");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Form</title>
    <link rel="stylesheet" href="payment.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<script>
function validation()
{

var owner=document.getElementById('owner');
var pw=document.getElementById('pw');
var cardnumber=document.getElementById('cardnumber');
var months=document.getElementById('months');
var years=document.getElementById('years');
if(owner.value=="")
{
alert('Please enter the name of the owner!');
return false;
}
if(pw.value=="")
{
alert('Please enter the password!');
return false;
}
if(cardnumber.value=="")
{
alert('Please enter the cardnumber!');
return false;
}
if(months.value=="")
{
alert('Please select the month!');
return false;
}
if(years.value=="")
{
alert('Please select the year!');
return false;
}

}
</script>
</head>
<body>
    <form action="paymentvalidate.php" method="post" onsubmit="return validation()">
    <div class="container">
        <h1>Confirm Your Payment</h1>
        <div class="first-row">
            <div class="owner">
                <h3>Owner</h3>
                <div class="input-field">
                    <input type="text" id="owner" placeholder="Your name">
                </div>
            </div>
            <div class="cvv">
                <h3>CVV</h3>
                <div class="input-field">
                    <input minlength="3" maxlength="3" type="password" id="pw" placeholder="CVV" >
                </div>
            </div>
        </div>
        <div class="second-row">
            <div class="card-number">
                <h3>Card Number</h3>
                <div class="input-field">
                    <input type="tel" id="cardnumber" minlength="16" maxlength="16" placeholder="Card number">
                </div>
            </div>
        </div>
        <div class="third-row">
            <h3>Expiry date</h3>
            <div class="selection">
                <div class="date">
                    <select name="months" id="months">
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                      </select>
                      <select name="years" id="years">
                        <option value="2020">2026</option>
                        <option value="2019">2025</option>
                        <option value="2018">2024</option>
                        <option value="2017">2023</option>
                        <option value="2016">2022</option>
                        <option value="2015">2021</option>
                      </select>
                </div>
                <div class="cards">
                    <img src="images/mc.png" alt="">
                    <img src="images/vi.png" alt="">
                    <img src="images/pp.png" alt="">
                </div>
            </div>    
        </div>
        <input style="background-color: blueviolet; color: white;text-align: center;
    text-transform: uppercase;
    text-decoration: none;
    padding: 10px;
    font-size: 18px; cursor:pointer; "type="submit" value="CONFIRM PAYMENT" class="btn"> 
    </div>
</form>
</body>
</html>