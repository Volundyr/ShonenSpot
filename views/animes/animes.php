<?php 
  $page = 'animes';
  require_once('../../app/header.php')
?>
<?php 
  require_once('../../app/animeAPI.php');
  $allAnimes = getAllAnimes();
  $animes = $allAnimes;
?>
<?php
  $genres = [];

  foreach($animes as $anime){
    foreach($anime -> genres as $genre){
      if(in_array($genre, $genres) == false){
        array_push($genres,$genre);
      }
    }
  }
?>
<?php 
  if(isset($_POST["filter"])&&($_POST["search"] !== "" || $_POST["genres"] !== "")){
    $animes = [];
    $search = $_POST["search"];
    $genre = $_POST["genres"];
    foreach($allAnimes as $anime){
      $searchOk = false;
      $genreOk = false;

      if(strpos(strtolower($anime -> title), strtolower($search)) !== false || $search == ""){
        $searchOk = true;
      }
      if(in_array($genre, $anime -> genres)== True || $genre == ""){
          $genreOk = true;
      }
      if($searchOk && $genreOk){
        array_push($animes, $anime);
      }
    }
  }else{
    $animes = $allAnimes;
  }

?>
<?php 
  if(isset($_POST['delete'])){
    $_POST['search'] = "";
    $_POST["genres"] = "";
    $animes = $allAnimes;
  }
?>
<div class="uk-margin-left uk-margin-large-left uk-margin-large-right uk-margin-bottom">
  <h1 class="uk-font uk-text-center">Animés</h1>

  <form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="uk-flex uk-flex-between uk-margin-large-bottom">

    <div>
      <div class="uk-search uk-search-default uk-margin-small-bottom">
        <input class="uk-search-input uk-font uk-raduis uk-background-primary uk-border" type="text" name="search" placeholder="Barre de recherche" value="<?php if(isset($_POST["search"] ) && $_POST["search"] !== ""){echo $_POST["search"];}?>">
        <button type="submit" name="filter" class="uk-search-icon-flip " uk-search-icon style="color: black;"></button>
      </div>
      <?php if(isset($_POST["filter"]) && ($_POST['search'] !== "" || $_POST['genres'] !== "")){?>
        <button type="submit" name="delete" class="uk-button-default uk-button uk-raduis">Supprimer le filtre</button>
      <?php } ?>
    </div>
    <div class="uk-flex uk-flex-middle">
      <select name="genres" class="uk-select uk-font uk-background-primary uk-border" style="border-radius: 15px 0px 0px 15px ;">
        <option value="" class="uk-font uk-background-primary">-- Choisir un genre --</option>
        <?php foreach($genres as $genre){?>
          <option name="$genre" <?php if(isset($_POST["genres"]) && $_POST["genres"] == $genre){ echo "selected" ;}?> class="uk-font uk-background-primary"><?=$genre?></option>
        <?php }?>
      </select>
      <button type="submit" name="filter" class="uk-button-default uk-button" style="border-radius: 0px 15px 15px 0px ;">Entrer</button>
    </div>

  </form>
  <?php
    if($animes == []){
      $genre = "";
      if(isset($_POST['filter'])){
        if($_POST['genres'] !== ""){
          $genre = " dans le genre " . $_POST['genres'];
        }
  ?>
        <h2 class="uk-font uk-active uk-text-center">Désolé il n'y a pas d'animé appelé <?=$_POST['search']?><?=$genre?>.</h2>
  <?php 
      }else{
  ?>
        <h2 class="uk-font uk-active uk-text-center">Désolé nous avons un problème, veulliez recharger la page.</h2>
  <?php 
      }
    }else{
  ?>
    <div class="uk-grid-match uk-child-width-1-5@l uk-child-width-1-4@m uk-child-width-1-2@s uk-child-width-1-1 uk-flex uk-flex-center" uk-grid uk-height-match="target: .uk-card">
      <?php  foreach($animes as $anime) :?>
        <div class="image-fond">
          <div class="uk-card uk-card-default uk-raduis contenu" style="position: relative;">
            <div class="image-crop">
              <img src="<?=$anime->image_url ?>" alt="<?=$anime->title ?>" width="100%" class="uk-raduis-img uk-img">
            </div>
            <div class="uk-margin-left uk-margin-right" style="margin-bottom: 70px;">
              <h2 class="uk-card-title uk-text-center uk-active uk-font"><?=$anime->title ?></h2>
              <?php 
                $mots = explode(" ", $anime->synopsis);
                $text_grand = implode(" ", array_splice($mots, 0, 20));
                $mots = explode(" ", $anime->synopsis);
                $text_petit = implode(' ', array_slice($mots, 0, 10));
              ?>
              <p class="uk-text-center uk-visible@s uk-font"><?=$text_grand?> ...</p>
              <p class="uk-text-center uk-hidden@s uk-font"><?=$text_petit?> ...</p>
            </div>
            <a href="animeDetail.php?id=<?=$anime->id ?>" class="uk-link-reset uk-position-bottom-center uk-margin-bottom">
              <button class="uk-button uk-button-default uk-raduis">Voir Plus</button>
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