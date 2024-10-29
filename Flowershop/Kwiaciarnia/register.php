<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Logowanie Kwiaciarnia</title>
  </head>
  <body>
    <?php require('phpcode/logregist.php')?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php require('phpcode/header.php')?>
    <main class="py-2 form-signin text-center ">
        <form action="phpcode/logregist.php" method="post">
          <h1 class="h3 mb-3 fw-normal"><b>Kwiaciarnia</b> - Rejestracja</h1>
          <div class="form-floating">
            <input type="text" class="form-control" for="firstname" name="firstname" id="firstnamelinput" placeholder="text">
            <label for="emailinput">Imię</label>
          </div>
          <div class="form-floating">
            <input type="text" class="form-control" for="secondname" name="secondname" id="secondnameinput" placeholder="text">
            <label for="emailinput">Nazwisko</label>
          </div>
          <div class="form-floating">
            <input type="email" class="form-control" for="email" name="email" id="emailinput" placeholder="name@example.com">
            <label for="emailinput">Email addres*</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" name="password" id="passwordinput" placeholder="Password">
            <label for="passwordinput">Hasło*</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" name="passwordRepeat" id="passwordinput" placeholder="Password">
            <label for="passwordinput">Powtórz hasło*</label>
          </div>
          <input type="hidden" name="action" value="register">
          <button class="my-3 btn btn-primary" type="submit">
            Zarejestruj sie
          </button>
          
        </form>
    </main>
    <?php require('phpcode/footer.php')?>
  </body>     
</html>