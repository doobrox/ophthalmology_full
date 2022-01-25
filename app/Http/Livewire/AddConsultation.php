<?php

namespace App\Http\Livewire;

use App\Models\Visit;
use App\Models\VisitsInfo;
use LivewireUI\Modal\ModalComponent;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;

class AddConsultation extends ModalComponent
{

    public $idObservationFile, $select_procedure_type;
//    public $select_diag;
    public $patient, $doctor;

    public $visits, $lastVisits, $whatToDoWithLastVisit = false;
    public $visits_id;
    public $fk_visits_id;
    public $fk_patient_id;
    public $lastVisitsInfo;
    public $actualVisitsInfo;
    public $articles;
    public $lastVisitsIdForUpdate;
    public $lastVisitsInfoIdForUpdate;

    public $today_date,
        $consultation_form_number,
        $patient_age,
        $patient_name,
        $patient_forename,
        $doctor_cas_assigned_to_patient,
        $patient_arrival_time,
        $select_procedure,
        $now_time,
        $cas_checkbox,
        $av_checkbox,
        $tio_checkbox,
        $biomicroscopie_checkbox,
        $oftalmoscopie_checkbox,
        $investigation_checkbox,
        $diagnostic,
        $insert_diagnostic_in_diagnostic_secondary_box,
        $insert_diagnostic_in_diagnostic_other_box,
        $check_diagnostic_by,
        $check_diagnostic_ry,
        $check_diagnostic_ly,
        $remove_diagnostic_x,
        $diagnostic_description,
        $check_diagnostic_secondary_by,
        $check_diagnostic_secondary_ry,
        $check_diagnostic_secondary_ly,
        $check_diagnostic_other_by,
        $check_diagnostic_other_ry,
        $check_diagnostic_other_ly,
        $diagnostic_secondary_description,
        $diagnostic_other_description,
        $drug,
        $insert_drug_in_treatment_box,
        $insert_drug_in_medical_letter_box,
        $check_drug_by,
        $check_drug_ry,
        $check_drug_ly,
        $remove_drug_x,
        $drug_description,
        $check_drug_treatment_by,
        $check_drug_treatment_ry,
        $check_drug_treatment_ly,
        $check_drug_medical_letter_by,
        $check_drug_medical_letter_ry,
        $check_drug_medical_letter_ly,
        $drug_treatment_description,
        $drug_medical_letter_description,
        $change_doctor_assigned_to_patient,
        $av_ry,
        $t_ry_non_c,
        $t_ry_c,
        $ry_cv_md,
        $ry_cv_pd,
        $av_ly,
        $t_ly_non_c,
        $t_ly_c,
        $ly_cv_md,
        $ly_cv_pd,
        $reason,
        $reason_description,
        $treatment_scheme,
        $treatment_scheme_description,
        $biomicroscopie_ry,
        $biomicroscopie_ry_description,
        $biomicroscopie_ly,
        $biomicroscopie_ly_description,
        $eye_bottom_by,
        $eye_bottom_ry,
        $eye_bottom_ly,
        $eye_bottom,
        $eye_bottom_description,
        $eye_bottom_extra_by,
        $eye_bottom_extra_ry,
        $eye_bottom_extra_ly,
        $eye_bottom_extra,
        $eye_bottom_extra_description,
        $historical_procedures,
        $historical_procedures_description,
        $gonioscopie_ry,
        $gonioscopie_ry_description,
        $gonioscopie_ly,
        $gonioscopie_ly_description,
        $visual_field_ry,
        $visual_field_ry_description,
        $visual_field_ly,
        $visual_field_ly_description,
        $visit_comments;

    public $diagnostics;
    public $drugs;
    public $reasons;
    public $treatment_schemes;
    public $biomicroscopies;
    public $eye_bottoms;
    public $procedures;
    public $gonioscopies;
    public $visual_fields;
    public $doctors;
    public $showButtons = false;

    public $confirmGrayFields = false, $acceptGray, $denyGray;

    public $gray_diagnostic_description = false,
        $gray_diagnostic_secondary_description = false,
        $gray_diagnostic_other_description = false,
        $gray_drug_treatment_description = false,
        $gray_drug_medical_letter_description = false,
        $gray_reason_description = false,
        $gray_treatment_scheme_description = false,
        $gray_biomicroscopie_ry_description = false,
        $gray_biomicroscopie_ly_description = false,
        $gray_eye_bottom_description = false,
        $gray_eye_bottom_extra_description = false,
        $gray_historical_procedures_description = false,
        $gray_gonioscopie_ry_description = false,
        $gray_gonioscopie_ly_description = false,
        $gray_visual_field_ry_description = false,
        $gray_visual_field_ly_description = false,
        $gray_visit_comments = false,
        $gray_av_ry = false,
        $gray_t_ry_non_c = false,
        $gray_t_ry_c = false,
        $gray_ry_cv_md = false,
        $gray_ry_cv_pd = false,
        $gray_av_ly = false,
        $gray_t_ly_non_c = false,
        $gray_t_ly_c = false,
        $gray_ly_cv_md = false,
        $gray_ly_cv_pd = false;

    public $keratometrie_checkbox, $refratometrie_checkbox, $optical_correction_checkbox, $microscopie_checkbox;

    public function ddDate(){
        dd($this);
    }

    public function mount($id)
    {

        $this->visits_id = $id;
        $this->fk_visits_id = $id;

        $this->visits = DB::table('visits')
            ->where('visits.id', '=', $id)
            ->get();

        // TODO sa vedem daca are last vizita .... sa nu crape mysql-ul
        $this->lastVisits = DB::table('visits')
            ->where('fk_patient_id', '=', $this->visits[0]->fk_patient_id)
            ->where('visits.id', '!=', $id)
            ->orderByDesc('visit_date')
            ->limit(1)
            ->get();

        $this->patient = DB::table('patients')
            ->where('id', '=', $this->visits[0]->fk_patient_id)
            ->get();
//dd($this->visits);
//        dd($this->visits[0]->fk_doctor_casmb_assigned_to_patient);
        $this->today_date = (new DateTime())->format('d-m-Y');
        $this->consultation_form_number = $this->visits[0]->consultation_form_number;
//        TODO sa vedem cum facem cron ceva pentru varsta pacientilor
        $this->patient_age = $this->patient[0]->patient_age;
        $this->patient_name = $this->patient[0]->patient_name;
        $this->patient_forename = $this->patient[0]->patient_forename;
        $this->doctor_cas_assigned_to_patient = $this->visits[0]->fk_doctor_casmb_assigned_to_patient;
        $this->change_doctor_assigned_to_patient = $this->visits[0]->fk_doctor_assigned_to_patient;
        $this->patient_arrival_time = date('H:i', strtotime($this->visits[0]->patient_arrival_time));
        $this->select_procedure = $this->visits[0]->fk_select_procedure_type;
        $this->now_time = (new DateTime())->format('H:i');

//        dd($this->visits[0]);
        $this->cas_checkbox = $this->visits[0]->is_casmb;
        $this->av_checkbox = $this->visits[0]->AutoRefracto;
        $this->tio_checkbox = $this->visits[0]->TIOGoldman;
        $this->biomicroscopie_checkbox = $this->visits[0]->biomicroscopies;
        $this->oftalmoscopie_checkbox = $this->visits[0]->oftalmoscopires;
        $this->investigation_checkbox = $this->visits[0]->biometrie;

        $this->keratometrie_checkbox = $this->visits[0]->keratometrie;
        $this->refratometrie_checkbox = $this->visits[0]->refratometrie;
        $this->optical_correction_checkbox = $this->visits[0]->optical_correction;
        $this->microscopie_checkbox = $this->visits[0]->microscopie;

        $this->fk_patient_id = $this->visits[0]->fk_patient_id;

        if (Visit::where('id', '=', $id)->exists()) {
//            dd('1');
            $this->lastVisitsIdForUpdate = $id;

            if (VisitsInfo::where('fk_visits_id', '=', $id)->exists()) {
                $this->actualVisitsInfo = DB::table('visits_infos')
                    ->where('fk_visits_id', '=', $id)
                    ->get();

                $this->diagnostic_description = $this->actualVisitsInfo[0]->diagnostic_description;
                $this->diagnostic_secondary_description = $this->actualVisitsInfo[0]->diagnostic_secondary_description;
                $this->diagnostic_other_description = $this->actualVisitsInfo[0]->diagnostic_other_description;
                $this->drug_treatment_description = $this->actualVisitsInfo[0]->drug_treatment_description;
                $this->drug_medical_letter_description = $this->actualVisitsInfo[0]->drug_medical_letter_description;
                $this->reason_description = $this->actualVisitsInfo[0]->reason_description;
                $this->treatment_scheme_description = $this->actualVisitsInfo[0]->treatment_scheme_description;
                $this->biomicroscopie_ry_description = $this->actualVisitsInfo[0]->biomicroscopie_ry_description;
                $this->biomicroscopie_ly_description = $this->actualVisitsInfo[0]->biomicroscopie_ly_description;
                $this->eye_bottom_description = $this->actualVisitsInfo[0]->eye_bottom_description;
                $this->eye_bottom_extra_description = $this->actualVisitsInfo[0]->eye_bottom_extra_description;
                $this->historical_procedures_description = $this->actualVisitsInfo[0]->historical_procedures_description;
                $this->gonioscopie_ry_description = $this->actualVisitsInfo[0]->gonioscopie_ry_description;
                $this->gonioscopie_ly_description = $this->actualVisitsInfo[0]->gonioscopie_ly_description;
                $this->visual_field_ry_description = $this->actualVisitsInfo[0]->visual_field_ry_description;
                $this->visual_field_ly_description = $this->actualVisitsInfo[0]->visual_field_ly_description;
                $this->visit_comments = $this->actualVisitsInfo[0]->visit_comments;
                $this->av_ry = $this->actualVisitsInfo[0]->av_ry;
                $this->t_ry_non_c = $this->actualVisitsInfo[0]->t_ry_non_c;
                $this->t_ry_c = $this->actualVisitsInfo[0]->t_ry_c;
                $this->ry_cv_md = $this->actualVisitsInfo[0]->ry_cv_md;
                $this->ry_cv_pd = $this->actualVisitsInfo[0]->ry_cv_pd;
                $this->av_ly = $this->actualVisitsInfo[0]->av_ly;
                $this->t_ly_non_c = $this->actualVisitsInfo[0]->t_ly_non_c;
                $this->t_ly_c = $this->actualVisitsInfo[0]->t_ly_c;
                $this->ly_cv_md = $this->actualVisitsInfo[0]->ly_cv_md;
                $this->ly_cv_pd = $this->actualVisitsInfo[0]->ly_cv_pd;

                $this->showButtons = true;

            } else {
                if(isset($this->lastVisits[0])){
                    if (VisitsInfo::where('fk_visits_id', '=', $this->lastVisits[0]->id)->exists()) {
                        $this->whatToDoWithLastVisit = true;
                    }
                }
            }
        }

        if (VisitsInfo::where('fk_visits_id', '=', $id)->exists()) {
            $this->lastVisitsInfoIdForUpdate = $id;
        }

    }

