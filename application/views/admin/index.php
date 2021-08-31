<?php $this->load->view('admin/header'); ?>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">               
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?= $t_user; ?></span></div>
                                            <div class="stat-heading">Peserta</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-like2"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?= $t_jawab; ?></span></div>
                                            <div class="stat-heading">Menjawab</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-portfolio"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?= $t_pekerjaan; ?></span></div>
                                            <div class="stat-heading">Pekerjaan</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Widgets -->
                <!--  Traffic  -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">SELAMAT DATANG DI APLIKASI PSIKOTES-KU </h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-body">
                                            <p align="justify" style="font-family:serif;font-size:20px;color:black">PAPI (Personality and Preference Inventory) adalah personality assessment atau alat tes penilaian kepribadian terkemuka yang digunakan oleh para profesional HR (Human Resource) dan manajer terkait untuk mengevaluasi perilaku dan gaya kerja individu pada semua tingkatan. Personality and Preference Inventory (PAPI) dibuat oleh Guru Besar Psikologi Industri dari Massachusetts, Amerika, yang bernama Dr. Max Martin Kostick pada awal tahun 1960-an. Versi Swedia lebih dulu diperkenalkan di awal 1980-an dan versi ini diperkenalkan pada tahun 1997 dengan versi ipsatif (PAPI-I) dan normatif (PAPI-N). Versi ipsatif, PAPI-I, dirancang untuk digunakan untuk pengembangan pribadi, sedangkan versi normatif, PAPI-N, yang dimaksudkan untuk digunakan untuk perbandingan dan seleksi. Dasar pemikiran untuk desain dan formulasi PAPI didasarkan pada penelitian dan teori kepribadian “needs-press” oleh Murray (1938).</p>
                                    </div>
                                </div>

                            </div> <!-- /.row -->

                            <div class="card-body"></div>
                            <div class="card-body"></div>
                            <div class="card-body"></div>
                        </div>

                    </div><!-- /# column -->
                </div>
            <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
<?php $this->load->view('admin/footer'); ?>

</body>
</html>
