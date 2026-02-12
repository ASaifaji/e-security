@props(['label', 'sublabel' => null, 'required' => false])

<div class="form-group row">
    <label class="col-3">{{ $label }}</label>
    <div class="col-9">
        @if ($required == true)
            <input class="form-control form-control-solid" type="text" value="" required />
        @else
            <input class="form-control form-control-solid" type="text" value="" />
        @endif
        @if($sublabel != null)
            <span class="form-text text-muted">{{ $sublabel }}</span>
        @endif
    </div>
</div>