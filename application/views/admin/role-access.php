

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                    	<div class="col-lg-6">

                    		<?= $this->session->flashdata('message'); ?>
                            <h5>Role : <?= $role['role']; ?></h5>
                    		<table class="table table-hover"> 
  								<thead>
  	  								<tr>
      								<th scope="col">#</th>
      								<th scope="col">Menu</th>
      								<th scope="col">Access</th>
    								</tr>
  								</thead>
  								<tbody>
  									<?php $i=1; ?>
  									<?php foreach ($menu as $m) : ?>
    								<tr>
      								<td scope="row"><?= $i; ?></td>
      								<td><?= $m['menu']; ?></td>
      								<td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id'] ?>" data-menu="<?= $m['id'] ?>">
                                        </div>
      								</td> 
    								</tr>
    								<?php $i++; ?>
    								<?php endforeach; ?>
  								</tbody>
								</table>
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

