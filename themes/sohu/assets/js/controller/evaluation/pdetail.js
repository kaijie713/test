define(function(require, exports, module) {

    var Widget = require('widget');
    var Handlebars = require('handlebars');
    var Validator = require('bootstrap.validator');
    var Notify = require('common/bootstrap-notify');
    require('common/validator-rules').inject(Validator);

    var QuestionCreator = Widget.extend({
        attrs: {
            globalId: 1,
            validator : null,
            form : null,
            pdetailTemplate: null,
        },

        events: {
            'click [data-role=add-pdetail]': 'onAddPdetail'
            'click [data-role=delete-pdetail]': 'onDeletePdetail'
        },

        setup: function() {
            this._initForm();
            this._initValidator();
        },

        onSubmit: function(e){
            var submitType = $(e.currentTarget).data('submission');
            this.get('form').find('[name=submission]').val(submitType);
        },

        onAddPdetail: function(event) {
            var choiceCount = this.$('[data-role=choice]').length;
            if (choiceCount >= 10) {
                Notify.danger("选项最多十个!");
                return false;
            }
            var choiceCount = this.$('[data-role=choice]').length;
            var code = String.fromCharCode(choiceCount + 65);
            var model = {code: code, id:this._generateNextGlobalId()}
            this.addPdetail(model);
        },

        onDeletePdetail: function(event) {
            var choiceCount = this.$('[data-role=choice]').length;
            if (choiceCount <= 2 ) {
                Notify.danger("选项至少二个!");
                return false;
            }
            this.deletePdetail(event);
        },

        addPdetail: function(model) {
            var self = this;
            var template = this.get('choiceTemplate');
            var $html = $($.trim(template(model)));

            if (this.get('enableAudioUpload')) {
                $html.find('.item-audio-upload').removeClass('hide');
            }

            $html.appendTo(this.$('[data-role=choices]'));
            this.get("validator").addItem({
                element: '#item-input-'+model.id,
                required: true
            });
        },

        deletePdetail: function(e){
            var $btn = $(e.currentTarget);
            var id = '#' + $btn.parents('.form-group').find('input.item-input').attr('id');

            this.get('validator').removeItem(id);
            $btn.parents('[data-role=choice]').remove();
            this.$('[data-role=choice]').each(function(index, item){
                $(this).find('.choice-label').html('选项' + String.fromCharCode(index + 65));
            });
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

        _createValidator: function($form){
            var self = this;

            // Validator.addRule('score',/^(\d){1,10}$/i, '请输入正确的分值');

            validator = new Validator({
                element: $form,
                autoSubmit: false
            });

            // validator.addItem({
            //     element: '#question-stem-field',
            //     required: true
            // });

            // validator.addItem({
            //     element: '#question-score-field',
            //     required: false,
            //     rule:'number'
            // });

            // validator.on('formValidated', function(error, msg, $form) {
            //     if (error) {
            //         return false;
            //     }

            //     $('.submit-btn').button('submiting').addClass('disabled');

            //     self.get('validator').set('autoSubmit',true);
            // });

            return validator;
        },

        _initValidator: function(){
            var self = this;
            this.get('validator').off('formValidated');
            this.get('validator').on('formValidated', function(error, msg, $form) {
                if (error) {
                    return false;
                }
                if(!self._prepareFormData()){
                    return false;
                }

                $('.submit-btn').button('submiting').addClass('disabled');

                self.get('validator').set('autoSubmit',true);
            });
        },

        _setupForChoice: function() {
            var self = this;
            var pdetailTemplate = Handlebars.compile(this.$('[data-role=pdetail-template]').html());
            this.set('pdetailTemplate', pdetailTemplate);

            this.addPdetail({
                code: String.fromCharCode(i + 65),
                id: self._generateNextGlobalId()
            });
        },

        _generateNextGlobalId: function() {
            var globalId = this.get('globalId');
            this.set('globalId', globalId + 1);
            return globalId;
        },

    });

    module.exports = QuestionCreator;
});