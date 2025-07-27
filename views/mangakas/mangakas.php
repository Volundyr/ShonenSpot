<?php 
  $page = 'mangakas';
  require_once('../../app/header.php')
?>
<?php 
  require_once('../../app/animeAPI.php');
  $allAuthors = getAllAuthors();
  $authors = $allAuthors;
?>
<?php 
  if(isset($_POST["filter"])&&$_POST["search"] !== ""){
    $authors = [];
    $search = $_POST["search"];
    foreach($allAuthors as $author){

      if(strpos(strtolower($author -> name), strtolower($search)) !== false || $search == ""){
        array_push($authors, $author);
      }
    }
  }else{
    $authors = $allAuthors;
  }

?>
<?php 
  if(isset($_POST['delete'])){
    $_POST['search'] = "";
    $authors = $allAuthors;
  }
?>
<div class="uk-margin-left uk-margin-large-left uk-margin-large-right uk-margin-bottom">
  <h1 class="uk-font uk-text-center">Mangakas</h1>
  <form action="<?=$_SERVER['PHP_SELF']?>" method="post" class=" uk-margin-large-bottom">
    <div>
      <div class="uk-search uk-search-default uk-margin-small-bottom">
        <input class="uk-search-input uk-font uk-raduis uk-background-primary uk-border" type="text" name="search" placeholder="Barre de recherche" value="<?php if(isset($_POST["search"] ) && $_POST["search"] !== ""){echo $_POST["search"];}?>">
        <button type="submit" name="filter" class="uk-search-icon-flip " uk-search-icon style="color: black;"></button>
      </div>
      <?php if(isset($_POST["filter"]) && $_POST['search'] !== ""){?>
        <button type="submit" name="delete" class="uk-button-default uk-button uk-raduis">Supprimer le filtre</button>
      <?php } ?>
    </div>
  </form>
  <?php
    if($authors == []){
  ?>
  <?php if(isset($_POST['filter'])){ ?>
        <h2 class="uk-font uk-active uk-text-center">Désolé il n'y a pas de manga appelé <?=$_POST['search']?>.</h2>
  <?php 
      }else{
  ?>
        <h2 class="uk-font uk-active uk-text-center">Désolé nous avons un problème, veulliez recharger la page.</h2>
  <?php 
      }
    }else{
  ?>

    <div class="uk-grid-match uk-child-width-1-5@l uk-child-width-1-4@m uk-child-width-1-2@s uk-child-width-1-1 uk-flex uk-flex-center" uk-grid uk-height-match="target: .uk-card">
    <?php  foreach($authors as $author) :?>
      <div class="image-fond">
        <div class="contenu uk-card uk-card-default uk-raduis" style="position: relative;">
          <div class="image-crop">
            <img src="<?=$author->image_url?>" alt="<?=$author->name?>" class="uk-raduis-img uk-img" width="100%">
          </div>
          <div class="uk-margin-left uk-margin-right" style="margin-bottom: 70px;">
            <h2 class="uk-card-title uk-text-center uk-font uk-active"><?=$author->name ?></h2>
            <?php 
              $mots = explode(' ', $author->biography);
              $text_grand = implode(' ', array_slice($mots, 0, 20));
              $mots = explode(' ', $author->biography);
              $text_petit = implode(' ', array_slice($mots, 0, 10));
            ?>
            <p class="uk-text-center uk-visible@s uk-font"><?=$text_grand?> ...</p>
            <p class="uk-text-center uk-hidden@s uk-font"><?=$text_petit?> ...</p>
          </div>
          <a href="mangakaDetail.php?id=<?=$author->id?>" class="uk-link-reset uk-position-bottom-center uk-margin-bottom">
            <button class="uk-button-default uk-button uk-raduis">Voir plus</button>
          </a>
        </div>
      </div>
    <?php endforeach?>
  </div>
  <?php } ?>
</div>
<?php 
  require_once('../../app/footer.php')
?> 