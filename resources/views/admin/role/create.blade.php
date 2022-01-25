@extends('../layout/' . $layout)

@section('subhead')
    <title>Roluri - Adauga</title>
@endsection

@section('subcontent')

    <div class="py-12">
        <h2 class="text-xl font-bold">
            {{ trans('global.create') }}
            {{ trans('cruds.role.title_singular') }}
        </h2>
        <div class="mt-6">
            @livewire('role.create')
        </div>
    </div>

@endsection
