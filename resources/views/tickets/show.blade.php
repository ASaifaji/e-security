<x-app-layout>
    <x-slot name="scroll">{{ true }}</x-slot>
    <x-page.ticket.show :ticket="$ticket" :users="$users"/>
    <x-slot name="page_vendor_script">
        <script src="{{ asset('js/pages/custom/inbox/inbox.js') }}"></script>
    </x-slot>
</x-app-layout>