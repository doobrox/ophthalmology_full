<?php

namespace App\Main;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {


        $meniuReceptie = [

            'reception' => [
                'icon' => 'home',
                'route_name' => 'receptie',
                'params' => [],
                'title' => 'Receptie'
            ],
            'assistant' => [
                'icon' => 'user',
                'route_name' => 'asistenta',
                'params' => [],
                'title' => 'Asistente'
            ],
            'doctor' => [
                'icon' => 'user',
                'route_name' => 'medic',
                'params' => [],
                'title' => 'Medic'
            ],
            'devider',

            'pacienti' => [
                'icon' => 'users',
                //  'route_name' => 'admin.permissions.index',
                'params' => [],
                'title' => 'Pacienti'
            ],
            'devider',

            'bonfiscal' => [
                'icon' => 'shopping-bag',
                'title' => 'Bon Fiscal',
            ],
            'proforma' => [
                'icon' => 'shopping-bag',
                'title' => 'Proforma',
            ],
            'billing' => [
                'icon' => 'shopping-bag',
                'title' => 'Facturare',
            ],
            'devider',


            'nomenclatoar' => [
                'icon' => 'list',
                'title' => 'Nomenclatoare',
                'sub_menu' => [
                    'lista_proceduri' => [
                        'icon' => 'clipboard',
                        'route_name' => 'lista_proceduri',
                        'params' => [

                        ],
                        'title' => 'Lista Proceduri'
                    ],
                    'lista_articole' => [
                        'icon' => 'clipboard',
                        'route_name' => 'lista_articole',
                        'params' => [],
                        'title' => 'Lista Articole'
                    ],
                    'lista_biomicroscopie' => [
                        'icon' => 'clipboard',
                        'route_name' => 'lista_biomicroscopie',
                        'params' => [],
                        'title' => 'Lista Biomicro'
                    ],
                    'lista_campuri_vizuale' => [
                        'icon' => 'clipboard',
                        'route_name' => 'lista_campuri_vizuale',
                        'params' => [],
                        'title' => 'Lista Camp Viz'
                    ],
                    'lista_diagnostice' => [
                        'icon' => 'clipboard',
                        'route_name' => 'lista_diagnostice',
                        'params' => [],
                        'title' => 'Lista Diagnostic'
                    ],
                    'lista_fo' => [
                        'icon' => 'clipboard',
                        'route_name' => 'lista_fo',
                        'params' => [],
                        'title' => 'Lista FO'
                    ],
                    'lista_gonioscopie' => [
                        'icon' => 'clipboard',
                        'route_name' => 'lista_gonioscopie',
                        'params' => [],
                        'title' => 'Lista Goniosc'
                    ],
                    'lista_medicamente' => [
                        'icon' => 'clipboard',
                        'route_name' => 'lista_medicamente',
                        'params' => [],
                        'title' => 'Lista Medicam'
                    ],
                    'lista_motive' => [
                        'icon' => 'clipboard',
                        'route_name' => 'lista_motive',
                        'params' => [],
                        'title' => 'Lista Motive'
                    ],
                    'lista_schema_tratamente' => [
                        'icon' => 'clipboard',
                        'route_name' => 'lista_schema_tratamente',
                        'params' => [],
                        'title' => 'Lista Schem Trat'
                    ],
                ]
            ],


            'configuration' => [
                'icon' => 'settings',
                'title' => 'Configurare',
                'sub_menu' => [
                    'billing-data' => [
                        'icon' => '',
//                'route_name' => 'medic',
                        'params' => [
                        ],
                        'title' => 'Date Facturare'
                    ],
                    'company-data' => [
                        'icon' => '',
//                'route_name' => 'medic',
                        'params' => [
                            'layout' => 'side-menu',
                        ],
                        'title' => 'Date Firme'
                    ],


                    'users' => [
                        'icon' => '',
                        'route_name' => 'admin.users.index',
                        'params' => [
                        ],
                        'title' => 'Utilizatori'
                    ],
                    'roles' => [
                        'icon' => '',
                        'route_name' => 'admin.roles.index',
                        'params' => [],
                        'title' => 'Grupuri'
                    ],

                    'permissions' => [
                        'icon' => '',
                        'route_name' => 'admin.permissions.index',
                        'params' => [],
                        'title' => 'Permisiuni'
                    ],



                    'personalization' => [
                        'icon' => '',
//                'route_name' => 'medic',
                        'params' => [
                            'layout' => 'side-menu',
                        ],
                        'title' => 'Personalizare'
                    ],
                    'account-settings' => [
                        'icon' => '',
//                'route_name' => 'medic',
                        'params' => [
                            'layout' => 'side-menu',
                        ],
                        'title' => 'Setari Cont'
                    ],
                    'tariff-plan' => [
                        'icon' => '',
//                'route_name' => 'medic',
                        'params' => [
                            'layout' => 'side-menu',
                        ],
                        'title' => 'Plan Tarifar'
                    ],
                ]
            ],
            'devider',

        ];

