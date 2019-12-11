

<?php
$user = $_POST["uname"];
$myfile = fopen("user.txt", "w") or die("Unable to open file!");
$txt = $user;
fwrite($myfile, $user);
fclose($myfile);


// PHP permanent URL redirection test
header("Location: http://localhost/FinalProject/Sims/VGM.php", true, 301);
exit();
?>
