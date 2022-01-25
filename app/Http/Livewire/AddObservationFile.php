<?php

namespace App\Http\Livewire;

use App\Models\Visit;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\DB;

class AddObservationFile extends ModalComponent
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

//        TODO Aici trebuie sa facem pagina cu "optiuni / setari"
        $this->select_procedure_type = 7;
        $this->doctor_assigned_to_patient = 1;

        $this->dispatchBrowserEvent('applyDefaultProcedure');
        $this->dispatchBrowserEvent('applyDefaultDoctor');

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

        return view('livewire.add-observation-file', ['patients' => $patients, 'doctors' => $doctors, 'procedures_type' => $procedures_type]);

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

        $insertVisit = DB::table('visits')->insertGetId([
            'fk_patient_id' => $this->select_patient,
            'fk_doctor_assigned_to_patient' => $this->doctor_assigned_to_patient,
            'fk_select_procedure_type' => $this->select_procedure_type,
            'consultation_form_number' => $this->consultation_form_number,
            'is_casmb' => ($this->consultation_form_type == 0 ? 0 : 1),
            'fk_doctor_casmb_assigned_to_patient' => $this->doctor_casmb_assigned_to_patient,
            'user_who_input' => Auth::id(),
            'visit_status' => 1,
        ]);
//        dd($this);
        function dateDiff($start, $end) {
            $start_ts = strtotime($start);
            $end_ts = strtotime($end);
            $diff = $end_ts - $start_ts;
            return round($diff / 86400);
        }

        $duration_between_exams = DB::table('visits')
            ->select('visit_date')
            ->where('fk_patient_id', $this->select_patient)
            ->where('id', '!=', $insertVisit)
            ->orderBy('visit_date', 'desc')
            ->first();

        if($duration_between_exams){
            $durata_intreexam_f = dateDiff($duration_between_exams->visit_date, date("Y-m-d H:i:s"));
            DB::table('visits')->where('id', $insertVisit)->update(['duration_between_exams' => $durata_intreexam_f]);
        }

        $duration_of_the_first_examination = DB::table('visits')
            ->select('visit_date')
            ->where('fk_patient_id', $this->select_patient)
            ->where('id', '!=', $insertVisit)
            ->orderBy('visit_date', 'asc')
            ->first();

        if($duration_of_the_first_examination){
            $durata_intreexam = dateDiff($duration_of_the_first_examination->visit_date, date("Y-m-d H:i:s"));
            DB::table('visits')->where('id', $insertVisit)->update(['duration_of_the_first_examination' => $durata_intreexam]);
        }

        session()->flash('message', 'Fisa de observatie adaugata cu success!');

        $this->closeModalWithEvents([
            PatientDatatables::getName() => ['refreshLivewireDatatable', [date("Y-m-d")]],
            DoctorDatatables::getName() => ['refreshLivewireDatatable', [date("Y-m-d")]]
        ]);

        $this->forceClose()->closeModal();

        $this->resetInputFields();

    }
}
