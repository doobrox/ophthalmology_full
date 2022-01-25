<div>

    @if (session()->has('message'))
        <script>
            toastr.success('{{ session('message') }}');
        </script>
    @endif

            <div class="flex flex-col sm:flex-row items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">Fisa decont</h2>
            </div>

            <div class="grid grid-cols-2 gap-3 mt-5">
                    <div>
                            <div class="grid grid-cols-4 gap-1">

                                    <div>
                                        <label for="patient_name" class="form-label w-auto mb-0 flex items-center font-bold">Nume</label>
                                        <input disabled type="text" class="form-control form-control-sm" id="patient_name" wire:model="patient_name">
                                    </div>

                                    <div class="col-span-2">
                                            <label for="patient_forename" class="form-label w-auto mb-0 flex items-center font-bold">Prenume</label>
                                            <input disabled type="text" class="form-control form-control-sm" id="patient_forename" wire:model="patient_forename">
                                    </div>

                                    <div>
                                            <label for="patient_age" class="form-label w-auto mb-0 flex items-center font-bold">Varsta Pacient</label>
                                            <input disabled type="text" class="form-control form-control-sm" id="patient_age" wire:model="patient_age">
                                    </div>

                                    <div class="col-span-2">
                                            <label for="patient_name_and_forename" class="form-label w-auto mb-0 flex items-center font-bold">Nume Initial</label>
                                            <input disabled type="text" class="form-control form-control-sm" id="patient_name_and_forename" wire:model="patient_name_and_forename">
                                    </div>

                                    <div>
                                            <label for="doctor_cas_assigned_to_patient" class="form-label w-auto mb-0 flex items-center font-bold">Doctor CAS</label>
                                            <input disabled type="text" class="form-control form-control-sm" id="doctor_cas_assigned_to_patient" wire:model="doctor_cas_assigned_to_patient">
                                    </div>

                                    <div>
                                            <label for="user_who_input" class="form-label w-auto mb-0 flex items-center font-bold">Fisa completata de</label>
                                            <input disabled type="text" class="form-control form-control-sm" id="user_who_input" wire:model="user_who_input">
                                    </div>


                            </div>
                    </div>

                    <div>
                            <div class="grid grid-cols-3 gap-1">

                                    <div>
                                            <label for="zzzzzzzzzzz" class="form-label w-auto mb-0 flex items-center font-bold">Pct CAS efectuare azi</label>
                                            <input disabled type="text" class="form-control form-control-sm" id="zzzzzzzzzzz" wire:model="zzzzzzzzzzz">
                                    </div>

                                    <div>
                                            <label for="zzzzzzzzzzz" class="form-label w-auto mb-0 flex items-center font-bold">Pct dec de CAS/zi</label>
                                            <input disabled type="text" class="form-control form-control-sm" id="zzzzzzzzzzz" wire:model="zzzzzzzzzzz">
                                    </div>

                                    <div>
                                            <label for="zzzzzzzzzzz" class="form-label w-auto mb-0 flex items-center font-bold">Nr pac ex azi</label>
                                            <input disabled type="text" class="form-control form-control-sm" id="zzzzzzzzzzz" wire:model="zzzzzzzzzzz">
                                    </div>

                                    <div>
                                            <label for="zzzzzzzzzzz" class="form-label w-auto mb-0 flex items-center font-bold">Pct CAS efectuate / luna</label>
                                            <input disabled type="text" class="form-control form-control-sm" id="zzzzzzzzzzz" wire:model="zzzzzzzzzzz">
                                    </div>

                                    <div>
                                            <label for="zzzzzzzzzzz" class="form-label w-auto mb-0 flex items-center font-bold">Pct dec de CAS/luna</label>
                                            <input disabled type="text" class="form-control form-control-sm" id="zzzzzzzzzzz" wire:model="zzzzzzzzzzz">
                                    </div>

                                    <div>
                                            <label for="zzzzzzzzzzz" class="form-label w-auto mb-0 flex items-center font-bold">Data</label>
                                            <input disabled type="text" class="form-control form-control-sm" id="zzzzzzzzzzz" wire:model="zzzzzzzzzzz">
                                    </div>

                            </div>
                    </div>
            </div>

            <div class="mt-5">

                    <table class="table bg-white">
                            <thead>
                                    <tr>
                                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Nume</th>
                                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">CAS</th>
                                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Pret</th>
                                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Reducere %</th>
                                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Reducere Fixa</th>
                                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Pret final</th>
                                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Cod</th>
                                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Puncte CAS</th>
                                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Extra</th>
                                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap"></th>
                                    </tr>
                            </thead>
                            <tbody>

                            @foreach($inputs as $key => $value)
                                    <tr class="selectToEmpty_{{$value}} {{(($key % 2 == 0) ? 'bg-gray-200 dark:bg-dark-1' : '')}}">
                                            <td class="align-middle border-b dark:border-dark-5 font-bold">{{ $key + 1 }}</td>
                                            <td class="align-middle border-b dark:border-dark-5 w-1/4">
                                                    <div wire:ignore>
                                                            <select class="form-select form-select-sm" id="add_procedure_select2_{{$value}}" wire:model="procedure.{{$value}}" >
                                                                    @if($selectType[$value] == 'procedures')
                                                                            <option value="">Select Procedure</option>
                                                                            @foreach($procedures as $procedure)
                                                                                    <option value="{{ $procedure->id }}">{{ $procedure->name }}</option>
                                                                            @endforeach
                                                                    @else
                                                                            <option value="">Select Articol</option>
                                                                            @foreach($articles as $article)
                                                                                    <option value="{{ $article->id }}">{{ $article->name }}</option>
                                                                            @endforeach
                                                                    @endif
                                                            </select>
                                                    </div>
                                            </td>
                                            <td class="text-center align-middle border-b dark:border-dark-5">
                                                    <div>
                                                            <input type="checkbox" {{((isset($is_cas[$value]) && $is_cas[$value] != null) ? 'checked' : '')}} class="">
                                                    </div>
                                            </td>
                                            <td class="align-middle border-b dark:border-dark-5">
                                                    <div><input disabled type="text" class="form-control form-control-sm" wire:model="procedure_price.{{ $value }}">
                                                            @error('procedure_price.'.$value) <span class="">{{ $message }}</span>@enderror</div>
                                            </td>
                                            <td class="align-middle border-b dark:border-dark-5">
                                                    <div><input type="text" class="form-control form-control-sm" wire:model="procedure_discount.{{ $value }}">
                                                            @error('procedure_discount.'.$value) <span class="">{{ $message }}</span>@enderror</div>
                                            </td>
                                            <td class="align-middle border-b dark:border-dark-5">
                                                    <div><input type="text" class="form-control form-control-sm" wire:model="procedure_discountFix.{{ $value }}">
                                                            @error('procedure_discountFix.'.$value) <span class="">{{ $message }}</span>@enderror</div>
                                            </td>
                                            <td class="align-middle border-b dark:border-dark-5">
                                                    <div><input type="text" class="form-control form-control-sm" wire:model="procedure_total.{{ $value }}">
                                                            @error('procedure_total.'.$value) <span class="">{{ $message }}</span>@enderror</div>
                                            </td>
                                            <td class="align-middle border-b dark:border-dark-5">
                                                    <div><input disabled type="text" class="form-control form-control-sm" wire:model="procedure_code.{{ $value }}">
                                                            @error('procedure_code.'.$value) <span class="">{{ $message }}</span>@enderror</div>
                                            </td>
                                            <td class="align-middle border-b dark:border-dark-5">
                                                    <div><input disabled type="text" class="form-control form-control-sm" wire:model="procedure_points.{{ $value }}">
                                                            @error('procedure_points.'.$value) <span class="">{{ $message }}</span>@enderror</div>
                                            </td>
                                            <td class="align-middle border-b dark:border-dark-5">
                                                    @if(isset($need_crystalline[$value]) && $need_crystalline[$value] == 1)
                                                            @if(isset($procedureCrystallineDetails[$value]))
                                                                    <button class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded text-yellow-400" wire:click='$emit("openModal", "crystalline-edit", {{ json_encode(['whatSelect' => $value, 'crystallineDetailsID' => $procedureCrystallineDetails[$value]["whatCrystalline"], 'camp1' => $procedureCrystallineDetails[$value]["camp1"], 'camp2' => $procedureCrystallineDetails[$value]["camp2"], 'camp3' => $procedureCrystallineDetails[$value]["camp3"]]) }})' type="button">Edit</button>

                                                            @else
                                                                    <button class="btn btn-primary py-2 px-4 rounded" wire:model:="need_crystalline.{{$value}}" wire:click='$emit("openModal", "all-crystallines", @json(["whatSelect" => "$value"]))' type="button">Crystallines</button>
                                                                    @error('need_crystalline.'.$value) <span class="">{{ $message }}</span>@enderror
                                                            @endif

                                                    @endif

                                            </td>
                                            <td class="align-middle border-b dark:border-dark-5">
                                                    <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
                                            </td>
                                    </tr>
                                    @if(isset($procedure_got_recipe[$value]) && $procedure_got_recipe[$value] != '')
                                            <tr class="bg-gray-200 dark:bg-dark-1">
                                                    <td colspan="11" class="align-middle border-b dark:border-dark-5">
                                                            <table class="table bg-white">
                                                                    <thead>
                                                                    <tr>
                                                                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                                                                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap w-1/2">Nume articol</th>
                                                                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Pret</th>
                                                                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Discount</th>
                                                                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Cod</th>
                                                                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Cantitate</th>
                                                                            <th class="border-b-2 dark:border-dark-5 whitespace-nowrap"></th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    @foreach($procedure_got_recipe[$value] as $keys => $recipe)
                                                                            <tr class="{{(($keys % 2 == 0) ? 'bg-gray-200 dark:bg-dark-1' : '')}}">
                                                                                    <td class="align-middle border-b dark:border-dark-5" style="padding-top:0.25rem; padding-bottom: 0.25rem;">{{ $keys + 1}}</td>
                                                                                    <td class="align-middle border-b dark:border-dark-5" style="padding-top:0.25rem; padding-bottom: 0.25rem;">{{ $recipe['article_name'] }}</td>
                                                                                    <td class="align-middle border-b dark:border-dark-5" style="padding-top:0.25rem; padding-bottom: 0.25rem;">{{ number_format($recipe['article_price'] ,2, '.', '') }}</td>
                                                                                    <td class="align-middle border-b dark:border-dark-5" style="padding-top:0.25rem; padding-bottom: 0.25rem;">{{ number_format($recipe['article_discount'] ,2, '.', '') }}</td>
                                                                                    <td class="align-middle border-b dark:border-dark-5" style="padding-top:0.25rem; padding-bottom: 0.25rem;">{{ $recipe['article_code'] }}</td>
                                                                                    <td class="align-middle border-b dark:border-dark-5" style="padding-top:0.25rem; padding-bottom: 0.25rem;"><input type="text" class="form-control form-control-sm" value="{{ $recipe['quantity'] }}"></td>
                                                                                    <td class="align-middle border-b dark:border-dark-5 text-right" style="padding-top:0.25rem; padding-bottom: 0.25rem;"> <button class="btn btn-danger btn-sm" wire:click.prevent="removeArticle({{$key}}, {{ $keys }})">Remove</button></td>
                                                                            </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                            </table>
                                                    </td>
                                            </tr>
                                    @endif

                                    <tr>
                                            <td colspan="11" class="px-0 align-middle border-b dark:border-dark-5" style="padding: 0;">
                                                    <div class="text-center">
                                                            @error('procedure.'.$value) <p class="my-3">{{ $message }}</p>@enderror
                                                            @error('article.'.$value) <p class="my-3">{{ $message }}</p>@enderror
                                                    </div>
                                            </td>
                                    </tr>

                            @endforeach

                            <tr>
                                    <td colspan="11" class="px-0 align-middle border-b dark:border-dark-5">
                                            <div class="flex justify-center">
                                                    <button class="font-bold py-2 px-4 btn btn-primary mr-3" wire:click.prevent="add({{$i}}, 'procedures')" wire:loading.remove>Add Procedura</button>
                                                    <button class="font-bold py-2 px-4 btn btn-primary" wire:click.prevent="add({{$i}}, 'articles')" wire:loading.remove>Add Articol</button>
                                                    <span class="font-bold text-red-700 py-2 px-4" wire:loading wire:target="add({{$i}}, 'procedures')">Adding</span>
                                                    <span class="font-bold text-red-700 py-2 px-4" wire:loading wire:target="add({{$i}}, 'articles')">Adding</span>
                                            </div>
                                    </td>
                            </tr>
                            </tbody>
                    </table>

            </div>

            <div>

                    <div class="grid grid-cols-4 mt-5 gap-6">

                            <div>
                                    <label for="zzzzzzzzzzz" class="form-label w-auto mb-0 flex items-center font-bold">Total CAS</label>
                                    <input disabled type="text" class="form-control" id="zzzzzzzzzzz" wire:model="zzzzzzzzzzz">
                            </div>

                            <div>
                                    <label for="zzzzzzzzzzz" class="form-label w-auto mb-0 flex items-center font-bold">Total articlee suplimentare</label>
                                    <input disabled type="text" class="form-control" id="zzzzzzzzzzz" wire:model="zzzzzzzzzzz">
                            </div>

                            <div>
                                    <label for="zzzzzzzzzzz" class="form-label w-auto mb-0 flex items-center font-bold">Total fara reduceri</label>
                                    <input disabled type="text" class="form-control" id="zzzzzzzzzzz" wire:model="zzzzzzzzzzz">
                            </div>

                            <div>
                                    <label for="zzzzzzzzzzz" class="form-label w-auto mb-0 flex items-center font-bold">Total plata</label>
                                    <input disabled type="text" class="form-control" id="zzzzzzzzzzz" wire:model="zzzzzzzzzzz">
                            </div>

                    </div>

                    <div class="grid grid-cols-6 mt-5">

                            <a href="{{ route('medic') }}" class="font-bold py-2 px-4 btn btn-primary mr-3">Iesire</a>
                            <div>&nbsp;</div>
                            <button class="font-bold py-2 px-4 btn btn-primary mr-3" wire:click.prevent="zzzzz()">Curata tabel</button>
                            <div>&nbsp;</div>
                            <button class="font-bold py-2 px-4 btn btn-primary mr-3" wire:click.prevent="zzzzz()">Imprimare decont</button>
                            <button class="font-bold py-2 px-4 btn btn-primary mr-3" wire:click.prevent="store()">Salveaza</button>

                            <button class="font-bold py-2 px-4 btn btn-primary mr-3" wire:click.prevent="dd()" style="margin-top: 20px;">DD</button>

                    </div>

            </div>

        <script>
            $(document).ready(function () {

                $('#add_procedure_select2_0').select2();
                $('#add_procedure_select2_0').on('change', function (e) {
                    var item = $('#add_procedure_select2_0').select2("val");
                    @this.set('procedure.0', item);
                });

                window.addEventListener('reApplySelect2', event => {

                    $('#add_procedure_select2_'+ event.detail.whatSelect).select2();

                    $('#add_procedure_select2_'+ event.detail.whatSelect).on('change', function (e) {
                        var item = $('#add_procedure_select2_'+ event.detail.whatSelect).select2("val");
                        @this.set('procedure.'+ event.detail.whatSelect, item);
                    });
                });

                @foreach ($inputs as $key => $value)
                    $('#add_procedure_select2_{{$value}}').select2();
                @endforeach

            });
        </script>
</div>
