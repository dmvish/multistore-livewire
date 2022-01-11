@props(['back'])

<div class="flex items-center pb-10">
    <div class="flex items-center">
        @if(isset($back))
        <a {{ $back->attributes->merge(['class' => 'mr-4']) }}>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 text-indigo-500 hover:text-indigo-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
            </svg>
        </a>
        @endif
        <h1 class="text-4xl">
            {{ $slot }}
        </h1>
    </div>
    @if(isset($actions))
        <div class="ml-auto">
            {{ $actions }}
        </div>
    @endif
</div>
