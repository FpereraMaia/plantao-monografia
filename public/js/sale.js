var sale = (function(document, window, $, status, corretor) {

    var actions = function() {
        $('#datatable-responsive').on('change', '.selectpicker', function() {
            var self = this;
            $(this).attr('disabled', true);
            var tipo = $(this).attr('data-tipo');
            var data = {
                "sale": $(this).attr('data-value'),
                "item": $(this).val()
            };

            switch (tipo) {
                case 'status':
                    status.store(data, self);
                    break;
                case 'corretor':
                    corretor.storeWithVenda(data, self);
                    break;
                default:

            }
        });
    };

    var init = function() {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
            $('.selectpicker').selectpicker('mobile');
        }
        actions();
    }

    return {
        init: init
    };
})(document, window, jQuery, statusService, corretorService);

$(document).ready(function() {
    sale.init();
});
