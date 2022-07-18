<?php
include "connect.php";
session_start();
?>
<html>
    <head>
        <title> Authentification </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        body {background: rgb(238,174,202);
              background: linear-gradient(90deg, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);}
    </style>
    </head>
    <body>
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
  
              <div class="mb-md-5 mt-md-4 pb-5">
  
                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <p class="text-white-50 mb-5">Please enter your login and password!</p>
  
                <div class="form-outline form-white mb-4">
                  <input type="text" id="loginid" class="form-control form-control-lg" />
                  <label class="form-label" for="loginid">Username</label>
                </div>
  
                <div class="form-outline form-white mb-4">
                  <input type="password" id="password" class="form-control form-control-lg" />
                  <label class="form-label" for="password">Password</label>
                </div>
  
                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
  
             
              </div>
  
              <div>
                <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
                </p>
              </div>
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <body>
</html>

<?php
    if (isset($_POST['submit'])) {
        if (isset($_POST['loginid']) and (isset($_POST['password']))) {
            $loginid = $_POST['loginid'];
            $password = $_POST['password'];

                $sql = "select * from user where loginid='$loginid' and password='$password'";
                $result = $db->query($sql);
                if($result){
                    while ($user=$result -> fetch_assoc()) {
                        $_SESSION['loginid'] = $user;
                        $_SESSION['id_user'] = $user['id_user'];

                        header("location:quizz.php");
                    }
                }

                else{
                    header("location:inscription.php");
                }

        }
    }

?>