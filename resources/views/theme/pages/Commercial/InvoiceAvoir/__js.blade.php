<script>
    function getIds(checkboxName) {
        let checkBoxes = document.getElementsByName(checkboxName);
        let ids = Array.prototype.slice.call(checkBoxes)
            .filter(ch => ch.checked == true)
            .map(ch => ch.value);
        return ids;
    }

    function filterResults() {

        let comanyIds = getIds("company");

        let statusIds = getIds("status");

        let href = '{{ collect(request()->segments())->last() }}?';

        if (comanyIds.length) {
            href += 'appFilter[GetCompany]=' + comanyIds;
        }

        if (statusIds.length) {
            href += '&appFilter[GetStatus]=' + statusIds;
        }

        document.location.href = href;
    }

    document.getElementById("filter").addEventListener("click", filterResults);

    $(".chk-filter").on("click", function() {
        if (this.checked) {
            $('#filter').click();
        }
    });
</script>
