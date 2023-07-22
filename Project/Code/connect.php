<?php
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $password=$_POST['password'];
    $birthday=$_POST['birthday'];
    
    
    //dtatbase connction 
    $conn = new mysqli('localhost','root','','rent'); 
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }
    else{
        $stmt = $comn->prepare("insert into register(firstname, lastnane, email,gender, password, birthday)
             values(?,?,?,?,?,?)");
         $stmt->bind_param{"sssssi",$firstname, $lastname, $email,$gender, $password, $birthday);
         $stmt->execute();
        echo "registration successfully...";
         $stmt->close();
         $conn->close();
    }
}

?>