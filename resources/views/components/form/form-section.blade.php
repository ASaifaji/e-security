@props(['text'])

<div class="my-5">
    <h3 class="text-white-85 font-weight-bold mb-10">{{ $text }}</h3>
    {{ $slot }}
</div>