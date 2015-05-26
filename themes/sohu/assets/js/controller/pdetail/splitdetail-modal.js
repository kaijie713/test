define(function(require, exports, module) {

    var Widget = require('widget');
    var Handlebars = require('handlebars');
    var Validator = require('bootstrap.validator');
    var Notify = require('common/bootstrap-notify');
    require('common/validator-rules').inject(Validator);

    var Evaluation = Widget.extend({
        attrs: {
            globalId: 1,
            validator : null,
            form : null,
            template: null,
        },

        events: {
            'click [data-role=add-splitdetail]': 'onAddSplitdetail',
            'click [data-role=delete-splitdetail]': 'onDeleteSplitdetail',
        },

        setup: function() {
            this._setupForSplitdetail();
        },

        onAddSplitdetail: function(event) {
            var model = {id:this._generateNextGlobalId()}
            this.addSplitdetail(model);
        },

        onDeleteSplitdetail: function(event) {
            this.deleteSplitdetail(event);
        },

        addSplitdetail: function(model) {
            var self = this;
            var template = this.get('template');
            var $html = $($.trim(template(model)));
            
            $html.appendTo(this.$("#splitdetail-tbody"));
            
            this.get("validator").addItem({
                element: '#partner_type'+model.id,
                required: true
            });
            
            this.get("validator").addItem({
                element: '#partner_name'+model.id,
                required: true,
                rule: 'maxlength{max:50}',
            });
            
            this.get("validator").addItem({
                element: '#divide'+model.id,
                required: true,
                rule: 'number',
            });
            
            this.get("validator").addItem({
                element: '#divide_amount'+model.id,
                required: true,
                rule: 'number',
            });
            
            this.get("validator").addItem({
                element: '#partner_memo'+model.id,
                required: true,
                rule: 'maxlength{max:1000}',
            });

        },

        deleteSplitdetail: function(e){
            var $btn = $(e.currentTarget);
            var id =  $btn.parents('tr').data('id');

            this.get('validator').removeItem('#partner_type' +id);
            this.get('validator').removeItem('#partner_name' +id);
            this.get('validator').removeItem('#divide' +id);
            this.get('validator').removeItem('#divide_amount' +id);
            this.get('validator').removeItem('#partner_memo' +id);
            $btn.parents('tr').remove();
        },

        _setupForSplitdetail: function() {
            var template = Handlebars.compile(this.$('[data-role=splitdetail-template]').html());
            this.set('template', template);
        },

        _generateNextGlobalId: function() {
            var globalId = this.get('globalId');
            this.set('globalId', globalId + 1);
            return globalId;
        },

    });

    module.exports = Evaluation;
});