@props(['logo'])

<x-sidebar.aside 
    logo="{{ $logo }}"
>
    <x-sidebar.menu-item href="{{ url('/') }}" text="Dashboard" :active="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-icons.layers />
        </x-slot>
    </x-sidebar.menu-item>

    <x-sidebar.menu-section text="Applications"/>
    <x-sidebar.menu-submenu text="Tickets" :active="request()->routeIs('tickets.*')">
        <x-slot name="icon">
            <x-icons.ticket />
        </x-slot>
        <x-sidebar.menu-item href="{{ url('/tickets') }}" text="All Tickets" :active="request()->routeIs('tickets.index')" />
        <x-sidebar.menu-item href="{{ url('/tickets/create') }}" text="Create Ticket" :active="request()->routeIs('tickets.create')" />
    </x-sidebar.menu-submenu>
    <x-sidebar.menu-item href="{{ url('/apps') }}" text="Apps" :active="request()->routeIs('apps.index')">
        <x-slot name="icon">
            <x-icons.layout-4-blocks />
        </x-slot>
    </x-sidebar.menu-item>

    <x-sidebar.menu-section text="Settings"/>
    <x-sidebar.menu-item href="{{ url('/profile') }}" text="Profile" :active="request()->routeIs('profile')">
        <x-slot name="icon">
            <x-icons.user />
        </x-slot>
    </x-sidebar.menu-item>
    
    
</x-sidebar.aside>