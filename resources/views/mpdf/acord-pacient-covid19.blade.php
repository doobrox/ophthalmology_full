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
        margin-top:15px;
        margin-left: 45px;
        margin-right: 45px;
        margin-bottom: 0;
        font-size: 12.5px;
        font-family: Verdana;
    }
    @page {
        margin-top:15px;
        margin-left: 45px;
        margin-right: 45px;
        margin-bottom: 0;
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
</style>
<table style='width: 100%; border-collapse: collapse;' autosize='1'>
    <thead>
    <tr>
        <th style='width:16.66%'></th>
        <th style='width:16.66%'></th>
        <th style='width:16.66%'></th>
        <th style='width:16.66%'></th>
        <th style='width:16.66%'></th>
        <th style='width:16.66%'></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan='2' style='font-size: 0.95rem;'>
            RECOMANDĂRI REFERITOARE LA PREVENIREA INFECȚIILOR VIRALE ÎN PERIOADA POST STARE DE URGENȚĂ
        </td>
        <td style='text-align: center;'>
            Anexa 3
        </td>
        <td colspan='3'>
            {{--<img src='../../dist/img/logo-anmcs-2017-3.jpg' alt='' height='70px'>--}}
        </td>
    </tr>
    <tr>
        <td colspan='6' style='text-align: center; font-size: 1.5rem; padding-top:15px; padding-bottom: 20px;'>Chestionar pentru identificarea suspiciunii de infectie cu SARS-CoV-2</td>
    </tr>
    <tr style='border: 1px solid black;'>
        <td colspan='6'>
            <table style='width: 100%;'>
                <tr>
                    <td style='width:30%;'>
                        Nume:
                    </td>
                    <td style='width:70%;'>
                        {{$patient->patient_name}}
                    </td>
                    <td style='width:30%;'>
                        Domiciliat in:
                    </td>
                    <td style='width:70%;'>
                        {{$patient->patient_locality}}
                    </td>
                </tr>
                <tr>
                    <td style=''>
                        Prenume:
                    </td>
                    <td style=''>
                        {{$patient->patient_forename}}
                    </td>
                    <td style=''>
                        Strada:
                    </td>
                    <td style=''>
                        {{$patient->patient_street}}
                    </td>
                </tr>
                <tr>
                    <td style=''>
                        Data nasterii:
                    </td>
                    <td style=''>
                        {{$patient->patient_date_of_birth}}
                    </td>
                    <td style=''>
                        Numar:
                    </td>
                    <td style=''>
                        {{$patient->patient_number}}
                    </td>
                </tr>
                <tr>
                    <td style=''>
                        CNP:
                    </td>
                    <td style=''>
                        {{$patient->patient_cnp}}
                    </td>
                    <td style=''>
                        Act identitate: {{$patient->patient_document}}
                    </td>
                    <td>
                        <table style='width: 100%; border-spacing: 0px; margin-left: -2px;;'>
                            <tr>
                                <td>
                                    Serie: {{$patient->patient_series}}
                                </td>
                                <td>
                                    Nr: {{$patient->patient_document_number}}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan='6' style='padding-top: 20px; padding-bottom: 5px;'>
            1. Ati locuit/vizitat in ultima luna zone/tari in care se aflau persoane suferind din cauza infectiei cu noul coronavirus?
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-30 py-3px'>
            <input type='checkbox' class='checkbox'> Da
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-30 py-3px'>
            <input type='checkbox' class='checkbox'> Nu
        </td>
    </tr>
    <tr>
        <td colspan='6' class='py-5px'>
            2. Ati intrat in contact direct cu persoane care, in ultima luna, au locuit/vizitat zone/tari in care se aflau persoane suferind din cauza infectiei cu noul Coronavirus ?
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-30 py-3px'>
            <input type='checkbox' class='checkbox'> Da
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-30 py-3px'>
            <input type='checkbox' class='checkbox'> Nu
        </td>
    </tr>
    <tr>
        <td colspan='6' class='py-5px'>
            3. Ati intrat in contact direct cu persoane care au fost confirmate cu infectie cu noul Coronavirus (SARS-CoV-2) in ultimile 30 de zile?
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-30 py-3px'>
            <input type='checkbox' class='checkbox'> Da
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-30 py-3px'>
            <input type='checkbox' class='checkbox'> Nu
        </td>
    </tr>
    <tr>
        <td colspan='6' class='py-5px'>
            4. Ati fost spitalizat in ultimele 30 de zile?
        </td>
    </tr>
    <tr>
        <td colspan='1' class='pl-30 py-3px'>
            <input type='checkbox' class='checkbox'> Da
        </td>
        <td colspan='5' class='pl-30 py-3px'>
            Daca da, mentionez spital/clinica:____________________________________________
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-30 py-3px'>
            <input type='checkbox' class='checkbox'> Nu
        </td>
    </tr>
    <tr>
        <td colspan='6' class='py-5px'>
            5. Ati avut una sau mai multe din urmatoarela simptome in ultimele 30 zile?
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-30 py-3px text-italic'>
            -Febra:
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-50 py-3px'>
            <input type='checkbox' class='checkbox'> Da
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-50 py-3px'>
            <input type='checkbox' class='checkbox'> Nu
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-30 py-3px text-italic'>
            -Dureri de cap:
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-50 py-3px'>
            <input type='checkbox' class='checkbox'> Da
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-50 py-3px'>
            <input type='checkbox' class='checkbox'> Nu
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-30 py-3px text-italic'>
            -Dificultati de a respira:
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-50 py-3px'>
            <input type='checkbox' class='checkbox'> Da
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-50 py-3px'>
            <input type='checkbox' class='checkbox'> Nu
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-30 py-3px text-italic'>
            -Dificultati de a inghiti:
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-50 py-3px'>
            <input type='checkbox' class='checkbox'> Da
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-50 py-3px'>
            <input type='checkbox' class='checkbox'> Nu
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-30 py-3px text-italic'>
            -Tuse intensa:
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-50 py-3px'>
            <input type='checkbox' class='checkbox'> Da
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-50 py-3px'>
            <input type='checkbox' class='checkbox'> Nu
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-30 py-3px text-italic'>
            -Oboseala instalata fara explicatii:
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-50 py-3px'>
            <input type='checkbox' class='checkbox'> Da
        </td>
    </tr>
    <tr>
        <td colspan='6' class='pl-50 py-3px'>
            <input type='checkbox' class='checkbox'> Nu
        </td>
    </tr>
    <tr>
        <td colspan='6' style='padding-top:15px;'>
            Prin prezenta imi dau consimtamantul in conformitate cu Regulamentul (UE) 679/2016 al Parlamentului European si al Consiliului din 27.04.2016, privind protectia datelor personale fizice in ceac ce priveste prelucrarea datelor cu caracter personal si privind libera circulatie a acestora.
        </td>
    </tr>
    <tr>
        <td colspan='3'>
        </td>
        <td colspan='3' style='text-align: center; font-weight: bold;'>
            <span style='letter-spacing: 1px;font-weight: bold;'>{{$patient->patient_name}} {{$patient->patient_forename}}</span>
        </td>
    </tr>
    <tr>
        <td colspan='3'>
            <span style='letter-spacing: 1px;font-weight: bold;'>{{date("d M Y")}}</span>
        </td>
        <td colspan='3' style='text-align: right;'>
            <span style='letter-spacing: 1px;font-weight: bold;'>Semnatura:</span>______________________________________
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