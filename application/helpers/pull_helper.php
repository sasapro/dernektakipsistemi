<?php
/**
 * Created by PhpStorm.
 * User: sameds
 * Date: 24.09.2018
 * Time: 21:39
 */

function person_group_item_pull($id,$column)
{
    $ci = get_instance();
    $ci->load->model("person_model");
    $value = $ci->person_model->person_group_item_pull($id,$column);
    return $value;
}