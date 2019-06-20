<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="x-ua-compatible" content="ie=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>UBC Biodiversity Database App</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
			/* layout */
			body {
				font-family: 'Montserrat', sans-serif;
				padding: 1em;
			}

			main {
				box-sizing: border-box;
				margin-top: 1em;
				margin-bottom: 1em;
				min-height: 60vh;
				width: 100%;
				overflow: auto;
				background-color: #7FA293;
				padding: 100px;
				display: flex;
			    justify-content: center;
			    flex-direction: column;
			}

			.viewResults{
				margin-top: 60px;
			}

			section {
				margin: auto;
			    width: 65%;
			    background: white;
			    display: flex;
			    flex-direction: column;
			    justify-content: center;
			    box-shadow: 0 8px 6px -6px black;
			    padding: 30px;
			}

			.aligncenter{
				text-align: center;
			}

			footer {
				text-align: center;
				padding: 30px 0;
			}

			/* Link */
			a{
				text-decoration: none;
				color: #3F6357;
			}

			a:hover{
				color: gray;
			}

			.navlink li > a {
				display: inline-block;
				padding: 7px 35px;
			    margin: 10px;
			    background: black;
			    text-decoration: none;
			    color: white;
			}


		   	.navlink li > a:hover{
				background-color: #3F6357;
				transition: background-color 0.5s;
			    }
			
			/* text*/
			.remark{
				color: red;
			}

			ul {
				list-style-type: none;
    				padding-inline-start: 0;
    				line-height: 1.5em;
    				margin-bottom: 40px;
			}

			.navlink{
				display: flex;
    				justify-content: center;
			}

			.confirmmsg{
				color: #c44b23;
			}

			h1{
			    font-size: 2.5em;
			}

			h2{
			    display: block;
			    padding: 30px;
			    background: black;
			    color: white;
			    margin-bottom: 60px;
			    margin-top: 0;
			}

			h1, h2, h3, h5{
				text-align: center;
			}

			/*added by nawa*/
			.bold{
				font-weight: bold;
			}

			/* form */
			form{
				margin: auto;
				padding-bottom: 20px;
			}

			label{
		       		display: block;
		        	margin-bottom: 3px;
		        	font-weight: bold;
		    	}

		    .button {
		        margin-top: 5px;		        
		        background-color: #3F6357;
		        border: none;
		        color: #fff;
		        padding: 10px 15px;
		        /* added by nawa */
			margin-bottom: 20px;
			font-size: 1em;
			cursor: pointer;
			font-weight: bold;
		    }

		    .button:hover{
		    	background-color: #232F2B;
		    	transition: background-color 0.5s;
		    }

		    form div {
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
			    text-align: center;
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
				background-color: #7FA293;
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
