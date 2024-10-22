<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Model_admin');
    }

    function index()
    {
        $this->layout('user/dashboard', $this->session->level, [
            'jumlah_bus' => $this->Model_crud->count('bus'),
            'jumlah_kerusakan' => $this->Model_crud->count('kerusakan'),
            'jumlah_koridor' => $this->Model_crud->count('koridor'),
            'jumlah_mekanik' => $this->Model_crud->count('mekanik')
        ]);
    }

    function bus()
    {
        $this->layout('user/bus', 'user/bus', [
            'list_bus' => $this->Model_crud->read('bus'),
            'list_koridor' => $this->Model_crud->read('koridor')
        ]);
    }

    function kerusakan()
    {
        $this->layout('user/kerusakan', 'user/kerusakan', [
            'list_kerusakan' => $this->Model_crud->read('kerusakan')
        ]);
    }

    function koridor()
    {
        $list_koridor_awal = $this->Model_crud->read('koridor');
        $list_koridor = [];
        $i = 0;

        foreach ($list_koridor_awal as $koridor) {
            $list_koridor[$i]['id_koridor'] = $koridor['id_koridor'];
            $list_koridor[$i]['kode_koridor'] = $koridor['kode_koridor'];
            $list_koridor[$i]['nama_koridor'] = $koridor['nama_koridor'];
            $list_koridor[$i]['jumlah_bus'] = $this->Model_crud->count_where('bus', ['kode_koridor' => $koridor['kode_koridor']]);

            $i++;
        }

        $this->layout('user/koridor', 'user/koridor', [
            'list_koridor' => $list_koridor
        ]);
    }

    function mekanik()
    {
        $this->layout('user/mekanik', 'user/mekanik', [
            'list_mekanik' => $this->Model_crud->read('mekanik')
        ]);
    }

    function laporan()
    {
        $this->layout('user/laporan', 'user/laporan', [
            'list_laporan' => $this->Model_admin->get_laporan(),
            'list_bus' => $this->Model_crud->read('bus'),
            'list_kerusakan' => $this->Model_crud->read('kerusakan'),
            'list_mekanik' => $this->Model_crud->read('mekanik')
        ]);
    }

    private function layout($contents, $href, $data = null)
    {
        $navs_dashboard = [
            [
                'href' => $this->session->level,
                'icon' => 'fa-solid fa-gauge-high',
                'label' => 'Dashboard'
            ]
        ];
        $navs_master = [
            [
                'href' => 'user/bus',
                'icon' => 'fa-solid fa-bus-simple',
                'label' => 'Bus'
            ],
            [
                'href' => 'user/kerusakan',
                'icon' => 'fa-solid fa-car-burst',
                'label' => 'Kerusakan'
            ],
            [
                'href' => 'user/koridor',
                'icon' => 'fa-solid fa-square',
                'label' => 'Koridor'
            ],
            [
                'href' => 'user/mekanik',
                'icon' => 'fa-solid fa-gear',
                'label' => 'Mekanik'
            ]
        ];
        $navs_laporan = [
            [
                'href' => 'user/laporan',
                'icon' => 'fa-solid fa-file-lines',
                'label' => 'Laporan'
            ]
        ];

        return $this->parser->parse('_layouts/admin', [
            'head' => $this->parser->parse('_partials/head', [], true),
            'sidebar' => $this->parser->parse('_partials/sidebar', [
                'items' => [
                    [
                        'heading' => 'Dashboard',
                        'nav-item' => $this->navs($navs_dashboard, $href)
                    ],
                    [
                        'heading' => 'Data Master',
                        'nav-item' => $this->navs($navs_master, $href)
                    ],
                    [
                        'heading' => 'Laporan',
                        'nav-item' => $this->navs($navs_laporan, $href)
                    ]
                ],
                'href' => $href
            ], true),
            'topbar' => $this->parser->parse('_partials/topbar', [], true),
            'contents' => $this->load->view($contents, $data, true),
            'footer' => $this->parser->parse('_partials/footer', [], true)
        ]);
    }

    private function navs($data, $href)
    {
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['active'] = $data[$i]['href'] === $href ? 'active' : '';
        }

        return $data;
    }
}
