@extends('../layout/' . $layout)

@section('subhead')
    <title>Utilizatori</title>
@endsection

@section('subcontent')

    <div class="py-12">
        <div style="display: flex; justify-content: space-between;">
            <h2 class="text-xl font-bold">
                {{ trans('cruds.user.title_singular') }}
                {{ trans('global.list') }}
            </h2>
            @can('user_create')
                <a class="btn btn-indigo" href="{{ route('admin.users.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
                </a>
            @endcan
        </div>
        <div class="mt-6">
            @livewire('user.index')
            {{--TODO trebuie decomentat cand facem tabelul nostru datatables--}}
            {{--<livewire:users-datatables/>--}}
        </div>
    </div>

@endsection
