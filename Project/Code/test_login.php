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
            header("Location: ./HomePageAfterLogin.html");
            exit();
            
        }else{
            echo '<script>alert("Invalide Email or Pssword")</script>';
            
        }
    }
}

?>