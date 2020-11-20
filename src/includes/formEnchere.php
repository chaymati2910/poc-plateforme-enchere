<div class="d-flex justify-content-center">
    <h2 class="mb-5 text-uppercase font-weight-bold">Ajout d'une enchère</h2>
</div>
    <form class="container-fluid w-100 d-flex justify-content-center align-items-center flex-column">
        <div class="d-flex justify-content-center align-items-center mb-3 items bg-light">
            <label class="labelForm" for="#description">Description :</label>
            <textarea class="form-control" id="description" maxlength="24" placeholder="24 caractères maximum" aria-label="With textarea"></textarea>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <label class="fileUpload d-flex justify-content-center align-items-center bg-light">
                Image upload 
                <input type="file" style="display: none;">
            </label>
        </div>
        <h3 class="mb-5 mt-4 d-flex justify-content-center text-center text-uppercase">Paramètres de l'enchère</h3>
        <div class="d-flex justify-content-center align-items-center mb-3 items bg-light">
            <label class="labelForm" for="#prix_lancement">Prix de lancement (€):</label>
            <input type="number" class="form-control" aria-label="Prix de lancement" id="prix_lancement" required aria-describedby="basic-addon1">
        </div>  
        <div class="d-flex justify-content-center align-items-center mb-3 items bg-light">
            <label class="labelForm" for="#duree">Durée (h):</label>
            <input type="number" class="form-control" aria-label="duree" placeholder="exemple: 48 h" id="duree" required aria-describedby="basic-addon1">
        </div>
        <div class="d-flex justify-content-center align-items-center mb-3 items bg-light">
            <label class="labelForm" for="#prix_clic">Prix du clic (cts):</label>
            <input type="number" class="form-control" placeholder="exemple: 30 cts" aria-label="prix_clic" id="prix_clic" required aria-describedby="basic-addon1" max="1" min="0" step="1">
        </div>
        <div class="d-flex justify-content-center align-items-center mb-3 items bg-light">
            <label class="labelForm" for="#augmentation_prix">Augmentation du prix (cts):</label>
            <input type="number" class="form-control" aria-label="augmentation_prix" placeholder="exemple: 2 cts" required id="augmentation_prix" aria-describedby="basic-addon1" max="0.99" min="0.00" step="0.05">
        </div>
        <div class="d-flex justify-content-center align-items-center mb-3 items bg-light">
            <label class="labelForm" for="#augmentation_duree">Augmentation durée (s):</label>
            <input type="number" class="form-control" aria-label="augmentation_duree" placeholder="exemple: 30 s" required id="augmentation_duree" aria-describedby="basic-addon1">
        </div>
        <div class="d-flex justify-content-center align-items-center">
        <button type="submit" class="btn btn-warning text-uppercase text-white font-weight-bold btnAjoutEnchere mb-5" style="width:220px;">Ajouter l'enchère</button>
</div>

    </form>


