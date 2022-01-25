<div>

    @if (session()->has('message'))
        <script>
            toastr.success('{{ session('message') }}');
        </script>
    @endif

{{--{{var_dump($consultationDetails)}}--}}

    <div id="reteta_ochelari">

        <div class="flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">AUTOKERATOREFRACTOMETRIE / MICROSCOPIE SPECULARA</h2>
        </div>

        <div class="grid grid-cols-6 gap-3 mt-5">

            <div class="col-span-4">
                <div class="grid grid-cols-6 gap-1">

                    <label for="patient_name" class="form-label w-auto mb-0 flex items-center font-bold">Nume:</label>
                    <input type="number" readonly class="form-control form-control-sm" id="patient_name" wire:model="patient_name">

                    <label for="patient_forename" class="form-label w-auto mb-0 flex items-center font-bold">Prenume:</label>
                    <input type="number" readonly class="form-control form-control-sm" id="patient_forename" wire:model="patient_forename">

                    <label for="patient_age" class="form-label w-auto mb-0 flex items-center font-bold">Varsta:</label>
                    <input type="number" readonly class="form-control form-control-sm" id="patient_age" wire:model="patient_age">

                    <label for="consultation_form_number" class="form-label w-auto mb-0 flex items-center font-bold">Fisa consult:</label>
                    <input type="number" readonly class="form-control form-control-sm" id="consultation_form_number" wire:model="consultation_form_number">

                    <label for="visit_date" class="form-label w-auto mb-0 flex items-center font-bold">Data vizitei:</label>
                    <input type="number" readonly class="form-control form-control-sm" id="visit_date" wire:model="visit_date">

                </div>
            </div>

            <div class="col-span-2">
                <div class="grid grid-cols-2 gap-1">

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="add_kerato" wire:model="add_kerato">
                        <label for="add_kerato" class="form-check-label">kerato</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="add_biomicroscopie" wire:model="add_biomicroscopie">
                        <label for="add_biomicroscopie" class="form-check-label">microscopie</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="add_refracto" wire:model="add_refracto">
                        <label for="add_refracto" class="form-check-label">refracto</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="add_correction" wire:model="add_correction">
                        <label for="add_correction" class="form-check-label">corectie</label>
                    </div>

                </div>
            </div>

        </div>


        <div class="grid grid-cols-6 gap-3 mt-5">

            <div class="col-span-4">

                <h3 class="text-lg font-medium">Keratometrie</h3>
                <div class="grid grid-cols-10">

                    <p class="col-span-3 text-center border">O.D.</p>
                    <p class="col-span-3 text-center border">O.S.</p>

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    <p class="text-center border font-bold">K1</p>
                    <p class="text-center border font-bold">ax K1</p>
                    <p class="text-center border font-bold">K2</p>
                    <p class="text-center border font-bold">K1</p>
                    <p class="text-center border font-bold">ax K1</p>
                    <p class="text-center border font-bold">K2</p>

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    <input type="number" class="form-control form-control-sm border text-center" id="OD_K1" wire:model="OD_K1">
                    <input type="number" class="form-control form-control-sm border text-center" id="OD_ax_1" wire:model="OD_ax_1">
                    <input type="number" class="form-control form-control-sm border text-center" id="OD_K2" wire:model="OD_K2">
                    <input type="number" class="form-control form-control-sm border text-center" id="OS_K1" wire:model="OS_K1">
                    <input type="number" class="form-control form-control-sm border text-center" id="OS_ax_1" wire:model="OS_ax_1">
                    <input type="number" class="form-control form-control-sm border text-center" id="OS_K2" wire:model="OS_K2">

                </div>

                <h3 class="text-lg font-medium mt-5">Refratometrie</h3>
                <div class="grid grid-cols-10">

                    <p class="col-span-3 text-center border">O.D.</p>
                    <p class="col-span-3 text-center border">O.S.</p>

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    <p class="text-center border font-bold">sfera</p>
                    <p class="text-center border font-bold">cyl</p>
                    <p class="text-center border font-bold">ax cyl</p>
                    <p class="text-center border font-bold">sfera</p>
                    <p class="text-center border font-bold">cyl</p>
                    <p class="text-center border font-bold">ax cyl</p>

                    <p class="text-center border font-bold">DIP:</p>
                    <label for="ciclopegie" class="text-center border font-bold">ciclo-plegie</label>

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    <input type="number" class="form-control form-control-sm border text-center" id="OD_refracto_dsf" wire:model="OD_refracto_dsf">
                    <input type="number" class="form-control form-control-sm border text-center" id="OD_refracto_cyl" wire:model="OD_refracto_cyl">
                    <input type="number" class="form-control form-control-sm border text-center" id="OD_refracto_ax" wire:model="OD_refracto_ax">
                    <input type="number" class="form-control form-control-sm border text-center" id="OS_refracto_dsf" wire:model="OS_refracto_dsf">
                    <input type="number" class="form-control form-control-sm border text-center" id="OS_refracto_cyl" wire:model="OS_refracto_cyl">
                    <input type="number" class="form-control form-control-sm border text-center" id="OS_refracto_ax" wire:model="OS_refracto_ax">

                    <input type="number" class="form-control form-control-sm border text-center" id="DIP_refracto" wire:model="DIP_refracto">
                    <div class="form-check mx-auto">
                        <input class="form-check-input" type="checkbox" id="ciclopegie" wire:model="ciclopegie">
                    </div>

                </div>

                <h3 class="text-lg font-medium mt-5">Corectie optica</h3>
                <div class="grid grid-cols-10">

                    <p class="col-span-3 text-center border">O.D.</p>
                    <p class="col-span-3 text-center border">O.S.</p>

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    <p class="text-center border font-bold">Sfera</p>
                    <p class="text-center border font-bold">Cyl</p>
                    <p class="text-center border font-bold">Axa</p>
                    <p class="text-center border font-bold">Sfera</p>
                    <p class="text-center border font-bold">Cyl</p>
                    <p class="text-center border font-bold">Axa</p>

                    <p class="text-center border font-bold">DIP:</p>

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    <input type="number" class="form-control form-control-sm border text-center" id="far_OD_Dsf" wire:model="far_OD_Dsf">
                    <input type="number" class="form-control form-control-sm border text-center" id="far_OD_DCyl" wire:model="far_OD_DCyl">
                    <input type="number" class="form-control form-control-sm border text-center" id="far_OD_Ax" wire:model="far_OD_Ax">
                    <input type="number" class="form-control form-control-sm border text-center" id="far_OS_Dsf" wire:model="far_OS_Dsf">
                    <input type="number" class="form-control form-control-sm border text-center" id="far_OS_DCyl" wire:model="far_OS_DCyl">
                    <input type="number" class="form-control form-control-sm border text-center" id="far_OS_Ax" wire:model="far_OS_Ax">

                    <input type="number" class="form-control form-control-sm border text-center" id="far_DIP" wire:model="far_DIP">

                    <p class="text-center border font-bold">Distanta</p>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    <input type="number" class="form-control form-control-sm border text-center" id="near_OD_Dsf" wire:model="near_OD_Dsf">
                    <input type="number" class="form-control form-control-sm border text-center" id="near_OD_DCyl" wire:model="near_OD_DCyl">
                    <input type="number" class="form-control form-control-sm border text-center" id="near_OD_Ax" wire:model="near_OD_Ax">
                    <input type="number" class="form-control form-control-sm border text-center" id="near_OS_Dsf" wire:model="near_OS_Dsf">
                    <input type="number" class="form-control form-control-sm border text-center" id="near_OS_DCyl" wire:model="near_OS_DCyl">
                    <input type="number" class="form-control form-control-sm border text-center" id="near_OS_Ax" wire:model="near_OS_Ax">

                    <input type="number" class="form-control form-control-sm border text-center" id="near_DIP" wire:model="near_DIP">

                    <p class="text-center border font-bold">Aproape</p>

                </div>

            </div>

            <div class="">

                <div class="grid grid-cols-2">
                    <h3 class="text-lg font-medium mt-5 col-span-2 text-right">Microscopie speculara OD</h3>
                    <label for="MS_nr_OD" class="form-label w-auto mb-0 flex items-center font-bold justify-end mr-3">Nr:</label>
                    <input type="number" class="form-control form-control-sm" id="MS_nr_OD" wire:model="MS_nr_OD">
                    <label for="MS_CD_OD" class="form-label w-auto mb-0 flex items-center font-bold justify-end mr-3">CD:</label>
                    <input type="number" class="form-control form-control-sm" id="MS_CD_OD" wire:model="MS_CD_OD">
                    <label for="MS_avg_OD" class="form-label w-auto mb-0 flex items-center font-bold justify-end mr-3">Avg:</label>
                    <input type="number" class="form-control form-control-sm" id="MS_avg_OD" wire:model="MS_avg_OD">
                    <label for="MS_SD_OD" class="form-label w-auto mb-0 flex items-center font-bold justify-end mr-3">SD:</label>
                    <input type="number" class="form-control form-control-sm" id="MS_SD_OD" wire:model="MS_SD_OD">
                    <label for="MS_cv_OD" class="form-label w-auto mb-0 flex items-center font-bold justify-end mr-3">CV:</label>
                    <input type="number" class="form-control form-control-sm" id="MS_cv_OD" wire:model="MS_cv_OD">
                    <label for="MS_max_OD" class="form-label w-auto mb-0 flex items-center font-bold justify-end mr-3">Max:</label>
                    <input type="number" class="form-control form-control-sm" id="MS_max_OD" wire:model="MS_max_OD">
                    <label for="MS_min_OD" class="form-label w-auto mb-0 flex items-center font-bold justify-end mr-3">Min:</label>
                    <input type="number" class="form-control form-control-sm" id="MS_min_OD" wire:model="MS_min_OD">
                    <label for="MS_hex_OD" class="form-label w-auto mb-0 flex items-center font-bold justify-end mr-3">Hex:</label>
                    <input type="number" class="form-control form-control-sm" id="MS_hex_OD" wire:model="MS_hex_OD">
                    <label for="MS_pahi_OD" class="form-label w-auto mb-0 flex items-center font-bold justify-end mr-3">Pahimetrie:</label>
                    <input type="number" class="form-control form-control-sm" id="MS_pahi_OD" wire:model="MS_pahi_OD">
                </div>

            </div>

            <div class="">

                <div class="grid grid-cols-2">
                    <h3 class="text-lg font-medium mt-5 col-span-2 text-right">Microscopie speculara OS</h3>
                    <label for="MS_nr_OS" class="form-label w-auto mb-0 flex items-center font-bold justify-end mr-3">Nr:</label>
                    <input type="number" class="form-control form-control-sm" id="MS_nr_OS" wire:model="MS_nr_OS">
                    <label for="MS_CD_OS" class="form-label w-auto mb-0 flex items-center font-bold justify-end mr-3">CD:</label>
                    <input type="number" class="form-control form-control-sm" id="MS_CD_OS" wire:model="MS_CD_OS">
                    <label for="MS_avg_OS" class="form-label w-auto mb-0 flex items-center font-bold justify-end mr-3">Avg:</label>
                    <input type="number" class="form-control form-control-sm" id="MS_avg_OS" wire:model="MS_avg_OS">
                    <label for="MS_SD_OS" class="form-label w-auto mb-0 flex items-center font-bold justify-end mr-3">SD:</label>
                    <input type="number" class="form-control form-control-sm" id="MS_SD_OS" wire:model="MS_SD_OS">
                    <label for="MS_cv_OS" class="form-label w-auto mb-0 flex items-center font-bold justify-end mr-3">CV:</label>
                    <input type="number" class="form-control form-control-sm" id="MS_cv_OS" wire:model="MS_cv_OS">
                    <label for="MS_max_OS" class="form-label w-auto mb-0 flex items-center font-bold justify-end mr-3">Max:</label>
                    <input type="number" class="form-control form-control-sm" id="MS_max_OS" wire:model="MS_max_OS">
                    <label for="MS_min_OS" class="form-label w-auto mb-0 flex items-center font-bold justify-end mr-3">Min:</label>
                    <input type="number" class="form-control form-control-sm" id="MS_min_OS" wire:model="MS_min_OS">
                    <label for="MS_hex_OS" class="form-label w-auto mb-0 flex items-center font-bold justify-end mr-3">Hex:</label>
                    <input type="number" class="form-control form-control-sm" id="MS_hex_OS" wire:model="MS_hex_OS">
                    <label for="MS_pahi_OS" class="form-label w-auto mb-0 flex items-center font-bold justify-end mr-3">Pahimetrie:</label>
                    <input type="number" class="form-control form-control-sm" id="MS_pahi_OS" wire:model="MS_pahi_OS">
                </div>

            </div>

        </div>


               <div class="row">
                   <div class="col-md-12 text-center mt-3 mb-1">
                       {{--<button type="submit" class="btn btn-default mr-3 mt-2">Accepta toate datele si salveaza</button>--}}
                       <span class="btn btn-primary" wire:click="store()">Salveaza</span>
                       <span class="btn btn-primary" wire:click="backToPage()">Inapoi</span>
                       {{--<a href="{{ URL::route('add.consultation', array('id' => Route::current()->parameter('id'))) }}" class="btn btn-primary">Inapoi</a>--}}
{{--                       <a href="{{ route('add.consultation', $consultationDetails[0]->id)  }}" class="btn btn-primary">Inapoi</a>--}}
                       {{--<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-3" type="button" wire:click="store()">Salveaza</button>--}}
                       {{--<button class="btn btn-default mr-3 mt-2">Sterge datele pe gri si salveaza</button>--}}
                       {{--<button class="btn btn-default mr-3 mt-2">Iesire</button>--}}
                       {{--<button class="btn btn-default mr-3 mt-2">Reteta ochelari</button>--}}
                       {{--<button class="btn btn-default mr-3 mt-2">Investigatii paraclinice</button>--}}
                   </div>
               </div>
           </div>

        <script>

            // $(document).ready(function () {
            //
            //     $('#ciclopegie').change(
            //         function(){
            //             if ($(this).is(':checked')) {
            //                 @this.set('add_refracto', 1);
            //             } else {
            //                 @this.set('add_refracto', 0);
            //             }
            //         });
            //
            // });

        </script>


</div>