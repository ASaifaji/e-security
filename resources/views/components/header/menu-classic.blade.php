@props(['href', 'text'])
<li class="menu-item menu-item-submenu" data-menu-toggle="click" aria-haspopup="true">
    <a href="{{ $href }}" class="menu-link menu-toggle">
        <span class="menu-text">{{ $text }}</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu menu-submenu-classic menu-submenu-left">
        <ul class="menu-subnav">
            {{ $slot }}
        </ul>
    </div>
</li>