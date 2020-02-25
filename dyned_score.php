<?php include 'session.php'; ?>
<!DOCTYPE html>
<!-- Project: Lanna/SPEEXX Report -->
<!-- Author: Jiramet Kaewsiri (jirametk@lanna.co.th) -->
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			SPEEXX Report | New User
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
		<!--end::Page Vendors -->
		<link href="../metronic_v5.0.4/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="../metronic_v5.0.4/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
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
									New User
								</h3>
							</div>
							<div>
								<input type="file" id="excelfile" />  
								   
								<button type="button" class="btn btn-primary" id="viewfile" value="Export To Table" onclick="ExportToTable()" >
									Upload File
								</button>
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
											Email Template
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
									<div class="form-group m-form__group row">
										<label class="col-2 col-form-label">
											Admin Email
										</label>
										<div class="col-10">
											<input type="text" class="form-control" id="admin-email" value="report@dynatix.co.th">
										</div>
									</div>
									<div class="form-group m-form__group row">
										<label class="col-2 col-form-label">
											Admin Password
										</label>
										<div class="col-10">
											<input type="password" class="form-control" id="admin-password" value="RP@Dynatix@1">
										</div>
									</div>
									<!-- <div class="form-group m-form__group row">
										<label class="col-2 col-form-label">
											Type
										</label>
										<div class="col-10">
											<select class="browser-default custom-select" id="select-type">
											  <option selected>Open this select menu</option>
											  <option value="1">Positive</option>
											  <option value="2">Negative</option>
											</select>
										</div>
									</div> -->
								</form>
								<!--end: Search Form -->
								<div class="m_datatable" id="exceltable"></div>
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

		<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
		<script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script>
		<script type="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
		<!--end::Base Scripts -->  
		<script type="text/javascript">


			var importExcelData = [];
			$( document ).ready(function() {				

			});

			$("#viewfile").click(function() {
				$("#exceltable tr").remove();
			});

			$("#send-email").click(function() {

				if (confirm('Are you sure you want to send all email?')) {
				    var success_count = 0;
				    var error_count = 0;
				    jQuery.each(importExcelData, function(i, val) {
				    	var data = {
								admin_email: $('#admin-email').val(),
								admin_password: $('#admin-password').val(),
								//type: $('#select-type').val(),
							    TODAY_DATE: importExcelData[i]['TODAY_DATE'],
							    STD_ID: importExcelData[i]['STD_ID'],
							    STUDENT_NAME: importExcelData[i]['STUDENT_NAME'],
							    EMAIL: importExcelData[i]['EMAIL'],
							    CURRENTE_LEVEL: importExcelData[i]['CURRENTE_LEVEL'],
							    CEFR_GOAL: importExcelData[i]['CEFR_GOAL'],
							    WSS: importExcelData[i]['WSS'],
							    HOUR: importExcelData[i]['HOUR']
					    	};
					    	//console.log(data);
					    	$.ajax({
							    url: "score_user_dyned.php",
							    type: "post",
							    data: data,
							    success: function( result ) {
							    	console.log(JSON.stringify(result));    
							    	//success_count++;    									    
					    		},
					    		error: function( result ) {
					    			// error_count++;
							    	console.log(JSON.stringify(result));    									    
					    		},
							});
						success_count++;
					});  
	    			alert('Send: '+success_count+' emails');
				} 
				else {

				}
		    });

			function ExportToTable() {  
			     var regex = /^([\u0E00-\u0E7Fa-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/;  
			     /*Checks whether the file is a valid excel file*/  
			     if (regex.test($("#excelfile").val().toLowerCase())) {  
			         var xlsxflag = false; /*Flag for checking whether excel is .xls format or .xlsx format*/  
			         if ($("#excelfile").val().toLowerCase().indexOf(".xlsx") > 0) {  
			             xlsxflag = true;  
			         }  
			         /*Checks whether the browser supports HTML5*/  
			         if (typeof (FileReader) != "undefined") {  
			             var reader = new FileReader();  
			             reader.onload = function (e) {  
			                 var data = e.target.result;  
			                 /*Converts the excel data in to object*/  
			                 if (xlsxflag) {  
			                     var workbook = XLSX.read(data, { type: 'binary' });  
			                 }  
			                 else {  
			                     var workbook = XLS.read(data, { type: 'binary' });  
			                 }  
			                 	

				                 /*Gets all the sheetnames of excel in to a variable*/  
				                 var sheet_name_list = workbook.SheetNames;  
				  
				                 var cnt = 0; /*This is used for restricting the script to consider only first sheet of excel*/  
				                 sheet_name_list.forEach(function (y) { /*Iterate through all sheets*/  
				                     /*Convert the cell value to Json*/  
				                     if (xlsxflag) {  
				                         var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y]);  
				                     }  
				                     else {  
				                         var exceljson = XLS.utils.sheet_to_row_object_array(workbook.Sheets[y]);  
				                     }  
				                     if (exceljson.length > 0 && cnt == 0) {  
				                         BindTable(exceljson, '#exceltable');  
				                         cnt++;  
				                     }  
				                 });    
			             }  
			             if (xlsxflag) {/*If excel file is .xlsx extension than creates a Array Buffer from excel*/  
			                 reader.readAsArrayBuffer($("#excelfile")[0].files[0]);  
			             }  
			             else {  
			                 reader.readAsBinaryString($("#excelfile")[0].files[0]);  
			             }  
			         }  
			         else {  
			             alert("Sorry! Your browser does not support HTML5!");  
			         }  
			     }  
			     else {  
			         alert("Please upload a valid Excel file!");  
			     }  
			};

			function BindTable(jsondata, tableid) {
			 	importExcelData = jsondata;
			    if(Object.keys(jsondata[0]).length != 8){
					alert('Incorrect data format');
				}		
				else {
			    	$(tableid).mDatatable({
	                	data: {
		                    type: "local",
		                    source: jsondata,
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
		                columns: [
		                	{
								title: "TODAY_DATE",
								field: "TODAY_DATE"
							},
							{
								title: "STD_ID",
								field: "STD_ID"
							},
							{
								title: "STUDENT_NAME",
								field: "STUDENT_NAME"
							},
							{
								title: "EMAIL",
								field: "EMAIL"
							},
							{
								title: "CURRENTE_LEVEL",
								field: "CURRENTE_LEVEL"
							},
							{
								title: "CEFR_GOAL",
								field: "CEFR_GOAL"
							},
							{
								title: "WSS",
								field: "WSS"
							},
							{
								title: "HOUR",
								field: "HOUR"
							}
	                    ]
	             	});
				}
			};
		</script> 
	</body>
	<!-- end::Body -->
</html>
