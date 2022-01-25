<div>

    @if (session()->has('message'))
        <script>
            toastr.success('{{ session('message') }}');
        </script>
    @endif

    <x-modal-layout>
        <x-slot name="title">
            Introducere date pacient
        </x-slot>

        <x-slot name="content">
            <div id="add_pacient">

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <div class="grid grid-cols-3 gap-1">

                            <label for="patient_name" class="form-label w-auto mb-0 flex items-center font-bold">Nume</label>
                            <div class="col-span-2">
                                <input type="text" class="form-control form-control-sm font-bold" id="patient_name" wire:model="patient_name">
                                @error('patient_name') <span class="">{{ $message }}</span>@enderror
                            </div>

                            <label for="patient_forename" class="form-label w-auto mb-0 flex items-center font-bold">Prenume</label>
                            <div class="col-span-2">
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
                            <input wire:ignore onchange="@this.set('patient_phone', this.value);" type="text" class="form-control form-control-sm col-span-2" id="patient_phone" >

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
                                <span class="" id="patient_cnp_label">{{ $availability }}</span>
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
                            <input disabled type="text" class="form-control form-control-sm col-span-2" id="patient_date_of_registration" wire:ignore>

                            <label for="user_who_input" class="form-label w-auto mb-0 flex items-center font-bold mt-8">Fisa completata de</label>
                            <input disabled type="text" class="form-control form-control-sm col-span-2 font-bold mt-8" id="user_who_input" wire:model="user_who_input">

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

    <script>

        $(document).ready(function () {
            $('#add_pacient input[name="patient_phone"]').on('input propertychange', function () {
                if (this.value.length > 0) {
                    if (this.value.length > this.maxLength) {
                        this.value = this.value.slice(0, this.maxLength + 1);
                        $(this).removeClass('is-invalid');
                    } else {
                        $(this).addClass('is-invalid');
                    }
                }
            });

            $('#add_pacient input[name="patient_cnp"]').on('input propertychange', function () {
                // var thisInput = this;
                if (this.value.length > 0) {
                    if (this.value.length > this.maxLength) {
                        this.value = this.value.slice(0, this.maxLength + 1);
                    } else {
                        // $(thisInput).addClass('is-invalid');
                    }
                }
            });

            $('#patient_date_of_birth').daterangepicker({
                "singleDatePicker": true,
                locale: {
                    format: globalDateFormat,
                    firstDay: 1
                },
                "drops": "up",
                autoUpdateInput: false
            });

            $('#patient_date_of_registration').val(moment().format(globalDateFormat));

            $('#patient_date_of_birth').on('apply.daterangepicker', function (ev, picker) {
                $('#patient_date_of_birth').val(picker.startDate.format(globalDateFormat));
            });

            $('#patient_date_of_birth').on('cancel.daterangepicker', function () {
                $('#patient_date_of_birth').val('');
            });

            $("#add_pacient").submit(function (event) {

                $('#add_pacient input').removeClass('is-invalid');
                $('#add_pacient .error-for-label').empty();
                $('#add_pacient .error-for-label').removeClass('is-invalid-label');

                event.preventDefault();
                $.ajax({
                    url: globalLinkServer + "/dbase/starter/?met=Pacienti&action=ins",
                    data: {
                        Nume: $('#patient_name').val(),
                        Prenume: $('#patient_forename').val(),
                        localitate: $('#patient_locality').val(),
                        strada: $('#patient_street').val(),
                        nr: $('#patient_number').val(),
                        cnp: $('#patient_cnp').val(),
                        telefon: $('#patient_phone').val(),
                        act_id: $('#patient_document').val(),
                        serie_id: $('#patient_series').val(),
                        nr_id: $('#patient_document_number').val(),
                        adresa_mail: $('#patient_email').val(),
                        telefon2: $('#patient_phone_second').val(),
                        data_nasterii: ($('#patient_date_of_birth').val() != '') ? (moment($('#patient_date_of_birth').val(), globalDateFormat).format(globalDateFormatDB)) : '',
                    },
                    error: function (e, s) {
                        alert(s);
                    },
                }).done(function (res) {
                    if (res.success) {
                        toastr.success('Date salvate cu succes!');
                        $('#modal_receptie').modal('hide');
                    } else {
                        toastr.error('Completati toate campurile!');
                        $.each(res.result, function (key) {
                            $('#add_pacient_' + key + '_label').empty();
                            $('#add_pacient_' + key + '_label').html(res.result[key]['msg']);
                            $('#add_pacient_' + key + '_label').addClass('is-invalid-label');
                            $('#add_pacient_' + key).addClass('is-invalid');
                        });
                    }
                });

            });

        });
    </script>

</div>
