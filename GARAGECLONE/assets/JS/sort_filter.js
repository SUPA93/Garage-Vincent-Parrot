/* document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('sortBy').addEventListener('change', function (event) {
        event.preventDefault();

        const sortBy = event.target.value;

        fetch(`occasion_sort.php?sortBy=${sortBy}`)
            .then(response => response.text())
            .then(data => {
                const gridContainer = document.querySelector('.grid-container');
                gridContainer.innerHTML = data;
            })
            .catch(error => console.error('Erreur :', error));
    });
}); */
