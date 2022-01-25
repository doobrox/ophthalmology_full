@extends('../layout/' . $layout)

@section('subhead')
    <title>Editare medicament</title>
@endsection

@section('subcontent')

    <div class="hidden">
        {{$drugId = Route::current()->parameter('id')}}
    </div>
    <livewire:edit-drug :id="$drugId">

@endsection