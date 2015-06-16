define(function(require, exports, module) {

    exports.run = function() {

        $("body").on('click','.btn-submit',function(){
        	$("#approval_type").val($(this).data('role'));
        	$("#approval-form").submit();
        });

    };

});