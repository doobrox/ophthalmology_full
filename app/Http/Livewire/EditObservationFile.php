<?php

namespace App\Http\Livewire;

use App\Models\Visit;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\DB;

class EditObservationFile extends ModalComponent
{

    public $select_patient, $doctor_assigned_to_patient, $select_procedure_type, $doctor_casmb_assigned_to_patient, $autocomplete_form, $consultation_form_number, $consultation_form_type;

    public $patient_name,
        $patient_forename,
        $patient_date_of_registration,
        $patient_locality,
        $patient_street,
        $patient_number,
        $patient_phone,
        $patient_phone_second,
        $patient_email,
        $patient_date_of_birth,
        $patient_age,
        $patient_name_and_forename,
        $patient_name_and_forename_and_dob,
        $user_who_input,
        $patient_cnp,
        $patient_document,
        $patient_series,
        $patient_document_number;

    public $row_id;

    public $listeners = [
        'upsUserInfo' => 'upUserInfo',
    ];

    public function upUserInfo($allInfo){

        foreach ($allInfo as $key => $value) {
            $this->$key = $value;
        }
    }

    public function autocompleteForm($type)
    {
        if($type == 'pay'){
            $this->autocomplete_form = 'pay';
            $this->consultation_form_number = 'Pay Selectul din DB trebuie vazut';
        } elseif ($type == 'casmb'){
            $this->autocomplete_form = 'casmb';
            $this->consultation_form_number = 'CASMB Selectul din DB trebuie vazut';
        }
    }

    public function updatedSelectPatient()
    {

        $patientSelected = DB::table('patients')
            ->where('id', $this->select_patient)
            ->first();


        foreach ($patientSelected as $key => $value) {
            $this->$key = $value;
        }

        $this->patient_name_and_forename_and_dob = $patientSelected->patient_name_and_forename . ' ' . $patientSelected->patient_date_of_birth;

        $this->user_who_input = Auth::user()->name;

//        $this->dispatchBrowserEvent('applySelect2Info');
//        $this->dispatchBrowserEvent('applySelect2Consultation');
//        $this->dispatchBrowserEvent('applySelect2Consultation');

    }

    public function updatedConsultationFormType()
    {
        if($this->consultation_form_type == false){
            $this->doctor_casmb_assigned_to_patient = null;
            $this->consultation_form_type = null;
//            $this->dispatchBrowserEvent('applySelect2DoctorCasmbRemove');
        }
//        else {
//            $this->dispatchBrowserEvent('applySelect2DoctorCasmb');
//        }
    }

    public function render()
    {

        $patients = DB::table('patients')
            ->select('id', 'patient_name AS name', 'patient_forename', 'patient_date_of_birth AS date_of_birth')
            ->orderByDesc('id')
            ->get();

        $doctors = DB::table('doctors')
            ->select('id', 'doctor_name_and_forename AS name')
            ->orderByDesc('id')
            ->get();

        $procedures_type = DB::table('procedures')
            ->select('id', 'procedure_medical_name AS name')
            ->orderByDesc('id')
            ->get();

        return view('livewire.edit-observation-file', ['patients' => $patients, 'doctors' => $doctors, 'procedures_type' => $procedures_type]);

    }

    private function resetInputFields(){
        $this->select_patient = null;
        $this->doctor_assigned_to_patient = null;
        $this->select_procedure_type = null;
        $this->consultation_form_number = null;
        $this->consultation_form_type = null;
        $this->doctor_casmb_assigned_to_patient = null;
        $this->user_who_input = null;
    }

    public function store()
    {

        if(!is_null($this->consultation_form_type)){
            $this->validate([
                'select_patient' => 'required',
                'doctor_assigned_to_patient' => 'required',
                'select_procedure_type' => 'required',
                'consultation_form_number' => 'required',
                'consultation_form_type' => 'required',
                'doctor_casmb_assigned_to_patient' => 'required',
                'user_who_input' => 'required',
                'patient_cnp' => 'required',
            ]);
        } else {
            $this->validate([
                'select_patient' => 'required',
                'doctor_assigned_to_patient' => 'required',
                'select_procedure_type' => 'required',
                'consultation_form_number' => 'required',
                'user_who_input' => 'required',
            ]);
        }

        DB::table('visits')
            ->where('id', $this->row_id)
            ->update([
            'fk_patient_id' => $this->select_patient,
            'fk_doctor_assigned_to_patient' => $this->doctor_assigned_to_patient,
            'fk_select_procedure_type' => $this->select_procedure_type,
            'consultation_form_number' => $this->consultation_form_number,
            'is_casmb' => ($this->consultation_form_type == 0 ? 0 : 1),
            'fk_doctor_casmb_assigned_to_patient' => $this->doctor_casmb_assigned_to_patient,
            'user_who_input' => Auth::id()
            ]);

        session()->flash('message', 'Fisa de observatie editata cu success!');

        $this->closeModalWithEvents([
            PatientDatatables::getName() => ['refreshLivewireDatatable', [date("Y-m-d")]],
            DoctorDatatables::getName() => ['refreshLivewireDatatable', [date("Y-m-d")]]
        ]);

        $this->forceClose()->closeModal();

        $this->resetInputFields();

    }

    public function mount($select_patient, $row_id)
    {

        $this->select_patient = $select_patient;
        $this->row_id = $row_id;

        $patientSelected = DB::table('patients')
            ->where('id', $this->select_patient)
            ->first();

        $this->patient_name = $patientSelected->patient_name;
        $this->patient_forename = $patientSelected->patient_forename;
        $this->patient_locality = $patientSelected->patient_locality;
        $this->patient_street = $patientSelected->patient_street;
        $this->patient_number = $patientSelected->patient_number;
        $this->patient_phone = $patientSelected->patient_phone;
        $this->patient_phone_second = $patientSelected->patient_phone_second;
        $this->patient_email = $patientSelected->patient_email;
        $this->patient_cnp = $patientSelected->patient_cnp;
        $this->patient_document = $patientSelected->patient_document;
        $this->patient_series = $patientSelected->patient_series;
        $this->patient_document_number = $patientSelected->patient_document_number;
        $this->patient_date_of_birth = $patientSelected->patient_date_of_birth;
        $this->patient_age = $patientSelected->patient_age;

        $this->patient_name_and_forename_and_dob = $patientSelected->patient_name_and_forename . ' ' . $patientSelected->patient_date_of_birth;

        $this->user_who_input = Auth::user()->name;

        $visitDetails = DB::table('visits')
            ->where('visits.id', '=', $this->row_id)
            ->first();

        $this->doctor_assigned_to_patient = $visitDetails->fk_doctor_assigned_to_patient;
        $this->select_procedure_type = $visitDetails->fk_select_procedure_type;
        $this->consultation_form_number = $visitDetails->consultation_form_number;
        $this->consultation_form_type = (($visitDetails->is_casmb) == 0 ? null : true);
        $this->doctor_casmb_assigned_to_patient = $visitDetails->fk_doctor_casmb_assigned_to_patient;
        $this->user_who_input = $visitDetails->user_who_input;

    }

}
