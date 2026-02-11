@props(['href', 'text', 'width' => '1000px'])

<li class="menu-item menu-item-submenu" data-menu-toggle="click" aria-haspopup="true">
    <a href="{{ $href }}" class="menu-link menu-toggle">
        <span class="menu-text">{{ $text }}</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu menu-submenu-fixed menu-submenu-left" style="width:{{ $width }}">
        <div class="menu-subnav">
            <ul class="menu-content">
                {{ $slot }}
            </ul>
        </div>
    </div>
</li>