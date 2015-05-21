define(function(require, exports, module) {

    require("jquery.bootstrap-datetimepicker");
    var Validator = require('bootstrap.validator');
    require('common/validator-rules').inject(Validator);
    var Notify = require('common/bootstrap-notify');
    Validator.addRule(
        'time_check',
    /^(?:(?!0000)[0-9]{4}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:0[13-9]|1[0-2])-(?:29|30)|(?:0[13578]|1[02])-31)|(?:[0-9]{2}(?:0[48]|[2468][048]|[13579][26])|(?:0[48]|[2468][048]|[13579][26])00)-02-29) ([0-1]{1}[0-9]{1})|(2[0-4]{1}):[0-5]{1}[0-9]{1}$/,
    '请输入正确的日期和时间,格式如XXXX-MM-DD hh:mm'
    );
    exports.run = function() {

        var now = new Date();

        $("[name=startTime]").datetimepicker({
            language: 'zh-CN',
            autoclose: true
        }).on('hide', function(ev){
            // validator.query('[name=startTime]').execute();
        });

        // $('[name=startTime]').datetimepicker('setStartDate', now);

        $("[name=endTime]").datetimepicker({
            language: 'zh-CN',
            autoclose: true
        }).on('hide', function(ev){
            // validator.query('[name=endTime]').execute();
        });

        // $('[name=endTime]').datetimepicker('setStartDate', now);

    };

});