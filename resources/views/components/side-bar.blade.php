@props([])

<x-sidebar.aside 
    :logo="asset('media/logos/logo-light.png')"
>
    <x-sidebar.menu-item href="{{ url('/') }}" text="Dashboard" :active="request()->routeIs('/')">
        <x-slot name="icon">
            <x-icons.layers />
        </x-slot>
    </x-sidebar.menu-item>

    <x-sidebar.menu-section text="Applications"/>
    <x-sidebar.menu-submenu text="Tickets">
        <x-sidebar.menu-item href="{{ url('/test1') }}" text="All Tickets" :active="request()->routeIs('test1')" />
        <x-sidebar.menu-item href="{{ url('/test2') }}" text="Create Ticket" :active="request()->routeIs('test2')" />
    </x-sidebar.menu-submenu>

    <x-sidebar.menu-section text="Settings"/>
    <x-sidebar.menu-item href="{{ url('/profile') }}" text="Profile" :active="request()->routeIs('profile')">
        <x-slot name="icon">
            <x-icons.user />
        </x-slot>
    </x-sidebar.menu-item>
    
    
</x-sidebar.aside>