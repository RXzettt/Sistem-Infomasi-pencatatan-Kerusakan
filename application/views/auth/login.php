<main class="container">

    <!-- Outer Row -->
    <div class="row align-items-center justify-content-center" style="min-height: 100vh">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">

                    <!-- Nested Row within Card Body -->
                    <div class="row" style="height: 400px">
                        <div class="col-lg-7 d-none d-lg-block" style="background-image: url('https://images.bisnis.com/posts/2020/06/24/1257177/damri-1.jpg'); background-size: cover;"></div>
                        <div class="col-lg-5 align-self-center">
                            <div class="p-5">
                                <div class="text-center">
                                    <h2 class="text-gray-900 mb-4">Selamat Datang!</h2>
                                </div>
                                <?php if ($this->session->flashdata('error')) : ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?= $this->session->flashdata('error') ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif ?>
                                <?= form_open('Auth/login') ?>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>