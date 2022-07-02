<div class="container-fluid">
 
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <?= form_open('admin/editpat/' . $patient['id']); ?>
    <div class="modal-body">
   
        <div class="form-group">
            <label for="check_in">Jam Masuk</label>
            <?php $exampleDate = $patient['check_in'];
            $newDate = date('Y-m-d\TH:i', strtotime($exampleDate)); ?>
            <input type="datetime-local" class="form-control" id="check_in" name="check_in" value="<?= $newDate; ?>">
            <?= form_error('check_in', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="check_out">Jam Keluar</label>
            <input type="time" class="form-control" id="check_out" name="check_out" value="<?= $patient['check_out']; ?>">
            <?= form_error('check_out', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="jenis_sakit">Sakit yang dialami</label>
                <select class="form-control" id="jenis_sakit" name="jenis_sakit">
                     <option value="">Jenis Sakit</option>
                     <option <?php if($patient ['jenis_sakit'] == "Flu"){ echo "selected='selected'";} ?> value="Flu">Flu </option>
                     <option <?php if($patient ['jenis_sakit'] == "Demam"){ echo "selected='selected'";} ?> value="Demam">Demam</option>
                     <option <?php if($patient ['jenis_sakit'] == "Batuk"){ echo "selected='selected'";} ?> value="Batuk">Batuk</option>
                     <option <?php if($patient ['jenis_sakit'] == "Sakit Kepala"){ echo "selected='selected'";} ?> value="Sakit Kepala">Sakit Kepala</option>
                     <option <?php if($patient ['jenis_sakit'] == "Sakit Gigi"){ echo "selected='selected'";} ?> value="Sakit Gigi">Sakit Gigi</option>
                     <option <?php if($patient ['jenis_sakit'] == "Teriris"){ echo "selected='selected'";} ?> value="Teriris">Teriris</option>
                     <option <?php if($patient ['jenis_sakit'] == "Mual"){ echo "selected='selected'";} ?> value="Mual">Mual</option>
                     <option <?php if($patient ['jenis_sakit'] == "Panas Dalam"){ echo "selected='selected'";} ?> value="Panas Dalam">Panas Dalam</option>
                     <option <?php if($patient ['jenis_sakit'] == "Magh"){ echo "selected='selected'";} ?> value="Magh">Magh</option>
                     <option <?php if($patient ['jenis_sakit'] == "Magh Kronis"){ echo "selected='selected'";} ?> value="Magh Kronis">Magh Kronis</option>
                     <option <?php if($patient ['jenis_sakit'] == "Sakit Haid"){ echo "selected='selected'";} ?> value="Sakit Haid">Sakit Haid</option>
                     <option <?php if($patient ['jenis_sakit'] == "Covid-19"){ echo "selected='selected'";} ?> value="Covid-19">Covid-19</option>
                     <option <?php if($patient ['jenis_sakit'] == "Bisul"){ echo "selected='selected'";} ?> value="Bisul">Bisul</option>
                     <option <?php if($patient ['jenis_sakit'] == "ISPA"){ echo "selected='selected'";} ?> value="ISPA">ISPA</option>
                     <option <?php if($patient ['jenis_sakit'] == "Kurang Darah"){ echo "selected='selected'";} ?> value="Kurang Darah">Kurang Darah</option>
                     <option <?php if($patient ['jenis_sakit'] == "Diare"){ echo "selected='selected'";} ?> value="Diare">Diare</option>
                     <option <?php if($patient ['jenis_sakit'] == "Edema"){ echo "selected='selected'";} ?> value="Edema">Edema</option>
                     <option <?php if($patient ['jenis_sakit'] == "Sariawan"){ echo "selected='selected'";} ?> value="Sariawan">Sariawan</option>
                     <option <?php if($patient ['jenis_sakit'] == "Asam Urat"){ echo "selected='selected'";} ?> value="Asam Urat">Asam Urat</option>
                     <option <?php if($patient ['jenis_sakit'] == "Kolesterol"){ echo "selected='selected'";} ?> value="Kolesterol">Kolesterol</option>
                     <option <?php if($patient ['jenis_sakit'] == "Pegal-Pegal"){ echo "selected='selected'";} ?> value="Pegal-Pegal">Pegal-Pegal</option>
                     <option <?php if($patient ['jenis_sakit'] == "Susah BAB"){ echo "selected='selected'";} ?> value="Susah BAB">Susah BAB</option>
                     <option <?php if($patient ['jenis_sakit'] == "Gatal-Gatal"){ echo "selected='selected'";} ?> value="Gatal-Gatal">Gatal-Gatal</option>
                     <option <?php if($patient ['jenis_sakit'] == "Darah Tinggi"){ echo "selected='selected'";} ?> value="Darah Tinggi">Darah Tinggi</option>
                     <option <?php if($patient ['jenis_sakit'] == "Wasir"){ echo "selected='selected'";} ?> value="Wasir">Wasir</option>
                     <option <?php if($patient ['jenis_sakit'] == "Sakit Mata"){ echo "selected='selected'";} ?> value="Sakit Mata">Sakit Mata</option>
                     <option <?php if($patient ['jenis_sakit'] == "Lemas"){ echo "selected='selected'";} ?> value="Lemas">Lemas</option>
                     <option <?php if($patient ['jenis_sakit'] == "Infeksi Saluran Kemih"){ echo "selected='selected'";} ?> value="Infeksi Saluran Kemih">Infeksi Saluran Kemih</option>
                     <option <?php if($patient ['jenis_sakit'] == "Vertigo"){ echo "selected='selected'";} ?> value="Vertigo">Vertigo</option>
                </select>
            <?= form_error('jenis_sakit', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="diagnosis">Observasi Pasien</label>
            <textarea name="diagnosis" class="form-control" id="diagnosis" rows="5"><?= $patient['diagnosis']; ?></textarea>
            <?= form_error('diagnosis', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="drugs">Obat yang direkomendasikan</label>
            <textarea name="drugs" class="form-control" id="drugs"><?= $patient['drugs']; ?></textarea>
            <?= form_error('drugs', '<small class="text-danger pl-3">', '</small>'); ?>
    	</div>
    	<div class="form-group" id="conclusion">
        <label>Conclusion : </label>
         <input type="hidden" name="conclusion" value="<?= $patient['conclusion']; ?>">
         <label id="text"><?= $patient['conclusion']; ?></label>
      </div>
    <button type="submit" class="btn btn-danger">Update Patient Data</button>
    </form>
</div>

<!-- Javascript -->
<script type="text/javascript">
    $("#jenis_sakit").on('change', function(e){
        var jenis_sakit = $(this).val();
        if (jenis_sakit == 'Flu') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Demam') {
            var conclusion = 'Istirahat Dulu';
        }else if (jenis_sakit == 'Covid-19') {
            var conclusion = 'Harus Pulang';
        }else if (jenis_sakit == 'Batuk') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Sakit Kepala') {
            var conclusion = 'Istirahat Dulu';
        }else if (jenis_sakit == 'Sakit Gigi') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Teriris') {
            var conclusion = 'Istirahat Dulu';
        }else if (jenis_sakit == 'Mual') {
            var conclusion = 'Istirahat Dulu';
        }else if (jenis_sakit == 'Panas Dalam') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Magh') {
            var conclusion = 'Istirahat Dulu';
        }else if (jenis_sakit == 'Magh Kronis') {
            var conclusion = 'Harus Pulang';
        }else if (jenis_sakit == 'Sakit Haid') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Bisul') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'ISPA') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Bisul') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Hipotensi') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Diare') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Edema') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Sariawan') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Asam Urat') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Kolesterol') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Pegal-Pegal') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Susah BAB') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Gatal-Gatal') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Darah Tinggi') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Wasir') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Bisul') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Sakit Mata') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Lemas') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Infeksi Saluran Kemih') {
            var conclusion = 'Beri Obat';
        }else if (jenis_sakit == 'Vertigo') {
            var conclusion = 'Istirahat Dulu';
        }
        $("#conclusion").find("input").val(conclusion);
        $("#conclusion").find("label#text").html(conclusion);

    });
</script>