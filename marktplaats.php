<!DOCTYPE html> 
<?php
session_start();
?>
    <head>
        <title>Marktplaats Home</title>
        <link rel="stylesheet" type="text/CSS" href="marktplaats.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body >
        <div class="titelblok">                 
            <h1> Tweede Kans </h1>
        </div>
        <div class="row">
        <div class = "col-2" name = "selecteer">
                <h3> selecteer een categorie </h3>
                <?php
                    include "openConn.php";
                    try {
                    $sql4 = "SELECT * FROM categorie ORDER BY id ASC";
                    $result = $connection->query($sql4);    
                        ?>
                    <form action="marktplaats.php" method ="GET" >
                        <ul>
                        <?php
                        foreach ($result as $row) {
                        ?>
                            <li><input type= "submit"  name="catkeuze"  value="<?php echo $row['name'] ?>">
                                <br/></li>
                        </ul>
                        <?php   
                        }  
                        $connection = NULL;  
                        ?>
                    </form>
                    <?php
                    }
                    catch(PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();
                    }
                ?>
        
        </div>

        <div class = "col-3" name = "zoek">
            <form  method ="GET" action="marktplaats.php" >
                <h3> Zoek op trefwoorden: </h3>
                <input type = "text" name = "zoekterm">
                <input type = "submit" name = "verzenden">
            </form>
        </div>

        <div class = "col-1" name = "registreer">
            <p><h4><a href = "registreren.php">registreer hier</a></h4></p>
        </div>

        <div class = "col-1" name = "login">
            <p><h4><a href = "inloggen.php">log in</a></h4></p>
        </div>

        <div class = "col-2" name = "newAdv">
            <p><h4><a href = "newAdv.php">nieuwe advertentie plaatsen</a></h4></p>
        </div>

        <div class = "col-3" name = "userPage">
            <p><h4><a href = "userPage.php">naar je eigen overzichtspagina</a></h4></p>
        </div>


        <div class = "advertenties">
            <?php
            include "openConn.php";
        
            $sql1 = "SELECT * FROM advertenties ";

                if(isset($_GET['catkeuze'])) {
                    $catkeuze =  $_GET['catkeuze'];

                    var_dump($catkeuze); 
                    $sql1 .= " WHERE categorie =  '$catkeuze' ";
                }

                      

                if(isset($_GET['zoekterm'])){
                    $zoek = $_GET['zoekterm'];
                    var_dump($zoek);
                                      
                     $sql1 .= "WHERE omschrijving LIKE '%$zoek%'";
                }

                $sql1 .=  "ORDER BY id DESC "; 
              
                
            $result1 = $connection->query($sql1);    
            ?>
            <div class = "col-12">
                <table class = "userTable"> 
                    <tr>
                        <th class = "col-3"><h4>foto</h4></th>
                        <th class = "col-1" ><h4>titel</h4></th>
                        <th class = "col-3" ><h4>omschrijving</h4></th>
                        <th class = "col-1" ><h4>categorie</h4></th>
                        <th class = "col-1" ><h4>aangeboden door: </h4></th>
                        <th class = "col-1" ><h4>vraagprijs</h4></th>
                        <th class = "col-1" ><h4>geboden</h4></th>
                        <th class = "col-1" ><h4>plaatsingsdatum</h4></th>
                        
                    </tr>

                    <?php 
                    if (!empty($result1)) {                
                        foreach ($result1 as $row){        
                    ?>
                    <tr> 
                        <td class = "col-3" >foto</td>   
                        <td class = "col-1"><?php echo $row['titel']; ?></td>
                        <td class = "col-3" ><?php echo $row['omschrijving']; ?></td>
                        <td class = "col-1" ><?php echo $row['categorie']; ?></td>
                        <td  class = "col-1"><?php echo $row['naamVerkoper']; ?></td>
                        <td  class = "col-1"> &#8364; <?php  echo $row['vraagprijs']; ?></td>
                        <td class = "col-1" >jkjk</td> 
                        <td  class = "col-1"><?php echo $row['plaatsingsdatum']; ?></td>
                    </tr>
                                
                    <?php
                        } 
                    }
                    ?>
                </table>            
            </div>      
    <?php               
     // Close connection
    $connection = null; 
    ?>  
    </body>
</html>