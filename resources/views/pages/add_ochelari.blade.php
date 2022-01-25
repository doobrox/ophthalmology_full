@extends('../layout/' . $layout)

@section('subhead')
    <title>Adaugare retata ochelari</title>
@endsection

@section('subcontent')

    <div class="hidden">
        {{$consultationId = Route::current()->parameter('id')}}
    </div>
    <livewire:add-glasses :id="$consultationId">

@endsection