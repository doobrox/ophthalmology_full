@extends('../layout/' . $layout)

@section('subhead')
    <title>Editare schema tratament</title>
@endsection

@section('subcontent')

    <div class="hidden">
        {{$treatmentSchemeId = Route::current()->parameter('id')}}
    </div>
    <livewire:edit-treatment-scheme :id="$treatmentSchemeId">

@endsection