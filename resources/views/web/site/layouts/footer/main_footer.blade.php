<!--footer start -->
<footer class="footer-3">
    @include('web.site.layouts.footer.subscribe')
    @include('web.site.layouts.footer.section')
    @include('web.site.layouts.footer.sub_footer')
</footer>
<!-- footer end -->

@include('web.site.layouts.footer.account_bar')

{{-- @if(!empty($product)) --}}
    @include('web.site.layouts.footer.cart_bar')

    @include('web.site.layouts.footer.wishlist_bar')
{{-- @endif --}}

<!-- tap to top -->
<div class="tap-top">
    <div>
        <i class="fa fa-angle-double-up"></i>
    </div>
</div>
<!-- tap to top End -->

@include('web.site.layouts.footer.script')
