<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <?= form_open('admin/editpat/' . $patient['id']); ?>
    <div class="modal-body">
   
        <div class="form-group">
            <label for="check_in">Check In</label>
            <?php $exampleDate = $patient['check_in'];
            $newDate = date('Y-m-d\TH:i', strtotime($exampleDate)); ?>
            <input type="datetime-local" class="form-control" id="check_in" name="check_in" value="<?= $newDate; ?>">
            <?= form_error('check_in', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="check_out">Check Out</label>
            <input type="time" class="form-control" id="check_out" name="check_out" value="<?= $patient['check_out']; ?>">
            <?= form_error('check_out', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="diagnosis">Diagnosis</label>
            <textarea name="diagnosis" class="form-control" id="diagnosis" rows="5"><?= $patient['diagnosis']; ?></textarea>
            <?= form_error('diagnosis', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="drugs">Drugs</label>
            <textarea name="drugs" class="form-control" id="drugs"><?= $patient['drugs']; ?></textarea>
            <?= form_error('diagnosis', '<small class="text-danger pl-3">', '</small>'); ?>
    	</div>
    	<div class="form-group">
            <label for="conclusion">Conclusion</label>
            	<select class="form-control" id="conclusion" name="conclusion" value="<?= $patient['conclusion']; ?>">
             		<option value="">Select Conclusion</option>
             		<option value="Minta Obat">Minta Obat</option>
             		<option value="Istirahat Dulu">Istirahat Dulu</option>
             		<option value="Boleh Pulang">Boleh Pulang</option>
         		</select>
            <?= form_error('diagnosis', '<small class="text-danger pl-3">', '</small>'); ?>
    	</div>
    <button type="submit" class="btn btn-danger">Edit Patient</button>
    </form>
</div>