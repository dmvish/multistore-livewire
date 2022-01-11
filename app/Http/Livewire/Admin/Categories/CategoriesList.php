<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Collection;

class CategoriesList extends Component
{
    public $sf = 'display_order';
    public $sd = 'desc';

    protected $queryString = ['sf', 'sd'];

    public function getCategoriesProperty(): Collection
    {
        return Category::orderBy($this->sf, $this->sd)->get();
    }

    public function reorderList(string $column): void
    {
        if($this->sf === $column){
            $this->sd = ($this->sd === 'desc') ? 'asc' : 'desc';
        }else{
            $this->sf = $column;
        }
    }

    public function getSortingKeyProperty(): bool
    {
        return sprintf('%s.%s', $this->sf, $this->sd);
    }

    public function render()
    {
        return view('livewire.admin.categories.categories-list');
    }
}
