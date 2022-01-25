@extends('../layout/' . $layout)

@section('subhead')
    <title>Utilizatori - Adaugare</title>
@endsection

@section('subcontent')

    <div class="py-12">
        <h2 class="text-xl font-bold">
            {{ trans('global.create') }}
            {{ trans('cruds.user.title_singular') }}
        </h2>
        <div class="mt-6">
            @livewire('user.create')
        </div>
    </div>

@endsection
