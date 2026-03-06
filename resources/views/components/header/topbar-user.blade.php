@php
    $user = Auth::user()
@endphp
<!--begin::User-->
<div class="topbar-item">
    <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
        <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
        <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ $user->name() }}</span>
        <span class="symbol symbol-35 symbol-light-success">
            @if ($user->avatar == null)
                <span class="symbol-label font-weight-bold text-white-85 bg-primary">{{ substr($user->first_name, 0, 1) }}{{ substr($user->last_name, 0, 1) }}</span>
            @else
                <div class="symbol-label" style="background-image:url('{{ asset('storage/' . $user->avatar) }}')"></div>
            @endif
        </span>
    </div>
</div>
<!--end::User-->