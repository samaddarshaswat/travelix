
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking confirmed
    </title>
    <style>
    img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
    </style>
</head>
<body>
    
</body>
</html>
<?php
    session_start();
    $checkindate=$_SESSION['Check-in'];
    $checkoutdate=$_SESSION['Check-out'];
    $classic=$_SESSION['classic'];
    $deluxe=$_SESSION['deluxe'];
    $suite=$_SESSION['suite'];
    $uname=$_SESSION['uname'];
    $adults=$_SESSION['adults'];
    $children=$_SESSION['children'];
    // session_unset();
    // session_destroy();
    $message=
    $conn = mysqli_connect("localhost","root","","project");
    if($conn)
    {
        if($classic!=0){
                
                mysqli_query($conn,"update room set classic=classic-$classic where date>='$checkindate' and date<='$checkoutdate';");
                if($deluxe!=0){
                    mysqli_query($conn,"update room set deluxe=deluxe-$deluxe where date>='$checkindate' and date<='$checkoutdate';");
                }
                if($suite!=0){
                    mysqli_query($conn,"update room set suite=suite-$suite where date>='$checkindate' and date<='$checkoutdate';");
                }

                mysqli_query($conn,"insert into `booking` (`id`, `uname`, `checkindate`, `checkoutdate`, `adults`, `children`, `classic`, `deluxe`, `suite`) 
                VALUES (NULL, '$uname', '$checkindate', '$checkoutdate', '$adults', '$children', 
                '$classic', '$deluxe', '$suite');");
               
                // $Uname = "sjkdfhsjkdfhsk";
                // echo `<script>alert(`  + $Uname + `)</script>`;

                echo "<img src='images/bookingconfirmed.PNG'>";

            }
        
        elseif($deluxe!=0){
            //SQL code to decrement number of rooms here
            mysqli_query($conn,"update room set deluxe=deluxe-$deluxe where date>='$checkindate' and date<='$checkoutdate';");
            if($suite!=0){
                mysqli_query($conn,"update room set suite=suite-$suite where date>='$checkindate' and date<='$checkoutdate';");
            }
            if($classic!=0){
                mysqli_query($conn,"update room set classic=classic-$classic where date>='$checkindate' and date<='$checkoutdate';");
            }
            mysqli_query($conn,"insert into `booking` (`id`, `uname`, `checkindate`, `checkoutdate`, `adults`, `children`, `classic`, `deluxe`, `suite`) 
                VALUES (NULL, '$uname', '$checkindate', '$checkoutdate', '$adults', '$children', 
                '$classic', '$deluxe', '$suite');");
            
            echo "<img src='images/bookingconfirmed.PNG'>";
        }
        elseif($suite!=0){
            //SQL code to decrement number of rooms here
            mysqli_query($conn,"update room set suite=suite-$suite where date>='$checkindate' and date<='$checkoutdate';");
            if($deluxe!=0){
                mysqli_query($conn,"update room set deluxe=deluxe-$deluxe where date>='$checkindate' and date<='$checkoutdate';");
            }
            if($classic!=0){
                mysqli_query($conn,"update room set classic=classic-$classic where date>='$checkindate' and date<='$checkoutdate';");
            }
            mysqli_query($conn,"insert into `booking` (`id`, `uname`, `checkindate`, `checkoutdate`, `adults`, `children`, `classic`, `deluxe`, `suite`) 
                VALUES (NULL, '$uname', '$checkindate', '$checkoutdate', '$adults', '$children', 
                '$classic', '$deluxe', '$suite');");

            echo "<img src='images/bookingconfirmed.PNG'>";
        }
    }   
    
    else{
        echo"<script language='javascript'>
                 alert('Connection lost, retry booking');
                 window.location.href='combined.html';
                </script>";
    }
    
?>