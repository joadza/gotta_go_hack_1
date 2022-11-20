<?php
include 'connexion_bd.php';
include 'fonction2.php';
?>

<!DOCTYPE html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/Chart.js"></script>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="AVNC Solutions">
  <title>ADAM - Profil </title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link href="asset/css/style2.css" rel="stylesheet">

</head>

<body>
  <div class="container">
    <div class="main-body">
      <?php $tab = get_donate($bdd, $_GET['id']); ?>
      <div class="row gutters-sm profil-top">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="profile d-flex flex-column align-items-center text-center">
                <div class="profile-img">
                  <img src="<?php echo $tab['photo_profil'] ?>" alt="Admin" class="rounded-circle" width="150">
                </div>
                <div class="mt-3">

                  <h3 class="text-secondary mb-1"><?php echo $tab['sexual_orientation'] ?> </h3>
                  <h4 class="text-muted font-size-sm"><?php echo $tab['height'][0] ?> m <?php echo substr($tab['height'], -2) ?></h4>
                  <p class="text-muted font-size-sm"><strong><?php echo $tab['sport_week'] ?></strong> séance de sport dans la semaine</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3 caract">
            <ul class="list-group list-group-flush">
              <hr>
              <div class="row">
                <h3 class="mb-0">Age</h6>
                  <div class=" text-secondary">
                    <?php echo $tab['age'] ?> ans
                  </div>
              </div>
              <hr>
              <div class="row">
                <h3 class="mb-0">Place of birth</h6>
                  <div class=" text-secondary">
                    <?php echo $tab['origine'] ?>
                  </div>
              </div>
              <hr>
              <div class="row">
                <h3 class="mb-0">Focus</h6>
                  <div class=" text-secondary">
                    <ul>
                      <li>
                        <?php echo $tab['center_interest_1'] ?>
                      </li>
                      <li><?php echo $tab['center_interest_2'] ?></li>
                      <li><?php echo $tab['center_interest_3'] ?></li>
                    </ul>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>

    <div class="description">
      <p class="text-description text-center">
        <?php echo $tab['donor_word'] ?>
      </p>
    </div>


    <div class="profil-graphic">
      <div class="row">
        <div class="col img-graphic">
          <img class="fit-picture" src="asset\images\graphe_picture\giver\graphe_giver_<?php echo  $tab['id_donneur'] ?>.png" alt="Grapefruit slice atop a pile of other slices">
        </div>
      </div>
    </div>
  </div>
</body>

</html>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
<script src="asset/js/script.js"></script>