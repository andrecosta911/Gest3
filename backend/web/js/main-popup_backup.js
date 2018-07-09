/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(
        function () {
            //get the click event of the create UC
            $('#modalButton_create_ucm').click(function () {
                $('#modal_ucm').modal('show').find('#modalContent').load($(this).attr('value'));
            });

            //get the click event of the create UC
            $('#modalButton_create_user').click(function () {
                $('#modal_uc').modal('show').find('#modalContent_uc').load($(this).attr('value'));
            });
            
            $('#user_form').on('beforeSubmit', function () {
                alert('a');
            });
//            $('#user_form').on('beforeSubmit', function (e) {
//                var $form = $(this);
//                $.post(
//                        $form.attr("action"),
//                        $form.serialize()
//                        ).done(function (result) {
//                    if (result.message == 'Success') {
//                        $(document).find('#secondModal').modal('hide');
//                        $.pajax.reload({container: '#comodity.grid'});
//                    } else {
//                        $.form.trigger("reset");
//                        $("#message").html(result.message);
//                    }
//                }).fail(function () {
//                    console.log("server error");
//                });
//                return false;q
//            });
//
        }             
);