<?php 
    
    require_once 'connect.php';
    include_once 'Pangina.php';
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
 	<article > 
     
         <label> Новости</label>
         <?php
         
         $link = mysqli_connect($host, $user, $password, $database) 
         or die("Ошибка " . mysqli_error($link));


        
         $pagConfig = array(
            'baseURL'=>'http://localhost/php_pagination/index.php',
            'totalRows'=>$rowCount,
            'perPage'=>$limit
        );
        $pagination =  new Pagination($pagConfig);
        


         

        
        
     



         $sql1 = "SELECT * FROM `news` ORDER BY `idate` DESC LIMIT 4";
$result1_select = mysqli_query($link, $sql1) or die("Ошибка " . mysqli_error($link));




         while($row = mysqli_fetch_assoc($result1_select)){
           
            echo "<section>
            <p class=\"date\">"; echo date('d-m-Y',$row['idate']); echo "</p> 
           <h2>
           {$row['title']}
           </a>
           </h2>
            {$row['announce']}
            </section>";
           
           
            

}


$limit = 5;
 $offset = !empty($_GET['page'])?(($_GET['page']-1)*$limit):0;
 //получаем количество записей
 
 $sql5 = "SELECT COUNT(*) as id FROM news";
 $queryNum = mysqli_query($link, $sql5) or die("Ошибка " . mysqli_error($link));
 
 $resultNum = $queryNum->fetch_assoc();
 $rowCount = $resultNum['postNum'];
 //инициализируем класс pagination
 $pagConfig = array(
     'baseURL'=>'http://localhost/php_pagination/index.php',
     'totalRows'=>$rowCount,
     'perPage'=>$limit
 );
 $pagination =  new Pagination($pagConfig);
 //получаем записи
 $sql6 = "SELECT * FROM posts ORDER BY id DESC LIMIT $offset,$limit";
 $query = mysqli_query($link, $sql6) or die("Ошибка " . mysqli_error($link));
 if($query->num_rows > 0){ ?>
     <div class="posts_list">
     <?php while($row = $query->fetch_assoc()){ ?>
         <div class="list_item"><?php echo $row["title"]; ?></a></div>
     <?php } ?>
     </div>
    <!-- отображаем ссылки на страницы -->
     <?php echo $pagination->createLinks(); ?>
 <?php } ?>



  
        
      

     
     </article>

    <body>
</html>