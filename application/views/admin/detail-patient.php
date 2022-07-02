<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- <?= $this->session->flashdata('message'); ?> -->
    
    <div class="modal-body">
        <div class="row">
        <div class="col-md-3,5">
        <?php if ($employee->foto !='') {
                echo "<img src=".base_url("upload/".$employee->foto)." width='350' height='500'>";
        } ?>
        </div>
        <div class="col-md-7">
        <div class="form-group">
            <label for="title">Nama Karyawan</label>
            <div> <?= $employee->name; ?></div>
        </div>
        <div class="form-group">
            <label for="department">Departemen</label>
            <div> <?= $employee->department; ?></div>
        </div>
        <div class="form-group">
            <label for="age">Umur</label>
            <div> <?= $employee->age; ?></div>
        </div>
        <div class="form-group">
            <label for="nik">NIK</label>
            <div> <?= $employee->nik; ?></div>
        </div>
        </div>
        </div>
        <div class="form-group">
            <label for="check_in">Tanggal | Jam Masuk</label>
            <?php $exampleDate = $patient['check_in'];
            $newDate = date('Y-m-d\ | H:i', strtotime($exampleDate)); ?>
            <div> <?= $newDate; ?></div>
        </div>
        <div class="form-group">
            <label for="check_out">Jam Keluar</label>
            <div> <?= $patient['check_out']; ?> </div>
        </div>
        <div class="form-group">
            <label for="diagnosis">Observasi Pasien</label>
            <div> <?= $patient['diagnosis']; ?></div>
        </div>
        <div class="form-group">
            <label for="drugs">Obat Yang Direkomendasikan</label>
            <div> <?= $patient['drugs']; ?></div>
    	</div>
    	<div class="form-group">
            <label for="conclusion">Conclusion</label>
            	<div> <?= $patient['conclusion']; ?></div>
    	</div>
        <a class="btn btn-danger" href="<?= base_url('admin/inputData'); ?>">Back</a>
    </form>
</div>