    public function updatedDiagnosticDescription(){
        $this->gray_diagnostic_description = false;
    }

    public function updatedDiagnosticSecondaryDescription(){
        $this->gray_diagnostic_secondary_description = false;
    }

    public function updatedDiagnosticOtherDescription(){
        $this->gray_diagnostic_other_description = false;
    }

    public function updatedDrugTreatmentDescription(){
        $this->gray_drug_treatment_description = false;
    }

    public function updatedDrugMedicalLetterDescription(){
        $this->gray_drug_medical_letter_description = false;
    }

    public function updatedReasonDescription(){
        $this->gray_reason_description = false;
    }

    public function updatedTreatmentSchemeDescription(){
        $this->gray_treatment_scheme_description = false;
    }

    public function updatedBiomicroscopieRyDescription(){
        $this->gray_biomicroscopie_ry_description = false;

        if(($this->biomicroscopie_ry_description != '') || ($this->biomicroscopie_ly_description != '')){
            $this->biomicroscopie_checkbox = 1;
        } else {
            $this->biomicroscopie_checkbox = 0;
        }
    }

    public function updatedBiomicroscopieLyDescription(){
        $this->gray_biomicroscopie_ly_description = false;

        if(($this->biomicroscopie_ly_description != '') || ($this->biomicroscopie_ry_description != '')){
            $this->biomicroscopie_checkbox = 1;
        } else {
            $this->biomicroscopie_checkbox = 0;
        }
    }

    public function updatedEyeBottomDescription(){
        $this->gray_eye_bottom_description = false;
    }

    public function updatedEyeBottomExtraDescription(){
        $this->gray_eye_bottom_extra_description = false;
    }

    public function updatedHistoricalProceduresDescription(){
        $this->gray_historical_procedures_description = false;
    }

    public function updatedGonioscopieRyDescription(){
        $this->gray_gonioscopie_ry_description = false;
    }

    public function updatedGonioscopieLyDescription(){
        $this->gray_gonioscopie_ly_description = false;
    }

    public function updatedVisualFieldRyDescription(){
        $this->gray_visual_field_ry_description = false;
    }

    public function updatedVisualFieldLyDescription(){
        $this->gray_visual_field_ly_description = false;
    }

    public function updatedVisitComments(){
        $this->gray_visit_comments = false;
    }

    public function updatedAvRy(){
        $this->gray_av_ry = false;

        if(($this->av_ry != '') || ($this->av_ly != '')){
            $this->av_checkbox = 1;
        } else {
            $this->av_checkbox = 0;
        }
    }

    public function updatedTRyNonC(){
        $this->gray_t_ry_non_c = false;
    }

    public function updatedTRyC(){
        $this->gray_t_ry_c = false;
    }

    public function updatedRyCvMd(){
        $this->gray_ry_cv_md = false;
    }

    public function updatedRyCvPd(){
        $this->gray_ry_cv_pd = false;
    }

    public function updatedAvLy(){
        $this->gray_av_ly = false;

        if(($this->av_ly != '') || ($this->av_ry != '')){
            $this->av_checkbox = 1;
        } else {
            $this->av_checkbox = 0;
        }
    }

    public function updatedTLyNonC(){
        $this->gray_t_ly_non_c = false;
    }

    public function updatedTLyC(){
        $this->gray_t_ly_c = false;
    }

    public function updatedLyCvMd(){
        $this->gray_ly_cv_md = false;
    }

    public function updatedLyCvPd(){
        $this->gray_ly_cv_pd = false;
    }



    //    DIAGNOSTIC PRINCIPAL (1)
    public function updatedDiagnostic($whatId){
        $what_diagnostic_description = array_search($whatId, array_column(json_decode($this->diagnostics), 'id'));
        $this->diagnostic_description = $this->diagnostics[$what_diagnostic_description]['diagnostic_details'];
    }

    public function insert_diagnostic_in_diagnostic_secondary_box(){
        $this->diagnostic_secondary_description .= $this->diagnostic_description . "\r\n";
        $this->diagnostic_description = '';
    }

    public function insert_diagnostic_in_diagnostic_other_box(){
        $this->diagnostic_other_description .= $this->diagnostic_description . "\r\n";
        $this->diagnostic_description = '';
    }

    public function check_diagnostic_by(){

        if (strpos($this->diagnostic_description, 'AO') !== false) {
            if (strpos($this->diagnostic_description, 'OS') !== false) {
                $this->diagnostic_description = str_replace("OS","",$this->diagnostic_description);
            }
            if (strpos($this->diagnostic_description, 'OD') !== false) {
                $this->diagnostic_description = str_replace("OD","",$this->diagnostic_description);
            }
        } else {
            $this->diagnostic_description = "AO ". $this->diagnostic_description;
            if (strpos($this->diagnostic_description, 'OS') !== false) {
                $this->diagnostic_description = str_replace("OS ","",$this->diagnostic_description);
            }
            if (strpos($this->diagnostic_description, 'OD') !== false) {
                $this->diagnostic_description = str_replace("OD ","",$this->diagnostic_description);
            }
        }
    }

    public function check_diagnostic_ry(){

        if (strpos($this->diagnostic_description, 'OD') !== false) {
            if (strpos($this->diagnostic_description, 'OS') !== false) {
                $this->diagnostic_description = str_replace("OS","",$this->diagnostic_description);
            }
            if (strpos($this->diagnostic_description, 'AO') !== false) {
                $this->diagnostic_description = str_replace("AO","",$this->diagnostic_description);
            }
        } else {
            $this->diagnostic_description = "OD ". $this->diagnostic_description;
            if (strpos($this->diagnostic_description, 'OS') !== false) {
                $this->diagnostic_description = str_replace("OS ","",$this->diagnostic_description);
            }
            if (strpos($this->diagnostic_description, 'AO') !== false) {
                $this->diagnostic_description = str_replace("AO ","",$this->diagnostic_description);
            }
        }
    }

