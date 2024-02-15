<script>
    $("li").on("click", function() {
        if ($("li").hasClass("active")) {
            var id = $(this).attr("id");
            document.getElementById("radioInput[" + id + "]").checked = true;
        }
    })
</script>