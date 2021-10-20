<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Forgot password</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <div class="center">
      <h1>Forgot Password</h1>
      <form action="forgotvalidate.php" method="post" >
        <div class="txt_field">
          <input type="text" name="uemail"required>
          <span></span>
          <label>Registered email</label>
        </div>
        <div class="txt_field">
          <input type="text" name="usecurity"required>
          <span></span>
          <label>What was your first pet's name?</label>
        </div>
        <!-- <div class="txt_field">
          <input type="" name="upw">
          <span></span>
          <label>DOB</label>
        </div> -->
        <!-- <div class="pass"><a href="#">Forgot Password?</a></div> -->
        <input type="submit" value="Submit" name="submit">
          Already a member? <a href="login.php">Login</a>
        </div>
      </form>
    </div>

  </body>
</html>
