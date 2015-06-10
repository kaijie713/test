define(function(require, exports, module) {

    var Widget = require('widget');
    var Handlebars = require('handlebars');

    //mkwfc mkyfc cpswfc cpsyfc mkcps
    var Calculator = Widget.extend({
        attrs: {
            globalId: 1,
            pdetailTemplate: null,
            inputValues: null,
            chargeType: null,
        },

        events: {
            "keyup input[name^='Pdetail']": 'prepare',
            "keyup input[name^='Splitdetail']": 'prepare',
        },

        setup: function() {
            var chargeType = $('#charge_type').data('type');
            this.set('chargeType', chargeType);
            this._setupForPdetail();
        },

        prepare: function() {
            var arr = new Array();
            //不参与计算字段
            arr['shoufei'] = $("#shoufei").val();
            arr['fanyuan'] = $("#source_type  option:selected").text();
            arr['bdate']  = $("#bdate").val();
            arr['edate']  = $("#edate").val();
            arr['type']  = this.get('chargeType');
            // console.log(arr['shoufei']);

            //参与计算字段
            arr['sell_house_num'] = $("#sell_house_num").length > 0 && $("#sell_house_num").val() != '' && !isNaN($("#sell_house_num").val()) ? parseFloat($("#sell_house_num").val()).toFixed(0) : 0 ;
            arr['ajcard_price'] = $("#ajcard_price").length > 0 && $("#ajcard_price").val() != '' && !isNaN($("#ajcard_price").val()) ? parseFloat($("#ajcard_price").val()).toFixed(4) : 0 ;
            arr['pre_volumn'] = $("#pre_volumn").length > 0 && $("#pre_volumn").val() != '' && !isNaN($("#pre_volumn").val()) ? parseFloat($("#pre_volumn").val()).toFixed(0) : 0 ;
            arr['prjreword_perunit'] = $("#prjreword_perunit").length > 0 && $("#prjreword_perunit").val() != '' && !isNaN($("#prjreword_perunit").val()) ? parseFloat($("#prjreword_perunit").val()).toFixed(4) : 0 ;
            arr['prevolumn_perunit'] = $("#prevolumn_perunit").length > 0 && $("#prevolumn_perunit").val() != '' && !isNaN($("#prevolumn_perunit").val()) ? parseFloat($("#prevolumn_perunit").val()).toFixed(0) : 0 ;
            arr['brokerfees_perunit'] = $("#brokerfees_perunit").length > 0 && $("#brokerfees_perunit").val() != '' && !isNaN($("#brokerfees_perunit").val()) ? parseFloat($("#brokerfees_perunit").val()).toFixed(4) : 0 ;
            arr['prebrokervolumn'] = $("#prebrokervolumn").length > 0 && $("#prebrokervolumn").val() != '' && !isNaN($("#prebrokervolumn").val()) ? parseFloat($("#prebrokervolumn").val()).toFixed(0) : 0 ;
            arr['pre_amount'] = $("#pre_amount").length > 0 && $("#pre_amount").val() != '' && !isNaN($("#pre_amount").val()) ? parseFloat($("#pre_amount").val()).toFixed(4) : 0 ;
            arr['commission_rate'] = $("#commission_rate").length > 0 && $("#commission_rate").val() != '' && !isNaN($("#commission_rate").val()) ? parseFloat($("#commission_rate").val()).toFixed(4) : 0 ;
            arr['commission_perunit'] = $("#commission_perunit").length > 0 && $("#commission_perunit").val() != '' && !isNaN($("#commission_perunit").val()) ? parseFloat($("#commission_perunit").val()).toFixed(4) : 0 ;
            arr['pre_commission_amount'] = $("#pre_commission_amount").length > 0 && $("#pre_commission_amount").val() != '' && !isNaN($("#pre_commission_amount").val()) ? parseFloat($("#pre_commission_amount").val()).toFixed(4) : 0 ;
            arr['pre_incoming'] = $("#pre_incoming").length > 0 && $("#pre_incoming").val() != '' && !isNaN($("#pre_incoming").val()) ? parseFloat($("#pre_incoming").val()).toFixed(4) : 0 ;
            arr['jd_retain_ratio'] = $("#jd_retain_ratio").length > 0 && $("#jd_retain_ratio").val() != '' && !isNaN($("#jd_retain_ratio").val()) ? parseFloat($("#jd_retain_ratio").val()).toFixed(4) : 0 ;
            arr['jd_retain_amount'] = $("#jd_retain_amount").length > 0 && $("#jd_retain_amount").val() != '' && !isNaN($("#jd_retain_amount").val()) ? parseFloat($("#jd_retain_amount").val()).toFixed(4) : 0 ;

            // console.log(arr['ajcard_price'] +'--'+ arr['pre_volumn'] +'--'+ arr['commission_perunit'] +'--'+  arr['pre_volumn']);
            arr['pre_incoming'] = parseInt(arr['ajcard_price'] * arr['pre_volumn']) + parseInt(arr['commission_perunit'] * arr['pre_volumn']);
            // console.log('pre_incoming---liucun--'+arr['pre_incoming']);

            arr = this.getSplitdetail(arr);

            arr = this.setJdRetain(arr);

            // console.log('pre_incoming--'+arr['pre_incoming']);

            if(arr['jd_retain_ratio'] != 0){
                arr['pre_incoming'] = arr['pre_incoming'] * arr['jd_retain_ratio'] / 100;
            }else{
                arr['pre_incoming'] = arr['pre_incoming'] - arr['divideAmountSum'];
            }

            // $("#pref_context").val(arr['prjreword_perunit'] +"--"+ arr['prevolumn_perunit'] +"--"+ arr['brokerfees_perunit'] +"--"+ arr['prebrokervolumn']  );

            arr['pre_incoming'] = arr['pre_incoming'] - arr['prjreword_perunit'] * arr['prevolumn_perunit'] - arr['brokerfees_perunit'] * arr['prebrokervolumn'];

            arr['pre_incoming'] = parseFloat(arr['pre_incoming']).toFixed(2);

            !isNaN(arr['pre_incoming']) && arr['pre_incoming'] != '' ? $("#yujimaoshouru").val(arr['pre_incoming']) : '';

            this.set('inputValues', arr);

        },

        setJdRetain: function(arr) {
            var jd_retain_ratio = 0;
            var jd_retain_amount = 0;
            if($('#jd_retain_ratio').length>0){

                jd_retain_ratio = parseFloat(100)-parseFloat(arr.divideSum);
                jd_retain_amount = arr.pre_incoming;

                $('#jd_retain_ratio').val(jd_retain_ratio);
                $('#jd_retain_amount').val(jd_retain_amount);
            }
            arr['jd_retain_ratio'] = jd_retain_ratio;
            arr['jd_retain_amount'] = jd_retain_amount;

            return arr;
        },

        getSplitdetail: function(arr) {
            var divideSum = 0;
            var divideAmountSum = 0;

            if($('[data-role=splitdetail]').length > 0)
            {
                $('[data-role=splitdetail]').each(function(){
                    var typeId = $(this).find('[id^=partner_type]').val();
                    var divide = $(this).find('[id^=divide]').val();
                    var divideAmount = $(this).find('[id^=divide_amount]').val();

                    divide = !isNaN(divide) && divide!= '' ? divide : 0;
                    divideAmount = !isNaN(divideAmount) && divideAmount != '' ? divideAmount : 0;

                    divideSum = parseFloat(divide)+parseFloat(divideSum);
                    divideAmountSum = parseFloat(divideAmount)+parseFloat(divideAmountSum);

                });
                
            }

            arr['divideSum'] = divideSum;
            arr['divideAmountSum'] = divideAmountSum;

            return arr;
        },

        onAddPdetail: function(pdid) {
            var pdetailCount = $('[data-role=pdetail]').length;
            var arr = this.get('inputValues');
            var model = {
                code:pdetailCount+1,  
                arr: arr, 
                chargeType: this.get('chargeType'), 
                id:this._generateNextGlobalId(), 
                pdid:pdid
            }
            
            this.addPdetail(model);

            $('[data-role=pdetail]').each(function(index, item){
                $(this).find('.code').html(index+1);
            });
        },

        addPdetail: function(model) {
            var self = this;
            var template = this.get('pdetailTemplate');
            var $html = $($.trim(template(model)));
            $(".is-null").addClass('hide');
            $html.appendTo($('[data-role=pdetails]'));
        },

        _setupForPdetail: function() {
            var pdetailTemplate = Handlebars.compile($('[data-role=pdetail-template]').html());
            this.set('pdetailTemplate', pdetailTemplate);
        },

        _generateNextGlobalId: function() {
            // var globalId = this.get('globalId');
            // this.set('globalId', globalId + 1);
            // return globalId;
            if($("[data-role=pdetail]:last").length>0){
                return parseInt($("[data-role=pdetail]:last").data('id')) + 2;
            } else {
                return 1;
            }
            
        },
    });

    module.exports = Calculator;
});