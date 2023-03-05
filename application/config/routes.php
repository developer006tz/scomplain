<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['dashboard/'] = 'Dashboard/index';
$route['login'] = 'Auth/index';
$route['register'] = 'Auth/register';
$route['auth'] = 'Auth/process_login';
$route['logout'] = 'Auth/logout';
$route['add-role'] = 'Dashboard/permissions_add';
$route['create-role'] = 'Dashboard/add_role';
$route['user/view-role'] = 'Dashboard/view_roles';
$route['edit-role/(:num)'] = 'Dashboard/edit_role/$1';
$route['delete-role/(:num)'] = 'Dashboard/delete_role/$1';
$route['update-role/(:num)'] = 'Dashboard/update_role/$1';

// complaints routes
$route['add-complaint']= 'Complaint/index';

// department
$route['departments']= 'Department/index';
$route['add-department'] = 'Department/department_add';
$route['edit-department/(:num)'] = 'Department/department_edit/$1';
$route['delete-department/(:num)'] = 'Department/delete_department/$1';


//Program
$route['programs']= 'Program/index';
$route['add-program'] = 'Program/add';
$route['edit-program/(:num)'] = 'Program/edit/$1';
$route['delete-program/(:num)'] = 'Program/program/$1';


