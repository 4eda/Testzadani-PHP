
 <?php 
    require_once 'connect.php';
    ?>

<!DOCTYPE html>
<html lang="ru">
   
    <head>
        <meta charset="utf-8" />
        <title>News</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
 	<header>
 	
 	</header>
 	<article > 
     <div class="ram">
         <h2> Новости</h2>
         <div class="polos">
</div>
         <?php
         

         $link = mysqli_connect($host, $user, $password, $database) 
         or die("Ошибка " . mysqli_error($link));

  
         if (isset ($_GET['page']))
         {
            $page= $_GET ['page'];
        }
         else
  $page = 1;
  $kol=4;
  $art = ($page * $kol) - $kol;
  $sql1 = "SELECT * FROM `news` ORDER BY `idate` DESC lIMIT $art, $kol";
  $result1_select = mysqli_query($link, $sql1) or die("Ошибка " . mysqli_error($link));
  $sql3="SELECT COUNT(*) FROM news";
  $res= mysqli_query($link, $sql3) or die("Ошибка " . mysqli_error($link));
  $row = mysqli_fetch_row($res);
  $total = $row[0];
  $str_pag = ceil($total / $kol);

         while($row = mysqli_fetch_assoc($result1_select))
         {
           $id=$row['id'];
            echo "<section> 
           <h3>";
            echo date('d-m-Y',$row['idate']);
           echo
           "<a href=view.php?id=".$id.">
           {$row['title']}
           </a>
           </h3>
            {$row['announce']}
           
            </section>";
        }
       
?>
        
  <div class="polos1">
</div>
<div class="pos">
<nav>
<?php
echo "<p align=left>Страницы</br></p>";
for ($i = 1; $i <= $str_pag; $i++){
echo "<button><a href=news.php?page=".$i."> ".$i." </a></button>";
}
?>
</nav> 
</div>
     
     </article>
    
    <body>
</html>