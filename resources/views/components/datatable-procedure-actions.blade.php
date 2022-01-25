{{--<div class="flex space-x-1 justify-around">--}}

    {{--<a href="{{ route('edit.procedure', [$id]) }}" class="btn btn-rounded btn-success-soft btn-sm">Editare</a>--}}

    {{--<a href="{{ route('add.recipe', [$id]) }}" class="btn btn-rounded btn-warning-soft btn-sm">Retetar</a>--}}

    {{--<a href="{{ route('add.recipe', [$id]) }}" class="btn btn-rounded btn-danger-soft btn-sm">Stergere</a>--}}

    {{--@include('datatables::delete', ['value' => $id])--}}

{{--</div>--}}

<div class="flex lg:justify-center items-center">
    <a class="edit flex items-center mr-3 text-theme-20" href="{{ route('edit.procedure', [$id]) }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Editare
    </a>
    <a class="edit flex items-center mr-3" href="{{ route('add.recipe', [$id]) }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text w-4 h-4 mr-1"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> Retetar
    </a>
    @include('datatables::delete', ['value' => $id])
</div>