@props(['title', 'subtitle' => null])
<div class="card-title">
    <h3 class="card-label text-white-85">{{ $title }}
    @if ($subtitle != null)
        <i class="mr-2"></i>
        <small class="text-muted-slate">{{ $subtitle }}</small></h3>
    @else
        </h3>
    @endif
</div>