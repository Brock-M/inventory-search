<?php 
    require_once('db_interface.php');
    
    (isset($_POST['action'])) ? $action = $_POST['action'] : $action = $_GET['action']; 
    
    $car = new Car();

    if ($action == 'getmodels') {
        $models = $car->getModels(urldecode($_GET['make']));
        $modelString = '';
        
        foreach($models as $model) {
            $modelString .= "<option>";
            $modelString .= $model;
            $modelString .= "</option>";
        }
        
        echo $modelString;
    } else if ($action == 'getCarsByMakeModel') {
        $foundCars = $car->getByMakeModel(urldecode($_GET['make']), urldecode($_GET['model']));

        include 'views/carTable.php';
    } 
?>
