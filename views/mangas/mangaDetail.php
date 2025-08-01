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
  $manga = getMangaById($_GET['id']);
  $mangakas = getAllAuthors();
  $allFilms = getAllFilms();
?>
<?php 
  $mangaka = null;
  if($manga -> authors_id != null){
    foreach($mangakas as $oneMangaka){
      if($oneMangaka -> id == $manga -> authors_id){
        $mangaka = $oneMangaka;
      }
    }
  }
?>
<?php 
  $nbrFilms = 0;
  foreach($allFilms as $film){
    if(isset($film -> manga_id) && $film -> manga_id == $manga -> id){
      $nbrFilms ++;
    }
  }
?>

<!-- Contenu de la page -->
<div class="uk-container uk-margin-top uk-margin-bottom" style="position: relative;">
  <nav aria-label="Fil d'Ariane">
    <ul class="uk-breadcrumb">
      <li><a href="../../index.php">Accueil</a></li>
      <li><a href="../mangas/mangas.php">Mangas</a></li>
      <li><span><?=$manga->title?></span></li>
    </ul>
  </nav>
  <!-- Lien pour revenir en arrière -->
  <a class="uk-position-top-right uk-margin-small-right" href="javascript:history.back()" uk-icon="icon: close; ratio: 2"></a>
  <!-- Titre de l'anime -->
  <h1 class="uk-text-center uk-font"><?=$manga->title?></h1>

  <!-- Image et description -->
  <div class="uk-grid-match uk-flex uk-flex-center" uk-grid uk-height-match="target: .contenu" style="margin-top: 50px;">
    <!-- image  -->
    <div class="uk-width-1-3@m uk-width-1-2@s image-fond">
        <a uk-toggle="target: #cover">
          <img src="<?=$manga -> image_url?>" alt="<?=$manga->title?>" class="contenu uk-img uk-raduis uk-border uk-img-hover">
        </a>
    </div>
    <!-- Description -->
    <div class="uk-width-2-3@m uk-width-1-1 image-fond">
      <div class="uk-card uk-card-default contenu uk-raduis">
        <div class="uk-margin-left uk-margin-right uk-margin-bottom uk-margin-top">
          <h2 class="uk-font uk-active uk-text-center">Description</h2>
          <p class="uk-text-justify uk-font"><?=nl2br($manga -> synopsis )?></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Informations de l'anime -->
  <div class="uk-grid-match uk-flex uk-flex-center uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s uk-child-width-1-1" uk-grid uk-height-match="target: .uk-card">
    
    <!-- Titres -->
    <div class="image-fond">
      <div class="uk-card uk-card-default contenu uk-raduis">
        <div class="uk-margin-top uk-margin-left uk-margin-bottom uk-margin-right">
          <h2 class="uk-card-title uk-text-center uk-active uk-font">Titre</h2>
          <table class="uk-table uk-table-divider">
            <tr>
                <th class="uk-font uk-table-title">Français</th>
                <td class="uk-font"><?=$manga -> titles -> fr?></td>
              </tr>
              <tr>
                <th class="uk-font uk-table-title">Anglais</th>
                <td class="uk-font"><?=$manga -> titles -> eng?></td>
              </tr>
              <tr>
                <th class="uk-font uk-table-title">Original</th>
                <td class="uk-font"><?=$manga -> titles -> jp?></td>
              </tr>
              <tr>
                <th class="uk-font uk-table-title">Japonais</th>
                <td class="uk-font"><?=$manga -> titles -> sy?></td>
              </tr>
          </table>
        </div>
      </div>
    </div>  

    <!-- Genres -->
    <div class="image-fond">
      <div class="uk-card uk-card-default contenu uk-raduis">
        <div class="uk-margin-top uk-margin-left uk-margin-bottom uk-margin-right">
          <h2 class="uk-card-title uk-text-center uk-active uk-font">Genre</h2>
          <table class="uk-table uk-table-divider">
              <?php foreach($manga-> genres as $genre): ?>
                <tr>
                  <th class="uk-font"><?=$genre ?></th>
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
          <h2 class="uk-card-title uk-text-center uk-active uk-font">Progression</h2>
          <table class="uk-table uk-table-divider">
              <tr>
                <th class="uk-font uk-table-title">Nbrs de volumes</th>
                <td class="uk-font "><?=$manga -> tomes?></td>
              </tr>
              <tr>
                <th class="uk-font uk-table-title">Nbrs de chaptire</th>
                <td class="uk-font "><?=$manga -> chapter?></td>
              </tr>
              <tr>
                <th class="uk-font uk-table-title">Status</th>
                <td class="uk-font"><?=$manga -> status?></td>
              </tr>
          </table>
        </div>
      </div>
    </div>

    <!-- Origine  -->
    <div class="image-fond">
      <div class="uk-card uk-card-default contenu uk-raduis">
        <div class="uk-margin-top uk-margin-left uk-margin-bottom uk-margin-right">
          <h2 class="uk-card-title uk-text-center uk-active uk-font">Origine</h2>
          <table class="uk-table uk-table-middle uk-table-divider">
              <tr>
                <th class="uk-font uk-table-title">Date de diffusion</th>
                <td class="uk-font"><?=$manga -> aired?></td>
              </tr>
              <tr>
                <th class="uk-font uk-table-title">Type</th>
                <td class="uk-font"><?=$manga -> type?></td>
              </tr>
              <tr>
                <th class="uk-font uk-table-title">Sérialisation</th>
                <td class="uk-font"><?=$manga -> serialization?></td>
              </tr>
          </table>
        </div>
      </div>
    </div>

    <!-- Spoil  -->
    <div class="image-fond">
      <div class="uk-card uk-card-default contenu uk-raduis">
        <div class="uk-margin-top uk-margin-left uk-margin-bottom uk-margin-right">
          <h2 class="uk-card-title uk-text-center uk-active uk-font">Spoil</h2>
          <div class="uk-flex uk-flex-center">
            <a class="uk-button-default uk-button uk-raduis" uk-toggle="target: #spoil">Voir le Spoil</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <h2 class="uk-text-center uk-active uk-font">Autres Informations</h2>
  <div class="uk-grid-match uk-child-width-1-4@l uk-child-width-1-4@m uk-child-width-1-2@s uk-child-width-1-1 uk-flex uk-flex-center" uk-grid uk-height-match="target: .uk-card">
    <div>
      <h3 class="uk-font uk-text-center">Personnages</h3>
      <div class="image-fond">
        <div class="contenu uk-card uk-card-default uk-raduis" style="position: relative;">
          <div class="image-crop">
            <img src="../../assets/img/personnages.png" alt="logo pour les personnages" class="uk-raduis-img" width="100%">
          </div>
          <div class="uk-margin-left uk-margin-right" style="margin-bottom: 70px;">
            <h2 class="uk-card-title uk-text-center uk-font uk-active">Personnage</h2>
            <p class="uk-text-center uk-font">
              Plongez au cœur de l’univers de <?=$manga->title?> et découvrez tous ses personnages emblématiques.
            </p>
          </div>
          <a href="../characters/charactersBySource.php?id=<?=$manga->id?>&source=Manga" class="uk-link-reset uk-position-bottom-center uk-margin-bottom">
            <button class="uk-button-default uk-button uk-raduis">Voir plus</button>
          </a>
        </div>
      </div>
    </div>
    <?php if(isset($manga -> equipages)){?>
      <div>
        <h3 class="uk-font uk-text-center">Equipages</h3>
        <div class="image-fond">
          <div class="contenu uk-card uk-card-default uk-raduis" style="position: relative;">
            <div class="image-crop">
              <img src="../../assets/img/equipages.png" alt="logo pour les équipages" class="uk-raduis-img uk-img" width="100%">
            </div>
            <div class="uk-margin-left uk-margin-right" style="margin-bottom: 70px;">
              <h2 class="uk-card-title uk-text-center uk-font uk-active">Equipages</h2>
              <p class="uk-text-center uk-font">Plongez au cœur de l’univers de <?=$manga->title?> et découvrez tous ses équipages emblématiques.</p>
            </div>
            <a href="../equipages/equipagesBySource.php?id=<?=$manga->id?>&source=Manga" class="uk-link-reset uk-position-bottom-center uk-margin-bottom">
              <button class="uk-button-default uk-button uk-raduis">Voir plus</button>
            </a>
          </div>
        </div>
      </div>
    <?php }?>
    <?php if($nbrFilms != 0){ ?>
      <div>
      <h3 class="uk-font uk-text-center">Films</h3>
      <div class="image-fond">
        <div class="contenu uk-card uk-card-default uk-raduis" style="position: relative;">
          <div class="image-crop">
            <img src="../../assets/img/films.png" alt="logo pour les films" class="uk-raduis-img uk-img" width="100%">
          </div>
          <div class="uk-margin-left uk-margin-right" style="margin-bottom: 70px;">
            <h2 class="uk-card-title uk-text-center uk-font uk-active">Films</h2>
            <p class="uk-text-center uk-font">Plongez au cœur de l’univers de <?=$manga->title?> et découvrez tous ses films d’animation incontournables.</p>
          </div>
          <a href="../films/filmsBySource.php?id=<?=$manga->id?>&source=Manga" class="uk-link-reset uk-position-bottom-center uk-margin-bottom">
            <button class="uk-button-default uk-button uk-raduis">Voir plus</button>
          </a>
        </div>
      </div>
    </div>
    <?php } ?>            
    <div>
      <h3 class="uk-font uk-text-center">Mangakas</h3>
      <div class="image-fond">
        <div class="contenu uk-card uk-card-default uk-raduis" style="position: relative;">
          <div class="image-crop">
            <img src="<?=$mangaka->image_url?>" alt="<?=$mangaka->name?>" class="uk-raduis-img uk-img" width="100%">
          </div>
          <div class="uk-margin-left uk-margin-right" style="margin-bottom: 70px;">
            <h2 class="uk-card-title uk-text-center uk-font uk-active"><?=$mangaka->name ?></h2>
            <?php 
              $mots = explode(' ', $mangaka->biography);
              $text_grand = implode(' ', array_slice($mots, 0, 20));
              $text_petit = implode(' ', array_slice($mots, 0, 10));
            ?>
            <p class="uk-text-center uk-visible@s uk-font"><?=$text_grand?> ...</p>
            <p class="uk-text-center uk-hidden@s uk-font"><?=$text_petit?> ...</p>
          </div>
          <a href="../mangakas/mangakaDetail.php?id=<?=$mangaka->id?>" class="uk-link-reset uk-position-bottom-center uk-margin-bottom">
            <button class="uk-button-default uk-button uk-raduis">Voir plus</button>
          </a>
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
          <img src="<?=$manga -> image_url?>" alt="<?=$manga->title?>" class="contenu uk-raduis uk-border ">
        </div>
      </div>
  </div>     
</div>

<!-- Modal pour le spoil -->
<div id="spoil" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-background-primary">
    <a class="uk-position-top-right uk-margin-right uk-margin-left uk-margin-top uk-margin-bottom uk-modal-close" uk-icon="icon: close; ratio: 2"></a>
    <h2 class="uk-modal-title uk-text-center uk-active uk-font"><?=$manga -> spoil?></h2>
  </div>     
</div>

<?php 
  require_once('../../app/footer.php')
?>
