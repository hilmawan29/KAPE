<!-- Begin Page Content -->
<div class="container-fluid"> 

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('admin/editemployee/' . $employee['id']); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <!-- <label for="email" class="col-sm-2 col-form-label">Employee data</label> -->
                <div class="form-group">
            <input type="file" class="form-control" id="foto" name="foto" placeholder="Choose File" value="<?= $employee['foto']; ?>">
            <?php if ($employee['foto'] !='') {
                echo "<img src=".base_url("upload/".$employee['foto'])." width='100' height='60'>";
            } ?>
            </div>
                <div class="form-group">
                    <label for="title">Employee Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $employee['name']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <select name="department" id="department" class="form-control">
                        <option value="">Select Department</option>
                        <option <?php if($employee['department'] == 'Accounting'){ echo "selected='selected'";} ?> value="Accounting">Accounting</option>
                        <option <?php if($employee['department'] == 'Compliance'){ echo "selected='selected'";} ?> value="Compliance">Compliance</option>
                        <option <?php if($employee['department'] == 'Accounting'){ echo "selected='selected'";} ?> value="HRD">HRD</option>
                        <option <?php if($employee['department'] == 'Receptionist'){ echo "selected='selected'";} ?> value="Receptionist">Receptionist</option>
                        <option <?php if($employee['department'] == 'Payroll'){ echo "selected='selected'";} ?> value="Payroll">Payroll</option>
                        <option <?php if($employee['department'] == 'Accounting'){ echo "selected='selected'";} ?> value="IT">IT</option>
                        <option <?php if($employee['department'] == 'Marketing'){ echo "selected='selected'";} ?> value="Marketing">Marketing</option>
                        <option <?php if($employee['department'] == 'PPIC'){ echo "selected='selected'";} ?> value="PPIC">PPIC</option>
                        <option <?php if($employee['department'] == 'MD'){ echo "selected='selected'";} ?> value="MD">MD</option>
                        <option <?php if($employee['department'] == 'EXIM'){ echo "selected='selected'";} ?> value="EXIM">EXIM</option>
                        <option <?php if($employee['department'] == 'FKR'){ echo "selected='selected'";} ?> value="FKR">FKR</option>
                        <option <?php if($employee['department'] == 'DA'){ echo "selected='selected'";} ?> value="DA">DA</option>
                        <option <?php if($employee['department'] == 'QA'){ echo "selected='selected'";} ?> value="QA">QA</option>
                        <option <?php if($employee['department'] == 'QC'){ echo "selected='selected'";} ?> value="QC">QC</option>
                        <option <?php if($employee['department'] == 'LAB'){ echo "selected='selected'";} ?> value="LAB">LAB</option>
                        <option <?php if($employee['department'] == 'Product Safety'){ echo "selected='selected'";} ?> value="Product Safety">Product Safety</option>
                        <option <?php if($employee['department'] == 'Heatseal'){ echo "selected='selected'";} ?> value="Heatseal">Heatseal</option>
                        <option <?php if($employee['department'] == 'Pattern'){ echo "selected='selected'";} ?> value="Pattern">Pattern</option>
                        <option <?php if($employee['department'] == 'Sample'){ echo "selected='selected'";} ?> value="Sample">Sample</option>
                        <option <?php if($employee['department'] == 'Mechanict'){ echo "selected='selected'";} ?> value="Mechanict">Mechanict</option>
                        <option <?php if($employee['department'] == 'Security'){ echo "selected='selected'";} ?> value="Security">Security</option>
                        <option <?php if($employee['department'] == 'Manager Production'){ echo "selected='selected'";} ?> value="Manager Production">Manager Production</option>
                        <option <?php if($employee['department'] == 'Gudang'){ echo "selected='selected'";} ?> value="Gudang">Gudang</option>
                        <option <?php if($employee['department'] == 'Cutting'){ echo "selected='selected'";} ?> value="Cutting">Cutting</option>
                        <option <?php if($employee['department'] == 'Chiev Sewing'){ echo "selected='selected'";} ?> value="Chiev Sewing">Chiev Sewing</option>
                        <optgroup label="Sewing">
                            <option <?php if($employee['department'] == 'Line 1'){ echo "selected='selected'";} ?> value="Line 1">Line 1</option>
                            <option <?php if($employee['department'] == 'Line 2'){ echo "selected='selected'";} ?> value="Line 2">Line 2</option>
                            <option <?php if($employee['department'] == 'Line 3'){ echo "selected='selected'";} ?> value="Line 3">Line 3</option>
                            <option <?php if($employee['department'] == 'Line 5'){ echo "selected='selected'";} ?> value="Line 5">Line 5</option>
                            <option <?php if($employee['department'] == 'Line 6'){ echo "selected='selected'";} ?> value="Line 6">Line 6</option>
                            <option <?php if($employee['department'] == 'Line 7'){ echo "selected='selected'";} ?> value="Line 7">Line 7</option>
                            <option <?php if($employee['department'] == 'Line 8'){ echo "selected='selected'";} ?> value="Line 8">Line 8</option>
                            <option <?php if($employee['department'] == 'Line 9'){ echo "selected='selected'";} ?> value="Line 9">Line 9</option>
                            <option <?php if($employee['department'] == 'Line 10'){ echo "selected='selected'";} ?> value="Line 10">Line 10</option>
                            <option <?php if($employee['department'] == 'Line 11'){ echo "selected='selected'";} ?> value="Line 11">Line 11</option>
                            <option <?php if($employee['department'] == 'Line 12'){ echo "selected='selected'";} ?> value="Line 12">Line 12</option>
                            <option <?php if($employee['department'] == 'Line 13'){ echo "selected='selected'";} ?> value="Line 13">Line 13</option>
                            <option <?php if($employee['department'] == 'Line 15'){ echo "selected='selected'";} ?> value="Line 15">Line 15</option>
                            <option <?php if($employee['department'] == 'Line 16'){ echo "selected='selected'";} ?> value="Line 16">Line 16</option>
                            <option <?php if($employee['department'] == 'Line 17'){ echo "selected='selected'";} ?> value="Line 17">Line 17</option>
                            <option <?php if($employee['department'] == 'Line 18'){ echo "selected='selected'";} ?> value="Line 18">Line 18</option>
                            <option <?php if($employee['department'] == 'Line 19'){ echo "selected='selected'";} ?> value="Line 19">Line 19</option>
                            <option <?php if($employee['department'] == 'Line 20'){ echo "selected='selected'";} ?> value="Line 20">Line 20</option>
                        </optgroup>
                        <option <?php if($employee['department'] == 'Accounting'){ echo "selected='selected'";} ?> value="Iron">Iron</option>
                        <option <?php if($employee['department'] == 'Accounting'){ echo "selected='selected'";} ?> value="Packing">Packing</option>
                    </select>
                    <?= form_error('department', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="age">Age Employee</label>
                    <input type="text" class="form-control" id="age" name="age" value="<?= $employee['age']; ?>">
                    <?= form_error('age', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="<?= $employee['nik']; ?>">
                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
            <button type="submit" class="btn btn-danger">Edit Employee Data</button>
            </form>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->