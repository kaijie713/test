define(function(require, exports, module) {

    var Widget = require('widget');
    var Handlebars = require('handlebars');
    require("jquery.bootstrap-datetimepicker");
    var Validator = require('bootstrap.validator');
    var Notify = require('common/bootstrap-notify');
    require('common/validator-rules').inject(Validator);

    var Evaluation = Widget.extend({
        attrs: {
            globalId: 1,
            validator : null,
            form : null,
            pdetailTemplate: null,
            
            globalOId: 1,
            outlineoutdetailTemplate: null,
            outlineoutdetailBody: null,
        },

        events: {
            // 'click [data-role=add-pdetail]': 'onAddPdetail',
            'click [data-role=delete-pdetail]': 'onDeletePdetail',

            'click [data-role=add-outlineoutdetail]': 'onAddOutlineOutdetail',
            'click [data-role=delete-outlineoutdetail]': 'onDeleteOutlineoutdetail',

            "keyup input[name^='Outlineoutdetail']": 'calculatorForOutlineoutdetail',
            'click [data-role=btn-calculator]': 'calculator',


        },

        setup: function() {
            this._initForm();
            // this._setupForPdetail();
            this._setupForOutlineoutdetail();
        },

        // onSubmit: function(e){
        //     var submitType = $(e.currentTarget).data('submission');
        //     this.get('form').find('[name=submission]').val(submitType);
        // },

        onAddPdetail: function(event) {
            // var pdetailCount = this.$('[data-role=pdetail]').length;
            // if (pdetailCount >= 10) {
            //     Notify.danger("选项最多十个!");
            //     return false;
            // }
            var pdetailCount = this.$('[data-role=pdetail]').length;
            var model = {code:pdetailCount+1, id:this._generateNextGlobalId()}
            this.addPdetail(model);
        },

        addPdetail: function(model) {
            var self = this;
            var template = this.get('pdetailTemplate');
            var $html = $($.trim(template(model)));
            var now = new Date();

            $html.appendTo(this.$('[data-role=pdetails]'));

            // this.get("validator").addItem({
            //     element: '#bdate'+model.id,
            //     required: true,
            //     rule: 'time_check',
            // });

            // $('#bdate'+model.id).datetimepicker({
            //     language: 'zh-CN',
            //     autoclose: true
            // }).on('hide', function(ev){
            //     validator.query('#bdate'+model.id).execute();
            // });

            // $('#bdate'+model.id).datetimepicker('setStartDate', now);

            // this.get("validator").addItem({
            //     element: '#edate'+model.id,
            //     required: true,
            //     rule: 'time_check',
            // });

            // $('#edate'+model.id).datetimepicker({
            //     language: 'zh-CN',
            //     autoclose: true
            // }).on('hide', function(ev){
            //     validator.query('#edate'+model.id).execute();
            // });

            // $('#edate'+model.id).datetimepicker('setStartDate', now);

            // this.get("validator").addItem({
            //     element: '#sell_house_num'+model.id,
            //     required: true
            // });

            // this.get("validator").addItem({
            //     element: '#source_type'+model.id,
            //     required: true
            // });

            // this.get("validator").addItem({
            //     element: '#charge_type'+model.id,
            //     required: true
            // });
        },

        onDeletePdetail: function(event) {
            // var pdetailCount = this.$('[data-role=pdetail]').length;
            // if (pdetailCount <= 1 ) {
            //     Notify.danger("选项至少一个!");
            //     return false;
            // }
            this.deletePdetail(event);
        },

        deletePdetail: function(e){
            var $btn = $(e.currentTarget);
            var id =  $btn.parents('tr').data('id');

            // this.get('validator').removeItem('#bdate' +id);
            // this.get('validator').removeItem('#edate' +id);
            // this.get('validator').removeItem('#sell_house_num' +id);
            // this.get('validator').removeItem('#source_type' +id);
            // this.get('validator').removeItem('#charge_type' +id);
            $btn.parents('[data-role=pdetail]').remove();

            this.$('[data-role=pdetail]').each(function(index, item){
                $(this).find('.code').html(index+1);
            });

            if(this.$('[data-role=pdetail]').length<=0){
                $(".is-null").removeClass('hide');
            }
        },

        _setupForPdetail: function() {
            var self = this;
            var pdetailTemplate = Handlebars.compile(this.$('[data-role=pdetail-template]').html());
            this.set('pdetailTemplate', pdetailTemplate);

            this.addPdetail({code:1, id: self._generateNextGlobalId()});
        },

        _initForm: function() {
            var $form = this.$('[data-role=evaluation-form]');
            this.set('form', $form);
            this.set('validator', this._createValidator($form));
        },

        _generateNextGlobalId: function() {
            var globalId = this.get('globalId');
            this.set('globalId', globalId + 1);
            return globalId;
        },

        _createValidator: function($form){
            var self = this;

            // Validator.addRule('score',/^(\d){1,10}$/i, '请输入正确的分值');

            validator = new Validator({
                element: $form,
                autoSubmit: false
            });

            validator.addItem({
                element: '[name="Evaluation[group_name]"]',
                required: true,
            });

            validator.addItem({
                element: '[name="Evaluation[city_name]"]',
                required: true,
                // rule: 'maxlength{max:500}',
                // errormessageMaxlength: '想要说的话不能大于500个字'
            });

            // validator.addItem({
            //     element: '[name="Evaluation[cooperetion_mode]"]',
            //     required: false,
            //     rule: 'remote'
            // });

            validator.addItem({
                element: '[name="Evaluation[customer_type]"]',
                required: true,
            });

            validator.addItem({
                element: '[name="Evaluation[pre_opendatetime]"]',
                required: true,
                rule: 'time_check'
            });

            validator.addItem({
                element: '[name="Evaluation[ec_incharge_name]"]',
                required: true,
            });

            // validator.addItem({
            //     element: '[name="Evaluation[sales_name]"]',
            //     required: true,
            // });

            validator.addItem({
                element: '[name="Evaluation[customer_level]"]',
                required: true,
            });

            // validator.addItem({
            //     element: '[name="Evaluation[area_id]"]',
            //     required: true,
            // });

            validator.addItem({
                element: '[name="Evaluation[prj_condition]"]',
                required: false,
                rule: 'maxlength{max:1900}',
                errormessageMaxlength: '想要说的话不能大于1900个字'
            });

            validator.addItem({
                element: '[name="EvaformPayment[ad_discount]"]',
                required: false,
                // rule: 'remote'   百分数
            });

            validator.addItem({
                element: '[name="EvaformPayment[ad_distribution_ratio]"]',
                required: false,
                // rule: 'remote'  1:1
            });

            validator.addItem({
                element: '[name="EvaformPayment[ad_amount_infact]"]',
                required: false,
                rule: 'number'
            });

            validator.addItem({
                element: '[name="EvaformPayment[ad_markting_ratio]"]',
                required: false,
                // rule: 'number'  1:1
            });

            // validator.addItem({
            //     element: '[name="EvaformPayment[pre_ad_deal_bind]"]',
            //     required: false,
            // });

            var now = new Date();

            $('[name="Evaluation[pre_opendatetime]"]').datetimepicker({
                language: 'zh-CN',
                autoclose: true
            }).on('hide', function(ev){
                validator.query('[name="Evaluation[pre_opendatetime]"]').execute();
            });

            // $('[name=startTime]').datetimepicker('setStartDate', now);

            validator.on('formValidated', function(error, msg, $form) {
                if (error) {
                    return false;
                }

                $('#evaluation-create-btn').button('submiting').addClass('disabled');

                self.get('validator').set('autoSubmit',true);
            });

            return validator;
        },


        _setupForOutlineoutdetail: function() {
            var self = this;
            var outlineoutdetailTemplate = Handlebars.compile(this.$('[data-role=outlineoutdetail-template]').html());
            this.set('outlineoutdetailTemplate', outlineoutdetailTemplate);
        },

        onAddOutlineOutdetail: function(event) {
            var bodyId = $(event.currentTarget).data('for');
            var model = {dvalue:$(bodyId).data('dvalue'),  id:this._generateNextGlobalOId()};
            this.set('outlineoutdetailBody', bodyId);
            this.addOutlineoutdetail(model);
        },

        onDeleteOutlineoutdetail: function(event) {
            this.deleteOutlineoutdetail(event);
        },

        addOutlineoutdetail: function(model) {
            var self = this;
            var template = this.get('outlineoutdetailTemplate');
            var $html = $($.trim(template(model)));
            
            $html.appendTo(this.$(this.get('outlineoutdetailBody')));
            
            $('.outlineoutdetail-table').removeClass('hide');
            
            this.get("validator").addItem({
                element: '#out_name'+model.id,
                required: true
            });
            
            this.get("validator").addItem({
                element: '#out_amount'+model.id,
                required: true,
                rule: 'currency'
            });

            this.get("validator").addItem({
                element: '#out_type'+model.id,
                required: true,
                errormessageRequired: '隐藏的表单域值为空哦'
            });

            $('#out_type'+model.id).val($(this.get('outlineoutdetailBody')).data('dictid'));
        },

        deleteOutlineoutdetail: function(e){
            var $btn = $(e.currentTarget);
            var id =  $btn.parents('tr').data('id');

            this.get('validator').removeItem('#out_name' +id);
            this.get('validator').removeItem('#out_amount' +id);
            this.get('validator').removeItem('#charge_type' +id);
            this.get('validator').removeItem('#out_type' +id);
            $btn.parents('[data-role=outlineoutdetail]').remove();

            if($("[data-role=outlineoutdetail]").length<=0){
                $('.outlineoutdetail-table').addClass('hide');
            }
            this.calculatorForOutlineoutdetail();
        },

        _generateNextGlobalOId: function() {
            var globalOId = this.get('globalOId');
            this.set('globalOId', globalOId + 1);
            return globalOId;
        },

        //计算线下
        calculatorForOutlineoutdetail: function(event) {
            var $body = $('tbody[id^=outlineoutdetail-body]');
            $body.each(function(){
                var dvalue = $(this).data('key');
                var $input = $(this).find('[id^=out_amount]');
                var sum = 0;
                $input.each(function(){
                    if($(this).val()!="")
                        sum = parseInt($(this).val())+parseInt(sum);
                });
                sum = !isNaN(sum) ? sum : 0;

                $('#'+dvalue).text(sum);
            });
        },

        //整体计算
        calculator: function(event) {
            var arr = this.prepareCalculator();
        },

        prepareCalculator: function(){
            var arr = new Array();

            arr['pdetail'] = this.preparePdetail();
            //获取输入的值

            arr['ad_discount'] = this.getIntValue($("#ad_discount"), '2');

            arr['ad_distribution_ratio'] = this.getIntValue($("#ad_distribution_ratio"), '2');

            arr['ad_amount_infact'] = this.getIntValue($("#ad_amount_infact"), '4');

            arr['ad_markting_ratio'] = this.getIntValue($("#ad_markting_ratio"), '2');

            arr['pre_ad_amount'] = this.getIntValue($("#pre_ad_amount"), '4');

            arr['pre_tax_ratio'] = this.getIntValue($("#pre_tax_ratio"), '2');

            arr['sale_ad_kanli_amount'] = arr['pdetail']['pre_amount'] / arr['ad_discount'] - arr['pdetail']['pre_amount'] * arr['ad_distribution_ratio'];

            arr['resource_income_multiples'] = arr['sale_ad_kanli_amount'] / arr['pdetail']['pre_amount'];

            arr['offline_amount_sum'] = this.getOfflineAmountSum();


            arr['offline_amount'] = this.getOfflineAmount(arr);
            //
            arr['net_income'] = this.getNetIncome(arr);


            return arr;
        },

        preparePdetail: function(){
            var arr = new Array();
            arr['sell_house_num'] = arr['ajcard_price'] = arr['pre_volumn'] = arr['prjreword_perunit'] = arr['prevolumn_perunit'] = 0;
            arr['brokerfees_perunit'] = arr['prebrokervolumn'] = arr['pre_amount'] = arr['commission_rate'] = arr['commission_perunit'] = 0;
            arr['pre_commission_amount'] = arr['pre_incoming'] = arr['jd_retain_ratio'] = arr['jd_retain_amount'] = 0;
            arr['divideSum'] = arr['divideAmountSum'] = arr['splitdetailNum'] = arr['jd_retain_ratio'] = arr['jd_retain_amount'] = 0;

            $pdetail = $("[data-role=calculator]").length>0?$("[data-role=calculator]"):'';
            if($pdetail)
            {
                $pdetail.each(function(){
                    arr['sell_house_num'] = arr['sell_house_num'] + $(this).find('[id^=sell_house_num]').val();
                    arr['ajcard_price'] = arr['ajcard_price'] + $(this).find('[id^=ajcard_price]').val();
                    arr['pre_volumn'] = arr['pre_volumn'] + $(this).find('[id^=pre_volumn]').val();
                    arr['prjreword_perunit'] = arr['prjreword_perunit'] + $(this).find('[id^=prjreword_perunit]').val();
                    arr['prevolumn_perunit'] = arr['prevolumn_perunit'] + $(this).find('[id^=prevolumn_perunit]').val();
                    arr['brokerfees_perunit'] = arr['brokerfees_perunit'] + $(this).find('[id^=brokerfees_perunit]').val();
                    arr['prebrokervolumn'] = arr['prebrokervolumn'] + $(this).find('[id^=prebrokervolumn]').val();
                    arr['pre_amount'] = arr['pre_amount'] + $(this).find('[id^=pre_amount]').val();
                    arr['commission_rate'] = arr['commission_rate'] + $(this).find('[id^=commission_rate]').val();
                    arr['commission_perunit'] = arr['commission_perunit'] + $(this).find('[id^=commission_perunit]').val();
                    arr['pre_commission_amount'] = arr['pre_commission_amount'] + $(this).find('[id^=pre_commission_amount]').val();
                    arr['pre_incoming'] = arr['pre_incoming'] + $(this).find('[id^=pre_incoming]').val();
                    arr['jd_retain_ratio'] = arr['jd_retain_ratio'] + $(this).find('[id^=jd_retain_ratio]').val();
                    arr['jd_retain_amount'] = arr['jd_retain_amount'] + $(this).find('[id^=jd_retain_amount]').val();
                    arr['divideSum'] = arr['divideSum'] + $(this).find('[id^=divideSum]').val();
                    arr['divideAmountSum'] = arr['divideAmountSum'] + $(this).find('[id^=divideAmountSum]').val();
                    arr['splitdetailNum'] = arr['splitdetailNum'] + $(this).find('[id^=splitdetailNum]').val();
                    arr['jd_retain_ratio'] = arr['jd_retain_ratio'] + $(this).find('[id^=jd_retain_ratio]').val();
                    arr['jd_retain_amount'] = arr['jd_retain_amount'] + $(this).find('[id^=jd_retain_amount]').val();
                });
            }

            return arr;
        },

        getNetIncome: function(arr){
        
            var netIncome = 0;
            $pdetail = $("[data-role=calculator]").length>0?$("[data-role=calculator]"):'';
            if($pdetail)
            {
                $pdetail.each(function(){

                    var type = $pdetail.parents('tr').data('type');

                    if(type=="mkwfc"){
                        OfflineAmount = OfflineAmount + arr['offline_amount_sum']/arr['pdetail']['pre_incoming'];
                    }

                    if(type=="mkytc"){
                        OfflineAmount = 1 - OfflineAmount + arr['offline_amount_sum']/arr['pdetail']['pre_incoming'];

                    }

                    
                });
            }

            return OfflineAmount;
        },

        getOfflineAmount: function(arr){
            var OfflineAmount = 0;
      
            if(type=="mkwfc"){
                OfflineAmount = OfflineAmount + arr['offline_amount_sum']/arr['pdetail']['pre_incoming'];
            }

            if(type=="mkytc"){
                OfflineAmount = 1 - OfflineAmount + arr['offline_amount_sum']/arr['pdetail']['pre_incoming'];

            }

       

            return OfflineAmount;
        },

        getOfflineAmountSum: function(){
            var dxckpdfyze = this.getIntValue($("#dxckpdfyze"), 0, 'text');
            var zcrnlwfyze = this.getIntValue($("#zcrnlwfyze"), 0, 'text');
            var kftdxxhdze = this.getIntValue($("#kftdxxhdze"), 0, 'text');
            var xmbyj = this.getIntValue($("#xmbyj"), 0, 'text');
            return dxckpdfyze + zcrnlwfyze + kftdxxhdze + xmbyj;
        },

        getIntValue: function($value, length="2", type="val"){
            if(type=='val'){
                return $value.length > 0 && $value.val() != '' && !isNaN($value.val()) ? parseFloat($value.val()).toFixed(length) : 0 ;
            } else if(type=="text"){
                return $value.length > 0 && $value.text() != '' && !isNaN($value.text()) ? parseFloat($value.text()).toFixed(length) : 0 ;
            }
        }

    });

    module.exports = Evaluation;
});