@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/category/index.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/category/index.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/category/index.active') }}</span>
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
                    <h4 class="card-title mg-b-0">{{ __('admin/category/index.label') }}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('admin/category/index.image') }}</th>
                                <th>{{ __('admin/category/index.name') }}</th>
                                <th>{{ __('admin/category/index.category_name') }}</th>
                                <th>{{ __('admin/category/index.status') }}</th>
                                <th>{{ __('admin/category/index.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $categories->firstItem() + $loop->index }}</th>
                                    <td>
                                        <img style="width: 50px;" src="{{ asset('storage/' . $category->image->image) }}"
                                            alt="category_image">
                                    </td>
                                    <th>{{ $category->name }}</th>
                                    <th>{{ isset($category->category) ? $category->category->name : 'Parent' }}</th>
                                    <td>{{ $category->status->lang() }}</td>
                                    <td>
                                        @can('category-list')
                                            <a href="{{ route('admin.categories.show', $category->slug) }}"
                                                class="btn btn-secondary">
                                                {{ __('admin/category/index.show') }}
                                            </a>
                                        @endcan
                                        @can('category-edit')
                                            <a href="{{ route('admin.categories.edit', $category->slug) }}"
                                                class="btn btn-info">
                                                {{ __('admin/category/index.edit') }}
                                            </a>
                                        @endcan
                                        @can('category-delete')
                                            <form class="d-inline"
                                                action="{{ route('admin.categories.destroy', $category->slug) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"
                                                    type="submit">{{ __('admin/category/index.delete') }}</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
