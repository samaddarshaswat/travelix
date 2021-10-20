<?php
            if(isset($_COOKIE['paymenttime'])){
                header("Location: bookingconfirmed.php");
            }
            else{
                echo"<script language='javascript'>
                 alert('Session expired!!');
                 window.location.href='combined.html';
                </script>";
            }
?>
        