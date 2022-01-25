@extends('../layout/' . $layout)

@section('subhead')
    <title>Editare biomicroscopie</title>
@endsection

@section('subcontent')

    <div class="hidden">
        {{$biomicroscopieId = Route::current()->parameter('id')}}
    </div>
    <livewire:edit-biomicroscopie :id="$biomicroscopieId">

@endsection