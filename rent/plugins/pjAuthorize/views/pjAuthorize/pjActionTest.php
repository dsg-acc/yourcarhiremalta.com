<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style>
	table {
		border-collapse: collapse;
		margin: 15px 0;
	}
	th, td {
		border: solid 1px #333;
		padding: 5px;
		text-align: left;
	}
	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha256-916EbMg70RQy9LHiGkXzG8hSg9EdNy97GazNG/aiY1w=" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha256-U5ZEeKfGNOja007MMD3YBI0A3OSZOQbeG6z2f2Y0hu8=" crossorigin="anonymous"></script>
</head>
<body>
	<?php
	$controller->requestAction(array(
		'controller' => 'pjAuthorize',
		'action' => 'pjActionForm',
		'params' => $tpl['params'],
	));
	?>
	<table>
		<thead>
			<tr>
				<th>Key</th>
				<th>Value</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>
	
	<button type="button" id="btn-submit">Submit</button>
	
	<script>
	(function () {
		var form = document.querySelector("form");
		if (form) {
			document.querySelector("#btn-submit").addEventListener("click", function(e) {

				$("#modalAuthorizeNet").modal("show");
				
			});

			add_row("action", form.action);
			
			for (var i = 0, iCnt = form.elements.length; i < iCnt; i += 1) {

				add_row(form.elements[i].name, form.elements[i].value);
			}
		}

		function add_row(key, value) {
			var td, tr;
			
			tr = document.createElement("TR");

			td = document.createElement("TD");
			td.innerText = key;
			tr.appendChild(td);

			td = document.createElement("TD");
			td.innerText = value;
			tr.appendChild(td);

			document.querySelector("tbody").appendChild(tr);
		}	
	})();
	</script>
</body>
</html>