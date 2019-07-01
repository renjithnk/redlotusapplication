<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['admin-login'] = 'welcome/admin_login'; 
$route['admin-add-product'] = 'admin/admin_add_product';
$route['admin-view-product'] = 'admin/admin_view_product';
$route['insert-product'] = 'admin/insert_product'; 
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;  

$route['user-view-product']='User_executive';  
$route['user-login']='User_executive/user_login'; 
$route['user-view-product/(:any)']='User_executive/particular'; 
$route['user-order-checkout']='User_executive/order_view';
$route['user-view-orders']='User_executive/user_order_view';
$route['user-categories']='User_executive/user_categories';
$route['user-login-check']='User_executive/user_login_check';
$route['admin-view-orders']='admin/admin_view_orders';
/*
| -------------------------------------------------------------------------
| Routes form javascript
| -------------------------------------------------------------------------
*/ 
$route['executive-place-order']='User_executive/place_order';
$route['executive-delete-cart']='User_executive/delete_cart';
$route['executive-add-to-cart']='User_executive/add_to_cart';
$route['admin-login-check'] = 'admin/admin_login';
$route['admin-dashboard'] = 'admin/dashboard'; 
$route['images-upload']='admin/images_upload'; 
$route['images-remove']='admin/images_remove';
$route['images-list_files']='admin/images_list_files';
$route['admin-product-check']='admin/admin_product_check';
$route['admin-update-sock']='admin/admin_update_sock';

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
