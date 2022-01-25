<div>

    <x-modal-layout>
        <x-slot name="title">
            Nume: {{ $crystallineDetails[0]->Name }}
            Producator: {{ $crystallineDetails[0]->Manufacturer }}
        </x-slot>

        <x-slot name="content">
            <img class="object-center object-contain" width="250" src="{{ asset('images/a1.jpg') }}" alt="photo">
            @foreach($crystallineDetails[0] as $details)
                {{$details}}
            @endforeach
        </x-slot>

        <x-slot name="buttons">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-3" wire:click="$emit('closeModal')">Inchide</button>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-3" wire:click="showCrystallineMeasurements('{{ $crystallineDetails[0]->id }}', '{{$whatSelect}}')">Selecteaza</button>
        </x-slot>
    </x-modal-layout>

</div>
