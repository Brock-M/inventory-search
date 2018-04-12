<?php require_once('db_interface.php'); ?>
<?php 
    $car = new Car();
    $makes = $car->getMakes();
    $cars = $car->getCars();
    sort($makes);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Auto Salvage Yard</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<form id="carsForm">
	<table class="position" width="100%" cellpadding="0" cellspacing="0" border="0">
		<tbody>
			<tr valign="top">
				<td id="InventorySearch" width="50%">
					<div class="InventoryModule">
						<div class="block">
							<div class="blockheader">
								<h3 class="t">
									<span>Inventory Search</span>
								</h3>
							</div>
							<div class="blockcontent">
								<div id="contentPane">
									<div class="Normal">
										<div id="make-list">
											<label>Select Make:</label>
											<select name="make-select" id="makes" onchange="getModelsAJAX(this.value);showModels();">
												<option>Select Make</option>
												<?php foreach($makes as $m) : ?>
            									    <option><?= $m ?></option>
            									<?php endforeach; ?>
											</select>
										</div>
										<div id="model-list">
											<label for="models">Select Model:</label>
											<select name="model-select" id="models" onchange="getMakeModel()"></select>
										</div>
										<div id="result"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</form>
<script src="js/dropdown.js"></script>
</body>
</html>