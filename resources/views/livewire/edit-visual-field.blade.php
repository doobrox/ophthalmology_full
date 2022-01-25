<div>

    @if (session()->has('message'))
        <script>
            toastr.success('{{ session('message') }}');
        </script>
    @endif

    <div class="py-12">
        <h2 class="text-2xl font-bold">Editare camp vizual:</h2>
        <div class="mt-6">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-3">
                    <label for="visual_field_name" class="form-label w-auto mb-0 flex items-center font-bold">visual_field_name</label>
                    <input type="text" class="form-control form-control-sm" id="visual_field_name" wire:model="visual_field_name">
                    @error('visual_field_name') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="grid grid-cols-1 gap-6 mt-4">
                <label class="block">
                    <span class="text-gray-700 font-bold">visual_field_details</span>
                    <textarea class="form-control" rows="6" wire:model="visual_field_details"></textarea>
                </label>
            </div>
        </div>
        <div class="my-3 flex justify-between">
            <a href="{{ route('lista_campuri_vizuale') }}" class="btn btn-primary font-bold py-2 px-4 rounded mt-3">Inapoi</a>
            <button class="btn btn-primary font-bold py-2 px-4 rounded mt-3" type="button" wire:click="store()">Salveaza</button>
        </div>
    </div>

</div>