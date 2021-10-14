<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Conciergerie </title>
        <link rel="icon" href="favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    </head>
    <?php 
    include 'function.php';

    ?>
    <body>

        <div class="container">
            <h1 class="border bg-dark rounded-lg text-white"> &nbsp; Interventions effectuées  </h1>

            <div class="row">
                <div class="col">
                    <form name="search" method="post" action="">
                        <div>
                                <input type="text" placeholder="Mots clés" name="typeSearch"/>
                                <input type="submit" class="btn btn-primary" value="Chercher"/>
                        </div>
                    </form>
                </div>

                <div class="col-1">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ajouter">
                    Ajouter
                    </button>
                </div>

            </div>
            



            <table class="table">
            <thead>
                <tr>
                    <th scope="col"> # </th>
                    <th scope="col"> intervention </th>
                    <th scope="col"> étage </th>
                    <th scope="col"> date </th>
                </tr>
            </thead>
                <tbody>
                    <?php foreach($intervention as $truc) : ?>
                        <?php if(!isset($_GET['modifier']) || $_GET['modifier'] !== $truc['id_intervention']) { ?>
                            <tr>
                                <td> <?php echo $truc['id_intervention'] ?> </td>
                                <td> <?php echo $truc['type_intervention'] ?> </td>
                                <td> <?php echo $truc['etage_intervention'] ?> </td>
                                <td> <?php echo $truc['date_intervention'] ?> </td>
                                <td> <a href="?modifier=<?php echo $truc['id_intervention']?>" class="btn btn-secondary"> modifier </a></td>
                                <td> <a href="?supprimer=<?php echo $truc['id_intervention']?>" class="btn btn-danger"> Supprimer </a></td>

                            </tr>
                        <?php 
                        } else {
                        ?> 
                            <form method="POST" action="#">
                                <input type="hidden" name="truc" value="<?= $truc['id_intervention'] ?>">
                                <td> <?= $truc['id_intervention'] ?> </td>
                                <td> <input type="text" name="type_intervention" value="<?= $truc['type_intervention'] ?>" > </td>
                                <td> <input type="number" name="etage_intervention" value="<?= $truc['etage_intervention'] ?>" > </td>
                                <td> <input type="date" name="date_intervention" value="<?= $truc['date_intervention'] ?>" > </td>
                                <td> <input type="submit" class="btn btn-success" value="Valider"></td>
                                <td> <a href="index.php" class="btn btn-danger"> Annuler </a></td>
                            </form>

                        <?php }
                        endforeach;
                        ?>


                         
                    
                </tbody>
            </table>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#reset">
                Réinitialiser
            </button>
            
        </div>




<!-- Modal -->
<div class="modal fade" id="ajouter" tabindex="-1" role="dialog" aria-labelledby="ajouter" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Ajouter une intervention </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="">
                    <div class="form-group">
                        <label> Type d'intervention </label>
                        <input type="text" class="form-control" name="type"/>
                        <label> Etage </label>
                        <input type="number" class="form-control" name="etage"/>
                        <label> Date </label>
                        <input type="date" class="form-control" name="date"/>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Valider"/>
                </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="ajouter" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="resetLabel"> Réinitialiser la base de données </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="GET" action="#">
          <p> Êtes vous sûr.e de vouloir réinitialiser la base de données? Il n'y aura pas de retour en arrière. </p>
                    <a href="index.php" class="btn btn-secondary"> Annuler </a>
                    <a href="?reset" class="btn btn-warning"> Réinitialiser </a>
                </form>
      </div>
    </div>
  </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    </body>


</html>