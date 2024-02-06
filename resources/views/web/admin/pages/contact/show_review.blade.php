@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/review/index.title_show'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/review/index.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/review/index.title_show') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!--div-->
    <div class="col-xl-12">
        <div class="row">
            <div class="col-12  col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <h5 class="card-text d-block">{{ __('site/auth/profile.name') . ' : ' . $review->name }}</h5>
                                <h5 class="card-text d-block">{{ __('site/cart.product_name') . ' : ' . $review->product->name }}</h5>
                                <p class="card-text d-block">{{ __('site/auth/profile.email') . ' : ' . $review->email }}</p>
                                <p class="card-text d-block">{{ __('site/product/index.review_title') . ' : ' . $review->review_title }}</p>
                                <p class="card-text">{{ __('site/product/index.review_message') . ' : ' . $review->review_message }}</p>
                                @if ($review->status->value == 'unview')
                                    @can('message-view')
                                        <a href="{{ route('admin.contact.view', $review->id) }}"
                                            class="card-link text-secondary">{{ __('admin/review/index.markview') }}</a>
                                    @endcan
                                @elseif($review->status->value == 'view')
                                    @can('message-unview')
                                        <a href="{{ route('admin.contact.unview', $review->id) }}"
                                            class="card-link text-secondary">{{ __('admin/review/index.markunview') }}</a>
                                    @endcan
                                @endif
                                @can('review-delete')
                                    <form class="d-inline" action="{{ route('admin.contact.destroy_review', $review->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                            type="submit">{{ __('admin/review/index.delete') }}</button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
