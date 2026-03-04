@props(['href', 'text'])
<li class="menu-item menu-item-submenu" data-menu-toggle="click" aria-haspopup="true">
    <a href="{{ $href }}" class="menu-link menu-toggle">
        <span class="menu-text">{{ $text }}</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu menu-submenu-classic menu-submenu-left" style="background-color: #121926; border: 1px solid #334155">
        <ul class="menu-subnav">
            {{ $slot }}
        </ul>
    </div>
</li>