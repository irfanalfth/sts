</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Create</b> Celline Pratiwi
  </div>
  <strong>Aplikasi Arsip Pajak &copy; Kota Metro</strong>
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url() ?>/template/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/template/bower_components/select22/dist/js/select.full.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>/template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url() ?>/template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>/template/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/template/dist/js/adminlte.min.js"></script>
<script src="<?= base_url() ?>/template/dist/js/filter.js"></script>
<script src="<?= base_url() ?>/template/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/template/dist/libs/apexcharts/dist/apexcharts.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/template/dist/js/demo.js"></script>
<!-- InputMask -->
<script src="<?= base_url(); ?>/template/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url(); ?>/template/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url(); ?>/template/input-mask/jquery.inputmask.extensions.js"></script>
<!-- datepicker -->
<script src="<?= base_url(); ?>/template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url(); ?>/template/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url(); ?>/template/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url(); ?>/template/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?= base_url(); ?>/template/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Chart script -->
<script src="<?= base_url(); ?>/template/bower_components/chart-js/chart.js"></script>
<script src="<?= base_url() ?>/template/bower_components/chart-js/Chart.min.js"></script>
<script src="<?= base_url(); ?>/template/bower_components/chart-js/loader.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="<?= base_url() ?>/template/dist/js/jquery.js"></script>
<script src="<?= base_url() ?>/template/dist/js/signature-pad.js"></script>
<!-- page script -->
<script>
  $(function() {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging': true,
      'lengthChange': true,
      'searching': true,
      'ordering': true,
      'info': true,
      'autoWidth': true
    })

    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })

    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    $('#datepickerLaporan').datepicker({
      autoclose: true
    })

  })
</script>

<script>
  window.setTimeout(function() {
    $('.alert').fadeTo(500, 0).slideUp(500, function() {
      $(this).remove();
    });
  }, 3000);
</script>

<script>
  function hanyaAngka(event) {
    var angka = (event.which) ? event.which : event.keyCode
    if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
      return false;
    return true;
  }
</script>

<script>
  /*digunakan untuk menyembunyikan form tanggal, bulan dan tahun saat halaman di load */
  $(document).ready(function() {

    $("#tanggalfilter").hide();
    $("#tahunfilter").hide();
    $("#bulanfilter").hide();
    $("#cardbayar").hide();

  });

  /*digunakan untuk menampilkan form tanggal, bulan dan tahun*/

  function prosesPeriode() {
    var periode = $("[name='periode']").val();

    if (periode == "tanggal") {
      $("#btnproses").hide();
      $("#tanggalfilter").show();
      $("[name='valnilai']").val('tanggal');

    } else if (periode == "bulan") {
      $("#btnproses").hide();
      $("[name='valnilai']").val('bulan');
      $("#bulanfilter").show();

    } else if (periode == "tahun") {
      $("#btnproses").hide();
      $("[name='valnilai']").val('tahun');
      $("#tahunfilter").show();
    }
  }

  /*digunakan untuk menytembunyikan form tanggal, bulan dan tahun*/

  function prosesReset() {
    $("#btnproses").show();

    $("#tanggalfilter").hide();
    $("#tahunfilter").hide();
    $("#bulanfilter").hide();
    $("#cardbayar").hide();

    $("#periode").val('');
    $("#tanggalawal").val('');
    $("#tanggalakhir").val('');
    $("#tahun1").val('');
    $("#bulanawal").val('');
    $("#bulanakhir").val('');
    $("#tahun2").val('');
    $("#targetbayar").empty();

  }
</script>

<script>
  $(document).ready(function() { // Ketika halaman selesai di load
    $('.input-tanggal').datepicker({
      dateFormat: 'mm-dd-yy' // Set format tanggalnya jadi yyyy-mm-dd
    });
    $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
    $('#filter').change(function() { // Ketika user memilih filter
      if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
        $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
        $('#form-tanggal').show(); // Tampilkan form tanggal
      } else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
        $('#form-tanggal').hide(); // Sembunyikan form tanggal
        $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
      } else { // Jika filternya 3 (per tahun)
        $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
        $('#form-tahun').show(); // Tampilkan form tahun
      }
      $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
    })
  })
</script>




</body>

</html>