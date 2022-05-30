<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel = "stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <script src = "https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src = "https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <!-- <script src="<?= base_url('assets/'); ?>js/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <link href="<?= base_url('assets/'); ?>css/klinik.css" rel="stylesheet">
    <script type="text/javascript">
        $(document).ready( function () {
            var DataTable = $('#dataTable').length
            if (DataTable > 0) {
                $('#dataTable').DataTable({"columnDefs": [{ "targets": [0], "orderable": false }]});
            }
       
        } );
    </script>
     
    <!-- <script src="<?= base_url('assets/'); ?>js/moment.min.js"></script>
     
    <script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
     
    <script src="<?= base_url('assets/'); ?>js/bootstrap-datetimepicker.min.js"></script>
     
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap-datetimepicker.min.css">
     
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">
    <script type="text/javascript">
        $( document ).ready(function() {
            $(function () {
              $('.datetimepicker').datetimepicker();
            });
        })

    </script> -->
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">