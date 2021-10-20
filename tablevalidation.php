<?php
  $conn = mysqli_connect("localhost","root","","project");
  $classic=intval($_POST["classic"]);
  $deluxe=intval($_POST["deluxe"]);
  $suite=intval($_POST["suite"]); 
  $numofchildren=0;
  $numofadults=0;
  session_start();
  $_SESSION['classic']=$classic;
  $_SESSION['deluxe']=$deluxe;
  $_SESSION['suite']=$suite;
  
  //Function for calculating number of adults and children according to selection
  function total(int $c, int $d, int $s)
  {
    $numofadults= (2*($c+$d)) + (4*$s);
    $numofchildren= 2*($d+$s);
    return $numofchildren+$numofadults;
  }
  //Calculating the total number of members according to room selection

  $totalnumofmembers=total($classic,$deluxe,$suite);
  
  session_start();
  $selectednumofadults=$_SESSION['adults'];
  $selectednumofchildren=$_SESSION['children'];
  $checkindate=$_SESSION['Check-in'];
  $checkoutdate=$_SESSION['Check-out'];
  
  // session_destroy();

// Function to calculate availability

  function availability($ci,$roomtype){
    if(isset($conn)){
      $verify=mysqli_query($conn, "select $roomtype from room where date='$ci';");
      $row=mysqli_fetch_assoc($verify);
      return $row["$roomtype"];
    }
    else{
      echo "Connection lost...!!";
    }
      
  }

  //Storing the number of rooms available in local variables
if($conn){
  $verify=mysqli_query($conn, "select classic from room where date='$checkindate';");
  $row=mysqli_fetch_assoc($verify);
  $classicavailability= $row["classic"];
  $verify=mysqli_query($conn, "select deluxe from room where date='$checkindate';");
  $row=mysqli_fetch_assoc($verify);
  $deluxeavailability= $row["deluxe"];
  $verify=mysqli_query($conn, "select suite from room where date='$checkindate';");
  $row=mysqli_fetch_assoc($verify);
  $suiteavailability= $row["suite"];
}
else{
  echo "Connection lost....!!";
}
  

  //Storing number of memebers which was entered in the main page
  $selectedtotalmembers=$selectednumofadults+$selectednumofchildren;
  
  //Check: total memebers after room selection should be >= total selected member
  if($totalnumofmembers<$selectedtotalmembers){
    echo"<script language='javascript'>
                 alert('Capacity not fulfilled, select correct number of rooms!!');
                 window.location.href='combined.html';
            </script>";
  }
  else{
    // Put the availibilty of room's number fetched from SQL table in place of "15".
    if($classic>$classicavailability and $classicavailability>0){
      echo"<script language='javascript'>
                 alert('Current room selection is not available, change your travel dates or room type.');
                 window.location.href='combined.html';
            </script>";
    }
    elseif($deluxe>$deluxeavailability and $deluxeavailability>0){
      echo"<script language='javascript'>
                 alert('Current room selection is not available, change your travel dates or room type.');
                 window.location.href='combined.html';
            </script>";
    }
    elseif($suite>$suiteavailability and $suiteavailability>0){
      echo"<script language='javascript'>
                 alert('Current room selection is not available, change your travel dates or room type.');
                 window.location.href='combined.html';
            </script>";
    }
    else{
      header("Location: payment.php");
    }
    
    
  }
?>
