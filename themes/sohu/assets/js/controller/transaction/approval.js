define(function(require, exports, module) {
var Notify = require('common/bootstrap-notify');


    exports.run = function() {

        $("body").on('click','.btn-submit',function(){
        	$("#approval_type").val($(this).data('role'));

        	if($(this).data('role') == "-1"){

        		if($("#approval-content").length>0){
	        		if($("#approval-content").val() == "" || $("#approval-content").val() == null){
	        			 Notify.danger('审批意见必填!',3);
	        		}
        		}
        	}

        	$("#approval-form").submit();
        });

    };

});