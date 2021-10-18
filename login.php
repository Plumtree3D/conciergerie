<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Connexion </title>
        <link rel="icon" href="favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    </head>

    <?php require 'connect.php'; ?> 

    <form method="POST">
        <input type="text" name="login" placeholder="Identifiant" value="">
        <input type="password" name="passwd" placeholder="Mot de passe" value="">
        <input class="btn btn-primary" type="submit" value="Connexion">
    </form>


    
    <?php
    if (isset($_POST['login']) && isset($_POST['passwd']) && (!empty($_POST['login'])) && (!empty($_POST['passwd'])))
    {
        $login = strip_tags($_POST['login']);
        $passwd = strip_tags($_POST['passwd']);

        $sql = 'SELECT * FROM users WHERE user_name = :login';
        $query = $db->prepare($sql);
        $query->bindvalue(':login', $login, PDO::PARAM_STR);
        $user = $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC);


        if(!$user){
            echo 'Cet utilisateur n\'existe pas :(';
        }else {
            if (password_verify($passwd, $user['user_pwd'])) {
                $_SESSION['connected']=true;
                header('location: ./index.php');
            } else {
                echo 'Le mot de passe est invalide.';
            }
        }
    }
    ?>

<p> Vous n'avez pas encore de compte?  </p>
    <a href="./signin.php"> Créer un compte </a>





</html> 