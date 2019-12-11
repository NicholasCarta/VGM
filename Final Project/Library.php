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
                            echo $user; ?>'s Library</h1>
    </header>

    <body>


        <div>
            <nav>
                <ul>
                    <li>
                        <a href="VGM.php">Home</a>
                    </li>
                    <li>
                        <a href="NewMarketPlace.php">Marketplace</a>
                    </li>
                    <li class="active">
                        <a href="Library.php">Library</a>
                    </li>
                </ul>
            </nav>
        </div>
        <br>
        <table>
            <tr>
                <th>Game ID</th>
                <th>Game Name</th>
                <th>Genre</th>
            </tr>
    </body>

    <?php
    $myfile = fopen("user.txt", "r") or die("Unable to open file!");
    $user = fgets($myfile);
    fclose($myfile);


    // Connect to the mysql server
    $conn = mysqli_connect("localhost", "root", "qwe1234*()ASD", "Project");
    $sql = "select game.game_id, game_name, game_genre
    from game, customer, library
    where customer.cust_id = library.cust_id
    and library.game_id = game.game_id
    and cust_usr = '$user'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row["game_id"];
            $name = $row["game_name"];
            echo "<tr>
        <td>" . $row["game_id"] . "</td>
        <td>" . "<a href = $id.php>$name</a>" . "</td>
        <td>" . $row["game_genre"] . "</td>
    </tr>";
        }
        // close the table tag on completion
        echo "</table>";
    } else {
        echo "[0] results";
    }
    ?>
    <footer class="footer">

        <p class="footer">Video Game Marketplace and Management System</p>
        <p class="footer">Created by: Nicholas Carta & Nicholas Sims</p>

    </footer>