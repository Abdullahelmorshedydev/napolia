<script>
    $('.addcart-box').on("click", function() {
        var clickedBtn = $(this).data("id");
        document.getElementById('submitCart' + clickedBtn).addEventListener('click', function() {
            var formData = $("#myForm" + clickedBtn).serialize();

            $.ajax({
                url: "{{ route('cart.add.to.cart') }}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: formData,
                success: function(response) {
                    toastr.success(response.message);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
<script>
    $('.productCartButton').on("click", function() {
        var formData = $("#myForm").serialize();
        $.ajax({
            url: "{{ route('cart.add.to.cart') }}",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: formData,
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
    $('.productCartButton').on("click", function() {
        var clickedBtn = $(this).data("id");
        var formData = $("#myForm" + clickedBtn).serialize();
        $.ajax({
            url: "{{ route('cart.add.to.cart') }}",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: formData,
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
    $('.deleteItem').on("click", function() {
        var clickedBtn = $(this).data("id");
        $.ajax({
            url: "{{ route('cart.delete.item') }}",
            method: "DELETE",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                'id': clickedBtn,
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
