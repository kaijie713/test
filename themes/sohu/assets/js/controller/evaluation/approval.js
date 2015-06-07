define(function(require, exports, module) {

    exports.run = function() {

        $("body").on('click','.btn-submit',function(){
        	$("#flag").val($(this).data('role'));
        	$("#evaluation-form").submit();
        });

    };

});