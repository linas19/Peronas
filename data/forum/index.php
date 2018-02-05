<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="../../styles/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="icon" href="https://d30y9cdsu7xlg0.cloudfront.net/png/13088-200.png">
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="description" content="A short description." />
  <meta name="keywords" content="put, keywords, here" />
  <title>Forumas</title>
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
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Forum2";
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Neprisijungta prie serverio: " . $conn->connect_error);
  }
  session_start();
  if (isset($_SESSION['signed_in']))
  {

    echo '<div class="white-text text-darken-2">Sveiki, ' . $_SESSION['user_name'] . '. Ne jūs? <a href="signout.php">Atsijunkite.</a>';

  }
  else
  {
    echo '<a href="signin.php">Prisijunkite</a> arba <a href="signup.php">Sukurkite naują paskyrą</a>.';
  }
  echo '<div class="col s4">
  <a href="index.php" class="waves-effect waves-teal btn-flat">Home</a>
  <div class="col s4">
  <a href="create_topic.php" class="waves-effect waves-teal btn-flat">Nauja tema</a>
  </div>
  <div class="col s4">
  <a href="create_cat.php" class="waves-effect waves-teal btn-flat">Nauja kategorija</a>
  </div>';


$sql = "SELECT * FROM categories";

$result = mysqli_query($conn, $sql);

if(!$result)
{
  echo 'The categories could not be displayed, please try again later.';
}
else
{
  if(mysqli_num_rows($result) == 0)
  {
    echo 'Nera sukurtu kategoriju.';
  }
  else
  {
    //prepare the table

    while($row = mysqli_fetch_assoc($result))
    {
      echo '<table class="centered bordered">';
      echo '<tr>';
      echo '<td class="leftpart">';
      echo '<h3><a href="category.php?id='. $row['cat_id'] . '">' . $row['cat_name'] . '</a></h3>' . $row['cat_description'];

      echo '</td>';
      echo '</tr>';
      echo '<table></div>';
    }
  }
}

?>
<footer>
  <div>
    <ul class="footercontacts grey-text">
      <li>&copy Septintas Peronas</li>
      <li><a href="signup.php">Contacts</a></li>
      <li><a href="../data/forum.php">Forum</a></li>
      <li><a href="../data/about.php">About</a></li>
      <li><a href="../stats.php">Stats</a></li>
      <li><a href="../index.php">Home</a></li>

    </ul>
  </div>
</footer>




<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsHl-poqQbjtwL7YP0Tpcdc6XH9TSPZpY&callback=initMap">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

<script type="text/javascript" src="../../scripts/script.js"></script>

</body>
</html>
