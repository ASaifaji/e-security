@props(['href', 'text', 'icon' => null])

<!--begin::Button-->
<a href="{{ $href }}" class="btn btn-security-primary font-weight-bolder">
<span class="svg-icon svg-icon-md">
    {{ $icon }}
</span>{{ $text }}</a>
<!--end::Button-->