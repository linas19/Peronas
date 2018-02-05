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
  ?>
</div>
<div id="content">

  <?php

  // Create connection

  if(!isset($_SESSION['signed_in']))
  {
    //the user is not signed in
    echo 'Atsiprašome, turite būti <a href="signin.php">prisijungę</a> norint peržiūrėti forumą.';
  }
  else
  {
    $sql = "SELECT
    cat_id,
    cat_name,
    cat_description
    FROM
    categories
    WHERE
    cat_id = " . mysqli_real_escape_string($conn, $_GET['id']);

    $result = mysqli_query($conn, $sql);

    if(!$result)
    {
      echo 'The category could not be displayed, please try again later.' . mysql_error();
    }
    else
    {
      if(mysqli_num_rows($result) == 0)
      {
        echo 'This category does not exist.';
      }
      else
      {
        //display category data
        while($row = mysqli_fetch_assoc($result))
        {
          echo '<h2>Temos ′' . $row['cat_name'] . '′ kategorijoje</h2>';
        }

        //do a query for the topics
        $sql = "SELECT
        topic_id,
        topic_subject,
        topic_date,
        topic_cat
        FROM
        topics
        WHERE
        topic_cat = " . mysqli_real_escape_string($conn, $_GET['id']);

        $result = mysqli_query($conn, $sql);

        if(!$result)
        {
          echo 'The topics could not be displayed, please try again later.';
        }
        else
        {
          if(mysqli_num_rows($result) == 0)
          {
            echo 'Nera temu sioje kategorijoje.';
          }
          else
          {
            //prepare the table
            echo '<table border="1">
            <tr>
            <th><h3>Tema</h3></th>
            <th><h3>Sukurta</h3></th>
            </tr>';

            while($row = mysqli_fetch_assoc($result))
            {
              echo '<tr>';
              echo '<td class="leftpart">';
              echo '<h5><a href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><h5>';
              echo '</td>';
              echo '<td class="rightpart">';
              echo date('d-m-Y', strtotime($row['topic_date']));
              echo '</td>';
              echo '</tr>';
            }
          }
        }
      }
    }
  }

  ?>
