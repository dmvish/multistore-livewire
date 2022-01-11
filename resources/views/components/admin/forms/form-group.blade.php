{{--<div class="form-group">
    <label class="form-label form-label-required" for="test">Label Text</label>
    <input id="{{ $id }}" type="{{ $type }}" placeholder="{{ $placeholder }}" {{ $attributes->merge(['class' => 'form-input']) }} />
    <div class="form-help">Help text</div>
    <div class="form-errors">
        <div>Error 1</div>
        <div>Error 2</div>
    </div>
</div>--}}

<div id="{{ $id }}" class="form-group">
    <label for="{{ $labelFor }}" class="form-label">{{ $label }}</label>
    <div>
        {{ $slot }}

        @if(isset($description))
            <div class="form-help">Let us know your name.</div>
        @endif

        @if(isset($errs))
            <div class="form-errors">{{ $errs }}</div>
        @endif
    </div>
</div>


