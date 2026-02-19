@props(['href' => null, 'icon', 'text', 'active' => null])

<div class="navi-item mb-2">
    <a href="{{ $href }}" class="navi-link py-4 {{ $active ? 'active' : '' }}">
        <span class="navi-icon mr-2">
            <span class="svg-icon">
                {{ $icon }}
            </span>
        </span>
        <span class="navi-text font-size-lg">{{ $text }}</span>
    </a>
</div>