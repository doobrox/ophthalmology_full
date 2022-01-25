<div>

    @if (session()->has('message'))
        <script>
            toastr.success('{{ session('message') }}');
        </script>
    @endif

    <div class="py-6">
        <h2 class="text-2xl font-bold">Informatii pacient:</h2>
        <div class="mt-6">
            <div class="grid grid-cols-6 gap-3">

                <div>
                    <label for="patient_name" class="form-label">Nume</label>
                    <input disabled type="text" class="form-control form-control-sm" id="patient_name" wire:model="patient_name">
                    @error('patient_name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="patient_forename" class="form-label">Prenume</label>
                    <input disabled type="text" class="form-control form-control-sm" id="patient_forename" wire:model="patient_forename">
                    @error('patient_forename') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="patient_locality" class="form-label">Localitate</label>
                    <input disabled type="text" class="form-control form-control-sm" id="patient_locality" wire:model="patient_locality">
                    @error('patient_locality') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="patient_date_of_birth" class="form-label">Data Nasterii</label>
                    <input disabled type="text" class="form-control form-control-sm" id="patient_date_of_birth" wire:model="patient_date_of_birth">
                    @error('patient_date_of_birth') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="col-span-2">
                    <label for="patient_name_and_forename" class="form-label">Nume initial</label>
                    <input disabled type="text" class="form-control form-control-sm" id="patient_name_and_forename" wire:model="patient_name_and_forename">
                    @error('patient_name_and_forename') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="col-span-3">
                    <label for="patient_cnp" class="form-label">CNP</label>
                    <input disabled type="text" class="form-control form-control-sm" id="patient_cnp" wire:model="patient_cnp">
                    @error('patient_cnp') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="patient_document" class="form-label">Document</label>
                    <input disabled type="text" class="form-control form-control-sm" id="patient_document" wire:model="patient_document">
                    @error('patient_document') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="patient_series" class="form-label">Serie</label>
                    <input disabled type="text" class="form-control form-control-sm" id="patient_series" wire:model="patient_series">
                    @error('patient_series') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="patient_document_number" class="form-label">Numar</label>
                    <input disabled type="text" class="form-control form-control-sm" id="patient_document_number" wire:model="patient_document_number">
                    @error('patient_document_number') <span class="error">{{ $message }}</span> @enderror
                </div>

            </div>
        </div>
    </div>

    <div class="py-6">
        <h2 class="text-2xl font-bold mb-2">Informatii plata:</h2>
        <div class="bg-gray-600 p-3">
            <h4 class="text-xl text-center text-white">Pacientul are rest de plata de la o vizita anterioara!</h4>
            <h3 class="mt-2 mb-4 text-white"><span class="text-2xl text-bold">1</span> - Plata numar: <b>34223566</b></h3>

            <table class="table bg-white">
                <thead>
                <tr>
                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap w-1/2">Produse</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Pret</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Discount</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Cantitate</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap text-right">Pret Total</th>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-gray-200 dark:bg-dark-1">
                    <td class="align-middle border-b dark:border-dark-5">1</td>
                    <td class="align-middle border-b dark:border-dark-5">nume produs 1</td>
                    <td class="align-middle border-b dark:border-dark-5">150 RON</td>
                    <td class="align-middle border-b dark:border-dark-5">10%</td>
                    <td class="align-middle border-b dark:border-dark-5">1</td>
                    <td class="align-middle border-b dark:border-dark-5 text-right">
                        <span class="bg-white shadow border rounded w-full py-2 px-3 text-gray-700">135 RON</span>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle border-b dark:border-dark-5">1</td>
                    <td class="align-middle border-b dark:border-dark-5">nume produs 2</td>
                    <td class="align-middle border-b dark:border-dark-5">25 RON</td>
                    <td class="align-middle border-b dark:border-dark-5">0</td>
                    <td class="align-middle border-b dark:border-dark-5">3</td>
                    <td class="align-middle border-b dark:border-dark-5 text-right">
                        <span class="bg-white shadow border rounded w-full py-2 px-3 text-gray-700">75 RON</span>
                    </td>
                </tr>
                <tr class="bg-gray-200 dark:bg-dark-1">
                    <td class="align-middle border-b dark:border-dark-5">1</td>
                    <td class="align-middle border-b dark:border-dark-5">nume produs 3</td>
                    <td class="align-middle border-b dark:border-dark-5">50 RON</td>
                    <td class="align-middle border-b dark:border-dark-5">0</td>
                    <td class="align-middle border-b dark:border-dark-5">1</td>
                    <td class="align-middle border-b dark:border-dark-5 text-right">
                        <span class="bg-white shadow border rounded w-full py-2 px-3 text-gray-700">50 RON</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" class="align-middle border-b dark:border-dark-5 text-right">
                        Total: <span class="bg-white shadow border rounded w-full py-2 px-3 text-gray-700">260 RON</span>
                    </td>
                </tr>
                </tbody>
            </table>

            <div class="text-right p-5">
                <h3 class="text-white">Suma platita anterior: <span class="bg-white shadow border rounded w-full py-2 px-3 text-gray-700">160 RON</span></h3>
                <h4 class="text-xl text-white mt-5">Rest plata: <span class="bg-white shadow border rounded w-full py-2 px-3 text-gray-700">100 RON</span></h4>
            </div>
            <div class="text-right pr-5">
                <button class="btn btn-primary mr-2" type="button" wire:click="store()">Plata Combinata</button>
                <button class="btn btn-primary" type="button" wire:click="store()">Incaseaza</button>
            </div>
        </div>

        <div>
            <h3 class="my-4"><span class="text-2xl text-bold">2</span> - Plata numar: <b>23255533</b></h3>
            <table class="table bg-white">
                <thead>
                <tr>
                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap w-1/2">Produse</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Pret</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Discount</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Cantitate</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap text-right">Pret Total</th>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-gray-200 dark:bg-dark-1">
                    <td class="align-middle border-b dark:border-dark-5">1</td>
                    <td class="align-middle border-b dark:border-dark-5">nume produs 1</td>
                    <td class="align-middle border-b dark:border-dark-5">40 RON</td>
                    <td class="align-middle border-b dark:border-dark-5">0</td>
                    <td class="align-middle border-b dark:border-dark-5">1</td>
                    <td class="align-middle border-b dark:border-dark-5 text-right">
                        <span class="bg-white shadow border rounded w-full py-2 px-3 text-gray-700">40 RON</span>
                    </td>
                </tr>
                <tr>
                    <td class="align-middle border-b dark:border-dark-5">1</td>
                    <td class="align-middle border-b dark:border-dark-5">nume produs 2</td>
                    <td class="align-middle border-b dark:border-dark-5">600 RON</td>
                    <td class="align-middle border-b dark:border-dark-5">20%</td>
                    <td class="align-middle border-b dark:border-dark-5">2</td>
                    <td class="align-middle border-b dark:border-dark-5 text-right">
                        <span class="bg-white shadow border rounded w-full py-2 px-3 text-gray-700">960 RON</span>
                    </td>
                </tr>
                <tr class="bg-gray-200 dark:bg-dark-1">
                    <td class="align-middle border-b dark:border-dark-5">1</td>
                    <td class="align-middle border-b dark:border-dark-5">nume produs 3</td>
                    <td class="align-middle border-b dark:border-dark-5">990 RON</td>
                    <td class="align-middle border-b dark:border-dark-5">0</td>
                    <td class="align-middle border-b dark:border-dark-5">1</td>
                    <td class="align-middle border-b dark:border-dark-5 text-right">
                        <span class="bg-white shadow border rounded w-full py-2 px-3 text-gray-700">990 RON</span>
                    </td>
                </tr>
                </tbody>
            </table>

            <div class="text-right p-5">
                <h3>
                    <b>Suma de plata:</b>
                    <span class="bg-white shadow border rounded w-full py-2 px-3 text-gray-700">1990 RON</span>
                </h3>
            </div>
            <div class="text-right pr-5">
                <button class="btn btn-primary mr-2" type="button" wire:click="store()">Plata Combinata</button>
                <button class="btn btn-primary" type="button" wire:click="store()">Incaseaza</button>
            </div>
        </div>
    </div>

</div>