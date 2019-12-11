<html>
    <head>
        <link rel="stylesheet" type="text/css" href=vgmlayout.css>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
<header>



<h1 class="header">The Marketplace</h1>
<div>
  <nav>
      <ul>
        <li>
          <a href="VGM.php">Home</a>
        </li>
        <li class="active">
          <a  href="NewMarketPlace.php">Marketplace</a>
        </li>
        <li>
          <a href="Library.php">Library</a>
        </li>
      </ul>
  </nav>
</div>
<h3>You decide how to view the current games for sale</h3>

</header>
<table>
    <tr>
        <th>Game</th>
        <th>Price ($)</th>
        <th>Release Date</th>
        <th>Genre</th>
        <th>Rating</th>
    </tr>
</body>
</html>

    <?php
    // Connect to the mysql server
    $conn = mysqli_connect("localhost", "root", "qwe1234*()ASD", "Project");

    // Values captured from the http POST
    $sort = $_POST["sort"];
    $order = $_POST["order"];
    $price = $_POST["price"];
    $genre = $_POST["genre"];

    if ($sort & $order) {
        $sql = "select game_name, game.game_id, game_price, game_release, game_genre, truncate(avg(rev_rate), 1) as 'rev_rate'
        from game, review
        where game.game_id = review.game_id 
        group by game_name, game_id, game_price, game_release, game_genre
        ORDER BY " . "$sort" . "$order";
    } elseif ($price) {
        $sql = "select game_name, game.game_id, game_price, game_release, game_genre, truncate(avg(rev_rate), 1) as 'rev_rate'
        from game, review
        where game.game_id = review.game_id 
        and game_price < $price
        group by game_name, game_id, game_price, game_release, game_genre;";
    } elseif ($genre) {
        $sql = "select game_name, game.game_id, game_price, game_release, game_genre, truncate(avg(rev_rate), 1) as 'rev_rate'
        from game, review
        where game.game_id = review.game_id
        and game_genre = '$genre'
        group by game_name, game_id, game_price, game_release, game_genre;";
    } else {
        $sql = "select game_name, game.game_id, game_price, game_release, game_genre, truncate(avg(rev_rate), 1) as 'rev_rate'
        from game, review
        where game.game_id = review.game_id
        group by game_name, game_id, game_price, game_release, game_genre;";
        $result = $conn->query($sql);
    }

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row["game_id"];
            $name = $row["game_name"];
            echo "<tr>
                <td>" . "<a href = $id.php>$name</a>" . "</td><td>" . $row["game_price"] . "</td><td>" . $row["game_release"] . "</td><td>" . $row["game_genre"] . "</td><td>" . $row["rev_rate"] . "</td></tr>";
        }
        // close the table tag on completion
        echo "</table>";
    } else {
        echo "[0] results";
    }


    // disconnect from the db
    $conn->close();
    ?>
    <br><br><br>
    <form action="NewMarketPlace.php" method="post">
            List Game by: <br>
            <input type="radio" name="sort" value="game_name"> Name
            <input type="radio" name="sort" value="game_price"> Price
            <input type="radio" name="sort" value="game_release"> Date
            <input type="radio" name="sort" value="game_genre"> Genre
            <input type="radio" name="sort" value="rev_rate"> Rating

            <select name="order" id="list">
                <option value=" ASC">Ascending</option>
                <option value=" DESC">Descending</option>
            </select>

        <input type="Submit" value="List">
    </form>

    <form action="NewMarketPlace.php" method="post">
            Search games below: <br>
            <input name="price" type="number" min="1" step="any">

        <input type="Submit" value="Search">
    </form>

    <form action="NewMarketPlace.php" method="post">
            Genre: <br>
            <input type="text" name="genre">

        <input type="Submit" value="Search">
    </form>
</table>

<footer class="footer">

<p class="footer">Video Game Marketplace and Management System</p>
<p class="footer">Created by: Nicholas Carta & Nicholas Sims</p>

</footer>