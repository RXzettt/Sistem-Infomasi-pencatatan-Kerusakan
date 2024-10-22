<!-- Begin Page Content -->
<main class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kerusakan</h1>

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
                        <th>Jenis Kerusakan</th>
                        <th class="text-center" style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_kerusakan as $kerusakan) : ?>
                        <tr>
                            <td><?= $kerusakan['jenis_kerusakan'] ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#editModal<?= $kerusakan['id_kerusakan'] ?>">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteModal<?= $kerusakan['id_kerusakan'] ?>">
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
                <?= form_open('Admin/create_kerusakan') ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="jenis_kerusakan" placeholder="Jenis Kerusakan" required>
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
    <?php foreach ($list_kerusakan as $kerusakan) : ?>
        <div class="modal fade" id="editModal<?= $kerusakan['id_kerusakan'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModal<?= $kerusakan['id_kerusakan'] ?>Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal<?= $kerusakan['id_kerusakan'] ?>Label">Edit Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <?= form_open('Admin/update_kerusakan/' . $kerusakan['id_kerusakan']) ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="jenis_kerusakan" value="<?= $kerusakan['jenis_kerusakan'] ?>" placeholder="Jenis Kerusakan" required>
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

        <div class="modal fade" id="deleteModal<?= $kerusakan['id_kerusakan'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal<?= $kerusakan['id_kerusakan'] ?>Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal<?= $kerusakan['id_kerusakan'] ?>Label">Delete Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                        <a href="<?= base_url('Admin/delete_kerusakan/' . $kerusakan['id_kerusakan']) ?>" class="btn btn-primary">Ya</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>

</main>
<!-- /.container-fluid -->