<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\VisitsInfo;
use App\Models\VisualAcuity;
use Illuminate\Http\Request;
use App\Models\Visit;
use PDF;

class PdfController extends Controller
{

    public function consultatie(Request $request)
    {
        $id = $request->id;

        $visit = Visit::find($id);
        $visitInfo = VisitsInfo::where('fk_visits_id', '=', $id)->first();
        $patient = Patient::find($visit->fk_patient_id);
//        $visual_acuities = VisualAcuity::get();
        $pdf = PDF::loadView('mpdf.consultatie', ['visit' => $visit, 'visitInfo' => $visitInfo, 'patient' => $patient]);
        return $pdf->stream('document.pdf');
    }

    public function consultatie_copie(Request $request)
    {
        $id = $request->id;

        $visit = Visit::find($id);
        $visitInfo = VisitsInfo::where('fk_visits_id', '=', $id)->first();
        $patient = Patient::find($visit->fk_patient_id);
//        $visual_acuities = VisualAcuity::get();
        $pdf = PDF::loadView('mpdf.consultatie-copie', ['visit' => $visit, 'visitInfo' => $visitInfo, 'patient' => $patient]);
        return $pdf->stream('document.pdf');
    }

    public function acord_pacient_covid19(Request $request)
    {

        $patient = Patient::find($request->fk_patient_id);

//        dd($patient);
        $pdf = PDF::loadView('mpdf.acord-pacient-covid19', ['patient' => $patient]);
        return $pdf->stream('document.pdf');
    }
}
