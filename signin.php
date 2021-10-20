<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Créer un compte </title>
        <link rel="icon" href="favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    </head>

<body>


<?php require 'connect.php'; ?> 

<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header ">
    <h4 class="modal-title "> Créer un compte. </h4>
     </div>
     <div class="modal-body">

        <form method="POST" class="d-flex flex-column">
        <label for="login"> Entrez un identifiant </label>
        <input type="text" name="login" placeholder="Votre prénom par exemple" value="" required>
        <label for="login"> Entrez un mot de passe sécurisé </label>
        <input type="password" id="pwd" name="passwd" placeholder="Minimum 6 caractères" value="" minlength="6" required>
        <p> <input type="checkbox" name="checkbox" onclick="Afficher()">  Afficher le mot de passe </p>

    <div class="modal-footer">
    <input class="btn btn-primary" type="submit" value="Créer un compte">
        </form>
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
      </div>
      <p> Vous avez déjà un compte? </p>
        <a href="./login.php"> Se connecter </a>

  </div>
  </div>
  <script>
    function Afficher() {
        var input = document.getElementById("pwd"); 
if (input.type === "password")
{ 
input.type = "text"; 
} 
else
{ 
input.type = "password"; }
    } 
</script>



</body>
</html>