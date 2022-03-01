!function ($) {
    "use strict";
  
    var AdvancedForm = function () { };
  
    AdvancedForm.prototype.init = function () {
  
      $('.select2-ajax').select2({
        ajax: {
          url: "http://localhost:8000/api/clients",
          dataType: 'json',
          delay: 250,
          data: function (params) {
              //console.log(params);
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
            //console.log(data);
  
            return {
              results: data.payload,
              pagination: {
                more: (params.page * 30) < data.total_count
              }
            };
          },
          cache: true
        },
        placeholder: 'Chercher un client',
        minimumInputLength: 1,
        templateResult: formatRepo,
        templateSelection: formatRepoSelection
      });

      
    function formatRepo(repo) {
      if (repo.loading) {
        return repo.entreprise;
      }

      var $container = $(
        "<div class='select2-result-repository clearfix'>" +
        "<div class='select2-result-repository__avatar'><img src='" + repo.logo + "' /></div>" +
        "<div class='select2-result-repository__meta'>" +
        "<div class='select2-result-repository__title'></div>" +
        "<div class='select2-result-repository__description'></div>" +
        "<div class='select2-result-repository__statistics'>" +
        "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> </div>" +
        "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> </div>" +
        "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> </div>" +
        "</div>" +
        "</div>" +
        "</div>"
      );

      $container.find(".select2-result-repository__title").text(repo.entreprise);
      $container.find(".select2-result-repository__description").text(repo.contact);
      /*$container.find(".select2-result-repository__forks").append(repo.forks_count + " Forks");
      $container.find(".select2-result-repository__stargazers").append(repo.stargazers_count + " Stars");
      $container.find(".select2-result-repository__watchers").append(repo.watchers_count + " Watchers");*/

      return $container;
    }

    function formatRepoSelection(repo) {
      return repo.entreprise || repo.contact;
    }


    function formatState(state) {
      if (!state.id) {
        return state.text;
      }
      var baseUrl = "assets/images/flags/select2";
      var $state = $(
        '<span><img src="' + baseUrl + '/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>'
      );
      return $state;
    };
    }
    //init
    $.AdvancedForm = new AdvancedForm, $.AdvancedForm.Constructor = AdvancedForm

}(window.jQuery),

  function ($) {
    "use strict";
    $.AdvancedForm.init();
}(window.jQuery);