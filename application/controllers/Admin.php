<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Model_admin');
    }

    function index()
    {
        $this->layout('admin/dashboard', $this->session->level, [
            'jumlah_bus' => $this->Model_crud->count('bus'),
            'jumlah_kerusakan' => $this->Model_crud->count('kerusakan'),
            'jumlah_koridor' => $this->Model_crud->count('koridor'),
            'jumlah_mekanik' => $this->Model_crud->count('mekanik')
        ]);
    }

    function bus()
    {
        $this->layout('admin/bus', 'admin/bus', [
            'list_bus' => $this->Model_crud->read('bus'),
            'list_koridor' => $this->Model_crud->read('koridor')
        ]);
    }

    function create_bus()
    {
        if ($this->Model_crud->create('bus', [
            'nama_bus' => $this->input->post('nama_bus'),
            'kode_koridor' => $this->input->post('kode_koridor')
        ])) {
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('admin/bus');
        } else {
            $this->session->set_flashdata('error', 'Data gagal ditambahkan');
            redirect('admin/bus');
        }
    }

    function update_bus($id_bus)
    {
        if ($this->Model_crud->update('bus', [
            'nama_bus' => $this->input->post('nama_bus'),
            'kode_koridor' => $this->input->post('kode_koridor')
        ], ['id_bus' => $id_bus])) {
            $this->session->set_flashdata('success', 'Data berhasil diedit');
            redirect('admin/bus');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diedit');
            redirect('admin/bus');
        }
    }

    function delete_bus($id_bus)
    {
        if ($this->Model_crud->delete('bus', ['id_bus' => $id_bus])) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('admin/bus');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('admin/bus');
        }
    }

    function kerusakan()
    {
        $this->layout('admin/kerusakan', 'admin/kerusakan', [
            'list_kerusakan' => $this->Model_crud->read('kerusakan')
        ]);
    }

    function create_kerusakan()
    {
        if ($this->Model_crud->create('kerusakan', [
            'jenis_kerusakan' => $this->input->post('jenis_kerusakan')
        ])) {
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('admin/kerusakan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal ditambahkan');
            redirect('admin/kerusakan');
        }
    }

    function update_kerusakan($id_kerusakan)
    {
        if ($this->Model_crud->update('kerusakan', [
            'jenis_kerusakan' => $this->input->post('jenis_kerusakan')
        ], ['id_kerusakan' => $id_kerusakan])) {
            $this->session->set_flashdata('success', 'Data berhasil diedit');
            redirect('admin/kerusakan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diedit');
            redirect('admin/kerusakan');
        }
    }

    function delete_kerusakan($id_kerusakan)
    {
        if ($this->Model_crud->delete('kerusakan', ['id_kerusakan' => $id_kerusakan])) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('admin/kerusakan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('admin/kerusakan');
        }
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

        $this->layout('admin/koridor', 'admin/koridor', [
            'list_koridor' => $list_koridor
        ]);
    }

    function create_koridor()
    {
        if ($this->Model_crud->create('koridor', [
            'kode_koridor' => $this->input->post('kode_koridor'),
            'nama_koridor' => $this->input->post('nama_koridor')
        ])) {
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('admin/koridor');
        } else {
            $this->session->set_flashdata('error', 'Data gagal ditambahkan');
            redirect('admin/koridor');
        }
    }

    function update_koridor($id_koridor)
    {
        if ($this->Model_crud->update('koridor', [
            'kode_koridor' => $this->input->post('kode_koridor'),
            'nama_koridor' => $this->input->post('nama_koridor')
        ], ['id_koridor' => $id_koridor])) {
            $this->session->set_flashdata('success', 'Data berhasil diedit');
            redirect('admin/koridor');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diedit');
            redirect('admin/koridor');
        }
    }

    function delete_koridor($id_koridor)
    {
        if ($this->Model_crud->delete('koridor', ['id_koridor' => $id_koridor])) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('admin/koridor');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('admin/koridor');
        }
    }

    function mekanik()
    {
        $this->layout('admin/mekanik', 'admin/mekanik', [
            'list_mekanik' => $this->Model_crud->read('mekanik')
        ]);
    }

    function create_mekanik()
    {
        if ($this->Model_crud->create('mekanik', [
            'nama_mekanik' => $this->input->post('nama_mekanik'),
            'jabatan' => $this->input->post('jabatan')
        ])) {
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('admin/mekanik');
        } else {
            $this->session->set_flashdata('error', 'Data gagal ditambahkan');
            redirect('admin/mekanik');
        }
    }

    function update_mekanik($id_mekanik)
    {
        if ($this->Model_crud->update('mekanik', [
            'nama_mekanik' => $this->input->post('nama_mekanik'),
            'jabatan' => $this->input->post('jabatan')
        ], ['id_mekanik' => $id_mekanik])) {
            $this->session->set_flashdata('success', 'Data berhasil diedit');
            redirect('admin/mekanik');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diedit');
            redirect('admin/mekanik');
        }
    }

    function delete_mekanik($id_mekanik)
    {
        if ($this->Model_crud->delete('mekanik', ['id_mekanik' => $id_mekanik])) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('admin/mekanik');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('admin/mekanik');
        }
    }

    function laporan()
    {
        $this->layout('admin/laporan', 'admin/laporan', [
            'list_laporan' => $this->Model_admin->get_laporan(),
            'list_bus' => $this->Model_crud->read('bus'),
            'list_kerusakan' => $this->Model_crud->read('kerusakan'),
            'list_mekanik' => $this->Model_crud->read('mekanik')
        ]);
    }

    function create_laporan()
    {
        if ($this->Model_crud->create('laporan', [
            'id_bus' => $this->input->post('id_bus'),
            'id_kerusakan' => $this->input->post('id_kerusakan'),
            'id_mekanik' => $this->input->post('id_mekanik')
        ])) {
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('admin/laporan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal ditambahkan');
            redirect('admin/laporan');
        }
    }

    function update_laporan($id_laporan)
    {
        if ($this->Model_crud->update('laporan', [
            'id_bus' => $this->input->post('id_bus'),
            'id_kerusakan' => $this->input->post('id_kerusakan'),
            'id_mekanik' => $this->input->post('id_mekanik')
        ], ['id_laporan' => $id_laporan])) {
            $this->session->set_flashdata('success', 'Data berhasil diedit');
            redirect('admin/laporan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diedit');
            redirect('admin/laporan');
        }
    }

    function delete_laporan($id_laporan)
    {
        if ($this->Model_crud->delete('laporan', ['id_laporan' => $id_laporan])) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('admin/laporan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('admin/laporan');
        }
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
                'href' => 'admin/bus',
                'icon' => 'fa-solid fa-bus-simple',
                'label' => 'Bus'
            ],
            [
                'href' => 'admin/kerusakan',
                'icon' => 'fa-solid fa-car-burst',
                'label' => 'Kerusakan'
            ],
            [
                'href' => 'admin/koridor',
                'icon' => 'fa-solid fa-square',
                'label' => 'Koridor'
            ],
            [
                'href' => 'admin/mekanik',
                'icon' => 'fa-solid fa-gear',
                'label' => 'Mekanik'
            ]
        ];
        $navs_laporan = [
            [
                'href' => 'admin/laporan',
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
