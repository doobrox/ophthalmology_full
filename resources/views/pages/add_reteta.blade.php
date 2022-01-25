@extends('../layout/' . $layout)

@section('subhead')
    <title>Adaugare reteta</title>
@endsection

@section('subcontent')

    <div class="hidden">
        {{$procedureId = Route::current()->parameter('id')}}
    </div>
    <livewire:add-recipe :id="$procedureId">

@endsection