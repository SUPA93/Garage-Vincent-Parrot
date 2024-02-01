<!-- FILTER USEDCARS FORM -->
<form method="GET" id="filterForm" class="form-control p-1">
    <div class="row justify-content-center ">
        <div class="col-md-6">
            <label for="price">Prix :</label>
            <div id="price-slider" class="mb-1"></div>
            <input type="hidden" id="priceMin" name="priceMin" value="<?= htmlspecialchars($priceMin) ?>">
            <input type="hidden" id="priceMax" name="priceMax" value="<?= htmlentities($priceMax) ?>">
            <div id="price-values"></div>
            <hr class="divider">
        </div>
    </div>
    <br>
    <div class="row justify-content-center ">
        <div class="col-md-6">
            <label for="kilometrage">Kilométrage :</label>
            <div id="kilometrage-slider" class="mb-1"></div>
            <input type="hidden" id="mileageMin" name="mileageMin" value="<?= htmlentities($mileageMin) ?>">
            <input type="hidden" id="mileageMax" name="mileageMax" value="<?= htmlentities($mileageMax) ?>">
            <div id="kilometrage-values"></div>
            <hr class="divider">
        </div>
    </div>
    <br>
    <div class="row justify-content-center ">
        <div class="col-md-6">
            <label for="annee">Années :</label>
            <div id="annee-slider" class="mb-1"></div>
            <input type="hidden" id="yearMin" name="yearMin" value="<?= htmlentities($yearMin) ?>">
            <input type="hidden" id="yearMax" name="yearMax" value="<?= htmlentities($yearMax) ?>">
            <div id="annee-values"></div>
            <hr class="divider">
        </div>
    </div>
    <br>
</form>
<!-- 
<form id="filterForm" class="inscription">
    <div class="row justify-content-center ">
        <div class="col-md-6">
            <button type="submit" class="btn btn-warning m-0" name="reset" value="true">Réinitialiser</button>
        </div>
    </div>
    <label for="sortBy">Trier par :</label>
    <select id="sortBy" name="sortBy">
        <option value="year-asc">Année croissante</option>
        <option value="year-desc">Année décroissante</option>
        <option value="mileage-asc">Kilométrage croissant</option>
        <option value="mileage-desc">Kilométrage décroissant</option>
        <option value="price-asc">Prix croissant</option>
        <option value="price-desc">Prix décroissant</option>
        <option value="date-desc">Plus récent</option>
        <option value="date-asc">Moins récent</option>
    </select>
</form> -->