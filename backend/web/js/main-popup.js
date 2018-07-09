/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {

    $(document).on('click', '.showModalButton', function () {
        if ($('#modal_user').modal('show')) {
            $('#modal_user').find('#modalContent_user')
                    .load($(this).attr('value'));
        } else {
            $('#modal_user').modal('show')
                    .find('#modalContent_user')
                    .load($(this).attr('value'));
        }
    });



    $(document).on('beforeSubmit', '#user_form', function (e) {
        var form = $(this);
        $.post()
//        var formData = form.serialize();
//        $.ajax({
//            url: form.attr("action"),
//            type: form.attr("method"),
//            data: formData,
//            success: function (data) {
//                alert('Test');
//            },
//            error: function () {
//                alert("Something went wrong");
//            }
//        });
    });


////get the click event of the create UC
//$('#modalButton_create_ucm').click(function () {
//    $('#modal_ucm').modal('show').find('#modalContent').load($(this).attr('value'));
//});
//
////get the click event of the create UC
//$('#modalButton_create_user').click(function () {
//    $('#modal_user').modal('show').find('#modalContent_user').load($(this).attr('value'));
//});
//
//$('#user_form').on('beforeSubmit', function () {
//alert('a');
//});
});