<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Connexion </title>
        <link rel="icon" href="favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    </head>

<body>

    <?php require 'connect.php'; ?> 


    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
    <h4 class="modal-title"> Se connecter. </h4>
     </div>
     <div class="modal-body">
     <form method="POST" class="d-flex flex-column">
        <label for="login"> Entrez votre identifiant </label>
        <input type="text" name="login" placeholder="Identifiant" value="">
        <label for="login"> Entrez votre mot de passe </label>
        <input type="password" id="pwd" name="passwd" placeholder="Mot de passe" value="">
        <p> <input type="checkbox" name="checkbox" onclick="Afficher()">  Afficher le mot de passe </p>




    <div class="modal-footer">
    <input class="btn btn-primary" type="submit" value="Connexion">
        </form>
      </div>
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
            echo "<div class='alert alert-danger'> Cet utilisateur n'existe pas :( </div>";
        }else {
            if (password_verify($passwd, $user['user_pwd'])) {
                $_SESSION['connected']=true;
                $_SESSION['user']=$user['user_name'];
                header('location: ./index.php');
            } else {
                echo "<div class='alert alert-danger'> Le mot de passe est invalide. </div>";
            }
        }
    }
    ?>
            <p> Vous n'avez pas encore de compte?  </p>
        <a href="./signin.php"> Créer un compte </a>
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