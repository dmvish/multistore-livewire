@section('content-header')
    <x-admin.content-header>
        <x-slot name="back" href="{{ route('admin.categories.index') }}"></x-slot>

        @if($categoryId)
            {{ $name }}

            <x-slot name="actions">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-lg btn-purple">{{ __('admin/categories.new_category_button_text') }}</a>
            </x-slot>
        @else
            {{ __('admin/categories.create_page_heading') }}
        @endif
    </x-admin.content-header>
@endsection

<div class="container">
    <div class="flex w-full" x-data="{ section: 'general' }">
        <div class="flex-shrink-0 w-56 mr-8">
            <ul class="text-sm font-medium rounded-md border border-gray-200 divide-y divide-gray-200">
                <li>
                    <a href="javascript:void(0)" @click="section = 'general'" class="inline-flex relative items-center py-3 px-4 w-full text-gray-400 hover:text-indigo-500" :class="{ 'text-indigo-500': (section == 'general') }">
                        General
                        @if($errors->hasAny(['name', 'displayOrder', 'active']))
                            <span class="ml-auto rounded-full w-4 h-4 bg-red-400 text-white text-center text-xs font-medium">!</span>
                        @endif
                    </a>
                </li>
                <li><a href="javascript:void(0)" @click="section = 'media'" class="inline-flex relative items-center py-3 px-4 w-full text-gray-400 hover:text-indigo-500" :class="{ 'text-indigo-500': (section == 'media') }">Media</a></li>
                <li><a href="javascript:void(0)" @click="section = 'brands'" class="inline-flex relative items-center py-3 px-4 w-full text-gray-400 hover:text-indigo-500" :class="{ 'text-indigo-500': (section == 'brands') }">Brands</a></li>
                <li>
                    <a href="javascript:void(0)" @click="section = 'seo'" class="inline-flex relative items-center py-3 px-4 w-full text-gray-400 hover:text-indigo-500" :class="{ 'text-indigo-500': (section == 'seo') }">
                        SEO
                        @if($errors->hasAny(['pageTitle', 'metaDescription', 'metaKeyword']))
                        <span class="ml-auto rounded-full w-4 h-4 bg-red-400 text-white text-center text-xs font-medium">!</span>
                        @endif
                    </a>
                </li>
            </ul>
        </div>
        <div class="w-full">
            @if (session()->has('message'))
                <div class="p-4 mb-4 text-sm text-green-500 font-medium bg-green-100 border border-green-300 rounded-md dark:bg-green-200 dark:text-green-800" role="alert">
                    {{ session('message') }}
                </div>
            @endif

            <form action="#" method="post" wire:submit.prevent="{{ $categoryId ? 'updateCategory' : 'storeCategory' }}">
                <div x-show="section == 'general'">
                    <div class="form-group">
                        <label for="category-name" class="form-group-label form-group-label-required">Name:</label>
                        <div class="form-group-body">
                            <input id="category-name" type="text" class="form-control" wire:model.defer="name" placeholder="Give a name" />
                        </div>

                        @error('name')
                        <div class="form-group-footer">
                            <div class="form-group-errors">{{ $message }}</div>
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category-text" class="form-group-label">Text:</label>
                        <div class="form-group-body">
                            <textarea id="category-text" wire:model.defer="text" rows="4" class="form-control form-textarea" placeholder="Write a text..."></textarea>
                        </div>


                        @error('text')
                        <div class="form-group-footer">
                            <div class="form-group-errors">{{ $message }}</div>
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category-display-order" class="form-group-label">Display Order:</label>
                        <div class="form-group-body">
                            <input id="category-display-order" type="number" min="1" step="1" class="form-control w-64" wire:model.defer="displayOrder" />
                        </div>

                        @error('displayOrder')
                        <div class="form-group-footer">
                            <div class="form-group-errors">{{ $message }}</div>
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-checkbox">
                            <input type="checkbox" id="category-active" value="1" {{ $active ? 'checked="checked"' : null }} wire:model.defer="active">
                            <label for="category-active">Active</label>
                        </div>
                    </div>
                </div>
                <div x-show="section == 'media'">
                    <div class="form-group">
                        <label class="form-group-label">Preview Image:</label>
                        <div class="form-group-body">
                            <input type="file" wire:model.defer="previewImage" />
                        </div>

                        @error('previewImage')
                        <div class="form-group-footer">
                            <div class="form-group-errors">{{ $message }}</div>
                        </div>
                        @enderror
                    </div>

                    @if($previewImageUrl)
                        <div class="form-group">
                            <img src="{{ $previewImageUrl }}" alt="" style="width: 220px;">

                            <div class="form-checkbox">
                                <input type="checkbox" id="category-delete-preview" value="1" wire:model.defer="deletePreview">
                                <label for="category-delete-preview">Delete preview image</label>
                            </div>
                        </div>
                    @endif
                </div>
                <div x-show="section == 'brands'">
                    <div class="form-group">
                        <label for="category-preview-image" class="form-group-label">Brands:</label>
                        <div class="form-group-body">
                            ...
                        </div>
                    </div>
                </div>
                <div x-show="section == 'seo'">
                    <div class="form-group">
                        <label for="category-page-title" class="form-group-label form-group-label-required">Page Title:</label>
                        <div class="form-group-body">
                            <input id="category-page-title" type="text" class="form-control" wire:model.defer="pageTitle" placeholder="Give a name" />
                        </div>

                        @error('pageTitle')
                        <div class="form-group-footer">
                            <div class="form-group-errors">{{ $message }}</div>
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category-meta-description" class="form-group-label">META Description:</label>
                        <div class="form-group-body">
                            <textarea id="category-meta-description" wire:model.defer="metaDescription" rows="4" class="form-control form-textarea" placeholder="Write a description..."></textarea>
                        </div>

                        @error('metaDescription')
                        <div class="form-group-footer">
                            <div class="form-group-errors">{{ $message }}</div>
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category-meta-keywords" class="form-group-label">META Keywords:</label>
                        <div class="form-group-body">
                            <textarea id="category-meta-keywords" wire:model.defer="metaKeywords" rows="4" class="form-control form-textarea" placeholder="Write a description..."></textarea>
                        </div>

                        @error('metaKeywords')
                        <div class="form-group-footer">
                            <div class="form-group-errors">{{ $message }}</div>
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="inline-flex relative items-center">
                    <button type="submit" class="btn btn-purple">
                        Save Category
                    </button>

                    <svg wire:loading class="animate-spin ml-3 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </form>
        </div>
    </div>
</div>
