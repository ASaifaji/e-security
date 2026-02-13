@props(['name', 'label', 'sublabel' => null, 'required' => false])

<div class="form-group row">
    <label class="col-3">{{ $label }}</label>
    <div class="col-9">
        @if ($required == true)
            <input class="form-control form-control-solid" type="text" name="{{ $name }}" value="{{ old($name) }}" required />
        @else
            <input class="form-control form-control-solid" type="text" name="{{ $name }}" value="{{ old($name) }}" />
        @endif
        @if($sublabel != null)
            <span class="form-text text-muted">{{ $sublabel }}</span>
        @endif
        @error($name) <span class="text-danger small">{{ $message }}</span> @enderror
    </div>
</div>