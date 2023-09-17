document.addEventListener('DOMContentLoaded', function () {
    const priceSlider = document.getElementById('priceSlider');
    const mileageSlider = document.getElementById('mileageSlider');
    const yearSlider = document.getElementById('yearSlider');
    const carList = document.getElementById('carList');

    function updateCarList() {
        const priceValue = parseFloat(priceSlider.value);
        const mileageValue = parseFloat(mileageSlider.value);
        const yearValue = parseFloat(yearSlider.value);

        const cars = Array.from(carList.children);

        cars.forEach(function (car) {
            const carPrice = parseFloat(car.getAttribute('data-price'));
            const carMileage = parseFloat(car.getAttribute('data-mileage'));
            const carYear = parseFloat(car.getAttribute('data-year'));

            if (
                carPrice <= priceValue &&
                carMileage <= mileageValue &&
                carYear >= yearValue
            ) {
                car.style.display = 'block';
            } else {
                car.style.display = 'none';
            }
        });
    }

    priceSlider.addEventListener('input', updateCarList);
    mileageSlider.addEventListener('input', updateCarList);
    yearSlider.addEventListener('input', updateCarList);
});
