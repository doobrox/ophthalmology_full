<div>
    <form wire:submit.prevent="submit" class="pt-3">

        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 {{ $errors->has('role.title') ? 'invalid' : '' }}">
                <label class="form-label w-auto mb-0 flex items-center font-bold" for="title">{{ trans('cruds.role.fields.title') }}</label>
                <input class="form-control form-control-sm" type="text" name="title" id="title" required wire:model.defer="role.title">
                <div class="validation-message">
                    {{ $errors->first('role.title') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.role.fields.title_helper') }}
                </div>
            </div>
        </div>

        <div class="grid grid-cols-6 gap-6 mt-6">
            <div class="col-span-6 {{ $errors->has('permissions') ? 'invalid' : '' }}">
                <label class="form-label w-auto mb-0 flex items-center font-bold" for="permissions">{{ trans('cruds.role.fields.permissions') }}</label>
                {{--<x-select-list class="form-control" required id="permissions" name="permissions" wire:model="permissions" :options="$this->listsForFields['permissions']" multiple />--}}
                <div>
                    <div wire:ignore>
                        <select class="form-control form-control-sm" id="permissions" wire:model="permissions" multiple name="permissions" >
                            @foreach($permissionsInfos as $permissionsInfo)
                                <option value="{{ $permissionsInfo->id }}">{{ $permissionsInfo->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="validation-message">
                    {{ $errors->first('permissions') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.role.fields.permissions_helper') }}
                </div>
            </div>
            <div class="col-span-6">
                <button class="btn btn-indigo mr-2" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
                    {{ trans('global.cancel') }}
                </a>
            </div>
        </div>

    </form>

    <script>
        $(document).ready(function () {
            $('#permissions').select2();
            $('#permissions').on('change', function (e) {
                var item = $('#permissions').select2("val");
            @this.set('permissions', item);
            });
        });
    </script>
</div>