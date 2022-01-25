@extends('../layout/' . $layout)

@section('subhead')
    <title>Editare diagnostic</title>
@endsection

@section('subcontent')

    <div class="hidden">
        {{$diagnosticId = Route::current()->parameter('id')}}
    </div>
    <livewire:edit-diagnostic :id="$diagnosticId">

@endsection