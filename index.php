<?php include 'session.php'; ?>
<!DOCTYPE html>
<!-- Project: Lanna/SPEEXX Report -->
<!-- Author: Jiramet Kaewsiri (jirametk@lanna.co.th) -->
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			SPEEXX Report | Dashboard
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
									Dashboard
								</h3>
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">
						 
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Weekly
										</h3>
									</div>
								</div>
								<div class="m-portlet__head-tools">
									<a href="#" class="btn btn-warning m-btn m-btn--icon btn-sm m-btn--air" id="send-email">
										<span>
											<i class="la la-envelope"></i>
											<span>
												Send All
											</span>
										</span>
									</a>
								</div>
							</div>
							<div class="m-portlet__body">
								<!--begin: Search Form -->
								<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
									<div class="row align-items-center">
										<div class="col-xl-12">
											<div class="form-group m-form__group row align-items-center">
												<div class="col-md-4">
													<div class="m-input-icon m-input-icon--left">
														<input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
														<span class="m-input-icon__icon m-input-icon__icon--left">
															<span>
																<i class="la la-search"></i>
															</span>
														</span>
													</div>
												</div>
												<div class="col-md-8"></div>
											</div>
										</div>
									</div>
								</div>
								<!--end: Search Form -->
								<div class="m_datatable" id="weekly_data"></div>
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
    	<!--begin::Base Scripts -->
		<script src="../metronic_v5.0.4/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="../metronic_v5.0.4/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->   

		<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
		<script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script>
		<script type="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
		<!--end::Base Scripts -->  
		<script type="text/javascript">
			var studentWeeklyData = [];
			$( document ).ready(function() {

				$.ajax({
				    url: "report.call.php",
				    type: "post",
				    data: {
				    	type: 'get'
				    },
			      	success: function(json){
			      		studentWeeklyData = json;
			      		var data = jQuery.parseJSON(json);
		                //alert(JSON.stringify(data));
			         	wtable = $('#weekly_data').mDatatable({
	                    	data: {
			                    type: "local",
			                    source: data,
			                    pageSize: 20
			                },
			                layout: {
			                    theme: "default",
			                    class: "",
			                    scroll: !1,
			                    height: 450,
			                    footer: !1
			                },
			                sortable: !0,
			                pagination: !0,
			                search: {
			                    input: $("#generalSearch")
			                },
			                columns: [
						        { 
	                            	title: "Action",
	                            	field: null,
					                template: function(row) {
				                        return '<button class="btn btn-primary m-btn m-btn--icon btn-sm m-btn--air single-email"><i class="la la-envelope"></i></button>';
				                    } 
				                },
				                { 
	                            	title: "Export_date",
	                            	field: "Export_date",
	                            	 sortable: !1,
				                    selector: !1,
				                    template: function(row) {
				                        return row.Export_date.date;
				                    } 
				                },
			                    {
	                            	title: "ID",
	                            	field: "ID",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "Email",
	                            	field: "Email",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "Name",
	                            	field: "Name",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "Surename",
	                            	field: "Surename",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "A1_score",
	                            	field: "A1_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "A1_time",
	                            	field: "A1_time",
	                            	 sortable: !1,
				                    selector: !1,
					                template: function(row) {
				                        return row.A1_time.date;
				                    }
				                },
							      { 
	                            	title: "A1_update_score",
	                            	field: "A1_update_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "A1_update_time",
	                            	field: "A1_update_time",
	                            	 sortable: !1,
				                    selector: !1,
					                template: function(row) {
				                        return row.A1_update_time.date;
				                    } 
				                },
							      { 
	                            	title: "A1_average_score",
	                            	field: "A1_average_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "A1_rank",
	                            	field: "A1_rank",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "A2_score",
	                            	field: "A2_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "A2_time",
	                            	field: "A2_time",
	                            	 sortable: !1,
				                    selector: !1,
					                template: function(row) {
				                        return row.A2_time.date;
				                    } 
				                },
							      { 
	                            	title: "A2_update_score",
	                            	field: "A2_update_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "A2_update_time",
	                            	field: "A2_update_time",
	                            	 sortable: !1,
				                    selector: !1,
					                template: function(row) {
				                        return row.A2_update_time.date;
				                    } 
				                },
							      { 
	                            	title: "A2_average_score",
	                            	field: "A2_average_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "A2_rank",
	                            	field: "A2_rank",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "B1_1_score",
	                            	field: "B1_1_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "B1_1_time",
	                            	field: "B1_1_time",
	                            	 sortable: !1,
				                    selector: !1,
					                template: function(row) {
				                        return row.B1_1_time.date;
				                    } 
				                },
							      { 
	                            	title: "B1_1_update_score",
	                            	field: "B1_1_update_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "B1_1_update_time",
	                            	field: "B1_1_update_time",
	                            	 sortable: !1,
				                    selector: !1,
					                template: function(row) {
				                        return row.B1_1_update_time.date;
				                    } 
				                },
							      { 
	                            	title: "B1_1_average_score",
	                            	field: "B1_1_average_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "B1_1_rank",
	                            	field: "B1_1_rank",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "B1_2_score",
	                            	field: "B1_2_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "B1_2_time",
	                            	field: "B1_2_time",
	                            	 sortable: !1,
				                    selector: !1,
					                template: function(row) {
				                        return row.B1_2_time.date;
				                    } 
				                },
							      { 
	                            	title: "B1_2_update_score",
	                            	field: "B1_2_update_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "B1_2_update_time",
	                            	field: "B1_2_update_time",
	                            	 sortable: !1,
				                    selector: !1,
					                template: function(row) {
				                        return row.B1_2_update_time.date;
				                    } 
				                },
							      { 
	                            	title: "B1_2_average_score",
	                            	field: "B1_2_average_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "B1_2_rank",
	                            	field: "B1_2_rank",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "B2_1_score",
	                            	field: "B2_1_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "B2_1_time",
	                            	field: "B2_1_time",
	                            	 sortable: !1,
				                    selector: !1,
					                template: function(row) {
				                        return row.B2_1_time.date;
				                    } 
				                },
							      { 
	                            	title: "B2_1_update_score",
	                            	field: "B2_1_update_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "B2_1_update_time",
	                            	field: "B2_1_update_time",
	                            	 sortable: !1,
				                    selector: !1,
					                template: function(row) {
				                        return row.B2_1_update_time.date;
				                    } 
				                },
							      { 
	                            	title: "B2_1_average_score",
	                            	field: "B2_1_average_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "B2_1_rank",
	                            	field: "B2_1_rank",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "B2_2_score",
	                            	field: "B2_2_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "B2_2_time",
	                            	field: "B2_2_time",
	                            	 sortable: !1,
				                    selector: !1,
					                template: function(row) {
				                        return row.B2_2_time.date;
				                    } 
				                },
							      { 
	                            	title: "B2_2_update_score",
	                            	field: "B2_2_update_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "B2_2_update_time",
	                            	field: "B2_2_update_time",
	                            	 sortable: !1,
				                    selector: !1,
					                template: function(row) {
				                        return row.B2_2_update_time.date;
				                    } 
				                },
							      { 
	                            	title: "B2_2_average_score",
	                            	field: "B2_2_average_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "B2_2_rank",
	                            	field: "B2_2_rank",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "C1_1_score",
	                            	field: "C1_1_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "C1_1_time",
	                            	field: "C1_1_time",
	                            	 sortable: !1,
				                    selector: !1,
					                template: function(row) {
				                        return row.C1_1_time.date;
				                    } 
				                },
							      { 
	                            	title: "C1_1_update_score",
	                            	field: "C1_1_update_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "C1_1_update_time",
	                            	field: "C1_1_update_time",
	                            	 sortable: !1,
				                    selector: !1,
					                template: function(row) {
				                        return row.C1_1_update_time.date;
				                    } 
				                },
							      { 
	                            	title: "C1_1_average_score",
	                            	field: "C1_1_average_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "C1_1_rank",
	                            	field: "C1_1_rank",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "C1_2_score",
	                            	field: "C1_2_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "C1_2_time",
	                            	field: "C1_2_time",
	                            	 sortable: !1,
				                    selector: !1,
					                template: function(row) {
				                        return row.C1_2_time.date;
				                    } 
				                },
							      { 
	                            	title: "C1_2_update_score",
	                            	field: "C1_2_update_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "C1_2_update_time",
	                            	field: "C1_2_update_time",
	                            	 sortable: !1,
				                    selector: !1,
					                template: function(row) {
				                        return row.C1_2_update_time.date;
				                    } 
				                },
							      { 
	                            	title: "C1_2_average_score",
	                            	field: "C1_2_average_score",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "C1_2_rank",
	                            	field: "C1_2_rank",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "Faculty_ID",
	                            	field: "Faculty_ID",
	                            	 sortable: !1,
				                    selector: !1 
				                },
							      { 
	                            	title: "University_ID",
	                            	field: "University_ID",
	                            	 sortable: !1,
				                    selector: !1 
				                }
	                        ]
	                    });
	                    //wtable.ajax.reload();
	                }
		        });
			});

			$(".single-email").click(function() {
				//$(this).closest("tr");
			});

			$("#send-email").click(function() {

				if (confirm('Are you sure you want to send all email?')) {
				    var count = 0;
				    jQuery.each(studentWeeklyData, function(i, val) {
				    	$.ajax({
						    url: "week_mail.php",
						    type: "post",
						    data: {
							    email: importExcelData[i]['Username'],
							    fname: importExcelData[i]['Name'],
							    lname: importExcelData[i]['Surname'],
							    a1_score: importExcelData[i]['A1_score'],
							    a1_time: importExcelData[i]['A1_time'],
							    a1_update_score: importExcelData[i]['A1_update_score'],
							    a1_update_time: importExcelData[i]['A1_update_time'],
							    a1_average_score: importExcelData[i]['A1_average_score'],
							    a1_rank: importExcelData[i]['A1_rank'],
							    a2_score: importExcelData[i]['A2_score'],
							    a2_time: importExcelData[i]['A2_time'],
							    a2_update_score: importExcelData[i]['A2_update_score'],
							    a2_update_time: importExcelData[i]['A2_update_time'],
							    a2_average_score: importExcelData[i]['A2_average_score'],
							    a2_rank: importExcelData[i]['A2_rank'],
							    b11_score: importExcelData[i]['B1.1_score'],
							    b11_time: importExcelData[i]['B1.1_time'],
							    b11_update_score: importExcelData[i]['B1.1_update_score'],
							    b11_update_time: importExcelData[i]['B1.1_update_time'],
							    b11_average_score: importExcelData[i]['B1.1_average_score'],
							    b11_rank: importExcelData[i]['B1.1_rank'],
							    b12_score: importExcelData[i]['B1.2_score'],
							    b12_time: importExcelData[i]['B1.2_time'],
							    b12_update_score: importExcelData[i]['B1.2_update_score'],
							    b12_update_time: importExcelData[i]['B1.2_update_time'],
							    b12_average_score: importExcelData[i]['B1.2_average_score'],
							    b12_rank: importExcelData[i]['B1.2_rank'],
							    b21_score: importExcelData[i]['B2.1_score'],
							    b21_time: importExcelData[i]['B2.1_time'],
							    b21_update_score: importExcelData[i]['B2.1_update_score'],
							    b21_update_time: importExcelData[i]['B2.1_update_time'],
							    b21_average_score: importExcelData[i]['B2.1_average_score'],
							    b21_rank: importExcelData[i]['B2.1_rank'],
							    b22_score: importExcelData[i]['B2.2_score'],
							    b22_time: importExcelData[i]['B2.2_time'],
							    b22_update_score: importExcelData[i]['B2.2_update_score'],
							    b22_update_time: importExcelData[i]['B2.2_update_time'],
							    b22_average_score: importExcelData[i]['B2.2_average_score'],
							    b22_rank: importExcelData[i]['B2.2_rank'],
							    c11_score: importExcelData[i]['C1.1_score'],
							    c11_time: importExcelData[i]['C1.1_time'],
							    c11_update_score: importExcelData[i]['C1.1_update_score'],
							    c11_update_time: importExcelData[i]['C1.1_update_time'],
							    c11_average_score: importExcelData[i]['C1.1_average_score'],
							    c11_rank: importExcelData[i]['C1.1_rank'],
							    c12_score: importExcelData[i]['C1.2_score'],
							    c12_time: importExcelData[i]['C1.2_time'],
							    c12_update_score: importExcelData[i]['C1.2_update_score'],
							    c12_update_time: importExcelData[i]['C1.2_update_time'],
							    c12_average_score: importExcelData[i]['C1.2_average_score'],
							    c12_rank: importExcelData[i]['C1.2_rank']
					    	},
						    success: function( result ) {
						    	//alert(JSON.stringify(result));    									    
				    		}
						});
						count++;
					});  
	    			alert('Complete: '+count+' emails have been sent!');
				} 
				else {

				}
		    });


		</script> 
	</body>
	<!-- end::Body -->
</html>
