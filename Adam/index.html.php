<?php
include 'connexion_bd.php';
include 'fonction2.php';


$i = 1;
$_SESSION['user'] = get_reciver($bdd, $i);


?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="AVNC Solutions">
  <title>ADAM</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link href="asset/css/style.css" rel="stylesheet">

</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.0.1/chart.min.js" integrity="sha512-tQYZBKe34uzoeOjY9jr3MX7R/mo7n25vnqbnrkskGr4D6YOoPYSpyafUAzQVjV6xAozAqUFIEFsCO4z8mnVBXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<body>
  <?php
  get_val_trie($bdd);
  ?>
  <div class="collapse" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4>About</h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <img width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24">
        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
        <circle cx="12" cy="13" r="4" /></img>
        <strong class="text-white">ADAM</strong>
      </a>
      <a href="#" class="navbar-brand d-flex align-items-center">
        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
        <strong class="text-white"><?php echo $_SESSION['user']['name'] ?> </strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
  </header>

  <main>
    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">Adam, qu'est-ce que c'est ?</h1>
          <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
          <p>
            <a href="#" class="btn btn-primary my-2 cta">Crée ton compte</a>
          </p>
        </div>
      </div>
    </section>
    <?php
    if (isset($_SESSION['user']) && $_SESSION['user']['have_finish_big_qcm'] == null) {
      echo '
    <div class="alert alert-danger" role="alert" display="none">
      Completing the MCQ is required to access baby correlation features <a href="questionaire.html.php" class="alert-link">Questonary</a>.
    </div>
    ';
    } else {
      echo '
    <div class="alert alert-success" role="alert" display="none">
      You have completed the MCQ,, you now have acces to your profile and baby correlation features
    </div>
    ';
    }
    ?>
    <div class="album py-5">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php foreach (get_val_trie($bdd) as $value) : ?>;
          <div class="col">
            <div class="card shadow-sm">
              <a href="profil.html.php?id=<?php echo $value['id_donneur'] ?>" class=" link">
                <img class="bd-placeholder-img card-img-top" src="<?php echo $value['photo_profil'] ?>" alt="" width="100%" height="100%"></img>
              </a>
              <div class="card-body">
                <div class="carac">
                  <div class="description">
                    <p class="card-text age"><?php echo $value['age'] ?> ans</p>
                  </div>
                  <div class="description">
                    <p class="card-text"><progress class="progress_bar" value="100" max="100"> </progress></p>
                  </div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                  <div class="pourcent">
                    <p class="val_trie"><?php echo $value['val_trie'] ?>%</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

        </div>
      </div>
    </div>
    </div>
    <footer class="page-footer font-small teal pt-4">
      <div class="container-fluid text-center text-md-left">
        <div class="row">
          <div class="col-md-6 mt-md-0 mt-3">

            <h5 class="text-uppercase font-weight-bold">Politique de confidentialité</h5>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita sapiente sint, nulla, nihil
              repudiandae commodi voluptatibus corrupti animi sequi aliquid magnam debitis, maxime quam recusandae
              harum esse fugiat. Itaque, culpa?</p>
          </div>
          <hr class="clearfix w-100 d-md-none pb-3">

          <div class="col-md-6 mb-md-0 mb-3">
            <h5 class="text-uppercase font-weight-bold">Mentions légales</h5>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis modi earum
              commodi aperiam temporibus quod nulla nesciunt aliquid debitis ullam omnis quos ipsam, aspernatur id
              excepturi hic.</p>
          </div>
        </div>
      </div>
    </footer>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="asset/js/script.js"></script>
</body>

</html>