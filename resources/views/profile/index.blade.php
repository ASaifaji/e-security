<x-app-layout>

    <x-slot name="scroll">true</x-slot>

    <x-slot name="page_vendor_style"></x-slot>

    <x-slot name="page_vendor_script">
        <!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('js/pages/widgets.js') }}"></script>
		<script src="{{ asset('js/pages/custom/profile/profile.js') }}"></script>
		<!--end::Page Scripts-->
    </x-slot>

    <x-subheader.breadcrumb text="Profile">
        <x-subheader.breadcrumb-item href="{{ url('/') }}" text="Dashboard" />
        <x-subheader.breadcrumb-item href="{{ url('/profile') }}" text="Profile" />
    </x-subheader.breadcrumb>

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Profile-->
            <div class="d-flex flex-row">
                <x-sidebar.profile-aside :tab="$tab"/>

                <!--begin::Content-->
                <div class="flex-row-fluid ml-lg-8">
                    <x-tab.tab>
                        <x-tab.panel id="profile_tab" :active="$tab === 'profile'">
                            <x-page.profile.partials.profile-overview />
                        </x-tab.panel>
                        <x-tab.panel id="personal_info_tab" :active="$tab === 'personal_info'">
                            <x-page.profile.partials.personal-info />
                        </x-tab.panel>
                        <x-tab.panel id="account_info_tab" :active="$tab === 'account_info'">
                            <x-page.profile.partials.account-info />
                        </x-tab.panel>
                        <x-tab.panel id="change_pwd_tab" :active="$tab === 'change_pwd'">
                            <x-page.profile.partials.change-password />
                        </x-tab.panel>
                        <x-tab.panel id="email_settings_tab" :active="$tab === 'email_settings'">
                            <x-page.profile.partials.email-settings />
                        </x-tab.panel>
                    </x-tab.tab>
                </div>
            </div>
        </div>
    </div>
    

</x-app-layout>