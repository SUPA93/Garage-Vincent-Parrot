
$(function () {
    let sliderPrice = $("#price-slider");
    sliderPrice.slider({
        range: true,
        min: 0,
        max: 100000,
        values: [0, 100000],
        step: 1000,
        create: function () {
            let priceMin = sliderPrice.slider("values", 0);
            let priceMax = sliderPrice.slider("values", 1);
            $("#price-values").text(priceMin + " € " + " - " + priceMax + " € ");
        },
        slide: function (event, ui) {
            $("#priceMin").val(ui.values[0]);
            $("#priceMax").val(ui.values[1]);
            $("#price-values").text(ui.values[0] + " € " + " - " + ui.values[1] + " € ");
        },
    });
});

$(function () {
    let sliderKilometrage = $("#kilometrage-slider");
    sliderKilometrage.slider({
        range: true,
        min: 0,
        max: 150000,
        values: [0, 150000],
        step: 2500,
        create: function () {
            let mileageMin = sliderKilometrage.slider("values", 0);
            let mileageMax = sliderKilometrage.slider("values", 1);
            $("#kilometrage-values").text(mileageMin + " km " + " - " + mileageMax + " km ");
        },
        slide: function (event, ui) {
            $("#mileageMin").val(ui.values[0]);
            $("#mileageMax").val(ui.values[1]);
            $("#kilometrage-values").text(ui.values[0] + " km " + " - " + ui.values[1] + " km ");
        },
    });
});

$(function () {
    let sliderAnnee = $("#annee-slider");
    sliderAnnee.slider({
        range: true,
        min: 2000,
        max: 2023,
        values: [2000, 2023],
        step: 1,
        create: function () {
            let yearMin = sliderAnnee.slider("values", 0);
            let yearMax = sliderAnnee.slider("values", 1);
            $("#annee-values").text(yearMin + " " + " - " + yearMax + " ");
        },
        slide: function (event, ui) {
            $("#yearMin").val(ui.values[0]);
            $("#yearMax").val(ui.values[1]);
            $("#annee-values").text(ui.values[0] + " " + " - " + ui.values[1] + " ");
        },
    });
});

$('#filterForm').on('slidechange ', function () {

    let priceMin = document.getElementById('priceMin').value;
    let priceMax = document.getElementById('priceMax').value;
    let mileageMin = document.getElementById('mileageMin').value;
    let mileageMax = document.getElementById('mileageMax').value;
    let yearMin = document.getElementById('yearMin').value;
    let yearMax = document.getElementById('yearMax').value;

    const url = `../lib/carsFilter.php?priceMin=${priceMin}&priceMax=${priceMax}&mileageMin=${mileageMin}&mileageMax=${mileageMax}&yearMin=${yearMin}&yearMax=${yearMax}`;
    /* console.log("URL de la requête:", url); */
    fetch(url)
        .then(response => {
            console.log("Réponse brute:", response);
            if (!response.ok) {
                throw new Error(`Erreur HTTP ! statut: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log("Données reçues:", data);
            $(".grid-container").html("");
            for (car of data) {
                let html = `
                <div class="grid-item">
                    <a href="occasions_partial.php?id=${car.id}" title="Plus de détails">
                        <img src="${car.pictures}" alt="Image du véhicule" title="Plus de détails"/>
                    </a>
                    <h3>${car.brand} ${car.model}</h3>
                    <p>Année : ${car.year}</p>
                    <p>Kilométrage : ${car.mileage}km</p>
                    <p>Energie : ${car.fuel_type}</p>
                    <p>Couleur : ${car.color}</p>
                    <p>Prix: ${car.price}</p>
                    <button class="btn btn-primary">
                        <a href="occasions_partial.php?id=${car.id}" title="Cliquez pour voir plus de détails">Plus de détails</a>
                    </button>
                </div>`;
                $(".grid-container").append(html);
            }
        })
        .catch(error => {
            console.error('Erreur lors de la requête Fetch:', error);
        });

});
