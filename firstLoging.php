<?php require("./header.php");



if ($_POST) {
  $user = $_POST["user"];
  $password = $_POST["password"];
  if ($user === "123" && $password === "321") {
    echo "<script>window.location.href='indexLog.php'</script>";
  } else {
    echo "<script>window.location.href='index.php'</script>";
  }
}

?>

<form method="POST" action="./firstLoging.php">
  <div class="mb-3">
    <label for="user" class="form-label">Nom d'utilisateur</label>
    <input type="text" class="form-control" id="user" name="user">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
    <label class="form-check-label" for="exampleCheck1">Accepte de vendre mes données</label>
  </div>
  <input type="submit" class="btn btn-outline-primary" value="Se connecter">
</form>

<?php require("./footer.php") ?>