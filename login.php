<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->
            
            <form method="POST">
                <h1>Connexion</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='LOGIN' >
                <?php
if (isset($_GET['erreur'])) {
    $err = $_GET['erreur'];
    if ($err == 1 || $err == 2)
        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
}
?>
            </form>
        </div>
    </body>
</html>
 <?php
require("database.php");

if (isset($_POST['submit'])) {

    // $username = valid_donnees($_POST["username"]);
    // $password = valid_donnees($_POST["password"]);

    // function valid_donnees($donnees){
    //     $donnees = trim($donnees);
    //     $donnees = stripslashes($donnees);
    //     $donnees = htmlspecialchars($donnees);
    //     return $donnees;

    $username = $_POST['username'];
    $password = $_POST['password'];
// print password_hash("test",PASSWORD_DEFAULT);

    if (!empty($username) && !empty($password)) {
        $result = $db->query("SELECT * FROM `utilisateurs` WHERE user='" . $username . "';");
        $find = $result->fetch(PDO::FETCH_ASSOC);

        if ($find == false) {
            print "utilisateur non trouvé";
        }
        else {

            if (password_verify($password, $find["mdp"]) == true) {
                header("location:pageAccueil.php");
                die();
            }
            else {
                print "mot de passe incorrect";
            }
        }
    }
}
?>
            </form>
        </div>
    </body>
</html>