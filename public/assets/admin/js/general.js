$(document).ready(function () {
    $(document).on('click', '#update_image', function (e) {
        e.preventDefault();
        if (!$('#photo').length) {
            $("#oldImage").html('<input class="form-control" type="file" name="photo" id="photo">');
            $("#update_image").hide();
            $("#cancel_update_image").show();
        }
        return false;
    });


    $(document).on('click', '#cancel_update_image', function (e) {
        e.preventDefault();
        $("#oldImage").html('');
        $("#update_image").show();
        $("#cancel_update_image").hide();
        return false;
    });


});
