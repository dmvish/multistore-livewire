@extends('content.admin.layouts.base')

@section('content-header')
    <div class="flex items-center pb-10">
        <div class="heading-text">
            <h1 class="text-4xl">{{ __('admin/categories.list_page_heading') }}</h1>
        </div>
        <div class="ml-auto">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-lg btn-purple">{{ __('admin/categories.new_category_button_text') }}</a>
        </div>
    </div>
    <div class="tab-nav">
        <a href="#" class="tab-nav-item item-active">{{ __('admin/categories.content_tab_all_categories_text') }}</a>
        <a href="#" class="tab-nav-item">...</a>
    </div>
@endsection

@section('content')
    <div class="md:container md:mx-auto">
        <livewire:admin.categories.categories-list />
    </div>
@endsection
