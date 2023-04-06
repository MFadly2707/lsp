<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="proses_login.php" method="POST">
                    <h2 class="text-center">Login Form</h2>
                    <hr>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" placeholder="Username">
                    </div>
                    
                    <div class="form-group">
                    <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                    <p>Belum Punya Akun ? <a href="../register/index.php">Register</a></p>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
   
</body>
</html>