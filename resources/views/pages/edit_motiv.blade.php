@extends('../layout/' . $layout)

@section('subhead')
    <title>Editare motiv</title>
@endsection

@section('subcontent')

    <div class="hidden">
        {{$reasonId = Route::current()->parameter('id')}}
    </div>
    <livewire:edit-reason :id="$reasonId">

@endsection