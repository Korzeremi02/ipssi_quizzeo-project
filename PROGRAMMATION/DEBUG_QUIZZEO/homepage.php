<!DOCTYPE html>

    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="homepage.css">
        <title>ACCUEIL QUIZZEO </title>

    </head>

<body>
    <header>
        <section class="tete">
            <!-- <h1>QUIZZEO</h1> -->
            <div class="logo">
                <img src="logo.png" alt="logo">
            </div>
            <div class="X">
                <div class="connect">
                    <a href="subscription.php" ><button class="subscribebtn">s'inscrire</button></a>
                    <a href="connection.php"><button class="subscribebtn">Se connecter</button></a>
                </div>
                <div class="mode_btn">
                        <button for="themeSwitch" id="themeLogo" style="font-size: 90px;"><h3>DARK</h3></button>
                    <!-- <input type="checkbox" name="theme-mode" class="checkbox"> -->
                </div>
            </div>
        </section>

    </header>


    

        <form action="homepage_search.php" method="post">
            <input type="text" id="searchbar" name="searchbar">
            <input type="submit" value="Rechercher"></input>
        </form>

        <h2>Page d'accueil visiteur</h2>

        <?php
            $server="localhost";
            $username="root";
            $password="root";
            $db="quizzeo";

            $conn = new mysqli($server,$username,$password,$db);

            if($conn->connect_error) {
                die("Connexion échouée: " . $conn->connect_error);
            }


            $req="SELECT * FROM quizz";
            $res=$conn->query($req);

            if($res->num_rows > 0){
                while($row=$res->fetch_assoc()){
                    echo "<br>" . "Nom du quiz : " . $row["titre"];
                    echo " - Difficulté : " . $row["difficulte"];
                    echo " - Date de création : " . $row['date_creation'] . "<br>";
                }
            }else{
                echo " ";
            }
            
            $conn->close();
        ?>

        <script>
            const html = document.getElementsByTagName("html")[0];
            const themeSwicth = document.getElementById("themeLogo");
            themeSwicth.addEventListener("click", () => {
            html.classList.toggle("nuit");
            if (html.classList.contains("nuit")) {
                themeSwicth.innerHTML = 'LIGHT'.fontsize(4);
            } else {
                themeSwicth.innerHTML = 'DARK'.fontsize(4);
            }
        });
        </script>  

</body>
    
</html>