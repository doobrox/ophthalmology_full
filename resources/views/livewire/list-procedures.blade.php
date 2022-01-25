<div>

    @if (session()->has('message'))
        {{-- TODO nu este corect, trebuie aflat de ce nu incarca aici js-ul --}}
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
        <script>
            toastr.success('{{ session('message') }}');
        </script>
    @endif

    <div class="mt-3">
        <livewire:procedure-datatables/>

        <div class="my-3 flex justify-between">
            <span class="btn btn-primary font-bold py-2 px-4 rounded" wire:click="associationProcedures()">Asociere proceduri</span>
            <span class="btn btn-primary font-bold py-2 px-4 rounded" wire:click="addProcedure()">Adauga Procedura</span>
        </div>
    </div>

</div>