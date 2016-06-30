var corretorService = (function(window, document, $) {

    var url = APP_URL + "/corretor";

    function storeWithVenda(data, el) {
      var retorno = {};
        $.post(url + "/venda", data)
        .done(function(retorno){
          if (typeof el !== "undefined") {
              $(el).attr('disabled', false);
          }
          retorno = retorno;
        })
        .fail(function(jqxhr, textStatus){

        }, "json");

        return retorno;
    }

    // explicitly return public methods when this object is instantiated
    return {
        storeWithVenda: storeWithVenda
    };

})(window, document, jQuery);
