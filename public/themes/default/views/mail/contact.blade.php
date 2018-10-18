<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Contact Form</title>
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
		  	<h1>Contact Form: {{@$subject}}</h1>
			<table>
				<tr>
					<td><strong>Full Name : </strong></td>
					<td>{{@$fullname}}</td>
				</tr>
				<tr>
					<td><strong>E-Mail : </strong></td>
					<td>{{@$email}}</td>
                </tr>
                <tr>
					<td><strong>Telephone : </strong></td>
					<td>{{@$tel}}</td>
                </tr>
                <tr>
					<td><strong>Fax : </strong></td>
					<td>{{@$fax}}</td>
				</tr>
				<tr>
					<td><strong>Address : </strong></td>
					<td>{{@$address}}</td>
				</tr>

				<tr>
					<td><strong>Question : </strong></td>
					<td>{!! @$question !!}</td>
				</tr>
			</table>
		</div>
	</body>
</html>
