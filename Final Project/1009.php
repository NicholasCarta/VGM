<html>

<head>
    <link rel="stylesheet" type="text/css" href=vgmlayout.css>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<header>
    <div>
        <nav>
            <ul>
                <li>
                    <a href="VGM.php">Home</a>
                </li>
                <li>
                    <a href="NewMarketPlace.php">Marketplace</a>
                </li>
                <li>
                    <a href="Library.php">Library</a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<body>
    <div id="game">
        <h1>Animal Crossing</h1>

        <img id="game" src="animalcrossing.jfif" alt="animal crossing">
        <p>
            <br> Developer: Nintendo <br><br>
            Publisher: Nintendo <br><br>
            Release date: April 14, 2001
        </p>

        <p class="summary">
            Enter the exciting world of Animal Crossing! In Animal Crossing you can live however you want,
            earn coins by helping out your fellow villagers or by selling goods and other commodities to the shop!
            <br><br> Once you've saved up some coins you can purchase upgrades to your home or decorate it to your hearts content.
            In Animal Crossing things don't always stay the same. Featuring a day/night cycle with different village events occuring dynamically based on the time of day!
            <br><br>
        </p>
    </div>

    <table>
        <tr>
            <th>User</th>
            <th>Rating</th>
            <th>Reviews</th>
        </tr>
        <br>
        <div class="gamerev">
            <form action="1009.php" method="post" style="background-color: grey">
                Leave a review <br>
                <textarea name=review cols="30" rows="2" required="required"></textarea>
                Rate
                <select name="rate" id="rate">
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
                <br>
                <input type="submit" value="Submit">
            </form>
        </div>
        <br>

        <?php

        $rate = $_POST["rate"];
        $review = $_POST["review"];

        $myfile = fopen("user.txt", "r") or die("Unable to open file!");
        $user = fgets($myfile);
        fclose($myfile);


        $conn = mysqli_connect("localhost", "root", "qwe1234*()ASD", "Project");

        if ($rate & $review) {
            $sql = "insert into review values('$rate', '$review', '1009', (select cust_id
            from customer
            where cust_usr = '$user'));
        ";
            $result = $conn->query($sql);

            $sql = "select review.cust_id, customer.cust_usr, rev_rate, rev_msg, game_id
            from review, customer
            where customer.cust_id = review.cust_id
            and game_id = '1009'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>" . $row["cust_usr"] . "</td><td>" . $row["rev_rate"] . "</td><td>" . $row["rev_msg"] . "</td></tr>";
                }
                // close the table tag on completion
                echo "</table>";
            } else {
                echo "[0] results";
            }
        } else {
            $sql = "select review.cust_id, customer.cust_usr, rev_rate, rev_msg, game_id
            from review, customer
            where customer.cust_id = review.cust_id
            and game_id = '1009'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
            <td>" . $row["cust_usr"] . "</td><td>" . $row["rev_rate"] . "</td><td>" . $row["rev_msg"] . "</td></tr>";
                }
                // close the table tag on completion
                echo "</table>";
            } else {
                echo "[0] results";
            }
        }



        // disconnect from the db
        $conn->close();
        ?>

        <br><br><br>