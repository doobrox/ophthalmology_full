<div>

    @if (session()->has('message'))
        <script>
            toastr.success('{{ session('message') }}');
        </script>
    @endif

    <div class="py-12">
        <h2 class="text-2xl font-bold">Adaugare procedura:</h2>
        <div class="mt-6">
            <div class="grid grid-cols-6 gap-6">

                <div class="col-span-5">
                    <label for="procedure_medical_name" class="form-label w-auto mb-0 flex items-center font-bold">procedure_medical_name</label>
                    <input type="text" class="form-control form-control-sm" id="procedure_medical_name" wire:model="procedure_medical_name">
                    @error('procedure_medical_name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="procedure_price" class="form-label w-auto mb-0 flex items-center font-bold">procedure_price</label>
                    <input type="text" class="form-control form-control-sm" id="procedure_price" wire:model="procedure_price">
                    @error('procedure_price') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="procedure_discount" class="form-label w-auto mb-0 flex items-center font-bold">procedure_discount</label>
                    <input type="text" class="form-control form-control-sm" id="procedure_discount" wire:model="procedure_discount">
                    @error('procedure_discount') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="procedure_advance" class="form-label w-auto mb-0 flex items-center font-bold">procedure_advance</label>
                    <input type="text" class="form-control form-control-sm" id="procedure_advance" wire:model="procedure_advance">
                    @error('procedure_advance') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="procedure_points" class="form-label w-auto mb-0 flex items-center font-bold">procedure_points</label>
                    <input type="text" class="form-control form-control-sm" id="procedure_points" wire:model="procedure_points">
                    @error('procedure_points') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="procedure_code" class="form-label w-auto mb-0 flex items-center font-bold">procedure_code</label>
                    <input type="text" class="form-control form-control-sm" id="procedure_code" wire:model="procedure_code">
                    @error('procedure_code') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="need_crystalline" wire:model="need_crystalline">
                    <label for="need_crystalline" class="form-check-label font-bold">need_crystalline</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="is_cas" wire:model="is_cas">
                    <label for="is_cas" class="form-check-label font-bold">CAS</label>
                </div>

            </div>

            <div class="grid grid-cols-4 gap-6 mt-6">
                <label class="block">
                    <span class="text-gray-700 font-bold">procedure_diagnostic</span>
                    <textarea class="form-control" rows="6" wire:model="procedure_diagnostic"></textarea>
                </label>
                <label class="block">
                    <span class="text-gray-700 font-bold">procedure_description</span>
                    <textarea class="form-control" rows="6" wire:model="procedure_description"></textarea>
                </label>
                <label class="block">
                    <span class="text-gray-700 font-bold">procedure_recommendation</span>
                    <textarea class="form-control" rows="6" wire:model="procedure_recommendation"></textarea>
                </label>
                <label class="block">
                    <span class="text-gray-700 font-bold">procedure_treatment</span>
                    <textarea class="form-control" rows="6" wire:model="procedure_treatment"></textarea>
                </label>
            </div>
        </div>
        <div class="my-3 flex justify-between">
            <a href="{{ route('lista_proceduri') }}" class="btn btn-primary font-bold py-2 px-4 rounded mt-3">Inapoi</a>
            <button class="btn btn-primary font-bold py-2 px-4 rounded mt-3" type="button" wire:click="store()">Salveaza</button>
        </div>
    </div>

</div>