@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/coupon/index.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/coupon/index.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/coupon/index.active') }}</span>
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
                    <h4 class="card-title mg-b-0">{{ __('admin/coupon/index.label') }}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('admin/coupon/index.code') }}</th>
                                <th>{{ __('admin/coupon/index.value') }}</th>
                                <th>{{ __('admin/coupon/index.type') }}</th>
                                <th>{{ __('admin/coupon/index.max_usage') }}</th>
                                <th>{{ __('admin/coupon/index.number_of_usage') }}</th>
                                <th>{{ __('admin/coupon/index.min_order_value') }}</th>
                                <th>{{ __('admin/coupon/index.expire_date') }}</th>
                                <th>{{ __('admin/coupon/index.status') }}</th>
                                <th>{{ __('admin/coupon/index.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <th scope="row">{{ $coupons->firstItem() + $loop->index }}</th>
                                    <th>{{ $coupon->code }}</th>
                                    <th>
                                        {{ $coupon->type->value == 'percent' ? $coupon->value . '%' : $coupon->value }}
                                    </th>
                                    <th>{{ $coupon->type->lang() }}</th>
                                    <th>{{ $coupon->max_usage }}</th>
                                    <th>{{ $coupon->number_of_usage ?? 0 }}</th>
                                    <th>{{ $coupon->min_order_value }}</th>
                                    <th>{{ $coupon->expire_date }}</th>
                                    <td>{{ $coupon->status->lang() }}</td>
                                    <td>
                                        <a href="{{ route('admin.coupons.edit', $coupon->id) }}" class="btn btn-info">
                                            {{ __('admin/coupon/index.edit') }}
                                        </a>
                                        <form class="d-inline" action="{{ route('admin.coupons.destroy', $coupon->id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"
                                                type="submit">{{ __('admin/coupon/index.delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $coupons->links() }}
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
