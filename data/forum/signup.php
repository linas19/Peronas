<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="icon" href="https://d30y9cdsu7xlg0.cloudfront.net/png/13088-200.png">
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="description" content="A short description." />
  <meta name="keywords" content="put, keywords, here" />
  <!-- <title>PHP-MySQL forum</title> -->
  <link rel="stylesheet" href="../styles/style.css" type="text/css">
  <title>Septintas peronas</title>
</head>
<body class="grey darken-4">

  <nav>

    <div class="nav-wrapper grey darken-3">
      <a href="#!" class="logo"><img src="../images/logo.jpg"></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="../../index.php">Home</a></li>
        <li><a href="../stats.php">Stats</a></li>
        <li><a href="../about.php">About</a></li>
        <!-- <li><a href="../login.php">Login</a></li> -->
        <li><a href="../forum.php">Forum</a></li>
        <li><a href="../signup.php">Contacts</a></li>

      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="../../index.php">Home</a></li>
        <li><a href="../stats.php">Stats</a></li>
        <li><a href="../about.php">About</a></li>
        <!-- <li><a href="../login.php">Login</a></li> -->
        <li><a href="../forum.php">Forum</a></li>
        <li><a href="../signup.php">Contacts</a></li>


      </ul>
    </div>
  </nav>

  <!-- <div id="para-about" class="parallax-container">
    <div class="parallax"><img src="../images/peronasback.jpg"></div>
  </div> -->
  <div>
    <h1 class="white-text">Septinto perono forumas</h1>
    <h3 class="grey-text text-lighten-1">Sukurkite naują paskyrą</h3>
  </div>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Forum2";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo '<div class="grey-text text-lighten-1"><form method="post" action="">
Vartotojo vardas: <input type="text" name="user_name"/>
Slaptažodis: <input type="password" name="user_pass">
Pakartokite slaptažodį: <input type="password" name="user_pass_check">
E-paštas: <input type="email" name="user_email">
<div class="blue-text text-darken-2">
<input type="submit" value="Sukurti naują paskyrą"/>
</div>
</form><br /> <br /> </div>';
$errors = array(); /* declare the array for later use */

if(isset($_POST['user_name']))
{
  //the user name exists
  if(!ctype_alnum($_POST['user_name']))
  {
    $errors[] = 'Vartotojo vardas gali būti sudarytas tik iš skaičių ir raidžių.';
  }
  if(strlen($_POST['user_name']) > 30)
  {
    $errors[] = 'Vartotojo vardas negali būti ilgesnis nei 30 simbolių.';
  }
}
else
{
  $errors[] = 'Vartotojo vardas negali būti tuščias.';
}


if(isset($_POST['user_pass']))
{
  if($_POST['user_pass'] != $_POST['user_pass_check'])
  {
    $errors[] = 'Slaptažodžiai nevienodi.';
  }
}
else
{
  $errors[] = 'Slaptažodis negali būti tuščias.';
}

if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
{
  echo 'Užpildymo laukai negali būti tušti..';
  echo '<ul>';
  foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
  {
    echo '<li>' . $value . '</li>'; /* this generates a nice error list */
  }
  echo '</ul>';
}
else
{
  $sql = "INSERT INTO
  users(user_name, user_pass, user_email ,user_date, user_level)
  VALUES('" . $_POST['user_name'] . "',
  '" . sha1($_POST['user_pass']) . "',
  '" . $_POST['user_email'] . "',
  NOW(),
  0)";
  if ($conn->query($sql) === TRUE) {
    echo "Nauja paskyra sukurta!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
<p class="forumsignup">Jei turite susikūrę paskyrą <a href="signin.php">prisijunkite</a></p>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsHl-poqQbjtwL7YP0Tpcdc6XH9TSPZpY&callback=initMap">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script type="text/javascript" src="../scripts/script.js"></script>

</body>
</html>
