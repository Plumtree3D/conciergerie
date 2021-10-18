<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Créer un compte </title>
        <link rel="icon" href="favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    </head>


<?php require 'connect.php'; ?> 

<form method="POST">
    <div class="form-floating">
    <input type="text" name="login" placeholder="Entrez un identifiant" value="">
    <input type="password" name="passwd" placeholder="Entrez un mot de passe" value="">
    <input class="btn btn-primary" type="submit" value="Créer un compte">
    </div>
</form>
<p> Vous avez déjà un compte? </p>
<a href="./login.php"> Se connecter </a>

<?php
if(isset($_POST['login']) && isset($_POST['passwd']) && (!empty($_POST['login'])) && (!empty($_POST['passwd']))){
    $login = strip_tags($_POST['login']);
    $passwd = strip_tags($_POST['passwd']);

    $passwd = password_hash($passwd, PASSWORD_DEFAULT);

    $sql = 'INSERT INTO users (user_name, user_pwd) VALUES (:login, :passwd)'; 
    $query = $db->prepare($sql);
	// On injecte (terme scientifique) les valeurs
	$query->bindValue(':login', $login, PDO::PARAM_STR);
	$query->bindValue(':passwd', $passwd, PDO::PARAM_STR);
	// On exécute la requête
	$query->execute();
    header('location: ./index.php');
} ?>

</html>