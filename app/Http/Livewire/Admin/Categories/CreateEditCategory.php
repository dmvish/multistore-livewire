<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateEditCategory extends Component
{
    use WithFileUploads;

    public $categoryId;
    public $name;
    public $text;
    public $previewImage;
    public $pageTitle;
    public $metaDescription;
    public $metaKeywords;
    public $displayOrder = 10;
    public $active = false;

    public $previewImageName;
    public $previewImageUrl;

    public $deletePreview = false;

    protected $rules = [
        'name' => 'required|string|min:6|max:190',
        'text' => 'nullable|string|max:190',
        'displayOrder' => 'required|min:1|numeric|integer',
        'active' => 'required|boolean',
        'previewImage' => 'nullable|image|max:2048',
        'pageTitle' => 'required|string|min:6|max:190',
        'metaDescription' => 'nullable|string|max:190',
        'metaKeywords' => 'nullable|string|max:190'
    ];

    public function mount(Category $category)
    {
        if(!$category->exists){
            return;
        }

        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->text = $category->text;
        $this->previewImageName = $category->preview_image;
        $this->pageTitle = $category->page_title;
        $this->metaDescription = $category->meta_description;
        $this->metaKeywords = $category->meta_keywords;
        $this->displayOrder = $category->display_order;
        $this->active = $category->active;

        if($category->preview_image){
            $this->previewImageUrl = Storage::disk('media_local')->url($category->preview_image);
        }
    }

    public function render()
    {
        return livewire_admin_full_page_component('categories.create-edit-category');
    }

    public function storeCategory(): void
    {
        $this->validate();

        $data = $this->prepareDataAndComponentProperties();

        Category::create($data);

        $this->reset();

        session()->flash('message', 'Category successfully created');
    }

    public function updateCategory(): void
    {
        $this->validate();

        $data = $this->prepareDataAndComponentProperties();

        Category::where('id', $this->categoryId)->update($data);

        $this->reset([
            'previewImage',
            'deletePreview'
        ]);

        session()->flash('message', 'Category successfully updated');
    }

    private function prepareDataAndComponentProperties(): array
    {
        $data = [
            'name' => $this->name,
            'text' => $this->text,
            'preview_image' => $this->handlePreviewImage(),
            'page_title' => $this->pageTitle,
            'meta_description' => $this->metaDescription,
            'meta_keywords' => $this->metaKeywords,
            'display_order' => $this->displayOrder,
            'active' => $this->active,
        ];

        $this->previewImageName = $data['preview_image'];
        $this->previewImageUrl = $data['preview_image'] ? Storage::disk('media_local')->url($data['preview_image']) : null;

        return $data;
    }

    private function handlePreviewImage(): ?string
    {
        $disk = Storage::disk('media_local');
        $filename = $this->previewImageName;

        if($this->previewImage || $this->deletePreview){
            if(filled($this->previewImageUrl)){
                $disk->delete($this->previewImageName);
            }

            $filename = null;
        }

        if($this->previewImage){
            $filename = $this->previewImage->store('/', 'media_local');
        }

        return $filename;
    }
}
