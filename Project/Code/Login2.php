
<?php
    $conn= new mysqli ('localhost','root','','rent');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }
    else{
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $email=$_POST['email'];
        $password=$_POST['password'];

        $sql="SELECT * from register Where email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result); 
        

        if($count==1){
            header("Location: ./HomePageAfterLogin.php?email=$email");
            exit();
            
        }else{
            echo '<script>alert("Invalide Email or Pssword")</script>';
            
        }
    }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./Login1.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap"
    />
  </head>
  <body> 
    <form onsubmit="return validation()" method="POST">
        <div class="login-2">
          <b class="renthere">RentHere</b>
          <div class="login-parent">
           <div class="login2">Login</div>
            <div class="username-field-parent">
              <div class="username-field">
                <div class="label-parent">
                  <div class="label">Email</div>
                     <div class="field-tip">
                      <div class="icon">
                        <img class="question-circle-icon" alt="" src="./public/question-circle.svg" />
                      </div>
                    </div>
                  </div>
                <input class="input" type="email" placeholder="Email" name="email" id="email" required autocomplete="off" />

                </div>
                <div class="password-field">
                  <div class="label-parent">
                    <div class="label">Password</div>
                      <div class="field-tip">
                        <div class="icon">
                           <img class="question-circle-icon" alt="" src="./public/question-circle.svg" />
                          </div>
                        </div>
                      </div>
                    <input class="input" type="password" placeholder="Password" maxlength="{16}" minlength="{4}" name="password"
                     id="password" required />

                <div class="assistive-text">
                <div class="text">Assistive text</div>
              </div>
          </div>
          <button class="button" id="button" type="submit" value="Login">
            <b class="label2">Login</b>
            <div class="icon2">
            </div>
          </button>
     </form>
          <button class="button1" onclick="window.location.href='Register.html';" >
            <div class="label3">Register</div>
          </button>
          <a class="forgot-your-password">Forgot your password?</a>
        </div>
        </div>
       </div>
    
  </body>
</html>
