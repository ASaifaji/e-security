@props(['href', 'text', 'icon' => null])

<!--begin::Button-->
<a href="{{ $href }}" class="btn btn-primary font-weight-bolder">
<span class="svg-icon svg-icon-md">
    {{ $icon }}
</span>{{ $text }}</a>
<!--end::Button-->