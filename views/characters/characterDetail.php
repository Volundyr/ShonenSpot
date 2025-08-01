<?php 
  $page = 'characterDetail';
  require_once('../../app/header.php')
?>
<?php 
  if(!isset($_GET['id']) | $_GET['id'] == ''){
    header('Location:/views/error.php');
  }

  require_once('../../app/animeAPI.php');
  $character = getCharacterById($_GET['id']);
  $allanimes = getAllAnimes();
  $allMangas = getAllMangas();
?>
<?php 
  $anime = null;
  if(isset($character -> anime_id)){
    foreach($allanimes as $oneAnime){
      if($oneAnime -> id == $character -> anime_id){
        $anime = $oneAnime;
      }
    }
  }
?>
<?php 
  $manga = null;
  if(isset($character -> manga_id)){
    foreach($allMangas as $oneManga){
      if($oneManga -> id == $character -> manga_id){
        $manga = $oneManga;
      }
    }
  }
?>
<?php 
  $equipage = null;
  if($manga != null && isset($manga -> equipages)){
    foreach($manga -> equipages as $oneEquipage){
      $theEquipage = $oneEquipage;
      foreach($oneEquipage -> membres as $membre){
        if($membre -> id == $character -> id){
          $equipage = $theEquipage;
        }
      }
    }
  }
?>

