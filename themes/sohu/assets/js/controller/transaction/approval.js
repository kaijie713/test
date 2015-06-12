define(function(require, exports, module) {

    exports.run = function() {

        $("body").on('click','.btn-submit',function(){
        	$("#estate").val($(this).data('role'));
        	$("#approval-form").submit();
        });

    };

});