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
									Monthly Import
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
							</div>
							<div class="m-portlet__body">
								<!--begin: Search Form -->
								<div>
									<form class="m-form m-form--fit m-form--label-align-right" id="monthly-report-form">
										<div class="m-portlet__body">
											<div class="form-group m-form__group">
												<div class="row">
													<div class="col-md-6">
														<label for="monthSelect">
															Month
														</label>
														<select class="form-control m-input" id="monthSelect">
															<option id='m0'>มกราคม</option>
															<option id='m1'>กุมภาพันธ์</option>
															<option id='m2'>มีนาคม</option>
															<option id='m3'>เมษายน</option>
															<option id='m4'>พฤษภาคม</option>
															<option id='m5'>มิถุนายน</option>
															<option id='m6'>กรกฎาคม</option>
															<option id='m7'>สิงหาคม</option>
															<option id='m8'>กันยายน</option>
															<option id='m9'>ตุลาคม</option>
															<option id='m10'>พฤศจิกายน</option>
															<option id='m11'>ธันวาคม</option>
														</select>
													</div>
													<div class="col-md-6">
														<label for="yearSelect">
															Year
														</label>
														<select class="form-control m-input" id="yearSelect">
															<option>2561</option>
															<option>2562</option>
															<option>2563</option>
															<option>2564</option>
															<option>2565</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="m-portlet__foot m-portlet__foot--fit">
											<div class="m-form__actions">
												<button type="reset" class="btn btn-accent" id="send-email">
													<i class="la la-envelope"></i> Send
												</button>
											</div>
										</div>
									</form>
									<div style="overflow-x:auto;">
										<table id="exceltable" class="table table-res"></table>
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
    	<!--begin::Base Scripts -->
		<script src="../metronic_v5.0.4/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="../metronic_v5.0.4/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->   
		<!--begin::Page Resources -->
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
		<!--end::Page Resources -->

		<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
		<script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script>
		<script type="text/javascript">
			
			$( document ).ready(function() {	
				var d = new Date();
				var n = d.getMonth();
				$('#m'+n).prop('selected', true);
				$("#viewfile").click(function() {
					$("#exceltable tr").remove();
				});
			});

			$("#send-email").click(function() {
				if (confirm('Are you sure you want to send all email?')) {
				    var count = 0;
					$('#exceltable > tr').each(function() {
		    			var $row = $(this).closest("tr");    // Find the row
		    			$.ajax({
						    url: "month_mail.php",
						    type: "post",
						    data: {
						    	month: $('#monthSelect').val(),
						    	year: $('#yearSelect').val(),
						    	fullname: $row.find("td").eq(0).text(),
							    email: $row.find("td").eq(1).text(),
							    link: $row.find("td").eq(2).text()
					    	},
						    success: function( result ) {
						    	//alert(result;)		    									    
				    		}
						});
						count++;
		    		});
	    			alert('Complete: '+count+' emails have been sent!');
				} else {

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
			     			    var myTable = jQuery("#exceltable");
								var thead = myTable.find("thead");
								var thRows =  myTable.find("tr:has(th)");

								if (thead.length===0){  //if there is no thead element, add one.
								    thead = jQuery("<thead></thead>").appendTo(myTable);    
								}

								var copy = thRows.clone(true).appendTo("thead");
								thRows.remove();
			                 	$('#exceltable').show();  
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
			 }

			 function BindTable(jsondata, tableid) {/*Function used to convert the JSON array to Html Table*/  
			     var columns = BindTableHeader(jsondata, tableid); /*Gets all the column headings of Excel*/  
			     for (var i = 0; i < jsondata.length; i++) {  
			         var row$ = $('<tr/>');  
			         for (var colIndex = 0; colIndex < columns.length; colIndex++) {  
			             var cellValue = jsondata[i][columns[colIndex]];  
			             if (cellValue == null)  
			                 cellValue = "";  
			             row$.append($('<td/>').html(cellValue));  
			         }  
			         $(tableid).append(row$);  		     
			    }  
			 }  

			 function BindTableHeader(jsondata, tableid) {/*Function used to get all column names from JSON and bind the html table header*/  
			     var columnSet = [];  
			     var headerTr$ = $('<tr/>');  
			     for (var i = 0; i < jsondata.length; i++) {  
			         var rowHash = jsondata[i];  
			         for (var key in rowHash) {  
			             if (rowHash.hasOwnProperty(key)) {  
			                 if ($.inArray(key, columnSet) == -1) {/*Adding each unique column names to a variable array*/  
			                     columnSet.push(key);  
			                     headerTr$.append($('<th/>').html(key));  
			                 }  
			             }  
			         }  
			     }  
			     
			     $(tableid).append(headerTr$);  
			     return columnSet;  
			 } 
		</script> 
	</body>
	<!-- end::Body -->
</html>
