@extends('../layout/' . $layout)

@section('subhead')
    <title>Utilizatori - Editare</title>
@endsection

@section('subcontent')

    <div class="py-12">
        <h2 class="text-xl font-bold">
            {{ trans('global.edit') }}
            {{ trans('cruds.user.title_singular') }}:
            {{ trans('cruds.user.fields.id') }}
            {{ $user->id }}</h2>
        <div class="mt-6">
            @livewire('user.edit', [$user])
        </div>
    </div>

@endsection
