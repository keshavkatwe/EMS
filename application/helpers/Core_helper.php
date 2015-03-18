<?php

function variable_dump($var) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

function get_departments($department_id = NULL) {
    $CI =& get_instance();
    
    $CI->load->model('department_model');
    $departments = $CI->department_model->fetch_departments();
    
    $department_string = "";
    
    foreach ($departments as $depart) {
        $is_selected = '';
        if($department_id == $depart['department_id'])
        {
            $is_selected = 'selected';
        }
        $department_string.='<option value="'.$depart['department_id'].'" '.$is_selected.'>'.$depart['department_name'].'</option>';
    }
    
    return $department_string;
}


function get_semester($sem_id = NULL) {
    $semisters = array(
        0 => '1',
        1 => '2',
        2 => '3',
        3 => '4',
        4 => '5',
        5 => '6',
    );
    
    
    $semester_string = "";
    
    foreach ($semisters as $sem) {
        $is_selected = '';
        if($sem == $sem_id)
        {
            $is_selected = 'selected';
        }
        $semester_string.='<option value="'.$sem.'" '.$is_selected.'>'.$sem.'</option>';
    }
    
    return $semester_string;
}

function singledigit($number){
    switch($number){
        case 1:$word = "First";break;
        case 2:$word = "Second";break;
        case 3:$word = "Third";break;
        case 4:$word = "Fourth";break;
        case 5:$word = "Fifth";break;
        case 6:$word = "Sixth";break;
    }
    return $word;
}


function getSemValues(){
    $semisters = array(
        0 => '1',
        1 => '2',
        2 => '3',
        3 => '4',
        4 => '5',
        5 => '6',
    );
    return $semisters;
}