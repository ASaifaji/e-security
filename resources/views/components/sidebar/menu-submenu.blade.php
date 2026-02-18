@props(['text', 'icon' => null, 'active' => false, 'icon'])

<li class="menu-item menu-item-submenu {{ $active ? 'menu-item-active menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            {{ $icon }}
        </span>
        <span class="menu-text">{{ $text }}</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            {{ $slot }}
        </ul>
    </div>
</li>