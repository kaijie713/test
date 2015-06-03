define(function(require, exports, module) {

    exports.run = function() {
	        
        $('.modal').on('click','.table-list tbody tr',function(){
            $(".table-list tbody tr").removeClass('selected');
            $(this).addClass('selected');
        });

        $(".modal").on('click', '.btn-submit', function(e){
            e.preventDefault();
            $input = $('.modal input');
            var $modal = $(e.delegateTarget);
            $.get($(this).data('url'), $input.serialize(), function(html){
                $modal.html(html);
            });
        });
	        
	}
});