    public function check_diagnostic_ly(){

        if (strpos($this->diagnostic_description, 'OS') !== false) {
            if (strpos($this->diagnostic_description, 'AO') !== false) {
                $this->diagnostic_description = str_replace("AO","",$this->diagnostic_description);
            }
            if (strpos($this->diagnostic_description, 'OD') !== false) {
                $this->diagnostic_description = str_replace("OD","",$this->diagnostic_description);
            }
        } else {
            $this->diagnostic_description = "OS ". $this->diagnostic_description;
            if (strpos($this->diagnostic_description, 'AO') !== false) {
                $this->diagnostic_description = str_replace("AO ","",$this->diagnostic_description);
            }
            if (strpos($this->diagnostic_description, 'OD') !== false) {
                $this->diagnostic_description = str_replace("OD ","",$this->diagnostic_description);
            }
        }
    }

    public function remove_diagnostic_x(){
        $this->diagnostic_description = '';
    }

    //    DIAGNOSTIC SEC (4)
    public function check_diagnostic_secondary_by(){
//        $this->diagnostic_secondary_description = str_replace("ochi","AO",$this->diagnostic_secondary_description);
        if (strpos($this->diagnostic_secondary_description, 'AO') !== false) {
            if (strpos($this->diagnostic_secondary_description, 'OS') !== false) {
                $this->diagnostic_secondary_description = str_replace("OS","",$this->diagnostic_secondary_description);
            }
            if (strpos($this->diagnostic_secondary_description, 'OD') !== false) {
                $this->diagnostic_secondary_description = str_replace("OD","",$this->diagnostic_secondary_description);
            }
        } else {
            $this->diagnostic_secondary_description = "AO ". $this->diagnostic_secondary_description;
            if (strpos($this->diagnostic_secondary_description, 'OS') !== false) {
                $this->diagnostic_secondary_description = str_replace("OS ","",$this->diagnostic_secondary_description);
            }
            if (strpos($this->diagnostic_secondary_description, 'OD') !== false) {
                $this->diagnostic_secondary_description = str_replace("OD ","",$this->diagnostic_secondary_description);
            }
        }
    }

    public function check_diagnostic_secondary_ry(){
//        $this->diagnostic_secondary_description = str_replace("ochi","OD",$this->diagnostic_secondary_description);
        if (strpos($this->diagnostic_secondary_description, 'OD') !== false) {
            if (strpos($this->diagnostic_secondary_description, 'AO') !== false) {
                $this->diagnostic_secondary_description = str_replace("AO","",$this->diagnostic_secondary_description);
            }
            if (strpos($this->diagnostic_secondary_description, 'OS') !== false) {
                $this->diagnostic_secondary_description = str_replace("OS","",$this->diagnostic_secondary_description);
            }
        } else {
            $this->diagnostic_secondary_description = "OD ". $this->diagnostic_secondary_description;
            if (strpos($this->diagnostic_secondary_description, 'AO') !== false) {
                $this->diagnostic_secondary_description = str_replace("AO ","",$this->diagnostic_secondary_description);
            }
            if (strpos($this->diagnostic_secondary_description, 'OS') !== false) {
                $this->diagnostic_secondary_description = str_replace("OS ","",$this->diagnostic_secondary_description);
            }
        }
    }

    public function check_diagnostic_secondary_ly(){
//        $this->diagnostic_secondary_description = str_replace("ochi","OS",$this->diagnostic_secondary_description);
        if (strpos($this->diagnostic_secondary_description, 'OS') !== false) {
            if (strpos($this->diagnostic_secondary_description, 'AO') !== false) {
                $this->diagnostic_secondary_description = str_replace("AO","",$this->diagnostic_secondary_description);
            }
            if (strpos($this->diagnostic_secondary_description, 'OD') !== false) {
                $this->diagnostic_secondary_description = str_replace("OD","",$this->diagnostic_secondary_description);
            }
        } else {
            $this->diagnostic_secondary_description = "OS ". $this->diagnostic_secondary_description;
            if (strpos($this->diagnostic_secondary_description, 'AO') !== false) {
                $this->diagnostic_secondary_description = str_replace("AO ","",$this->diagnostic_secondary_description);
            }
            if (strpos($this->diagnostic_secondary_description, 'OD') !== false) {
                $this->diagnostic_secondary_description = str_replace("OD ","",$this->diagnostic_secondary_description);
            }
        }
    }

    //    ALTE DIAGNOSTICE (3)
    public function check_diagnostic_other_by(){
//        $this->diagnostic_other_description = str_replace("ochi","AO",$this->diagnostic_other_description);
        if (strpos($this->diagnostic_other_description, 'AO') !== false) {
            if (strpos($this->diagnostic_other_description, 'OS') !== false) {
                $this->diagnostic_other_description = str_replace("OS","",$this->diagnostic_other_description);
            }
            if (strpos($this->diagnostic_other_description, 'OD') !== false) {
                $this->diagnostic_other_description = str_replace("OD","",$this->diagnostic_other_description);
            }
        } else {
            $this->diagnostic_other_description = "AO ". $this->diagnostic_other_description;
            if (strpos($this->diagnostic_other_description, 'OS') !== false) {
                $this->diagnostic_other_description = str_replace("OS ","",$this->diagnostic_other_description);
            }
            if (strpos($this->diagnostic_other_description, 'OD') !== false) {
                $this->diagnostic_other_description = str_replace("OD ","",$this->diagnostic_other_description);
            }
        }
    }

    public function check_diagnostic_other_ry(){
//        $this->diagnostic_other_description = str_replace("ochi","OD",$this->diagnostic_other_description);
        if (strpos($this->diagnostic_other_description, 'OD') !== false) {
            if (strpos($this->diagnostic_other_description, 'AO') !== false) {
                $this->diagnostic_other_description = str_replace("AO","",$this->diagnostic_other_description);
            }
            if (strpos($this->diagnostic_other_description, 'OS') !== false) {
                $this->diagnostic_other_description = str_replace("OS","",$this->diagnostic_other_description);
            }
        } else {
            $this->diagnostic_other_description = "OD ". $this->diagnostic_other_description;
            if (strpos($this->diagnostic_other_description, 'AO') !== false) {
                $this->diagnostic_other_description = str_replace("AO ","",$this->diagnostic_other_description);
            }
            if (strpos($this->diagnostic_other_description, 'OS') !== false) {
                $this->diagnostic_other_description = str_replace("OS ","",$this->diagnostic_other_description);
            }
        }
    }

    public function check_diagnostic_other_ly(){
//        $this->diagnostic_other_description = str_replace("ochi","OS",$this->diagnostic_other_description);
        if (strpos($this->diagnostic_other_description, 'OS') !== false) {
            if (strpos($this->diagnostic_other_description, 'AO') !== false) {
                $this->diagnostic_other_description = str_replace("AO","",$this->diagnostic_other_description);
            }
            if (strpos($this->diagnostic_other_description, 'OD') !== false) {
                $this->diagnostic_other_description = str_replace("OD","",$this->diagnostic_other_description);
            }
        } else {
            $this->diagnostic_other_description = "OS ". $this->diagnostic_other_description;
            if (strpos($this->diagnostic_other_description, 'AO') !== false) {
                $this->diagnostic_other_description = str_replace("AO ","",$this->diagnostic_other_description);
            }
            if (strpos($this->diagnostic_other_description, 'OD') !== false) {
                $this->diagnostic_other_description = str_replace("OD ","",$this->diagnostic_other_description);
            }
        }
    }

    //    TRATAMENT
    public function updatedDrug($whatId){
        $what_drug_description = array_search($whatId, array_column(json_decode($this->drugs), 'id'));
        $this->drug_description = $this->drugs[$what_drug_description]['drug_schema'];
    }

    public function insert_drug_in_treatment_box(){
        $this->drug_treatment_description .= $this->drug_description . "\r\n";
        $this->drug_description = '';
    }

