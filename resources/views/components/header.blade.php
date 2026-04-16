<!--begin::Header-->
<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Header Menu Wrapper-->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <!--begin::Header Menu-->
            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                {{-- <!--begin::Header Nav-->
                <ul class="menu-nav">

                    <x-header.menu-classic href="{{ url('/') }}" text="Pages" >
                        
                        <x-header.menu-classic-item href="javascript:;" text="My Account">
                            <x-slot name="icon"><x-icons.briefcase /></x-slot>
                        </x-header.menu-classic-item>
                        
                        <x-header.menu-classic-item href="javascript:;" text="Task Manager" badges="true" badgeText="2">
                            <x-slot name="icon"><x-icons.compiling /></x-slot>
                        </x-header.menu-classic-item>
                        
                        <x-header.menu-classic-submenu href="javascript:;" text="Settings"><x-slot name="icon"><x-icons.cmd /></x-slot>
                            <x-header.menu-classic-submenu-item href="javascript:;" text="Add Team Member" />
                            <x-header.menu-classic-submenu-item href="javascript:;" text="Edit Team Member" />
                        </x-header.menu-classic-submenu>
                    </x-header.menu-classic>

                    <x-header.menu-fixed href="javascript:;" text="Features" width="1000px">
                        
                        <x-header.menu-fixed-section text="Task Reports">
                            <x-header.menu-fixed-item href="javascript:;" text="Latest Tasks">
                                <x-slot name="icon"><x-icons.briefcase /></x-slot>
                            </x-header.menu-fixed-item>
                            
                            <x-header.menu-fixed-item href="javascript:;" text="Pending Tasks">
                                <x-slot name="icon"><x-icons.crown /></x-slot>
                            </x-header.menu-fixed-item>
                        </x-header.menu-fixed-section>

                        <x-header.menu-fixed-section text="Task Reports 2">
                            <x-header.menu-fixed-item href="javascript:;" text="Latest Tasks">
                                <x-slot name="icon"><x-icons.briefcase /></x-slot>
                            </x-header.menu-fixed-item>
                            
                            <x-header.menu-fixed-item href="javascript:;" text="Pending Tasks">
                                <x-slot name="icon"><x-icons.crown /></x-slot>
                            </x-header.menu-fixed-item>
                        </x-header.menu-fixed-section>

                        <x-header.menu-fixed-section text="Task Reports 3">
                            <x-header.menu-fixed-item href="javascript:;" text="Latest Tasks">
                                <x-slot name="icon"><x-icons.briefcase /></x-slot>
                            </x-header.menu-fixed-item>
                            
                            <x-header.menu-fixed-item href="javascript:;" text="Pending Tasks">
                                <x-slot name="icon"><x-icons.crown /></x-slot>
                            </x-header.menu-fixed-item>
                        </x-header.menu-fixed-section>

                        <x-header.menu-fixed-section text="Task Reports 4">
                            <x-header.menu-fixed-item href="javascript:;" text="Latest Tasks">
                                <x-slot name="icon"><x-icons.briefcase /></x-slot>
                            </x-header.menu-fixed-item>
                            
                            <x-header.menu-fixed-item href="javascript:;" text="Pending Tasks">
                                <x-slot name="icon"><x-icons.crown /></x-slot>
                            </x-header.menu-fixed-item>
                        </x-header.menu-fixed-section>
                    
                    </x-header.menu-fixed>
                    
                </ul>
                <!--end::Header Nav--> --}}
            </div>
            <!--end::Header Menu-->
        </div>
        <!--end::Header Menu Wrapper-->
        <!--begin::Topbar-->
        <div class="topbar">
            <x-header.topbar-user />
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->