$(document).ready(function () {
    // Tri par défaut de la page
    /* const defaultSortBy = 'year-asc'; */

    $.ajax({
        type: 'POST',
        url: 'occasions.php', 
        data: { sortBy: defaultSortBy },
        success: function (data) {
            $('.grid-container').html(data);
        }
    });

    $('#filter_btn').click(function (e) {
        e.preventDefault();

        const sortBy = $('#sortBy').val();

        $.ajax({
            type: 'POST',
            url: 'occasions.php', 
            data: { sortBy: sortBy },
            success: function (data) {
                $('.grid-container').html(data);
            }
        });
    });
});


