define(function(require, exports, module) {

    var Notify = require('common/bootstrap-notify');
    var Evaluation = require('./evaluation');

    exports.run = function() {

        $("input").attr("value","");
        $("input").val('');
        
        var aa = new Evaluation({
            element: '#evaluation-create-widget'
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