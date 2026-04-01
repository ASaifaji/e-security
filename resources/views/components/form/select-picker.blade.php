@props(['id' => null, 'name', 'label' => null, 'search' => "false", 'required'=>false])

<div class="form-group row">
    @if ($label != null)
        <label class="col-3 text-white-85 font-weight-bold">{{ $label }}</label>
    @endif
    <div class="col-9">
        @if ($required == true)
            <select class="form-control selectpicker" id="{{ $id }}" name="{{ $name }}" data-style="form-control form-control-solid input-dark-custom" data-size="5" data-live-search="{{ $search }}" required>
        @else
            <select class="form-control selectpicker" id="{{ $id }}" name="{{ $name }}" data-style="form-control form-control-solid input-dark-custom" data-size="5" data-live-search="{{ $search }}">
        @endif
            {{ $slot }}
        </select>
        @error($name) <span class="text-danger small">{{ $message }}</span> @enderror
    </div>
</div>