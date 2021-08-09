
 <?php 
    require_once 'connect.php';
    ?>

<!DOCTYPE html>
<html lang="ru">
   
    <head>
        <meta charset="utf-8" />
        <title>News</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
 	<header>
 	
 	</header>
 	<article> 
     <div class="ram">
         <?php




       $z=$_GET['id'];
         $link = mysqli_connect($host, $user, $password, $database) 
         or die("Ошибка " . mysqli_error($link));

         $sql1 = "SELECT * FROM `news` WHERE id='$z'";
$result1_select = mysqli_query($link, $sql1) or die("Ошибка " . mysqli_error($link));

        




         while($row = mysqli_fetch_assoc($result1_select)){
            
            
            echo "<section>
           <h2>{$row['title']}</h2>
           <div class=polos>
           </div>
            {$row['content']}
            </section>";

         }
         ?>
         
         <div class="polos1">
</div>

       

        <nav>
     <div class="pos">
    <p align="left"> <a style="color:blue;" href="news.php" >Все новости >></a></p> 
        </div>
        </nav>
        </div>

     </article>
    <body>
</html>