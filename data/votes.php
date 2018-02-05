<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="../styles/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <meta charset="utf-8">
  <title>Septintas peronas</title>
</head>
<body class="grey darken-4">

  <nav>

    <div class="nav-wrapper grey darken-3">
      <a href="#!" class="logo"><img src="../images/logo.jpg"></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php">Home</a></li>
        <li><a href="data/stats.php">Stats</a></li>
        <li><a href="data/about.php">About</a></li>
        <li><a href="data/login.php">Login</a></li>
				<li><a href="data/signup.php">SignUp</a></li>

      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="index.php">Home</a></li>
        <li><a href="data/stats.php">Stats</a></li>
        <li><a href="data/about.php">About</a></li>
        <li><a href="data/login.php">Login</a></li>
				<li><a href="data/signup.php">SignUp</a></li>

      </ul>
    </div>
  </nav>
  <div class="parallax-container">
    <div class="parallax"><img src="../images/peronasback.jpg"></div>
  </div>


<div class="fonas">
<br><br>


<table style="width:100%">
  <tr>
    <th>Vardas, Pavardė</th>
    <th>Kriterijus 1</th>
    <th>Kriterijus 2</th>
    <th>Kriterijus 3</th>
    <th>Kriterijus 4</th>
    <th>Kriterijus 5</th>
    <th>Vidurkis</th>
  </tr>

 <tr>
  <td class="dalyvio_vardas">ADOMAS KANOPA</td>
  <td class="1-1-balas input-balas row-1"><input type="text" class="balas-1"></td>
  <td class="1-2-balas input-balas row-1"><input type="text" class="balas-1"></td>
  <td class="1-3-balas input-balas row-1"><input type="text" class="balas-1"></td>
  <td class="1-4-balas input-balas row-1"><input type="text" class="balas-1"></td>
  <td class="1-5-balas input-balas row-1"><input type="text" class="balas-1"></td>
  <td class="sum-1"><input type="text" id='total-1'></td>
 </tr>

<tr>
  <td class="dalyvio_vardas">ANDRIUS MELIŪNAS</td>
  <td class="2-1-balas input-balas row-2"><input type="text" class="balas-2"></td>
  <td class="2-2-balas input-balas row-2"><input type="text" class="balas-2"></td>
  <td class="2-3-balas input-balas row-2"><input type="text" class="balas-2"></td>
  <td class="2-4-balas input-balas row-2"><input type="text" class="balas-2"></td>
  <td class="2-5-balas input-balas row-2"><input type="text" class="balas-2"></td>
  <td class="sum-2"><input type="text" id="total-2"></td>
 </tr>

<tr>
  <td class="dalyvio_vardas">BEATA ŠADIANEC</td>
  <td class="3-1-balas input-balas row-3"><input type="text" class="balas-3"></td>
  <td class="3-2-balas input-balas row-3"><input type="text" class="balas-3"></td>
  <td class="3-3-balas input-balas row-3"><input type="text" class="balas-3"></td>
  <td class="3-4-balas input-balas row-3"><input type="text" class="balas-3"></td>
  <td class="3-5-balas input-balas row-3"><input type="text" class="balas-3"></td>
  <td class="sum-3"><input type="text" id='total-3'></td>
 </tr>

<tr>
  <td class="dalyvio_vardas">DOVILĖ KAZLAUSKAITĖ</td>
  <td class="4-1-balas input-balas row-4"><input type="text" class="balas-4"></td>
  <td class="4-2-balas input-balas row-4"><input type="text" class="balas-4"></td>
  <td class="4-3-balas input-balas row-4"><input type="text" class="balas-4"></td>
  <td class="4-4-balas input-balas row-4"><input type="text" class="balas-4"></td>
  <td class="4-5-balas input-balas row-4"><input type="text" class="balas-4"></td>
  <td class="sum-4"><input type="text" id='total-4'></td>
 </tr>

