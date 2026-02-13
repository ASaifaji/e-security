@props(['text', 'icon' => null])

<!--begin::Dropdown-->
<div class="dropdown dropdown-inline mr-2">
    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="svg-icon svg-icon-md">
            {{ $icon }}
        </span>{{ $text }}
    </button>
    <!--begin::Dropdown Menu-->
    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
        <!--begin::Navigation-->
        <ul class="navi flex-column navi-hover py-2">
            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
            {{ $slot }}
        </ul>
    </div>
</div>