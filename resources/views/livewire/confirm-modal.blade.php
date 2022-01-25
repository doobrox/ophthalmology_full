<div>

    <x-confirm-modal-layout>
        <x-slot name="title">
            Retrage date din vechea consultatie: {{ $lastDate }}?
        </x-slot>
        <x-slot name="buttons">
            <button class="btn btn-primary py-2 px-4 mt-5 rounded" wire:click="populateLastVisit()">Da</button>
            <button class="btn btn-danger py-2 px-4 mt-5 rounded" wire:click="$emit('closeModal')">Nu</button>
        </x-slot>
    </x-confirm-modal-layout>

</div>