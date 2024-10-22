<!-- Begin Page Content -->
<main class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Bus</h1>

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
            <table class="table table-bordered w-100" id="dataTable">
                <thead>
                    <tr>
                        <th>Nama Bus</th>
                        <th>Koridor</th>
                        <th class="text-center" style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_bus as $bus) : ?>
                        <tr>
                            <td><?= $bus['nama_bus'] ?></td>
                            <td><?= $bus['kode_koridor'] ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#editModal<?= $bus['id_bus'] ?>">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteModal<?= $bus['id_bus'] ?>">
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
                <?= form_open('Admin/create_bus') ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="nama_bus" placeholder="Nama Bus" required>
                    </div>
                    <div class="input-group">
                        <select class="custom-select" name="kode_koridor" required>
                            <option selected disabled value="">Pilih Koridor</option>
                            <?php foreach ($list_koridor as $koridor) : ?>
                                <option value="<?= $koridor['kode_koridor'] ?>">
                                    <?= $koridor['kode_koridor'] . ' - ' . $koridor['nama_koridor'] ?>
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
    <?php foreach ($list_bus as $bus) : ?>
        <div class="modal fade" id="editModal<?= $bus['id_bus'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModal<?= $bus['id_bus'] ?>Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal<?= $bus['id_bus'] ?>Label">Edit Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <?= form_open('Admin/update_bus/' . $bus['id_bus']) ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="nama_bus" value="<?= $bus['nama_bus'] ?>" placeholder="Nama Bus" required>
                        </div>
                        <div class="input-group">
                            <select class="custom-select" name="kode_koridor" required>
                                <option selected disabled value="">Pilih Koridor</option>
                                <?php foreach ($list_koridor as $koridor) :
                                    if ($bus['kode_koridor'] === $koridor['kode_koridor']) : ?>
                                        <option selected value="<?= $koridor['kode_koridor'] ?>">
                                            <?= $koridor['kode_koridor'] . ' - ' . $koridor['nama_koridor'] ?>
                                        </option>
                                    <?php else : ?>
                                        <option value="<?= $koridor['kode_koridor'] ?>">
                                            <?= $koridor['kode_koridor'] . ' - ' . $koridor['nama_koridor'] ?>
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

        <div class="modal fade" id="deleteModal<?= $bus['id_bus'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal<?= $bus['id_bus'] ?>Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal<?= $bus['id_bus'] ?>Label">Delete Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                        <a href="<?= base_url('Admin/delete_bus/' . $bus['id_bus']) ?>" class="btn btn-primary">Ya</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>

</main>
<!-- /.container-fluid -->