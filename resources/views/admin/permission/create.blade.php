@extends('../layout/' . $layout)

@section('subhead')
    <title>Permisiuni - Creare</title>
@endsection

@section('subcontent')

    <div class="py-12">
        <h2 class="text-xl font-bold">
            {{ trans('global.create') }}
            {{ trans('cruds.permission.title_singular') }}
        </h2>
        <div class="mt-6">
            @livewire('permission.create')
        </div>
    </div>

@endsection
