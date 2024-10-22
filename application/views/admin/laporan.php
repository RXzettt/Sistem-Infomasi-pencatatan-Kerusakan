<!-- Begin Page Content -->
<main class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan</h1>

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php elseif ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <button type="button" class="btn btn-outline-primary mb-3" data-toggle="modal" data-target="#tambahModal">Tambah Data</button>
            <table class="table table-bordered w-100" id="dataTableLaporan">
                <thead>
                    <tr>
                        <th>Nama Bus</th>
                        <th>Koridor</th>
                        <th>Jenis Kerusakan</th>
                        <th>Nama Mekanik</th>
                        <th class="text-center" style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_laporan as $laporan) : ?>
                        <tr>
                            <td><?= $laporan['nama_bus'] ?></td>
                            <td><?= $laporan['kode_koridor'] ?></td>
                            <td><?= $laporan['jenis_kerusakan'] ?></td>
                            <td><?= $laporan['nama_mekanik'] ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#editModal<?= $laporan['id_laporan'] ?>">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteModal<?= $laporan['id_laporan'] ?>">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tambah Modal-->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?= form_open('Admin/create_laporan') ?>
                <div class="modal-body">
                    <div class="input-group">
                        <select class="custom-select" name="id_bus" required>
                            <option selected disabled value="">Pilih Bus</option>
                            <?php foreach ($list_bus as $bus) : ?>
                                <option value="<?= $bus['id_bus'] ?>">
                                    <?= $bus['nama_bus'] . ' - ' . $bus['kode_koridor'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="input-group my-3">
                        <select class="custom-select" name="id_kerusakan" required>
                            <option selected disabled value="">Pilih Jenis Kerusakan</option>
                            <?php foreach ($list_kerusakan as $kerusakan) : ?>
                                <option value="<?= $kerusakan['id_kerusakan'] ?>">
                                    <?= $kerusakan['jenis_kerusakan'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="input-group">
                        <select class="custom-select" name="id_mekanik" required>
                            <option selected disabled value="">Pilih Mekanik</option>
                            <?php foreach ($list_mekanik as $mekanik) : ?>
                                <option value="<?= $mekanik['id_mekanik'] ?>">
                                    <?= $mekanik['nama_mekanik'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>

    <!-- Edit & Delete Modal-->
    <?php foreach ($list_laporan as $laporan) : ?>
        <div class="modal fade" id="editModal<?= $laporan['id_laporan'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModal<?= $laporan['id_laporan'] ?>Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal<?= $laporan['id_laporan'] ?>Label">Edit Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <?= form_open('Admin/update_laporan/' . $laporan['id_laporan']) ?>
                    <div class="modal-body">
                        <div class="input-group">
                            <select class="custom-select" name="id_bus" required>
                                <option selected disabled value="">Pilih Bus</option>
                                <?php foreach ($list_bus as $bus) :
                                    if ($laporan['id_bus'] === $bus['id_bus']) : ?>
                                        <option selected value="<?= $bus['id_bus'] ?>">
                                            <?= $bus['nama_bus'] . ' - ' . $bus['kode_koridor'] ?>
                                        </option>
                                    <?php else : ?>
                                        <option value="<?= $bus['id_bus'] ?>">
                                            <?= $bus['nama_bus'] . ' - ' . $bus['kode_koridor'] ?>
                                        </option>
                                <?php endif;
                                endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group my-3">
                            <select class="custom-select" name="id_kerusakan" required>
                                <option selected disabled value="">Pilih Jenis Kerusakan</option>
                                <?php foreach ($list_kerusakan as $kerusakan) :
                                    if ($laporan['id_kerusakan'] === $kerusakan['id_kerusakan']) : ?>
                                        <option selected value="<?= $kerusakan['id_kerusakan'] ?>">
                                            <?= $kerusakan['jenis_kerusakan'] ?>
                                        </option>
                                    <?php else : ?>
                                        <option value="<?= $kerusakan['id_kerusakan'] ?>">
                                            <?= $kerusakan['jenis_kerusakan'] ?>
                                        </option>
                                <?php endif;
                                endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <select class="custom-select" name="id_mekanik" required>
                                <option selected disabled value="">Pilih Mekanik</option>
                                <?php foreach ($list_mekanik as $mekanik) :
                                    if ($laporan['id_mekanik'] === $mekanik['id_mekanik']) : ?>
                                        <option selected value="<?= $mekanik['id_mekanik'] ?>">
                                            <?= $mekanik['nama_mekanik'] ?>
                                        </option>
                                    <?php else : ?>
                                        <option value="<?= $mekanik['id_mekanik'] ?>">
                                            <?= $mekanik['nama_mekanik'] ?>
                                        </option>
                                <?php endif;
                                endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                        <button class="btn btn-primary" type="submit">Edit</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteModal<?= $laporan['id_laporan'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal<?= $laporan['id_laporan'] ?>Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal<?= $laporan['id_laporan'] ?>Label">Delete Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                        <a href="<?= base_url('Admin/delete_laporan/' . $laporan['id_laporan']) ?>" class="btn btn-primary">Ya</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>

</main>
<!-- /.container-fluid -->