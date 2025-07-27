<!-- Afficher le menu -->
<?php 
  $page = 'animeDetail';
  require_once('../../app/header.php')
?>

<!-- Récuperer l'animé -->
<?php 
  if(!isset($_GET['id']) | $_GET['id'] == ''){
    header('Location:/views/error.php');
  }

  require_once('../../app/animeAPI.php');
  $author = getAuthorById($_GET['id']);
  $allMangas = getAllMangas();

  $mangas = [];

  foreach($allMangas as $manga){
    if($_GET['id'] == $manga -> authors_id){
        array_push($mangas, $manga);
    }
  }
?>
<div class="uk-container uk-margin-top uk-margin-bottom" style="position: relative;">
  <nav aria-label="Fil d'Ariane">
    <ul class="uk-breadcrumb">
      <li><a href="../../index.php">Accueil</a></li>
      <li><a href="../mangakas/mangakas.php">Manga</a></li>
      <li><a href="../mangakas/mangakaDetail.php?id=<?=$author->id?>"><?=$author->name?></a></li>
      <li><span>Mangas</span></li>
    </ul>
  </nav>
</div>
<div class="uk-margin-top uk-margin-large-left uk-margin-large-right uk-margin-bottom">
  <h1 class="uk-font uk-text-center">Mangas de <?=$author -> name?></h1>
    <div class="uk-grid-match uk-child-width-1-6@l uk-child-width-1-4@m uk-child-width-1-3@s uk-child-width-1-2 uk-flex uk-flex-center" uk-grid uk-height-match="target: .uk-card">
      <?php  foreach($mangas as $manga) :?>
        <div class="image-fond">
          <div  class="contenu uk-card uk-card-default uk-raduis ">
            <div class="image-crop">
              <img src="<?=$manga -> image_url?>" alt="<?=$manga -> title?>" class="uk-raduis-img uk-img" width="100%">
            </div>
            <div class="uk-margin-left uk-margin-right uk-margin-bottom">
              <h2 class="uk-card-title uk-text-center uk-font uk-active"><?=$manga->title ?></h2>
              <?php 
                $mots = explode(' ', $manga -> synopsis);
                $text_grand = implode(' ',array_slice($mots, 0, 20));
                $mots = explode(' ', $manga -> synopsis);
                $text_petit = implode(' ',array_slice($mots, 0, 10));
              ?>
              <p class="uk-text-center uk-visible@s uk-font"><?=$text_grand?> ...</p>
              <p class="uk-text-center uk-hidden@s uk-font"><?=$text_petit?> ...</p>
              <div class="uk-flex uk-flex-center">
                <a href="mangaDetail.php?id=<?=$manga -> id?>" class="uk-button-default uk-button uk-raduis">Voir plus</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach?>
    </div>
</div>
<?php 
  require_once('../../app/footer.php')
?>