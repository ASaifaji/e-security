@props(['text'])

<div class="btn-group">
    <button type="button" class="btn btn-primary font-weight-bolder">
    <i class="ki ki-check icon-sm"></i>{{ $text }}</button>
    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
        <ul class="nav nav-hover flex-column">
            <x-button.nav-item href="#" icon="nav-icon flaticon2-reload" text="Create & Continue" />
            <x-button.nav-item href="#" icon="nav-icon flaticon2-add-1" text="Create & add new" />
            <x-button.nav-item href="#" icon="nav-icon flaticon2-cross" text="Create & exit" />
        </ul>
    </div>
</div>