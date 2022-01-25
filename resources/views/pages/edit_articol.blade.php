@extends('../layout/' . $layout)

@section('subhead')
    <title>Editare articol</title>
@endsection

@section('subcontent')

    <div class="hidden">
        {{$articleId = Route::current()->parameter('id')}}
    </div>
    <livewire:edit-article :id="$articleId">

@endsection