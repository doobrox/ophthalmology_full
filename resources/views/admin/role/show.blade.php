@extends('../layout/' . $layout)

@section('subhead')
    <title>Roluri - Vizualizare</title>
@endsection

@section('subcontent')

    <div class="py-12">

        <h2 class="text-xl font-bold">
            {{ trans('global.view') }}
            {{ trans('cruds.role.title_singular') }}:
            {{ trans('cruds.role.fields.id') }}
            {{ $role->id }}
        </h2>

        <div class="mt-6">
            <table class="table table-view">
                <tbody class="bg-white">
                <tr>
                    <th>
                        {{ trans('cruds.role.fields.id') }}
                    </th>
                    <td>
                        {{ $role->id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.role.fields.title') }}
                    </th>
                    <td>
                        {{ $role->title }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.role.fields.permissions') }}
                    </th>
                    <td>
                        @foreach($role->permissions as $key => $entry)
                            <span class="badge badge-relationship">{{ $entry->title }}</span>
                        @endforeach
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
                {{ trans('global.back') }}
            </a>
        </div>
    </div>

@endsection