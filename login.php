<?php
session_start();
// menyertakan code dari file koneksi
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login | Kuliner Nusantara</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <link rel="icon" href="img/logo.png" />
  </head>

  <body class="bg-light">

    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="card border-0 shadow rounded-5">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <i class="bi bi-person-circle h1 display-4 text-secondary"></i>
                            <p>Welcome to Kuliner Nusantara</p>
                            <hr />
                        </div>
                        <form action="" method="post">
                            <input
                            type="text"
                            name="user"
                            class="form-control my-4 py-2 rounded-4"
                            placeholder="Username"
                            />
                            <input
                            type="password"
                            name="pass"
                            class="form-control my-4 py-2 rounded-4"
                            placeholder="Password"
                            />
                            <div class="text-center my-3 d-grid">
                            <button class="btn btn-secondary rounded-4">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php 

    //check apakah ada request dengan method POST yang dilakukan
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // ambil nilai input 
        $userInput = $_POST['user'];
        $passInput = $_POST['pass'];

        // --- VALIDASI EMPTY FIELD ---
        if ($userInput == "") {
            echo "Username tidak boleh kosong!";
            exit;
        }

        if ($passInput == "") {
            echo "Password tidak boleh kosong!";
            exit;
        }

        $username = $userInput; 
        $password = md5($passInput);
        
        $stmt = $conn->prepare("SELECT * FROM user WHERE username=? AND password=?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $hasil = $stmt->get_result();
        $row = $hasil->fetch_array(MYSQLI_ASSOC); 

        if (!empty($row)) { 
            $_SESSION['username'] = $username;
            header("location:admin.php");
        } else {
            header("location:login.php");
        }

    }
    
    ?>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>