    public function insert_drug_in_medical_letter_box(){
        $this->drug_medical_letter_description .= $this->drug_description . "\r\n";
        $this->drug_description = '';
    }

    public function check_drug_by(){
        $this->drug_description = str_replace("ochi","AO",$this->drug_description);
    }

    public function check_drug_ry(){
        $this->drug_description = str_replace("ochi","OD",$this->drug_description);
    }

    public function check_drug_ly(){
        $this->drug_description = str_replace("ochi","OS",$this->drug_description);
    }

    public function remove_drug_x(){
        $this->drug_description = '';
    }

    //    TRATAMENT 2
    public function check_drug_treatment_by(){
        $this->drug_treatment_description = str_replace("ochi","AO",$this->drug_treatment_description);
    }

    public function check_drug_treatment_ry(){
        $this->drug_treatment_description = str_replace("ochi","OD",$this->drug_treatment_description);
    }

    public function check_drug_treatment_ly(){
        $this->drug_treatment_description = str_replace("ochi","OS",$this->drug_treatment_description);
    }

    //    SCRIS MED
    public function check_drug_medical_letter_by(){
        $this->drug_medical_letter_description = str_replace("ochi","AO",$this->drug_medical_letter_description);
    }

    public function check_drug_medical_letter_ry(){
        $this->drug_medical_letter_description = str_replace("ochi","OD",$this->drug_medical_letter_description);
    }

    public function check_drug_medical_letter_ly(){
        $this->drug_medical_letter_description = str_replace("ochi","OS",$this->drug_medical_letter_description);
    }

    //    motive prez
    public function updatedReason($whatId){
        $what_reason_description = array_search($whatId, array_column(json_decode($this->reasons), 'id'));
        $this->reason_description = $this->reasons[$what_reason_description]['reason_details'];
    }

    //    RECOMANDARI
    public function updatedTreatmentScheme($whatId){
        $what_treatment_scheme_description = array_search($whatId, array_column(json_decode($this->treatment_schemes), 'id'));
        $this->treatment_scheme_description = $this->treatment_schemes[$what_treatment_scheme_description]['treatment_scheme_details'];
    }

    //    OS EXAMEN BIOMICROSCOPIC
    public function updatedBiomicroscopieRy($whatId){
        $what_biomicroscopie_ry_description = array_search($whatId, array_column(json_decode($this->biomicroscopies), 'id'));
        $this->biomicroscopie_ry_description = $this->biomicroscopies[$what_biomicroscopie_ry_description]['biomicroscopie_details'];

        $this->biomicroscopie_checkbox = 1;
    }

    //    OS EXAMEN BIOMICROSCOPIC
    public function updatedBiomicroscopieLy($whatId){
        $what_biomicroscopie_ly_description = array_search($whatId, array_column(json_decode($this->biomicroscopies), 'id'));
        $this->biomicroscopie_ly_description = $this->biomicroscopies[$what_biomicroscopie_ly_description]['biomicroscopie_details'];

        $this->biomicroscopie_checkbox = 1;
    }

    //    FO
    public function updatedEyeBottom($whatId){
        $what_eye_bottom_description = array_search($whatId, array_column(json_decode($this->eye_bottoms), 'id'));
        $this->eye_bottom_description = $this->eye_bottoms[$what_eye_bottom_description]['eye_bottom_details'];
    }

    public function eye_bottom_by(){
//        $this->eye_bottom_description = str_replace("ochi","AO",$this->eye_bottom_description);
        if (strpos($this->eye_bottom_description, 'AO') !== false) {
            if (strpos($this->eye_bottom_description, 'OS') !== false) {
                $this->eye_bottom_description = str_replace("OS","",$this->eye_bottom_description);
            }
            if (strpos($this->eye_bottom_description, 'OD') !== false) {
                $this->eye_bottom_description = str_replace("OD","",$this->eye_bottom_description);
            }
        } else {
            $this->eye_bottom_description = "AO ". $this->eye_bottom_description;
            if (strpos($this->eye_bottom_description, 'OS') !== false) {
                $this->eye_bottom_description = str_replace("OS ","",$this->eye_bottom_description);
            }
            if (strpos($this->eye_bottom_description, 'OD') !== false) {
                $this->eye_bottom_description = str_replace("OD ","",$this->eye_bottom_description);
            }
        }
    }

    public function eye_bottom_ry(){
//        $this->eye_bottom_description = str_replace("ochi","OD",$this->eye_bottom_description);
        if (strpos($this->eye_bottom_description, 'OD') !== false) {
            if (strpos($this->eye_bottom_description, 'OS') !== false) {
                $this->eye_bottom_description = str_replace("OS","",$this->eye_bottom_description);
            }
            if (strpos($this->eye_bottom_description, 'AO') !== false) {
                $this->eye_bottom_description = str_replace("AO","",$this->eye_bottom_description);
            }
        } else {
            $this->eye_bottom_description = "OD ". $this->eye_bottom_description;
            if (strpos($this->eye_bottom_description, 'OS') !== false) {
                $this->eye_bottom_description = str_replace("OS ","",$this->eye_bottom_description);
            }
            if (strpos($this->eye_bottom_description, 'AO') !== false) {
                $this->eye_bottom_description = str_replace("AO ","",$this->eye_bottom_description);
            }
        }
    }

    public function eye_bottom_ly(){
//        $this->eye_bottom_description = str_replace("ochi","OS",$this->eye_bottom_description);
        if (strpos($this->eye_bottom_description, 'OS') !== false) {
            if (strpos($this->eye_bottom_description, 'AO') !== false) {
                $this->eye_bottom_description = str_replace("AO","",$this->eye_bottom_description);
            }
            if (strpos($this->eye_bottom_description, 'OD') !== false) {
                $this->eye_bottom_description = str_replace("OD","",$this->eye_bottom_description);
            }
        } else {
            $this->eye_bottom_description = "OS ". $this->eye_bottom_description;
            if (strpos($this->eye_bottom_description, 'AO') !== false) {
                $this->eye_bottom_description = str_replace("AO ","",$this->eye_bottom_description);
            }
            if (strpos($this->eye_bottom_description, 'OD') !== false) {
                $this->eye_bottom_description = str_replace("OD ","",$this->eye_bottom_description);
            }
        }
    }

    //    FO cont...
    public function updatedEyeBottomExtra($whatId){
        $what_eye_bottom_extra_description = array_search($whatId, array_column(json_decode($this->eye_bottoms), 'id'));
        $this->eye_bottom_extra_description = $this->eye_bottoms[$what_eye_bottom_extra_description]['eye_bottom_details'];
    }

    public function eye_bottom_extra_by(){
//        $this->eye_bottom_extra_description = str_replace("ochi","AO",$this->eye_bottom_extra_description);
        if (strpos($this->eye_bottom_extra_description, 'AO') !== false) {
            if (strpos($this->eye_bottom_extra_description, 'OS') !== false) {
                $this->eye_bottom_extra_description = str_replace("OS","",$this->eye_bottom_extra_description);
            }
            if (strpos($this->eye_bottom_extra_description, 'OD') !== false) {
                $this->eye_bottom_extra_description = str_replace("OD","",$this->eye_bottom_extra_description);
            }
        } else {
            $this->eye_bottom_extra_description = "AO ". $this->eye_bottom_extra_description;
            if (strpos($this->eye_bottom_extra_description, 'OS') !== false) {
                $this->eye_bottom_extra_description = str_replace("OS ","",$this->eye_bottom_extra_description);
            }
            if (strpos($this->eye_bottom_extra_description, 'OD') !== false) {
                $this->eye_bottom_extra_description = str_replace("OD ","",$this->eye_bottom_extra_description);
            }
        }
    }

    public function eye_bottom_extra_ry(){
//        $this->eye_bottom_extra_description = str_replace("ochi","OD",$this->eye_bottom_extra_description);
        if (strpos($this->eye_bottom_extra_description, 'OD') !== false) {
            if (strpos($this->eye_bottom_extra_description, 'OS') !== false) {
                $this->eye_bottom_extra_description = str_replace("OS","",$this->eye_bottom_extra_description);
            }
            if (strpos($this->eye_bottom_extra_description, 'AO') !== false) {
                $this->eye_bottom_extra_description = str_replace("AO","",$this->eye_bottom_extra_description);
            }
        } else {
            $this->eye_bottom_extra_description = "OD ". $this->eye_bottom_extra_description;
            if (strpos($this->eye_bottom_extra_description, 'OS') !== false) {
                $this->eye_bottom_extra_description = str_replace("OS ","",$this->eye_bottom_extra_description);
            }
            if (strpos($this->eye_bottom_extra_description, 'AO') !== false) {
                $this->eye_bottom_extra_description = str_replace("AO ","",$this->eye_bottom_extra_description);
            }
        }
    }

