@extends('../layout/' . $layout)

@section('subhead')
    <title>Permisiuni</title>
@endsection

@section('subcontent')

    <div class="py-12">
        <div style="display: flex; justify-content: space-between;">
            <h2 class="text-xl font-bold">
                {{ trans('cruds.permission.title_singular') }}
                {{ trans('global.list') }}
            </h2>
            @can('permission_create')
                <a class="btn btn-indigo" href="{{ route('admin.permissions.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.permission.title_singular') }}
                </a>
            @endcan
        </div>
        <div class="mt-6">
            @livewire('permission.index')
            {{--TODO trebuie decomentat cand facem tabelul nostru datatables--}}
            {{--<livewire:permissions-datatables/>--}}
        </div>
    </div>

@endsection

