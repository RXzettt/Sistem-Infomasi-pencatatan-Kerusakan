<!-- Begin Page Content -->
<main class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Bus
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_bus ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-bus-simple fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Kategori Kerusakan
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_kerusakan ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-car-burst fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Jumlah Koridor
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_koridor ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-square fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Mekanik
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_mekanik ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-gear fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<!-- /.container-fluid -->