<!-- Begin Page Content -->
<main class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Koridor</h1>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered w-100" id="dataTable">
                <thead>
                    <tr>
                        <th>Koridor</th>
                        <th>Nama Koridor</th>
                        <th>Total Bus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_koridor as $koridor) : ?>
                        <tr>
                            <td><?= $koridor['kode_koridor'] ?></td>
                            <td><?= $koridor['nama_koridor'] ?></td>
                            <td><?= $koridor['jumlah_bus'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</main>
<!-- /.container-fluid -->