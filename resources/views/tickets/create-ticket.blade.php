<x-app-layout>

    <x-slot name="scroll">{{ true }}</x-slot>

    <x-page.ticket.create-ticket :users="$users" :apps="$apps"/>

</x-app-layout>