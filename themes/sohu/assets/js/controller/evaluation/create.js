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
        
        $(".modal").on('click', '.btn-submit', function(e){
            e.preventDefault();
            $input = $('.modal input');
            var $modal = $(e.delegateTarget);
            $.get($(this).data('url'), $input.serialize(), function(html){
                $modal.html(html);
            });
        });

        $('.modal').on('click','.table-list tbody tr',function(){
            $(".table-list tbody tr").removeClass('selected');
            $(this).addClass('selected');
        });

        $(".modal").on('click', '.btn-confirm', function(e){
            var $selected = $('.selected');
            if ($selected.length>0) {
                var id = $selected.attr('id');
                var name = $selected.data('name');
                
                if($(this).data('page') == 'dictChengshi'){
                    $("#city_id").val(id);
                    $("#city_name").val(name);
                } else if ($(this).data('page') == 'tHousesPrj'){
                    $("#group_id").val(id);
                    $("#group_name").val(name);
                }
                
            }

            $("#modal").modal('toggle');

        });

    };

});