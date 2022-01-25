<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PayPatient extends Component
{

    public $patientId;

    public $patient_name,
        $patient_forename,
        $patient_locality,
        $patient_date_of_birth,
        $patient_name_and_forename,
        $patient_cnp,
        $patient_document,
        $patient_series,
        $patient_document_number;

    public function mount($id)
    {
        $this->patientId = $id;
    }

    public function render()
    {
        $patient = DB::table('patients')
            ->where('id', '=', $this->patientId)
            ->first();

        $this->patient_name = $patient->patient_name;
        $this->patient_forename = $patient->patient_forename;
        $this->patient_locality = $patient->patient_locality;
        $this->patient_date_of_birth = $patient->patient_date_of_birth;
        $this->patient_name_and_forename = $patient->patient_name_and_forename;
        $this->patient_cnp = $patient->patient_cnp;
        $this->patient_document = $patient->patient_document;
        $this->patient_series = $patient->patient_series;
        $this->patient_document_number = $patient->patient_document_number;

        return view('livewire.pay-patient', ['patientId' => $this->patientId, 'patient' => $patient,]);
    }
}
