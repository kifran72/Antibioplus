<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="vue/login.css">

    <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<body>

  <div class="container">
      <div class="login">
        <title>ANTIBIOPLUS</title>
        <font color="#917DAA">
            <h1 id="Anti">ANTIBIOPLUS</h1>
        </font>

        <?php if($_GET["mes"]=="inc") {echo "utilisateur ou mot de passe incorect";} ?>
        <div class="container">
            <form action="Verification_Connexion.php" method="post">

                <h2>Connexion</h2><br>

                <input type="text" name="user" placeholder="Nom d'utilisateur">
                <input type="password" name="pass" placeholder="Mot de passe">
                <button class="login-submit" onclick="location.href = 'Page-acceuil-admin.php?mes=bvn';">Valider</button>

        </div>
    </div>
  </div>
  
</body>

</html>
