<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="../styles/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="icon" href="https://d30y9cdsu7xlg0.cloudfront.net/png/13088-200.png">

  <style>
  #map {
    height: 300px;
    /*width: 50%;*/
  }
  </style>
  <meta charset="utf-8">
  <title>Septintas peronas</title>
</head>
<body class="grey darken-4">

  <nav>

    <div class="nav-wrapper grey darken-3">
      <a href="#!" class="logo"><img src="../images/logo.jpg"></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="../index.php">Home</a></li>
        <li><a href="../data/stats.php">Stats</a></li>
        <li><a href="../data/about.php">About</a></li>
        <li><a href="../data/forum.php">Forum</a></li>
        <li><a href="signup.php">Contacts</a></li>

      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="../index.php">Home</a></li>
        <li><a href="../data/stats.php">Stats</a></li>
        <li><a href="../data/about.php">About</a></li>
        <li><a href="../data/login.php">Forum</a></li>
        <li><a href="signup.php">Contacts</a></li>

      </ul>
    </div>
  </nav>

  <div id="para-about" class="parallax-container">
    <div class="parallax"><img src="../images/peronasback.jpg"></div>
  </div>


  <div class="fonas">
    <br><br>
    <h3>Turite klausimų? Užpildykite ir išsiųskite užklausą</h3>
    <div class="mail">
      <?php
      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;

      if(isset($_GET['test'])){
        require '../vendor/autoload.php';
        //Load composer's autoloader
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
          //Server settings
          $mail->SMTPDebug = 2;                                 // Enable verbose debug output
          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = 'testavimuivcs@gmail.com';                 // SMTP username
          $mail->Password = 'Testavimui';                           // SMTP password
          $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 587;                                    // TCP port to connect to

          //Recipients
          $mail->setFrom('testavimuivcs@gmail.com', 'Mailer');
          $mail->addAddress('testavimuivcs@gmail.com', 'Joe User');     // Add a recipient
          // $mail->addAddress('ellen@example.com');               // Name is optional
          // $mail->addReplyTo('info@example.com', 'Information');
          // $mail->addCC('cc@example.com');
          // $mail->addBCC('bcc@example.com');

          //Attachments
          // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
          // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

          //Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = $_GET['vardas'];
          $mail->Body    = "<b>Klausimas: </b>" .$_GET['klausimas'] . "<br><br><b>Klausėjo telefono numeris: </b>" . $_GET['telefonas'] . "<br><b>Klausėjo e-paštas: </b>" . $_GET['epastas'];
          // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
          $mail->send();
          echo 'Zinute issiusta!';
        } catch (Exception $e) {
          echo 'Zinute neissiusta.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
      }
      ?>
    </div>
    <form class="text">
      <div class="row">
        <form class="col s12">
          <div class="row">
            <div class="input-field col s4">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="text" class="validate" name="vardas">
              <label for="icon_prefix">Vardas</label>
            </div>
            <div class="input-field col s4">
              <i class="material-icons prefix">phone</i>
              <input id="icon_telephone" type="tel" class="validate" name="telefonas">
              <label for="icon_telephone">Telefono numeris</label>
            </div>
            <div class="input-field col s4">
              <input id="email" type="email" class="validate" name="epastas">
              <label for="email" data-error="wrong" data-success="right">E-pašto adresas</label>
            </div>
          </div>
          <div class="input-field col s6">
            <input type="text" name="klausimas" width="50px" placeholder="Rašykite savo klausimą čia...">
          </div>
          <input type="text" name="test" value="1" style="display:none;">
          <!-- <input type="submit" class="button" name="insert" value="Siusti uzklausa" /> -->
          <button class="btn grey waves-effect waves-light" type="submit" name="insert">Siųskite užklausą
            <i class="material-icons right">send</i>
          </button>
        </form>
      </div>

<div class="row">
  <div class="col s6">

    <h5>Mus galite rasti adresu:</h5>
    <p>Adresas: Kalvarijų raudoniolika g-5</p>
    <h5>Kontaktiniai duomenys</h5>
    <p>27827273</p>
  </div>
<div class="col s6">

      <div id="map"></div>
      <script>
      function initMap() {
        var uluru = {lat: 54.703, lng: 25.286};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
      </script>
      <br><br>
    </div>
</div>
    <footer>

      <ul class="footer grey-text">


        <li>&copy Septintas Peronas</li>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../data/stats.php">Stats</a></li>
        <li><a href="../data/about.php">About</a></li>
        <li><a href="../data/login.php">Forum</a></li>
        <li><a href="signup.php">Contacts</a></li>
      </ul>

    </footer>




    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsHl-poqQbjtwL7YP0Tpcdc6XH9TSPZpY&callback=initMap">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script type="text/javascript" src="../scripts/script.js"></script>

</body>
</html>
