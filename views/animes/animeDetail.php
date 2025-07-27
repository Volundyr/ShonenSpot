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
  $anime = getAnimeById($_GET['id']);
  $allMangas = getAllMangas();
  $allFilms = getAllFilms();
?>
<?php 
  $manga = null;
  if($anime -> manga_id != null){
    foreach($allMangas as $oneManga){
      if($oneManga -> id == $anime -> manga_id){
        $manga = $oneManga;
      }
    }
  }
?>
<?php 
  $nbrFilms = 0;
  foreach($allFilms as $film){
    if($film -> anime_id == $anime -> id){
      $nbrFilms ++;
    }
  }
?>
<!-- Contenu de la page -->
<div class="uk-container uk-margin-top uk-margin-bottom" style="position: relative;">
  <nav aria-label="Fil d'Ariane">
    <ul class="uk-breadcrumb">
      <li><a href="../../index.php">Accueil</a></li>
      <li><a href="../animes/animes.php">Animés</a></li>
      <li><span><?=$anime->title?></span></li>
    </ul>
  </nav>
  <!-- Lien pour revenir en arrière -->
  <a class="uk-position-top-right uk-margin-small-right" href="javascript:history.back()" uk-icon="icon: close; ratio: 2"></a>
  <!-- Titre de l'anime -->
  <h1 class="uk-text-center uk-font"><?=$anime->title?></h1>

  <!-- Image et description -->
  <div class="uk-grid-match uk-flex uk-flex-center" uk-grid uk-height-match="target: .contenu" style="margin-top: 50px;">
    <!-- image  -->
    <div class="uk-width-1-3@m uk-width-1-2@s image-fond">
        <a uk-toggle="target: #cover">
          <img src="<?=$anime -> image_url?>" alt="<?=$anime->title?>" class="contenu uk-img uk-raduis uk-border uk-img-hover">
        </a>
    </div>
    <!-- Description -->
    <div class="uk-width-2-3@m uk-width-1-1 image-fond">
      <div class="uk-card uk-card-default contenu uk-raduis">
        <div class="uk-margin-left uk-margin-right uk-margin-bottom uk-margin-top">
          <h2 class="uk-font uk-active uk-text-center">Description</h2>
          <p class="uk-text-justify uk-font"><?=nl2br($anime -> synopsis )?></p>
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
                <td class="uk-font"><?=$anime -> titles -> fr?></td>
              </tr>
              <tr>
                <th class="uk-font uk-table-title">Anglais</th>
                <td class="uk-font"><?=$anime -> titles -> eng?></td>
              </tr>
              <tr>
                <th class="uk-font uk-table-title">Original</th>
                <td class="uk-font"><?=$anime -> titles -> jp?></td>
              </tr>
              <tr>
                <th class="uk-font uk-table-title">Japonais</th>
                <td class="uk-font"><?=$anime -> titles -> sy?></td>
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
              <?php foreach($anime-> genres as $genre): ?>
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
                <th class="uk-font uk-table-title">Nbrs d'épisodes</th>
                <td class="uk-font "><?=$anime -> episodes?></td>
              </tr>
              <tr>
                <th class="uk-font uk-table-title">Nbrs de saisons</th>
                <td class="uk-font "><?=$anime -> seasons?></td>
              </tr>
              <tr>
                <th class="uk-font uk-table-title">Status</th>
                <td class="uk-font"><?=$anime -> status?></td>
              </tr>
              <tr>
                <th class="uk-font uk-table-title">Durée de l'épisodes</th>
                <td class="uk-font"><?=$anime -> length?></td>
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
                <td class="uk-font"><?=$anime -> aired?></td>
              </tr>
              <tr>
                <th class="uk-font uk-table-title">Source</th>
                <td class="uk-font"><?=$anime -> source?></td>
              </tr>
              <tr>
                <th class="uk-font uk-table-title">Studio</th>
                <td class="uk-font"><?=$anime -> studio?></td>
              </tr>
          </table>
        </div>
      </div>
    </div>

    <!-- Statistique -->
    <div class="image-fond">
      <div class="uk-card uk-card-default contenu uk-raduis">
        <div class="uk-margin-top uk-margin-left uk-margin-bottom uk-margin-right">
          <h2 class="uk-card-title uk-text-center uk-active uk-font">Statistique</h2>
          <table class="uk-table uk-table-middle uk-table-divider">
              <tr>
                <th class="uk-font uk-table-title">Classement</th>
                <td class="uk-font"><?=$anime -> rating?></td>
              </tr>
              <tr>
                <th class="uk-font uk-table-title">Score</th>
                <td class="uk-font"><?=$anime -> score?></td>
              </tr>
          </table>
        </div>
      </div>
    </div>

    <!-- Bande d'annonce  -->
    <div class="image-fond">
      <div class="uk-card uk-card-default contenu uk-raduis">
        <div class="uk-margin-top uk-margin-left uk-margin-bottom uk-margin-right">
          <h2 class="uk-card-title uk-text-center uk-active uk-font">Bande d'annonce</h2>
          <div class="uk-flex uk-flex-center">
            <a class="uk-button-default uk-button uk-raduis" uk-toggle="target: #trailer">Voir la bande d'annonce</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Spoil -->
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
  <h2 class="uk-text-center uk-active uk-font">Autres Informations</h2>
  <div class="uk-grid-match uk-child-width-1-4@l uk-child-width-1-4@m uk-child-width-1-2@s uk-child-width-1-1 uk-flex uk-flex-center" uk-grid uk-height-match="target: .uk-card">
    <div>
      <h3 class="uk-font uk-text-center">Personnages</h3>
      <div class="image-fond">
        <div class="contenu uk-card uk-card-default uk-raduis" style="position: relative;">
          <div class="image-crop">
            <img src="../../assets/img/mangas.png" alt="logo pour les mangas" class="uk-raduis-img uk-img" width="100%">
          </div>
          <div class="uk-margin-left uk-margin-right" style="margin-bottom: 70px;">
            <h2 class="uk-card-title uk-text-center uk-font uk-active">Personnage</h2>
            <p class="uk-text-center uk-font">Plongez au cœur de l’univers de <?=$anime->title?> et découvrez tous ses personnages emblématiques.</p>
          </div>
          <a href="../characters/charactersByAnime.php?id=<?=$anime->id?>" class="uk-link-reset uk-position-bottom-center uk-margin-bottom">
            <button class="uk-button-default uk-button uk-raduis">Voir plus</button>
          </a>
        </div>
      </div>
    </div>
    <?php if(isset($anime -> equipages)){?>
      <div>
        <h3 class="uk-font uk-text-center">Equipages</h3>
        <div class="image-fond">
          <div class="contenu uk-card uk-card-default uk-raduis" style="position: relative;">
            <div class="image-crop">
              <img src="../../assets/img/equipages.png" alt="logo pour les équipages" class="uk-raduis-img uk-img" width="100%">
            </div>
            <div class="uk-margin-left uk-margin-right" style="margin-bottom: 70px;">
              <h2 class="uk-card-title uk-text-center uk-font uk-active">Equipages</h2>
              <p class="uk-text-center uk-font">Plongez au cœur de l’univers de <?=$anime->title?> et découvrez tous ses équipages emblématiques.</p>
            </div>
            <a href="../equipages/equipages.php?id=<?=$anime->id?>" class="uk-link-reset uk-position-bottom-center uk-margin-bottom">
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
            <p class="uk-text-center uk-font">Plongez au cœur de l’univers de <?=$anime->title?> et découvrez tous ses films d’animation incontournables.</p>
          </div>
          <a href="../films/filmsByAnime.php?id=<?=$anime->id?>" class="uk-link-reset uk-position-bottom-center uk-margin-bottom">
            <button class="uk-button-default uk-button uk-raduis">Voir plus</button>
          </a>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php if($manga != null){?>
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
    <?php }?>
  </div>
</div>

<!-- Modal pour la couverture -->
<div id="cover" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-background-primary">
    <a class="uk-position-top-right uk-margin-right uk-margin-left uk-margin-top uk-margin-bottom uk-modal-close" uk-icon="icon: close; ratio: 2"></a>
      <div class="uk-modal-title uk-flex-center uk-flex uk-margin-large-top uk-margin-bottom uk-margin-left uk-margin-right">
        <div class="image-fond">
          <img src="<?=$anime -> image_url?>" alt="<?=$anime->title?>" class="contenu uk-raduis uk-border ">
        </div>
      </div>
  </div>     
</div>

<!-- Modal pour la bande d'annonce -->
<div id="trailer" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-background-primary">
    <a class="uk-position-top-right uk-margin-right uk-margin-left uk-margin-top uk-margin-bottom uk-modal-close" uk-icon="icon: close; ratio: 2"></a>
      <div class="uk-modal-title uk-flex-center uk-flex uk-margin-large-top uk-margin-bottom uk-margin-left uk-margin-right">
        <div class="image-fond">
          <video controls class="uk-raduis content">
            <source src="<?=$anime-> trailer?>" type="video/mp4">
            Votre navigateur ne supporte pas la balise vidéo.
          </video>
        </div>
      </div>
  </div>     
</div>

<!-- Modal pour le spoil -->
<div id="spoil" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-background-primary">
    <a class="uk-position-top-right uk-margin-right uk-margin-left uk-margin-top uk-margin-bottom uk-modal-close" uk-icon="icon: close; ratio: 2"></a>
    <h2 class="uk-modal-title uk-text-center uk-active uk-font"><?=$anime -> spoil?></h2>
  </div>     
</div>
<?php 
  require_once('../../app/footer.php')
?>