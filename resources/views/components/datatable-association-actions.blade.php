<div class="flex space-x-1 justify-around">
        <input type="checkbox" wire:click="toggleCheckboxAutoSave({{$id}}, {{$procedure_price}}, {{$procedure_discount ? $procedure_discount : 0}}, {{$procedure_advance ? $procedure_advance : 0}}, {{$procedure_points ? $procedure_points : 0}})" class="form-checkbox mt-1 h-4 w-4 text-blue-600 transition duration-150 ease-in-out border border-gray-700" style="border-color: rgba(55, 65, 81, 1)!important;">
</div>