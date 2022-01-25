<div>

    <x-modal-layout>
        <x-slot name="title">
            Selecteaza cristalinul
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-2">

                @foreach($allCrystallines as $cristaline)

                    <div class="w-full bg-white rounded-lg pb-10 flex flex-col justify-center items-center">
                        <div class="mb-8">
                            <img class="object-center object-contain h-28 w-28" src="{{ asset('images/a1.jpg') }}" alt="photo">
                        </div>
                        <div class="text-center">
                            <p class="text-xl text-gray-700 font-bold mb-2">{{ $cristaline->Name }}</p>
                            <p class="text-base text-gray-400 font-normal">{{ $cristaline->Manufacturer }}</p>
                        </div>
                        <div class="text-center pt-5">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-3" type="button" wire:click="showCrystallinesDetails('{{$cristaline->id}}', '{{$whatSelect}}')">Detalii</button>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-3" type="button" wire:click="showCrystallineMeasurements('{{$cristaline->id}}', '{{$whatSelect}}')">Selecteaza</button>
                        </div>
                    </div>

                @endforeach

            </div>

            {{$allCrystallines->links()}}
        </x-slot>

        <x-slot name="buttons">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="$emit('closeModal')">Inchide</button>
        </x-slot>
    </x-modal-layout>

</div>
