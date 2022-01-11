@extends('content.admin.layouts.base')

@section('content-header')
    <div class="flex items-center mb-10">
        <div class="heading-text">
            <h1 class="text-4xl">Dashboard</h1>
        </div>
        <div class="ml-auto">
            <a href="#" class="btn btn-lg btn-purple">More Actions</a>
            <a href="#" class="btn btn-lg btn-purple-outline ml-4">Save</a>
        </div>
    </div>
    <div class="tab-nav">
        <a href="#" class="tab-nav-item item-active">All Products</a>
        <a href="#" class="tab-nav-item">Drafts</a>
        <a href="#" class="tab-nav-item">Coming soon</a>
        <a href="#" class="tab-nav-item">Published</a>
    </div>
@endsection

@section('content')
    <div>Dashboard</div>
@endsection
