<!DOCTYPE html>
<?php
require_once './config.php';
require_once './classes/DbClass.php';
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
            
            <?php
            $data = [];
            $data['city'] = 'Pirna';
            $data['province'] = 'Sachsen';
            $data['country'] = 'Duetchland';
            
            
            
            try {
            $db = new DbClass('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exc) {
                echo $exc->getCode();
            }

            $db->setTableName('tb_cities');
            $rows = $db->getAllData();
//            $deleted = $db->deletById(14572, 'cityid');
//            echo $db->getTableName();
            $db->insert($data);
            ?>
            
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
