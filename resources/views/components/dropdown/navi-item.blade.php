@props(['href', 'text', 'icon' => null])

<li class="navi-item">
    <a href="{{ $href }}" class="navi-link">
        <span class="navi-icon">
            <i class="{{ $icon }}"></i>
        </span>
        <span class="navi-text">{{ $text }}</span>
    </a>
</li>