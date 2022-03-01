!function ($) {
    "use strict";

    var AdvancedForm = function () { };

    AdvancedForm.prototype.init = function () {

      // Select2
      $(".select2").select2();

      $(".select2-limiting").select2({
        maximumSelectionLength: 2
      });


      $(".select2-search-disable").select2({
        minimumResultsForSearch: Infinity
      });

      $('.select2-ajax').select2({
        ajax: {
          url: "https://api.github.com/search/repositories",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
              q: params.term, // search term
              page: params.page
            };
          },
          processResults: function (data, params) {
            // parse the results into the format expected by Select2
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data, except to indicate that infinite
            // scrolling can be used
            params.page = params.page || 1;

            return {
              results: data.items,
              pagination: {
                more: (params.page * 30) < data.total_count
              }
            };
          },
          cache: true
        },
        placeholder: 'Search for a repository',
        minimumInputLength: 1

      });
    };
    //init
    $.AdvancedForm = new AdvancedForm, $.AdvancedForm.Constructor = AdvancedForm

}(window.jQuery),

  function ($) {
    "use strict";
    $.AdvancedForm.init();
}(window.jQuery);
