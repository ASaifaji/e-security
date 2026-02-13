@props(['href' => "#", 'icon', 'text', 'click' => null])

<li class="nav-item">
    <a href="{{ $href }}" class="nav-link" onclick="{{ $click }}">
        <i class="{{ $icon }}"></i>
        <span class="nav-text">{{ $text }}</span>
    </a>
</li>