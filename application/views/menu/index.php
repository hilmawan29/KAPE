

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> 

                    <div class="row">
                    	<div class="col-lg-6">
                    		<?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>'); ?>
                    		<?= $this->session->flashdata('message'); ?>
                    		<a href="" class="btn btn-danger mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>
                    		<table class="table table-hover">
  								<thead>
  	  								<tr>
      								<th scope="col">#</th>
      								<th scope="col">Menu</th>
      								<th scope="col">Action</th>
    								</tr>
  								</thead>
  								<tbody>
  									<?php $i=1; ?>
  									<?php foreach ($menu as $m) : ?>
    								<tr>
      								<td scope="row"><?= $i; ?></td>
      								<td><?= $m['menu']; ?></td>
      								<td>
      									<a href= "<?= base_url('menu/editmenu/' . $m['id']); ?>" class="badge badge-success">edit</a>
      									<a href= "<?= base_url('menu/deletemenu/' . $m['id']); ?>" class="badge badge-danger" onclick="return confirm('Are you sure you want to delete this item?');">delete</a>
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

<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu'); ?>" method="post">
      <div class="modal-body">
          <div class="form-group">
    		 <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
  		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>