    public function eye_bottom_extra_ly(){
//        $this->eye_bottom_extra_description = str_replace("ochi","OS",$this->eye_bottom_extra_description);
        if (strpos($this->eye_bottom_extra_description, 'OS') !== false) {
            if (strpos($this->eye_bottom_extra_description, 'AO') !== false) {
                $this->eye_bottom_extra_description = str_replace("AO","",$this->eye_bottom_extra_description);
            }
            if (strpos($this->eye_bottom_extra_description, 'OD') !== false) {
                $this->eye_bottom_extra_description = str_replace("OD","",$this->eye_bottom_extra_description);
            }
        } else {
            $this->eye_bottom_extra_description = "OS ". $this->eye_bottom_extra_description;
            if (strpos($this->eye_bottom_extra_description, 'AO') !== false) {
                $this->eye_bottom_extra_description = str_replace("AO ","",$this->eye_bottom_extra_description);
            }
            if (strpos($this->eye_bottom_extra_description, 'OD') !== false) {
                $this->eye_bottom_extra_description = str_replace("OD ","",$this->eye_bottom_extra_description);
            }
        }
    }

    //    Alte examene/istoric
    public function updatedHistoricalProcedures($whatId){
        $what_historical_procedures_description = array_search($whatId, array_column(json_decode($this->procedures), 'id'));
        $this->historical_procedures_description = $this->procedures[$what_historical_procedures_description]['procedure_medical_name'];
    }

    //    OD GONIOSCOPIE
    public function updatedGonioscopieRy($whatId){
        $what_gonioscopie_ry_description = array_search($whatId, array_column(json_decode($this->gonioscopies), 'id'));
        $this->gonioscopie_ry_description = $this->gonioscopies[$what_gonioscopie_ry_description]['gonioscopie_details'];
    }

    //    OS GONIOSCOPIE
    public function updatedGonioscopieLy($whatId){
        $what_gonioscopie_ly_description = array_search($whatId, array_column(json_decode($this->gonioscopies), 'id'));
        $this->gonioscopie_ly_description = $this->gonioscopies[$what_gonioscopie_ly_description]['gonioscopie_details'];
    }

    //    OD CAMP VIZUAL
    public function updatedVisualFieldRy($whatId){
        $what_visual_field_ry_description = array_search($whatId, array_column(json_decode($this->visual_fields), 'id'));
        $this->visual_field_ry_description = $this->visual_fields[$what_visual_field_ry_description]['visual_field_details'];
    }

    //    OS CAMP VIZUAL
    public function updatedVisualFieldLy($whatId){
        $what_visual_field_ly_description = array_search($whatId, array_column(json_decode($this->visual_fields), 'id'));
        $this->visual_field_ly_description = $this->visual_fields[$what_visual_field_ly_description]['visual_field_details'];
    }

    // AVOD
//    public function updatedAvRy(){
//        if(($this->av_ry != '') || ($this->av_ly != '')){
//            $this->av_checkbox = 1;
//        } else {
//            $this->av_checkbox = 0;
//        }
//    }

    // AVOS
//    public function updatedAvLy(){
//        if(($this->av_ly != '') || ($this->av_ry != '')){
//            $this->av_checkbox = 1;
//        } else {
//            $this->av_checkbox = 0;
//        }
//    }

    // BIOMICROSCOPIC
//    public function updatedBiomicroscopieRyDescription(){
//        if(($this->biomicroscopie_ry_description != '') || ($this->biomicroscopie_ly_description != '')){
//            $this->biomicroscopie_checkbox = 1;
//        } else {
//            $this->biomicroscopie_checkbox = 0;
//        }
//    }

//    public function updatedBiomicroscopieLyDescription(){
//        if(($this->biomicroscopie_ly_description != '') || ($this->biomicroscopie_ry_description != '')){
//            $this->biomicroscopie_checkbox = 1;
//        } else {
//            $this->biomicroscopie_checkbox = 0;
//        }
//    }




    public function render()
    {

        $this->procedures = DB::table('procedures')
            ->select('id', 'procedure_medical_name AS name', 'procedure_medical_name')
            ->orderByDesc('id')
            ->get();

        $this->eye_bottoms = DB::table('eye_bottoms')
            ->select('id', 'eye_bottom_name AS name', 'eye_bottom_details')
            ->orderByDesc('id')
            ->get();

        $this->biomicroscopies = DB::table('biomicroscopies')
            ->select('id', 'biomicroscopie_short_name AS name', 'biomicroscopie_details')
            ->orderByDesc('id')
            ->get();

        $this->diagnostics = DB::table('diagnostics')
            ->select('id', 'diagnostic_name AS name', 'diagnostic_details')
            ->orderByDesc('id')
            ->get();

        $this->drugs = DB::table('drugs')
            ->select('id', 'drug_name AS name', 'drug_schema')
            ->orderByDesc('id')
            ->get();

        $this->gonioscopies = DB::table('gonioscopies')
            ->select('id', 'gonioscopie_name AS name', 'gonioscopie_details')
            ->orderByDesc('id')
            ->get();

        $this->reasons = DB::table('reasons')
            ->select('id', 'reason_name AS name', 'reason_details')
            ->orderByDesc('id')
            ->get();

        $this->treatment_schemes = DB::table('treatment_schemes')
            ->select('id', 'treatment_scheme_name AS name', 'treatment_scheme_details')
            ->orderByDesc('id')
            ->get();

        $this->visual_fields = DB::table('visual_fields')
            ->select('id', 'visual_field_name AS name', 'visual_field_details')
            ->orderByDesc('id')
            ->get();

        $this->doctors = DB::table('doctors')
            ->select('id', 'doctor_name_and_forename AS name')
            ->orderByDesc('id')
            ->get();

        $visual_acuity = DB::table('visual_acuities')
            ->select('id', 'visual_acuity AS name')
            ->orderByDesc('id')
            ->get();

//        dd($this->fk_patient_id);
//        $this->emit('refreshLivewireDatatable', $this->fk_patient_id);

        return view('livewire.add-consultation', [
            'whatToDoWithLastVisit' => $this->whatToDoWithLastVisit,
            'visits' => $this->visits,
            'lastVisits' => $this->lastVisits,
            'procedures' => $this->procedures,
            'eye_bottoms' => $this->eye_bottoms,
            'biomicroscopies' => $this->biomicroscopies,
            'diagnostics' => $this->diagnostics,
            'drugs' => $this->drugs,
            'gonioscopies' => $this->gonioscopies,
            'reasons' => $this->reasons,
            'treatment_schemes' => $this->treatment_schemes,
            'visual_fields' => $this->visual_fields,
            'doctors' => $this->doctors,
            'visual_acuity' => $visual_acuity,
            'fk_patient_id' => $this->fk_patient_id,
            'visits_id' => $this->visits_id
        ]);

    }

    protected $rules = [
        'diagnostic_description' => 'required',
    ];

