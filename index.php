<?php 
  $page = 'home';
  require_once('app/header.php')
?>
<div class="uk-margin-large-left uk-margin-large-right uk-margin-bottom uk-margin-top">
  <h1 class="uk-font uk-text-center">Bienvenue sur ShonenSpot</h1>
  <h2 class="uk-font uk-text-center uk-active">L'univers des shonens comme jamais auparavant !</h2>
  <p class="uk-text-center uk-text-large">Plonge dans un monde où les combats épiques, les héros courageux et les aventures inoubliables t’attendent !</p>
  <div class="uk-flex uk-flex-center uk-margin-bottom">
    <a href="views/animes/animes.php"  class="uk-link-reset"><button class="uk-button uk-button-default uk-raduis" uk-icon="icon: link-external">Explorer les animés </button></a>
  </div>
  
  <div class="uk-grid-match uk-child-width-1-6@l uk-child-width-1-@m uk-child-width-1-3@s uk-child-width-1-1 uk-flex uk-flex-center" uk-grid uk-height-match="target: .uk-card" style="margin-top:50px;">
    <div class="image-fond">
      <div class="uk-card uk-raduis uk-card-default contenu" style="position: relative;">
        <img src="assets/img/introduction.png" alt="logo pour les saisons" class="uk-raduis-img uk-img-center">
        <div class="uk-margin-left uk-margin-right" style="margin-bottom: 70px;">
          <h2 class="uk-card-title uk-active uk-font uk-text-center">Introduction</h2>
          <p class="uk-font uk-text-center">
            Découvre  l’univers des animés japonais : leur origine, leurs genres et les studios emblématiques. Parfait pour débuter ou approfondir sa passion !
          </p>
        </div>
        <a href="views/introduction.php" class="uk-link-reset uk-position-bottom-center uk-margin-bottom">
          <button class="uk-button uk-button-default uk-raduis">Voir plus</button>
        </a>
      </div>
    </div>
    <div class="image-fond">
      <div class="uk-card uk-raduis uk-card-default contenu" style="position: relative;">
        <img src="assets/img/animes.png" alt="logo pour les animés" class="uk-raduis-img uk-img-center">
        <div class="uk-margin-left uk-margin-right" style="margin-bottom: 70px;">
          <h2 class="uk-card-title uk-active uk-font uk-text-center">Animés</h2>
          <p class="uk-font uk-text-center">
            Retrouve tous tes shonens préférés, avec des fiches détaillées et des infos sur l'univers de chaque série !
          </p>
        </div>
        <a href="views/animes/animes.php" class="uk-link-reset uk-position-bottom-center uk-margin-bottom">
          <button class="uk-button uk-button-default uk-raduis">Voir plus</button>
        </a>
      </div>
    </div>

    <div class="image-fond">
      <div class="uk-card uk-raduis uk-card-default contenu" style="position: relative;">
        <img src="assets/img/mangas.png" alt="logo pour les mangas" class="uk-raduis-img uk-img-center">
        <div class="uk-margin-left uk-margin-right" style="margin-bottom: 70px;">
          <h2 class="uk-card-title uk-active uk-font uk-text-center">Mangas</h2>
          <p class="uk-font uk-text-center">
            Découvre les meilleurs mangas, classiques ou nouveautés, avec des résumés complets, des critiques et des infos sur les auteurs !
          </p>
        </div>
        <a href="views/mangas/mangas.php" class="uk-link-reset uk-position-bottom-center uk-margin-bottom">
          <button class="uk-button uk-button-default uk-raduis">Voir plus</button>
        </a>
      </div>
    </div>

    <div class="image-fond">
      <div class="uk-card uk-raduis uk-card-default contenu" style="position: relative;">
        <img src="assets/img/personnages.png" alt="logo pour les personnages" class="uk-raduis-img uk-img-center">
        <div class="uk-margin-left uk-margin-right" style="margin-bottom: 70px;">
          <h2 class="uk-card-title uk-active uk-font uk-text-center">Personnages</h2>
          <p class="uk-font uk-text-center">
            Découvre les héros, rivaux et méchants qui ont marqué l’histoire du shonen !
          </p>
        </div>
        <a href="views/characters/characters.php" class="uk-link-reset uk-position-bottom-center uk-margin-bottom">
          <button class="uk-button uk-button-default uk-raduis">Voir plus</button>
        </a>
      </div>
    </div>

    <div class="image-fond">
      <div class="uk-card uk-raduis uk-card-default contenu" style="position: relative;">
        <img src="assets/img/mangakas.png" alt="logo pour les mangakas" class="uk-raduis-img uk-img-center">
        <div class="uk-margin-left uk-margin-right" style="margin-bottom: 70px;">
          <h2 class="uk-card-title uk-active uk-font uk-text-center">Mangakas</h2>
          <p class="uk-font uk-text-center">
            Découvre les créateurs derrière tes œuvres préférées, avec des biographies, anecdotes et leurs séries emblématiques !
          </p>
        </div>
        <a href="views/mangakas/mangakas.php" class="uk-link-reset uk-position-bottom-center uk-margin-bottom">
          <button class="uk-button uk-button-default uk-raduis">Voir plus</button>
        </a>
      </div>
    </div>
    <div class="image-fond">
      <div class="uk-card uk-raduis uk-card-default contenu" style="position: relative;">
        <img src="assets/img/films.png" alt="logo pour les saisons" class="uk-raduis-img uk-img-center">
        <div class="uk-margin-left uk-margin-right" style="margin-bottom: 70px;">
          <h2 class="uk-card-title uk-active uk-font uk-text-center">Films</h2>
          <p class="uk-font uk-text-center">
            Découvre les meilleurs films d’animation japonais : classiques, pépites cachées, critiques et infos sur leurs créateurs !
          </p>
        </div>
        <a href="views/films/films.php" class="uk-link-reset uk-position-bottom-center uk-margin-bottom">
          <button class="uk-button uk-button-default uk-raduis">Voir plus</button>
        </a>
      </div>
    </div>
    <div class="image-fond">
      <div class="uk-card uk-raduis uk-card-default contenu" style="position: relative;">
        <img src="assets/img/apropos.png" alt="logo pour la page apropos" class="uk-raduis-img uk-img-center">
        <div class="uk-margin-left uk-margin-right" style="margin-bottom : 70px;">
          <h2 class="uk-card-title uk-active uk-font uk-text-center">À propos</h2>
          <p class="uk-font uk-text-center">ShonenSpot, c’est la plateforme dédiée aux passionnés de shonens ! Notre mission : te plonger dans ces univers épiques avec des analyses et infos détaillées.</p>
        </div>
        <a href="views/apropos.php"  class="uk-link-reset uk-position-bottom-center uk-margin-bottom"><button class="uk-button uk-button-default uk-raduis" >Voir plus</button></a>
      </div>
    </div>
    
  </div>
</div>

<?php 
  require_once('app/footer.php')
?>