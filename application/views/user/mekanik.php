<!-- Begin Page Content -->
<main class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Mekanik</h1>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered w-100" id="dataTable">
                <thead>
                    <tr>
                        <th>Nama Mekanik</th>
                        <th>Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_mekanik as $mekanik) : ?>
                        <tr>
                            <td><?= $mekanik['nama_mekanik'] ?></td>
                            <td><?= $mekanik['jabatan'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</main>
<!-- /.container-fluid -->