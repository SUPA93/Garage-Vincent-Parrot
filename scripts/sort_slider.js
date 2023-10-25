
$(function () {
    let sliderPrice = $("#price-slider");
    sliderPrice.slider({
        range: true,
        min: 0,
        max: 100000,
        values: [0, 100000],
        step: 1000,
        create: function () {
            let minPrice = sliderPrice.slider("values", 0);
            let maxPrice = sliderPrice.slider("values", 1);
            $("#price-values").text(minPrice + " € " + " - " + maxPrice + " € ");
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

$('#filterForm').on('slidechange ', function() {

    const priceMin = document.getElementById('priceMin').value;
    const priceMax = document.getElementById('priceMax').value;
    const mileageMin = document.getElementById('mileageMin').value;
    const mileageMax = document.getElementById('mileageMax').value;
    const yearMin = document.getElementById('yearMin').value;
    const yearMax = document.getElementById('yearMax').value;

    const url = `fetch_vehicules.php?priceMin=${priceMin}&priceMax=${priceMax}&mileageMin=${mileageMin}&mileageMax=${mileageMax}&yearMin=${yearMin}&yearMax=${yearMax}`;

    fetch(url)
    .then(response => response.json())
    .then(data => {
        let htmlString = "";
        data.forEach(car => {
            htmlString +=  `
                <div class="grid-item">
                    <a href="occasion_detail.php?id=${car.id}" title="Plus de détails">
                        <img src="${car.pictures}" alt="Image du véhicule" title="Plus de détails"/>
                    </a>
                    <h3>${car.brand} ${car.model}</h3>
                    <p>Année : ${car.year}</p>
                    <p>Kilométrage : ${car.mileage}km</p>
                    <p>Energie : ${car.fuel_type}</p>
                    <p>Couleur : ${car.color}</p>
                    <p>Prix: ${car.price}</p>
                    <button class="btn btn-primary">
                        <a href="occasion_detail.php?id=${car.id}" title="Cliquez pour voir plus de détails">Plus de détails</a>
                    </button>
                </div>`;
        });
        document.querySelector(".grid-container").innerHTML = htmlString;
    })
    .catch(error => {
        console.error('Erreur lors de la requête Fetch:', error);
    });
});

