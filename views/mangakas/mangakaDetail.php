<!-- Afficher le menu -->
<?php 
  $page = 'mangaDetail';
  require_once('../../app/header.php')
?>

<!-- Récuperer l'animé -->
<?php 
  if(!isset($_GET['id']) | $_GET['id'] == ''){
    header('Location:/views/error.php');
  }

  require_once('../../app/animeAPI.php');
  $author = getAuthorById($_GET['id']);
?>

<!-- Contenu de la page -->
<div class="uk-container uk-margin-top uk-margin-bottom" style="position: relative;">
  <nav aria-label="Fil d'Ariane">
    <ul class="uk-breadcrumb">
      <li><a href="../../index.php">Accueil</a></li>
      <li><a href="../mangakas/mangakas.php">Mangakas</a></li>
      <li><span><?=$author->name?></span></li>
    </ul>
  </nav>
  <!-- Lien pour revenir en arrière -->
  <a class="uk-position-top-right uk-margin-small-right" href="javascript:history.back()" uk-icon="icon: close; ratio: 2"></a>
  <!-- Nom de l'auteur -->
  <h1 class="uk-text-center uk-font"><?=$author->name?></h1>

  <!-- Image et description -->
  <div class="uk-grid-match uk-flex uk-flex-center" uk-grid uk-height-match="target: .contenu" style="margin-top: 50px;">
    <!-- image  -->
    <div class="uk-width-1-3@m uk-width-1-2@s image-fond">
      <a uk-toggle="target: #cover">
        <img src="<?=$author -> image_url?>" alt="<?=$author->name?>" class="contenu uk-img uk-raduis uk-border uk-img-hover">
      </a>
    </div>
    <!-- Description -->
    <div class="uk-width-2-3@m uk-width-1-1 image-fond">
      <div class="uk-card uk-card-default contenu uk-raduis">
        <div class="uk-margin-left uk-margin-right uk-margin-bottom uk-margin-top">
          <h2 class="uk-font uk-active uk-text-center">Résumé</h2>
          <p class="uk-text-justify uk-font"><?=nl2br($author -> resume)?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="image-fond uk-margin-large-top">
    <div class="uk-card uk-card-default contenu uk-raduis">
      <div class="uk-margin-left uk-margin-right uk-margin-bottom uk-margin-top">
        <h2 class="uk-font uk-active uk-text-center">Debut</h2>
        <p class="uk-text-justify uk-font"><?=nl2br($author -> debut)?></p>
      </div>
    </div>
  </div>
  <div class="image-fond uk-margin-large-top">
    <div class="uk-card uk-card-default contenu uk-raduis">
      <div class="uk-margin-left uk-margin-right uk-margin-bottom uk-margin-top">
        <h2 class="uk-font uk-active uk-text-center">Carrière Professionelle</h2>
        <p class="uk-text-justify uk-font"><?=nl2br($author -> profession)?></p>
      </div>
    </div>
  </div>
  <div class="uk-grid-match uk-flex uk-flex-center uk-margin-large-top" uk-grid uk-height-match="target: .contenu">
    <div class="image-fond uk-width-2-3@m uk-width-1-1">
      <div class="uk-card uk-card-default contenu uk-raduis">
        <div class="uk-margin-left uk-margin-right uk-margin-bottom uk-margin-top">
          <h2 class="uk-font uk-active uk-text-center">Biographie</h2>
          <p class="uk-text-justify uk-font"><?=nl2br($author -> biography)?></p>
        </div>
      </div>
    </div>
    <div class="image-fond uk-width-1-3@m uk-width-1-2@s">
      <div class="uk-card uk-card-default contenu uk-raduis">
        <div class="uk-margin-top uk-margin-left uk-margin-bottom uk-margin-right">
          <h2 class="uk-text-center uk-active uk-font">Informations</h2>
          <table class="uk-table uk-table-divider">
            <tr>
              <th class="uk-font uk-table-title">Date de naissance</th>
              <td class="uk-font"><?=$author -> birth_date?></td>
            </tr>
            <tr>
              <th class="uk-font uk-table-title">Âge</th>
              <td class="uk-font"><?=$author -> age?></td>
            </tr>
            <tr>
              <th class="uk-font uk-table-title">Nationalité</th>
              <td class="uk-font"><?=$author -> nationalite?></td>
            </tr>
            <tr>
              <th class="uk-font uk-table-title">Ville de naissance</th>
              <td class="uk-font"><?=$author -> city?></td>
            </tr>
            <tr>
              <th class="uk-font uk-table-title">Nombre d'oeuvre</th>
              <td class="uk-font"><?=$author -> nbr_oeuvres?></td>
            </tr>
          </table>
        </div>
      </div> 
    </div>
  </div>
  <h2 class="uk-text-center uk-font uk-active">Autres Informations</h2>
  <div class="uk-grid-match uk-child-width-1-4@l uk-child-width-1-4@m uk-child-width-1-2@s uk-child-width-1-1 uk-flex uk-flex-center " uk-grid uk-height-match="target: .uk-card">
    <div>
      <h3 class="uk-font uk-text-center">Oeuvres</h3>
      <div class="image-fond">
        <div  class="contenu uk-card uk-card-default uk-raduis ">
          <div class="image-crop">
            <img src="../../assets/img/mangas.png" alt="logo pour les mangas" class="uk-raduis-img" width="100%">
          </div>
          <div class="uk-margin-left uk-margin-right uk-margin-bottom">
            <h2 class="uk-card-title uk-text-center uk-font uk-active">Manga</h2>
            <p class="uk-text-center  uk-font">Plongez au cœur de l’univers de <?=$author -> name?> et découvrez tous ses oeuvres emblématiques.</p>
            <div class="uk-flex uk-flex-center">
              <a href="../mangas/mangasByAuthor.php?id=<?=$author -> id?>" class="uk-button-default uk-button uk-raduis">Voir plus</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 

<!-- Modal pour la photo -->
<div id="cover" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-background-primary">
    <a class="uk-position-top-right uk-margin-right uk-margin-left uk-margin-top uk-margin-bottom uk-modal-close" uk-icon="icon: close; ratio: 2"></a>
      <div class="uk-modal-title uk-flex-center uk-flex uk-margin-large-top uk-margin-bottom uk-margin-left uk-margin-right">
        <div class="image-fond">
          <img src="<?=$author -> image_url?>" alt="<?=$author->name?>" class="contenu uk-raduis uk-border ">
        </div>
      </div>
  </div>     
</div>


<?php 
  require_once('../../app/footer.php')
?>