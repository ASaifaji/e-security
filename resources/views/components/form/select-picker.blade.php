@props(['id' => null, 'label', 'search' => "false", 'required'=>false])

<div class="form-group row">
    <label class="col-3">{{ $label }}</label>
    <div class="col-9">
        @if ($required == true)
            <select class="form-control selectpicker" id="{{ $id }}" data-style="form-control form-control-solid text-dark" data-size="5" data-live-search="{{ $search }}" required>
        @else
            <select class="form-control selectpicker" id="{{ $id }}" data-style="form-control form-control-solid text-dark" data-size="5" data-live-search="{{ $search }}">
        @endif
            {{ $slot }}
        </select>
    </div>
</div>