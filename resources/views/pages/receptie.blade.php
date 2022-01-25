@extends('../layout/' . $layout)

@section('subhead')
    <title>Receptie</title>
@endsection

@section('subcontent')

    <div class="flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Fise de observatie</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0 items-center">
            <label for="reception_data_visits" class="form-check-label mr-3">Data:</label>
            <input type="text" class="form-control text-center" id="reception_data_visits">
        </div>
    </div>
    <div class="grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-8">
            <span class="btn btn-primary" onclick="Livewire.emit('openModal', 'add-observation-file')">Introducere Fisa de observatie</span>
            <span class="btn btn-primary" onclick="Livewire.emit('openModal', 'add-new-patient')">Introducere Pacent nou</span>
        </div>
        {{--<div class="col-md-4">--}}
            {{--<button type="button" class="btn btn-block btn-secondary modificare-completare-date-pacient">Modificare/Completare date Pacient</button>--}}
            {{--<button type="button" class="btn btn-block btn-secondary cautare-vizita-pacient-modificare-nr-fisa-de-observatie">Cautare vizita pacient Modificare nr fisa de observatie</button>--}}
            {{--<button type="button" class="btn btn-block btn-secondary cautare-pacient">Cautare pacient</button>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
            {{--<button type="button" class="btn btn-block btn-secondary cautare-decont">Cautare decont</button>--}}
            {{--<button type="button" class="btn btn-block btn-secondary cautare-cristalin">Cautare cristalin</button>--}}
            {{--<button type="button" class="btn btn-block btn-secondary raport-incasari-z">Raport incasari/Z</button>--}}
        {{--</div>--}}
    </div>
    <div class="mt-5">
        <livewire:patient-datatables
                hideable="select"
                exportable/>
    </div>

    <script>
        $(function () {
            $('#reception_data_visits').daterangepicker({
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