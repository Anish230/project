<?php

    $conn = new mysqli('localhost','root','','rent'); 
      if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);}
    
        isset($_GET['email']);

          $email = $_GET['email']; 
      
          $sql = "SELECT * FROM `register` WHERE `email`='$email'";
      
          $result = $conn->query($sql); 
      
          $result->num_rows > 0; 
      
              $row = $result->fetch_assoc();
      
                  $firstname = $row['firstname'];
                  
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./HomePage1.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inder:wght@400&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap"
    />
  </head>
  <body>
    <div class="homepage-afterlogin">
      <div class="homebar1">
        <input class="search-textfild" type="search" />

        <img
          class="catogory-butt-icon"
          alt=""
          src="./public/catogory-butt.svg"
        />

        <img class="search-butt-icon" alt="" src="./public/searchbutt.svg" />

        <img class="v-icon" alt="" src="./public/v.svg" id="v" />

        <img
          class="pink-simple-text-logo-11"
          alt=""
          src="./public/pink-simple-text-logo-1@2x.png"
        />
      </div>
      <div class="mostused1">
        <div class="electronic1">Electronic</div>
        <img class="expand-left-icon7" alt="" src="./public/expand-left.svg" />

        <img
          class="expand-right-icon7"
          src="./public/expand-right.svg"
        />
      </div>
      <a href="Profile.php?email=<?php echo $email ?>">
        <div class="profile-info-at-hp" id="profileInfoAtHPContainer" >
          <img
           class="profile-info-at-hp-child"
           src="./public/ellipse-48@2x.png"/>

          <a class="name" ><?php echo $firstname?></a>
        </div>
      </a> 
                  <br><br><br><br><br><br><br><br>
                  <br><br><br><br><br><br><br><br>
                  <br><br>

       <table > 
              <a >Miscellaneous</a>
            <?php
              $sql="SELECT * from iteminfo WHERE id";
              $result=$conn-> query($sql);
              $count=1;
              if ($result-> num_rows > 0){
                while ($row=$result-> fetch_assoc()){
                    $cat="Miscellaneous";
                   if($row['category'] == $cat ){

                  ?>
              <td >         
                <div class="productCard" >
                  <a href="ItemProfile.php?id=<?php echo $row['id']; ?>">
                  <img class="img" src="./image/<?php echo $row['product_img']; ?>" while="100%" height="150" ></a> 
                  <a ><?=$row["itemname"]?></a>
                  <p class="price">RS:<?=$row["price"]?>/DAY</p>
                </div>   
              </td>
              <?php } $count=$count+1;
                  }
                }?>
          </table>
          <table > 
              <a >Home Appliances</a>
            <?php
              $sql="SELECT * from iteminfo WHERE id";
              $result=$conn-> query($sql);
              $count=1;
              if ($result-> num_rows > 0){
                while ($row=$result-> fetch_assoc()){
              ?>
              <td >
                  <?php
                    $cat="Home_Appliances";
                   if($row['category'] == $cat ){

                  ?>
                <div class="productCard" >
                  <a href="ItemProfile.php?id=<?php echo $row['id']; ?>">
                  <img class="img" src="./image/<?php echo $row['product_img']; ?>" while="100%" height="150" ></a> 
                  <a ><?=$row["itemname"]?></a>
                  <p class="price">RS:<?=$row["price"]?>/DAY</p>
                </div>
                <?php } $count=$count+1;
                  }
                }?>   
              </td>
          </table>
          <table > 
              <a >Real States</a>
            <?php
              $sql="SELECT * from iteminfo WHERE id";
              $result=$conn-> query($sql);
              $count=1;
              if ($result-> num_rows > 0){
                while ($row=$result-> fetch_assoc()){
              ?>
              <td >
                  <?php
                    $cat="Real_States";
                   if($row['category'] == $cat ){

                  ?>
                <div class="productCard" >
                  <a href="ItemProfile.php?id=<?php echo $row['id']; ?>">
                  <img class="img" src="./image/<?php echo $row['product_img']; ?>" while="100%" height="150" ></a> 
                  <a ><?=$row["itemname"]?></a>
                  <p class="price">RS:<?=$row["price"]?>/DAY</p>
                </div>
                <?php } $count=$count+1;
                  }
                }?>   
              </td>
          </table>
          <table > 
              <a >Hardware</a>
            <?php
              $sql="SELECT * from iteminfo WHERE id";
              $result=$conn-> query($sql);
              $count=1;
              if ($result-> num_rows > 0){
                while ($row=$result-> fetch_assoc()){
              ?>
              <td >
                  <?php
                    $cat="Hardware";
                   if($row['category'] == $cat ){

                  ?>
                <div class="productCard" >
                  <a hidden><?=$count?></a>
                  <a href="ItemProfile.php?id=<?php echo $row['id']; ?>">
                  <img class="img" src="./image/<?php echo $row['product_img']; ?>" while="100%" height="150" >
                  </a> 
                  <a ><?=$row["itemname"]?></a>
                  <p class="price">RS:<?=$row["price"]?>/DAY</p>
                </div>
                <?php } $count=$count+1;
                  }
                }?>   
              </td>
          </table>
          <table > 
              <a >Electronic</a>
            <?php
              $sql="SELECT * from iteminfo WHERE id";
              $result=$conn-> query($sql);
              $count=1;
              if ($result-> num_rows > 0){
                while ($row=$result-> fetch_assoc()){
              ?>
              <td >
                  <?php
                    $cat="Electronic";
                   if($row['category'] == $cat ){

                  ?>
                <div class="productCard" >
                  <a href="ItemProfile.php?id=<?php echo $row['id']; ?>">
                  <img class="img" src="./image/<?php echo $row['product_img']; ?>" while="100%" height="150" /></a> 
                  <a ><?=$row["itemname"]?></a>
                  <p class="price">RS:<?=$row["price"]?>/DAY</p>
                </div>
                <?php } $count=$count+1;
                  }
                }?>   
              </td>
          </table>          
      
    </div>

    <div
      id="notificationBoxContainer"
      class="popup-overlay"
      style="display: none"
    >
      <div class="notification-box">
        <div class="notificationbar">
          <div class="notification">Notification</div>
        </div>
        <div class="notification-box-child"></div>
        <div class="notification-box-item"></div>
        <div class="notification-box-inner"></div>
        <div class="rectangle-div"></div>
        <div class="notification-box-child1"></div>
        <div class="notification-box-child2"></div>
      </div>
    </div>

    <script>
      var v = document.getElementById("v");
      if (v) {
        v.addEventListener("click", function () {
          var popup = document.getElementById("notificationBoxContainer");
          if (!popup) return;
          var popupStyle = popup.style;
          if (popupStyle) {
            popupStyle.display = "flex";
            popupStyle.zIndex = 100;
            popupStyle.backgroundColor = "rgba(113, 113, 113, 0.3)";
            popupStyle.alignItems = "center";
            popupStyle.justifyContent = "center";
          }
          popup.setAttribute("closable", "");
      
          var onClick =
            popup.onClick ||
            function (e) {
              if (e.target === popup && popup.hasAttribute("closable")) {
                popupStyle.display = "none";
              }
            };
          popup.addEventListener("click", onClick);
        });
      }
      
      </script>
  </body>
</html>
