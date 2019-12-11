<!DOCTYPE html>
<html>

<head>
    <style>
        form {
            border: 3px solid #f1f1f1;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>

    <h2>Login Form</h2>

    <form action="saveuser.php" method="post">
        Username
        <input type="text" placeholder="Enter Username" name="uname" required>

        Password
        <input type="password" placeholder="Enter Password" name="pass" required>

        <button type="submit">Login</button>

    </form>

</body>

</html>