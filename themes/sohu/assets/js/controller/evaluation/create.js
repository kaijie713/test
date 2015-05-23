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

        var validator = new Validator({
            element: '#course-form',
            autoSubmit: false
        });

        validator.addItem({
            element: '[name="Evaluation[group_name]"]',
            required: true,
            rule: 'remote'
        });

        validator.addItem({
            element: '[name="Evaluation[city_name]"]',
            required: true,
            rule: 'maxlength{max:500}',
            // errormessageMaxlength: '想要说的话不能大于500个字'
        });

        validator.addItem({
            element: '[name="Evaluation[cooperetion_mode]"]',
            required: true,
            rule: 'remote'
        });

        validator.addItem({
            element: '[name="Evaluation[customer_type]"]',
            required: true,
            rule: 'remote'
        });

        validator.addItem({
            element: '[name="Evaluation[pre_opendatetime]"]',
            required: true,
            rule: 'remote'
        });

        validator.addItem({
            element: '[name="Evaluation[ec_incharge_name]"]',
            required: true,
            rule: 'remote'
        });

        validator.addItem({
            element: '[name="Evaluation[sales_name]"]',
            required: true,
            rule: 'remote'
        });

        validator.addItem({
            element: '[name="Evaluation[customer_level]"]',
            required: true,
            rule: 'remote'
        });

        validator.addItem({
            element: '[name="Evaluation[area_id]"]',
            required: true,
            rule: 'remote'
        });

        validator.addItem({
            element: '[name="Evaluation[prj_condition]"]',
            required: true,
            rule: 'remote'
        });

        validator.addItem({
            element: '[name="TEvaformPayment[ad_discount]"]',
            required: true,
            rule: 'remote'
        });

        validator.addItem({
            element: '[name="TEvaformPayment[ad_distribution_ratio]"]',
            required: true,
            rule: 'remote'
        });

        validator.addItem({
            element: '[name="TEvaformPayment[ad_amount_infact]"]',
            required: true,
            rule: 'remote'
        });

        validator.addItem({
            element: '[name="TEvaformPayment[ad_markting_ratio]"]',
            required: true,
            rule: 'remote'
        });

        validator.addItem({
            element: '[name="TEvaformPayment[pre_ad_deal_bind]"]',
            required: true,
            rule: 'remote'
        });



        

        $("input").attr("value","");

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
                var modalType = $('#modalType').val();

                if(modalType == 'dictChengshi'){
                    $("#city_id").val(id);
                    $("#city_name").val(name);
                    getArea(id);
                } else if (modalType == 'tHousesPrj'){
                    $("#group_id").val(id);
                    $("#group_name").val(name);
                } else if (modalType == 'ecIncharge'){
                    $("#ec_incharge_id").val(id);
                    $("#ec_incharge_name").val(name);
                } else if (modalType == 'sales'){
                    $("#sales_id").val(id);
                    $("#sales_name").val(name);
                }
                
            }

            $("#modal").modal('hide');

        });

        $('body').on('click', '.for-modal', function () {
            $('#modalType').val($(this).data('type'));
        })

        function getArea(id){
            $.get($("#area_id").data('url'), { 'id': id  },function(data){
                var selectHtml = "<option value=''>--请选择--</option>";
                if(data){
                    for(var i=0;i<data.length;i++){
                       selectHtml +="<option value="+data[i]['a_id']+">"+data[i]['name']+"</option>";
                    }
                }
                $("#area_id").html(selectHtml);

            });
        }

    };

});