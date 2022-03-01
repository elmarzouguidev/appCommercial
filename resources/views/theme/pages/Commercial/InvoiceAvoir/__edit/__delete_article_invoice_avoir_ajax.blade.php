<script>
    $(".deleteArticle").click(function(event) {
        event.preventDefault();

        var result = confirm('Are you sure you want to delete this record?');

        var article = $(this).data("article");
        var invoice = $(this).data("invoice");
        var token = $("meta[name='csrf-token']").attr("content");

        if (result) {

            $.ajax({
                url: "{{ route('commercial:invoices.delete.article.avoir') }}",
                type: 'DELETE',
                data: {
                    "article": article,
                    "invoice": invoice,
                    "_token": token,
                },
                success: function() {
                    console.log("it Works");
                    $( "#articles_list" ).load(window.location.href + " #articles_list" );
                    window.location.reload();
                }
            });
        }

    });
</script>
