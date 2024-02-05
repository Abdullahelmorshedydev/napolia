<!-- latest jquery-->
<script src="{{ asset('site/assets/js/jquery-3.3.1.min.js') }}"></script>

<!-- menu js-->
<script src="{{ asset('site/assets/js/menu.js') }}"></script>

<!-- slick js-->
<script src="{{ asset('site/assets/js/slick.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ asset('site/assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- Bootstrap Notification js-->
<script src="{{ asset('site/assets/js/bootstrap-notify.min.js') }}"></script>

<!-- Theme js-->
<script src="{{ asset('site/assets/js/script.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if (session('success'))
    <script>
        toastr.success("{{ session('success') }}")
    </script>
@endif
@if (session('error'))
    <script>
        toastr.error("{{ session('error') }}")
    </script>
@endif

<script>
    $(window).on('load', function() {
        $('#exampleModal').modal('show');
    });
</script>

<!-- modal js-->
<script src="{{ asset('site/assets/js/modal.js') }}"></script>

@stack('script')