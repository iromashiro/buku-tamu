<?php

namespace App\Main;

use Diskominfo\Dicero;

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
        /*
        if (Dicero::getAuthenticatedUser()->role_name == 'super') {
            # code...
        } elseif () {
            # code...
        }
        */

        return [
            'dashboard' => [
                'icon' => 'home',
                'title' => 'Dashboard',
                'route_name' => 'beranda',
                'params' => [
                    'layout' => 'side-menu'
                ],
            ],

            'pmks' => [
                'icon' => 'book-open',
                'title' => 'Data',
                'sub_menu' => [
                    'pmks' => [
                        'icon' => 'user',
                        'route_name' => 'ppks.index',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'PPKS'
                    ],
                    'bantuan' => [
                        'icon' => 'help-circle',
                        'route_name' => 'bantuan.create',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Bantuan'
                    ]
                ]
            ],

            'laporan' => [
                'icon' => 'printer',
                'title' => 'Laporan',
                'sub_menu' => [
                    'pmks' => [
                        'icon' => 'user',
                        'route_name' => 'ppks.laporan',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'PPKS'
                    ],
                    'bantuan' => [
                        'icon' => 'help-circle',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Bantuan'
                    ]
                ]
            ],

            'pengaturan' => [
                'icon' => 'settings-2',
                'title' => 'Pengaturan',
                'sub_menu' => [
                    'side-menu' => [
                        'icon' => '',
                        'route_name' => 'admin.list_opd',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Master TKSK'
                    ],

                    'simple-menu' => [
                        'icon' => '',
                        'route_name' => 'list.admin',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Master Administrator'
                    ],

                    'jenis_ppks' => [
                        'icon' => '',
                        'route_name' => 'index.jenis-pmks',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Jenis PPKS'
                    ],

                    'jenis_bantuan' => [
                        'icon' => '',
                        'route_name' => 'index.jenis-bantuan',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Jenis Bantuan'
                    ]
                ]
            ],

            'logout' => [
                'icon' => 'log-out',
                'title' => 'Keluar',
                'route_name' => 'logout',
                'params' => [
                    'layout' => 'side-menu'
                ],
            ],
        ];
    }
}
