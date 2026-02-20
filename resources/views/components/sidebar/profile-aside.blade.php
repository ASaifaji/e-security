@props(['tab', 'user'])

<!--begin::Aside-->
<div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
    <!--begin::Profile Card-->
    <div class="card card-custom card-stretch">
        <!--begin::Body-->
        <div class="card-body pt-4">
            <div class="m-4"></div>
            <!--begin::User-->
            <div class="d-flex align-items-center">
                <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                    @if ($user->avatar == null)
                        <span class="symbol-label">{{ substr($user->first_name, 0, 1) }}{{ substr($user->last_name, 0, 1) }}</span>
                    @else
                        <div class="symbol-label" style="background-image:url('{{ asset('storage/' . $user->avatar) }}')"></div>
                    @endif
                    <i class="symbol-badge bg-success"></i>
                </div>
                <div>
                    <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{ $user->name() }}</a>
                    <div class="text-muted">{{ $user->department->name }}</div>
                </div>
            </div>
            <!--end::User-->
            <!--begin::Contact-->
            <div class="py-9">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="font-weight-bold mr-2">Email:</span>
                    <a href="#" class="text-muted text-hover-primary">{{ $user->email }}</a>
                </div>
            </div>
            <!--end::Contact-->

            <x-nav.navi>

                <x-nav.navi-item :active="$tab == 'profile'" href="{{ route('profile.index', 'profile') }}" role="tab" text="Profile Overview">
                    <x-slot name="icon">
                        <x-icons.layers />
                    </x-slot>
                </x-nav.navi-item>
                <x-nav.navi-item :active="$tab == 'personal_info'" href="{{ route('profile.index', 'personal_info') }}" role="tab" text="Personal Information">
                    <x-slot name="icon">
                        <x-icons.user />
                    </x-slot>
                </x-nav.navi-item>
                <x-nav.navi-item :active="$tab == 'account_info'" href="{{ route('profile.index', 'account_info') }}" role="tab" text="Account Information">
                    <x-slot name="icon">
                        <x-icons.compiling />
                    </x-slot>
                </x-nav.navi-item>
                <x-nav.navi-item :active="$tab == 'change_pwd'" href="{{ route('profile.index', 'change_pwd') }}" role="tab" text="Change Password">
                    <x-slot name="icon">
                        <x-icons.shield-user />
                    </x-slot>
                </x-nav.navi-item>
                <x-nav.navi-item :active="$tab == 'email_settings'" href="{{ route('profile.index', 'email_settings') }}" role="tab" text="Email Settings">
                    <x-slot name="icon">
                        <x-icons.mail-opened />
                    </x-slot>
                </x-nav.navi-item>

            </x-nav.navi>
        </div>
        <!--end::Body-->
    </div>
    <!--end::Profile Card-->
</div>
<!--end::Aside-->