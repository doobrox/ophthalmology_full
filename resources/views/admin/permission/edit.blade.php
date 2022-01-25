@extends('../layout/' . $layout)

@section('subhead')
    <title>Permisiuni - Editare</title>
@endsection

@section('subcontent')

    <div class="py-12">
        <h2 class="text-xl font-bold">
            {{ trans('global.edit') }}
            {{ trans('cruds.permission.title_singular') }}:
            {{ trans('cruds.permission.fields.id') }}
            {{ $permission->id }}
        </h2>
        <div class="mt-6">
            @livewire('permission.edit', [$permission])
        </div>
    </div>

@endsection