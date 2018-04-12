<?php 
    
    if ($foundCars != NULL) {
        $columns = array_keys($foundCars[0]);    
    } else {
        die();
    }
    
?>

<table>
    <tr>
        <th>Year</th>
        <th>Make</th>
        <th>Model</th>
        <th>Verhicle Row</th>
    </tr>
        <?php foreach($foundCars as $car) : ?>
        <tr>
            <td><?= $car['iYEAR'] ?></td>
            <td><?= $car['MAKE'] ?></td>
            <td><?= $car['MODEL'] ?></td>
            <td><?= $car['VEHICLE_ROW'] ?></td>
            
        </tr>
        <?php endforeach; ?>
    
</table>
