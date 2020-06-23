$('.open-modal').click(function (event) {
    event.preventDefault();
    $.ajax({
        url: $(this).data('path'),
        success: function (response) {
            $('#get-page').html(response);
            $('#open-modal-page').modal('show');
        }
    });
    return false;
});