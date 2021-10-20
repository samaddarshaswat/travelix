<?php
    if(isset($_POST['submit'])){
        $uemail=$_POST['uemail'];
        $usecurity=$_POST['usecurity'];
    }
    $conn = mysqli_connect("localhost","root","","project");
	if($conn){
		
        $result=mysqli_query($conn,"select * from user where uemail='$uemail' and usecurity='$usecurity'") or die("Cant connect to server!");
        
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                session_start();
                // $_SESSION['uname']=$row['uname'];
                // $_SESSION['upw']=$row['upw'];
                $_SESSION['flag']=1;
                echo"<script language='javascript'>
                 alert('Login successful via security question. You can continue your booking');
                 window.location.href='combined.html';
                </script>";
            }
        }
        else{
            echo"<script language='javascript'>
                 alert('Email or security question's answer doesn't match!!');
                 window.location.href='forgotpassword.php';
            </script>";
            
            // echo "<a href='login.php'> Go back to login page</a>";
        }
	}
	else{
		echo "connection failed";
	}
    

    
?>
