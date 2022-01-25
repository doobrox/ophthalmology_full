<?php

namespace App\Http\Livewire\Role;

use App\Models\Permission;
use App\Models\Role;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public Role $role;

    public array $permissions = [];

    public array $listsForFields = [];
    public $permissionsInfos;

    public function mount(Role $role)
    {
        $this->role = $role;
        $this->initListsForFields();
    }

    public function render()
    {

        $this->permissionsInfos = DB::table('permissions')
            ->select('id', 'title AS name')
            ->orderByDesc('id')
            ->get();

        return view('livewire.role.create');
    }

    public function submit()
    {
        $this->validate();

        $this->role->save();
        $this->role->permissions()->sync($this->permissions);

        return redirect()->route('admin.roles.index');
    }

    protected function rules(): array
    {
        return [
            'role.title' => [
                'string',
                'required',
            ],
            'permissions' => [
                'required',
                'array',
            ],
            'permissions.*.id' => [
                'integer',
                'exists:permissions,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['permissions'] = Permission::pluck('title', 'id');
    }
}