    public function store(){

        if(
            $this->gray_diagnostic_description != false ||
            $this->gray_diagnostic_secondary_description != false ||
            $this->gray_diagnostic_other_description != false ||
            $this->gray_drug_treatment_description != false ||
            $this->gray_drug_medical_letter_description != false ||
            $this->gray_reason_description != false ||
            $this->gray_treatment_scheme_description != false ||
            $this->gray_biomicroscopie_ry_description != false ||
            $this->gray_biomicroscopie_ly_description != false ||
            $this->gray_eye_bottom_description != false ||
            $this->gray_eye_bottom_extra_description != false ||
            $this->gray_historical_procedures_description != false ||
            $this->gray_gonioscopie_ry_description != false ||
            $this->gray_gonioscopie_ly_description != false ||
            $this->gray_visual_field_ry_description != false ||
            $this->gray_visual_field_ly_description != false ||
            $this->gray_visit_comments != false ||
            $this->gray_av_ry != false ||
            $this->gray_t_ry_non_c != false ||
            $this->gray_t_ry_c != false ||
            $this->gray_ry_cv_md != false ||
            $this->gray_ry_cv_pd != false ||
            $this->gray_av_ly != false ||
            $this->gray_t_ly_non_c != false ||
            $this->gray_t_ly_c != false ||
            $this->gray_ly_cv_md != false ||
            $this->gray_ly_cv_pd != false
        ){

            $this->confirmGrayFields = true;

        } else {
//            dd('111');

            $this->validate(
                ['diagnostic_description' => 'required'],
                ['diagnostic_description.required' => 'The :attribute cannot be empty.']
            );

            if ($this->lastVisitsIdForUpdate != null && $this->lastVisitsIdForUpdate != ''){
                Visit::where('id', $this->visits_id)->update([
                    'fk_select_procedure_type' => isset($this->select_procedure) ? $this->select_procedure : NULL,
                    'fk_doctor_casmb_assigned_to_patient' => isset($this->visits[0]['fk_doctor_casmb_assigned_to_patient']) ? $this->visits[0]['fk_doctor_casmb_assigned_to_patient'] : NULL,
                    'fk_doctor_assigned_to_patient' => $this->visits[0]['fk_doctor_assigned_to_patient']
                ]);
            }

            if ($this->lastVisitsInfoIdForUpdate != null && $this->lastVisitsInfoIdForUpdate != ''){

                if(
                    $this->biomicroscopie_ry_description != '' ||
                    $this->biomicroscopie_ry_description != null ||
                    $this->biomicroscopie_ly_description != '' ||
                    $this->biomicroscopie_ly_description != null
                ){
                    Visit::where('id', $this->visits_id)->update([
                        'biomicroscopies' => 1,
                    ]);
                }

                if(
                    $this->av_ry != '' ||
                    $this->av_ry != null ||
                    $this->av_ly != '' ||
                    $this->av_ly != null
                ){
                    Visit::where('id', $this->visits_id)->update([
                        'AutoRefracto' => 1,
                    ]);
                }

                VisitsInfo::where('fk_visits_id', $this->fk_visits_id)->update([
//                    'fk_visits_id' => $this->visits_id,
                    'diagnostic_description' => isset($this->diagnostic_description) ? $this->diagnostic_description : NULL,
                    'diagnostic_secondary_description' => isset($this->diagnostic_secondary_description) ? $this->diagnostic_secondary_description : NULL,
                    'diagnostic_other_description' => isset($this->diagnostic_other_description) ? $this->diagnostic_other_description : NULL,
                    'drug_treatment_description' => isset($this->drug_treatment_description) ? $this->drug_treatment_description : NULL,
                    'drug_medical_letter_description' => isset($this->drug_medical_letter_description) ? $this->drug_medical_letter_description : NULL,
                    'reason_description' => isset($this->reason_description) ? $this->reason_description : NULL,
                    'treatment_scheme_description' => isset($this->treatment_scheme_description) ? $this->treatment_scheme_description : NULL,
                    'biomicroscopie_ry_description' => isset($this->biomicroscopie_ry_description) ? $this->biomicroscopie_ry_description : NULL,
                    'biomicroscopie_ly_description' => isset($this->biomicroscopie_ly_description) ? $this->biomicroscopie_ly_description : NULL,
                    'eye_bottom_description' => isset($this->eye_bottom_description) ? $this->eye_bottom_description : NULL,
                    'eye_bottom_extra_description' => isset($this->eye_bottom_extra_description) ? $this->eye_bottom_extra_description : NULL,
                    'historical_procedures_description' => isset($this->historical_procedures_description) ? $this->historical_procedures_description : NULL,
                    'gonioscopie_ry_description' => isset($this->gonioscopie_ry_description) ? $this->gonioscopie_ry_description : NULL,
                    'gonioscopie_ly_description' => isset($this->gonioscopie_ly_description) ? $this->gonioscopie_ly_description : NULL,
                    'visual_field_ry_description' => isset($this->visual_field_ry_description) ? $this->visual_field_ry_description : NULL,
                    'visual_field_ly_description' => isset($this->visual_field_ly_description) ? $this->visual_field_ly_description : NULL,
                    'visit_comments' => isset($this->visit_comments) ? $this->visit_comments : NULL,
                    'av_ry' => isset($this->av_ry) ? $this->av_ry : NULL,
                    't_ry_non_c' => isset($this->t_ry_non_c) ? $this->t_ry_non_c : NULL,
                    't_ry_c' => isset($this->t_ry_c) ? $this->t_ry_c : NULL,
                    'ry_cv_md' => isset($this->ry_cv_md) ? $this->ry_cv_md : NULL,
                    'ry_cv_pd' => isset($this->ry_cv_pd) ? $this->ry_cv_pd : NULL,
                    'av_ly' => isset($this->av_ly) ? $this->av_ly : NULL,
                    't_ly_non_c' => isset($this->t_ly_non_c) ? $this->t_ly_non_c : NULL,
                    't_ly_c' => isset($this->t_ly_c) ? $this->t_ly_c : NULL,
                    'ly_cv_md' => isset($this->ly_cv_md) ? $this->ly_cv_md : NULL,
                    'ly_cv_pd' => isset($this->ly_cv_pd) ? $this->ly_cv_pd : NULL,
                ]);

                $this->showButtons = true;

            } else {

                if(
                    $this->biomicroscopie_ry_description != '' ||
                    $this->biomicroscopie_ry_description != null ||
                    $this->biomicroscopie_ly_description != '' ||
                    $this->biomicroscopie_ly_description != null
                ){
                    Visit::where('id', $this->visits_id)->update([
                        'biomicroscopies' => 1,
                    ]);
                }

                if(
                    $this->av_ry != '' ||
                    $this->av_ry != null ||
                    $this->av_ly != '' ||
                    $this->av_ly != null
                ){
                    Visit::where('id', $this->visits_id)->update([
                        'AutoRefracto' => 1,
                    ]);
                }

                VisitsInfo::create([
                    'fk_visits_id' => $this->visits_id,
                    'diagnostic_description' => isset($this->diagnostic_description) ? $this->diagnostic_description : NULL,
                    'diagnostic_secondary_description' => isset($this->diagnostic_secondary_description) ? $this->diagnostic_secondary_description : NULL,
                    'diagnostic_other_description' => isset($this->diagnostic_other_description) ? $this->diagnostic_other_description : NULL,
                    'drug_treatment_description' => isset($this->drug_treatment_description) ? $this->drug_treatment_description : NULL,
                    'drug_medical_letter_description' => isset($this->drug_medical_letter_description) ? $this->drug_medical_letter_description : NULL,
                    'reason_description' => isset($this->reason_description) ? $this->reason_description : NULL,
                    'treatment_scheme_description' => isset($this->treatment_scheme_description) ? $this->treatment_scheme_description : NULL,
                    'biomicroscopie_ry_description' => isset($this->biomicroscopie_ry_description) ? (($this->biomicroscopie_ry_description == '') ? NULL : $this->biomicroscopie_ry_description) : NULL,
                    'biomicroscopie_ly_description' => isset($this->biomicroscopie_ly_description) ? (($this->biomicroscopie_ly_description == '') ? NULL : $this->biomicroscopie_ly_description) : NULL,
                    'eye_bottom_description' => isset($this->eye_bottom_description) ? $this->eye_bottom_description : NULL,
                    'eye_bottom_extra_description' => isset($this->eye_bottom_extra_description) ? $this->eye_bottom_extra_description : NULL,
                    'historical_procedures_description' => isset($this->historical_procedures_description) ? $this->historical_procedures_description : NULL,
                    'gonioscopie_ry_description' => isset($this->gonioscopie_ry_description) ? $this->gonioscopie_ry_description : NULL,
                    'gonioscopie_ly_description' => isset($this->gonioscopie_ly_description) ? $this->gonioscopie_ly_description : NULL,
                    'visual_field_ry_description' => isset($this->visual_field_ry_description) ? $this->visual_field_ry_description : NULL,
                    'visual_field_ly_description' => isset($this->visual_field_ly_description) ? $this->visual_field_ly_description : NULL,
                    'visit_comments' => isset($this->visit_comments) ? $this->visit_comments : NULL,
                    'av_ry' => isset($this->av_ry) ? (($this->av_ry == '') ? NULL : $this->av_ry) : NULL,
                    't_ry_non_c' => isset($this->t_ry_non_c) ? $this->t_ry_non_c : NULL,
                    't_ry_c' => isset($this->t_ry_c) ? $this->t_ry_c : NULL,
                    'ry_cv_md' => isset($this->ry_cv_md) ? $this->ry_cv_md : NULL,
                    'ry_cv_pd' => isset($this->ry_cv_pd) ? $this->ry_cv_pd : NULL,
                    'av_ly' => isset($this->av_ly) ? (($this->av_ly == '') ? NULL : $this->av_ly) : NULL,
                    't_ly_non_c' => isset($this->t_ly_non_c) ? $this->t_ly_non_c : NULL,
                    't_ly_c' => isset($this->t_ly_c) ? $this->t_ly_c : NULL,
                    'ly_cv_md' => isset($this->ly_cv_md) ? $this->ly_cv_md : NULL,
                    'ly_cv_pd' => isset($this->ly_cv_pd) ? $this->ly_cv_pd : NULL,
                ]);

                $this->lastVisitsInfoIdForUpdate = $this->fk_visits_id;
                $this->showButtons = true;

            }

            session()->flash('message', 'Consultatie inserata cu success.');

        }

    }

