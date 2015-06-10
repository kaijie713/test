define(function(require, exports, module) {

    var Notify = require('common/bootstrap-notify');
    var BaseEvaluation = require('./evaluation');

    exports.run = function() {

        // $("input").attr("value","");
        // $("input").val('');
        // $("#pre_ad_deal_bind1").val(1);
        // $("#pre_ad_deal_bind0").val(0);


        var creator =  new BaseEvaluation({
            element: '#evaluation-create-widget',
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
        

        $(".modal").on('click', '.btn-model-select', function(e){
            $(".table-list tbody tr").removeClass('selected');
            $(this).parents('tr').addClass('selected');
            
            $(e.delegateTarget).find('.modal-footer .btn-confirm').click();
            
        });

        $('body').on('click', '.for-modal', function () {
            $('#modalType').val($(this).data('type'));

        });



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