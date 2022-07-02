

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-12">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 style="float: left;" class="m-0 font-weight-bold text-primary">Visitor Grafik</h6>
                                    <div style="float: right;">
                                        <label>Select Month</label>
                                        <input type="month" id="label" name="label" value="<?= $this->input->get('label')?>"> 
                                    </div>
                                    <div style="clear: both;"></div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <?php $labels = ''; ?>
                                        <?php $total = ''; ?>
                                        <?php foreach ($dashboard as $d) : ?>
                                            <?php $labels .= $d['conclusion'].','; ?>
                                            <?php $total .= $d['total'].','; ?>
                                        <?php endforeach; ?>
                                        <canvas id="myPieChart" data-labels="<?= $labels ?>" data-total="<?= $total ?>"></canvas>
                                    </div>

                                    <div style="text-align: center;margin-top: 50px;"> 
                                    Grafik in Month <b>PT. Yakjin Jaya Indonesia 2</b>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>js/Chart.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>js/pie-chart.js"></script>
    <script>
        $("#label").on('change', function(e){
        var label = $("#label").val();
        if (label != ''){
            window.location.href = "admin?label="+label
        }
    })
    </script>

