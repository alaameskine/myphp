
<?php
if(!session_start())
{
    session_start();
   
}

include "connect.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- ques 4 : table question(id_question,question)
     
    table reponse(id_reponse,reponse,#id_question)
    table resultat(id_resulat,#id_question,#id_reponse,#id_user)
    table exam(id_exam,date_debut,date_fin)-->
    
    <form action="" method="post">
    <?php

    
    // question 5
    $req5="select date_debut,date_fin from exam";
    $date_debut;
    $date_fin; 
    foreach($db->query($req5) as $key ){
        $date_debut=$key['date_debut'];
        $date_fin=$key['date_fin']; 
    }
   
    $date= date('y-m-d:h:m:s');

  
while($date >= $date_debut and $date < $date_fin){
    $req1="select * from question";
    $result=$db->query($req1);
    $id=1;
    if($id==1){
        $next = mysqli_query($mysqli, "SELECT * FROM  question  WHERE id='$id' ");
         
        $id=$ques['id_question'];
        $ques=$ques['question'];
        echo "Q".$ques['id_question'].":".$ques['question'];
        $req2="select * from reponse where id_question='$id'";
        $result2=$db->query($req2); 
        $id++;
        foreach($result2 as $resp){
            $rep=$resp['reponse'];
            $rep_id=$resp['id_reponse'];

          echo "<input type='redio' value='$rep_id' name='$ques'>  $rep" ;

        }
        echo "<input type='submit' value='next' name='next'>" ;
    }
    if(isset($_POST['next']) ){
        $next = mysqli_query($mysqli, "SELECT * FROM  question  WHERE id='$id' ");
         
        $id=$ques['id_question'];
        $ques=$ques['question'];
        echo "Q".$ques['id_question'].":".$ques['question'];
        $req2="select * from reponse where id_question='$id'";
        $result2=$db->query($req2); 
        $id++;
        foreach($result2 as $resp){
            $rep=$resp['reponse'];
            $rep_id=$resp['id_reponse'];

          echo "<input type='redio' value='$rep_id' name='$ques'>  $rep" ;

        }
        echo "<input type='submit' value='next' name='next'>" ;
        echo "<input type='submit' value='previous' name='previous'>" ;
    }
    if(isset($_POST['previous'])  and $id>1){
        $next = mysqli_query($mysqli, "SELECT * FROM  question  WHERE id='$id' ");
         
        $id=$ques['id_question'];
        $ques=$ques['question'];
        echo "Q".$ques['id_question'].":".$ques['question'];
        $req2="select * from reponse where id_question='$id'";
        $result2=$db->query($req2); 
        $id--;
        foreach($result2 as $resp){
            $rep=$resp['reponse'];
            $rep_id=$resp['id_reponse'];

          echo "<input type='radio' value='$rep_id' name='$ques'>  $rep" ;

        }
        echo "<input type='submit' value='next' name='next'>" ;
        echo "<input type='submit' value='previous' name='previous'>" ;
    }
   
      

        
        
    }
    $reste=$date_fin-$date;
    echo "il vous reste $reste";
    $sd=$session['fin']=$date_fin;

    if($date > $sd){

        $req7="select *from question ";
        foreach($bd->query($req7) as $ligne){
        $name=$ligne['question'];
        $id_question=$ligne['id_question'];
        $req8="select * from reponse where id_question=$id_question";
        foreach($bd->query($req8) as $kayr){
            $value=$kayr['id_reponse'];
          if(isset($_POST["$name"]) and $_POST["$name"]==$value){
            $user=$_SESSION['id_user'];
           $req_stok="insert into resultat(id_question,id_reponse,id_user) value($id_question,$value,$user)";
           $final=$bd->query($req_stock);
          }
        }
        }
        
    }


    
   
    ?>
    </form>
</body>
</html>

<?php




?>
