 <?php
    $conn = mysqli_connect("localhost","root","","project");
    session_start();
    $_SESSION['Check-in']=$_POST["Check-in"];
    $_SESSION['Check-out']=$_POST["Check-out"];
    $_SESSION['adults']=$_POST["adults"];
    $_SESSION['children']=$_POST["children"];
    $checkindate=$_POST['Check-in'];
    $flag=$_SESSION['flag'];
    if($flag!=1){
        header("Location: login.php");
    }
    
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking</title>
    <link rel="stylesheet" href="table.css">  
    <script>

    </script>
</head>
<body>
    <div class="main-heading">
                    <h1 class="title">Book your Rooms!!</h1>
                    
                </div>
    <div class="table_responsive bgcolor">
      <form method="post" action="tablevalidation.php">
        <table>
          <thead>
            <tr>
              
              <th>Room Image</th>
              <th>Name</th>
              <th>Capacity</th>
              
              <th>Avaibility</th>
              <th>Requirement</th>
              <th>Tariff</th>
            </tr>
          </thead>
      
          <tbody>
            <tr>
              
              <td><img src="images/img3.jpg" alt=""></td>
              <td>Classic</td>
              <td>Adults:2, Children:0</td>
              
              <td>
                <?php
                    	$verify=mysqli_query($conn, "select classic from room where date='$checkindate';");
                      $row=mysqli_fetch_assoc($verify);
                      if($row["classic"]<0){
                        echo "0";
                      }
                      else{
                        echo $row["classic"];
                      }
                      
                ?>
              </td>
              <td><input name="classic" type="number" id="classic" min="1"></td>
              <td>₹2999/Night</td>
            </tr>
      
            <tr>
              
              <td><img src="images/img1.jpg" alt=""></td>
              <td>Deluxe</td>
              <td>Adults:2, Children:2</td>
              
              <td>
              <?php
                    	$verify=mysqli_query($conn, "select deluxe from room where date='$checkindate';");
                      $row=mysqli_fetch_assoc($verify);
                      if($row["deluxe"]<0){
                        echo "0";
                      }
                      else{
                        echo $row["deluxe"];
                      }
                ?>
              </td>
              <td><input name="deluxe" type="number" id="deluxe" min="1"></td>
              <td>₹3999/Night</td>
            </tr>
            
      
            <tr>
              
              <td><img src="images/img2.jpg" alt=""></td>
              <td>Suite</td>
              <td>Adults:4, Children:2</td>
              <td>
              <?php
                    	$verify=mysqli_query($conn, "select suite from room where date='$checkindate';");
                      $row=mysqli_fetch_assoc($verify);
                      if($row["suite"]<0){
                        echo "0";
                      }
                      else{
                        echo $row["suite"];
                      }
                ?>
              </td>
              <td><input name="suite" type="number" id="suite" min="1"></td>
              <td>₹6999/Night</td>
            </tr>
            
          </tbody>
        </table>
          
      </div>
      <div >
        <input name="submit" type="submit" class="btn form-btn btn-purple" >
      </div>
      </form>   
</body>
</html>