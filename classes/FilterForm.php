<?php


class FilterForm {
    private $scheme = [];


    public function __construct() {
        
    }
    
    public function setFilter($field, $filter, $column = false) {
        $c = (!$column) ? $field : $column;
        $this->scheme[] = [
            'fieldname' => $field,
        'columname' => $c,
        'filter' => $filter
        ];
    }
    
    public function getScheme() {
        return $this->scheme;
    }
    
    public function filter($method) {
    /////////// 1 Varient
//data Array erstellen 
$data = [];
//Schleife mit $scheme
    foreach ($this->scheme as $key => $value) { //$value = $scheme[$key]
        $val = filter_input($method, $value['fieldname'], $value['filter']);
        if($val !== false && $val !== NULL){
        $data[$value['columname']] = $val;
        }
    }
    return $data;
 //$val = filter_input
 //Data Array einfügen  $data['city'] = $val;
 //Schleife ende 
 //return $data
    
    
//  /////2 varient
//    $data = [];
//    foreach ($this->scheme as $item) {
//        $val = filter_input(0, $item['fieldname'], $item['filter']);
//        $data[$item['columname']] = $val;
//    }
//    return $data;
}
}
