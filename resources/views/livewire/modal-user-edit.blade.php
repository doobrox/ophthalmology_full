<div>

    <x-modal-layout>
        <x-slot name="title">
           Editare pacient
        </x-slot>

        <x-slot name="content">

            {{--{{var_dump($userDetails)}}--}}
            <div id="edit_pacient">

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <div class="grid grid-cols-3 gap-1">

                            <label for="patient_name" class="form-label w-auto mb-0 flex items-center font-bold">Nume</label>
                            <div class=" col-span-2">
                                <input type="text" class="form-control form-control-sm font-bold" id="patient_name" wire:model="patient_name">
                                @error('patient_name') <span class="">{{ $message }}</span>@enderror
                            </div>

                            <label for="patient_forename" class="form-label w-auto mb-0 flex items-center font-bold">Prenume</label>
                            <div class=" col-span-2">
                                <input type="text" class="form-control form-control-sm font-bold" id="patient_forename" wire:model="patient_forename">
                                @error('patient_forename') <span class="">{{ $message }}</span>@enderror
                            </div>

                            <label for="patient_locality" class="form-label w-auto mb-0 flex items-center font-bold">Localitate</label>
                            <input type="text" class="form-control form-control-sm col-span-2" id="patient_locality" wire:model="patient_locality">

                            <label for="patient_street" class="form-label w-auto mb-0 flex items-center font-bold">Strada</label>
                            <input type="text" class="form-control form-control-sm col-span-2" id="patient_street" wire:model="patient_street">

                            <label for="patient_number" class="form-label w-auto mb-0 flex items-center font-bold">Nr</label>
                            <input type="text" class="form-control form-control-sm col-span-2" id="patient_number" wire:model="patient_number">

                            <label for="patient_phone" class="form-label w-auto mb-0 flex items-center font-bold">Telefon (RO)</label>
                            <input wire:model="patient_phone" onchange="@this.set('patient_phone', this.value);" type="text" class="form-control form-control-sm col-span-2" id="patient_phone" >

                            <label for="patient_phone_second" class="form-label w-auto mb-0 flex items-center font-bold">Telefon 2</label>
                            <input type="text" class="form-control form-control-sm col-span-2" id="patient_phone_second" wire:model="patient_phone_second">

                            <label for="patient_email" class="form-label w-auto mb-0 flex items-center font-bold">Adresa Email</label>
                            <input type="text" class="form-control form-control-sm col-span-2" id="patient_email" wire:model="patient_email">

                        </div>
                    </div>

                    <div>
                        <div class="grid grid-cols-3 gap-1">

                            <label for="patient_cnp" class="form-label w-auto mb-0 flex items-center font-bold">CNP</label>
                            <div class="col-span-2">
                                <input type="text" class="form-control form-control-sm" id="patient_cnp" wire:model="patient_cnp">
                                {{--<span class="" id="patient_cnp_label">{{ $availability }}</span>--}}
                                @error('patient_cnp') <span class="">{{ $message }}</span>@enderror
                            </div>

                            <label for="patient_document" class="form-label w-auto mb-0 flex items-center font-bold">Act_ID</label>
                            <input type="text" class="form-control form-control-sm col-span-2" id="patient_document" wire:model="patient_document">

                            <label for="patient_series" class="form-label w-auto mb-0 flex items-center font-bold">Serie_ID</label>
                            <input type="text" class="form-control form-control-sm col-span-2" id="patient_series" wire:model="patient_series">

                            <label for="patient_document_number" class="form-label w-auto mb-0 flex items-center font-bold">Nr_ID</label>
                            <input type="text" class="form-control form-control-sm col-span-2" id="patient_document_number" wire:model="patient_document_number">

                            <label for="patient_date_of_birth" class="form-label w-auto mb-0 flex items-center font-bold">Data Nasterii</label>
                            <input type="text" class="form-control form-control-sm col-span-2" id="patient_date_of_birth" wire:model="patient_date_of_birth">

                            <label for="patient_date_of_registration" class="form-label w-auto mb-0 flex items-center font-bold">Data Inregistrarii</label>
                            <input disabled type="text" class="form-control form-control-sm col-span-2" id="patient_date_of_registration" wire:model="patient_date_of_registration">

                            <label for="patient_name_and_forename" class="form-label w-auto mb-0 flex items-center font-bold">Nume Initial</label>
                            <input disabled type="text" class="form-control form-control-sm col-span-2" id="patient_name_and_forename" wire:model="patient_name_and_forename">

                            <label for="user_who_input" class="form-label w-auto mb-0 flex items-center font-bold">Fisa completata de</label>
                            <input disabled type="text" class="form-control form-control-sm col-span-2 font-bold" id="user_who_input" wire:model="user_who_input">

                        </div>
                    </div>
                </div>

            </div>

        </x-slot>

        <x-slot name="buttons">

            <div class="grid grid-cols-2 gap-3">

                <button class="btn btn-primary w-1/2" wire:click="$emit('closeModal')">Inchide</button>
                <div class="text-right">
                    <button class="btn btn-primary w-1/2 text-right" type="button" wire:click="store()">Salveaza</button>
                </div>

            </div>

        </x-slot>
    </x-modal-layout>

</div>