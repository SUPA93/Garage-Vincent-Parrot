document.addEventListener('DOMContentLoaded', function () {
    function createDoubleHandleSlider(sliderElementId, minVal, maxVal, step, minDisplayId, maxDisplayId) {
        const slider = document.getElementById(sliderElementId);
        noUiSlider.create(slider, {
            start: [minVal, maxVal],
            connect: true,
            step: step,
            range: {
                'min': minVal,
                'max': maxVal,
            }
        });

        slider.noUiSlider.on('update', function (values, handle) {
            document.getElementById(handle === 0 ? minDisplayId : maxDisplayId).innerText = Math.round(values[handle]);
        });
    }
    createDoubleHandleSlider('price-slider', 1000, 50000, 1000, 'priceMin', 'priceMax');
    createDoubleHandleSlider('mileage-slider', 0, 100000, 5000, 'mileageMin', 'mileageMax');
    createDoubleHandleSlider('year-slider', 2000, 2023, 1, 'yearMin', 'yearMax');
});
document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('#filter_cars_button').addEventListener('click', function (event) {
        event.preventDefault();

        /* const brand = event.target.elements['brand'].value;
        const fuel_type = event.target.elements['fuel_type'].value; */
        const price = document.getElementById('price-slider').noUiSlider.get();
        const mileage = document.getElementById('mileage-slider').noUiSlider.get();
        const year = document.getElementById('year-slider').noUiSlider.get();

        const queryParams = new URLSearchParams({
            /* brand: brand,
            fuel_type: fuel_type, */
            price: price.join(','),
            mileage: mileage.join(','),
            year: year.join(',')
        });

        // ... (reste du code)

        fetch(`fetch_vehicules.php?${queryParams.toString()}`)
            .then(response => response.json())
            .then((data) => {
                $(".grid-container").html("");

                let htmlString = "";

                for (let dataItem of data) {
                    console.log(dataItem);
                    htmlString += `<div class="grid-item">
                <a href="occasion_detail.php?id= ${dataItem.id}" title="Plus de détails">
                    <img src= "${dataItem.pictures}" alt="Image du véhicule" href="occasion_detail.php?id=${dataItem.id}"title="Plus de détails"/>
                </a>
                <h3>${dataItem.brand} ${dataItem.model}</h3>
                <p>Année :  ${dataItem.year}</p>
                <p>Kilométrage :  ${dataItem.mileage}km</p>
                <p>Energie :  ${dataItem.fuel_type}</p>
                <p>Couleur :  ${dataItem.color}</p>
                <p>Prix:  ${dataItem.price}</p>
                <button class="btninscription"><a href="occasion_detail.php?id=${dataItem.id} " title="Cliquez pour voir plus de détails">Plus de détails</a></button>
            </div>`;
                }

                $(".grid-container").html(htmlString); // Ajoutez la chaîne complète en une seule fois
            })
            .catch(error => {
                console.error('Error:', error);
            });

    });
});