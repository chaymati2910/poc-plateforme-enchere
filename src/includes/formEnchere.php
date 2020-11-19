<div class="d-flex justify-content-center">
    <h2 class="mb-5">Ajout d'une enchère</h2>
</div>
    <form class="container-fluid w-100">
        <div class="d-flex justify-content-center align-items-center mb-3 items">
            <label class="labelForm" for="#description">Description :</label>
            <textarea class="form-control" id="description" aria-label="With textarea"></textarea>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <input type="file" class="fileUpload d-flex justify-content-center" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
        </div>

        <h3 class="mb-5 mt-5 d-flex justify-content-center text-center">Paramètres de l'enchère</h3>

        <div class="d-flex justify-content-center align-items-center mb-3 items">
            <label class="labelForm" for="#prix_lancement">Prix de lancement :</label>
            <input type="number" class="form-control" aria-label="Prix de lancement" id="prix_lancement" aria-describedby="basic-addon1">
        </div>  
        <div class="d-flex justify-content-center align-items-center mb-3 items">
            <label class="labelForm" for="#duree">Durée :</label>
            <input type="number" class="form-control" aria-label="duree" id="duree" aria-describedby="basic-addon1">
        </div>
        <div class="d-flex justify-content-center align-items-center mb-3 items">
            <label class="labelForm" for="#prix_clic">Prix du clic :</label>
            <input type="number" class="form-control" aria-label="prix_clic" id="prix_clic" aria-describedby="basic-addon1">
        </div>
        <div class="d-flex justify-content-center align-items-center mb-3 items">
            <label class="labelForm" for="#augmentation_prix">Augmentation du prix :</label>
            <input type="number" class="form-control" aria-label="augmentation_prix" id="augmentation_prix" aria-describedby="basic-addon1">
        </div>
        <div class="d-flex justify-content-center align-items-center mb-3 items">
            <label class="labelForm" for="#augmentation_duree">Augmentation durée :</label>
            <input type="number" class="form-control" aria-label="augmentation_duree" id="augmentation_duree" aria-describedby="basic-addon1">
        </div>
        <div class="d-flex justify-content-center align-items-center">
        <button type="submit" class="btn btn-warning" style="width:200px;">Ajouter l'enchère</button>
</div>

    </form>


