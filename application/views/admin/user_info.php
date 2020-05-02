<!DOCTYPE html>
<html lang="en">

<head>

	<?php
	$this->load->helper(array('form', 'url'));

	$this->load->view('admin/layouts/header');

	$this->load->view('admin/layouts/csshandler');
	?>

	<!-- GC -->
	<script src="<?= base_url(); ?>assets/global-constant.js"></script>
	<!-- end GC -->
	<script src="https://cdn.tiny.cloud/1/vnw3o6opijpb6yswvn2ryuglqqc3hgdzwc7y980ch1io0w32/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
		tinymce.init({
			selector: '#biography',
			menubar: false
		});
	</script>


</head>

<body class="">

	<!-- Menu Bar Top -->
	<?php $this->load->view('admin/layouts/menubartop');  ?>

	<div class="page-container row-fluid">
		<!-- aside -->
		<?php $this->load->view('admin/layouts/menubar');  ?>



		<!-- BEGIN PAGE CONTAINER-->
		<div class="page-content">
			<div class="content">
				<div id="container">
					<div class="row">

						<div class="col-md-8 spacing-bottom">
							<div class="row tiles-container tiles white spacing-bottom">
								<div class="tile-more-content col-md-4 col-sm-4 no-padding">
									<div class="tiles green">
										<div class="tiles-body">
											<div class="heading"> <?php echo $data['user']['fullname']; ?> </div>
											<p><?php echo $data['user']['email']; ?></p>
										</div>
										<div class="tile-footer">
											<div class="iconplaceholder"><i class="fa fa-map-marker"></i></div>
											<?php echo $data['user']['country']; ?>
										</div>
									</div>
									<div class="tiles-body">
										<ul class="progress-list">
											<li>
												<div class="details-wrapper">
													<div class="name"><?php echo $data['user']['place_of_birth']; ?></div>
													<div class="description">Place of Birth</div>
												</div>
												<div class="clearfix"></div>
												<br>
											</li>
											<li>
												<div class="details-wrapper">
													<div class="name"><?php echo $data['user']['date_of_birth']; ?></div>
													<div class="description">Date of birth</div>
												</div>
												<div class="clearfix"></div>
												<br>
											</li>
											<li>
												<div class="details-wrapper">
													<div class="name"><?php echo $data['user']['institution']; ?></div>
													<div class="description">Institution</div>
												</div>
												<div class="clearfix"></div>
												<br>
											</li>
											<li>
												<div class="details-wrapper">
													<div class="name"><?php echo $data['user']['phone_number']; ?></div>
													<div class="description">Phone Number</div>
												</div>
												<div class="clearfix"></div>
												<br>
											</li>
											<!-- <li>
		                          <div class="details-wrapper">
		                            <div class="name"><?php echo $data['user']['profesion']; ?></div>
		                            <div class="description">Profesion</div>
		                          </div>
		                          <div class="clearfix"></div>
		                          <br>
		                        </li> -->
											<li>
												<div class="details-wrapper">
													<div class="name"><?php echo $data['user']['major_of_study']; ?></div>
													<div class="description">Major of Study</div>
												</div>
												<div class="clearfix"></div>
												<br>
											</li>

											<!-- 
		                        <li>
		                          <div class="details-wrapper">
		                            <div class="name">Other Visits</div>
		                            <div class="description">Our Overseas visits</div>
		                          </div>
		                          <div class="details-status pull-right"> <span class="animate-number" data-value="12" data-animation-duration="200">0</span>% </div>
		                          <div class="clearfix"></div>
		                          <div class="progress progress-small no-radius">
		                            <div class="progress-bar progress-bar-danger animate-progress-bar" data-percentage="12%"></div>
		                          </div>
		                        </li> -->
										</ul>
									</div>
								</div>
								<div class="tiles white col-md-8 col-sm-8 no-padding">
									<div class="tiles-chart">
										<div class="controller">
											<!-- <a href="javascript:;" class="reload"></a> -->
											<!-- <a href="javascript:;" class="remove"></a> -->
										</div>
										<div class="tiles-body">
											<div class="tiles-title">PROFILE PICTURE</div>
											<div class="heading">
												<button type="button" class="btn btn-white btn-xs btn-mini" id="select_profile_pic">Change</button>
											</div>
										</div>
										<div>

											<img style="max-height:450px" id="profile_picture" src="<?php echo ($profile_picture); ?>">

										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="row spacing-bottom ">
								<div class="col-md-12">
									<div class="tiles green added-margin">
										<div class="tiles-body">
											<div class="controller">
											</div>
											<div class="tiles-title"> ADDITIONAL DATA </div>

											<ul class="progress-list">

												<li>
													<div class="name">STUDENT CARD </div>
													<button type="button" class="btn btn-white btn-xs btn-mini" id="student_card">Upload</button>
													<a class="btn btn-white btn-xs btn-mini" id="student_card_preview">Preview</a>
												</li>
												<li>
													<br>
													<div class="name">ACADEMIC MEMBER </div>
													<button type="button" class="btn btn-white btn-xs btn-mini" id="academic_member">Upload</button>
													<a class="btn btn-white btn-xs btn-mini" id="academic_member_preview">Preview</a>
												</li>


											</ul>

										</div>
									</div>
									<div class="tiles white added-margin">
										<div id="chart"> </div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="row spacing-bottom ">
								<div class="col-md-12">
									<div class="tiles purple added-margin">
										<div class="tiles-body">
											<div class="controller">
											</div>
											<div class="tiles-title"> INCOMPLETE PAYMENT </div>

											<ul class="progress-list">

												<?php foreach ($data['payment'] as $key => $value) { ?>

													<li>
														<div class="details-wrapper">
															<div class="name">Pay for : <?php echo $value['pay_for']; ?></div>
															<div class="heading"> <span><?php echo $value['course']['title']; ?></span> </div>
														</div>
														<div class=" pull-right">


														</div>
														<div class="clearfix"></div>
													</li>

												<?php } ?>

											</ul>

										</div>
									</div>
									<div class="tiles white added-margin">
										<div id="chart"> </div>
									</div>
								</div>
							</div>
						</div>


					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="row spacing-bottom ">
								<div class="col-md-12">
									<div class="tiles white added-margin">
										<div class="tiles-body">
											<div class="controller">
												<div class="pull-right">
													<button name="save_bio" id="save_bio" class="btn btn-primary btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
												</div>
											</div>
											<br>
											<div class="tiles-title"> BIOGRAPHY </div>

											<ul class="progress-list">

												<li>
													<textarea id="biography" name="biography" placeholder="Enter biography ..." class="form-control" rows="10"></textarea>
												</li>

											</ul>

										</div>
									</div>
									<div class="tiles white added-margin">
										<div id="chart"> </div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- END PAGE CONTAINER -->
	</div>



	<!-- jshandler -->
	<?php $this->load->view('admin/layouts/jshandler');  ?>
	<script src="<?php echo base_url(); ?>assets/resumable/resumable.js" type="text/javascript"></script>

	<script type="text/javascript">
		var user_id = "<?php echo ($data['user']['id']); ?>";
		var resumable = [];

		resumable_count = 0;


		function refresh_data() {
			$.ajax({
				type: 'POST',
				url: base_url + post_url,
				data: {
					param: {
						"ihateapple": user_single_dic,
						"user_id": user_id
					},
					url: get_datatable_url
				},
				success: function(respons) {
					// console.log(respons);
					var jsonArr = JSON.parse(respons);

					$("#profile_picture").attr("src", jsonArr['data']['user_detail']['profile_picture']);
					$("#student_card_preview").attr("href", jsonArr['data']['user_detail']['student_card']);
					$("#academic_member_preview").attr("href", jsonArr['data']['user_detail']['academic_member']);
					$("#biography").val(jsonArr['data']['user_detail']['biography']);
					alert('Updated');
				}
			});
		}

		$("#save_bio").click(function() {
			tinyMCE.triggerSave();
			var data_update = $("#biography").val();
			// alert(data_update);
			$.ajax({
				type: 'POST',
				url: base_url + post_url,
				data: {
					param: {
						"action": "biography",
						"user_id": user_id,
						"data_update": data_update
					},
					url: update_profile_textbased_url
				},
				success: function(respons) {
					refresh_data();
				}
			});
		});


		function initiate_resumable(button, act) {

			var count = resumable_count;

			resumable[count] = new Resumable({
				target: noncurl_api_url + update_profile_url,
				maxChunkRetries: 5,
				query: {
					user_id: user_id,
					action: act
				},
				maxFiles: 1,
				prioritizeFirstAndLastChunk: true,
				simultaneousUploads: 4,
				chunkSize: 1 * 1024 * 1024
			});

			resumable[count].assignBrowse(button);

			resumable[count].on('fileAdded', function(file, event) {
				trigger_upload(count);
			});

			resumable[count].on('complete', function() {
				refresh_data();
				// alert('Success');
			});

			resumable[count].on('fileError', function(file, message) {});

			resumable_count = resumable_count + 1;

		}

		function trigger_upload(x) {
			resumable[x].upload();
		}

		initiate_resumable($('#select_profile_pic'), 'profile_picture');
		initiate_resumable($('#student_card'), 'student_card');
		initiate_resumable($('#academic_member'), 'academic_member');
	</script>
</body>

</html>