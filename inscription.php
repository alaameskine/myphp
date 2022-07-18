<?php
include "connect.php";

if(!session_start())
{
    session_start();
   
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <style>
            body {background: rgb(238,174,202);
                  background: linear-gradient(90deg, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);}
            form { text-align: center;}

            
            
        </style>       
        <title>Signing in</title>
    </head>
    <body>

    <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center"> 
              <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase">Signing in</h2>
              <p class="text-white-50 mb-5">Please enter your informations to sign in</p>
                <form method="post" action="" style="margin: auto; width: 220px;" >
                <label class="form-label"> Username<input type="text" name="loginid"><br/> </label>
                <label class="form-label"> Password<input type="password" name="password"><br/></label>
                <label class="form-label"> Confirm password<input type="password" name="confirmpassword"><br/></label>
                <label class="form-label"> Name<input type="text" name="name"><br/></label>
                <label class="form-label"> Adress<input type="text" name="adresse"><br/></label>
                <label class="form-label"> Phone<input type="text" name="phone"><br/></label>
                <label class="form-label"> Email<input type="text" name="email"><br/></label>
            </br>
                <input type="submit" value="Sign in" name="submit"><br/>

                 </form>
            
                 </div>
                 </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>
</body>
</html>

<?php
if(isset($_POST['submit']))
{
    if  (isset($_POST['loginid']) and isset($_POST['password'])  and isset($_POST['confirmpassword']) 
        and isset($_POST['name'])  and isset($_POST['city'])  and isset($_POST['adresse']) 
        and isset($_POST['phone']) ){
        if($_POST['password']==$_POST['confirmpassword']){
            $loginid=$_POST['loginid'];
            $password=$_POST['password'];
            $name=$_POST['name'];
            $city=$_POST['city'];
            $adresse=$_POST['adresse'];
            $phone=$_POST['phone'];
            

            $sql="insert into user(loginid,password,name,city,adresse,phone) values('$loginid','$password','$name','$city','$adresse', '$phone')";
            $result=$db->query($sql);
            if($result===true){

               echo "Insertion avec succès";
                
            }
            else{
                echo "Insertion avec échec";
               
            }


            
        }else{
            echo "Passwords ne sont pas identiques";
        }
       
    }
}
            ?>