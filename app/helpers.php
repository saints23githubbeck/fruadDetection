<?php
if (!function_exists('activeSegment')) {
    function activeSegment($name, $segment = 2, $class = 'active')
    {
        return request()->segment($segment) == $name ? $class : '';
    }
}
// this function replace permission array "on" parameter with "true"
function permissions_filter(array $permission)
{
    foreach ($permission as $key => $value) {
        $permissions = str_replace($value, 'true', $permission);
    }

    return json_encode($permissions);
}

// this function  all permission names
function permission_name($permission)
{
    $permission = json_decode($permission);
    $permission = collect($permission);
    $name = array();
    foreach ($permission as $key => $value) {
        $name[] = $key;
    }

    return $name;
}

// this function return user role id please check user edit form..!!!
function role_name($user)
{
    $ids = array_pluck($user->role, 'id');
    return $ids;
}