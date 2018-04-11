<!DOCTYPE html>
<?php
require_once './config.php';
require_once './classes/DbClass.php';
?>
<?php
//filter
$field_city = filter_input(INPUT_POST, 'field_city', 513);
$field_city_ascii = filter_input(INPUT_POST, 'field_city_ascii', 513);
$field_province = filter_input(INPUT_POST, 'field_province', 513);
$field_population = filter_input(INPUT_POST, 'field_population', FILTER_VALIDATE_INT);

//what do we need to pass the values in DB
//Name des input Feldes
//Typ definieren und prüfen
//Namen der Spalte in der DB-Tabelle

//////Schema first varient
//$scheme = [];
//$scheme[0] = [];
//$scheme[0]['fieldname'] = 'field_city';
//$scheme[0]['columname'] = 'city';
//$scheme[0]['filter'] = 513;

//////Schema second Varient
$scheme = [
    [
        'fieldname' => 'field_city',
        'columname' => 'city',
        'filter' => 513
    ],
[
        'fieldname' => 'field_city_ascii',
        'columname' => 'city_ascii',
        'filter' => 513
    ],
[
        'fieldname' => 'field_province',
        'columname' => 'province',
        'filter' => 513
    ],
[
        'fieldname' => 'field_population',
        'columname' => 'population',
        'filter' => FILTER_VALIDATE_INT
    ],
    
];

function filterForm($scheme) {
    /////////// 1 Varient
//data Array erstellen 
$data = [];
//Schleife mit $scheme
    foreach ($scheme as $key => $value) { //$value = $scheme[$key]
        $val = filter_input(0, $value['fieldname'], $value['filter']);
        $data[$value['columname']] = $val;
    }
    return $data;
 //$val = filter_input
 //Data Array einfügen  $data['city'] = $val;
 //Schleife ende 
 //return $data
    
    
//  /////2 varient
//    $data = [];
//    foreach ($scheme as $item) {
//        $val = filter_input(0, $item['fieldname'], $item['filter']);
//        $data[$item['columname']] = $val;
//    }
//    return $data;
}

 $data = filterForm($scheme);
 var_dump($data);

//$filter = new FILTR();
//$filter->setFilter('field_population',FILTER_VALIDATE_INT,'population');
//
//$data = $filter->filter(INPUT_POST);
?>

?>
<?php
//daten bank
  $data = [];
//            $data['city'] = 'Pirna';
//            $data['province'] = 'Sachsen';
//            $data['country'] = 'Duetchland';
            $data['iso2'] = 'SA';
//            $data['iso3'] = 'SAC';
     

try {
            $db = new DbClass('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exc) {
                echo $exc->getCode();
            }

            $db->setTableName('tb_cities');
//            $rows = $db->getAllData();
//            $deleted = $db->deletById(14572, 'cityid');
//            echo $db->getTableName();
//            $db->insert($data);
//            $db->update($data, 10); // WHERE id=10
//            $db->update($data, 'Pirna', 'city'); // WHERE id=10
//             $db->update($data, 'Pirna', 'city'); // WHERE city='Pirna'
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP 01 BASIC</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css"/>
        <script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <h3>Tabelle Cities</h3>
            <hr>
            <form method="post" action="index.php">
                <div class="form-group">
                    <label for="field_city">City</label>
                    <input value="Bansin" type="text" class="form-control" id="field_city" name="field_city" placeholder="City Name">
                </div>
                <div class="form-group">
                    <label for="field_city_ascii">City ASCII Code</label>
                    <input value="Bansin" type="text" class="form-control" id="field_city_ascii" name="field_city_ascii" placeholder="City ASCII Code">
                </div>
                <div class="form-group">
                    <label for="field_province">Field Province</label>
                    <input value="Vorpommern" type="text" class="form-control" id="field_province" name="field_province" placeholder="Field Province">
                </div>
                <div class="form-group">
                    <label for="field_population">Field Population</label>
                    <input value="2503" type="number" class="form-control" id="field_population" name="field_population" placeholder="Field Population">
                </div>
                
                
                 <div class="form-group">
                <button type="submit" class="btn btn-outline-success">Senden</button>
                 </div>
            </form>
            
        </div>
        <hr>
        
            
        </div>
        <pre>
<?php
//var_dump($rows[0]);
//var_dump($deleted);
?>
        </pre>
        
    </body>
</html>
