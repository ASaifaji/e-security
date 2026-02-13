@props(['text'])

<div class="my-5">
    <h3 class="text-dark font-weight-bold mb-10">{{ $text }}</h3>
    {{ $slot }}
</div>