<?php
      $conn = new mysqli('localhost','root','','rent'); 
      if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);}
        isset($_GET['id']);

        $id = $_GET['id']; 
  
      $sql = "SELECT * FROM `iteminfo` WHERE `id`='$id'";
      $result = $conn->query($sql); 
  
      $result->num_rows > 0; 
  
          $row = $result->fetch_assoc();


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./ItemProfile1.css" />
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
    <div class="item-profile">
      <div class="homebar2">
        <input class="search-textfild" type="search" maxlength minlength />

        <div class="catogory-butt">
          <div class="catogory-seletor2"></div>
          <img
            class="siexpand-more-alt-icon2"
            alt=""
            src="./public/siexpand-more-alt3.svg"
          />
        </div>
        <div class="search-butt1">
          <div class="search-butt-item"></div>
          <img
            class="sisearch-alt-icon2"
            alt=""
            src="./public/sisearch-alt1.svg"
          />
        </div>
        <img
          class="pink-simple-text-logo-12"
          alt=""
          src="./public/pink-simple-text-logo-1@2x.png"
          id="pinkSimpleTextLogo1"
        />

        <img class="v-icon1" alt="" src="./public/v.svg" id="v" />
      </div>

      <div class="item-profile-item"></div>
      <div class="description">Description</div>
      <div class="item-profile-inner"></div>
      <a class="rectangle-textarea"><?php echo $row['Description'] ?> </a>
      <img
        class="item-profile-child1"
        alt=""
        src="./image/<?php echo $row['product_img'] ?>"
      />

      <div class="price5"><?php echo $row['price'] ?>/DAY</div>
      
      <div class="item-name5"><?php echo $row['itemname'] ?></div>
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
      
      var ellipseImage = document.getElementById("ellipseImage");
      if (ellipseImage) {
        ellipseImage.addEventListener("click", function (e) {
          window.location.href = "./Profile.html";
        });
      }
      </script>
  </body>
</html>
