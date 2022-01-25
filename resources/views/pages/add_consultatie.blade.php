@extends('../layout/' . $layout)

@section('subhead')
    <title>Fisa de consultatie</title>
@endsection

@section('subcontent')

    <div class="hidden">
        {{$consultationId = Route::current()->parameter('id')}}
    </div>
    <livewire:add-consultation :id="$consultationId">

@endsection