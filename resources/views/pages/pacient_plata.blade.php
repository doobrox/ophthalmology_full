@extends('../layout/' . $layout)

@section('subhead')
    <title>Plata pacient</title>
@endsection

@section('subcontent')

    <div class="hidden">
        {{$patientId = Route::current()->parameter('id')}}
    </div>
    <livewire:pay-patient :id="$patientId">

@endsection