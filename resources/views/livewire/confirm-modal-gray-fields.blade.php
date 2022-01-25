<div>

    <x-confirm-modal-layout>
        <x-slot name="title">
            Confirma campurile gri ?
        </x-slot>
        <x-slot name="buttons">
            <button class="btn btn-primary py-2 px-4 mt-5 rounded" wire:click="acceptGray()">Da</button>
            <button class="btn btn-danger py-2 px-4 mt-5 rounded" wire:click="denyGray()">Nu</button>
        </x-slot>
    </x-confirm-modal-layout>

</div>