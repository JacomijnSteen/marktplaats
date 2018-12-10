<!DOCTYPEhtml>
<html>
    <head>    
        <title>registratie pagina</title>
      <!--  <link rel="stylesheet" type="text/CSS" href="blog.css">-->  
     
    </head>
    <body>

    <section class="registreren">
            <p><h3>Hier kunt u registreren</h3></p>
            <br/><br/><br/>
        <form action = "registreren.php" method = "POST">
            <input type = "text" name = "name" placeholder = "naam">
                    <br/><br/><br/>
            <input type = "email" name = "email" placeholder = "email">
                    <br/><br/><br/>
            <input type = "password" name = "password1" placeholder = "password">
                    <br/><br/><br/>
            <input type = "password" name = "password2" placeholder = "herhaal uw password">
                    <br/><br/><br/>   
                <input type="submit" name= "registreer" value="Verzenden">
                    <br/><br/><br/>
        </form>
    </section>
    <?php
    // de geregistreerde gegevens opslaan in db marktplaats table users
            include 'openConn.php';
            $connection = new PDO($dsn, $user_name, $pass_word);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            if(isset ($_POST['registreer'])){
                $name = $_POST['name']; 
                $email = $_POST['email'];
                $password1 = $_POST['password1'];
                $password2 = $_POST['password2'];
            
                if(empty($name) || empty($password1) ||empty($email) || empty($password2)){

                    echo "<strong>een van de velden is niet ingevuld</strong>"; 
                    sleep(3);
                    header('Location:registreren.php');
                   
                } elseif ($password1!==$password2){
                    echo "de wachtwoorden zijn niet gelijk";
                    sleep(3);
                    header('Location:registreren.php');
                } 
                
                $passwordReg = md5($password1);
                $checkdubbel = "SELECT * FROM  users  WHERE email = '$email'";
                $result = $connection->query($checkdubbel);
                
                if ($result == $_POST['email']){

                    echo "dit emailadres bestaat al ";
                    sleep(2);
                    header('Location:registreren.php');
                }

                $newPersonSql = "INSERT INTO users (name, email, password)
                                    VALUES ('$name' , '$email' , '$passwordReg')";
                $result = $connection->exec($newPersonSql);
            
                if($result === 0) {
                    $err = $connection->errorInfo();
                    print_r($err);
                }
                    echo "<strong> Registratie is gelukt. U kunt nu inloggen </strong>";    
            }        
            ?> 
            <p><a href = "inloggen.php"> log hier in </a></p> <?php     
        // close connection
            $connection = NULL;

            ?>
        </body>
    </html>
