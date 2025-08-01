<!-- Afficher le menu -->
<?php 
  $page = 'animeDetail';
  require_once('../../app/header.php')
?>

<!-- Récuperer l'animé -->
<?php 
  if(!isset($_GET['id']) | $_GET['id'] == ''| !isset($_GET['source']) | $_GET['source'] == ''){
    header('Location:/views/error.php');
  }

  require_once('../../app/animeAPI.php');
  $allCharaters = getAllCharacters();
  $characters = [];
  if($_GET['source'] == "Anime"){
    $source = getAnimeById($_GET['id']);
    $nom ="Animés";
    $page = "anime";
    $lien = 'anime_id';
  }elseif($_GET['source'] == "Manga"){
    $source = getMangaById($_GET['id']);
    $nom = "Mangas";
    $page = 'manga';
    $lien = 'manga_id';
  }else{
    header('Location:/views/error.php');
  }

  foreach($allCharaters as $character){
    if($character -> $lien == $_GET['id']){
        array_push($characters, $character);
    }
  }
?>
<div class="uk-container uk-margin-top uk-margin-bottom" style="position: relative;">
  <nav aria-label="Fil d'Ariane">
    <ul class="uk-breadcrumb">
      <li><a href="../../index.php">Accueil</a></li>
      <li><a href="../<?=$page?>s/<?=$page?>s.php"><?=$nom?></a></li>
      <li><a href="../<?=$page?>s/<?=$page?>Detail.php?id=<?=$source->id?>"><?=$source->title?></a></li>
      <li><span>Personnages</span></li>
    </ul>
  </nav>
</div>
<div class="uk-margin-top uk-margin-large-left uk-margin-large-right uk-margin-bottom">
  <h1 class="uk-font uk-text-center">Personnages de <?=$source -> title?></h1>
    <div class="uk-grid-match uk-child-width-1-6@l uk-child-width-1-4@m uk-child-width-1-3@s uk-child-width-1-2 uk-flex uk-flex-center" uk-grid uk-height-match="target: .uk-card">
      <?php foreach($characters as $character) : ?>
        <div class="image-fond">
          <div class="uk-card uk-card-default uk-raduis contenu" style="position: relative;">
            <div class="image-crop">
              <img src="<?=$character->image_url ?>" alt="<?=$character->name ?>" width="100%" class="uk-raduis-img uk-img">
            </div>
            <div class="uk-margin-left uk-margin-right" style="margin-bottom: 70px;">
              <h2 class="uk-card-title uk-text-center uk-active uk-font"><?=$character->name ?></h2>
              <?php 
                $mots = explode(" ", $character->description);
                $text_grand = implode(" ", array_splice($mots, 0, 20));
                $mots = explode(" ", $character->description);
                $text_petit = implode(' ', array_slice($mots, 0, 10));
              ?>
              <p class="uk-text-center uk-visible@s uk-font"><?=$text_grand?> ...</p>
              <p class="uk-text-center uk-hidden@s uk-font"><?=$text_petit?> ...</p>
            </div>
            <a href="characterDetail.php?id=<?=$character->id ?>" class="uk-link-reset uk-position-bottom-center uk-margin-bottom">
              <button class="uk-button uk-button-default uk-raduis">Voir Plus</button>
            </a>
          </div>
        </div>
      <?php endforeach ?>
    </div>
</div>
<?php 
  require_once('../../app/footer.php')
?>