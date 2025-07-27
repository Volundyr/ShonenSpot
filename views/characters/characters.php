<?php 
  $page = 'characters';
  require_once('../../app/header.php')
?>
<?php 
  require_once('../../app/animeAPI.php');
  $allCharacters = getAllCharacters();
  $characters = $allCharacters;
  $animes = getAllAnimes();
  $mangas = getAllMangas();
  shuffle($characters);
?>
<?php 
  $oeuvres = [];

  foreach($animes as $anime){
    if(in_array($anime -> title, $oeuvres) == false){
        $id = "anime_" . $anime->id;
      $oeuvres[$id] = $anime -> title;
      }
  }
  foreach($mangas as $manga){
    if(in_array($manga -> title, $oeuvres) == false){
        $id = "manga_" . $manga->id;
        $oeuvres[$id] = $manga -> title;
      }
  }

?>
<?php 
  if(isset($_POST["filter"])&&($_POST["search"] !== "" || $_POST["oeuvres"] !== "")){
    $characters = [];
    $search = $_POST["search"];
    $oeuvre = $_POST["oeuvres"];
    foreach($allCharacters as $character){
      $searchOk = false;
      $oeuvreOk = false;
      
      if(strpos(strtolower($character -> name), strtolower($search)) !== false || $search == ""){
        $searchOk = true;
      }
      if ($oeuvre !== "") {
        [$type, $id] = explode("_", $oeuvre);
        if (
          ($type === "anime" && $character->anime_id == $id) ||
          ($type === "manga" && $character->manga_id == $id)
        ) {
          $oeuvreOk = true;
        }
      } else {
        $oeuvreOk = true;
      }
      if($searchOk && $oeuvreOk){
        array_push($characters, $character);
      }
    }
  }else{
    $characters = $allCharacters;
    shuffle($characters);
  }

?>
<?php 
  if(isset($_POST['delete'])){
    $_POST['search'] = "";
    $_POST["oeuvres"] = "";
    $character = $allCharacters;
    shuffle($characters);
  }
?>
<div class="uk-margin-top uk-margin-large-left uk-margin-large-right uk-margin-bottom">
  <h1 class="uk-font uk-text-center">Personnages</h1>

  <form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="uk-flex uk-flex-between uk-margin-large-bottom">

    <div>
      <div class="uk-search uk-search-default uk-margin-small-bottom">
        <input class="uk-search-input uk-font uk-raduis uk-background-primary uk-border" type="text" name="search" placeholder="Barre de recherche" value="<?php if(isset($_POST["search"] ) && $_POST["search"] !== ""){echo $_POST["search"];}?>">
        <button type="submit" name="filter" class="uk-search-icon-flip " uk-search-icon style="color: black;"></button>
      </div>
      <?php if(isset($_POST["filter"]) && ($_POST['search'] !== "" || $_POST['oeuvres'] !== "")){?>
        <button type="submit" name="delete" class="uk-button-default uk-button uk-raduis">Supprimer le filtre</button>
      <?php } ?>
    </div>
    <div class="uk-flex uk-flex-middle">
      <select name="oeuvres" class="uk-select uk-font uk-background-primary uk-border" style="border-radius: 15px 0px 0px 15px ;">
        <option value="" class="uk-font uk-background-primary">-- Choisir une oeuvre --</option>
        <?php foreach($oeuvres as $id => $title){?>
          <option value="<?=$id?>" <?php if(isset($_POST["oeuvres"]) && $_POST["oeuvres"] == $id){ echo "selected" ;}?> class="uk-font uk-background-primary"><?=$title?></option>
        <?php }?>
      </select>
      <button type="submit" name="filter" class="uk-button-default uk-button" style="border-radius: 0px 15px 15px 0px ;">Entrer</button>
    </div>

  </form>
  <?php
    if($characters == []){
      if(isset($_POST['filter'])){
        [$type, $id] = explode("_", $_POST['oeuvres']);

        if ($type === "anime") {
          foreach ($animes as $anime) {
            if ($anime->id == $id) {
              $oeuvre_name = " dans " . $anime->title;
              break;
            }
          }
        } elseif ($type === "manga") {
          foreach ($mangas as $manga) {
            if ($manga->id == $id) {
              $oeuvre_name = " dans " . $manga->title;
              break;
            }
          }
        }
  ?>
        <h2 class="uk-font uk-active uk-text-center">Désolé il n'y a pas de personnage nommé <?=$_POST['search']?><?=$oeuvre_name?>.</h2>
  <?php 
      }else{
  ?>
        <h2 class="uk-font uk-active uk-text-center">Désolé nous avons un problème, veulliez recharger la page.</h2>
  <?php 
      }
    }else{
  ?>
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
  <?php } ?>
</div>
<?php 
  require_once('../../app/footer.php')
?> 

