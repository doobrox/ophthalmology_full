@extends('../layout/' . $layout)

@section('subhead')
    <title>Permisiuni - Vizualizare</title>
@endsection

@section('subcontent')

    <div class="py-12">

        <h2 class="text-xl font-bold">
            {{ trans('global.view') }}
            {{ trans('cruds.permission.title_singular') }}:
            {{ trans('cruds.permission.fields.id') }}
            {{ $permission->id }}
        </h2>

        <div class="mt-6">
            <table class="table table-view">
                <tbody class="bg-white">
                <tr>
                    <th>
                        {{ trans('cruds.permission.fields.id') }}
                    </th>
                    <td>
                        {{ $permission->id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.permission.fields.title') }}
                    </th>
                    <td>
                        {{ $permission->title }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">
                {{ trans('global.back') }}
            </a>
        </div>
    </div>

@endsection