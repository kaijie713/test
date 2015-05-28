define(function(require, exports, module) {

    var Notify = require('common/bootstrap-notify');
    var Splitdetail = require("./splitdetail-modal");
    var Calculator = require("./calculator");
    var Notify = require('common/bootstrap-notify');

    exports.run = function() {

        require('./default-validator').run();

        //mkwfc mkyfc cpswfc cpsyfc mkcps
        var chargeType = $('#charge_type').data('type');

        var isSplitdetail = $('#splitdetail-body').length > 0 ? 1 : 0;

        var creatorSplitdetail = new Splitdetail({
            element: '[data-role=pdetail-form]',
            validator: validator,
            isSplitdetail: isSplitdetail,
        });

        var inputCalculator = new Calculator({
            element: '[data-role=pdetail-form]',
            chargeType: chargeType,
        });

        validator.on('formValidated', function(error, msg, $form) {
            if (error) {
                return false;
            }

            if($('#charge_type').val() == ""){
                 Notify.danger('系统错误，请尝试重新打开此页面！');
                 return false;
            }

            $.post($form.attr('action'), $form.serialize(), function(response) {
                console.log(response);
                if (response.status) {
                    var input="<input type='hidden' name='Pdetail[pd_id][] value="+response.message+"'/>"; 
                    $("#evaluation-form").append(input);
                    $('[data-role=pdetail-form]').find("[data-dismiss=modal]").click();
                    
                    inputCalculator.onAddPdetail(response.message);
                } else {
                    alert('服务器错误!');
                }
            }, 'json');

            // $('#pdetail-create-btn').button('submiting').addClass('disabled');

            // validator.set('autoSubmit',true);
        });

    }
});
