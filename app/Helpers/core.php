<?php

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

if (! function_exists('admin_page_view')) {
    /**
     * Get the evaluated admin view contents for the given view.
     *
     * @param string|null $view
     * @param Arrayable|array $data
     * @param array $mergeData
     * @return View|Factory
     */
    function admin_page_view(string $view = null, $data = [], array $mergeData = [])
    {
        return view(sprintf('content.admin.pages.%s', $view), $data, $mergeData);
    }
}
