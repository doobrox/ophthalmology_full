@extends('../layout/' . $layout)

@section('subhead')
    <title>Asistenta</title>
@endsection

@section('subcontent')

    <div class="flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Fise de observatie</h2>
        <div class="form-inline">
            <label for="medic_data_visits" class="form-label mr-3">Data:</label>
            <input type="text" class="form-control text-center" id="medic_data_visits">
        </div>
    </div>
    {{--<div class="grid grid-cols-12 gap-5 mt-5">--}}
        {{--<div class="col-span-12">--}}
            {{--<span class="btn btn-primary" onclick="Livewire.emit('openModal', 'add-observation-file')">Introducere Fisa de observatie</span>--}}
            {{--<span class="btn btn-primary" onclick="Livewire.emit('openModal', 'add-new-patient')">Introducere Pacent nou</span>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="mt-5">
        <livewire:assistant-datatables
            hideable="select"/>
    </div>

    <script>
        $(document).ready(function () {
            $('#medic_data_visits').daterangepicker({
                "singleDatePicker": true,
                locale: {
                    format: globalDateFormat,
                    firstDay: 1
                },
                "startDate": moment().format(globalDateFormat)
            }, function(start) {
                Livewire.emit('refreshLivewireDatatable', start.format('YYYY-MM-DD'))
            });
        });
    </script>
@endsection