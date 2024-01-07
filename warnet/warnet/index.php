<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Silahkan Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            background: url('img/bcg.jpeg') fixed;
            background-size: cover;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .kotak_login {
            width: 300px;
            background: rgba(255, 255, 255, 0.8);
            margin: 0 auto;
            padding: 30px 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .kotak_hiasan {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.8));
            z-index: -1;
            border-radius: 5px;
        }

        .tulisan_login {
            text-align: center;
            font-size: 20px;
            color: #333;
        }

        .form_login {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .tombol_login {
            background: #3498db;
            color: #fff;
            padding: 10px;
            border: 0;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        .tombol_login:hover {
            background: #2980b9;
        }

        .alert {
            background-color: rgba(244, 67, 54, 0.8);
            color: white;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            text-align: center;
        }

        .tombol_register {
            text-align: center;
            margin-top: 10px;
        }

        .tombol_register a {
            color: #333;
            text-decoration: none;
        }

        .tombol_register a:hover {
            color: #3498db;
        }

        @media (max-width: 768px) {
            body {
                background: linear-gradient(45deg, #FF73B3, #C4018A, #3A3897, #003366);
                background-size: cover;
            }
            .kotak_login {
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <?php 
    if(isset($_GET['pesan'])){
        if($_GET['pesan']=="gagal"){
            echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
        }
    }
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="kotak_login">
                    <div class="kotak_hiasan"></div>
                    <p class="tulisan_login">Silahkan login</p>

                    <form action="cek_login.php" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username .." required="required">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password .." required="required">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block tombol_login">LOGIN</button>
                    </form>
                    <div class="tombol_register">
                        <p>Belum punya akun? <a href="register.php">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
