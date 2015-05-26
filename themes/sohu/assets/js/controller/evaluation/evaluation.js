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
            'click [data-role=add-pdetail]': 'onAddPdetail',
            'click [data-role=delete-pdetail]': 'onDeletePdetail',
            'click [data-role=add-outlineoutdetail]': 'onAddOutlineOutdetail',
            'click [data-role=delete-outlineoutdetail]': 'onDeleteOutlineoutdetail',
        },

        setup: function() {
            this._initForm();
            this._setupForPdetail();
            this._setupForOutlineoutdetail();
        },

        // onSubmit: function(e){
        //     var submitType = $(e.currentTarget).data('submission');
        //     this.get('form').find('[name=submission]').val(submitType);
        // },

        onAddPdetail: function(event) {
            var pdetailCount = this.$('[data-role=pdetail]').length;
            if (pdetailCount >= 10) {
                Notify.danger("选项最多十个!");
                return false;
            }
            var pdetailCount = this.$('[data-role=pdetail]').length;
            var model = {code:pdetailCount+1, id:this._generateNextGlobalId()}
            this.addPdetail(model);
        },

        onDeletePdetail: function(event) {
            var pdetailCount = this.$('[data-role=pdetail]').length;
            if (pdetailCount <= 1 ) {
                Notify.danger("选项至少一个!");
                return false;
            }
            this.deletePdetail(event);
        },

        addPdetail: function(model) {
            var self = this;
            var template = this.get('pdetailTemplate');
            var $html = $($.trim(template(model)));
            var now = new Date();

            $html.appendTo(this.$('[data-role=pdetails]'));

            this.get("validator").addItem({
                element: '#bdate'+model.id,
                required: true,
                rule: 'time_check',
            });

            $('#bdate'+model.id).datetimepicker({
                language: 'zh-CN',
                autoclose: true
            }).on('hide', function(ev){
                validator.query('#bdate'+model.id).execute();
            });

            $('#bdate'+model.id).datetimepicker('setStartDate', now);

            this.get("validator").addItem({
                element: '#edate'+model.id,
                required: true,
                rule: 'time_check',
            });

            $('#edate'+model.id).datetimepicker({
                language: 'zh-CN',
                autoclose: true
            }).on('hide', function(ev){
                validator.query('#edate'+model.id).execute();
            });

            $('#edate'+model.id).datetimepicker('setStartDate', now);

            this.get("validator").addItem({
                element: '#sell_house_num'+model.id,
                required: true
            });

            this.get("validator").addItem({
                element: '#source_type'+model.id,
                required: true
            });

            this.get("validator").addItem({
                element: '#charge_type'+model.id,
                required: true
            });
        },

        deletePdetail: function(e){
            var $btn = $(e.currentTarget);
            var id =  $btn.parents('tr').attr('id');

            this.get('validator').removeItem('#bdate' +id);
            this.get('validator').removeItem('#edate' +id);
            this.get('validator').removeItem('#sell_house_num' +id);
            this.get('validator').removeItem('#source_type' +id);
            this.get('validator').removeItem('#charge_type' +id);
            $btn.parents('[data-role=pdetail]').remove();
            this.$('[data-role=pdetail]').each(function(index, item){
                $(this).find('.code').html(index+1);
            });
        },

        _setupForPdetail: function() {
            var self = this;
            var pdetailTemplate = Handlebars.compile(this.$('[data-role=pdetail-template]').html());
            this.set('pdetailTemplate', pdetailTemplate);

            this.addPdetail({code:1, id: self._generateNextGlobalId()});
        },

        _prepareFormData: function(){
            var answers = [],
            $form = this.get('form');
            $form.find(".answer-checkbox").each(function(index){
                if($(this).prop('checked')) {
                    answers.push(index);
                }
            });
            if (0 == answers.length){
                Notify.danger("请选择正确答案!");
                return false;
            }

            $.each(answers, function(i, answer) {
                $form.append('<input type="hidden" name="answer[]" value="' + answer + '">');
            });

            return true;
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
                required: true
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
        },

         _generateNextGlobalOId: function() {
            var globalOId = this.get('globalOId');
            this.set('globalOId', globalOId + 1);
            return globalOId;
        },

    });

    module.exports = Evaluation;
});