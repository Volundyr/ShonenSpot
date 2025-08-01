<!-- Afficher le menu -->
<?php 
  $page = 'mangaDetail';
  require_once('../../app/header.php')
?>

<!-- Récuperer l'animé -->
<?php 
  if(!isset($_GET['id']) | $_GET['id'] == '' | !isset($_GET['idSource']) | $_GET['idSource'] == '' | !isset($_GET['source']) | $_GET['source'] == ''){
    header('Location:/views/error.php');
  }

  require_once('../../app/animeAPI.php');
  if($_GET['source'] == "Anime"){
    $source = getAnimeById($_GET['idSource']);
    $nom ="Animés";
    $page = "anime";
  }elseif($_GET['source'] == "Manga"){
    $source = getMangaById($_GET['idSource']);
    $nom = "Mangas";
    $page = 'manga';
  }else{
    header('Location:/views/error.php');
  }
  $equipage = null;
  foreach($source -> equipages as $oneEquipage){
    if($oneEquipage -> id == $_GET['id']){
      $equipage = $oneEquipage;
    }
  }
?>
<?php 
  $membres = [];
  foreach($equipage -> membres as $membre){
    $character = getCharacterById($membre -> id);
    array_push($membres, $character);
  }
?>
<!-- Contenu de la page -->
<div class="uk-container uk-margin-top uk-margin-bottom" style="position: relative;">
  <nav aria-label="Fil d'Ariane">
    <ul class="uk-breadcrumb">
      <li><a href="../../index.php">Accueil</a></li>
      <li><a href="../<?=$page?>s/<?=$page?>s.php"><?=$nom?></a></li>
      <li><a href="../<?=$page?>s/<?=$page?>Detail.php?id=<?=$source->id?>"><?=$source->title?></a></li>
      <li><a href="equipagesBySource.php?id=<?=$_GET['id']?>&source=<?=$_GET['source']?>">Equipages</a></li>
      <li><span><?=$equipage->name?></span></li>
    </ul>
  </nav>
  <!-- Lien pour revenir en arrière -->
  <a class="uk-position-top-right uk-margin-small-right" href="javascript:history.back()" uk-icon="icon: close; ratio: 2"></a>
  <!-- Titre de l'anime -->
  <h1 class="uk-text-center uk-font"><?=$equipage->name?></h1>

  <!-- Image et description -->
  <div class="uk-grid-match uk-flex uk-flex-center" uk-grid uk-height-match="target: .contenu" style="margin-top: 50px;">
    <!-- image  -->
    <div class="uk-width-1-3@m uk-width-1-2@s image-fond">
        <a uk-toggle="target: #cover">
          <img src="<?=$equipage -> image?>" alt="<?=$equipage->name?>" class="contenu uk-img uk-raduis  uk-img-hover">
        </a>
    </div>
    <!-- Description -->
    <div class="uk-width-2-3@m uk-width-1-1 image-fond">
      <div class="uk-card uk-card-default contenu uk-raduis">
        <div class="uk-margin-left uk-margin-right uk-margin-bottom uk-margin-top">
          <h2 class="uk-font uk-active uk-text-center">Description</h2>
          <p class="uk-text-justify uk-font"><?=nl2br($equipage -> description )?></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Informations de l'anime -->
  <div class="uk-grid-match uk-flex uk-flex-center uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s uk-child-width-1-1" uk-grid uk-height-match="target: .uk-card">

    <!-- Genres -->
    <div class="image-fond">
      <div class="uk-card uk-card-default contenu uk-raduis">
        <div class="uk-margin-top uk-margin-left uk-margin-bottom uk-margin-right">
          <h2 class="uk-card-title uk-text-center uk-active uk-font">Surnoms</h2>
          <table class="uk-table uk-table-divider">
              <?php foreach($equipage-> name_alternatif as $nom): ?>
                <tr>
                  <th class="uk-font"><?=$nom ?></th>
                </tr>
              <?php endforeach ?>
          </table>
        </div>
      </div>
    </div>

    <!-- Progression  -->
    <div class="image-fond">
      <div class="uk-card uk-card-default contenu uk-raduis">
        <div class="uk-margin-top uk-margin-left uk-margin-bottom uk-margin-right">
          <h2 class="uk-card-title uk-text-center uk-active uk-font">Informations</h2>
          <table class="uk-table uk-table-divider">
              <tr>
                <th class="uk-font uk-table-title">Status</th>
                <td class="uk-font "><?=$equipage -> status?></td>
              </tr>
              <tr>
                <th class="uk-font uk-table-title">Titre</th>
                <td class="uk-font "><?=$equipage -> niveau?></td>
              </tr>
              <tr>
                <th class="uk-font uk-table-title">En mer depuis</th>
                <td class="uk-font"><?=$equipage -> length?></td>
              </tr>
          </table>
        </div>
      </div>
    </div>

    <!-- Spoil  -->
    <div class="image-fond">
      <div class="uk-card uk-card-default contenu uk-raduis">
        <div class="uk-margin-top uk-margin-left uk-margin-bottom uk-margin-right">
          <h2 class="uk-card-title uk-text-center uk-active uk-font">Drapeau</h2>
          <div class="uk-flex uk-flex-center">
            <a class="uk-button-default uk-button uk-raduis" uk-toggle="target: #spoil">Voir le Drapeau</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <h2 class="uk-text-center uk-font uk-active">Membres</h2>
  <div class="uk-grid-match uk-child-width-1-4@l uk-child-width-1-4@m uk-child-width-1-2@s uk-flex uk-flex-center" uk-grid uk-height-match="target: .uk-card">
      <?php foreach($membres as $membre) : ?>
        <div class="image-fond">
          <div class="uk-card uk-card-default uk-raduis contenu" style="position: relative;">
            <div class="image-crop">
              <img src="<?=$membre->image_url ?>" alt="<?=$membre->name ?>" width="100%" class="uk-raduis-img uk-img">
            </div>
            <div class="uk-margin-left uk-margin-right" style="margin-bottom: 70px;">
              <h2 class="uk-card-title uk-text-center uk-active uk-font"><?=$membre->name ?></h2>
              <?php 
                $mots = explode(" ", $membre->description);
                $text_grand = implode(" ", array_splice($mots, 0, 20));
                $mots = explode(" ", $membre->description);
                $text_petit = implode(' ', array_slice($mots, 0, 10));
              ?>
              <p class="uk-text-center uk-visible@s uk-font"><?=$text_grand?> ...</p>
              <p class="uk-text-center uk-hidden@s uk-font"><?=$text_petit?> ...</p>
            </div>
            <a href="../characters/characterDetail.php?id=<?=$membre->id?>" class="uk-link-reset uk-position-bottom-center uk-margin-bottom">
              <button class="uk-button uk-button-default uk-raduis">Voir Plus</button>
            </a>
          </div>
        </div>
      <?php endforeach ?>             
</div>
<!-- Modal pour la couverture -->
<div id="cover" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-background-primary">
    <a class="uk-position-top-right uk-margin-right uk-margin-left uk-margin-top uk-margin-bottom uk-modal-close" uk-icon="icon: close; ratio: 2"></a>
      <div class="uk-modal-title uk-flex-center uk-flex uk-margin-large-top uk-margin-bottom uk-margin-left uk-margin-right">
        <div class="image-fond">
          <img src="<?=$equipage -> image?>" alt="<?=$equipage -> name?>" class="contenu">
        </div>
      </div>
  </div>     
</div>

<!-- Modal pour le spoil -->
<div id="spoil" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-background-primary">
    <a class="uk-position-top-right uk-margin-right uk-margin-left uk-margin-top uk-margin-bottom uk-modal-close" uk-icon="icon: close; ratio: 2"></a>
    <div class="uk-modal-title uk-flex-center uk-flex uk-margin-large-top uk-margin-bottom uk-margin-left uk-margin-right">
        <div class="image-fond">
          <img src="<?=$equipage -> flag?>" alt="<?=$equipage -> name?>" class="uk-raduis">
        </div>
      </div>
  </div>     
</div>

<?php 
  require_once('../../app/footer.php')
?>
