$(document).ready(function () {
    $('#filterForm').submit(function (e) {
        e.preventDefault(); 

        const sortBy = $('#sortBy').val();

        $.ajax({
            type: 'POST',
            url: 'occasion_sort.php', 
            data: { sortBy: sortBy },
            success: function (data) {
                
                $('.grid-item').html(data);
            }
        });
    });
});

