@extends('../layout/' . $layout)

@section('subhead')
    <title>Editare procedura</title>
@endsection

@section('subcontent')

    <div class="hidden">
        {{$procedureId = Route::current()->parameter('id')}}
    </div>
    <livewire:edit-procedure :id="$procedureId">

@endsection