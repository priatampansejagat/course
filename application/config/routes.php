<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/


$route['default_controller'] = 'User';
// $route['404_override'] = '';
// $route['translate_uri_dashes'] = FALSE;


$route['contohpath'] = 'registered/Basecontroller/index';

// auth
$route['register'] = 'User/register';
$route['login'] = 'User/auth';
$route['logout'] = 'User/logout';
$route['setting'] = 'User/setting';

// page user
$route['visitor'] = 'User/index';
$route['courselist'] = 'User/courseList';
$route['coursedetail/(:any)'] = 'User/courseDetail/$1';
$route['eventlist'] = 'User/eventList';
$route['eventdetail/(:any)'] = 'User/eventDetail/$1';
$route['classdetail/(:any)'] = 'User/classDetail/$1';
$route['classdetail/lesson/(:any)/(:any)'] = 'User/classVideo/$1/$2';
$route['eventdetail/lesson/(:any)/(:any)'] = 'User/classVideo/$1/$2';
$route['payment'] = 'User/payment';
$route['paymentconfirmation/(:any)'] = 'User/paymentConfirmation/$1';
$route['coursedetail/registcourse/(:any)'] = 'User/registCourse/$1';
$route['eventdetail/registevent/(:any)'] = 'User/registEvent/$1';
$route['mentordetail/(:any)'] = 'User/mentorDetail/$1';
$route['mycourse'] = 'User/myCourse';
$route['myevent'] = 'User/myEvent';
$route['myeventdetail/(:any)'] = 'User/myEventDetail/$1';
$route['myeventdetail/classdetail/(:any)/(:any)'] = 'User/myClassEventDetail/$1/$2';
$route['invoice'] = 'User/invoice';

// registered entity
$route['home'] = 'admin/HomeController/index';
$route['users/(:any)'] = 'admin/UsersController/single_user/$1';
$route['participant'] = 'admin/PesertaController/index';
$route['mentor'] = 'admin/MentorController/index';
$route['course'] = 'admin/CourseController/index';
$route['course/(:any)'] = 'admin/CourseController/courseBy_id/$1';
$route['course/participant/(:any)'] = 'admin/CourseController/course_participant/$1';
$route['adm_event'] = 'admin/EventController/index';
$route['adm_event/(:any)'] = 'admin/EventController/eventBy_id/$1';
$route['adm_event/participant/(:any)'] = 'admin/EventController/event_participant/$1';
$route['adm_event/gallery/(:any)'] = 'admin/EventController/event_gallery/$1';
