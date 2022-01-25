<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

    public function index()
    {
        return view('layouts.app');
    }

    public function medic()
    {
        return view('pages.medic');
    }

    public function asistenta()
    {
        return view('pages.asistenta');
    }

    public function receptie()
    {
        return view('pages.receptie');
    }

    public function lista_proceduri()
    {
        return view('pages.lista_proceduri');
    }

    public function add_procedura()
    {
        return view('pages.add_procedura');
    }

    public function asociere_proceduri()
    {
        return view('pages.asociere_proceduri');
    }

    public function lista_articole()
    {
        return view('pages.lista_articole');
    }

    public function add_articol()
    {
        return view('pages.add_articol');
    }

    public function add_biomicroscopie()
    {
        return view('pages.add_biomicroscopie');
    }

    public function add_camp_vizual()
    {
        return view('pages.add_camp_vizual');
    }

    public function add_diagnostic()
    {
        return view('pages.add_diagnostic');
    }

    public function add_fo()
    {
        return view('pages.add_fo');
    }

    public function add_gonioscopie()
    {
        return view('pages.add_gonioscopie');
    }

    public function add_medicament()
    {
        return view('pages.add_medicament');
    }

    public function add_motiv()
    {
        return view('pages.add_motiv');
    }

    public function add_schema_tratament()
    {
        return view('pages.add_schema_tratament');
    }

    public function lista_biomicroscopie()
    {
        return view('pages.lista_biomicroscopie');
    }

    public function lista_campuri_vizuale()
    {
        return view('pages.lista_campuri_vizuale');
    }

    public function lista_diagnostice()
    {
        return view('pages.lista_diagnostice');
    }

    public function lista_fo()
    {
        return view('pages.lista_fo');
    }

    public function lista_gonioscopie()
    {
        return view('pages.lista_gonioscopie');
    }

    public function lista_medicamente()
    {
        return view('pages.lista_medicamente');
    }

    public function lista_motive()
    {
        return view('pages.lista_motive');
    }

    public function lista_schema_tratamente()
    {
        return view('pages.lista_schema_tratamente');
    }

    public function welcome()
    {
        return view('pages.welcome');
    }

    public function logout()
    {
        return view('pages.logout');
    }   public function register()
    {
        return view('pages.register');
    }
}