@extends('../layout/' . $layout)

@section('subhead')
    <title>Editare camp vizual</title>
@endsection

@section('subcontent')

    <div class="hidden">
        {{$visualFieldId = Route::current()->parameter('id')}}
    </div>
    <livewire:edit-visual-field :id="$visualFieldId">

@endsection