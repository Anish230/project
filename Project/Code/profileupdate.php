<?php 

$conn = new mysqli('localhost','root','','rent'); 
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }
    
    if (isset($_POST['update'])) {

        $firstname = $_POST['firstname'];

        $userid = $_POST['userid'];

        $lastname = $_POST['lastname'];

        $email = $_POST['email'];

        $password = $_POST['password'];

        $gender = $_POST['gender']; 

        $birthday = $_POST['birthday'];

        $sql = "UPDATE `register` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',
        `password`='$password',`gender`='$gender',`birthday`='$birthday' WHERE `userid`='$userid'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";
            header('Location: profileview.php');

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['userid'])) {

    $userid = $_GET['userid']; 

    $sql = "SELECT * FROM `register` WHERE `userid`='$userid'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $first_name = $row['firstname'];

            $lastname = $row['lastname'];

            $email = $row['email'];

            $password  = $row['password'];

            $gender = $row['gender'];

            $birthday=$row['birthday'];

            $userid = $row['userid'];

        } 

    ?>

        <h2>User Update Form</h2>

        <form action="" method="post">

          <fieldset>

            <legend>Personal information:</legend>

            First name:<br>

            <input type="text" name="firstname" value="<?php echo $first_name; ?>">

            <input type="hidden" name="userid" value="<?php echo $userid; ?>">

            <br>

            Last name:<br>

            <input type="text" name="lastname" value="<?php echo $lastname; ?>">

            <br>

            Email:<br>

            <input type="email" name="email" value="<?php echo $email; ?>">

            <br>

            Password:<br>

            <input type="password" name="password" value="<?php echo $password; ?>">

            <br>

            DOB:<br>

            <input type="date" name="birthday" value="<?php echo $birthday; ?>">

            <br>

            Gender:<br>

            <input type="radio" name="gender" value="Male" <?php if($gender == 'Male'){ echo "checked";} ?> >Male

            <input type="radio" name="gender" value="Female" <?php if($gender == 'Female'){ echo "checked";} ?>>Female

            <input type="radio" name="gender" value="private" <?php if($gender == 'private'){ echo "checked";} ?>>private

            <br><br>

            <input type="submit" value="Update" name="update">

          </fieldset>

        </form> 

        </body>

        </html> 

    <?php

    } else{ 

        

    } 

}

?> 