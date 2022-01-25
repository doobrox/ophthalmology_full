<?php

namespace App\Http\Livewire;

use App\Models\Glasses;
use App\Models\Visit;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AddGlasses extends Component
{

    public $consultationId, $consultationDetails, $lastIdForUpdate;

    public $actualGlassesInfo, $patient;

    public $fk_visits_id,
        $OD_K1,
        $OD_ax_1,
        $OD_K2,
        $OS_K1,
        $OS_ax_1,
        $OS_K2,
        $OD_refracto_dsf,
        $OD_refracto_cyl,
        $OD_refracto_ax,
        $OS_refracto_dsf,
        $OS_refracto_cyl,
        $OS_refracto_ax,
        $DIP_refracto,
        $ciclopegie,
        $far_OD_Dsf,
        $far_OD_DCyl,
        $far_OD_Ax,
        $far_OS_Dsf,
        $far_OS_DCyl,
        $far_OS_Ax,
        $near_OD_Dsf,
        $near_OD_DCyl,
        $near_OD_Ax,
        $near_OS_Dsf,
        $near_OS_DCyl,
        $near_OS_Ax,
        $far_DIP,
        $near_DIP,
        $user_who_input,
        $MS_nr_OD,
        $MS_CD_OD,
        $MS_avg_OD,
        $MS_SD_OD,
        $MS_cv_OD,
        $MS_max_OD,
        $MS_min_OD,
        $MS_hex_OD,
        $MS_pahi_OD,
        $MS_nr_OS,
        $MS_CD_OS,
        $MS_avg_OS,
        $MS_SD_OS,
        $MS_cv_OS,
        $MS_max_OS,
        $MS_min_OS,
        $MS_hex_OS,
        $MS_pahi_OS,
        $add_kerato,
        $add_biomicroscopie,
        $add_refracto,
        $add_correction;

    public $visit_date, $consultation_form_number, $patient_age, $patient_name, $patient_forename;

    public function mount($id)
    {
        $this->consultationId = $id;
        $this->fk_visits_id = $id;

        $this->consultationDetails = DB::table('visits')
            ->where('visits.id', '=', $id)
            ->get();

        $this->patient = DB::table('patients')
            ->where('id', '=', $this->consultationDetails[0]->fk_patient_id)
            ->get();

        $this->visit_date = date('d-m-Y', strtotime($this->consultationDetails[0]->visit_date));
        $this->consultation_form_number = $this->consultationDetails[0]->consultation_form_number;
////        TODO sa vedem cum facem cron ceva pentru varsta pacientilor
        $this->patient_age = $this->patient[0]->patient_age;
        $this->patient_name = $this->patient[0]->patient_name;
        $this->patient_forename = $this->patient[0]->patient_forename;

        if (Glasses::where('fk_visits_id', '=', $id)->exists()) {
            $this->lastIdForUpdate = $id;

            $this->actualGlassesInfo = DB::table('glasses')
                ->where('fk_visits_id', '=', $id)
                ->get();

            foreach ($this->actualGlassesInfo[0] as $key => $value) {
                $this->$key = $value;

                //  Keratometrie
                if($key == 'OD_K1' && ($value != '' || !is_null($value))){
                    $this->add_kerato = 1;
                }
                if($key == 'OD_ax_1' && $value != ''){
                    $this->add_kerato = 1;
                }
                if($key == 'OD_K2' && $value != ''){
                    $this->add_kerato = 1;
                }
                if($key == 'OS_K1' && $value != ''){
                    $this->add_kerato = 1;
                }
                if($key == 'OS_ax_1' && $value != ''){
                    $this->add_kerato = 1;
                }
                if($key == 'OS_K2' && $value != ''){
                    $this->add_kerato = 1;
                }

                //  Refratometrie
                if($key == 'OD_refracto_dsf' && $value != ''){
                    $this->add_refracto = 1;
                }
                if($key == 'OD_refracto_cyl' && $value != ''){
                    $this->add_refracto = 1;
                }
                if($key == 'OD_refracto_ax' && $value != ''){
                    $this->add_refracto = 1;
                }
                if($key == 'OS_refracto_dsf' && $value != ''){
                    $this->add_refracto = 1;
                }
                if($key == 'OS_refracto_cyl' && $value != ''){
                    $this->add_refracto = 1;
                }
                if($key == 'OS_refracto_ax' && $value != ''){
                    $this->add_refracto = 1;
                }
                if($key == 'DIP_refracto' && $value != ''){
                    $this->add_refracto = 1;
                }
                if($key == 'ciclopegie' && $value != ''){
                    $this->add_refracto = 1;
                }

                //  Corectie optica Distanta
                if($key == 'far_OD_Dsf' && $value != ''){
                    $this->add_correction = 1;
                }
                if($key == 'far_OD_DCyl' && $value != ''){
                    $this->add_correction = 1;
                }
                if($key == 'far_OD_Ax' && $value != ''){
                    $this->add_correction = 1;
                }
                if($key == 'far_OS_Dsf' && $value != ''){
                    $this->add_correction = 1;
                }
                if($key == 'far_OS_DCyl' && $value != ''){
                    $this->add_correction = 1;
                }
                if($key == 'far_OS_Ax' && $value != ''){
                    $this->add_correction = 1;
                }
                if($key == 'far_DIP' && $value != ''){
                    $this->add_correction = 1;
                }

                //  Corectie optica Aproape
                if($key == 'near_OD_Dsf' && $value != ''){
                    $this->add_correction = 1;
                }
                if($key == 'near_OD_DCyl' && $value != ''){
                    $this->add_correction = 1;
                }
                if($key == 'near_OD_Ax' && $value != ''){
                    $this->add_correction = 1;
                }
                if($key == 'near_OS_Dsf' && $value != ''){
                    $this->add_correction = 1;
                }
                if($key == 'near_OS_DCyl' && $value != ''){
                    $this->add_correction = 1;
                }
                if($key == 'near_OS_Ax' && $value != ''){
                    $this->add_correction = 1;
                }
                if($key == 'near_DIP' && $value != ''){
                    $this->add_correction = 1;
                }

                //  Microscopie speculara OD
                if($key == 'MS_nr_OD' && $value != ''){
                    $this->add_biomicroscopie = 1;
                }
                if($key == 'MS_CD_OD' && $value != ''){
                    $this->add_biomicroscopie = 1;
                }
                if($key == 'MS_avg_OD' && $value != ''){
                    $this->add_biomicroscopie = 1;
                }
                if($key == 'MS_SD_OD' && $value != ''){
                    $this->add_biomicroscopie = 1;
                }
                if($key == 'MS_cv_OD' && $value != ''){
                    $this->add_biomicroscopie = 1;
                }
                if($key == 'MS_max_OD' && $value != ''){
                    $this->add_biomicroscopie = 1;
                }
                if($key == 'MS_min_OD' && $value != ''){
                    $this->add_biomicroscopie = 1;
                }
                if($key == 'MS_hex_OD' && $value != ''){
                    $this->add_biomicroscopie = 1;
                }
                if($key == 'MS_pahi_OD' && $value != ''){
                    $this->add_biomicroscopie = 1;
                }

                //  Microscopie speculara OS
                if($key == 'MS_nr_OS' && $value != ''){
                    $this->add_biomicroscopie = 1;
                }
                if($key == 'MS_CD_OS' && $value != ''){
                    $this->add_biomicroscopie = 1;
                }
                if($key == 'MS_avg_OS' && $value != ''){
                    $this->add_biomicroscopie = 1;
                }
                if($key == 'MS_SD_OS' && $value != ''){
                    $this->add_biomicroscopie = 1;
                }
                if($key == 'MS_cv_OS' && $value != ''){
                    $this->add_biomicroscopie = 1;
                }
                if($key == 'MS_max_OS' && $value != ''){
                    $this->add_biomicroscopie = 1;
                }
                if($key == 'MS_min_OS' && $value != ''){
                    $this->add_biomicroscopie = 1;
                }
                if($key == 'MS_hex_OS' && $value != ''){
                    $this->add_biomicroscopie = 1;
                }
                if($key == 'MS_pahi_OS' && $value != ''){
                    $this->add_biomicroscopie = 1;
                }
            }

        }

    }

    public function render()
    {
        return view('livewire.add-glasses', ['consultationDetails' => $this->consultationDetails]);
    }

    protected $rules = [
        'fk_visits_id' => 'required',
//        'OD_K1' => 'required'
    ];

    public function store()
    {

//        dd($this);
        $validateDate = $this->validate();

        if ($this->lastIdForUpdate != null && $this->lastIdForUpdate != ''){
            Glasses::where('fk_visits_id', $this->fk_visits_id)->update([
                'OD_K1' => isset($this->OD_K1) && ($this->OD_K1 != '') ? $this->OD_K1 : NULL,
                'OD_ax_1' => isset($this->OD_ax_1) ? $this->OD_ax_1 : NULL,
                'OD_K2' => isset($this->OD_K2) ? $this->OD_K2 : NULL,
                'OS_K1' => isset($this->OS_K1) ? $this->OS_K1 : NULL,
                'OS_ax_1' => isset($this->OS_ax_1) ? $this->OS_ax_1 : NULL,
                'OS_K2' => isset($this->OS_K2) ? $this->OS_K2 : NULL,
                'OD_refracto_dsf' => isset($this->OD_refracto_dsf) ? $this->OD_refracto_dsf : NULL,
                'OD_refracto_cyl' => isset($this->OD_refracto_cyl) ? $this->OD_refracto_cyl : NULL,
                'OD_refracto_ax' => isset($this->OD_refracto_ax) ? $this->OD_refracto_ax : NULL,
                'OS_refracto_dsf' => isset($this->OS_refracto_dsf) ? $this->OS_refracto_dsf : NULL,
                'OS_refracto_cyl' => isset($this->OS_refracto_cyl) ? $this->OS_refracto_cyl : NULL,
                'OS_refracto_ax' => isset($this->OS_refracto_ax) ? $this->OS_refracto_ax : NULL,
                'DIP_refracto' => isset($this->DIP_refracto) ? $this->DIP_refracto : NULL,
                'ciclopegie' => isset($this->ciclopegie) ? $this->ciclopegie : NULL,
                'far_OD_Dsf' => isset($this->far_OD_Dsf) ? $this->far_OD_Dsf : NULL,
                'far_OD_DCyl' => isset($this->far_OD_DCyl) ? $this->far_OD_DCyl : NULL,
                'far_OD_Ax' => isset($this->far_OD_Ax) ? $this->far_OD_Ax : NULL,
                'far_OS_Dsf' => isset($this->far_OS_Dsf) ? $this->far_OS_Dsf : NULL,
                'far_OS_DCyl' => isset($this->far_OS_DCyl) ? $this->far_OS_DCyl : NULL,
                'far_OS_Ax' => isset($this->far_OS_Ax) ? $this->far_OS_Ax : NULL,
                'near_OD_Dsf' => isset($this->near_OD_Dsf) ? $this->near_OD_Dsf : NULL,
                'near_OD_DCyl' => isset($this->near_OD_DCyl) ? $this->near_OD_DCyl : NULL,
                'near_OD_Ax' => isset($this->near_OD_Ax) ? $this->near_OD_Ax : NULL,
                'near_OS_Dsf' => isset($this->near_OS_Dsf) ? $this->near_OS_Dsf : NULL,
                'near_OS_DCyl' => isset($this->near_OS_DCyl) ? $this->near_OS_DCyl : NULL,
                'near_OS_Ax' => isset($this->near_OS_Ax) ? $this->near_OS_Ax : NULL,
                'far_DIP' => isset($this->far_DIP) ? $this->far_DIP : NULL,
                'near_DIP' => isset($this->near_DIP) ? $this->near_DIP : NULL,
                'user_who_input' => isset($this->user_who_input) ? $this->user_who_input : NULL,
                'MS_nr_OD' => isset($this->MS_nr_OD) ? $this->MS_nr_OD : NULL,
                'MS_CD_OD' => isset($this->MS_CD_OD) ? $this->MS_CD_OD : NULL,
                'MS_avg_OD' => isset($this->MS_avg_OD) ? $this->MS_avg_OD : NULL,
                'MS_SD_OD' => isset($this->MS_SD_OD) ? $this->MS_SD_OD : NULL,
                'MS_cv_OD' => isset($this->MS_cv_OD) ? $this->MS_cv_OD : NULL,
                'MS_max_OD' => isset($this->MS_max_OD) ? $this->MS_max_OD : NULL,
                'MS_min_OD' => isset($this->MS_min_OD) ? $this->MS_min_OD : NULL,
                'MS_hex_OD' => isset($this->MS_hex_OD) ? $this->MS_hex_OD : NULL,
                'MS_pahi_OD' => isset($this->MS_pahi_OD) ? $this->MS_pahi_OD : NULL,
                'MS_nr_OS' => isset($this->MS_nr_OS) ? $this->MS_nr_OS : NULL,
                'MS_CD_OS' => isset($this->MS_CD_OS) ? $this->MS_CD_OS : NULL,
                'MS_avg_OS' => isset($this->MS_avg_OS) ? $this->MS_avg_OS : NULL,
                'MS_SD_OS' => isset($this->MS_SD_OS) ? $this->MS_SD_OS : NULL,
                'MS_cv_OS' => isset($this->MS_cv_OS) ? $this->MS_cv_OS : NULL,
                'MS_max_OS' => isset($this->MS_max_OS) ? $this->MS_max_OS : NULL,
                'MS_min_OS' => isset($this->MS_min_OS) ? $this->MS_min_OS : NULL,
                'MS_hex_OS' => isset($this->MS_hex_OS) ? $this->MS_hex_OS : NULL,
                'MS_pahi_OS' => isset($this->MS_pahi_OS) ? $this->MS_pahi_OS : NULL
            ]);

            //  Keratometrie
            if(($this->OD_K1 != '') || ($this->OD_ax_1 != '') || ($this->OD_K2 != '') || ($this->OS_K1 != '') || ($this->OS_ax_1 != '') || ($this->OS_K2 != '')){
                Visit::where('id', $this->fk_visits_id)->update([
                    'keratometrie' => 1,
                ]);
            } else {
                Visit::where('id', $this->fk_visits_id)->update([
                    'keratometrie' => 0,
                ]);
            }

            //  Refratometrie
            if(($this->OD_refracto_dsf != '') || ($this->OD_refracto_cyl != '') || ($this->OD_refracto_ax != '') || ($this->OS_refracto_dsf != '') || ($this->OS_refracto_cyl != '') || ($this->OS_refracto_ax != '') || ($this->DIP_refracto != '') || ($this->ciclopegie != 0)){
                Visit::where('id', $this->fk_visits_id)->update([
                    'refratometrie' => 1,
                ]);
            } else {
                Visit::where('id', $this->fk_visits_id)->update([
                    'refratometrie' => 0,
                ]);
            }

            //  Corectie optica
            if(($this->far_OD_Dsf != '') || ($this->far_OD_DCyl != '') || ($this->far_OD_Ax != '') || ($this->far_OS_Dsf != '') || ($this->far_OS_DCyl != '') || ($this->far_OS_Ax != '') || ($this->far_DIP != '') || ($this->near_OD_Dsf != '') || ($this->near_OD_DCyl != '') || ($this->near_OD_Ax != '') || ($this->near_OS_Dsf != '') || ($this->near_OS_DCyl != '') || ($this->near_OS_Ax != '') || ($this->near_DIP != '')){
                Visit::where('id', $this->fk_visits_id)->update([
                    'optical_correction' => 1,
                ]);
            } else {
                Visit::where('id', $this->fk_visits_id)->update([
                    'optical_correction' => 0,
                ]);
            }

            //  Microscopie speculara AO
            if(($this->MS_nr_OD != '') || ($this->MS_CD_OD != '') || ($this->MS_avg_OD != '') || ($this->MS_SD_OD != '') || ($this->MS_cv_OD != '') || ($this->MS_max_OD != '') || ($this->MS_min_OD != '') || ($this->MS_hex_OD != '') || ($this->MS_pahi_OD != '') || ($this->MS_nr_OS != '') || ($this->MS_CD_OS != '') || ($this->MS_avg_OS != '') || ($this->MS_SD_OS != '') || ($this->MS_cv_OS != '') || ($this->MS_max_OS != '') || ($this->MS_min_OS != '') || ($this->MS_hex_OS != '') || ($this->MS_pahi_OS != '')){
                Visit::where('id', $this->fk_visits_id)->update([
                    'microscopie' => 1,
                ]);
            } else {
                Visit::where('id', $this->fk_visits_id)->update([
                    'microscopie' => 0,
                ]);
            }

        } else {
            Glasses::create([
                'fk_visits_id' => $this->fk_visits_id,
                'OD_K1' => isset($this->OD_K1) ? $this->OD_K1 : NULL,
                'OD_ax_1' => isset($this->OD_ax_1) ? $this->OD_ax_1 : NULL,
                'OD_K2' => isset($this->OD_K2) ? $this->OD_K2 : NULL,
                'OS_K1' => isset($this->OS_K1) ? $this->OS_K1 : NULL,
                'OS_ax_1' => isset($this->OS_ax_1) ? $this->OS_ax_1 : NULL,
                'OS_K2' => isset($this->OS_K2) ? $this->OS_K2 : NULL,
                'OD_refracto_dsf' => isset($this->OD_refracto_dsf) ? $this->OD_refracto_dsf : NULL,
                'OD_refracto_cyl' => isset($this->OD_refracto_cyl) ? $this->OD_refracto_cyl : NULL,
                'OD_refracto_ax' => isset($this->OD_refracto_ax) ? $this->OD_refracto_ax : NULL,
                'OS_refracto_dsf' => isset($this->OS_refracto_dsf) ? $this->OS_refracto_dsf : NULL,
                'OS_refracto_cyl' => isset($this->OS_refracto_cyl) ? $this->OS_refracto_cyl : NULL,
                'OS_refracto_ax' => isset($this->OS_refracto_ax) ? $this->OS_refracto_ax : NULL,
                'DIP_refracto' => isset($this->DIP_refracto) ? $this->DIP_refracto : NULL,
                'ciclopegie' => isset($this->ciclopegie) ? $this->ciclopegie : NULL,
                'far_OD_Dsf' => isset($this->far_OD_Dsf) ? $this->far_OD_Dsf : NULL,
                'far_OD_DCyl' => isset($this->far_OD_DCyl) ? $this->far_OD_DCyl : NULL,
                'far_OD_Ax' => isset($this->far_OD_Ax) ? $this->far_OD_Ax : NULL,
                'far_OS_Dsf' => isset($this->far_OS_Dsf) ? $this->far_OS_Dsf : NULL,
                'far_OS_DCyl' => isset($this->far_OS_DCyl) ? $this->far_OS_DCyl : NULL,
                'far_OS_Ax' => isset($this->far_OS_Ax) ? $this->far_OS_Ax : NULL,
                'near_OD_Dsf' => isset($this->near_OD_Dsf) ? $this->near_OD_Dsf : NULL,
                'near_OD_DCyl' => isset($this->near_OD_DCyl) ? $this->near_OD_DCyl : NULL,
                'near_OD_Ax' => isset($this->near_OD_Ax) ? $this->near_OD_Ax : NULL,
                'near_OS_Dsf' => isset($this->near_OS_Dsf) ? $this->near_OS_Dsf : NULL,
                'near_OS_DCyl' => isset($this->near_OS_DCyl) ? $this->near_OS_DCyl : NULL,
                'near_OS_Ax' => isset($this->near_OS_Ax) ? $this->near_OS_Ax : NULL,
                'far_DIP' => isset($this->far_DIP) ? $this->far_DIP : NULL,
                'near_DIP' => isset($this->near_DIP) ? $this->near_DIP : NULL,
                'user_who_input' => isset($this->user_who_input) ? $this->user_who_input : NULL,
                'MS_nr_OD' => isset($this->MS_nr_OD) ? $this->MS_nr_OD : NULL,
                'MS_CD_OD' => isset($this->MS_CD_OD) ? $this->MS_CD_OD : NULL,
                'MS_avg_OD' => isset($this->MS_avg_OD) ? $this->MS_avg_OD : NULL,
                'MS_SD_OD' => isset($this->MS_SD_OD) ? $this->MS_SD_OD : NULL,
                'MS_cv_OD' => isset($this->MS_cv_OD) ? $this->MS_cv_OD : NULL,
                'MS_max_OD' => isset($this->MS_max_OD) ? $this->MS_max_OD : NULL,
                'MS_min_OD' => isset($this->MS_min_OD) ? $this->MS_min_OD : NULL,
                'MS_hex_OD' => isset($this->MS_hex_OD) ? $this->MS_hex_OD : NULL,
                'MS_pahi_OD' => isset($this->MS_pahi_OD) ? $this->MS_pahi_OD : NULL,
                'MS_nr_OS' => isset($this->MS_nr_OS) ? $this->MS_nr_OS : NULL,
                'MS_CD_OS' => isset($this->MS_CD_OS) ? $this->MS_CD_OS : NULL,
                'MS_avg_OS' => isset($this->MS_avg_OS) ? $this->MS_avg_OS : NULL,
                'MS_SD_OS' => isset($this->MS_SD_OS) ? $this->MS_SD_OS : NULL,
                'MS_cv_OS' => isset($this->MS_cv_OS) ? $this->MS_cv_OS : NULL,
                'MS_max_OS' => isset($this->MS_max_OS) ? $this->MS_max_OS : NULL,
                'MS_min_OS' => isset($this->MS_min_OS) ? $this->MS_min_OS : NULL,
                'MS_hex_OS' => isset($this->MS_hex_OS) ? $this->MS_hex_OS : NULL,
                'MS_pahi_OS' => isset($this->MS_pahi_OS) ? $this->MS_pahi_OS : NULL
            ]);

            $this->lastIdForUpdate = $this->fk_visits_id;

            //  Keratometrie
            if(($this->OD_K1 != '') || ($this->OD_ax_1 != '') || ($this->OD_K2 != '') || ($this->OS_K1 != '') || ($this->OS_ax_1 != '') || ($this->OS_K2 != '')){
                Visit::where('id', $this->fk_visits_id)->update([
                    'keratometrie' => 1,
                ]);
            } else {
                Visit::where('id', $this->fk_visits_id)->update([
                    'keratometrie' => 0,
                ]);
            }

            //  Refratometrie
            if(($this->OD_refracto_dsf != '') || ($this->OD_refracto_cyl != '') || ($this->OD_refracto_ax != '') || ($this->OS_refracto_dsf != '') || ($this->OS_refracto_cyl != '') || ($this->OS_refracto_ax != '') || ($this->DIP_refracto != '') || ($this->ciclopegie != 0)){
                Visit::where('id', $this->fk_visits_id)->update([
                    'refratometrie' => 1,
                ]);
            } else {
                Visit::where('id', $this->fk_visits_id)->update([
                    'refratometrie' => 0,
                ]);
            }

            //  Corectie optica
            if(($this->far_OD_Dsf != '') || ($this->far_OD_DCyl != '') || ($this->far_OD_Ax != '') || ($this->far_OS_Dsf != '') || ($this->far_OS_DCyl != '') || ($this->far_OS_Ax != '') || ($this->far_DIP != '') || ($this->near_OD_Dsf != '') || ($this->near_OD_DCyl != '') || ($this->near_OD_Ax != '') || ($this->near_OS_Dsf != '') || ($this->near_OS_DCyl != '') || ($this->near_OS_Ax != '') || ($this->near_DIP != '')){
                Visit::where('id', $this->fk_visits_id)->update([
                    'optical_correction' => 1,
                ]);
            } else {
                Visit::where('id', $this->fk_visits_id)->update([
                    'optical_correction' => 0,
                ]);
            }

            //  Microscopie speculara AO
            if(($this->MS_nr_OD != '') || ($this->MS_CD_OD != '') || ($this->MS_avg_OD != '') || ($this->MS_SD_OD != '') || ($this->MS_cv_OD != '') || ($this->MS_max_OD != '') || ($this->MS_min_OD != '') || ($this->MS_hex_OD != '') || ($this->MS_pahi_OD != '') || ($this->MS_nr_OS != '') || ($this->MS_CD_OS != '') || ($this->MS_avg_OS != '') || ($this->MS_SD_OS != '') || ($this->MS_cv_OS != '') || ($this->MS_max_OS != '') || ($this->MS_min_OS != '') || ($this->MS_hex_OS != '') || ($this->MS_pahi_OS != '')){
                Visit::where('id', $this->fk_visits_id)->update([
                    'microscopie' => 1,
                ]);
            } else {
                Visit::where('id', $this->fk_visits_id)->update([
                    'microscopie' => 0,
                ]);
            }

        }

        session()->flash('message', 'Reteta ochelari inserata cu success.');

    }

    // Keratometrie

    public function updatedODK1(){
        $this->add_kerato = 1;
    }

    public function updatedODAx1(){
        $this->add_kerato = 1;
    }

    public function updatedODK2(){
        $this->add_kerato = 1;
    }

    public function updatedOSK1(){
        $this->add_kerato = 1;
    }

    public function updatedOSAx1(){
        $this->add_kerato = 1;
    }

    public function updatedOSK2(){
        $this->add_kerato = 1;
    }

    // Refratometrie

    public function updatedODRefractoDsf(){
        $this->add_refracto = 1;
    }

    public function updatedODRefractoCyl(){
        $this->add_refracto = 1;
    }

    public function updatedODRefractoAx(){
        $this->add_refracto = 1;
    }

    public function updatedOSRefractoDsf(){
        $this->add_refracto = 1;
    }

    public function updatedOSRefractoCyl(){
        $this->add_refracto = 1;
    }

    public function updatedOSRefractoAx(){
        $this->add_refracto = 1;
    }

    public function updatedDIPRefracto(){
        $this->add_refracto = 1;
    }

    public function updatedCiclopegie(){
        if($this->ciclopegie == 1){
            $this->add_refracto = 1;
        }
    }

    // Corectie optica Distanta

    public function updatedFarODDsf(){
        $this->add_correction = 1;
    }

    public function updatedFarODDCyl(){
        $this->add_correction = 1;
    }

    public function updatedFarODAx(){
        $this->add_correction = 1;
    }

    public function updatedFarOSDsf(){
        $this->add_correction = 1;
    }

    public function updatedFarOSDCyl(){
        $this->add_correction = 1;
    }

    public function updatedFarOSAx(){
        $this->add_correction = 1;
    }

    public function updatedFarDIP(){
        $this->add_correction = 1;
    }

    // Corectie optica Aproape

    public function updatedNearODDsf(){
        $this->add_correction = 1;
    }

    public function updatedNearODDCyl(){
        $this->add_correction = 1;
    }

    public function updatedNearODAx(){
        $this->add_correction = 1;
    }

    public function updatedNearOSDsf(){
        $this->add_correction = 1;
    }

    public function updatedNearOSDCyl(){
        $this->add_correction = 1;
    }

    public function updatedNearOSAx(){
        $this->add_correction = 1;
    }

    public function updatedNearDIP(){
        $this->add_correction = 1;
    }

    // Microscopie speculara OD

    public function updatedMSNrOD(){
        $this->add_biomicroscopie = 1;
    }

    public function updatedMSCDOD(){
        $this->add_biomicroscopie = 1;
    }

    public function updatedMSAvgOD(){
        $this->add_biomicroscopie = 1;
    }

    public function updatedMSSDOD(){
        $this->add_biomicroscopie = 1;
    }

    public function updatedMSCvOD(){
        $this->add_biomicroscopie = 1;
    }

    public function updatedMSMaxOD(){
        $this->add_biomicroscopie = 1;
    }

    public function updatedMSMinOD(){
        $this->add_biomicroscopie = 1;
    }

    public function updatedMSHexOD(){
        $this->add_biomicroscopie = 1;
    }

    public function updatedMSPahiOD(){
        $this->add_biomicroscopie = 1;
    }

    // Microscopie speculara OS

    public function updatedMSNrOS(){
        $this->add_biomicroscopie = 1;
    }

    public function updatedMSCDOS(){
        $this->add_biomicroscopie = 1;
    }

    public function updatedMSAvgOS(){
        $this->add_biomicroscopie = 1;
    }

    public function updatedMSSDOS(){
        $this->add_biomicroscopie = 1;
    }

    public function updatedMSCvOS(){
        $this->add_biomicroscopie = 1;
    }

    public function updatedMSMaxOS(){
        $this->add_biomicroscopie = 1;
    }

    public function updatedMSMinOS(){
        $this->add_biomicroscopie = 1;
    }

    public function updatedMSHexOS(){
        $this->add_biomicroscopie = 1;
    }

    public function updatedMSPahiOS(){
        $this->add_biomicroscopie = 1;
    }

    public function backToPage(){
        return redirect()->to('add_consultatie/'.$this->consultationId);
    }
}
