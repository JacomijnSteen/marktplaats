<
    <!DOCTYPE html> 
    <head>
        <title>My Website</title>
        <link rel="stylesheet" type="text/CSS" href="marktplaats.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
        
 

    
    <body >
        <div class="titelblok">                 
            <h1> Tweede Kans </h1>
        </div>
        <div class="row">
        <div class = "col-4" name = "selecteer">
            <form  method ="POST" action="marktplaats.php" >
                <h3> selecteer een categorie </h3>
                <input type = "text" name = "selecteer">
                <input type = "submit" name = "selecteer">
            </form>
        
        </div>

        <div class = "col-4" name = "zoek">
            <form  method ="POST" action="marktplaats.php" >
                <h3> Zoek op trefwoorden: </h3>
                <input type = "text" name = "zoekterm">
                <input type = "submit" name = "verzenden">
            </form>
        </div>

        <div class = "col-2" name = "registreer">
            <p><h4><a href = "registreren.php">registreer hier</a></h4></p>
        </div>

        <div class = "col-2" name = "login">
            <p><h4><a href = "inloggen.php">registreer hier</a></h4></p>
        </div>

        <!--<div class = "advertenties">
            <?php
            // include "openConn.php";
        
            // $connection = new PDO($dsn, $user_name, $pass_word);
            // $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // //Ik wil nu  alle berichten in een tabel laten zien 

            // $sql4 = "SELECT b.id, b.datum, b.name, b.titel, GROUP_CONCAT(c.name) as category_name " .
            //     "FROM blogtext b " .
            //     "LEFT JOIN blogtext_categories bc ON b.id = bc.blogtext_id " .
            //     "LEFT JOIN categories c on bc.categories_id = c.id ";

            // if (array_key_exists('categorie_select', $_GET) && isset($_GET['categorie_select'])) {
            //     $category_ids = implode(",", $_GET['categorie_select']);

            //     $sql4 .= "WHERE c.id = '$category_ids' ";
            // }

            // $sql4 .= "GROUP BY b.id " .
            //     "ORDER BY b.datum DESC";

            
            // $result4 = $connection->query($sql4); -->
 

            ?>
        <div class="tabel">
            <table border='1px;'> 
                <tr>
                    <th><h4>datum</h4></th>
                    <th><h4>naam</h4></th>
                    <th><h4>titel</h4></th>
                    <th><h4>categorie</h4></th>
                    <th></th>
                </tr>

                <?php 
                // if (!empty($result4)) {                
                //     foreach ($result4 as $row){
                        
                ?>
                <tr>    
                    <td><?php echo $row['datum']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><a href = 'oneText.php?id=<?php echo $row["id"] ?>' alt='oneText'> <?php echo $row["titel"]; ?></a></td>
                    <td><?php echo $row['category_name']; ?></td>
                    <td>
                        <form action="blog.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>"/> 
                            <input type="submit" value="verwijderen" name="submit"/>
                        </form>
                    </td>
                </tr>
                               
            <?php
            //        } 
            //     }
            // ?>
            </table> -->
            
        </div>       
    <?php               
     // Close connection
    // $connection = null; 
    // ?>  
    </div>
            
        </body>
</html>