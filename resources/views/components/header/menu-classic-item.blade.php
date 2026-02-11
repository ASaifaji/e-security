@props(['href', 'text', 'icon' => null, 'active' => false, 'badges' => false, 'badgeText' => null])

<li class="menu-item" aria-haspopup="true">
    <a href="{{ $href }}" class="menu-link">
        <span class="svg-icon menu-icon">
            {{ $icon }}
        </span>
        <span class="menu-text">{{ $text }}</span>
        @if($badges)
        <span class="menu-label">
            <span class="label label-success label-rounded">{{ $badgeText }}</span>
        </span>
        @endif
    </a>
</li>