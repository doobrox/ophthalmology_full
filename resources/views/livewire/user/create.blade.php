<div>
    <form wire:submit.prevent="submit" class="pt-3">

        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-2 {{ $errors->has('user.name') ? 'invalid' : '' }}">
                <label class="form-label w-auto mb-0 flex items-center font-bold" for="name">{{ trans('cruds.user.fields.name') }}</label>
                <input class="form-control form-control-sm" type="text" name="name" id="name"  wire:model.defer="user.name">
                <div class="validation-message">
                    {{ $errors->first('user.name') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </div>
            </div>

            <div class="col-span-2 {{ $errors->has('user.email') ? 'invalid' : '' }}">
                <label class="form-label w-auto mb-0 flex items-center font-bold" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control form-control-sm" type="email" name="email" id="email"  wire:model.defer="user.email">
                <div class="validation-message">
                    {{ $errors->first('user.email') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.user.fields.email_helper') }}
                </div>
            </div>

            <div class="col-span-2 {{ $errors->has('user.password') ? 'invalid' : '' }}">
                <label class="form-label w-auto mb-0 flex items-center font-bold" for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control form-control-sm" type="password" name="password" id="password"  wire:model.defer="password">
                <div class="validation-message">
                    {{ $errors->first('password') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.user.fields.password_helper') }}
                </div>
            </div>
        </div>

        <div class="grid grid-cols-6 gap-6 mt-6">
            <div class="col-span-6 {{ $errors->has('roles') ? 'invalid' : '' }}">
                <label class="form-label w-auto flex items-center font-bold" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <div>
                    <div wire:ignore>
                        <select class="form-control form-control-sm" id="roles" wire:model="roles" multiple name="roles" >
                            @foreach($roleInfos as $roleInfo)
                                <option value="{{ $roleInfo->id }}">{{ $roleInfo->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{--<x-select-list class="form-control form-control-sm"  id="roles" name="roles" wire:model="roles" :options="$this->listsForFields['roles']" multiple />--}}
                <div class="validation-message">
                    {{ $errors->first('roles') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.user.fields.roles_helper') }}
                </div>
            </div>

            <div class="col-span-6">
                <button class="btn btn-indigo mr-2" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                    {{ trans('global.cancel') }}
                </a>
            </div>
        </div>

    </form>

    <script>
        $(document).ready(function () {
            $('#roles').select2();
            $('#roles').on('change', function (e) {
                var item = $('#roles').select2("val");
                @this.set('roles', item);
            });
        });
    </script>
</div>