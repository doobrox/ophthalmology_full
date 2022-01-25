<div>

    @if (session()->has('message'))
        {{-- TODO nu este corect, trebuie aflat de ce nu incarca aici js-ul --}}
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
        <script>
            toastr.success('{{ session('message') }}');
        </script>
    @endif

    <div class="mt-3">
        <livewire:tratment-scheme-datatables/>

        <div class="my-3 text-right">
            <span class="btn btn-primary font-bold py-2 px-4 rounded" wire:click="addTreatmentScheme()">Adauga Schema Tratament</span>
        </div>
    </div>

</div>