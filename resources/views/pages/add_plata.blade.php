@extends('../layout/' . $layout)

        @section('subhead')
            <title>Fisa decont</title>
        @endsection

        @section('subcontent')

            <div class="hidden">
                {{$expanseId = Route::current()->parameter('id')}}
            </div>
            <livewire:add-expense :id="$expanseId">

@endsection