<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","project");
	if($conn)
    {
		echo "Connnected to backend <br />";
	}
	else
    {
		echo "Not connected...";
		echo mysqli_connect_error( );
	}
    /*
    $qry=mysqli_query($conn, "create table hoteluser(uname varchar(20), uphone int(20), uemail varchar(30), uadd varchar(100), udob date, upw varchar(15));" );
	if($qry)
    {
		echo "<br>Table created<br>";
	}
	else
    {
		echo "Table not created";	
	}

    */
    if(isset($_POST['username']))
    {
        echo "variable is set";
    }
    else{
        echo "variable not set";
    }
    $user = $_POST['username'];
    $pw = $_POST['pw'];
    $phone=intval($_POST['phone']);
    $add=$_POST['address'];
    $dob=$_POST['dob'];
    $email=$_POST['email'];
    $security=$_POST["security"];
    echo $dob;
	$verify=mysqli_query($conn, "insert into user values('$user','$phone','$email','$add','$dob','$pw','$security');");
    if($verify==True)
    {
        echo "<script>alert('Succesfully Registered!!');</script>";
        header("Location: login.php"); 
        
        
    }
    else
    {
        echo mysqli_error($conn);
        echo "<script>alert('Could not register');</script>";
    }
    
?>

