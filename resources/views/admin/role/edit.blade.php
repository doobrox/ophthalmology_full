@extends('../layout/' . $layout)

@section('subhead')
    <title>Roluri- Editare</title>
@endsection

@section('subcontent')

    <div class="py-12">
        <h2 class="text-xl font-bold">
            {{ trans('global.edit') }}
            {{ trans('cruds.role.title_singular') }}:
            {{ trans('cruds.role.fields.id') }}
            {{ $role->id }}
        </h2>
        <div class="mt-6">
            @livewire('role.edit', [$role])
        </div>
    </div>

@endsection