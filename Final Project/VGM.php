<html>

<head>
  <link rel="stylesheet" type="text/css" href=vgmlayout.css>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <header>



    <h1 class="header"><?php
                        $myfile = fopen("user.txt", "r") or die("Unable to open file!");
                        $user = fgets($myfile);
                        fclose($myfile);
                        // echo $user; 
                        ?>Video Game Management System</h1>
  </header>

  <body>


    <div>
      <nav>
        <ul>
          <li class="active">
            <a href="VGM.html">Home</a>
          </li>
          <li>
            <a href="NewMarketPlace.php">Marketplace</a>
          </li>
          <li>
            <a href="Library.php">Library</a>
          </li>
          <li style="float:right">
            <a href="signin.php">Sign In</a></li>
        </ul>
      </nav>
    </div>

    <div class="row">
      <div class="column">
        <h2>Welcome!</h2>
        <p>Hello and thank for visiting out video game management system.</p>
        <p>Feel free to visit out Marketplace to list, search for, and order all of our games available!</p>
        <p>Also, sign in to view your Library! From there you may even review the games that you have purchased.</p>
      </div>

      <div class="column">
        <h2>Technical Details</h2>
        <p>Our site is powered by a linux system running HTML, CSS, PHP, and MySQL. </p>
        <p>We are using PHP to connect to a back-end database supporting our login, Marketplace, and Library capabilities.</p>
      </div>
      <div class="column">
        <h2>Future Features</h2>
        <p>VGM will be implementing the functionality to upload and purchase video games in the future. </p>
      </div>
    </div>
    <footer class="footer">

      <p class="footer">Video Game Marketplace and Management System</p>
      <p class="footer">Created by: Nicholas Carta & Nicholas Sims</p>

    </footer>