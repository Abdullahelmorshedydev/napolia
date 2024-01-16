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

<script>
    $(window).on('load', function() {
        $('#exampleModal').modal('show');
    });
</script>

<!-- modal js-->
<script src="{{ asset('site/assets/js/modal.js') }}"></script>

@stack('script')