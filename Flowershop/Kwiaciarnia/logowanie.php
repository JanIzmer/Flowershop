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
    <?php if(isset($_COOKIE['user']) == false): //Autorization check?>
    <main class="form-signin text-center">
        <form action="phpcode/logregist.php" method="post">
            <h1 class="h3 mb-3 fw-normal"><b>Kwiaciarnia</b> - Logowanie</h1>
            <div class="form-floating">
                <input type="email" class="form-control" for="email" name="email" id="emailinput" placeholder="name@example.com">
                <label for="emailinput">Email adres</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="passwordinput" placeholder="Password">
                <label for="passwordinput">Hasło</label>
            </div>
            <input type="hidden" name="action" value="login">
            <button class="my-3 btn btn-primary" type="submit">
                Zaloguj
            </button>
            <?php if (isset($_COOKIE['warning'])){?>
                <p>Błedny login lub hasło.</p>
            <?php } ?>
        </form>
    </main>
        <?php else: ?>
        <p> Hej <?=$_COOKIE['name']?> , zeby się wylogować nacisnij <a href="phpcode/exit.php">tu</a></p>
    
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <?php endif; ?>
    <?php require('phpcode/footer.php')?>
    </body>
  
</html>