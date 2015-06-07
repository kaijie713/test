define(function(require, exports, module) {

    var Notify = require('common/bootstrap-notify');
    var Splitdetail = require("./splitdetail-modal");
    var Calculator = require("./calculator");
    var Notify = require('common/bootstrap-notify');

    exports.run = function() {

        require('./validator').run();

        var chargeType = $('#charge_type').data('type');

        //合作明细
        var creatorSplitdetail = new Splitdetail({
            element: '[data-role=pdetail-form]',
            validator: validator,
        });

        //监视运算
        var inputCalculator = new Calculator({
            element: '[data-role=pdetail-form]',
        });

        validator.on('formValidated', function(error, msg, $form) {
            if (error) {
                return false;
            }

            inputCalculator.prepare();

            $.post($form.attr('action'), $form.serialize(), function(response) {
                // console.log(response);
                if (response.status) {

                    $('[data-role=pdetail-form]').find("[data-dismiss=modal]").click();
                    if($('#'+response.message).length>0){
                        $('#'+response.message).parents('tr').remove();
                    }
                    inputCalculator.onAddPdetail(response.message);
                    Notify.success('设置优惠明细成功！',3);
                } else {
                    alert('服务器错误!');
                }
            }, 'json');

            // $('#pdetail-create-btn').button('submiting').addClass('disabled');

            // validator.set('autoSubmit',true);
        });

    }
});
