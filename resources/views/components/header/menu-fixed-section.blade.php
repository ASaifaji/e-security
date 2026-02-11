@props(['text'])

<li class="menu-item">
    <h3 class="menu-heading menu-toggle">
        <i class="menu-bullet menu-bullet-dot">
            <span></span>
        </i>
        <span class="menu-text">Task Reports</span>
        <i class="menu-arrow"></i>
    </h3>
    <ul class="menu-inner">
        {{ $slot }}
    </ul>
</li>