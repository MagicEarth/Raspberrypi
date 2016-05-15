<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Hub</title>
  <link rel="import" href="../bower_components/polymer/polymer.html">
  <link rel="import" href="../bower_components/paper-elements/paper-elements.html">
  <link rel="import" href="../bower_components/paper-input/paper-input.html">
  <script type="text/JavaScript" src="../bower_components/webcomponentsjs/webcomponents-lite.min.js"></script>
  <link rel="import" href="../bower_components/iron-input/iron-input.html">
  <link rel="import" href="../bower_components/paper-toolbar/paper-toolbar.html">
  <link rel="import" href="../bower_components/paper-menu-button/paper-menu-button.html">
  <link rel="import" href="../bower_components/paper-drawer-panel/paper-drawer-panel.html">
  <link rel="import" href="../bower_components/paper-tabs/paper-tabs.html">
  <link rel="import" href="../bower_components/paper-icon-button/paper-icon-button.html">
  <link rel="import" href="../bower_components/paper-ripple/paper-ripple.html">
  <link rel="import" href="../bower_components/paper-item/paper-item.html">
  <link rel="import" href="../bower_components/paper-menu/paper-menu.html">
  <link rel="import" href="../bower_components/paper-menu-button/paper-menu-button-animations.html">
  <link rel="import" href="../bower_components/paper-styles/paper-styles.html">
  <link rel="import" href="../bower_components/iron-icon/iron-icon.html">
  <link rel="import" href="../bower_components/iron-icons/iron-icons.html">
  <link rel="import" href="../bower_components/paper-header-panel/paper-header-panel.html">
  <link rel="import" href="../bower_components/paper-scroll-header-panel/paper-scroll-header-panel.html">
  <link rel="stylesheet" href="Hub.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/JavaScript" src="js/redirect.js"></script>

  <?php if (login_check($mysqli) == true) { ?>
    <paper-drawer-panel id="paperDrawerPanel" force-narrow>
      <div drawer class="drawer">
        <paper-item onclick="redirect('Homepage.php')" role="option">Homepage</paper-item></a>
        <paper-item onclick="redirect('Downloads.php')" role="option">Downloads</paper-item></a>
        <paper-item onclick="redirect('Cloud.php')" role="option">Klaut</paper-item></a>
        <paper-item onclick="redirect('Service.php')" role="option">Service</paper-item></a>
        <paper-item onclick="redirect('noim.io')" role="option">Youtube &nbsp;<h3>ShadercraftDE</h3></paper-item></a>
        <paper-item onclick="redirect('brokenroot.net')" role="option">Brokenroot</paper-item></a>
        <paper-item onclick="redirect('/includes/logout.php')" role="option">Logout</paper-item></a>
        <paper-item paper-drawer-toggle>Menü schliessen</paper-item>
      </div>
      <div main>
        <div>
        </div>
        <div>

          <paper-toolbar>
            <paper-icon-button icon="menu" on-tap="menuAction" paper-drawer-toggle raised></paper-icon-button>
            <div class="Hub"><h3>Hallo <?php echo htmlentities($_SESSION['username']); ?>, schön das du wieder da bist ! :D</h3></div>
          </paper-toolbar>
        </div>
      </div>
    </paper-drawer-panel>
  </head>
  <body>

    <div class="Steckbrief">

      <style is="custom-style">
        paper-card.user { @apply(--layout-horizontal); }
        .user_image {
          width: 100px;
          height: 170px;
          background: url('user_images/<?php echo htmlentities($_SESSION['username']); ?>.jpg');
          background-size: cover;
        }
        .user-content {
          @apply(--layout-flex);
          float: left;
        }
        .user-header { @apply(--paper-font-headline); }
        .user-name { color: var(--paper-grey-600); margin: 10px 0; }
        paper-icon-button.rate-icon {
          --iron-icon-fill-color: white;
          --iron-icon-stroke-color: var(--paper-grey-600);
        }
      </style>
      <paper-card class="user">
        <div class="user-content">
          <div class="card-content">
            <div class="user-header"><h2>Steckbrief</h2></div>
            <div class="user-name"><h3><font color="#000000">Name: <?php echo htmlentities($_SESSION['username']); ?></font></h3></div>
            <div class="user-birthday"><h3><font color="#000000">Geburtstag: <?php
            $pdo=new
            PDO('mysql:host=localhost;dbname=secure_login','root','german-SH1');
            $sql="SELECT birthday, username FROM member_infos";
            $sql="SELECT birthday FROM member_infos WHERE username=".
            $_SESSION['username'].'"';
            $stmt=$pdo->query($sql);
            echo $row['birthday']
            ?></font></h3></div>
            <!--<table style="width:50%">
              <tr>
                <td><div>Geburtstag:</td><td> 10.04.2001</td></div>
              </tr>
              <tr>
                <div><td>Arbeitszeit (monat):</td><td>5</td></div>
              </tr>
              <tr>
                <div><td>Arbeitszeit (jahr):</td><td> 50<td></div>
                </tr>
                <table>
          </div>-->
          <div class="user_image"></div>
        </div>

      </paper-card>
    </div>
    <div class="Wetter">
    </div>
    <div class="News">
    </div>
    <div class="Events">
    </div>
    <div class="Lemmie">
    </div>

    <!--<div class="Homepage_Icon">
    <a href="/Homepage.php"><img id="Homepage_Icon" src="images/Homepage_Icon.png" /></a>
  </div>
  <div class="Downloads_Icon">
  <a href="/Downloads.php"><img id="Downloads_Icon" src="images/Downloads_Icon.png" /></a>
</div>
<div class="Cloud_Icon">
<a href="/Cloud.php"><img id="Cloud_Icon" src="images/Cloud_Icon.png" /></a>
</div>
<div class="Service_Icon">
<a href="/Service.php"><img id="Service_Icon" src="images/Service_Icon.png" /></a>
</div>-->
<?php
} else {
  echo '<div class="error_login"><font color="#FFFC00"><h1>Du musst dich erst <a href="/login.php">einloggen!</a></h1></font></div>';
}
?>
</body>
</html>
