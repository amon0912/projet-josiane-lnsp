<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Register</title>

  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Création de compte
        <strong id="msg-info" class="float-right text-danger"> </strong>
      </div>
      <div class="card-body">
        <form id="form" method="POST" action="traitement/kregister.php">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="nom" id="firstName" class="form-control" placeholder="First name"
                    required="required" autofocus="autofocus">
                  <label for="firstName">Votre nom</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="prenom" id="lastName" class="form-control" placeholder="Last name"
                    required="required">
                  <label for="lastName">Votre prénom</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Email address"
                required="required">
              <label for="inputEmail"> Adresse Email</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" name="pass1" id="inputPassword" class="form-control" placeholder="Password"
                    required="required">
                  <label for="inputPassword">Mot de passe</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" name="pass2" id="confirmPassword" class="form-control"
                    placeholder="Confirm password" required="required">
                  <label for="confirmPassword">Confirmer le mot passe</label>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" href="#">S'inscrire</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Déjà inscrire</a>
          <a class="d-block small" href="forgot-password.php">Mot de passe oublié?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <script src="js/_register.js"></script>

</body>

</html>