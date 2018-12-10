<!DOCTYPEhtml>
<html>
    <head>    
        <title>inlog- en registratie pagina</title>
      <!--  <link rel="stylesheet" type="text/CSS" href="blog.css">-->  
     
    </head>
    <body>
        <section class="inloggen">
            <p><h3>Log in</h3></p>
                <br/><br/><br/>
            <form action = "inlogpag.php" method = "POST">
                <input type = "email" name = "inlogEmail" placeholder = "email">
                    <br/><br/><br/>
                <input type = "password" name = "inlogPassword" placeholder = "password">
                    <br/><br/><br/>
                <input type="submit" name="logIn" value="Log in">
                <   br/><br/><br/>
            </form>
        </section>

    <?php
        include 'openConn.php';
        $connection = new PDO($dsn, $user_name, $pass_word);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 

        if(isset($_POST['logIn'])){

            if(empty ($_POST['inlogEmail']) || empty ($_POST['inlogPassword'])){
                echo "niet alle velden zijn ingevuld";
                sleep(3);
                    header('Location:inloggen.php');
            } 

        $inlogEmail = $_POST['inlogEmail'];
        $inlogPassword = $_POST['inlogPassword'];
       
        $passwordLogin = md5($inlogPassword);
                
    // check alleen op email en password
                $emailCheck = "SELECT * FROM users WHERE email = '$inlogEmail' AND password = '$passwordLogin'";

                $check = $connection->query($emailCheck);
                    if(count ($check) !== 1){
                        echo "naam en password combinatie onjuist";
                        sleep(3);
                        header('Location:inloggen.php');
                    } else {

                        header('Location:marktplaats.php');
                    }
        }
    // close connection
        $connection = NULL;
        ?>
       
    </body>
</html>

     