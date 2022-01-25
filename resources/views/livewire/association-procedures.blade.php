<div class="mt-4">

    <div class="grid grid-cols-10 mb-5">

        <label for="select_doctor" class="form-label w-auto mb-0 flex items-center font-bold col-span-2">Asociere proceduri catre doctor:</label>

        <div class="col-span-2">
            <div wire:ignore>
                <select class="form-select" id="select_doctor" wire:model="select_doctor">
                    <option value="">Alege doctor</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('select_doctor') <span class="">{{ $message }}</span>@enderror
        </div>

        <div>
            &nbsp;
        </div>

        <div class="form-check ml-auto" style="@if($select_doctor) display:flex; @else display:none; @endif">
            <input class="form-check-input" type="checkbox" id="type_one" wire:model="type_one">
            <label for="type_one" class="form-check-label font-bold">tip 1</label>
        </div>

        <div class="form-check ml-auto" style="@if($select_doctor) display:flex; @else display:none; @endif">
            <input class="form-check-input" type="checkbox" id="type_two" wire:model="type_two">
            <label for="type_two" class="form-check-label font-bold">tip 2</label>
        </div>

        <div class="form-check ml-auto" style="@if($select_doctor) display:flex; @else display:none; @endif">
            <input class="form-check-input" type="checkbox" id="type_three" wire:model="type_three">
            <label for="type_three" class="form-check-label font-bold">tip 3</label>
        </div>

        <div class="form-check ml-auto" style="@if($select_doctor) display:flex; @else display:none; @endif">
            <input class="form-check-input" type="checkbox" id="type_four" wire:model="type_four">
            <label for="type_four" class="form-check-label font-bold">tip 4</label>
        </div>

        <div class="form-check ml-auto" style="@if($select_doctor) display:flex; @else display:none; @endif">
            <input class="form-check-input" type="checkbox" id="type_five" wire:model="type_five">
            <label for="type_five" class="form-check-label font-bold">tip 5</label>
        </div>

    </div>

    {{var_dump($whatValue)}}

    <livewire:procedure-association-datatables/>

    <script>
        $(document).ready(function () {

            $('#select_doctor').select2();
            $('#select_doctor').on('change', function (e) {
                var item = $('#select_doctor').select2("val");
                Livewire.emit('refreshLivewireDatatable', item);
                @this.set('select_doctor', item);
            });

        });
    </script>

    <div class="text-right">
        <a href="{{ route('lista_proceduri') }}" class="btn btn-primary font-bold py-2 px-4 rounded mt-3">Inapoi</a>
    </div>

</div>