<div class="uk-container uk-margin-top uk-margin-bottom" style="position: relative;">
  <nav aria-label="Fil d'Ariane">
    <ul class="uk-breadcrumb">
      <li><a href="../../index.php">Accueil</a></li>
      <li><a href="../characters/characters.php">Personnages</a></li>
      <li><span><?=$character->name?></span></li>
    </ul>
  </nav>
  <a class="uk-position-top-right uk-margin-small-right" href="javascript:history.back()" uk-icon="icon: close; ratio: 2"></a>
  <h1 class="uk-text-center uk-font"><?=$character -> name ?></h1>
  <div class="uk-grid-match uk-flex uk-flex-center" uk-grid uk-height-match="target: .contenu" style="margin-top: 50px;">
      <!-- image  -->
    <div class="uk-width-1-4@m uk-width-1-2@s image-fond">
        <a uk-toggle="target: #cover">
          <img src="<?=$character -> image_url?>" alt="<?=$character -> name ?>" class="contenu uk-img uk-raduis uk-border uk-img-hover uk-img-center">
        </a>
    </div>
    <!-- Description -->
    <div class="uk-width-3-4@m uk-width-1-1 image-fond">
      <div class="uk-card uk-card-default contenu uk-raduis">
        <div class="uk-margin-left uk-margin-right uk-margin-bottom uk-margin-top">
          <h2 class="uk-font uk-active uk-text-center">Description</h2>
          <p class="uk-text-justify uk-font"><?=nl2br($character -> description )?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="uk-margin-large-top uk-margin-large-bottom image-fond">
    <div class="uk-card uk-card-default contenu uk-raduis">
      <div class="uk-margin-left uk-margin-right uk-margin-bottom uk-margin-top">
        <h2 class="uk-font uk-active uk-text-center">Habilité</h2>
        <p class="uk-text-justify uk-font"><?=nl2br($character -> abilities )?></p>
      </div>
    </div>
  </div>  
  <div class="uk-grid-match uk-flex uk-flex-center uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s uk-child-width-1-1" uk-grid uk-height-match="target: .uk-card">
    <div class="image-fond">
      <div class="uk-card uk-card-default contenu uk-raduis">
        <div class="uk-margin-top uk-margin-left uk-margin-bottom uk-margin-right">
          <h2 class="uk-card-title uk-text-center uk-active uk-font">Surnoms</h2>
          <table class="uk-table uk-table-divider">
              <?php foreach($character-> name_alternatif as $surnom): ?>
                <tr>
                  <th class="uk-font"><?=$surnom-> name ?></th>
                </tr>
              <?php endforeach ?>
          </table>
        </div>
      </div>
    </div>
    <div class="image-fond">
      <div class="uk-card uk-card-default contenu uk-raduis">
        <div class="uk-margin-top uk-margin-left uk-margin-bottom uk-margin-right">
          <h2 class="uk-card-title uk-text-center uk-active uk-font">Informations</h2>
          <table class="uk-table uk-table-divider">
              <tr>
                <th class="uk-font uk-table-title">Taille</th>
                <td class="uk-font "><?=$character -> height?></td>
              </tr>
              <tr>
                <th class="uk-font uk-table-title">Anniversaire</th>
                <td class="uk-font "><?=$character -> birth_date?></td>
              </tr>
              <tr>
                <th class="uk-font uk-table-title">Âge</th>
                <td class="uk-font"><?=$character -> age?></td>
              </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="image-fond">
      <div class="uk-card uk-card-default contenu uk-raduis">
        <div class="uk-margin-top uk-margin-left uk-margin-bottom uk-margin-right">
          <h2 class="uk-card-title uk-text-center uk-active uk-font">Doubleurs</h2>
          <table class="uk-table uk-table-divider">
              <tr>
                <th class="uk-font uk-table-title">Japonais</th>
                <td class="uk-font "><?=$character -> doubleur?></td>
              </tr>
              <tr>
                <th class="uk-font uk-table-title">Français</th>
                <td class="uk-font "><?=$character -> doubleur_vf?></td>
              </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="image-fond">
      <div class="uk-card uk-card-default contenu uk-raduis">
        <div class="uk-margin-top uk-margin-left uk-margin-bottom uk-margin-right">
          <h2 class="uk-card-title uk-text-center uk-active uk-font">Spoil</h2>
          <div class="uk-flex uk-flex-center">
            <a class="uk-button-default uk-button uk-raduis" uk-toggle="target: #spoil">Voir le spoil</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <h2 class="uk-text-center uk-font uk-active">Autres Informations</h2>
  <div class="uk-grid-match uk-child-width-1-4@l uk-child-width-1-4@m uk-child-width-1-2@s uk-child-width-1-1 uk-flex uk-flex-center" uk-grid uk-height-match="target: .uk-card">
    <?php if($anime != null) { ?>
      <div>
        <h3 class="uk-font uk-text-center">Animé</h3>
        <div class="image-fond">
          <div class="contenu uk-card uk-card-default uk-raduis" style="position: relative;">
            <div class="image-crop">
              <img src="<?=$anime->image_url?>" alt="<?=$anime->title?>" class="uk-raduis-img uk-img" width="100%">
            </div>
            <div class="uk-margin-left uk-margin-right" style="margin-bottom: 70px;">
              <h2 class="uk-card-title uk-text-center uk-font uk-active"><?=$anime->title ?></h2>
              <?php 
                $mots = explode(' ', $anime->synopsis);
                $text_grand = implode(' ', array_slice($mots, 0, 20));
                $mots = explode(' ', $anime->synopsis);
                $text_petit = implode(' ', array_slice($mots, 0, 10));
              ?>
              <p class="uk-text-center uk-visible@s uk-font"><?=$text_grand?> ...</p>
              <p class="uk-text-center uk-hidden@s uk-font"><?=$text_petit?> ...</p>
            </div>
            <a href="../animes/animeDetail.php?id=<?=$anime->id?>" class="uk-link-reset uk-position-bottom-center uk-margin-bottom">
              <button class="uk-button-default uk-button uk-raduis">Voir plus</button>
            </a>
          </div>
        </div> 
      </div>
    <?php } ?>

    <?php if($manga != null) { ?>
      <div>
        <h3 class="uk-font uk-text-center">Manga</h3>
        <div class="image-fond">
          <div class="contenu uk-card uk-card-default uk-raduis" style="position: relative;">
            <div class="image-crop">
              <img src="<?=$manga->image_url?>" alt="<?=$manga->title?>" class="uk-raduis-img uk-img" width="100%">
            </div>
            <div class="uk-margin-left uk-margin-right" style="margin-bottom: 70px;">
              <h2 class="uk-card-title uk-text-center uk-font uk-active"><?=$manga->title ?></h2>
              <?php 
                $mots = explode(' ', $manga->synopsis);
                $text_grand = implode(' ', array_slice($mots, 0, 20));
                $mots = explode(' ', $manga->synopsis);
                $text_petit = implode(' ', array_slice($mots, 0, 10));
              ?>
              <p class="uk-text-center uk-visible@s uk-font"><?=$text_grand?> ...</p>
              <p class="uk-text-center uk-hidden@s uk-font"><?=$text_petit?> ...</p>
            </div>
            <a href="../mangas/mangaDetail.php?id=<?=$manga->id?>" class="uk-link-reset uk-position-bottom-center uk-margin-bottom">
              <button class="uk-button-default uk-button uk-raduis">Voir plus</button>
            </a>
          </div>
        </div>
      </div>
    <?php } ?>
    <?php if($equipage != null) { ?>
      <div>
        <h3 class="uk-font uk-text-center">Equipage</h3>
        <div class="image-fond">
          <div class="uk-card uk-card-default uk-raduis contenu" style="position: relative;">
            <div class="image-crop">
              <img src="<?=$equipage->image ?>" alt="<?=$equipage->name ?>" width="100%" class="uk-raduis-img uk-img">
            </div>
            <div class="uk-margin-left uk-margin-right" style="margin-bottom: 70px;">
              <h2 class="uk-card-title uk-text-center uk-active uk-font"><?=$equipage->name ?></h2>
              <?php 
                $mots = explode(" ", $equipage->description);
                $text_grand = implode(" ", array_splice($mots, 0, 20));
                $mots = explode(" ", $equipage->description);
                $text_petit = implode(' ', array_slice($mots, 0, 10));
              ?>
              <p class="uk-text-center uk-visible@s uk-font"><?=$text_grand?> ...</p>
              <p class="uk-text-center uk-hidden@s uk-font"><?=$text_petit?> ...</p>
            </div>
            <a href="../equipages/equipageDetail.php?idSource=<?=$manga->id ?>&id=<?=$equipage-> id?>&source=Manga" class="uk-link-reset uk-position-bottom-center uk-margin-bottom">
              <button class="uk-button uk-button-default uk-raduis">Voir Plus</button>
            </a>
          </div>
        </div>
      </div>
    <?php } ?>

  </div>
</div>

<!-- Modal pour l'image -->
<div id="cover" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-background-primary">
    <a class="uk-position-top-right uk-margin-right uk-margin-left uk-margin-top uk-margin-bottom uk-modal-close" uk-icon="icon: close; ratio: 2"></a>
      <div class="uk-modal-title uk-flex-center uk-flex uk-margin-large-top uk-margin-bottom uk-margin-left uk-margin-right">
        <div class="image-fond">
          <img src="<?=$character -> image_url?>" alt="<?=$character->name?>" class="contenu uk-raduis uk-border ">
        </div>
      </div>
  </div>     
</div>

<!-- Modal pour le spoil -->
<div id="spoil" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-background-primary">
    <a class="uk-position-top-right uk-margin-right uk-margin-left uk-margin-top uk-margin-bottom uk-modal-close" uk-icon="icon: close; ratio: 2"></a>
    <h2 class="uk-modal-title uk-text-center uk-active uk-font"><?=$character -> spoil?></h2>
  </div>     
</div>
<?php 
  require_once('../../app/footer.php')
?>