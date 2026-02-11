@props(['href', 'text'])

<li class="menu-item" aria-haspopup="true">
    <a href="{{ $href }}" class="menu-link">
        <span class="menu-text">{{ $text }}</span>
    </a>
</li>