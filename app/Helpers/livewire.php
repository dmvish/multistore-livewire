<?php

if (! function_exists('livewire_admin_component')) {
    function livewire_admin_component(string $view, $data = [], array $mergeData = [])
    {
        return view(sprintf('livewire.admin.%s', $view), $data, $mergeData);
    }
}

if (! function_exists('livewire_admin_full_page_component')) {
    function livewire_admin_full_page_component(string $view, $data = [], array $mergeData = [])
    {
        return livewire_admin_component($view, $data, $mergeData)->extends('livewire.admin.layouts.base');
    }
}
