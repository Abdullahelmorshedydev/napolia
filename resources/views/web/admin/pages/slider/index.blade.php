@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/slider/index.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/slider/index.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/slider/index.active') }}</span>
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
                    <h4 class="card-title mg-b-0">{{ __('admin/slider/index.label') }}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('admin/slider/index.image') }}</th>
                                <th>{{ __('admin/slider/index.status') }}</th>
                                <th>{{ __('admin/slider/index.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                                <tr>
                                    <th scope="row">{{ $sliders->firstItem() + $loop->index }}</th>
                                    <td>
                                        <img width="100px" src="{{ asset($slider->image->image) }}" alt="slider_image">
                                    </td>
                                    <td>{{ $slider->status->lang() }}</td>
                                    <td>
                                        @can('slider-edit')
                                            <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-info">
                                                {{ __('admin/slider/index.edit') }}
                                            </a>
                                        @endcan
                                        @can('slider-delete')
                                            <form class="d-inline" action="{{ route('admin.sliders.destroy', $slider->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"
                                                    type="submit">{{ __('admin/slider/index.delete') }}</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $sliders->links() }}
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
