var saleService = (function(window, document, $) {

    var url = APP_URL + "/venda";

    function savePrice(data) {
        return $.post(url + "/salvar-preco", data);
    };

    function savePercentage(data) {
      return $.post(url + "/salvar-porcentagem", data);
    };
    // explicitly return public methods when this object is instantiated
    return {
        savePrice: savePrice,
        savePercentage : savePercentage
    };

})(window, document, jQuery);
