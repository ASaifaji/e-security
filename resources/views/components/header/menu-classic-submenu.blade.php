@props(['href', 'text', 'icon' => null, 'active' => false])

<li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
    <a href="{{ $href }}" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            {{ $icon }}
        </span>
        <span class="menu-text">{{ $text }}</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu menu-submenu-classic menu-submenu-right" style="background-color: #121926; border: 1px solid #334155">
        <ul class="menu-subnav">
            {{ $slot }}
        </ul>
    </div>
</li>