    public function redirectToPlata(){
//        dd($this->visits[0]['id']);
        return redirect()->to('add_consultatie/add_plata/'.$this->visits[0]['id']);
//        $this->emit("openModal", "all-crystallines", ["whatSelect" => "1"]);
//        dd($this);
    }

    public function redirectToRetetaOchelari(){
        return redirect()->to('add_consultatie/add_ochelari/'.$this->visits[0]['id']);
//        $this->emit("openModal", "all-crystallines", ["whatSelect" => "1"]);
//        dd($this);
    }

    protected $listeners = [
        'populateLastVisit',
        'acceptGray',
        'denyGray',
        ];

    public function acceptGray()
    {
        $this->acceptGray = true;

        $this->gray_diagnostic_description = false;
        $this->gray_diagnostic_secondary_description = false;
        $this->gray_diagnostic_other_description = false;
        $this->gray_drug_treatment_description = false;
        $this->gray_drug_medical_letter_description = false;
        $this->gray_reason_description = false;
        $this->gray_treatment_scheme_description = false;
        $this->gray_biomicroscopie_ry_description = false;
        $this->gray_biomicroscopie_ly_description = false;
        $this->gray_eye_bottom_description = false;
        $this->gray_eye_bottom_extra_description = false;
        $this->gray_historical_procedures_description = false;
        $this->gray_gonioscopie_ry_description = false;
        $this->gray_gonioscopie_ly_description = false;
        $this->gray_visual_field_ry_description = false;
        $this->gray_visual_field_ly_description = false;
        $this->gray_visit_comments = false;
        $this->gray_av_ry = false;
        $this->gray_t_ry_non_c = false;
        $this->gray_t_ry_c = false;
        $this->gray_ry_cv_md = false;
        $this->gray_ry_cv_pd = false;
        $this->gray_av_ly = false;
        $this->gray_t_ly_non_c = false;
        $this->gray_t_ly_c = false;
        $this->gray_ly_cv_md = false;
        $this->gray_ly_cv_pd = false;

        $this->forceClose()->closeModal();

        $this->store();
//        dd('acceptGray');
    }

    public function denyGray()
    {
//        dd('denyGray');
        $this->denyGray = true;

        if($this->gray_diagnostic_description == true){
            $this->gray_diagnostic_description = false;
            $this->diagnostic_description = null;
        }
        if($this->gray_diagnostic_secondary_description == true){
            $this->gray_diagnostic_secondary_description = false;
            $this->diagnostic_secondary_description = null;
        }
        if($this->gray_diagnostic_other_description == true){
            $this->gray_diagnostic_other_description = false;
            $this->diagnostic_other_description = null;
        }
        if($this->gray_drug_treatment_description == true){
            $this->gray_drug_treatment_description = false;
            $this->drug_treatment_description = null;
        }
        if($this->gray_drug_medical_letter_description == true){
            $this->gray_drug_medical_letter_description = false;
            $this->drug_medical_letter_description = null;
        }
        if($this->gray_reason_description == true){
            $this->gray_reason_description = false;
            $this->reason_description = null;
        }
        if($this->gray_treatment_scheme_description == true){
            $this->gray_treatment_scheme_description = false;
            $this->treatment_scheme_description = null;
        }
        if($this->gray_biomicroscopie_ry_description == true){
            $this->gray_biomicroscopie_ry_description = false;
            $this->biomicroscopie_ry_description = null;
            $this->biomicroscopie_checkbox = 0;
        }
        if($this->gray_biomicroscopie_ly_description == true){
            $this->gray_biomicroscopie_ly_description = false;
            $this->biomicroscopie_ly_description = null;
            $this->biomicroscopie_checkbox = 0;
        }
        if($this->gray_eye_bottom_description == true){
            $this->gray_eye_bottom_description = false;
            $this->eye_bottom_description = null;
        }
        if($this->gray_eye_bottom_extra_description == true){
            $this->gray_eye_bottom_extra_description = false;
            $this->eye_bottom_extra_description = null;
        }
        if($this->gray_historical_procedures_description == true){
            $this->gray_historical_procedures_description = false;
            $this->historical_procedures_description = null;
        }
        if($this->gray_gonioscopie_ry_description == true){
            $this->gray_gonioscopie_ry_description = false;
            $this->gonioscopie_ry_description = null;
        }
        if($this->gray_gonioscopie_ly_description == true){
            $this->gray_gonioscopie_ly_description = false;
            $this->gonioscopie_ly_description = null;
        }
        if($this->gray_visual_field_ry_description == true){
            $this->gray_visual_field_ry_description = false;
            $this->visual_field_ry_description = null;
        }
        if($this->gray_visual_field_ly_description == true){
            $this->gray_visual_field_ly_description = false;
            $this->visual_field_ly_description = null;
        }
        if($this->gray_visit_comments == true){
            $this->gray_visit_comments = false;
            $this->visit_comments = null;
        }
        if($this->gray_av_ry == true){
            $this->gray_av_ry = false;
            $this->av_ry = null;
            $this->av_checkbox = 0;
        }
        if($this->gray_t_ry_non_c == true){
            $this->gray_t_ry_non_c = false;
            $this->t_ry_non_c = null;
        }
        if($this->gray_t_ry_c == true){
            $this->gray_t_ry_c = false;
            $this->t_ry_c = null;
        }
        if($this->gray_ry_cv_md == true){
            $this->gray_ry_cv_md = false;
            $this->ry_cv_md = null;
        }
        if($this->gray_ry_cv_pd == true){
            $this->gray_ry_cv_pd = false;
            $this->ry_cv_pd = null;
        }
        if($this->gray_av_ly == true){
            $this->gray_av_ly = false;
            $this->av_ly = null;
            $this->av_checkbox = 0;
        }
        if($this->gray_t_ly_non_c == true){
            $this->gray_t_ly_non_c = false;
            $this->t_ly_non_c = null;
        }
        if($this->gray_t_ly_c == true){
            $this->gray_t_ly_c = false;
            $this->t_ly_c = null;
        }
        if($this->gray_ly_cv_md == true){
            $this->gray_ly_cv_md = false;
            $this->ly_cv_md = null;
        }
        if($this->gray_ly_cv_pd == true){
            $this->gray_ly_cv_pd = false;
            $this->ly_cv_pd = null;
        }

        $this->dispatchBrowserEvent('clearGraySelect');
        $this->forceClose()->closeModal();

        $this->store();
    }

