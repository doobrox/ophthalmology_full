{{--<div class="flex space-x-1 justify-around">--}}

    {{--<a href="{{ route('edit.article', [$id]) }}" class="btn btn-primary">Edit</a>--}}

    {{--@include('datatables::delete', ['value' => $id])--}}

{{--</div>--}}

<div class="flex lg:justify-center items-center">
    <a class="edit flex items-center mr-3 text-theme-20" href="{{ route('edit.eye_bottom', [$id]) }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Editare
    </a>
    @include('datatables::delete', ['value' => $id])
</div>