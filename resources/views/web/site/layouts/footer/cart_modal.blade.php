<!-- Add to cart modal popup start-->
<div class="modal fade bd-example-modal-lg theme-modal cart-modal" id="addtocart" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body modal1">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="modal-bg addtocart">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="media">
                                    <a href="#">
                                        <img class="img-fluid  pro-img"
                                            src="{{ asset('site/assets/images/product/4.jpg') }}" alt="">
                                    </a>
                                    <div class="media-body align-self-center text-center">
                                        <a href="#">
                                            <h6>
                                                <i class="fa fa-check"></i>Item
                                                <span>men full sleeves</span>
                                                <span> successfully added to your Cart -</span>
                                                <span>blue,</span>
                                                <span>XS</span>
                                            </h6>
                                        </a>
                                        <div class="buttons">
                                            <a href="cart.html" class="view-cart btn btn-solid">Your cart</a>
                                            <a href="checkout.html" class="checkout btn btn-solid">Check out</a>
                                            <a href="#" data-bs-dismiss="modal"
                                                class="continue btn btn-solid">Continue shopping</a>
                                        </div>

                                        <div class="upsell_payment">
                                            <img src="{{ asset('site/assets/images/payment_cart.png') }}"
                                                class="img-fluid " alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add to cart modal popup end-->
