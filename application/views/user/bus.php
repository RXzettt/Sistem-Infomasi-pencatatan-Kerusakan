<!-- Begin Page Content -->
<main class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Bus</h1>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered w-100" id="dataTable">
                <thead>
                    <tr>
                        <th>Nama Bus</th>
                        <th>Koridor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_bus as $bus) : ?>
                        <tr>
                            <td><?= $bus['nama_bus'] ?></td>
                            <td><?= $bus['kode_koridor'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</main>
<!-- /.container-fluid -->