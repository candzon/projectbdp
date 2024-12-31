<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- Popper.js (untuk Bootstrap 4) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<!-- Bootstrap core JavaScript-->
 <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
 <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

 <!-- Page level plugins -->
 <script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

 <!-- Page level custom scripts -->

 <script src="<?php echo base_url() ?>assets/alert/sweetalert2.all.min.js"></script>
 <script src="<?php echo base_url() ?>assets/sweetalert/sweetalert.min.js"></script>
 <script src="<?php echo base_url() ?>assets/sweetalert/sweetalert-dev.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <script>
 	$('#pilih_karyawan').select2({
 		placeholder: "Pilih Karyawan"
 	});
 </script>
 <script>
 	$('#pilih_alamat').select2({
 		placeholder: "Pilih Kantor"
 	});
 </script>
 <script>
 	$('#pilih_vendor').select2({
 		placeholder: "Pilih Vendor Kendaraan"
 	});
 </script>
 <script>
	function showConfirmation(className, title, windowLocation) {
		$('.' + className).click(function() {
			swal({
				title: title,
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#FF0000",
				cancelButtonColor: "#d33",
				confirmButtonText: "Ya",
			}, function() {
				window.location = windowLocation;
			});
		});
	}
 </script>
 
 </body>

 </html>