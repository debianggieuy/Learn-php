<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Login Petugas</title>

</head>


<body>
    <div class="container">
        <div class ="card col-lg-6 mx-auto">
            <div class ="card-header bg-info">

            </div>
            <h4 class="text- white">
</h4>

            <div class="card-body">
                <form action ="Login_proses.php" method="post">
                    Username
                    <input type="text"name="username"
                    class="form-control mb-2"required>

                    password
                    <input type ="text" name="password"
                    class="form-control mb-2" required>
                    <button type ="submit" name ="login"
                    class="btn btn-info btn-block">
                    Log In
</button>
</form>
            </div>
</div>


<form action ="login-post.php"method="POST">
    <input type="text"name="username">
    <input type="password"name="password">
    <button type="submit">Login</button>
</form>
</body>

</html>
