<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

</head>
<body>

<style>
    body {
        margin-top:35px;
        margin-left: 45px;
        margin-right: 45px;
        margin-bottom: 45px;
        font-size: 14px;
        font-family: Verdana;
    }
    @page {
        margin-top:35px;
        margin-left: 45px;
        margin-right: 45px;
        margin-bottom: 45px;
    }

    .checkbox{
        font-size: 1.3em;
    }
    .pl-30 {
        padding-left: 30px;
    }
    .pl-50 {
        padding-left: 50px;
    }
    .py-3px {
        padding-top: 3px;
        padding-bottom: 3px;
    }
    .py-5px {
        padding-top: 5px;
        padding-bottom: 5px;
    }
    .text-italic {
        font-style: italic;
    }

    td {
        vertical-align: top;
    }
</style>
<table style='width: 100%; border-collapse: collapse;' autosize='1'>
    <thead>
    <tr>
        <th style='width:8.33%'></th>
        <th style='width:8.33%'></th>
        <th style='width:8.33%'></th>
        <th style='width:8.33%'></th>
        <th style='width:8.33%'></th>
        <th style='width:8.33%'></th>
        <th style='width:8.33%'></th>
        <th style='width:8.33%'></th>
        <th style='width:8.33%'></th>
        <th style='width:8.33%'></th>
        <th style='width:8.33%'></th>
        <th style='width:8.33%'></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan='8' style='font-size: 1.2rem; font-weight: bold;'>
            Nume firma
        </td>
        <td colspan='4' style='text-align: right;'>
            Telefon: 077777777
        </td>
    </tr>
    <tr>
        <td colspan='8' style=''>
            adresa firma de test adresa firma de test adresa
        </td>
        <td colspan='4' style='text-align: right;'>
            E-mail: test@test.com
        </td>
    </tr>
    <tr>
        <td colspan='12' style='text-align: center; font-size: 1.5rem; padding-top:15px; padding-bottom: 20px;'>FISA DE CONSULTATIE OFTALMOLOGICA - COPIE</td>
    </tr>
    <tr style='border: 1px solid black;'>
        <td colspan='12'>
            <table style='width: 100%;'>
                <tr>
                    <td style='width:30%;'>
                        Nume:
                    </td>
                    <td style='width:70%;'>
                        {{$patient->patient_name}}
                    </td>
                    <td style='width:30%;'>
                        Fisa de obs:
                    </td>
                    <td style='width:70%;'>
                        {{$visit->consultation_form_number}}
                    </td>
                    <td style='width:30%;text-align: right'>
                        Varsta:
                    </td>
                    <td style='width:70%;'>
                        {{$patient->patient_age}}
                    </td>
                </tr>
                <tr>
                    <td style=''>
                        Prenume:
                    </td>
                    <td style=''>
                        {{$patient->patient_forename}}
                    </td>
                    @if($patient->patient_cnp != '')
                    <td style=''>
                        CNP:
                    </td>
                    <td style=''>
                        {{$patient->patient_cnp}}
                    </td>
                    @else
                    <td style=''></td>
                    <td style=''></td>
                    @endif
                    <td style='text-align: right'>
                        NR_ID:
                    </td>
                    <td style=''>
                        {{$patient->id}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    @if(isset($visitInfo->diagnostic_description) && $visitInfo->diagnostic_description != '')
    <tr>
        <td colspan='3' style='padding-top: 20px; padding-bottom: 5px;'>
            Diagnostic principal:
        </td>
        <td colspan='9' style='padding-top: 20px; padding-bottom: 5px;'>
            @nl2br($visitInfo->diagnostic_description)
        </td>
    </tr>
    @endif
    @if(isset($visitInfo->diagnostic_secondary_description) && $visitInfo->diagnostic_secondary_description != '')
        <tr>
            <td colspan='3' style='padding-top: 20px; padding-bottom: 5px;'>
                Diagnostic secundar:
            </td>
            <td colspan='9' style='padding-top: 20px; padding-bottom: 5px;'>
                @nl2br($visitInfo->diagnostic_secondary_description)
            </td>
        </tr>
    @endif
    @if(isset($visitInfo->diagnostic_other_description) && $visitInfo->diagnostic_other_description != '')
        <tr>
            <td colspan='3' style='padding-top: 20px; padding-bottom: 5px;'>
                Alte diagnostice:
            </td>
            <td colspan='9' style='padding-top: 20px; padding-bottom: 5px;'>
                @nl2br($visitInfo->diagnostic_other_description)
            </td>
        </tr>
    @endif
    <tr>
        <td colspan='12' style='font-size: 1.1rem; padding-top:15px; border-bottom: 1px solid black;'>DETALII EXAMEN OFTALMOLOGIC</td>
    </tr>
    @if(isset($visitInfo->historical_procedures_description) && $visitInfo->historical_procedures_description != '')
        <tr>
            <td colspan='3' style='padding-top: 15px; padding-bottom: 5px;'>
                Motive prezentare:
            </td>
            <td colspan='9' style='padding-top: 15px; padding-bottom: 5px;'>
                @nl2br($visitInfo->historical_procedures_description)
            </td>
        </tr>
    @endif
    <tr>
        @if(isset($visitInfo->av_ry) && $visitInfo->av_ry != '')
            <td colspan='1' style='padding-top: 7px; padding-bottom: 7px;'>
                AVOD:
            </td>
            <td colspan='3' style='padding-top: 7px; padding-bottom: 7px;'>
                @nl2br($visitInfo->av_ry)
            </td>
        @endif
        @if(isset($visitInfo->t_ry_non_c) && $visitInfo->t_ry_non_c != '')
            <td colspan='3' style='padding-top: 7px; padding-bottom: 7px;'>
                TOD non-contact (mmHg):
            </td>
            <td colspan='1' style='padding-top: 7px; padding-bottom: 7px;'>
                @nl2br($visitInfo->t_ry_non_c)
            </td>
        @endif
        @if(isset($visitInfo->t_ry_c) && $visitInfo->t_ry_c != '')
            <td colspan='3' style='padding-top: 7px; padding-bottom: 7px;'>
                TOD contact (mmHg):
            </td>
            <td colspan='1' style='padding-top: 7px; padding-bottom: 7px;'>
                @nl2br($visitInfo->t_ry_c)
            </td>
        @endif
    </tr>
    <tr>
        @if(isset($visitInfo->av_ly) && $visitInfo->av_ly != '')
            <td colspan='1' style='padding-top: 7px; padding-bottom: 7px;'>
                AVOS:
            </td>
            <td colspan='3' style='padding-top: 7px; padding-bottom: 7px;'>
                @nl2br($visitInfo->av_ly)
            </td>
        @endif
        @if(isset($visitInfo->t_ly_non_c) && $visitInfo->t_ly_non_c != '')
            <td colspan='3' style='padding-top: 7px; padding-bottom: 7px;'>
                TOS non-contact (mmHg):
            </td>
            <td colspan='1' style='padding-top: 7px; padding-bottom: 7px;'>
                @nl2br($visitInfo->t_ly_non_c)
            </td>
        @endif
        @if(isset($visitInfo->t_ly_c) && $visitInfo->t_ly_c != '')
            <td colspan='3' style='padding-top: 7px; padding-bottom: 7px;'>
                TOS contact (mmHg):
            </td>
            <td colspan='1' style='padding-top: 7px; padding-bottom: 7px;'>
                @nl2br($visitInfo->t_ly_c)
            </td>
        @endif
    </tr>
    @if(isset($visitInfo->biomicroscopie_ry_description) && $visitInfo->biomicroscopie_ry_description != '')
        <tr>
            <td colspan='3' style='padding-top: 5px; padding-bottom: 5px;'>
                OD_examen biomicroscopic:
            </td>
            <td colspan='9' style='padding-top: 5px; padding-bottom: 5px;'>
                @nl2br($visitInfo->biomicroscopie_ry_description)
            </td>
        </tr>
    @endif
    @if(isset($visitInfo->biomicroscopie_ly_description) && $visitInfo->biomicroscopie_ly_description != '')
        <tr>
            <td colspan='3' style='padding-top: 5px; padding-bottom: 5px;'>
                OS_examen biomicroscopic:
            </td>
            <td colspan='9' style='padding-top: 5px; padding-bottom: 5px;'>
                @nl2br($visitInfo->biomicroscopie_ly_description)
            </td>
        </tr>
    @endif
    @if(isset($visitInfo->eye_bottom_description) && $visitInfo->eye_bottom_description != '')
        <tr>
            <td colspan='3' style='padding-top: 5px; padding-bottom: 5px;'>
                Examen pol posterior:
            </td>
            <td colspan='9' style='padding-top: 5px; padding-bottom: 5px;'>
                @nl2br($visitInfo->eye_bottom_description)
            </td>
        </tr>
    @endif
    @if(isset($visitInfo->eye_bottom_extra_description) && $visitInfo->eye_bottom_extra_description != '')
        <tr>
            <td colspan='3' style='padding-top: 5px; padding-bottom: 5px;'>
                Examen pol posterior (continuare):
            </td>
            <td colspan='9' style='padding-top: 5px; padding-bottom: 5px;'>
                @nl2br($visitInfo->eye_bottom_extra_description)
            </td>
        </tr>
    @endif
    @if(isset($visitInfo->drug_treatment_description) && $visitInfo->drug_treatment_description != '')
        <tr>
            <td colspan='3' style='padding-top: 5px; padding-bottom: 5px;'>
                Istoric /Alte examene
            </td>
            <td colspan='9' style='padding-top: 5px; padding-bottom: 5px;'>
                @nl2br($visitInfo->drug_treatment_description)
            </td>
        </tr>
    @endif
    @if(isset($visitInfo->gonioscopie_ry_description) && $visitInfo->gonioscopie_ry_description != '')
        <tr>
            <td colspan='3' style='padding-top: 5px; padding-bottom: 5px;'>
                OD Gonioscopie:
            </td>
            <td colspan='9' style='padding-top: 5px; padding-bottom: 5px;'>
                @nl2br($visitInfo->gonioscopie_ry_description)
            </td>
        </tr>
    @endif
    @if(isset($visitInfo->gonioscopie_ly_description) && $visitInfo->gonioscopie_ly_description != '')
        <tr>
            <td colspan='3' style='padding-top: 5px; padding-bottom: 5px;'>
                OS Gonioscopie:
            </td>
            <td colspan='9' style='padding-top: 5px; padding-bottom: 5px;'>
                @nl2br($visitInfo->gonioscopie_ly_description)
            </td>
        </tr>
    @endif
    @if(isset($visitInfo->visual_field_ry_description) && $visitInfo->visual_field_ry_description != '')
        <tr>
            <td colspan='3' style='padding-top: 5px; padding-bottom: 5px;'>
                Camp Vizual OD:
            </td>
            <td colspan='9' style='padding-top: 5px; padding-bottom: 5px;'>
                @nl2br($visitInfo->visual_field_ry_description)
            </td>
        </tr>
    @endif
    @if(isset($visitInfo->visual_field_ly_description) && $visitInfo->visual_field_ly_description != '')
        <tr>
            <td colspan='3' style='padding-top: 5px; padding-bottom: 5px;'>
                Camp Vizual OS:
            </td>
            <td colspan='9' style='padding-top: 5px; padding-bottom: 5px;'>
                @nl2br($visitInfo->visual_field_ly_description)
            </td>
        </tr>
    @endif
    <tr>
        @if(isset($visitInfo->ry_cv_md) && $visitInfo->ry_cv_md != '')
            <td colspan='2' style='padding-top: 7px; padding-bottom: 7px;'>
                CV_OD_MD:
            </td>
            <td colspan='1' style='padding-top: 7px; padding-bottom: 7px;'>
                @nl2br($visitInfo->ry_cv_md)
            </td>
        @endif
        @if(isset($visitInfo->ry_cv_pd) && $visitInfo->ry_cv_pd != '')
            <td colspan='2' style='padding-top: 7px; padding-bottom: 7px;'>
                CV_OD_PD:
            </td>
            <td colspan='1' style='padding-top: 7px; padding-bottom: 7px;'>
                @nl2br($visitInfo->ry_cv_pd)
            </td>
        @endif
        @if(isset($visitInfo->ly_cv_md) && $visitInfo->ly_cv_md != '')
            <td colspan='2' style='padding-top: 7px; padding-bottom: 7px;'>
                CV_OS_MD:
            </td>
            <td colspan='1' style='padding-top: 7px; padding-bottom: 7px;'>
                @nl2br($visitInfo->ly_cv_md)
            </td>
        @endif
        @if(isset($visitInfo->ly_cv_pd) && $visitInfo->ly_cv_pd != '')
            <td colspan='2' style='padding-top: 7px; padding-bottom: 7px;'>
                CV_OS_PD:
            </td>
            <td colspan='1' style='padding-top: 7px; padding-bottom: 7px;'>
                @nl2br($visitInfo->ly_cv_pd)
            </td>
        @endif
    </tr>
    <tr>
        <td colspan='9' style='padding-top: 10px;border-bottom: 1px solid black;'></td>
    </tr>
    @if(isset($visitInfo->treatment_scheme_description) && $visitInfo->treatment_scheme_description != '')
        <tr>
            <td colspan='3' style='padding-top: 14px; padding-bottom: 25px; font-weight: bold;'>
                Recomandari:
            </td>
            <td colspan='9' style='padding-top: 14px; padding-bottom: 25px; font-weight: bold;'>
                @nl2br($visitInfo->treatment_scheme_description)
            </td>
        </tr>
    @endif
    <tr>
        <td colspan='1' style='padding-top: 14px; padding-bottom: 5px;'>
            Data:
        </td>
        <td colspan='6' style='padding-top: 14px; padding-bottom: 5px; font-weight: bold;'>
            {{$visit->visit_date}}
        </td>
        <td colspan='5' style='padding-top: 14px; padding-bottom: 5px; font-weight: bold;'>
            Semnatura si Parafa
        </td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </tfoot>
</table>
</body>
</html>