<div class="d-grid gap-2 col-6 mx-auto">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Ajouter une photo </button>
</div>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ajouter une photo dans la galerie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if ((include_once('espaceAjoutPhotos.php'))==1) :?>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
$liste = $data["liste"];
$liste2 = $data["liste2"];

if ((!empty($liste) || !empty($liste2)) ): ?>


    <section class="gallery min-vh-100">

        <div class="container-lg">
            <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-4">
                <?php foreach ( $liste as $elements) : ?>
                    <?php if ($elements['photo']!=NULL) :?>
                        <div class="col">
                            <img  id="photoMatchsConsultation" src="./Vue/Affichage/Images/<?= $elements['photo'] ?>" class="gallery-item" alt="gallery">
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

                <?php foreach ( $liste2 as $elements) : ?>
                    <?php if ($elements['photo']!=NULL) :?>

                        <div class="col">
                            <img  id="photoMatchsConsultation" src="./Vue/Affichage/Images/<?= $elements['photo'] ?>" class="gallery-item" alt="gallery">
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img  id="photoMatchsConsultation" src="./Vue/Affichage/Images/<?= $elements['photo'] ?>" class="modal-img" alt="modal img">
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-warning mt-5">Il y a actuellement aucune photos, soyez le premier à en ajouter</div>
<?php endif; ?>
