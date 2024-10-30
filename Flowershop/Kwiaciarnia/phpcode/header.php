<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Kwiaciarnia Warszawa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <div class="headbar">
        <h1>
        <?php if(isset($_COOKIE['user']) == false){ //Autorization check?>
            <div class="container text-start">
                <div class="row  pt-2 ">
                    <div class="ps-0 col-md-8 ">
                        Kwiaciarnia Warszawa
                    </div>
                    <div class=" ps-0 col text-end ">
                        <form action="koszyk.php">
                            <button class="btn btn-light btn-lg">
                                Koszyk
                            </button>
                        </form>
                    </div>
                    <div class="col text-end">
                        <form action="register.php ">
                            <button class="btn btn-light btn-lg">
                                Rejestracja
                            </button>
                        </form>
                    </div>
                    <div class="col text-end">
                        <form action="logowanie.php">
                            <button class="btn btn-light btn-lg">
                                Logowanie
                            </button>
                        </form>
                    </div>
            </div>
        </div>
        <?php }
        elseif($_COOKIE['email'] != 'admin@admin.pl'){ //For auth users?>
            <div class="container text-start">
                <div class="row  pt-2 ">
                    <div class="ps-0 col-md-9 ">
                        Kwiaciarnia Warszawa
                    </div>
                    <div class="col text-end">
                        <form action="koszyk.php">
                            <button class="btn btn-light btn-lg">
                                Koszyk
                            </button>
                        </form>
                    </div>
                    <div class=" ps-0 col text-end ">
                        <form action="/phpcode/exit.php">
                            <button class="btn btn-light btn-lg">
                                Wyloguj
                            </button>
                        </form>
                    </div>
            </div>
        </div>
            <?php }
            ?>
        </h1>
        
    </div>
        <?php if((isset($_COOKIE['email']))==TRUE && ($_COOKIE['email'] == 'admin@admin.pl')){ //Admin session start?>
            <div class="container text-start">
                <div class="row">
                    <div class="col ">
                        <form action="/phpcode/klient.php">
                            <div class="dropdown">
                                <button class="btn btn-light btn-lg"> Klient </button>
                                    <div class="dropdown-content">
                                        <a class="link-offset-2 link-underline link-underline-opacity-0" href="/phpcode/klient.php">Lista klientów</a>
                                        <a class="link-offset-2 link-underline link-underline-opacity-0" href="/phpcode/klient.php">Wyszukaj klenta/ usuń klienta</a>
                                        <a class="link-offset-2 link-underline link-underline-opacity-0" href="/phpcode/klient.php">Dodaj Klienta</a>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div class="col ">
                        <form action="/phpcode/article.php ">
                        <div class="dropdown">
                                <button class="btn btn-light btn-lg"> Artykuł </button>
                                    <div class="dropdown-content">
                                        <a class="link-offset-2 link-underline link-underline-opacity-0" href="/phpcode/article.php">Lista artykułów</a>
                                        <a class="link-offset-2 link-underline link-underline-opacity-0" href="/phpcode/article.php">Wyszukaj artykuł/ usuń artykuł</a>
                                        <a class="link-offset-2 link-underline link-underline-opacity-0" href="/phpcode/article.php">Dodaj artykuł</a>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div class="col">
                        <form action="/phpcode/zamowienie.php">
                        <div class="dropdown">
                                <button class="btn btn-light btn-lg"> Zamówienia </button>
                                    <div class="dropdown-content">
                                        <a class="link-offset-2 link-underline link-underline-opacity-0" href="/phpcode/zamowienie.php">Oczekujące</a>
                                        <a class="link-offset-2 link-underline link-underline-opacity-0" href="/phpcode/zamowienie.php">W realizacji</a>
                                        <a class="link-offset-2 link-underline link-underline-opacity-0" href="/phpcode/zamowienie.php">Zrealizowane</a>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div class="col">
                        <form action="/phpcode/raport.php">
                            <div class="dropdown">
                                <button class="btn btn-light btn-lg"> Raporty </button>
                                <div class="dropdown-content">
                                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="/phpcode/raport.php">Wyszukaj zamowienie dla klienta</a>
                                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="/phpcode/raportzamowienia.php">Suma wszystkich zamówien</a>
                                    <a class="link-offset-2 link-underline link-underline-opacity-0" href="/phpcode/raportzamowienia.php">Podaj minimalną, maksymalną, średnią wartość zamówienia. </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col">
                        <form action="/phpcode/exit.php">
                            <button class="btn btn-light btn-lg"> Wyloguj </button>
                        </form>
                    </div>
            </div>
        </div>
        <?php }  
    else{ ?>
    <div>
        <ul class="menu">
            <li class="link"><a href="/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="1.5 1.5 16 16">
            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
            </svg> HOME</a></li>
            <li><a href="#link">O NAS</a></li>
            <li><a href="#link">KWIATY</a></li>
            <li><a href="#link">FLOWERBOXY</a></li>
            <li><a href="#link">PREZENTY</a></li>
            <li><a href="#link">BALONY</a></li>
            <li style="float:right"><a href="#link">KONTAKT</a></li>
        </ul>
    </div>
    <?php } ?>
</html>