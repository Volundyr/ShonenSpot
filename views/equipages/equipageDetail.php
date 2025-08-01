<!-- Afficher le menu -->
<?php 
  $page = 'mangaDetail';
  require_once('../../app/header.php')
?>

<!-- Récuperer l'animé -->
<?php 
  if(!isset($_GET['id']) | $_GET['id'] == '' | !isset($_GET['idSource']) | $_GET['idSource'] == ''){
    header('Location:/views/error.php');
  }

  require_once('../../app/animeAPI.php');
  $source = getAnimeById($_GET['idSource']);
  $equipage = null;
  foreach($source -> equipages as $oneEquipage){
    if($oneEquipage -> id == $_GET['id']){
      $equipage = $oneEquipage;
    }
  }
?>


<!-- Contenu de la page -->
<div class="uk-container uk-margin-top uk-margin-bottom" style="position: relative;">
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
