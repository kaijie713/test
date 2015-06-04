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

                if($("[data-role=calculator]").length<=0){
                    Notify.danger('请先添加优惠明细!',3);
                    return;
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
            if($("[data-role=calculator]").length<=0){
                Notify.danger('请先添加优惠明细!',3);
                return;
            }
            var arr = this.prepareCalculator();

            this.prepareShow(arr);
        },

        prepareCalculator: function(){
            var arr = new Array();

            //获取输入的值
            arr['ad_discount'] = this.getIntValue("#ad_discount", '2');

            arr['ad_distribution_ratio'] = this.getIntValue("#ad_distribution_ratio", '2');

            arr['ad_amount_infact'] = this.getIntValue("#ad_amount_infact", '4');

            arr['ad_markting_ratio'] = this.getIntValue("#ad_markting_ratio", '2');

            arr['pre_ad_amount'] = this.getIntValue("#pre_ad_amount", '4');

            arr['pre_tax_ratio'] = this.getIntValue("#pre_tax_ratio", '2');

            //线下总支出 
            arr['offline_amount_sum'] = this.getOfflineAmountSum();

            //获取优惠明细相关数据
            arr['pdetail'] = this.preparePdetail();

            //线下总支出比例  预计焦点净收益 焦点支出总比例
            arr = this.getElse(arr);

            // console.log(arr);

            //按销售政策计算广告刊例金额
            arr['sale_ad_kanli_amount'] = parseFloat(arr['pdetail']['pre_incoming']) / (parseFloat(arr['ad_discount']) / 100) - parseFloat(arr['pdetail']['pre_incoming']) * (parseFloat(arr['ad_distribution_ratio']) / 100);

             arr['sale_ad_kanli_amount'] =  parseFloat(arr['sale_ad_kanli_amount']).toFixed(2);

            // 资源比预计收入倍数
            arr['resource_income_multiples'] = parseFloat(arr['sale_ad_kanli_amount']) / parseFloat(arr['pdetail']['pre_incoming']);

            arr['resource_income_multiples'] = parseFloat(arr['resource_income_multiples']).toFixed(2);

            //案场奖励总和 经纪人奖励
            arr = this.getPrjrewordAndBrokerfees(arr);

            return arr;
        },

        prepareShow: function(arr){
            $(".sell_house_sum").html(arr['pdetail']['sell_house_num']+'套');
            $(".pre_volumn_sum").html(arr['pdetail']['pre_volumn']+'套');
            $(".pre_amount_sum").html(arr['pdetail']['pre_amount']+'元');
            $(".pre_incoming").html(arr['pdetail']['pre_incoming']+'元');
            $(".net_income").html(arr['net_income']+'元');
            $(".offline_ratio").html(arr['offline_ratio']+'%');
            $(".splitdetail_divide_sum").html(arr['pdetail']['divideSumKaifashang']+'%');
            $(".developers_divide_sum").html(arr['pdetail']['divideAmountSumDisanfang']+'%');
            $(".ad_markting_ratio").html(arr['ad_markting_ratio']+'%');
            $(".sale_ad_kanli_amount").html(arr['sale_ad_kanli_amount']+'元');
            $(".resource_income_multiples").html(arr['resource_income_multiples']);
            $(".offline_amount_sum").html(arr['offline_amount_sum']+'元');
            $(".offline_ratio").html(arr['offline_ratio']+'%');
            $(".prjreword_perunit_sum").html(arr['prjreword_perunit_sum']+'元');
            $(".brokerfees_perunit_sum").html(arr['brokerfees_perunit_sum']+'元');
        },

        preparePdetail: function()
        {
            var arr = new Array();
            arr['sell_house_num'] = arr['ajcard_price'] = arr['pre_volumn'] = arr['prjreword_perunit'] = arr['prevolumn_perunit'] = arr['brokerfees_perunit'] = arr['prebrokervolumn'] = arr['pre_amount'] = arr['commission_rate'] = arr['commission_perunit'] = arr['pre_commission_amount'] = arr['pre_incoming'] = arr['jd_retain_ratio'] = arr['jd_retain_amount'] = arr['divideSum'] = arr['divideAmountSum'] = arr['splitdetailNum'] = arr['jd_retain_ratio'] = arr['jd_retain_amount'] = arr['divideSumKaifashang'] = arr['divideAmountKaifashang'] = arr['divideSumDisanfang'] = arr['divideAmountSumDisanfang'] = 0;

            if ($("[data-role=calculator]").length > 0)
            {
                $("[data-role=calculator]").each(function()
                {
                    arr['sell_house_num'] = parseFloat(arr['sell_house_num']) + parseInt($(this).find('[id^=sell_house_num]').val());
                    arr['ajcard_price'] = parseFloat(arr['ajcard_price']) + parseFloat($(this).find('[id^=ajcard_price]').val());
                    arr['pre_volumn'] = parseFloat(arr['pre_volumn']) + parseInt($(this).find('[id^=pre_volumn]').val());
                    arr['prjreword_perunit'] = parseFloat(arr['prjreword_perunit']) + parseFloat($(this).find('[id^=prjreword_perunit]').val());
                    arr['prevolumn_perunit'] = parseFloat(arr['prevolumn_perunit']) + parseInt($(this).find('[id^=prevolumn_perunit]').val());
                    arr['brokerfees_perunit'] = parseFloat(arr['brokerfees_perunit']) + parseFloat($(this).find('[id^=brokerfees_perunit]').val());
                    arr['prebrokervolumn'] = parseFloat(arr['prebrokervolumn']) + parseInt($(this).find('[id^=prebrokervolumn]').val());
                    arr['pre_amount'] = parseFloat(arr['pre_amount']) + parseFloat($(this).find('[id^=pre_amount]').val());
                    arr['commission_rate'] = parseFloat(arr['commission_rate']) + parseFloat($(this).find('[id^=commission_rate]').val());
                    arr['commission_perunit'] = parseFloat(arr['commission_perunit']) + parseFloat($(this).find('[id^=commission_perunit]').val());
                    arr['pre_commission_amount'] = parseFloat(arr['pre_commission_amount']) + parseFloat($(this).find('[id^=pre_commission_amount]').val());
                    arr['pre_incoming'] = parseFloat(arr['pre_incoming']) + parseFloat($(this).find('[id^=pre_incoming]').val());
                    arr['jd_retain_ratio'] = parseFloat(arr['jd_retain_ratio']) + parseFloat($(this).find('[id^=jd_retain_ratio]').val());
                    arr['jd_retain_amount'] = parseFloat(arr['jd_retain_amount']) + parseFloat($(this).find('[id^=jd_retain_amount]').val());
                    arr['divideSum'] = parseFloat(arr['divideSum']) + parseFloat($(this).find('[id^=divideSum]').val());
                    arr['divideAmountSum'] = parseFloat(arr['divideAmountSum']) + parseFloat($(this).find('[id^=divideAmountSum]').val());

                    arr['splitdetailNum'] = parseFloat(arr['splitdetailNum']) + parseFloat($(this).find('[id^=splitdetailNum]').val());
                    arr['divideSumKaifashang'] = parseFloat(arr['divideSumKaifashang']) + parseFloat($(this).find('[id^=divideSumKaifashang]').val());
                    arr['divideAmountKaifashang'] = parseFloat(arr['divideAmountKaifashang']) + parseFloat($(this).find('[id^=divideAmountKaifashang]').val());
                    arr['divideSumDisanfang'] = parseFloat(arr['divideSumDisanfang']) + parseFloat($(this).find('[id^=divideSumDisanfang]').val());
                    arr['divideAmountSumDisanfang'] = parseFloat(arr['divideAmountSumDisanfang']) + parseFloat($(this).find('[id^=divideAmountSumDisanfang]').val());

                });
            }

            return arr;
        },


        getElse: function(arr){

            //线下总支出比例
            arr['offline_ratio'] = 0;
            //焦点支出总比例
            arr['amount_ratio'] = 0;
            //预计焦点净收益
            arr['net_income'] = 0;

            var offlineRatio = amountRatio = netIncome = 0;

            $("[data-role=calculator]").each(function() {

                var type = $(this).parents('tr').data('type');

                if(type=="mkwfc"){

                    offlineRatio = parseFloat(arr['offline_amount_sum'])/parseFloat(arr['pdetail']['pre_incoming']);

                    amountRatio = parseFloat(arr['offline_amount_sum'])/parseFloat(arr['pdetail']['pre_incoming']);

                    netIncome = parseFloat(arr['pdetail']['pre_incoming'])/(1 - amountRatio);
                } else if(type=="mkyfc"){
                    offlineRatio = parseFloat(arr['offline_amount_sum'])/(parseFloat(arr['pdetail']['pre_incoming'])+parseFloat(arr['pre_ad_amount']));

                    netIncome = parseFloat(arr['pdetail']['pre_incoming'])*(100-arr['ad_markting_ratio']-arr['pre_tax_ratio'])/100-parseFloat(arr['offline_amount_sum']);

                    console.log((100-arr['ad_markting_ratio']-arr['pre_tax_ratio'])/100);

                    amountRatio =1-(parseFloat(netIncome)/(parseFloat(arr['pdetail']['pre_incoming'])+parseFloat(arr['pre_ad_amount'])));

                } else if(type=="cpswfc"){

                    offlineRatio = parseFloat(arr['offline_amount_sum'])/(parseFloat(arr['pdetail']['pre_incoming'])+parseFloat($(this).find('[id^=pre_commission_amount]').val())+parseFloat(arr['ad_amount_infact']));

                    netIncome = parseFloat(arr['pdetail']['pre_incoming'])*(1-parseFloat(offlineRatio));

                    amountRatio =parseFloat(arr['pre_tax_ratio']) + parseFloat(offlineRatio) + parseFloat(netIncome);


                }else if(type=="cpsyfc"){
                    offlineRatio = parseFloat(arr['offline_amount_sum'])/parseFloat(arr['pdetail']['pre_incoming']);

                    netIncome = parseFloat(arr['pdetail']['pre_incoming']) * (1-parseFloat(offlineRatio));

                    amountRatio = parseFloat($(this).find('[id^=divideSum]').val()) + parseFloat(arr['pre_tax_ratio']) + parseFloat(arr['ad_markting_ratio']) + parseFloat(offlineRatio);
                    

                }else if(type=="mkcps"){
                    offlineRatio = parseFloat(arr['offline_amount_sum'])/parseFloat(arr['pdetail']['pre_incoming']);

                    netIncome = parseFloat(arr['pdetail']['pre_incoming'])*(100-parseFloat(arr['ad_markting_ratio'])-parseFloat(arr['pre_tax_ratio']))/100-parseFloat(arr['offline_amount_sum']);

                    amountRatio = 1 - (netIncome/(parseFloat(arr['pdetail']['pre_incoming'])+parseFloat($(this).find('[id^=pre_commission_amount]').val())+parseFloat(arr['ad_amount_infact'])));
                } 

                arr['offline_ratio']  = parseFloat(arr['offline_ratio']) + parseFloat(offlineRatio);
                arr['amount_ratio']     = parseFloat(arr['amount_ratio']) + parseFloat(amountRatio);
                arr['net_income']     = parseFloat(arr['net_income']) + parseFloat(netIncome);
                
                // console.log('线下支出::'+offlineRatio);
                // console.log('焦点支出::'+amountRatio);
                // console.log('预计净收益支出::'+netIncome);
                // console.log('type::'+type);
            });

            arr['offline_ratio']  = parseFloat(arr['offline_ratio']*100).toFixed(2);
            arr['amount_ratio']     = parseFloat(arr['amount_ratio']*100).toFixed(2);
            arr['net_income']     = parseFloat(arr['net_income']).toFixed(2);

            return arr;
        },

        getPrjrewordAndBrokerfees: function(arr){

            arr['prjreword_perunit_sum'] = 0;
            arr['brokerfees_perunit_sum'] = 0;

            var  anchang = jingjiren = 0;

            $("[data-role=calculator]").each(function() {
                anchang  = parseFloat($(this).find('[id^=prjreword_perunit]').val()) * parseFloat($(this).find('[id^=prevolumn_perunit]').val()) + anchang;
                jingjiren  = parseFloat($(this).find('[id^=brokerfees_perunit]').val()) * parseFloat($(this).find('[id^=prebrokervolumn]').val()) + jingjiren;
                
            });

            arr['prjreword_perunit_sum']  = parseFloat(anchang).toFixed(2);
            arr['brokerfees_perunit_sum'] = parseFloat(jingjiren).toFixed(2);

            return arr;
        },

        getOfflineAmountSum: function(){
            var dxckpdfyze = this.getIntValue("#dxckpdfyze", 0, 'text');
            var zcrnlwfyze = this.getIntValue("#zcrnlwfyze", 0, 'text');
            var kftdxxhdze = this.getIntValue("#kftdxxhdze", 0, 'text');
            var xmbyj = this.getIntValue("#xmbyj", 0, 'text');
            return parseFloat(dxckpdfyze) + parseFloat(zcrnlwfyze) + parseFloat(kftdxxhdze) + parseFloat(xmbyj);
        },

        getIntValue: function(ele){
            var length = arguments[1] ? arguments[1] : 2;
            var type = arguments[2] ? arguments[2] : "val";
            if(type=='val'){
                return $(ele).length > 0 && $(ele).val() != '' && !isNaN($(ele).val()) ? parseFloat($(ele).val()).toFixed(length) : 0 ;
            } else if(type=="text"){
                return $(ele).length > 0 && $(ele).text() != '' && !isNaN($(ele).text()) ? parseFloat($(ele).text()).toFixed(length) : 0 ;
            }
        },

    });

    module.exports = Evaluation;
});