<tr>
  <td class="dalyvio_vardas">DŽIUGAS PADEGIMAS</td>
  <td class="5-1-balas input-balas row-5"><input type="text" class="balas-5"></td>
  <td class="5-2-balas input-balas row-5"><input type="text" class="balas-5"></td>
  <td class="5-3-balas input-balas row-5"><input type="text" class="balas-5"></td>
  <td class="5-4-balas input-balas row-5"><input type="text" class="balas-5"></td>
  <td class="5-5-balas input-balas row-5"><input type="text" class="balas-5"></td>  
  <td class="sum-5"><input type="text" id='total-5'></td>
 </tr>

 <tr>
  <td class="dalyvio_vardas">GYTIS MOTIEJŪNAS</td>
  <td class="6-1-balas input-balas row-6"><input type="text" class="balas-6"></td>
  <td class="6-2-balas input-balas row-6"><input type="text" class="balas-6"></td>
  <td class="6-3-balas input-balas row-6"><input type="text" class="balas-6"></td>
  <td class="6-4-balas input-balas row-6"><input type="text" class="balas-6"></td>
  <td class="6-5-balas input-balas row-6"><input type="text" class="balas-6"></td>
  <td class="sum-6"><input type="text" id='total-6'></td>
 </tr>

 <tr>
  <td class="dalyvio_vardas">INDRĖ KULIKAUSKAITĖ</td>
  <td class="7-1-balas input-balas row-7"><input type="text" class="balas-7"></td>
  <td class="7-2-balas input-balas row-7"><input type="text" class="balas-7"></td>
  <td class="7-3-balas input-balas row-7"><input type="text" class="balas-7"></td>
  <td class="7-4-balas input-balas row-7"><input type="text" class="balas-7"></td>
  <td class="7-5-balas input-balas row-7"><input type="text" class="balas-7"></td>
  <td class="sum-7"><input type="text" id='total-7'></td>
 </tr>

<tr>
  <td class="dalyvio_vardas">JUSTINA REŠITKAITĖ</td>
  <td class="8-1-balas input-balas row-8"><input type="text" class="balas-8"></td>
  <td class="8-2-balas input-balas row-8"><input type="text" class="balas-8"></td>
  <td class="8-3-balas input-balas row-8"><input type="text" class="balas-8"></td>
  <td class="8-4-balas input-balas row-8"><input type="text" class="balas-8"></td>
  <td class="8-5-balas input-balas row-8"><input type="text" class="balas-8"></td>
  <td class="sum-8"><input type="text" id='total-8'></td>
 </tr>

 <tr>
  <td class="dalyvio_vardas">RENATA DAUKŠIENĖ</td>
  <td class="9-1-balas input-balas row-9"><input type="text" class="balas-9"></td>
  <td class="9-2-balas input-balas row-9"><input type="text" class="balas-9"></td>
  <td class="9-3-balas input-balas row-9"><input type="text" class="balas-9"></td>
  <td class="9-4-balas input-balas row-9"><input type="text" class="balas-9"></td>
  <td class="9-5-balas input-balas row-9"><input type="text" class="balas-9"></td>
  <td class="sum-9"><input type="text" id='total-9'></td>
 </tr>

 <tr>
  <td class="dalyvio_vardas">RYTIS DAUKŠYS</td>
  <td class="10-1-balas input-balas row-10"><input type="text" class="balas-10"></td>
  <td class="10-2-balas input-balas row-10"><input type="text" class="balas-10"></td>
  <td class="10-3-balas input-balas row-10"><input type="text" class="balas-10"></td>
  <td class="10-4-balas input-balas row-10"><input type="text" class="balas-10"></td>
  <td class="10-5-balas input-balas row-10"><input type="text" class="balas-10"></td>
  <td class="sum-10"><input type="text" id='total-10'></td>
 </tr>

 <tr>
  <td class="dalyvio_vardas">SAMVELAS AGADŽANIANAS</td>
  <td class="11-1-balas input-balas row-11"><input type="text" class="balas-11"></td>
  <td class="11-2-balas input-balas row-11"><input type="text" class="balas-11"></td>
  <td class="11-3-balas input-balas row-11"><input type="text" class="balas-11"></td>
  <td class="11-4-balas input-balas row-11"><input type="text" class="balas-11"></td>
  <td class="11-5-balas input-balas row-11"><input type="text" class="balas-11"></td>
  <td class="sum-11"><input type="text" id='total-11'></td>
 </tr>

 <tr>
  <td class="dalyvio_vardas">UGNĖ MOTIEJŪNIENĖ</td>
  <td class="12-1-balas input-balas row-12"><input type="text" class="balas-12"></td>
  <td class="12-2-balas input-balas row-12"><input type="text" class="balas-12"></td>
  <td class="12-3-balas input-balas row-12"><input type="text" class="balas-12"></td>
  <td class="12-4-balas input-balas row-12"><input type="text" class="balas-12"></td>
  <td class="12-5-balas input-balas row-12"><input type="text" class="balas-12"></td>
  <td class="sum-12"><input type="text" id='total-12'></td>
 </tr>
</table>




<br><br><br>
</div>
<footer>

   <ul class="footer grey-text">


   		<li>&copy Septintas Peronas</li>
     <li><a href="index.php">Home</a></li>
     <li><a href="data/stats.php">Stats</a></li>
     <li><a href="data/about.php">About</a></li>
     <li><a href="data/login.php">Login</a></li>
     <li><a href="data/signup.php">SignUp</a></li>




      </ul>

</footer>





  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script type="text/javascript" src="../scripts/script.js"></script>

</body>
</html>
