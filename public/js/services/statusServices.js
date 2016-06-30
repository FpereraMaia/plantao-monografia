var statusService = (function(window, document, $) {

    var url = APP_URL + "/status";

    function store(data, el) {
      var retorno = {};
        $.post(url, data)
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
        store: store
    };

})(window, document, jQuery);
