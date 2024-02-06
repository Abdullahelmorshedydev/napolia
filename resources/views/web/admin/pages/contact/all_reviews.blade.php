@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/review/index.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/review/index.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/review/index.active') }}</span>
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
                    <h4 class="card-title mg-b-0">{{ __('admin/review/index.label') }}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('admin/review/index.product_name') }}</th>
                                <th>{{ __('admin/review/index.name') }}</th>
                                <th>{{ __('admin/review/index.email') }}</th>
                                <th>{{ __('admin/review/index.review_title') }}</th>
                                <th>{{ __('admin/review/index.review_review') }}</th>
                                <th>{{ __('admin/review/index.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $review)
                                <tr>
                                    <th scope="row">{{ $reviews->firstItem() + $loop->index }}</th>
                                    <th>{{ $review->product->name }}</th>
                                    <th>{{ $review->name }}</th>
                                    <th>{{ $review->email }}</th>
                                    <th>{{ $review->review_title }}</th>
                                    <th>{{ Str::limit($review->review_message, 20, '...') }}</th>
                                    <td>
                                        <a href="{{ route('admin.contact.show_review', $review->id) }}"
                                            class="btn btn-secondary">
                                            {{ __('admin/review/index.show') }}
                                        </a>
                                        @if ($review->status->value == 'unview')
                                            @can('review-read')
                                                <a href="{{ route('admin.contact.read', $review->id) }}"
                                                    class="btn btn-info">{{ __('admin/review/index.markview') }}</a>
                                            @endcan
                                        @elseif($review->status->value == 'view')
                                            @can('review-unread')
                                                <a href="{{ route('admin.contact.unread', $review->id) }}"
                                                    class="btn btn-info">{{ __('admin/review/index.markunview') }}</a>
                                            @endcan
                                        @endif
                                        @can('review-delete')
                                            <form class="d-inline"
                                                action="{{ route('admin.contact.destroy_review', $review->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"
                                                    type="submit">{{ __('admin/review/index.delete') }}</button>
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
