<div>

    @if (session()->has('message'))
        {{-- TODO nu este corect, trebuie aflat de ce nu incarca aici js-ul --}}
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
        <script>
            toastr.success('{{ session('message') }}');
        </script>
    @endif

    <div class="mt-3">
        <livewire:eye-bottom-datatables/>

        <div class="my-3 text-right">
            <span class="btn btn-primary font-bold py-2 px-4 rounded" wire:click="addEyeBottom()">Adauga FO</span>
        </div>
    </div>

</div>