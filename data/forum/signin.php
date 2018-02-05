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

if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
  echo 'Jūs jau esate prisijungęs, galite <a href="signout.php">atsijungti</a> jei norite.';
}
else
{
  if($_SERVER['REQUEST_METHOD'] != 'POST')
  {
    echo '<div class="grey-text text-darken-2"><h1>Prisijunkite</h1></div>';
    /*the form hasn't been posted yet, display it
    note that the action="" will cause the form to post to the same page it is on */
    echo '<form method="post" action="">
    <div class="grey-text text-darken-2">Vartotojo vardas: <input type="text" name="user_name" /></div>
    <div class="grey-text text-darken-2">Slaptažodis: <input type="password" name="user_pass"></div>
    <button class="waves-effect waves-teal btn-flat" type="submit" name="action">Prisijungti
  <i class="material-icons right">send</i>
</button>
    </form>';
  }
  else
  {
    /* so, the form has been posted, we'll process the data in three steps:
    1.  Check the data
    2.  Let the user refill the wrong fields (if necessary)
    3.  Varify if the data is correct and return the correct response
    */
    $errors = array(); /* declare the array for later use */

    if(!isset($_POST['user_name']))
    {
      $errors[] = 'Įveskite vardą.';
    }

    if(!isset($_POST['user_pass']))
    {
      $errors[] = 'Įveskite slaptažodį.';
    }

    if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
    {
      echo 'Neteisingai užpildėte, pildykite iš naujo..';
      echo '<ul>';
      foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
      {
        echo '<li>' . $value . '</li>'; /* this generates a nice error list */
      }
      echo '</ul>';
    }
    else
    {

      //the form has been posted without errors, so save it
      //notice the use of mysql_real_escape_string, keep everything safe!
      //also notice the sha1 function which hashes the password
      $sql = "SELECT
      user_id,
      user_name,
      user_level
      FROM
      users
      WHERE
      user_name = '" . $_POST['user_name'] . "'
      AND
      user_pass = '" . sha1($_POST['user_pass']) . "'";

      $result = mysqli_query($conn, $sql);
      if(!$result)
      {
        //something went wrong, display the error
        echo 'Something went wrong while signing in. Please try again later.';
        //echo mysql_error(); //debugging purposes, uncomment when needed
      }
      else
      {
        //the query was successfully executed, there are 2 possibilities
        //1. the query returned data, the user can be signed in
        //2. the query returned an empty result set, the credentials were wrong
        if(mysqli_num_rows($result) == 0)
        {
          echo '<div class="col s4">
          <a href="index.php" class="waves-effect waves-teal btn-flat">Home</a>
          <div class="col s4">
          <a href="create_topic.php" class="waves-effect waves-teal btn-flat">Nauja tema</a>
          </div>
          <div class="col s4">
          <a href="create_cat.php" class="waves-effect waves-teal btn-flat">Nauja kategorija</a>
          </div>';
          echo 'Neteisingas slaptažodis arba vardas.<a href="signin.php"> Prisijunkite iš naujo.</a>';

        }
        else
        {
          session_start();
          //set the $_SESSION['signed_in'] variable to TRUE
          $_SESSION['signed_in'] = true;
          //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
          while($row = mysqli_fetch_assoc($result))
          {
            $_SESSION['user_id']    = $row['user_id'];
            $_SESSION['user_name']  = $row['user_name'];
            $_SESSION['user_level'] = $row['user_level'];
          }
          echo '<div class="white-text text-darken-2">Sveikiname prisijungus, ' . $_SESSION['user_name'] . '. <a href="index.php">Galite peržiūrėti mūsų forumą</a>.';

        }
      }
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
      <li><a href="../../index.php">Home</a></li>

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