    public function populateLastVisit()
    {
//        dd('merge cu ce este' . $populateLastVisit);
//        $this->select_procedure_type = 5;

//        dd($this->lastVisits[0]);
        $this->dispatchBrowserEvent('loadInfoFromLastVisit', ['lastVisitInfo' => $this->lastVisits[0]]);
        $this->forceClose()->closeModal();

        if (VisitsInfo::where('fk_visits_id', '=', $this->lastVisits[0]['id'])->exists()) {

            $this->lastVisitsInfo = DB::table('visits_infos')
                ->where('fk_visits_id', '=', $this->lastVisits[0]['id'])
                ->get();

//        dd($this->lastVisitsInfo[0]->av_ry);
            $this->diagnostic_description = $this->lastVisitsInfo[0]->diagnostic_description;
            $this->diagnostic_secondary_description = $this->lastVisitsInfo[0]->diagnostic_secondary_description;
            $this->diagnostic_other_description = $this->lastVisitsInfo[0]->diagnostic_other_description;
            $this->drug_treatment_description = $this->lastVisitsInfo[0]->drug_treatment_description;
            $this->drug_medical_letter_description = $this->lastVisitsInfo[0]->drug_medical_letter_description;
            $this->reason_description = $this->lastVisitsInfo[0]->reason_description;
            $this->treatment_scheme_description = $this->lastVisitsInfo[0]->treatment_scheme_description;
            $this->biomicroscopie_ry_description = $this->lastVisitsInfo[0]->biomicroscopie_ry_description;
            $this->biomicroscopie_ly_description = $this->lastVisitsInfo[0]->biomicroscopie_ly_description;
            $this->eye_bottom_description = $this->lastVisitsInfo[0]->eye_bottom_description;
            $this->eye_bottom_extra_description = $this->lastVisitsInfo[0]->eye_bottom_extra_description;
            $this->historical_procedures_description = $this->lastVisitsInfo[0]->historical_procedures_description;
            $this->gonioscopie_ry_description = $this->lastVisitsInfo[0]->gonioscopie_ry_description;
            $this->gonioscopie_ly_description = $this->lastVisitsInfo[0]->gonioscopie_ly_description;
            $this->visual_field_ry_description = $this->lastVisitsInfo[0]->visual_field_ry_description;
            $this->visual_field_ly_description = $this->lastVisitsInfo[0]->visual_field_ly_description;
            $this->visit_comments = $this->lastVisitsInfo[0]->visit_comments;
            $this->av_ry = $this->lastVisitsInfo[0]->av_ry;
            $this->t_ry_non_c = $this->lastVisitsInfo[0]->t_ry_non_c;
            $this->t_ry_c = $this->lastVisitsInfo[0]->t_ry_c;
            $this->ry_cv_md = $this->lastVisitsInfo[0]->ry_cv_md;
            $this->ry_cv_pd = $this->lastVisitsInfo[0]->ry_cv_pd;
            $this->av_ly = $this->lastVisitsInfo[0]->av_ly;
            $this->t_ly_non_c = $this->lastVisitsInfo[0]->t_ly_non_c;
            $this->t_ly_c = $this->lastVisitsInfo[0]->t_ly_c;
            $this->ly_cv_md = $this->lastVisitsInfo[0]->ly_cv_md;
            $this->ly_cv_pd = $this->lastVisitsInfo[0]->ly_cv_pd;

            if($this->lastVisitsInfo[0]->diagnostic_description != '' || $this->lastVisitsInfo[0]->diagnostic_description != null){
                $this->gray_diagnostic_description = true;
            }
            if($this->lastVisitsInfo[0]->diagnostic_secondary_description != '' || $this->lastVisitsInfo[0]->diagnostic_secondary_description != null){
                $this->gray_diagnostic_secondary_description = true;
            }
            if($this->lastVisitsInfo[0]->diagnostic_other_description != '' || $this->lastVisitsInfo[0]->diagnostic_other_description != null){
                $this->gray_diagnostic_other_description = true;
            }
            if($this->lastVisitsInfo[0]->drug_treatment_description != '' || $this->lastVisitsInfo[0]->drug_treatment_description != null){
                $this->gray_drug_treatment_description = true;
            }
            if($this->lastVisitsInfo[0]->drug_medical_letter_description != '' || $this->lastVisitsInfo[0]->drug_medical_letter_description != null){
                $this->gray_drug_medical_letter_description = true;
            }
            if($this->lastVisitsInfo[0]->reason_description != '' || $this->lastVisitsInfo[0]->reason_description != null){
                $this->gray_reason_description = true;
            }
            if($this->lastVisitsInfo[0]->treatment_scheme_description != '' || $this->lastVisitsInfo[0]->treatment_scheme_description != null){
                $this->gray_treatment_scheme_description = true;
            }
            if($this->lastVisitsInfo[0]->biomicroscopie_ry_description != '' || $this->lastVisitsInfo[0]->biomicroscopie_ry_description != null){
                $this->gray_biomicroscopie_ry_description = true;
                $this->biomicroscopie_checkbox = 1;
            }
            if($this->lastVisitsInfo[0]->biomicroscopie_ly_description != '' || $this->lastVisitsInfo[0]->biomicroscopie_ly_description != null){
                $this->gray_biomicroscopie_ly_description = true;
                $this->biomicroscopie_checkbox = 1;
            }
            if($this->lastVisitsInfo[0]->eye_bottom_description != '' || $this->lastVisitsInfo[0]->eye_bottom_description != null){
                $this->gray_eye_bottom_description = true;
            }
            if($this->lastVisitsInfo[0]->eye_bottom_extra_description != '' || $this->lastVisitsInfo[0]->eye_bottom_extra_description != null){
                $this->gray_eye_bottom_extra_description = true;
            }
            if($this->lastVisitsInfo[0]->historical_procedures_description != '' || $this->lastVisitsInfo[0]->historical_procedures_description != null){
                $this->gray_historical_procedures_description = true;
            }
            if($this->lastVisitsInfo[0]->gonioscopie_ry_description != '' || $this->lastVisitsInfo[0]->gonioscopie_ry_description != null){
                $this->gray_gonioscopie_ry_description = true;
            }
            if($this->lastVisitsInfo[0]->gonioscopie_ly_description != '' || $this->lastVisitsInfo[0]->gonioscopie_ly_description != null){
                $this->gray_gonioscopie_ly_description = true;
            }
            if($this->lastVisitsInfo[0]->visual_field_ry_description != '' || $this->lastVisitsInfo[0]->visual_field_ry_description != null){
                $this->gray_visual_field_ry_description = true;
            }
            if($this->lastVisitsInfo[0]->visual_field_ly_description != '' || $this->lastVisitsInfo[0]->visual_field_ly_description != null){
                $this->gray_visual_field_ly_description = true;
            }
            if($this->lastVisitsInfo[0]->visit_comments != '' || $this->lastVisitsInfo[0]->visit_comments != null){
                $this->gray_visit_comments = true;
            }
            if($this->lastVisitsInfo[0]->av_ry != '' || $this->lastVisitsInfo[0]->av_ry != null){
                $this->gray_av_ry = true;
                $this->dispatchBrowserEvent('loadGrayAvRy');
            }
            if($this->lastVisitsInfo[0]->t_ry_non_c != '' || $this->lastVisitsInfo[0]->t_ry_non_c != null){
                $this->gray_t_ry_non_c = true;
            }
            if($this->lastVisitsInfo[0]->t_ry_c != '' || $this->lastVisitsInfo[0]->t_ry_c != null){
                $this->gray_t_ry_c = true;
            }
            if($this->lastVisitsInfo[0]->ry_cv_md != '' || $this->lastVisitsInfo[0]->ry_cv_md != null){
                $this->gray_ry_cv_md = true;
            }
            if($this->lastVisitsInfo[0]->ry_cv_pd != '' || $this->lastVisitsInfo[0]->ry_cv_pd != null){
                $this->gray_ry_cv_pd = true;
            }
            if($this->lastVisitsInfo[0]->av_ly != '' || $this->lastVisitsInfo[0]->av_ly != null){
                $this->gray_av_ly = true;
                $this->dispatchBrowserEvent('loadGrayAvLy');
            }
            if($this->lastVisitsInfo[0]->t_ly_non_c != '' || $this->lastVisitsInfo[0]->t_ly_non_c != null){
                $this->gray_t_ly_non_c = true;
            }
            if($this->lastVisitsInfo[0]->t_ly_c != '' || $this->lastVisitsInfo[0]->t_ly_c != null){
                $this->gray_t_ly_c = true;
            }
            if($this->lastVisitsInfo[0]->ly_cv_md != '' || $this->lastVisitsInfo[0]->ly_cv_md != null){
                $this->gray_ly_cv_md = true;
            }
            if($this->lastVisitsInfo[0]->ly_cv_pd != '' || $this->lastVisitsInfo[0]->ly_cv_pd != null){
                $this->gray_ly_cv_pd = true;
            }

        }
//        dd($this->lastVisits);
    }

    public function backToPage(){

//        $this->dispatchBrowserEvent('closeWindow');

        return redirect()->to('medic/');
    }

}
