@props(['title', 'subtitle' => null])
<div class="card-title">
    <h3 class="card-label">{{ $title }}
    @if ($subtitle != null)
        <i class="mr-2"></i>
        <small class="">{{ $subtitle }}</small></h3>
    @else
        </h3>
    @endif
</div>