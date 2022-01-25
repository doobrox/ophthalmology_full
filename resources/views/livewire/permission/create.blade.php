<div>
    <form wire:submit.prevent="submit" class="pt-3">

        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 {{ $errors->has('permission.title') ? 'invalid' : '' }}">
                <label class="form-label w-auto mb-0 flex items-center font-bold" for="title">{{ trans('cruds.permission.fields.title') }}</label>
                <input class="form-control form-control-sm" type="text" name="title" id="title" required wire:model.defer="permission.title">
                <div class="validation-message">
                    {{ $errors->first('permission.title') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.permission.fields.title_helper') }}
                </div>
            </div>
        </div>

        <div class="grid grid-cols-6 gap-6 mt-6">
            <div class="col-span-6">
                <button class="btn btn-indigo mr-2" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">
                    {{ trans('global.cancel') }}
                </a>
            </div>
        </div>

    </form>
</div>