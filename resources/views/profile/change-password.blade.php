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
                    <div class="symbol-label" style="background-image:url('assets/media/users/300_21.jpg')"></div>
                    <i class="symbol-badge bg-success"></i>
                </div>
                <div>
                    <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{ Auth::user()->name }}</a>
                    <div class="text-muted">{{ Auth::user()->department->name }}</div>
                </div>
            </div>
            <!--end::User-->
            <!--begin::Contact-->
            <div class="py-9">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="font-weight-bold mr-2">Email:</span>
                    <a href="#" class="text-muted text-hover-primary">{{ Auth::user()->email }}</a>
                </div>
            </div>
            <!--end::Contact-->

            <x-nav.navi>

                <x-nav.navi-item href="#" text="Profile Overview">
                    <x-slot name="icon">
                        <x-icons.layers />
                    </x-slot>
                </x-nav.navi-item>
                <x-nav.navi-item href="#" text="Personal Information">
                    <x-slot name="icon">
                        <x-icons.user />
                    </x-slot>
                </x-nav.navi-item>
                <x-nav.navi-item href="#" text="Account Information">
                    <x-slot name="icon">
                        <x-icons.compiling />
                    </x-slot>
                </x-nav.navi-item>
                <x-nav.navi-item href="#" text="Change Password">
                    <x-slot name="icon">
                        <x-icons.shield-user />
                    </x-slot>
                </x-nav.navi-item>
                <x-nav.navi-item href="#" text="Email Settings">
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