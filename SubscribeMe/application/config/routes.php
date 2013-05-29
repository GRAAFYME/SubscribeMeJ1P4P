<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if thes
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
	/* LDAP login */
	$route['default_controller'] = 'home';

	$route['nieuws'] = 'news';
	$route['nieuws/(:any)'] = 'news/view/$1';
	$route['nieuws/create'] = 'news/create';

	$route['inschrijven'] = 'subscribe';
	$route['inschrijven/get/(:any)'] = 'subscribe/get/$1';
	$route['inschrijven/getall'] = 'subscribe/getall';
	$route['inschrijven/vak/(:any)'] = 'subscribe/course/$1';
	$route['inschrijven/opgeven'] = 'subscribe/signup';
	$route['inschrijven/opgeven/(:any)'] = 'subscribe/signup/$1';

	$route['faq'] = 'faq';
	$route['faq/(:any)'] = 'faq/view/$1';
	$route['faq/create'] = 'faq/create';

	/* Profile */

	/* CMS */

	$route['upload'] = 'upload';
	$route['upload/do_upload'] = 'upload/do_upload';
	
	$route['xml_parser'] = 'xml_parser';
	$route['xml_parser/getxml'] ='xml_parser/getxml';

	$route['login'] = 'login';
	$route['verifylogin'] = 'verifylogin';
	$route['login/signup'] = 'login/signup';
	$route['login/create_member'] = 'login/create_member';
	$route['login/validate_credentials'] = 'login/validate_credentials';
	$route['uitloggen'] = 'logout';

	$route['welcome'] = 'welcome'; /* default CI controller */

/* End of file routes.php */
/* Location: ./application/config/routes.php */