<?php include 'session.php'; ?>
<!DOCTYPE html>
<!-- Project: Lanna/SPEEXX Report -->
<!-- Author: Jiramet Kaewsiri (jirametk@lanna.co.th) -->
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			SPEEXX Report | University
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->  
        <!--begin::Page Vendors -->
		<link href="../metronic_v5.0.4/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors -->
		<link href="../metronic_v5.0.4/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="../metronic_v5.0.4/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="../images/favicon.ico">
		<style type="text/css">
			.hidden{visibility:hidden;z-index:100;}
			.university-title a{color:black;text-decoration:none;}
		</style>
	</head>
	<!-- end::Head -->
    <!-- end::Body -->
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<!-- BEGIN: Header -->
				<?php include 'struc/header.php'; ?>
			<!-- END: Header -->		
		<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
					<?php include 'struc/sidemenu.php'; ?>
				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title ">
									University Data Management
								</h3>
							</div>
							<div>
								
								
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">
						<div class="row">
							<div class="col-md-6">
								<div class="m-portlet m-portlet--full-height ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text" id="university_head">
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<a href="#" class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--outline-2x m-btn--air btn-create" data-toggle="modal" data-target="#newUniversityModal">
												<i class="fa fa-plus"></i>
											</a>
											<a href="#" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--outline-2x m-btn--air btn-delete" data-toggle="modal" data-target="#deleteUniversityModal">
												<i class="fa fa-close"></i>
											</a>
										</div>
									</div>
									<div class="m-portlet__body" id="university-data">
										
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="m-portlet">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text" id="faculty_head">
													Faculty
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<a href="#" class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--outline-2x m-btn--air btn-create" data-toggle="modal" data-target="#newFacultyModal">
												<i class="fa fa-plus"></i>
											</a>
											<a href="#" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--outline-2x m-btn--air btn-delete" data-toggle="modal" data-target="#deleteFacultyModal">
												<i class="fa fa-close"></i>
											</a>
										</div>
									</div>
									<div class="m-portlet__body" id="faculty-data">
										No Data
							    	</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end:: Body -->
			<!-- begin::Footer -->
				<?php include 'struc/footer.php'; ?>
			<!-- end::Footer -->
		</div>
		<!-- end:: Page -->
    		        
	    <!-- begin::Scroll Top -->
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scroll Top -->	

		<!-- Modal -->
		<div class="modal fade" id="newUniversityModal" tabindex="-1" role="dialog" aria-labelledby="newUniversityModalLabel" aria-hidden="true">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="newUniversityModalLabel">
							Create University Data
						</h5>
						<button type="button" class="close xclose" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								×
							</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-4 col-form-label">
								ID
							</label>
							<div class="col-8">
								<input class="form-control m-input" type="text" value="" id="create_university_id">
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="example-search-input" class="col-4 col-form-label">
								Name
							</label>
							<div class="col-8">
								<input class="form-control m-input" type="text" value="" id="create_university_name">
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="example-url-input" class="col-4 col-form-label">
								Logo URL
							</label>
							<div class="col-8">
								<input class="form-control m-input" type="url" value="" id="create_university_logo">
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="example-email-input" class="col-4 col-form-label">
								Description
							</label>
							<div class="col-8">
								<input class="form-control m-input" type="text" value="" id="create_university_desc">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<!-- <button type="button" class="btn btn-primary xclose" data-dismiss="modal" id="update_university">
							Update
						</button> -->
						<button type="button" class="btn btn-secondary xclose" data-dismiss="modal">
							Close
						</button>
						<button type="button" class="btn btn-success xclose" data-dismiss="modal" id="new_university">
							Create
						</button>
					</div>
					</div>
				</div>
		  	</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="deleteUniversityModal" tabindex="-1" role="dialog" aria-labelledby="deleteUniversityModalLabel" aria-hidden="true">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="deleteUniversityModalLabel">
							Delete University Data
						</h5>
						<button type="button" class="close xclose" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								×
							</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-2 col-form-label">
								ID
							</label>
							<div class="col-10">
								<input class="form-control m-input" type="text" value="" id="delete_university_id">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary xclose" data-dismiss="modal">
							Close
						</button>
						<button type="button" class="btn btn-danger xclose" data-dismiss="modal" id="delete_university">
							Delete
						</button>
					</div>
				</div>
		  	</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="newFacultyModal" tabindex="-1" role="dialog" aria-labelledby="newFacultyModalLabel" aria-hidden="true">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="newFacultyModalLabel">
							Create Faculty Data
						</h5>
						<button type="button" class="close xclose" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								×
							</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-4 col-form-label">
								ID
							</label>
							<div class="col-8">
								<input class="form-control m-input" type="text" value="" id="create_faculty_id" readonly>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="example-search-input" class="col-4 col-form-label">
								Name
							</label>
							<div class="col-8">
								<input class="form-control m-input" type="text" value="" id="create_faculty_name">
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="example-search-input" class="col-4 col-form-label">
								Short Name
							</label>
							<div class="col-8">
								<input class="form-control m-input" type="text" value="" id="create_faculty_shortname">
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="example-email-input" class="col-4 col-form-label">
								Description
							</label>
							<div class="col-8">
								<input class="form-control m-input" type="text" value="" id="create_faculty_desc">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<!-- <button type="button" class="btn btn-primary xclose" data-dismiss="modal" id="update_university">
							Update
						</button> -->
						<button type="button" class="btn btn-secondary xclose" data-dismiss="modal">
							Close
						</button>
						<button type="button" class="btn btn-success xclose" data-dismiss="modal" id="new_faculty">
							Create
						</button>
					</div>
					</div>
				</div>
		  	</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="deleteFacultyModal" tabindex="-1" role="dialog" aria-labelledby="deleteFacultyModalLabel" aria-hidden="true">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="deleteFacultyModalLabel">
							Delete Faculty Data
						</h5>
						<button type="button" class="close xclose" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								×
							</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group m-form__group row">
							<label for="example-text-input" class="col-2 col-form-label">
								ID
							</label>
							<div class="col-10">
								<input class="form-control m-input" type="text" value="" id="delete_faculty_id">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary xclose" data-dismiss="modal">
							Close
						</button>
						<button type="button" class="btn btn-danger xclose" data-dismiss="modal" id="delete_faculty">
							Delete
						</button>
					</div>
				</div>
		  	</div>
		</div>

    	<!--begin::Base Scripts -->
		<script src="../metronic_v5.0.4/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="../metronic_v5.0.4/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->  
		<script type="text/javascript">
			
			$( document ).ready(function() {			
				getUniversityData();
			});

			function getUniversityData(){
				$.ajax({
		            url: "university.call.php",
		            type: "POST",
		              dataType: "json",
		              data: {
		              	type: 'get'
		              },
		            success: function(json){
		                //alert(JSON.stringify(json));

		                var udata = jQuery.parseJSON(JSON.stringify(json));

		                var u = [];

		                $('#university_head').html('University <span class="m-badge m-badge--warning">'+udata.length+'</span>');

				        for(var i=0; i< udata.length; i++)
				        {
				            var text = '<div class="m-widget4">'+
								'<div class="m-widget4__item">'+
									'<div class="m-widget4__img m-widget4__img--logo">'+
										'<img src="'+udata[i].Logo+'"alt="">'+
									'</div>'+
									'<div class="m-widget4__info">'+
										'<span class="m-widget4__title university-title" data-id="'+udata[i].University_ID+'" data-name="'+udata[i].University_Name+'"><a href="#">'+
											udata[i].University_Name+
										'</a></span>'+
										'<br>'+
										'<span class="m-widget4__sub">'+
											udata[i].Description+
										'</span>'+
									'</div>'+
									'<span class="m-widget4__ext">'+
										'<span class="m-widget4__number m--font-primary">'+
											udata[i].University_ID.toUpperCase()+
										'&nbsp;&nbsp;&nbsp;</span>'+
									'</span>'+
									'<span class="m-widget4__ext">'+
										'<span class="m-widget4__number">'+
											'<button type="button" class="btn btn-outline-metal m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air btn-update" data-toggle="modal" data-target="#newUniversityModal" data-id="'+udata[i].University_ID+'"><i class="fa fa fa-arrow-up university-id"></i></button>'+
										'</span>'+
									'</span>'+
								'</div>'+
							'</div>';
						  	u.push(text)
						}

						//alert(JSON.stringify(u));
						$('#university-data').html(u.join(""));

						$('.university-title').click(function(){
							//alert($(this).data('id'));
							var uid = $(this).data('id');
							var uname = $(this).data('name');

							$('#create_faculty_id').val(uid+'_');
							$('#new_faculty').data('uid',uid);

							$.ajax({
					            url: "faculty.call.php",
					            type: "POST",
					              dataType: "json",
					              data: {
					              	type: 'search',
					              	id: $(this).data('id')
					              },
					            success: function(json){
					                //alert(JSON.stringify(json));
					                var fdata = jQuery.parseJSON(JSON.stringify(json));

					                if(fdata.length > 0){
					                	var f = [];

						                $('#faculty_head').html(uname+' <span class="m-badge m-badge--warning">'+fdata.length+'</span>');

								        for(var i=0; i< fdata.length; i++)
								        {
											var text = '<div class="m-widget2__item m-widget2__item--primary">'+
												'<div class="m-widget2__desc">'+
													'<span class="m-widget2__text m--font-danger">'+
														fdata[i].Faculty_Shortname.toUpperCase()+
													'</span>'+
													'<br>'+
													'<span class="m-widget2__user-name">'+
														'<a href="#" class="m-widget2__link">'+
															fdata[i].Faculty_Name+
														'</a>'+
													'</span>'+
												'</div>'+
												'<div class="m-widget2__actions">'+
													'<div class="m-widget2__actions-nav">'+
														'<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover">'+
															'<a href="#" class="" data-toggle="modal" data-target="#newFacultyModal">'+
																'Edit'+
															'</a>'+
														'</div>'+
													'</div>'+
												'</div>'+
											'</div>';
											f.push(text)
										}
								    	$('#faculty-data').html(f.join("<hr/>"));
					                }
					                else{
					                	$('#faculty_head').html(uname+' <span class="m-badge m-badge--warning">0</span>');
										$('#faculty-data').html('No Data');
					                }
					            }
					        });;
						});

						$('.btn-update').click(function(){
							//alert($(this).data('id'));
							btnUpdate();

							$.ajax({
					            url: "university.call.php",
					            type: "POST",
					              dataType: "json",
					              data: {
					              	type: 'search',
					              	id: $(this).data('id')
					              },
					            success: function(json){
					                //alert(JSON.stringify(json));
					                var data = jQuery.parseJSON(JSON.stringify(json));

						          	$('#create_university_id').val(data[0].University_ID);
					              	$('#create_university_name').val(data[0].University_Name);
					              	$('#create_university_logo').val(data[0].Logo);
					              	$('#create_university_desc').val(data[0].Description);

					                //var data = jQuery.parseJSON(JSON.stringify(json));
							    
					            }
					        });
						});
				    
		            }
		        });
			}

			function btnUpdate(){
				$('#newUniversityModalLabel').html('Update University Data');
				$('#new_university').addClass('hidden');
				$('#create_university_id').attr('readonly', true).addClass('btn-danger');
			}

			$('.btn-create').click(function(){
				$('#newUniversityModalLabel').html('Create University Data');
				$('#update_university').addClass('hidden');
			});

			$('.xclose').click(function(){
				$('#new_university').removeClass('hidden');
				$('#update_university').removeClass('hidden');
				//clearUniversityForm();
			});

			$('#new_university').click(function(){
				$.ajax({
		            url: "university.call.php",
		            type: "POST",
		              dataType: "json",
		              data: {
		              	type: 'set',
		              	id: $('#create_university_id').val(),
		              	name: $('#create_university_name').val(),
		              	logo: $('#create_university_logo').val(),
		              	desc: $('#create_university_desc').val()
		              },
		            success: function(json){
		            	//
		            }
		        });
		        alert('Create Success');
		        $('#update_university').removeClass('hidden');
		        getUniversityData();
			});

			$('#update_university').click(function(){
				$.ajax({
		            url: "university.call.php",
		            type: "POST",
		              dataType: "json",
		              data: {
		              	type: 'update',
		              	id: $('#create_university_id').val(),
		              	name: $('#create_university_name').val(),
		              	logo: $('#create_university_logo').val(),
		              	desc: $('#create_university_desc').val()
		              },
		            success: function(json){
		            	//
		            }
		        });
		        alert('Update Success');
		        $('#new_university').removeClass('hidden');
		        getUniversityData();
			});

			$('#delete_university').click(function(){
				$.ajax({
		            url: "university.call.php",
		            type: "POST",
		              dataType: "json",
		              data: {
		              	type: 'delete',
		              	id: $('#delete_university_id').val()
		              },
		            success: function(json){
		            	//
		            }
		        });
		        alert('Delete Success');
            	getUniversityData();
			});

			function clearUniversityForm(){
				$('#create_university_id').val('');
              	$('#create_university_name').val('');
              	$('#create_university_logo').val('');
              	$('#create_university_desc').val('');
			}

			$('#new_faculty').click(function(){
				var uid = $(this).data('uid');
				var fid = uid+'_'+$('#create_faculty_shortname').val();
				$.ajax({
		            url: 'faculty.call.php',
		            type: "POST",
		              dataType: "json",
		              data: {
		              	type: 'set',
		              	id: fid,
		              	name: $('#create_faculty_name').val(),
		              	shortname: $('#create_faculty_shortname').val(),
		              	uid: uid,
		              	desc: $('#create_faculty_desc').val()
		              },
		            success: function(json){
		            	//alert(JSON.stringify(json));
		            }
		        });
		        alert('Create Success');
		        //$('#update_university').removeClass('hidden');
		        //getUniversityData();
			});

			$('#delete_faculty').click(function(){
				$.ajax({
		            url: "faculty.call.php",
		            type: "POST",
		              dataType: "json",
		              data: {
		              	type: 'delete',
		              	id: $('#delete_faculty_id').val()
		              },
		            success: function(json){
		            	//
		            }
		        });
		        alert('Delete Success');
            	//getUniversityData();
			});

		</script> 
	</body>
	<!-- end::Body -->
</html>
