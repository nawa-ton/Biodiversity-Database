<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="x-ua-compatible" content="ie=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>UBC Biodiversity Database App</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<style>
			/* layout */
			body {
				font-family: 'Montserrat', sans-serif;
				padding: 1em;
			}

			main {
				margin-top: 1em;
				margin-bottom: 1em;
				min-height: 80vh;
				width: 100%;
				overflow: auto;
			}

			.viewResults{
				margin-top: 60px;
			}

			/* Link */


			/* text*/
			.remark{
				color: red;
			}

			ul {
				list-style-type: none;
    			padding-inline-start: 0;
    			line-height: 1.5em;
			}

			.confirmmsg{
				color: #c44b23;
			}

			/*added by nawa*/
			.bold{
				font-weight: bold;
			}

			/* form */
			label{
		        display: block;
		        margin-bottom: 3px;
		        font-weight: bold;
		    }

		    .button {
		        margin-top: 5px;		        
		        background-color: #2623c4;
		        color: #fff;
		        padding: 5px 15px;
		        /* added by nawa */
				margin-bottom: 20px;
				font-size: 1em;
		    }

		    form, form div {
		    	margin-bottom: 15px;
		    }

		    input[type = "text"] {
		    	width: 400px;
			    height: 20px;
			    font-size: 1em;
			    border: solid 2px lightgray;
			}

			select {
				height: 25px;
    			font-size: 1em;
			}

			#editSighting{
			    background-color: #d6d6d6;
			    padding: 15px 30px;
			    width: 60vh;
			}

			/* table */

			table {
				border-collapse: collapse;
				border-spacing: 0;
				/* added by nawa */
				margin-top: 20px;
				margin-bottom: 50px;
			}

			td, th {
				padding: 10px 15px;
				border-bottom: 1px solid #aaa;
				text-align: center;
			}

			th {
				background-color: #bebdff;
			}

		</style>

		<script type="text/javascript">
			$(document).ready(function(){


				//display input fields that correspond to user/guest selection
				$(function(){
					$("#insertaggregation, #insertdivision").hide();
					$("#querytype").change(function(){
						if($(this).val() == 'selection'){
							$("#insertselection").show();
							$("#insertaggregation").hide();
							$("#insertdivision").hide();
						}else if($(this).val() == 'aggregation'){
							$("#insertselection").hide();
							$("#insertaggregation").show();
							$("#insertdivision").hide();
							}	
						else{
							$("#insertselection").hide();
							$("#insertaggregation").hide();
							$("#insertdivision").show();
						}
					})
				});

				//report-sighting page
				$(function() {
					$("#insertplant, #insertfungus, #insertconstruction, #insertmaintenance").hide();

					$("#organismtype").change(function(){
					  	$(".insertOrganism").hide();
					  	$("#insert" + $(this).val()).show();
					});

					$("#edibility").change(function(){
						if($(this).val() == 'edible'){
							$("#inserttoxin").hide();
						}
					});

					$("#locationcondition").change(function(){
						if($(this).val() == 'construction'){
							$("#insertconstruction").show();
							$("#insertmaintenance").hide();
						}else if($(this).val() == 'maintenance'){
							$("#insertconstruction").hide();
							$("#insertmaintenance").show();
						}else{
							$("#insertconstruction, #insertmaintenance").hide();
						}
					});
						
				});

				//display input fields that correspond to user's selection for edit-delete page
				$(function(){

					//$( ".resulttable" ).appendTo( ".resultposition" );
					//$( ".confirmmsg" ).appendTo( ".resultposition" );
					//$( ".resulttable" ).appendTo( ".resultposition" );

					$("#searchbyreportID, #searchbyOrganism, #searchbyLocation").hide();

					$("#searchsightingby").change(function(){
						if($(this).val() == 'OrganismLocation'){
							$(".searchby").hide();
							$("#searchbyOrganism").show();
							$("#searchbyLocation").show();
						}else{
						  	$(".searchby").hide();
						  	$("#searchby" + $(this).val()).show();
						}
					});
				});

				//display input fields as per user's selection
				$(function(){
					$("#searchbyUserID, #searchbyName, #searchbyJoinYear").hide();

					$("#searchuserby").change(function(){
						if($(this).val() == 'NameYear'){
							$(".searchuser").hide();
							$("#searchbyName").show();
							$("#searchbyJoinYear").show();
						}else{
						  	$(".searchuser").hide();
						  	$("#searchby" + $(this).val()).show();
						}
					});
				});

			});
		</script>

	</head>


	<body>
		<header>
			<h1>UBC Biodiversity Database</h1>
		</header>
		<main>
