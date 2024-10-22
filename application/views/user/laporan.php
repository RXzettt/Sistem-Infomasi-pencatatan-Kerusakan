<!-- Begin Page Content -->
<main class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan</h1>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered w-100" id="dataTableLaporan">
                <thead>
                    <tr>
                        <th>Nama Bus</th>
                        <th>Koridor</th>
                        <th>Jenis Kerusakan</th>
                        <th>Nama Mekanik</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_laporan as $laporan) : ?>
                        <tr>
                            <td><?= $laporan['nama_bus'] ?></td>
                            <td><?= $laporan['kode_koridor'] ?></td>
                            <td><?= $laporan['jenis_kerusakan'] ?></td>
                            <td><?= $laporan['nama_mekanik'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</main>
<!-- /.container-fluid -->