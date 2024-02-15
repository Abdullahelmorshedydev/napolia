<script>
    $('.addwishlist-box').on("click", function() {
        var clickedBtn = $(this).data("id");
        $.ajax({
            url: "{{ route('favourites.store') }}",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                'id': clickedBtn
            },
            success: function(response) {
                toastr.success(response.message);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
</script>
<script>
    $('.removewishlist-box').on("click", function() {
        var clickedBtn = $(this).data("id");
        $.ajax({
            url: "{{ route('favourites.delete') }}",
            method: "DELETE",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                'id': clickedBtn
            },
            success: function(response) {
                toastr.success(response.message);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
</script>