        $meniuAsistente = [

            'reception' => [
                'icon' => 'home',
                'route_name' => 'receptie',
                'params' => [],
                'title' => 'Receptie'
            ],
            'assistant' => [
                'icon' => 'user',
                'route_name' => 'asistenta',
                'params' => [],
                'title' => 'Asistente'
            ],
            'doctor' => [
                'icon' => 'user',
                'route_name' => 'medic',
                'params' => [],
                'title' => 'Medic'
            ],
            'devider',

            'pacienti' => [
                'icon' => 'users',
              //  'route_name' => 'admin.permissions.index',
                'params' => [],
                'title' => 'Pacienti'
            ],
            'devider',

                'bonfiscal' => [
                    'icon' => 'shopping-bag',
                    'title' => 'Bon Fiscal',
                ],
                'proforma' => [
                    'icon' => 'shopping-bag',
                    'title' => 'Proforma',
                ],
                'billing' => [
                    'icon' => 'shopping-bag',
                    'title' => 'Facturare',
                ],
            'devider',


            'nomenclatoar' => [
                'icon' => 'list',
                'title' => 'Nomenclatoare',
                'sub_menu' => [
                        'lista_proceduri' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_proceduri',
                            'params' => [

                            ],
                            'title' => 'Lista Proceduri'
                        ],
                        'lista_articole' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_articole',
                            'params' => [],
                            'title' => 'Lista Articole'
                        ],
                        'lista_biomicroscopie' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_biomicroscopie',
                            'params' => [],
                            'title' => 'Lista Biomicro'
                        ],
                        'lista_campuri_vizuale' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_campuri_vizuale',
                            'params' => [],
                            'title' => 'Lista Camp Viz'
                        ],
                        'lista_diagnostice' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_diagnostice',
                            'params' => [],
                            'title' => 'Lista Diagnostic'
                        ],
                        'lista_fo' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_fo',
                            'params' => [],
                            'title' => 'Lista FO'
                        ],
                        'lista_gonioscopie' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_gonioscopie',
                            'params' => [],
                            'title' => 'Lista Goniosc'
                        ],
                        'lista_medicamente' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_medicamente',
                            'params' => [],
                            'title' => 'Lista Medicam'
                        ],
                        'lista_motive' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_motive',
                            'params' => [],
                            'title' => 'Lista Motive'
                        ],
                        'lista_schema_tratamente' => [
                'icon' => 'clipboard',
                'route_name' => 'lista_schema_tratamente',
                'params' => [],
                'title' => 'Lista Schem Trat'
            ],
                ]
            ],


             'configuration' => [
        'icon' => 'settings',
        'title' => 'Configurare',
        'sub_menu' => [
            'billing-data' => [
                'icon' => '',
//                'route_name' => 'medic',
                'params' => [
                ],
                'title' => 'Date Facturare'
            ],
            'company-data' => [
                'icon' => '',
//                'route_name' => 'medic',
                'params' => [
                    'layout' => 'side-menu',
                ],
                'title' => 'Date Firme'
            ],


            'users' => [
                'icon' => '',
                'route_name' => 'admin.users.index',
                'params' => [
                ],
                'title' => 'Utilizatori'
            ],
            'roles' => [
                'icon' => '',
                'route_name' => 'admin.roles.index',
                'params' => [],
                'title' => 'Grupuri'
            ],

            'permissions' => [
                'icon' => '',
                'route_name' => 'admin.permissions.index',
                'params' => [],
                'title' => 'Permisiuni'
            ],



            'personalization' => [
                'icon' => '',
//                'route_name' => 'medic',
                'params' => [
                    'layout' => 'side-menu',
                ],
                'title' => 'Personalizare'
            ],
            'account-settings' => [
                'icon' => '',
//                'route_name' => 'medic',
                'params' => [
                    'layout' => 'side-menu',
                ],
                'title' => 'Setari Cont'
            ],
            'tariff-plan' => [
                'icon' => '',
//                'route_name' => 'medic',
                'params' => [
                    'layout' => 'side-menu',
                ],
                'title' => 'Plan Tarifar'
            ],
        ]
    ],
            'devider',

        ];

        $meniuMedic = [

            'reception' => [
                'icon' => 'home',
                'route_name' => 'receptie',
                'params' => [],
                'title' => 'Receptie'
            ],
            'assistant' => [
                'icon' => 'user',
                'route_name' => 'asistenta',
                'params' => [],
                'title' => 'Asistente'
            ],
            'doctor' => [
                'icon' => 'user',
                'route_name' => 'medic',
                'params' => [],
                'title' => 'Medic'
            ],
            'devider',

            'pacienti' => [
                'icon' => 'users',
              //  'route_name' => 'admin.permissions.index',
                'params' => [],
                'title' => 'Pacienti'
            ],
            'devider',

                'bonfiscal' => [
                    'icon' => 'shopping-bag',
                    'title' => 'Bon Fiscal',
                ],
                'proforma' => [
                    'icon' => 'shopping-bag',
                    'title' => 'Proforma',
                ],
                'billing' => [
                    'icon' => 'shopping-bag',
                    'title' => 'Facturare',
                ],
            'devider',


            'nomenclatoar' => [
                'icon' => 'list',
                'title' => 'Nomenclatoare',
                'sub_menu' => [
                        'lista_proceduri' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_proceduri',
                            'params' => [

                            ],
                            'title' => 'Lista Proceduri'
                        ],
                        'lista_articole' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_articole',
                            'params' => [],
                            'title' => 'Lista Articole'
                        ],
                        'lista_biomicroscopie' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_biomicroscopie',
                            'params' => [],
                            'title' => 'Lista Biomicro'
                        ],
                        'lista_campuri_vizuale' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_campuri_vizuale',
                            'params' => [],
                            'title' => 'Lista Camp Viz'
                        ],
                        'lista_diagnostice' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_diagnostice',
                            'params' => [],
                            'title' => 'Lista Diagnostic'
                        ],
                        'lista_fo' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_fo',
                            'params' => [],
                            'title' => 'Lista FO'
                        ],
                        'lista_gonioscopie' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_gonioscopie',
                            'params' => [],
                            'title' => 'Lista Goniosc'
                        ],
                        'lista_medicamente' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_medicamente',
                            'params' => [],
                            'title' => 'Lista Medicam'
                        ],
                        'lista_motive' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_motive',
                            'params' => [],
                            'title' => 'Lista Motive'
                        ],
                        'lista_schema_tratamente' => [
                'icon' => 'clipboard',
                'route_name' => 'lista_schema_tratamente',
                'params' => [],
                'title' => 'Lista Schem Trat'
            ],
                ]
            ],


             'configuration' => [
        'icon' => 'settings',
        'title' => 'Configurare',
        'sub_menu' => [
            'billing-data' => [
                'icon' => '',
//                'route_name' => 'medic',
                'params' => [
                ],
                'title' => 'Date Facturare'
            ],
            'company-data' => [
                'icon' => '',
//                'route_name' => 'medic',
                'params' => [
                    'layout' => 'side-menu',
                ],
                'title' => 'Date Firme'
            ],


            'users' => [
                'icon' => '',
                'route_name' => 'admin.users.index',
                'params' => [
                ],
                'title' => 'Utilizatori'
            ],
            'roles' => [
                'icon' => '',
                'route_name' => 'admin.roles.index',
                'params' => [],
                'title' => 'Grupuri'
            ],

            'permissions' => [
                'icon' => '',
                'route_name' => 'admin.permissions.index',
                'params' => [],
                'title' => 'Permisiuni'
            ],



            'personalization' => [
                'icon' => '',
//                'route_name' => 'medic',
                'params' => [
                    'layout' => 'side-menu',
                ],
                'title' => 'Personalizare'
            ],
            'account-settings' => [
                'icon' => '',
//                'route_name' => 'medic',
                'params' => [
                    'layout' => 'side-menu',
                ],
                'title' => 'Setari Cont'
            ],
            'tariff-plan' => [
                'icon' => '',
//                'route_name' => 'medic',
                'params' => [
                    'layout' => 'side-menu',
                ],
                'title' => 'Plan Tarifar'
            ],
        ]
    ],
            'devider',

        ];

        $meniuAdmin = [

            'reception' => [
                'icon' => 'home',
                'route_name' => 'receptie',
                'params' => [],
                'title' => 'Receptie'
            ],
            'assistant' => [
                'icon' => 'user',
                'route_name' => 'asistenta',
                'params' => [],
                'title' => 'Asistente'
            ],
            'doctor' => [
                'icon' => 'user',
                'route_name' => 'medic',
                'params' => [],
                'title' => 'Medic'
            ],
            'devider',

            'pacienti' => [
                'icon' => 'users',
              //  'route_name' => 'admin.permissions.index',
                'params' => [],
                'title' => 'Pacienti'
            ],
            'devider',

                'bonfiscal' => [
                    'icon' => 'shopping-bag',
                    'title' => 'Bon Fiscal',
                ],
                'proforma' => [
                    'icon' => 'shopping-bag',
                    'title' => 'Proforma',
                ],
                'billing' => [
                    'icon' => 'shopping-bag',
                    'title' => 'Facturare',
                ],
            'devider',


            'nomenclatoar' => [
                'icon' => 'list',
                'title' => 'Nomenclatoare',
                'sub_menu' => [
                        'lista_proceduri' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_proceduri',
                            'params' => [

                            ],
                            'title' => 'Lista Proceduri'
                        ],
                        'lista_articole' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_articole',
                            'params' => [],
                            'title' => 'Lista Articole'
                        ],
                        'lista_biomicroscopie' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_biomicroscopie',
                            'params' => [],
                            'title' => 'Lista Biomicro'
                        ],
                        'lista_campuri_vizuale' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_campuri_vizuale',
                            'params' => [],
                            'title' => 'Lista Camp Viz'
                        ],
                        'lista_diagnostice' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_diagnostice',
                            'params' => [],
                            'title' => 'Lista Diagnostic'
                        ],
                        'lista_fo' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_fo',
                            'params' => [],
                            'title' => 'Lista FO'
                        ],
                        'lista_gonioscopie' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_gonioscopie',
                            'params' => [],
                            'title' => 'Lista Goniosc'
                        ],
                        'lista_medicamente' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_medicamente',
                            'params' => [],
                            'title' => 'Lista Medicam'
                        ],
                        'lista_motive' => [
                            'icon' => 'clipboard',
                            'route_name' => 'lista_motive',
                            'params' => [],
                            'title' => 'Lista Motive'
                        ],
                        'lista_schema_tratamente' => [
                'icon' => 'clipboard',
                'route_name' => 'lista_schema_tratamente',
                'params' => [],
                'title' => 'Lista Schem Trat'
            ],
                ]
            ],


             'configuration' => [
        'icon' => 'settings',
        'title' => 'Configurare',
        'sub_menu' => [
            'billing-data' => [
                'icon' => '',
//                'route_name' => 'medic',
                'params' => [
                ],
                'title' => 'Date Facturare'
            ],
            'company-data' => [
                'icon' => '',
//                'route_name' => 'medic',
                'params' => [
                    'layout' => 'side-menu',
                ],
                'title' => 'Date Firme'
            ],


            'users' => [
                'icon' => '',
                'route_name' => 'admin.users.index',
                'params' => [
                ],
                'title' => 'Utilizatori'
            ],
            'roles' => [
                'icon' => '',
                'route_name' => 'admin.roles.index',
                'params' => [],
                'title' => 'Grupuri'
            ],

            'permissions' => [
                'icon' => '',
                'route_name' => 'admin.permissions.index',
                'params' => [],
                'title' => 'Permisiuni'
            ],



            'personalization' => [
                'icon' => '',
//                'route_name' => 'medic',
                'params' => [
                    'layout' => 'side-menu',
                ],
                'title' => 'Personalizare'
            ],
            'account-settings' => [
                'icon' => '',
//                'route_name' => 'medic',
                'params' => [
                    'layout' => 'side-menu',
                ],
                'title' => 'Setari Cont'
            ],
            'tariff-plan' => [
                'icon' => '',
//                'route_name' => 'medic',
                'params' => [
                    'layout' => 'side-menu',
                ],
                'title' => 'Plan Tarifar'
            ],
        ]
    ],
            'devider',

        ];


/*        if (!Gate::allows('config_allx') ) {
            unset($array['configuration']);
            unset($array[0]);
        }*/


        $roleArr = [];
        if(Auth::user()) {
            foreach (Auth::user()->roles()->get() as $k => $role) {
                $roleArr[] = $role->title;
            }
        }

        $array = [];

        if(in_array('Receptie', $roleArr) ){
            $array = $meniuReceptie;
        }

        if(in_array('Asistente', $roleArr) ){
            $array = $meniuAsistente;
        }

        if(in_array('Medic', $roleArr) ){
            $array = $meniuMedic;
        }

        if(in_array('Admin', $roleArr) ){
            $array = $meniuAdmin;
        }


        return $array;
    }
}
