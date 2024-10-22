<!-- Begin Page Content -->
<main class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Koridor</h1>

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
                        <th>Koridor</th>
                        <th>Nama Koridor</th>
                        <th>Total Bus</th>
                        <th class="text-center" style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_koridor as $koridor) : ?>
                        <tr>
                            <td><?= $koridor['kode_koridor'] ?></td>
                            <td><?= $koridor['nama_koridor'] ?></td>
                            <td><?= $koridor['jumlah_bus'] ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#editModal<?= $koridor['id_koridor'] ?>">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteModal<?= $koridor['id_koridor'] ?>">
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
                <?= form_open('Admin/create_koridor') ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="kode_koridor" placeholder="Koridor" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="nama_koridor" placeholder="Nama Koridor" required>
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
    <?php foreach ($list_koridor as $koridor) : ?>
        <div class="modal fade" id="editModal<?= $koridor['id_koridor'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModal<?= $koridor['id_koridor'] ?>Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal<?= $koridor['id_koridor'] ?>Label">Edit Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <?= form_open('Admin/update_koridor/' . $koridor['id_koridor']) ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="kode_koridor" value="<?= $koridor['kode_koridor'] ?>" placeholder="Kode Koridor" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="nama_koridor" value="<?= $koridor['nama_koridor'] ?>" placeholder="Nama Koridor" required>
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

        <div class="modal fade" id="deleteModal<?= $koridor['id_koridor'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal<?= $koridor['id_koridor'] ?>Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal<?= $koridor['id_koridor'] ?>Label">Delete Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                        <a href="<?= base_url('Admin/delete_koridor/' . $koridor['id_koridor']) ?>" class="btn btn-primary">Ya</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>

</main>
<!-- /.container-fluid -->