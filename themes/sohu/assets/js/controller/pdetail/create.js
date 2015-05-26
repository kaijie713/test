define(function(require, exports, module) {

    var Notify = require('common/bootstrap-notify');
    var Splitdetail = require("./splitdetail-modal");

    exports.run = function() {
        //mkwfc mkyfc cpswfc cpsyfc mkcps
        var chargeType = $('#charge_type').attr('id');
        require('./default-validator').run();

        if ($('#splitdetail-body').length > 0) {
            
            var creatorSplitdetail = new Splitdetail({
                element: '#splitdetail-body',
                validator: validator,
            });
        }
    }
});
