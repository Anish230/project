<?php
    //data
    $firstname= $_POST['firstname'];
    $lastname= $_POST['lastname'];
    $email= $_POST['email'];
    $gender= $_POST['gender'];
    $password= $_POST['password'];
    $birthday= $_POST['birthday'];
    $number= $_POST['number'];

    //database connction 
    $conn = new mysqli('localhost','root','','rent'); 
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }
    else{//check email 
        $SELECT="SELECT email from register Where email = ? limit 1"; 
        $INSERT = "INSERT INTO register (firstname, lastname, email, gender, password, birthday, number)
             values(?,?,?,?,?,?,?)"; 

             $stmt = $conn->prepare($SELECT);
             $stmt->bind_param("s",$email);
             $stmt->execute();
             $stmt->bind_result($email);
             $stmt->store_result();
             $rnum=$stmt->num_rows;

             if($rnum==0){
                $stmt->close();

                $stmt=$conn->prepare($INSERT);
                $stmt->bind_param("ssssssi",$firstname,$lastname,$email,$gender,$password,$birthday,$number);
                $stmt->execute();
                echo"New record sucessfully";

             }else{
                echo "Someone already register using this email";
             }
             $stmt->close();
             $conn->close();


    }

?>
