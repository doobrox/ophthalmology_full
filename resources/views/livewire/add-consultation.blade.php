<div>

    @if (session()->has('message'))
        <script>
            toastr.success('{{ session('message') }}');
        </script>
    @endif

{{--{{var_dump($lastVisits[0]->visit_date)}}--}}
    @if($whatToDoWithLastVisit == true)
        <script>
            $(document).ready(function () {
                Livewire.emit('openModal', 'confirm-modal', @json(["lastDate" => $lastVisits[0]]))
            });
         </script>
    @endif

    @if($confirmGrayFields == true)

        <script>
            livewire.emit('openModal', 'confirm-modal-gray-fields')
        </script>
        @endif

            {{--<div id="add_fisa_consultatie">--}}

    <div class="flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Fisa de consultatie</h2>
    </div>

    <div style="display: flex; justify-content: space-between;">
        <div>
            <span class="btn btn-primary" wire:click="backToPage()">Inapoi</span>
        </div>
        <div style="text-align: end;">
            <span class="btn btn-primary" wire:click="store()">Salveaza</span>
            {{--<span class="btn btn-primary" wire:click="ddDate()">info</span>--}}
            <span class="btn btn-primary" wire:click="redirectToPlata()" style="@if($showButtons == true) display:inline-block; @else display:none; @endif">Plata</span>
            <span class="btn btn-primary" wire:click="redirectToRetetaOchelari()" style="@if($showButtons == true) display:inline-block; @else display:none; @endif">AKR MS Reteta ochelari</span>
            <span class="btn btn-primary" id="add_consultation_pdf" style="@if($showButtons == true) display:inline-block; @else display:none; @endif">PDF</span>
        </div>
    </div>

    <div class="grid grid-cols-5 gap-3 mt-5">

        <div class="col-span-2">

            <div class="grid grid-cols-6 gap-1">

                <input type="text" class="form-control form-control-sm font-bold col-span-2 text-center" disabled id="today_date" wire:model="today_date">

                <label for="consultation_form_number" class="form-label w-auto mb-0 flex items-center font-bold">Nr fisa consult</label>
                <input type="text" class="form-control form-control-sm font-bold" disabled id="consultation_form_number" wire:model="consultation_form_number">

                <label for="patient_age" class="form-label w-auto mb-0 flex items-center font-bold">Varsta</label>
                <input type="text" class="form-control form-control-sm font-bold" disabled id="patient_age" wire:model="patient_age">

                <input type="text" class="form-control form-control-sm font-bold col-span-2" disabled id="patient_name" wire:model="patient_name">

                <input type="text" class="form-control form-control-sm font-bold col-span-4" disabled id="patient_forename" wire:model="patient_forename">

            </div>

        </div>

        <div class="col-span-3">

            <div class="grid grid-cols-6 gap-1">

                <label for="doctor_cas_assigned_to_patient" class="form-label w-auto mb-0 flex items-center font-bold">Dr CAS</label>
                <div class="col-span-3">
                    <div wire:ignore>
                        <select class="form-select form-select-sm" id="doctor_cas_assigned_to_patient" wire:model="doctor_cas_assigned_to_patient">
                            <option value="">Alege doctor</option>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('doctor_cas_assigned_to_patient') <span class="">{{ $message }}</span>@enderror
                </div>

                <label for="patient_arrival_time" class="form-label w-auto mb-0 flex items-center font-bold">Ora prez</label>
                <input type="text" class="form-control form-control-sm font-bold" disabled id="patient_arrival_time" wire:model="patient_arrival_time">

                <label for="select_procedure" class="form-label w-auto mb-0 flex items-center font-bold">Procedura</label>
                <div class="col-span-3">
                    <div wire:ignore>
                        <select class="form-select form-select-sm" id="select_procedure" wire:model="select_procedure">
                            <option value="">Alege procedura</option>
                            @foreach($procedures as $procedure)
                                <option value="{{ $procedure->id }}">{{ $procedure->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('select_procedure') <span class="">{{ $message }}</span>@enderror
                </div>

                <label for="now_time" class="form-label w-auto mb-0 flex items-center font-bold">Ora act</label>
                <input type="text" class="form-control form-control-sm font-bold" disabled id="now_time" wire:model="now_time">

            </div>

        </div>

        <div class="col-span-5">

            <div class="grid grid-cols-8 gap-1 mb-1">

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" disabled id="keratometrie_checkbox" wire:model="keratometrie_checkbox">
                    <label for="keratometrie_checkbox" class="form-check-label">keratometrie</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" disabled id="refratometrie_checkbox" wire:model="refratometrie_checkbox">
                    <label for="refratometrie_checkbox" class="form-check-label">refratometrie</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" disabled id="optical_correction_checkbox" wire:model="optical_correction_checkbox">
                    <label for="optical_correction_checkbox" class="form-check-label">optical_correction</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" disabled id="microscopie_checkbox" wire:model="microscopie_checkbox">
                    <label for="microscopie_checkbox" class="form-check-label">microscopie</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" disabled id="cas_checkbox" wire:model="cas_checkbox">
                    <label for="cas_checkbox" class="form-check-label">CAS</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" disabled id="av_checkbox" wire:model="av_checkbox">
                    <label for="av_checkbox" class="form-check-label">AV</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" disabled id="tio_checkbox" wire:model="tio_checkbox">
                    <label for="tio_checkbox" class="form-check-label">TIO</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" disabled id="biomicroscopie_checkbox" wire:model="biomicroscopie_checkbox">
                    <label for="biomicroscopie_checkbox" class="form-check-label">biomicroscopie</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" disabled id="oftalmoscopie_checkbox" wire:model="oftalmoscopie_checkbox">
                    <label for="oftalmoscopie_checkbox" class="form-check-label">oftalmoscopie</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" disabled id="investigation_checkbox" wire:model="investigation_checkbox">
                    <label for="investigation_checkbox" class="form-check-label">investigatii</label>
                </div>
            </div>

        </div>

    </div>

    <div class="grid grid-cols-10 gap-3 mt-2">

        <div class="col-span-4">
            <div class="grid grid-cols-2 gap-1">
                <label for="diagnostic" class="form-label w-auto mb-0 flex items-center font-bold">DIAGNOSTIC PRINCIPAL (1)</label>
                <div>
                    <div wire:ignore>
                        <select class="form-select form-select-sm" id="diagnostic" wire:model="diagnostic">
                            <option value="">Alege diagnostic</option>
                            @foreach($diagnostics as $diagnostic)
                            <option value="{{ $diagnostic->id }}">{{ $diagnostic->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('diagnostic') <span class="">{{ $message }}</span>@enderror
                </div>

                <div>
                    <span class="pr-3" id="insert_diagnostic_in_diagnostic_secondary_box" wire:click="insert_diagnostic_in_diagnostic_secondary_box()">--> dg sec</span>
                    <span class="px-3" id="insert_diagnostic_in_diagnostic_other_box" wire:click="insert_diagnostic_in_diagnostic_other_box()">--> alte dg</span>
                </div>
                <div class="text-right">
                    <span class="px-3" id="check_diagnostic_by" wire:click="check_diagnostic_by()">AO</span>
                    <span class="px-3" id="check_diagnostic_ry" wire:click="check_diagnostic_ry()">OD</span>
                    <span class="px-3" id="check_diagnostic_ly" wire:click="check_diagnostic_ly()">OS</span>
                    <span class="px-3" id="remove_diagnostic_x" wire:click="remove_diagnostic_x()">X</span>
                </div>

                <div class="col-span-2">
                    <textarea class="form-control @if($errors->has('diagnostic_description')) req-field-to-save @else @endif" rows="2" wire:model="diagnostic_description" style="@if($gray_diagnostic_description == true) background-color: gray;@endif"></textarea>
                    @error('diagnostic_description') <span class="">{{ $message }}</span>@enderror
                </div>

                <label for="patient_name" class="form-label w-auto mb-0 flex items-center font-bold">DIAGNOSTIC SEC (4)</label>
                <label for="patient_name" class="form-label w-auto mb-0 flex items-center font-bold">ALTE DIAGNOSTICE (3)</label>

                <div class="">
                    <span class="pr-3" id="check_diagnostic_secondary_by" wire:click="check_diagnostic_secondary_by()">AO</span>
                    <span class="px-3" id="check_diagnostic_secondary_ry" wire:click="check_diagnostic_secondary_ry()">OD</span>
                    <span class="px-3" id="check_diagnostic_secondary_ly" wire:click="check_diagnostic_secondary_ly()">OS</span>
                </div>

                <div class="">
                    <span class="pr-3" id="check_diagnostic_other_by" wire:click="check_diagnostic_other_by()">AO</span>
                    <span class="px-3" id="check_diagnostic_other_ry" wire:click="check_diagnostic_other_ry()">OD</span>
                    <span class="px-3" id="check_diagnostic_other_ly" wire:click="check_diagnostic_other_ly()">OS</span>
                </div>

                <textarea class="form-control" rows="8" wire:model="diagnostic_secondary_description" style="@if($gray_diagnostic_secondary_description == true) background-color: gray;@endif"></textarea>

                <textarea class="form-control" rows="8" wire:model="diagnostic_other_description" style="@if($gray_diagnostic_other_description == true) background-color: gray;@endif"></textarea>

                <label for="drug" class="form-label w-auto mb-0 flex items-center font-bold mt-2">TRATAMENT</label>
                <div class="mt-2">
                    <div wire:ignore>
                        <select class="form-select form-select-sm" id="drug" wire:model="drug">
                            <option value="">Alege tratament</option>
                            @foreach($drugs as $drug)
                            <option value="{{ $drug->id }}">{{ $drug->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('drug') <span class="">{{ $message }}</span>@enderror
                </div>

                <div>
                    <span class="pr-3" id="insert_drug_in_treatment_box" wire:click="insert_drug_in_treatment_box()">-> TRATAM</span>
                    <span class="px-3" id="insert_drug_in_medical_letter_box" wire:click="insert_drug_in_medical_letter_box()">-> SCRIS MED</span>
                </div>
                <div class="text-right">
                    <span class="px-3" id="check_drug_by" wire:click="check_drug_by()">AO</span>
                    <span class="px-3" id="check_drug_ry" wire:click="check_drug_ry()">OD</span>
                    <span class="px-3" id="check_drug_ly" wire:click="check_drug_ly()">OS</span>
                    <span class="px-3" id="remove_drug_x" wire:click="remove_drug_x()">X</span>
                </div>

                <textarea class="form-control col-span-2" rows="2" wire:model="drug_description"></textarea>

                <label for="patient_name" class="form-label w-auto mb-0 flex items-center font-bold">TRATAMENT</label>
                <label for="patient_name" class="form-label w-auto mb-0 flex items-center font-bold">SCRIS MED</label>

                <div class="">
                    <span class="pr-3" id="check_drug_treatment_by" wire:click="check_drug_treatment_by()">AO</span>
                    <span class="px-3" id="check_drug_treatment_ry" wire:click="check_drug_treatment_ry()">OD</span>
                    <span class="px-3" id="check_drug_treatment_ly" wire:click="check_drug_treatment_ly()">OS</span>
                </div>

                <div class="">
                    <span class="pr-3" id="check_drug_medical_letter_by" wire:click="check_drug_medical_letter_by()">AO</span>
                    <span class="px-3" id="check_drug_medical_letter_ry" wire:click="check_drug_medical_letter_ry()">OD</span>
                    <span class="px-3" id="check_drug_medical_letter_ly" wire:click="check_drug_medical_letter_ly()">OS</span>
                </div>

                <textarea class="form-control" rows="8" wire:model="drug_treatment_description" style="@if($gray_drug_treatment_description == true) background-color: gray;@endif"></textarea>

                <textarea class="form-control" rows="8" wire:model="drug_medical_letter_description" style="@if($gray_drug_medical_letter_description == true) background-color: gray;@endif"></textarea>

                <label for="change_doctor_assigned_to_patient" class="form-label w-auto mb-0 flex items-center font-bold mt-2 text-right">Doctor consultatie</label>
                <div class="mt-2">
                    <div wire:ignore>
                        <select class="form-select form-select-sm" id="change_doctor_assigned_to_patient" wire:model="change_doctor_assigned_to_patient">
                            <option value="">Alege doctor</option>
                            @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('change_doctor_assigned_to_patient') <span class="">{{ $message }}</span>@enderror
                </div>

            </div>
        </div>

        <div class="col-span-6">
            <div class="grid grid-cols-6 gap-2">
                <div class="form-inline">
                    <label for="av_ry" class="form-label" style="@if($gray_av_ry == true) background-color: gray;@endif">AVOD</label>
                    <div style="width: 100%;">
                        <div wire:ignore>
                            <select class="form-select form-select-sm" id="av_ry" wire:model="av_ry">
                                <option value=""></option>
                                @foreach($visual_acuity as $av_ry)
                                    <option value="{{ $av_ry->id }}">{{ $av_ry->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('av_ry') <span class="">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-inline">
                    <label for="t_ry_non_c" class="form-label">TOD non-c</label>
                    <input type="number" class="form-control form-control-sm" id="t_ry_non_c" wire:model="t_ry_non_c" style="@if($gray_t_ry_non_c == true) background-color: gray;@endif">
                </div>
                <div class="form-inline">
                    <label for="t_ry_c" class="form-label">TOD c</label>
                    <input type="number" class="form-control form-control-sm" id="t_ry_c" wire:model="t_ry_c" style="@if($gray_t_ry_c == true) background-color: gray;@endif">
                </div>
                <div class="form-inline">
                    <label for="ry_cv_md" class="form-label">OD CV MD</label>
                    <input type="number" class="form-control form-control-sm" id="ry_cv_md" wire:model="ry_cv_md" style="@if($gray_ry_cv_md == true) background-color: gray;@endif">
                </div>
                <div class="form-inline">
                    <label for="ry_cv_pd" class="form-label">OD CV PD</label>
                    <input type="number" class="form-control form-control-sm" id="ry_cv_pd" wire:model="ry_cv_pd" style="@if($gray_ry_cv_pd == true) background-color: gray;@endif">
                </div>
                <div class="form-inline">
                    <label for="zzzzzzzz" class="form-label">extra</label>
                    <input type="number" class="form-control form-control-sm" id="zzzzzzzz" wire:model="zzzzzzz">
                </div>
                <div class="form-inline">
                    <label for="av_ly" class="form-label" style="@if($gray_av_ly == true) background-color: gray;@endif">AVOS</label>
                    <div style="width: 100%;">
                        <div wire:ignore>
                            <select class="form-select form-select-sm" id="av_ly" wire:model="av_ly">
                                <option value=""></option>
                                @foreach($visual_acuity as $av_ly)
                                    <option value="{{ $av_ly->id }}">{{ $av_ly->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('av_ly') <span class="">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-inline">
                    <label for="t_ly_non_c" class="form-label">TOS non-c</label>
                    <input type="number" class="form-control form-control-sm" id="t_ly_non_c" wire:model="t_ly_non_c" style="@if($gray_t_ly_non_c == true) background-color: gray;@endif">
                </div>
                <div class="form-inline">
                    <label for="t_ly_c" class="form-label">TOS c</label>
                    <input type="number" class="form-control form-control-sm" id="t_ly_c" wire:model="t_ly_c" style="@if($gray_t_ly_c == true) background-color: gray;@endif">
                </div>
                <div class="form-inline">
                    <label for="ly_cv_md" class="form-label">OS CV MD</label>
                    <input type="number" class="form-control form-control-sm" id="ly_cv_md" wire:model="ly_cv_md" style="@if($gray_ly_cv_md == true) background-color: gray;@endif">
                </div>
                <div class="form-inline">
                    <label for="ly_cv_pd" class="form-label">OS CV PD</label>
                    <input type="number" class="form-control form-control-sm" id="ly_cv_pd" wire:model="ly_cv_pd" style="@if($gray_ly_cv_pd == true) background-color: gray;@endif">
                </div>
                <div class="form-inline">
                    <label for="zzzzzzz" class="form-label">extra</label>
                    <input type="number" class="form-control form-control-sm" id="zzzzzz" wire:model="zzzzzzzz">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-1">

                <label for="reason" class="form-label w-auto mb-0 flex items-center font-bold mt-2">motive prez</label>
                <div class="mt-2">
                    <div wire:ignore>
                        <select class="form-select form-select-sm" id="reason" wire:model="reason">
                            <option value="">Alege motiv</option>
                            @foreach($reasons as $reason)
                            <option value="{{ $reason->id }}">{{ $reason->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('reason') <span class="">{{ $message }}</span>@enderror
                </div>

                <textarea class="form-control col-span-2" rows="2" wire:model="reason_description" style="@if($gray_reason_description == true) background-color: gray;@endif"></textarea>

                <div>
                    <div class="grid grid-cols-2 gap-1">
                        <label for="treatment_scheme" class="form-label w-auto mb-0 flex items-center font-bold">RECOMANDARI</label>
                        <div>
                            <div wire:ignore>
                                <select class="form-select form-select-sm" id="treatment_scheme" wire:model="treatment_scheme">
                                    <option value="">Alege schema trat</option>
                                    @foreach($treatment_schemes as $treatment_scheme)
                                    <option value="{{ $treatment_scheme->id }}">{{ $treatment_scheme->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('treatment_scheme') <span class="">{{ $message }}</span>@enderror
                        </div>

                        <textarea class="form-control col-span-2" rows="4" wire:model="treatment_scheme_description" style="@if($gray_treatment_scheme_description == true) background-color: gray;@endif"></textarea>

                        <label for="biomicroscopie_ry_description" class="form-label w-auto mb-0 flex items-center font-bold">OD EXAMEN BIOMICROSCOPIC</label>
                        <div>
                            <div wire:ignore>
                                <select class="form-select form-select-sm" id="biomicroscopie_ry" wire:model="biomicroscopie_ry">
                                    <option value="">Alege</option>
                                    @foreach($biomicroscopies as $biomicroscopie)
                                    <option value="{{ $biomicroscopie->id }}">{{ $biomicroscopie->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('biomicroscopie_ry') <span class="">{{ $message }}</span>@enderror
                        </div>

                        <textarea class="form-control col-span-2" rows="2" wire:model="biomicroscopie_ry_description" style="@if($gray_biomicroscopie_ry_description == true) background-color: gray;@endif"></textarea>

                        <label for="biomicroscopie_ly_description" class="form-label w-auto mb-0 flex items-center font-bold">OS EXAMEN BIOMICROSCOPIC</label>
                        <div>
                            <div wire:ignore>
                                <select class="form-select form-select-sm" id="biomicroscopie_ly" wire:model="biomicroscopie_ly">
                                    <option value="">Alege</option>
                                    @foreach($biomicroscopies as $biomicroscopie)
                                        <option value="{{ $biomicroscopie->id }}">{{ $biomicroscopie->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('biomicroscopie_ly') <span class="">{{ $message }}</span>@enderror
                        </div>

                        <textarea class="form-control col-span-2" rows="2" wire:model="biomicroscopie_ly_description" style="@if($gray_biomicroscopie_ly_description == true) background-color: gray;@endif"></textarea>

                        <div>
                            <label for="eye_bottom" class="form-label w-auto mb-0 flex items-center font-bold">FO</label>
                            <span class="px-3 mb-0" id="eye_bottom_by" wire:click="eye_bottom_by()">AO</span>
                            <span class="px-3 mb-0" id="eye_bottom_ry" wire:click="eye_bottom_ry()">OD</span>
                            <span class="px-3 mb-0" id="eye_bottom_ly" wire:click="eye_bottom_ly()">OS</span>
                        </div>

                        <div>
                            <div wire:ignore>
                                <select class="form-select form-select-sm" id="eye_bottom" wire:model="eye_bottom">
                                    <option value="">Alege</option>
                                    @foreach($eye_bottoms as $eye_bottom)
                                        <option value="{{ $eye_bottom->id }}">{{ $eye_bottom->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('eye_bottom') <span class="">{{ $message }}</span>@enderror
                        </div>

                        <textarea class="form-control col-span-2" rows="2" wire:model="eye_bottom_description" style="@if($gray_eye_bottom_description == true) background-color: gray;@endif"></textarea>

                        <div>
                            <label for="eye_bottom_extra" class="form-label w-auto mb-0 flex items-center font-bold">FO cont...</label>
                            <span class="px-3 mb-0" id="eye_bottom_extra_by" wire:click="eye_bottom_extra_by()">AO</span>
                            <span class="px-3 mb-0" id="eye_bottom_extra_ry" wire:click="eye_bottom_extra_ry()">OD</span>
                            <span class="px-3 mb-0" id="eye_bottom_extra_ly" wire:click="eye_bottom_extra_ly()">OS</span>
                        </div>

                        <div>
                            <div wire:ignore>
                                <select class="form-select form-select-sm" id="eye_bottom_extra" wire:model="eye_bottom_extra">
                                    <option value="">Alege</option>
                                    @foreach($eye_bottoms as $eye_bottom)
                                        <option value="{{ $eye_bottom->id }}">{{ $eye_bottom->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('eye_bottom_extra') <span class="">{{ $message }}</span>@enderror
                        </div>

                        <textarea class="form-control col-span-2" rows="2" wire:model="eye_bottom_extra_description" style="@if($gray_eye_bottom_extra_description == true) background-color: gray;@endif"></textarea>

                    </div>
                </div>

                <div>
                    <div class="grid grid-cols-2 gap-1">

                        <label for="historical_procedures" class="form-label w-auto mb-0 flex items-center font-bold">Alte examene/istoric</label>
                        <div>
                            <div wire:ignore>
                                <select class="form-select form-select-sm" id="historical_procedures" wire:model="historical_procedures">
                                    <option value="">Alege procedura</option>
                                    @foreach($procedures as $procedure)
                                    <option value="{{ $procedure->id }}">{{ $procedure->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('historical_procedures') <span class="">{{ $message }}</span>@enderror
                        </div>

                        <textarea class="form-control col-span-2" rows="2" wire:model="historical_procedures_description" style="@if($gray_historical_procedures_description == true) background-color: gray;@endif"></textarea>

                        <label for="gonioscopie_ry" class="form-label w-auto mb-0 flex items-center font-bold">OD GONIOSCOPIE</label>
                        <div>
                            <div wire:ignore>
                                <select class="form-select form-select-sm" id="gonioscopie_ry" wire:model="gonioscopie_ry">
                                    <option value="">Alege</option>
                                    @foreach($gonioscopies as $gonioscopie)
                                    <option value="{{ $gonioscopie->id }}">{{ $gonioscopie->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('gonioscopie_ry') <span class="">{{ $message }}</span>@enderror
                        </div>

                        <textarea class="form-control col-span-2" rows="2" wire:model="gonioscopie_ry_description" style="@if($gray_gonioscopie_ry_description == true) background-color: gray;@endif"></textarea>

                        <label for="gonioscopie_ly" class="form-label w-auto mb-0 flex items-center font-bold">OS GONIOSCOPIE</label>
                        <div>
                            <div wire:ignore>
                                <select class="form-select form-select-sm" id="gonioscopie_ly" wire:model="gonioscopie_ly">
                                    <option value="">Alege</option>
                                    @foreach($gonioscopies as $gonioscopie)
                                        <option value="{{ $gonioscopie->id }}">{{ $gonioscopie->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('gonioscopie_ly') <span class="">{{ $message }}</span>@enderror
                        </div>

                        <textarea class="form-control col-span-2" rows="2" wire:model="gonioscopie_ly_description" style="@if($gray_gonioscopie_ly_description == true) background-color: gray;@endif"></textarea>

                        <label for="visual_field_ry" class="form-label w-auto mb-0 flex items-center font-bold">OD CAMP VIZUAL</label>
                        <div>
                            <div wire:ignore>
                                <select class="form-select form-select-sm" id="visual_field_ry" wire:model="visual_field_ry">
                                    <option value="">Alege camp</option>
                                    @foreach($visual_fields as $visual_field)
                                    <option value="{{ $visual_field->id }}">{{ $visual_field->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('visual_field_ry') <span class="">{{ $message }}</span>@enderror
                        </div>

                        <textarea class="form-control col-span-2" rows="2" wire:model="visual_field_ry_description" style="@if($gray_visual_field_ry_description == true) background-color: gray;@endif"></textarea>

                        <label for="visual_field_ly" class="form-label w-auto mb-0 flex items-center font-bold">OS CAMP VIZUAL</label>
                        <div>
                            <div wire:ignore>
                                <select class="form-select form-select-sm" id="visual_field_ly" wire:model="visual_field_ly">
                                    <option value="">Alege camp</option>
                                    @foreach($visual_fields as $visual_field)
                                        <option value="{{ $visual_field->id }}">{{ $visual_field->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('visual_field_ly') <span class="">{{ $message }}</span>@enderror
                        </div>

                        <textarea class="form-control col-span-2" rows="2" wire:model="visual_field_ly_description" style="@if($gray_visual_field_ly_description == true) background-color: gray;@endif"></textarea>

                        <label for="visit_comments" class="form-label w-auto mb-0 flex items-center font-bold mt-1 col-span-2">Comentarii</label>

                        <textarea class="form-control col-span-2" rows="2" id="visit_comments" wire:model="visit_comments" style="@if($gray_visit_comments == true) background-color: gray;@endif"></textarea>

                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="mt-5">
        <livewire:patient-visits-datatables/>
    </div>

    <script>

        $(document).ready(function () {

            window.addEventListener('loadInfoFromLastVisit', event => {
                // console.log(event.detail)
                // $('#av_ry').trigger('change');
                // $('#av_ly').trigger('change');
                // $('#biomicroscopie_ry_description').trigger('change');
                // $('#biomicroscopie_ly_description').trigger('change');
                // @this.set('gray_av_ry', true);
                // @this.set('gray_av_ly', true);
                // $('#select_procedure').select2().val(event.detail.lastVisitInfo['fk_select_procedure']).trigger('change');
                // $('#doctor_cas_assigned_to_patient').select2().val(event.detail.lastVisitInfo['fk_doctor_casmb_assigned_to_patient']).trigger('change');
            });

            window.addEventListener('clearGraySelect', event => {
                $('#av_ry').trigger('change');
                $('#av_ly').trigger('change');
            });

            window.addEventListener('loadGrayAvRy', event => {
                $('#av_ry').trigger('change');
                @this.set('gray_av_ry', true);
            });

            window.addEventListener('loadGrayAvLy', event => {
                $('#av_ly').trigger('change');
                @this.set('gray_av_ly', true);
            });

            window.addEventListener('closeWindow', event => {
                window.close();
            });

            $('#select_procedure').select2();
            $('#select_procedure').on('change', function (e) {
                var item = $('#select_procedure').select2("val");
            @this.set('select_procedure', item);
            });

            $('#doctor_cas_assigned_to_patient').select2();
            $('#doctor_cas_assigned_to_patient').on('change', function (e) {
                var item = $('#doctor_cas_assigned_to_patient').select2("val");
            @this.set('doctor_cas_assigned_to_patient', item);
            });

            $('#diagnostic').select2();
            $('#diagnostic').on('change', function (e) {
                var item = $('#diagnostic').select2("val");
            @this.set('diagnostic', item);
            });

            $('#drug').select2();
            $('#drug').on('change', function (e) {
                var item = $('#drug').select2("val");
            @this.set('drug', item);
            });

            $('#change_doctor_assigned_to_patient').select2();
            $('#change_doctor_assigned_to_patient').on('change', function (e) {
                var item = $('#change_doctor_assigned_to_patient').select2("val");
            @this.set('change_doctor_assigned_to_patient', item);
            });

            $('#reason').select2();
            $('#reason').on('change', function (e) {
                var item = $('#reason').select2("val");
            @this.set('reason', item);
            });

            $('#treatment_scheme').select2();
            $('#treatment_scheme').on('change', function (e) {
                var item = $('#treatment_scheme').select2("val");
            @this.set('treatment_scheme', item);
            });

            $('#biomicroscopie_ry_description').on('change', function (e) {
                var item = $('#biomicroscopie_ry_description').select2("val");
            @this.set('biomicroscopie_ry_description', item);
            });

            $('#biomicroscopie_ly_description').on('change', function (e) {
                var item = $('#biomicroscopie_ly_description').select2("val");
            @this.set('biomicroscopie_ly_description', item);
            });

            $('#biomicroscopie_ry').select2();
            $('#biomicroscopie_ry').on('change', function (e) {
                var item = $('#biomicroscopie_ry').select2("val");
            @this.set('biomicroscopie_ry', item);
            });

            $('#biomicroscopie_ly').select2();
            $('#biomicroscopie_ly').on('change', function (e) {
                var item = $('#biomicroscopie_ly').select2("val");
            @this.set('biomicroscopie_ly', item);
            });

            $('#eye_bottom').select2();
            $('#eye_bottom').on('change', function (e) {
                var item = $('#eye_bottom').select2("val");
            @this.set('eye_bottom', item);
            });

            $('#eye_bottom_extra').select2();
            $('#eye_bottom_extra').on('change', function (e) {
                var item = $('#eye_bottom_extra').select2("val");
            @this.set('eye_bottom_extra', item);
            });

            $('#historical_procedures').select2();
            $('#historical_procedures').on('change', function (e) {
                var item = $('#historical_procedures').select2("val");
            @this.set('historical_procedures', item);
            });

            $('#gonioscopie_ry').select2();
            $('#gonioscopie_ry').on('change', function (e) {
                var item = $('#gonioscopie_ry').select2("val");
            @this.set('gonioscopie_ry', item);
            });

            $('#gonioscopie_ly').select2();
            $('#gonioscopie_ly').on('change', function (e) {
                var item = $('#gonioscopie_ly').select2("val");
            @this.set('gonioscopie_ly', item);
            });

            $('#visual_field_ry').select2();
            $('#visual_field_ry').on('change', function (e) {
                var item = $('#visual_field_ry').select2("val");
            @this.set('visual_field_ry', item);
            });

            $('#visual_field_ly').select2();
            $('#visual_field_ly').on('change', function (e) {
                var item = $('#visual_field_ly').select2("val");
            @this.set('visual_field_ly', item);
            });

            // $('#select_procedure').select2();
            // $('#select_procedure').on('change', function (e) {
            //     var item = $('#select_procedure').select2("val");
            // @this.set('select_procedure', item);
            // });
            //
            // $('#select_procedure').select2();
            // $('#select_procedure').on('change', function (e) {
            //     var item = $('#select_procedure').select2("val");
            // @this.set('select_procedure', item);
            // });
            //
            // $('#select_procedure').select2();
            // $('#select_procedure').on('change', function (e) {
            //     var item = $('#select_procedure').select2("val");
            // @this.set('select_procedure', item);
            // });

            $('#av_ry').select2();
            $('#av_ry').on('change', function (e) {
                var item = $('#av_ry').select2("val");
            @this.set('av_ry', item);
            });

            $('#av_ly').select2();
            $('#av_ly').on('change', function (e) {
                var item = $('#av_ly').select2("val");
            @this.set('av_ly', item);
            });




















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

            {{--Livewire.emit('refreshLivewireDatatable', {{$fk_patient_id}});--}}
            Livewire.emit('refreshLivewireDatatable', @json(["fk_patient_id" => $fk_patient_id, "visits_id" => $visits_id]));


            $('#add_consultation_pdf').on('click', function(e){
                e.preventDefault();
                var consultationId = @isset($visits[0]->id) {{$visits[0]->id}} @endisset;
                var add_consultation_pdf_url = '/pdf/consultatie/' + consultationId;
                window.open(add_consultation_pdf_url, "_blank",
                    "width=870, height=650");
            });

        });
    </script>

</div>