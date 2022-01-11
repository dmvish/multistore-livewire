<?php

namespace App\View\Components\Admin;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class MainMenu extends Component
{
    public function menu(): array
    {
        return [
            ['type' => 'link',  'url' => route('admin.dashboard'), 'text' => 'Dashboard'],

            ['type' => 'delimiter'],

            ['type' => 'link',  'url' => route('admin.orders.list'), 'text' => 'Orders'],
            ['type' => 'link',  'url' => route('admin.carts.list'), 'text' => 'Carts'],
            ['type' => 'link',  'url' => route('admin.customers.list'), 'text' => 'Customers'],
            ['type' => 'link',  'url' => route('admin.email-replies.list'), 'text' => 'Email Replies'],

            ['type' => 'delimiter'],

            ['type' => 'link',  'url' => route('admin.categories.index'), 'text' => 'Categories'],
            ['type' => 'link',  'url' => route('admin.brands.list'), 'text' => 'Brands'],
            ['type' => 'link',  'url' => route('admin.products.list'), 'text' => 'Products'],
            ['type' => 'link',  'url' => route('admin.attributes.list'), 'text' => 'Attributes'],
            ['type' => 'link',  'url' => route('admin.labels.list'), 'text' => 'Labels'],
            ['type' => 'link',  'url' => route('admin.promotions.list'), 'text' => 'Promotions'],

            ['type' => 'delimiter'],

            ['type' => 'link',  'url' => route('admin.pages.list'), 'text' => 'Pages']
        ];
    }

    public function isActive(array $item): bool
    {
        return Str::startsWith(url()->current(), $item['url']);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render()
    {
        return view('components.admin.main-menu');
    }
}
