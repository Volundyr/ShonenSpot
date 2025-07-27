<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.23.4/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ADLaM+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.23.4/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.23.4/dist/js/uikit-icons.min.js"></script>
    <title>ShonenSpot</title>
</head>
<body class="uk-background-primary uk-font wrapper">
    <header class="uk-margin-left uk-margin-center">
        <nav class="uk-navbar">
            <div class="uk-navbar-center">
                <ul class="uk-navbar-nav">
                    <li><a href="/index.php" class="<?php if($page == 'home'){echo 'uk-active';}?>" style="margin:0 !important; padding:0!important">Accueil</a></li>
                    <li><a href="/views/introduction.php" class="<?php if($page == 'introduction'){echo 'uk-active';}?>">Introduction</a></li>
                    <li><a href="/views/animes/animes.php" class="<?php if($page == 'animes'){echo 'uk-active';}?>">Animés</a></li>
                    <li><a href="/views/mangas/mangas.php" class="<?php if($page == 'mangas'){echo 'uk-active';}?>">Mangas</a></li>
                    <li><img src="/assets/img/logo.png" alt="ShonenSpot logo" width="75%" class="uk-img-center"></li>
                    <li><a href="/views/characters/characters.php" class="<?php if($page == 'characters'){echo 'uk-active';}?>">Peronnages</a></li>
                    <li><a href="/views/mangakas/mangakas.php" class="<?php if($page == 'mangakas'){echo 'uk-active';}?>">Mangakas</a></li>
                     <li><a href="/views/films/films.php" class="<?php if($page == 'films'){echo 'uk-active';}?>">Films</a></li>
                    <li><a href="/views/apropos.php" class="<?php if($page == 'apropos'){echo 'uk-active';}?>">A propos</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
    
    
