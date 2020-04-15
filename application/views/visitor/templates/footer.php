			<!-- footer area container -->
			<div class="footer-area bg-dark text-gray">
				<!-- page footer -->
				<footer id="page-footer" class="font-lato">
					<div class="container">
						<div class="row holder">
							<div class="col-xs-12 col-sm-12">
								<p><a href="#">Research Academy</a> | &copy; 2020 <a href="#">Indonesia</a>, All rights reserved</p>
							</div>
						</div>
					</div>
				</footer>
			</div>
			<!-- back top of the page -->
			<span id="back-top" class="text-center fa fa-caret-up"></span>
			<!-- loader of the page -->
			<div id="loader" class="loader-holder">
				<div class="block"><img src="<?= base_url(); ?>assets/visitor/images/svg/hearts.svg" width="100" alt="loader"></div>
			</div>
			</div>

			<script>
				// Format Rupiah
				function formatRupiah(angka, prefix) {
					var number_string = angka.replace(/[^,\d]/g, '').toString(),
						split = number_string.split(','),
						sisa = split[0].length % 3,
						rupiah = split[0].substr(0, sisa),
						ribuan = split[0].substr(sisa).match(/\d{3}/gi);

					// tambahkan titik jika yang di input sudah menjadi angka ribuan
					if (ribuan) {
						separator = sisa ? '.' : '';
						rupiah += separator + ribuan.join('.');
					}

					rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
					return prefix == undefined ? rupiah : (rupiah ? prefix + ' ' + rupiah : '');
				}
			</script>

			<!-- include jQuery -->
			<script src="<?= base_url(); ?>assets/visitor/js/plugins.js"></script>
			<!-- include jQuery -->
			<script src="<?= base_url(); ?>assets/visitor/js/jquery.main.js"></script>
			<!-- include jQuery -->
			<script type="text/javascript" src="<?= base_url(); ?>assets/visitor/js/init.js"></script>
			</body>

			</html>