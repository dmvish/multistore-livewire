<ul>
    @foreach($menu as $item)
        @if($item['type'] === 'link')
            <li>
                <a href="{{ $item['url'] }}" class="{{ $isActive($item) ? 'active-link' : null }}" title="{{ $item['text'] }}">{{ $item['text'] }}</a>
            </li>
        @endif

        @if($item['type'] === 'delimiter')
            <li class="delimiter"></li>
        @endif
    @endforeach
</ul>
