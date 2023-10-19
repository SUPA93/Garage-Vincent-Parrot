document.addEventListener('DOMContentLoaded', function () {
    function createDoubleHandleSlider(sliderElementId, minVal, maxVal, minDisplayId, maxDisplayId) {
        const slider = document.getElementById(sliderElementId);
        noUiSlider.create(slider, {
            start: [minVal, maxVal],
            connect: true,
            range: {
                'min': minVal,
                'max': maxVal,
            }
        });

        slider.noUiSlider.on('update', function (values, handle) {
            document.getElementById(handle === 0 ? minDisplayId : maxDisplayId).innerText = Math.round(values[handle]);
        });
    }

    createDoubleHandleSlider('price-slider', 0, 50000, 'priceMin', 'priceMax');
    createDoubleHandleSlider('mileage-slider', 0, 100000, 'mileageMin', 'mileageMax');
    createDoubleHandleSlider('year-slider', 1980, 2023, 'yearMin', 'yearMax');
});
document.querySelector('.filter-form').addEventListener('submit', function (event) {
    event.preventDefault();

    const brand = event.target.elements['brand'].value;
    const fuel_type = event.target.elements['fuel_type'].value;
    const price = document.getElementById('price-slider').noUiSlider.get();
    const mileage = document.getElementById('mileage-slider').noUiSlider.get();
    const year = document.getElementById('year-slider').noUiSlider.get();

    const queryParams = new URLSearchParams({
        brand: brand,
        fuel_type: fuel_type,
        price: price.join(','),
        mileage: mileage.join(','),
        year: year.join(',')
    });

    fetch(`fetch_vehicules.php?${queryParams.toString()}`, { method: 'GET', body: JSON.stringify() })
        .then(response => {
            return response.json()
        })
        .then((data) => {
            /* const gridContainer = document.querySelector('.grid-container');
            gridContainer.innerHTML = " "; */
            /* `$(".grid-container").html("");` is a jQuery code that sets the HTML content of the
            element with the class "grid-container" to an empty string. This effectively clears the
            content of the element, removing any existing grid items or other elements inside it. */
            $(".grid-container").html("");


            for (let dataItem of data) {
                console.log(dataItem);
                let html = `<div class="grid-item">
                <a href="occasion_detail.php?id= ${dataItem.id} " title="Plus de détails">
                    <img src= "${dataItem.pictures} " alt="Image du véhicule" href="occasion_detail.php?id=${dataItem.id} " title="Plus de détails" />
                </a>
                <h3> ${dataItem.brand} ${dataItem.model} </h3>
                <p>Année :  ${dataItem.year}</p>
                <p>Kilométrage :  ${dataItem.mileage}km</p>
                <p>Energie :  ${dataItem.fuel_type} </p>
                <p>Couleur :  ${dataItem.color}</p>
                <p>Prix:  ${dataItem.price}</p>
                <button class="btninscription"><a href="occasion_detail.php?id=${dataItem.id} " title="Cliquez pour voir plus de détails">Plus de détails</a></button>
            </div>`;
                $(".grid-container").append(html); // Ajout de l'élément à la grille
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
});