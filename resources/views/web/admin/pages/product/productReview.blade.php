@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/product/index.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/product/index.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/product/index.active') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!--div-->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">{{ __('admin/product/index.label') }}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('admin/product/index.name') }}</th>
                                <th>{{ __('admin/product/index.email') }}</th>
                                <th>{{ __('admin/product/index.review_title') }}</th>
                                <th>{{ __('admin/product/index.review_message') }}</th>
                                <th>{{ __('admin/product/index.status') }}</th>
                                <th>{{ __('admin/product/index.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $review)
                                <tr>
                                    <th scope="row">{{ $reviews->firstItem() + $loop->index }}</th>
                                    <td>{{ $review->name }}</td>
                                    <td>{{ $review->email }}</td>
                                    <td>{{ $review->review_title }}</td>
                                    <td>{{ $review->review_message }}</td>
                                    <td>{{ $review->status->lang() }}</td>
                                    <td>
                                        @can('product-edit')
                                            @if ($review->status->value == 'active')
                                                <a href="{{ route('admin.products.hide_review', $review->id) }}"
                                                    class="btn btn-info">
                                                    {{ __('admin/product/index.hide') }}
                                                </a>
                                            @elseif ($review->status->value == 'desactive')
                                                <a href="{{ route('admin.products.show_review', $review->id) }}"
                                                    class="btn btn-info">
                                                    {{ __('admin/product/index.show') }}
                                                </a>
                                            @endif
                                        @endcan
                                        @can('product-delete')
                                            <form class="d-inline"
                                                action="{{ route('admin.products.destroy_review', $review->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"
                                                    type="submit">{{ __('admin/product/index.delete') }}</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $reviews->links() }}
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
