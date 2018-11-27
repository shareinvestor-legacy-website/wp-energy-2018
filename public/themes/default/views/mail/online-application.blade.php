<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Online Application Form</title>
		<style>
			body {
				font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
				font-size: 14px;
			}
			.container {
				width: 100%;
			}
			h1 {
				font-size: 20px;
				margin: 25px 0px;
				color: #004687;
			}
			h2 {
				font-size: 16px;
				margin: 15px 0px;
				color: #004687;
			}
			table {
				width: 100%;
				border: none;
				padding: 0px;
				border-spacing: 0px;
			}
			table tr:nth-child(odd) {
				background-color: #eeeeee;
			}
			table tr td {
				vertical-align: top;
				padding: 10px 15px;
			}
		</style>
	</head>
	<body>
		<div class="container">
		  	<h1>Online Application: {{@$postion}}</h1>
			<table>
                <tr>
					<td><strong>Full Name : </strong></td>
					<td>{{@$title}} {{@$fullname}}</td>
                </tr>
                <tr>
					<td><strong>Date of Birth : </strong></td>
					<td>{{@$birthdate}}</td>
                </tr>
                <tr>
					<td><strong>Nationality : </strong></td>
					<td>{{@$nationality}}</td>
                </tr>
				<tr>
					<td><strong>Mobile Phone : </strong></td>
					<td>{{@$mobile}}</td>
				</tr>
				<tr>
					<td><strong>Email Address : </strong></td>
					<td>{{@$email}}</td>
                </tr>
                <tr>
					<td><strong>Address : </strong></td>
					<td>{{@$address}}</td>
				</tr>
			</table>
		</div>
	</body>
</html>
