@extends('../layout/' . $layout)

@section('subhead')
    <title>Editare gonioscipie</title>
@endsection

@section('subcontent')

    <div class="hidden">
        {{$gonioscipieId = Route::current()->parameter('id')}}
    </div>
    <livewire:edit-gonioscopie :id="$gonioscipieId">

@endsection