<div>

    @if (session()->has('message'))
        <script>
            toastr.success('{{ session('message') }}');
        </script>
    @endif

    <x-modal-layout>
        <x-slot name="title">
            Introducere Fisa de observatie
        </x-slot>

        <x-slot name="content">

            <div class="flex justify-center">
                <div class="form-inline">
                    <label class="form-label w-auto w-150px">Alege pacient</label>
                    <div wire:ignore>
                        <select class="form-select" style="min-width: 400px;" id="select_patient" wire:model="select_patient">
                            <option value="">Alege pacient</option>
                            @foreach($patients as $patient)
                                <option value="{{ $patient->id }}">
                                    {{ $patient->name }} {{ $patient->patient_forename }}, {{ $patient->date_of_birth }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('select_patient') <span class="">{{ $message }}</span>@enderror
                </div>
            </div>

            <div style="@if($select_patient != null) display:inline; @else display:none; @endif">

                <div class="flex justify-center my-3">
                    <div class="form-inline">
                        <label for="patient_name_and_forename" class="form-label w-auto w-150px mb-0">
                            <span class="btn btn-secondary" onclick="Livewire.emit('openModal', 'modal-user-edit', {{ json_encode(["whatUser" => $select_patient]) }})">Editare pacient</span>
                        </label>
                        <input style="min-width: 400px;" type="text" readonly class="form-control text-center" id="patient_name_and_forename" wire:model="patient_name_and_forename_and_dob">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <div class="grid grid-cols-3 gap-1">
                            <label for="patient_name" class="form-label w-auto w-150px mb-0 flex items-center font-bold">Nume</label>
                            <input type="text" readonly class="form-control form-control-sm col-span-2 font-bold" id="patient_name" wire:model="patient_name">

                            <label for="patient_forename" class="form-label w-auto w-150px mb-0 flex items-center font-bold">Prenume</label>
                            <input type="text" readonly class="form-control form-control-sm col-span-2 font-bold" id="patient_forename" wire:model="patient_forename">

                            <label for="patient_locality" class="form-label w-auto w-150px mb-0 flex items-center font-bold">Localitate</label>
                            <input type="text" readonly class="form-control form-control-sm col-span-2" id="patient_locality" wire:model="patient_locality">

                            <label for="patient_street" class="form-label w-auto w-150px mb-0 flex items-center font-bold">Strada</label>
                            <input type="text" readonly class="form-control form-control-sm col-span-2" id="patient_street" wire:model="patient_street">

                            <label for="patient_number" class="form-label w-auto w-150px mb-0 flex items-center font-bold">Numar</label>
                            <input type="text" readonly class="form-control form-control-sm col-span-2" id="patient_number" wire:model="patient_number">

                            <label for="patient_phone" class="form-label w-auto w-150px mb-0 flex items-center font-bold">Telefon (RO)</label>
                            <input type="text" readonly class="form-control form-control-sm col-span-2" id="patient_phone" wire:model="patient_phone">

                            <label for="patient_phone_second" class="form-label w-auto w-150px mb-0 flex items-center font-bold">Telefon 2</label>
                            <input type="text" readonly class="form-control form-control-sm col-span-2" id="patient_phone_second" wire:model="patient_phone_second">

                            <label for="patient_email" class="form-label w-auto w-150px mb-0 flex items-center font-bold">Adresa Email</label>
                            <input type="text" readonly class="form-control form-control-sm col-span-2" id="patient_email" wire:model="patient_email">

                            <label for="patient_cnp" class="form-label w-auto w-150px mb-0 flex items-center font-bold">CNP</label>
                            <div class=" col-span-2">
                                <input type="text" readonly class="form-control form-control-sm" id="patient_cnp" wire:model="patient_cnp">
                                @error('patient_cnp') <span class="">{{ $message }}</span>@enderror
                            </div>

                            <label for="patient_document" class="form-label w-auto w-150px mb-0 flex items-center font-bold">Act_ID</label>
                            <input type="text" readonly class="form-control form-control-sm col-span-2" id="patient_document" wire:model="patient_document">

                            <label for="patient_series" class="form-label w-auto w-150px mb-0 flex items-center font-bold">Serie_ID</label>
                            <input type="text" readonly class="form-control form-control-sm col-span-2" id="patient_series" wire:model="patient_series">

                            <label for="patient_document_number" class="form-label w-auto w-150px mb-0 flex items-center font-bold">Nr_ID</label>
                            <input type="text" readonly class="form-control form-control-sm col-span-2" id="patient_document_number" wire:model="patient_document_number">

                            <label for="patient_date_of_birth" class="form-label w-auto w-150px mb-0 flex items-center font-bold">Data Nasterii</label>
                            <input type="text" readonly class="form-control form-control-sm col-span-2" id="patient_date_of_birth" wire:model="patient_date_of_birth">

                            <label for="patient_date_of_registration" class="form-label w-auto w-150px mb-0 flex items-center font-bold">Data Inregistrarii</label>
                            <input type="text" readonly class="form-control form-control-sm col-span-2" id="patient_date_of_registration" wire:model="patient_date_of_registration">

                            <label for="patient_age" class="form-label w-auto w-150px mb-0 flex items-center font-bold">Varsta Pacient</label>
                            <input type="text" readonly class="form-control form-control-sm col-span-2" id="patient_age" wire:model="patient_age">
                        </div>
                    </div>

                    <div>
                        <div class="grid grid-cols-3 gap-1">

                            <label for="doctor_assigned_to_patient" class="form-label w-auto w-150px mb-0 flex items-center font-bold">Doctor</label>
                            <div class="col-span-2">
                                <div wire:ignore>
                                    <select class="form-select form-select-sm" id="doctor_assigned_to_patient" wire:model="doctor_assigned_to_patient">
                                        <option value="">Alege doctor</option>
                                        @foreach($doctors as $doctor)
                                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('doctor_assigned_to_patient') <span class="">{{ $message }}</span>@enderror
                            </div>

                            <label for="select_procedure_type" class="form-label w-auto w-150px mb-0 flex items-center font-bold">Tip Consultatie</label>
                            <div class="col-span-2">
                                <div wire:ignore>
                                    <select class="form-select form-select-sm" id="select_procedure_type" wire:model="select_procedure_type">
                                        <option value="">Alege consultatia</option>
                                        @foreach($procedures_type as $procedure_type)
                                            <option value="{{ $procedure_type->id }}">{{ $procedure_type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('select_procedure_type') <span class="">{{ $message }}</span>@enderror
                            </div>

                            <label for="consultation_form_number" class="form-label w-auto w-150px mb-0 flex items-center font-bold">Fisa de observatie</label>
                            <div class="col-span-2">
                                <input type="number" class="form-control form-control-sm" id="consultation_form_number" wire:model="consultation_form_number">
                            @error('consultation_form_number') <span class="">{{ $message }}</span>@enderror
                            </div>

                            <div class="grid grid-cols-2 col-span-3 gap-3 mt-3">
                                <button type="button" class="btn btn-secondary" id="autocomplete_form_pay" wire:click.prevent="autocompleteForm('pay')">Completare automata fisa cu plata</button>
                                <button type="button" class="btn btn-secondary" id="autocomplete_form_casmb" wire:click.prevent="autocompleteForm('casmb')">Completare automata fisa cu CAS</button>
                            </div>

                            @if($autocomplete_form == 'pay')
                                <div class="text-center col-span-3">
                                    <h5 class="mt-4">ACEASTA FISA NU ESTE IN CONTRACTARE CU CAS</h5>
                                </div>
                            @elseif($autocomplete_form == 'casmb')
                                <div class="text-center col-span-3">
                                    <h5 class="mt-4">ACEASTA FISA ESTE IN CONTRACTARE CU CAS</h5>
                                </div>
                            @endif

                            <div class="form-check my-5 col-span-3">
                                <input class="form-check-input" type="checkbox" id="consultation_form_type" wire:model="consultation_form_type">
                                <label for="consultation_form_type" class="form-check-label">CAS</label>
                            </div>

                            <div id="consultationFormDisplay" class="col-span-3" style="@if($consultation_form_type) display:inline-block; @else display:none; @endif">
                                <div class="grid grid-cols-3 gap-1">

                                    <label for="doctor_casmb_assigned_to_patient" class="form-label w-auto w-150px mb-0 flex items-center font-bold">Doctor CAS</label>
                                    <div class="col-span-2">
                                        <div wire:ignore>
                                            <select class="w-full" id="doctor_casmb_assigned_to_patient" wire:model="doctor_casmb_assigned_to_patient">
                                                <option value="">Alege doctor</option>
                                                @foreach($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('doctor_casmb_assigned_to_patient') <span class="">{{ $message }}</span>@enderror
                                    </div>

                                </div>
                            </div>

                            <label for="user_who_input" class="form-label w-auto w-150px mb-0 flex items-center font-bold">Fisa completata de</label>
                            <div class="col-span-2">
                                <input type="text" readonly class="form-control form-control-sm" id="user_who_input" wire:model="user_who_input">
                                @error('user_who_input') <span class="">{{ $message }}</span>@enderror
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </x-slot>

        <x-slot name="buttons">
            <div class="grid grid-cols-2 gap-3" style="@if($select_patient) display:grid; @else display:none; @endif">
                <button class="btn btn-primary w-1/2" wire:click="$emit('closeModal')">Inchide</button>

                <div class="text-right">
                    <button class="btn btn-primary w-1/2 text-right" type="button" wire:click="store()">Salveaza</button>
                </div>
            </div>
        </x-slot>

    </x-modal-layout>


{{--@push('add_observation_file_scripts')--}}
    {{--@stack('add_observation_file_scripts')--}}
    <script>

        // alert('aaa');

        $(document).ready(function () {

            // TODO: aici se incarca mai repede alpine si nu seteaza cum trebuie @this si da eroare ca nu are incarcat $wire

            function formatState (state) {
                if (!state.id) {
                    return state.text;
                }
                var $state = $(
                    '<div class="flex justify-between">' +
                        '<div>'+state.text.split(',')[0]+'</div>' +
                    '<div>'+state.text.split(',')[1]+'</div>' +
                    '</div>'
                );
                return $state;
            }

            $('#select_patient').select2({
                templateResult: formatState,
                templateSelection: formatState
            });
            $('#select_patient').on('change', function (e) {
                var item = $('#select_patient').select2("val");
            @this.set('select_patient', item);
            });


            $('#doctor_assigned_to_patient').select2();
            $('#doctor_assigned_to_patient').on('change', function (e) {
                var item = $('#doctor_assigned_to_patient').select2("val");
            @this.set('doctor_assigned_to_patient', item);
            });

            $('#select_procedure_type').select2();
            $('#select_procedure_type').on('change', function (e) {
                var item = $('#select_procedure_type').select2("val");
            @this.set('select_procedure_type', item);
            });


            $('#consultation_form_type').change(
                function(){
                    if ($(this).is(':checked')) {
                        $('#doctor_casmb_assigned_to_patient').select2();
                        $('#doctor_casmb_assigned_to_patient').on('change', function (e) {
                            var item = $('#doctor_casmb_assigned_to_patient').select2("val");
                        @this.set('doctor_casmb_assigned_to_patient', item);
                        });
                    } else {
                        $("#doctor_casmb_assigned_to_patient").select2('destroy');
                        $('#consultationFormDisplay').empty();
                    }
            });

            window.addEventListener('applyDefaultProcedure', event => {
                $('#select_procedure_type').trigger('change');
            });

            window.addEventListener('applyDefaultDoctor', event => {
                $('#doctor_assigned_to_patient').trigger('change');
            });

        });

    </script>
{{--@endpush--}}

</div>