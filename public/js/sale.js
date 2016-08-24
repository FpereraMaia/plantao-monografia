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

        $('.link-value').on('click', function() {
            $(this).hide();
            $(this).closest('td').find('span').show();
        });

        $('.save-price').on('click', function() {
            var self = this;
            $(self).closest('span').find('input').attr('readonly', 'readonly');
            $(self).hide();
            var tipo = $(self).attr('data-tipo');
            var data = {
                id: $(self).attr('data-venda'),
                data: $(self).closest('span').find('input').val()
            };
            if (tipo == 'corretor') {
                var request = saleService.savePercentage(data);
            } else if (tipo == 'preco') {
                var request = saleService.savePrice(data);
            }

            request.done(function(retorno) {
                    $(self).closest('span').find('input').val(retorno);
                    $(self).closest('span').find('input').unmask();
                    $(self).closest('span').find('input').mask('000.000.000.000.000,00', {
                        reverse: true
                    });
                    $(self).closest('span').find('input').removeAttr('readonly');
                    $(self).closest('td').find('span').hide();
                    $(self).closest('td').find('.link-value').html($(self).closest('span').find('input').val());
                    $(self).closest('td').find('.link-value').show();
                    $(self).show();

                })
                .fail(function(jqxhr, textStatus) {
                    console.log('vish deu erro');
                }, "json");
        });
    };

    var init = function() {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
            $('.selectpicker').selectpicker('mobile');
        }
        $('.link-value').closest('td').find('span').hide();
        actions();
    }

    return {
        init: init
    };
})(document, window, jQuery, statusService, corretorService);

$(document).ready(function() {
    sale.init();
});
