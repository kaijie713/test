define(function(require, exports, module) {

    var Notify = require('common/bootstrap-notify');
    require('jquery.sortable');

    exports.run = function() {

        var sortList = function($list) {
            var data = $list.sortable("serialize").get();
            $.post($list.data('sortUrl'), {ids:data}, function(response){
                var code = 0;
                $list.find('li').each(function() {
                    code ++;
                    $(this).find('.code').text(code);
                });
            });
        };

        var $list = $(".site-stats").sortable({
            distance: 20,
            onDrop: function (item, container, _super) {
                _super(item, container);
                sortList($list);
            },
            placeholder: "<li class='bg_lh placeholder'>&nbsp;</li>",
            serialize: function(parent, children, isContainer) {
                return isContainer ? children : parent.attr('id');
            },
        });

        $list.on('click', '.delete-btn', function(e) {
            var $btn = $(e.currentTarget);

            $.get($(this).data('url'), function(response) {
                $btn.parents('li').remove();
                sortList($list);
                Notify.success('此授权已删除！');
                if($list.find('li').length<=0)
                    $(".empty").removeClass('hide');
            }, 'json');
        });



        $(".modal").on('click', '.btn-confirm', function(e){
            var $selected = $('.selected');
            if ($selected.length>0) {
                var uId = $selected.attr('id');
                var evaId = $("#evaId").val();
                $.get($(".set-user").data('add'), {evaId:evaId, uId:uId}, function(response) {
                    if (response) {
                        $(".site-stats").append(response);
                        Notify.success('添加成功！');
                        if($(".empty").length>0)
                            $(".empty").addClass('hide');
                    } else {
                        Notify.danger('授权已设置该用户或该用户不存在！');
                    }
                }, 'html');
                
            }

            $("#modal").modal('hide');

        });

        $(".modal").on('click', '.icon-remove-sign', function(e){
            var $selected = $('.selected');
            if ($selected.length>0) {
                var uId = $selected.attr('id');
                var evaId = $("#evaId").val();
                $.get($(".set-user").data('add'), {evaId:evaId, uId:uId}, function(response) {
                    if (response) {
                        $(".site-stats").append(response);
                        Notify.success('添加成功！');
                    } else {
                        Notify.danger('授权已设置该用户或该用户不存在！');
                    }
                }, 'html');
                
            }

            // $("#modal").modal('hide');

        });

        $(".modal").on('click', '.btn-model-select', function(e){
            $(".table-list tbody tr").removeClass('selected');
            $(this).parents('tr').addClass('selected');
            
            $(e.delegateTarget).find('.modal-footer .btn-confirm').click();
            
        });

      
    };

});