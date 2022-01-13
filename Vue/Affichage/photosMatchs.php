
<div class="container bg-primary">
    <div class="col-md-12 text-center">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Ajouter une photo </button>
    </div>
</div>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ajouter Une photo dans la gellery</h5>
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

if (!empty($liste) || !empty($liste2)): ?>


<section class="gallery min-vh-100">

        <div class="container-lg">

        <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-4">
            <?php foreach ( $liste as $elements) : ?>
                <div class="col">
                <img  id="photoMatchsConsultation" src="./Vue/Affichage/Images/<?= $elements['photo'] ?>" class="gallery-item" alt="gallery">
                </div>
            <?php endforeach; ?>
            <?php foreach ( $liste2 as $elements) : ?>
                <div class="col">
                    <img  id="photoMatchsConsultation" src="./Vue/Affichage/Images/<?= $elements['photo'] ?>" class="gallery-item" alt="gallery">
                </div>
            <?php endforeach; ?>
        </div>
        </div>
</section>

<!-- Modal -->
<div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img  id="photoMatchsConsultation" src="./Vue/Affichage/Images/<?= $elements['photo'] ?>" class="modal-img" alt="modal img">
            </div>
        </div>
    </div>
</div>

<?php else: ?>
<div class="alert alert-danger mt-5">il ya aucun photos !</div>
<?php endif; ?>