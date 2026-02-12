@props(['href', 'icon', 'text'])

<li class="nav-item">
    <a href="{{ $href }}" class="nav-link">
        <i class="{{ $icon }}"></i>
        <span class="nav-text">{{ $text }}</span>
    </a>
</li>