<!DOCTYPEhtml>
<?php
session_start();
?>
<html>
    <head>    
        <title>persoonlijjke pagina</title>
        <link rel="stylesheet" type="text/CSS" href="marktplaats.css"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
    <body>
        <div class="col-12" >
            <p><a href = "newAdv.php">Een nieuwe advertentie plaatsen</a></p>
                    <br/>
                <p><a href = "marktplaats.php">Naar homepage</a></p>
        </div>       
        <div>
            <?php
            include "openConn.php";
           
            //bericht verwijderen
            if(isset($_POST['verwijder'])){                    
                $brweg = $_POST['verwijder'];
                $rijweg= "DELETE FROM advertenties WHERE id='$brweg'";
                $result=$connection->query($rijweg);
            }
      
            //Ik wil nu  alle berichten in een tabel laten zien 
            if(isset($_SESSION['userId'])) {
                $userId = $_SESSION['userId'];
                $sql3 = "SELECT * FROM advertenties WHERE users_id = '$userId'";
                $result3 = $connection->query($sql3);
    
                ?>
                <div >
                    <table class = "userTable"  > 
                        <tr>
                            <th class = "col-3" ><h4>foto</h4></th>
                            <th class = "col-1" ><h4>titel</h4></th>
                            <th class = "col-3" ><h4>omschrijving</h4></th>
                            <th class = "col-1" ><h4>categorie</h4></th>
                            <th class = "col-1" ><h4>vraagprijs</h4></th>
                            <th class = "col-1" ><h4>geboden</h4></th>
                            <th class = "col-1" ><h4>plaatsingsdatum</h4></th>
                            <th class = "col-1" ></th>    
                        </tr>

                        <?php 
                        if (!empty($result3)) {                
                            foreach ($result3 as $row){        
                        ?>
                        <tr> 
                            <td class = "col-3"></td>   
                            <td class = "col-1" ><?php echo $row['titel']; ?></td>
                            <td class = "col-3" ><?php echo $row['omschrijving']; ?></td>
                            <td class = "col-1" ><?php echo $row['categorie']; ?></td>
                            <td class = "col-1" ><?php echo $row['vraagprijs']; ?></td>
                            <td class = "col-1" ></td> 
                            <td class = "col-1" ><?php echo $row['plaatsingsdatum']; ?></td>
                            <td  class = "col-1">
                                <form action="userPage.php" method="POST">
                                    <input type="hidden" name="verwijder" value="<?php echo $row['id'] ?>"/> 
                                    <input type="submit" value="verwijderen" name="submit"/>
                                </form>
                            </td>    
                        </tr>
                                    
                        <?php
                            } 
                        }
                        ?>
                    </table>            
                </div>     
        <?php
            }
            // Close connection
            $connection = null; 
        ?>  
   </body>
</html>