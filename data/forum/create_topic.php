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
  echo '<h2>Sukurkite naują temą</h2>';
  if(!isset($_SESSION['signed_in']))
  {
    //the user is not signed in
    echo 'Atsiprašome, norint sukurti naują temą turite <a href="signin.php">prisijungti</a>.';          }
    else
    {
      if($_SERVER['REQUEST_METHOD'] != 'POST')
      {
        //the user is signed in
          //the form hasn't been posted yet, display it
          //retrieve the categories from the database for use in the dropdown
          $sql = "SELECT
          cat_id,
          cat_name,
          cat_description
          FROM
          categories";

          $result = mysqli_query($conn, $sql);

          if(!$result)
          {
            //the query failed, uh-oh :-(
            echo 'Error while selecting from database. Please try again later.';
          }
          else
          {
            if(mysqli_num_rows($result) == 0)
            {
              //there are no categories, so a topic can't be posted
              if($_SESSION['user_level'] == 1)
              {
                echo 'You have not created categories yet.';
              }
              else
              {
                echo 'Reikia sukurti kategorija.';
              }
            }
            else
            {

              echo '<form method="post" action="">
              <div class="grey-text text-darken-2">Tema:  <input type="text" name="topic_subject" />
              ';

              echo '
              <select class="browser-default" name="topic_cat">
              ';
              while($row = mysqli_fetch_assoc($result))
              {
                echo '<option value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option>';
              }
              echo '</select>
              ';

              echo 'Žinutė: <textarea name="post_content" /></textarea>
              <input type="submit" value="Sukurti temą" />
              </form>';
            }
          }
        }
        else
        {
          //start the transaction
          $query  = "BEGIN WORK;";
          $result = mysqli_query($conn, $query);

          if(!$result)
          {
            //Damn! the query failed, quit
            echo 'An error occured while creating your topic. Please try again later.';
          }
          else
          {

            //the form has been posted, so save it
            //insert the topic into the topics table first, then we'll save the post into the posts table
            $sql = "INSERT INTO
            topics(topic_subject,
              topic_date,
              topic_cat,
              topic_by)
              VALUES('" . mysqli_real_escape_string($conn, $_POST['topic_subject']) . "',
              NOW(),
              " . mysqli_real_escape_string($conn, $_POST['topic_cat']) . ",
              " . $_SESSION['user_id'] . "
              )";

              $result = mysqli_query($conn, $sql);
              if(!$result)
              {
                //something went wrong, display the error
                echo 'An error occured while inserting your data. Please try again later.' . mysql_error();
                $sql = "ROLLBACK;";
                $result = mysqli_query($conn, $sql);
              }
              else
              {
                //the first query worked, now start the second, posts query
                //retrieve the id of the freshly created topic for usage in the posts query
                $topicid = mysqli_insert_id($conn);

                $sql = "INSERT INTO
                posts(post_content,
                  post_date,
                  post_topic,
                  post_by)
                  VALUES
                  ('" . mysqli_real_escape_string($conn, $_POST['post_content']) . "',
                  NOW(),
                  " . $topicid . ",
                  " . $_SESSION['user_id'] . "
                  )";
                  $result = mysqli_query($conn, $sql);

                  if(!$result)
                  {
                    //something went wrong, display the error
                    echo 'An error occured while inserting your post. Please try again later.' . mysql_error();
                    $sql = "ROLLBACK;";
                    $result = mysqli_query($conn, $sql);
                  }
                  else
                  {
                    $sql = "COMMIT;";
                    $result = mysqli_query($conn, $sql);

                    //after a lot of work, the query succeeded!
                    echo 'Sekmingai sukurta nauja <a href="topic.php?id='. $topicid . '">tema</a>.';
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
