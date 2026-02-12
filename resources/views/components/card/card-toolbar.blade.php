@props(['backhref' => null])

<div class="card-toolbar">
    @if($backhref != null)
        <a href="{{ $backhref }}" class="btn btn-light-primary font-weight-bolder mr-2">
        <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>
    @endif
    <x-button.btn-group text="Create Ticket"/>
</div>