@props(['href', 'icon' => null, 'text', 'active' => false])

<li class="menu-item {{ $active ? 'menu-item-active' : '' }}" aria-haspopup="true">
    <a href="{{ $href }}" class="menu-link">
        <span class="svg-icon menu-icon">
            {{ $icon }}
        </span>
        <span class="menu-text">{{ $text }}</span>
    </a>
</li>