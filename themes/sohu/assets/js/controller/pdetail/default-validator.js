define(function(require, exports, module) {

    var Validator = require('bootstrap.validator');
    var Notify = require('common/bootstrap-notify');
    require('common/validator-rules').inject(Validator);
    require("jquery.bootstrap-datetimepicker");


    exports.run = function() {
        var now = new Date();

        validator = new Validator({
            element: '[data-role=pdetail-form]',
            autoSubmit: false,
            failSilently: true,
        });

        // 开始时间
        validator.addItem({element: '#bdate',required: true,rule: 'time_check',});
        // 结束时间
        validator.addItem({element: '#edate',required: true,rule: 'time_check',});
        // 可售房源数量
        validator.addItem({element: '#sell_house_num',required: true,rule: 'number',});
        // 房源类型
        validator.addItem({element: '#source_type',required: true});
        // 预计毛收入
        // validator.addItem({element: '#pre_incoming',required: true,rule: 'number',});
        // 收费方式
        // validator.addItem({element: '#charge_type',required: true,rule: 'currency',});
        // 爱家卡单价
        validator.addItem({element: '#ajcard_price',required: true,rule: 'currency',});
        // 预计成交套数
        validator.addItem({element: '#pre_volumn',required: true,rule: 'currency',});
        // 案场奖励/每套
        validator.addItem({element: '#prjreword_perunit',required: true,rule: 'currency',});
        // 预估案场奖励成交套数
        validator.addItem({element: '#prevolumn_perunit',required: true,rule: 'currency',});
        // 经纪人服务费/每套
        validator.addItem({element: '#brokerfees_perunit',required: true,rule: 'currency',});
        // 预计经纪人成交套数
        validator.addItem({element: '#prebrokervolumn',required: true,rule: 'currency',});
        // 优惠情况
        validator.addItem({element: '#pref_context',required: true,rule: 'maxlength{max:1900}',errormessageMaxlength: '想要说的话不能大于1900个字'});
        // 焦点留存比例
        // validator.addItem({element: '#jd_retain_ratio',required: true,rule: 'currency',});
        // 焦点留存金额
        // validator.addItem({element: '#jd_retain_amount',required: true,rule: 'currency',});
        // 预计成交总额
        validator.addItem({element: '#pre_amount',required: true,rule: 'currency',});
        // 佣金比例
        validator.addItem({element: '#commission_rate',required: true,rule: 'currency',});
        // 每套收取佣金
        validator.addItem({element: '#commission_perunit',required: true,rule: 'currency',});
        // 预计佣金毛收入
        validator.addItem({element: '#pre_commission_amount',required: true,rule: 'currency',});
        
        

        $('#bdate').datetimepicker({
            language: 'zh-CN',
            autoclose: true
        }).on('hide', function(ev){
            validator.query('#bdate').execute();
        });
        $('#edate').datetimepicker({
            language: 'zh-CN',
            autoclose: true
        }).on('hide', function(ev){
            validator.query('#edate').execute();
        });
        $('#bdate').datetimepicker('setStartDate', now);
        $('#edate').datetimepicker('setStartDate', now);

        validator.on('formValidated', function(error, msg, $form) {
            if (error) {
                return false;
            }

            if($('#charge_type').val() == ""){
                 Notify.danger('系统错误，请尝试重新打开此页面！');
                 return false;
            }

            $('#pdetail-create-btn').button('submiting').addClass('disabled');

            validator.set('autoSubmit',true);
        });

    }
});
