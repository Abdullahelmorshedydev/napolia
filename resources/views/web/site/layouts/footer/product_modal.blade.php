<!-- Quick-view modal popup start-->
<div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content quick-view-modal">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <div class="quick-view-img"><img src="{{ asset($product->images[0]->image) }}"
                                alt="" class="img-fluid "></div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2>{{ $product->name }}</h2>
                            <h3>{{ $product->discount_type->calc($product->price, $product->discount) . ' ' . __('admin/product/show.pound') }}</h3>
                            <div class="border-product">
                                <h6 class="product-title">{{ __('site/home/product.product_details') }}:</h6>
                                <p>{{ $product->description }}.</p>
                            </div>
                            <div class="product-description border-product">
                                <h6 class="product-title">{{ __('site/home/product.color') }}:</h6>
                                <ul class="color-variant">
                                    @foreach ($product->colors as $color)
                                    <li style="background-color: {{ $color->code }}"></li>
                                    @endforeach
                                </ul>
                                <h6 class="product-title">{{ __('site/home/product.quantity') }}:</h6>
                                <div class="qty-box">
                                    <div class="input-group"><span class="input-group-prepend"><button type="button"
                                                class="btn quantity-left-minus" data-type="minus" data-field=""><i
                                                    class="ti-angle-left"></i></button> </span>
                                        <input type="text" name="quantity" class="form-control input-number"
                                            value="1"> <span class="input-group-prepend"><button type="button"
                                                class="btn quantity-right-plus" data-type="plus" data-field=""><i
                                                    class="ti-angle-right"></i></button></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-buttons">
                                <a href="#" class="btn btn-solid">{{ __('site/home/product.add_to_cart') }}</a>
                                <a href="#" class="btn btn-solid">{{ __('site/home/product.product_details') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick-view modal popup end-->
