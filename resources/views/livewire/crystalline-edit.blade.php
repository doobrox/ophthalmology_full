<div>

    <x-modal-layout>
        <x-slot name="title">
            Numesss: {{ $crystallineDetails[0]->Name }}
            Producatorss: {{ $crystallineDetails[0]->Manufacturer }}
        </x-slot>

        <x-slot name="content">
            @if (session()->has('message'))
                <div class="">
                    {{ session('message') }}
                </div>
            @endif

            {{$whatSelect}}

            <img class="object-center object-contain" width="250" src="{{ asset('images/a1.jpg') }}" alt="photo">
            <input wire:model="camp1" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter camp1">
            @error('camp1') <span class="">{{ $message }}</span>@enderror
            <input wire:model="camp2" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter camp2">
            @error('camp2') <span class="">{{ $message }}</span>@enderror
            <input wire:model="camp3" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter camp3">
            @error('camp3') <span class="">{{ $message }}</span>@enderror
        </x-slot>

        <x-slot name="buttons">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-3" wire:click="$emit('closeModal')">Inchide</button>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-3" wire:click="finishCrystallineSelection">Selecteaza</button>
        </x-slot>
    </x-modal-layout>

</div>