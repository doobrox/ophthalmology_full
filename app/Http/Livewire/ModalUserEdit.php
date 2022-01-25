<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\DB;
use DateTime;

class ModalUserEdit extends ModalComponent
{

    public $whatUser;
    public $userDetails;

    public $patient_name,
        $patient_forename,
        $patient_locality,
        $patient_street,
        $patient_number,
        $patient_phone,
        $patient_phone_second,
        $patient_email,
        $patient_cnp,
        $patient_document,
        $patient_series,
        $patient_document_number,
        $patient_date_of_birth,
        $user_who_input,
        $patient_name_and_forename,
        $patient_date_of_registration,
        $patient_age;

    public $availability;

    public function mount($whatUser)
    {
//        $this->whatUser = 'xxx'. $whatUser;


        $patientSelected = DB::table('patients')
            ->where('id', $whatUser)
            ->first();


        foreach ($patientSelected as $key => $value) {
            $this->$key = $value;
        }
//        $this->user_who_input = "xxxx";
    }

    public function updatedPatientCnp()
    {
        if(strlen($this->patient_cnp) == 0) {
            $this->resetErrorBag('patient_cnp');
            return $this->availability = '';
        } else {
            $this->resetErrorBag('patient_cnp');
            if(strlen($this->patient_cnp) != 13) {
                return $this->availability = 'CNP trebuie sa aiba 13 charactere!';
            }
            $cnp = str_split($this->patient_cnp);
            $hashTable = array( 2 , 7 , 9 , 1 , 4 , 6 , 3 , 5 , 8 , 2 , 7 , 9 );
            $hashResult = 0;
            // All characters must be numeric
            for($i=0 ; $i<13 ; $i++) {
                if(!is_numeric($cnp[$i])) {
                    return $this->availability = 'CNP trebuie sa fie numeric!';
                }
                $cnp[$i] = (int)$cnp[$i];
                if($i < 12) {
                    $hashResult += (int)$cnp[$i] * (int)$hashTable[$i];
                }
            }
            unset($hashTable, $i);
            $hashResult = $hashResult % 11;
            if($hashResult == 10) {
                $hashResult = 1;
            }
            // Check Year
            $year = ($cnp[1] * 10) + $cnp[2];
            switch( $cnp[0] ) {
                case 1  : case 2 : { $year += 1900; } break; // cetateni romani nascuti intre 1 ian 1900 si 31 dec 1999
                case 3  : case 4 : { $year += 1800; } break; // cetateni romani nascuti intre 1 ian 1800 si 31 dec 1899
                case 5  : case 6 : { $year += 2000; } break; // cetateni romani nascuti intre 1 ian 2000 si 31 dec 2099
                case 7  : case 8 : case 9 : {                // rezidenti si Cetateni Straini
                $year += 2000;
                if($year > (int)date('Y')-14) {
                    $year -= 100;
                }
            } break;
                default : {
                    return $this->availability = '---';
                } break;
            }
            $zi = $cnp['5'] . $cnp['6'];
            $luna = $cnp['3'] . $cnp['4'];
            if ($year > 1800 && $year < 2099 && $cnp[12] == $hashResult && $luna < 13 && $zi < 31){
                $from = new DateTime($year . '-' . $luna . '-' . $zi);
                $to = new DateTime('today');
                return [$this->patient_date_of_birth = date($year . '-' . $luna . '-' . $zi),
                    $this->patient_age = $from->diff($to)->y,
                    $this->availability = ''];
            } else {
                return $this->availability = 'CNP gresit!';
            }
        }
    }

    private function resetInputFields(){
        $this->patient_name = null;
        $this->patient_forename = null;
        $this->patient_locality = null;
        $this->patient_street = null;
        $this->patient_number = null;
        $this->patient_phone = null;
        $this->patient_phone_second = null;
        $this->patient_email = null;
        $this->patient_cnp = null;
        $this->patient_document = null;
        $this->patient_series = null;
        $this->patient_document_number = null;
        $this->patient_date_of_birth = null;
        $this->patient_name_and_forename = null;
        $this->patient_age = null;
    }

    protected $messages = [
        'patient_cnp.min' => 'CNP trebuie sa aiba 13 charactere!'
    ];

    public function store()
    {

        if(strlen($this->patient_cnp) > 0){
            $this->availability = '';
            $this->validate([
                'patient_cnp' => 'min:13',
                'patient_name' => 'required',
                'patient_forename' => 'required',
            ]);
        } else {
            $this->validate([
                'patient_name' => 'required',
                'patient_forename' => 'required',
            ]);
        }

        DB::table('patients')
            ->where('id', $this->whatUser)
            ->update([
                'patient_name' => $this->patient_name,
                'patient_forename' => $this->patient_forename,
                'patient_locality' => $this->patient_locality,
                'patient_street' => $this->patient_street,
                'patient_number' => $this->patient_number,
                'patient_phone' => $this->patient_phone,
                'patient_phone_second' => $this->patient_phone_second,
                'patient_email' => $this->patient_email,
                'patient_cnp' => $this->patient_cnp,
                'patient_document' => $this->patient_document,
                'patient_series' => $this->patient_series,
                'patient_document_number' => $this->patient_document_number,
                'patient_date_of_birth' => $this->patient_date_of_birth,
                'user_who_input' => $this->user_who_input,
                'patient_age' => $this->patient_age,
            ]);

//        $this->resetInputFields();

        session()->flash('message', 'Pacient modificat cu success!');

        $this->closeModalWithEvents([
            AddObservationFile::getName() => ['upsUserInfo', [
                $this
            ]],
            EditObservationFile::getName() => ['upsUserInfo', [
                $this
            ]]
        ]);

//        $this->forceClose()->closeModal();

    }

    public function render()
    {
//        $this->userDetails = DB::table('patients')
//            ->where('id', $this->whatUser )
//            ->get();

        return view('livewire.modal-user-edit');
    }
}
