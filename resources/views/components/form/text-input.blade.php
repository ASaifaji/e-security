@props(['name', 'label', 'sublabel' => null, 'required' => false])

<div class="form-group row">
    <label class="col-3 text-white-85 font-weight-bold">{{ $label }}</label>
    <div class="col-9">
        @if ($required == true)
            <input class="form-control form-control-solid input-dark-custom" type="text" name="{{ $name }}" value="{{ old($name) }}" required />
        @else
            <input class="form-control form-control-solid input-dark-custom" type="text" name="{{ $name }}" value="{{ old($name) }}" />
        @endif
        @if($sublabel != null)
            <span class="form-text text-muted-slate mt-2">{{ $sublabel }}</span>
        @endif
        @error($name) <span class="text-danger small">{{ $message }}</span> @enderror
    </div>
</div>