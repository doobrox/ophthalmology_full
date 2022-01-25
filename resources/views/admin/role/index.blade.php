@extends('../layout/' . $layout)

@section('subhead')
    <title>Roluri</title>
@endsection

@section('subcontent')

    <div class="py-12">
        <div style="display: flex; justify-content: space-between;">
            <h2 class="text-xl font-bold">
                {{ trans('cruds.role.title_singular') }}
                {{ trans('global.list') }}
            </h2>
            @can('role_create')
                <a class="btn btn-indigo" href="{{ route('admin.roles.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.role.title_singular') }}
                </a>
            @endcan
        </div>
        <div class="mt-6">
            @livewire('role.index')
            {{--TODO trebuie decomentat cand facem tabelul nostru datatables--}}
            {{--<livewire:roles-datatables/>--}}
        </div>
    </div>

@endsection