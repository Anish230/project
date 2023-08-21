<?php
      $conn = new mysqli('localhost','root','','rent'); 
      if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
       }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./Profile.css" />
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
    <div class="profile">
      <img class="profile-child" alt="" src="./public/Default_pfp.svg.png" />
      <?php
             isset($_GET['email']);

        $email = $_GET['email']; 
  
      $sql = "SELECT * FROM `register` WHERE `email`='$email'";
  
      $result = $conn->query($sql); 
  
      $result->num_rows > 0; 
  
          $row = $result->fetch_assoc();
  
              $firstname = $row['firstname'];
              $lastname = $row['lastname'];
      ?>
      <div class="user-name2">
        <p class="user-name3"><?php echo $firstname ?> <?php echo $lastname ?></p>
      </div>
      <div class="add">Add</div>
      <div class="number1">Number</div>
      <div class="ad-posts">Ad posts</div>
      <div class="profile-item"></div>
      <div class="profile-inner"></div>
      <div class="homebar3"></div>
  
      <table >
        <?php
               $sql="SELECT * from iteminfo WHERE id";
              $result=$conn-> query($sql);
              $count=1;
              if ($result-> num_rows > 0){
                while ($row=$result-> fetch_assoc()){


        ?>
         <tr>
          <!-- to diaplay product in profile -->
          <div class="iteam-block1">
            <div class="search-itam5" id="searchItam1"></div>
            <a hidden><?=$count?></a>
            <img class="iteam-block-child" src="./image/<?php echo $row['product_img']; ?>"/>
            <div class="item-name6"><?=$row["itemname"]?></div>
            <div class="item-detail5"><?=$row["Description"]?></div>
            <div class="price6">Rs<?=$row["price"]?></div><br>
           </div>
        </tr>         


        <?php
         if ($count == 4) {
          break;
        }
         $count=$count+1;
        
           }
          }else{
            echo "You have no product listed" ;
          }

        ?>  
      </table>       
      

      <div class="additem" id="additemContainer">
        <div class="additem-child"></div>
        <div class="add-item1">Add Item</div>
        <img class="siadd-icon" alt="" src="./public/siadd.svg" />
      </div>
      <div class="rectangle-div" id="rectangle1"></div>
      <button class="catogory-butt1">
        <div class="catogory-seletor3"></div>
        <img
          class="siexpand-more-alt-icon3"
          alt=""
          src="./public/siexpand-more-alt3.svg"
        />
      </button>
      <button class="search-butt2">
        <div class="search-butt-inner"></div>
        <img
          class="sisearch-alt-icon3"
          alt=""
          src="./public/sisearch-alt4.svg"
        />
      </button>
      <img
        class="pink-simple-text-logo-13"
        alt=""
        src="./public/pink-simple-text-logo-1@2x.png"
        id="pinkSimpleTextLogo1"
      />

      <img class="v-icon2" alt="" src="./public/v1.svg" id="v" />
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
        <div class="notification-box-child1"></div>
        <div class="notification-box-child2"></div>
        <div class="notification-box-child3"></div>
      </div>
    </div>

    <script>
      
      var additemContainer = document.getElementById("additemContainer");
      if (additemContainer) {
        additemContainer.addEventListener("click", function (e) {
          window.location.href = "./AdditemPage.php";
        });
      }
      
      var rectangle1 = document.getElementById("rectangle1");
      if (rectangle1) {
        rectangle1.addEventListener("click", function (e) {
          window.location.href = "./Search.html";
        });
      }
      
      var pinkSimpleTextLogo1 = document.getElementById("pinkSimpleTextLogo1");
      if (pinkSimpleTextLogo1) {
        pinkSimpleTextLogo1.addEventListener("click", function (e) {
          window.location.href = "./HomePageAfterLogin.html";
        });
      }
      
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
