<div>

    @if (session()->has('message'))
        <script>
            toastr.success('{{ session('message') }}');
        </script>
    @endif

    <div class="py-12">
        <h2 class="text-2xl font-bold">Adaugare articol:</h2>
        <div class="mt-6">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-3">
                    <label for="article_name" class="form-label w-auto mb-0 flex items-center font-bold">article_name</label>
                    <input type="text" class="form-control form-control-sm" id="article_name" wire:model="article_name">
                    @error('article_name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="article_price" class="form-label w-auto mb-0 flex items-center font-bold">article_price</label>
                    <input type="text" class="form-control form-control-sm" id="article_price" wire:model="article_price">
                    @error('article_price') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="article_discount" class="form-label w-auto mb-0 flex items-center font-bold">article_discount</label>
                    <input type="text" class="form-control form-control-sm" id="article_discount" wire:model="article_discount">
                    @error('article_discount') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="article_code" class="form-label w-auto mb-0 flex items-center font-bold">article_code</label>
                    <input type="text" class="form-control form-control-sm" id="article_code" wire:model="article_code">
                    @error('article_code') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="grid grid-cols-1 gap-6 mt-4">
                <label class="block">
                    <span class="text-gray-700 font-bold">article_description</span>
                    <textarea class="form-control" rows="6" wire:model="article_description"></textarea>
                </label>
            </div>
        </div>
        <div class="my-3 flex justify-between">
            <a href="{{ route('lista_articole') }}" class="btn btn-primary font-bold py-2 px-4 rounded mt-3">Inapoi</a>
            <button class="btn btn-primary font-bold py-2 px-4 rounded mt-3" type="button" wire:click="store()">Salveaza</button>
        </div>
    </div>

</div>
