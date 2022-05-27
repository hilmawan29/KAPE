 

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> 

    <div class="row">
    	<div class="col-lg">
    		<?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>'); ?>
    		<?= $this->session->flashdata('message'); ?>
    		<a href="" class="btn btn-danger mb-3" data-toggle="modal" data-target="#newInputDataModal1">Add New Data</a>
    		<table class="table table-hover" id="dataTable">
					<thead>
						<tr>
						<th scope="col">#</th>
						<th scope="col">Date</th>
						<th scope="col">Name</th>
						<th scope="col">Department</th>
						<th scope="col">Diagnosis</th>
						<th scope="col">Drugs</th>
						<th scope="col">Conclusion</th>
                    <th scope="col">Action</th>
                    </tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($patients as $p) : ?>
					<tr>
							<td scope="row"><?= $i; ?></td>
							<td><?= date('d F Y | H:i', strtotime($p['check_in'])) . ' - '. date('H:i', strtotime($p['check_out'])); ?></td>
							<td><?= $p['name']; ?></td>
							<td><?= $p['department']; ?></td>
							<td><?= myTruncate2($p['diagnosis'], 10); ?></td>
							<td><?= myTruncate2($p['drugs'], 10); ?></td>
                            <td><?= $p['conclusion']; ?></td>
							<td>
								<a href= "<?= base_url('admin/editpat/') . $p['id']; ?>" class="badge badge-success">edit</a>
								<a href= "<?= base_url('admin/deletepat/') . $p['id']; ?>" class="badge badge-danger" onclick="return confirm('Are you sure you want to delete this item?');">delete</a>
                                <a href= "<?= base_url('admin/detailpat/') . $p['id']; ?>" class="badge badge-warning">detail</a>
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

<!-- Modal 1 -->
<div class="modal fade" id="newInputDataModal1" tabindex="-1" role="dialog" aria-labelledby="newInputDataModal" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="newInputDataModalLabel1">Add New Data</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <form action="<?= base_url('admin/add_data'); ?>" method="post" id="identitas">
  <div class="modal-body">
      <div class="form-group">
         <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK">
      </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-danger" id="button-next">Next</button>
  </div>
  </form>
</div>
</div>
</div>

<!-- MODAL 2 -->
<div class="modal fade" id="newInputDataModal" tabindex="-1" role="dialog" aria-labelledby="newInputDataModal" aria-hidden="true" style="overflow-y: auto;">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="newInputDataModalLabel">Add New Data</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <form action="<?= base_url('admin/add_data'); ?>" method="post">
  <div class="modal-body">
     <div class="form-group">
        <div class="form-group">
            <label>Name : </label>
            <label id="name" class="text-capitalize"></label>
        </div>
         <div class="form-group">
             <label>Department : </label>
             <label id="department"></label>
         </div>
         <div class="form-group">
             <label>Age : </label>
             <label id="age"></label>
         </div>
         <div class="form-group">
             <label>NIK : </label>
             <label id="data-nik"></label>
         </div>
         <input type="hidden" name="employee_id" id="employee_id">
     </div>
      <div class="form-group">
            <input type="datetime-local" class="form-control" id="check_in" name="check_in">
      </div>
      <div class="form-group">
         <input type="time" class="form-control" id="check_out" name="check_out" placeholder="Check out">
      </div>
      <div class="form-group">
          <select class="form-control" id="jenis_sakit" name="jenis_sakit">
             <option value="">Jenis Sakit</option>
             <option value="Flu">Flu </option>
             <option value="Demam">Demam</option>
             <option value="Covid-19">Covid-19</option>
          </select>
      </div>
      <div class="form-group">
         <textarea name="diagnosis" class="form-control" id="diagnosis" rows="5" placeholder="Diagnosis"></textarea>
      </div>
       <div class="form-group">
         <textarea name="drugs" class="form-control" id="drugs" placeholder="Drugs"></textarea>
      </div>
       <div class="form-group" id="conclusion">
        <label>Conclusion : </label>
         <input type="hidden" name="conclusion">
         <label id="text"></label>
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

<!-- Script -->
<script type="text/javascript">
    $("#jenis_sakit").on('change', function(e){
        var jenis_sakit = $(this).val();
        if (jenis_sakit == 'Flu') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Demam') {
            var conclusion = 'Istirahat Dulu';
        }else if (jenis_sakit == 'Covid-19') {
            var conclusion = 'Harus Pulang';
        }
        $("#conclusion").find("input").val(conclusion);
        $("#conclusion").find("label#text").html(conclusion);

    });

    $("#button-next").on('click', function(e){
        e.preventDefault();
        var nik = $("#nik").val();
        $.ajax({
          method: "POST",
          url: "<?= base_url("Admin/get_employee"); ?>",
          data: { nik: nik }
        })
          .done(function( result ) {
            if (result == 'null'){
                alert( "Data Karyawan Tidak Ada ");
            }else{
                data = $.parseJSON(result);
                $("#name").html(data.name);
                $("#department").html(data.department);
                $("#age").html(data.age+" thn");
                $("#data-nik").html(data.nik);
                $("#employee_id").val(data.id);
                $('#newInputDataModal').modal('show');
                $('#newInputDataModal1').modal('hide');
            }
          });
    });
</script>