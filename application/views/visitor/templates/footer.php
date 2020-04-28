			<!-- footer area container -->
			<div class="footer-area bg-dark text-gray">
				<!-- page footer -->
				<aside class="aside container">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-3 col">
							<div class="logo">
								<a href="<?= base_url('visitor') ?>">
									<img src="<?= base_url(); ?>assets/visitor/images/logo-research-academy.png" style="width: 100%" alt="studylms">
								</a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col">
							<h3>about us</h3>
							<p>
								Research-academy.org is an online forum for conducting an international network of multidisciplinary scientific research, publishing and training to solve society and universal problems through human-spiritual-religious values-based innovations.These values will build unity between all ethnicities, nationalities, cultures and religions, because humility will be triggered by realizing each other's differences.
							</p>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col">
							<h3>contact us</h3>
							<p>If you want to contact us about any issue our support available to help you 8am-7pm Monday to saturday.</p>
							<!-- ft address -->
							<address class="ft-address">
								<dl>
									<dt><span class="fas fa-map-marker"><span class="sr-only">marker</span></span></dt>
									<dd>Address: 9015 Sunset Boulevard United Kingdom</dd>
									<dt><span class="fas fa-phone-square"><span class="sr-only">phone</span></span></dt>
									<dd>Call: <a href="tel:+2156237532">+ 215 623 7532</a></dd>
									<dt><span class="fas fa-envelope-square"><span class="sr-only">email</span></span></dt>
									<dd>Email: <a href="mailto:info@Studylms.com">info@Studylms.com</a></dd>
								</dl>
							</address>
						</div>
					</div>
				</aside>
				<footer id="page-footer" class="font-lato">
					<div class="container">
						<div class="row holder">
							<div class="col-xs-12 col-sm-push-6 col-sm-6">
								<ul class="socail-networks list-unstyled">
									<li><a href="#"><span class="fab fa-facebook"></span></a></li>
									<li><a href="#"><span class="fab fa-twitter"></span></a></li>
									<li><a href="#"><span class="fab fa-instagram"></span></a></li>
									<li><a href="#"><span class="fab fa-linkedin"></span></a></li>
								</ul>
							</div>
							<div class="col-xs-12 col-sm-pull-6 col-sm-6">
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