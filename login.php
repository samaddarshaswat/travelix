<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login page</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form action="loginvalidate.php" method="post" >
        <div class="txt_field">
          <input type="text" name="uname"required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="upw">
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass"><a style=" color: #666666;;;text-decoration:none;" href="forgotpassword.php">Forgot Password?</a></div>
        <input type="submit" value="Login" name="login">
          Not a member? <a style=" color: #666666;;;text-decoration:none;" href="signup.html">Signup</a>
        </div>
      </form>
    </div>

  </body>
</html>
