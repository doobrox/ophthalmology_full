@extends('../layout/' . $layout)

@section('subhead')
    <title>Editare fo</title>
@endsection

@section('subcontent')

    <div class="hidden">
        {{$eyeBottomId = Route::current()->parameter('id')}}
    </div>
    <livewire:edit-eye-bottom :id="$eyeBottomId">

@endsection