<?php
// Get randor array item
function get_random(array $arr) {
    $rand_item = array_rand($arr, 2);
    return $arr[$rand_item[0]];
}

function get_surname() {
    $surnames = [
        __('surname-1', 'usergenerator'),
        __('surname-2', 'usergenerator'),
        __('surname-3', 'usergenerator'),
        __('surname-4', 'usergenerator'),
        __('surname-5', 'usergenerator'),
        __('surname-6', 'usergenerator'),
        __('surname-7', 'usergenerator'),
        __('surname-8', 'usergenerator'),
        __('surname-9', 'usergenerator'),
        __('surname-10', 'usergenerator'),
        __('surname-11', 'usergenerator'),
        __('surname-12', 'usergenerator'),
        __('surname-13', 'usergenerator'),
        __('surname-14', 'usergenerator'),
        __('surname-15', 'usergenerator')
    ];

    return get_random($surnames);
}
function get_woman_name() {
    $woman_names = [
        __('woman-name-1', 'usergenerator'),
        __('woman-name-2', 'usergenerator'),
        __('woman-name-3', 'usergenerator'),
        __('woman-name-4', 'usergenerator'),
        __('woman-name-5', 'usergenerator'),
        __('woman-name-6', 'usergenerator'),
        __('woman-name-7', 'usergenerator'),
        __('woman-name-8', 'usergenerator'),
        __('woman-name-9', 'usergenerator'),
        __('woman-name-10', 'usergenerator'),
        __('woman-name-11', 'usergenerator'),
        __('woman-name-12', 'usergenerator'),
        __('woman-name-13', 'usergenerator'),
        __('woman-name-14', 'usergenerator'),
        __('woman-name-15', 'usergenerator')
    ];
    
    return get_random($woman_names);
}

function get_man_name() {
    $man_names = [
        __('man-name-1', 'usergenerator'),
        __('man-name-2', 'usergenerator'),
        __('man-name-3', 'usergenerator'),
        __('man-name-4', 'usergenerator'),
        __('man-name-5', 'usergenerator'),
        __('man-name-6', 'usergenerator'),
        __('man-name-7', 'usergenerator'),
        __('man-name-8', 'usergenerator'),
        __('man-name-9', 'usergenerator'),
        __('man-name-10', 'usergenerator'),
        __('man-name-11', 'usergenerator'),
        __('man-name-12', 'usergenerator'),
        __('man-name-13', 'usergenerator'),
        __('man-name-14', 'usergenerator'),
        __('man-name-15', 'usergenerator')
    ];
    
    return get_random($man_names);
}

