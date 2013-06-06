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
	/* any waar mogelijk naar num veranderen, dit kan problemen voorkomen zoals bij crud */
	$route['default_controller'] = 'home';


	$route['export/get_excell'] = 'excel_export/get_excell';
	$route['export/to_excell'] = 'excel_export/to_excell';


	/* LOGIN */
	$route['login'] = 'login';
	$route['login/signup'] = 'login/signup';
	$route['login/create_member'] = 'login/create_member';
	$route['login/validate_credentials'] = 'login/validate_credentials';
	$route['uitloggen'] = 'logout';
	/* LOGIN */


	/* NEWS */

	$route['nieuws'] = 'news';
	$route['nieuws/(:any)'] = 'news/view/$1';
	//$route['nieuws/create'] = 'news/create'; deze moet via cms route geregeld worden.
	/* NEWS */


	/* SUBSCRIBE */
	$route['inschrijven'] = 'subscribe';
	$route['inschrijven/get/(:any)'] = 'subscribe/get/$1';
	$route['inschrijven/vak/(:any)'] = 'subscribe/course/$1';
	$route['inschrijven/opgeven'] = 'subscribe/signup';
	$route['inschrijven/opgeven/(:any)'] = 'subscribe/signup/$1';
	$route['inschrijven/getperiod/(:num)/(:any)'] = 'subscribe/getperiod/$1/$2';
	/* SUBSCRIBE */


	/* FAQ */
	$route['faq'] = 'faq';
	$route['faq/(:any)'] = 'faq/view/$1';
	//$route['faq/create'] = 'faq/create'; deze moet via cms route geregeld worden.
	/* FAQ */


	/* PROFILE */
	$route['profiel'] = 'profile';

	/* PROFILE/PERSONEEL */
	$route['inschrijvingen'] = 'getsignups';
	$route['inschrijvingen/vakken(:any)'] = 'getsignups/signups/$1';
	$route['inschrijvingen/periode/(:num)/(:num)'] = 'getsignups/course_summary/$1/$2';
	$route['inschrijvingen/vak/(:any)/(:num)/(:num)'] ='getsignups/courses/$1/$2/$3';
	$route['vakken/excell_export/(:any)/(:num)/(:num)'] ='getsignups/excell_export/$1/$2/$3';

	/* PROFILE/STUDENT */
	$route['mijn-inschrijvingen'] = 'my_enrollment';
	$route['mijn-inschrijvingen/uitschrijven/(:any)'] = 'my_enrollment/unroll/$1';
	/* PROFILE */


	/* CMS */
	$route['admin'] = 'admin';

	/* CMS/FAQ */
	$route['admin/faq'] = 'admin_faq';
	$route['admin/faq/(:num)'] = 'admin_faq/index/$1';
	$route['admin/faq/create'] = 'admin_faq/create';
	$route['admin/faq/read/(:num)'] = 'admin_faq/read/$1';
	$route['admin/faq/update/(:num)'] = 'admin_faq/update/$1';
	$route['admin/faq/delete/(:num)'] = 'admin_faq/delete/$1';

	/* CMS/NEWS */
	$route['admin/nieuws'] = 'admin_news';
	$route['admin/nieuws/(:num)'] = 'admin_news/index/$1';
	$route['admin/nieuws/create'] = 'admin_news/create';
	$route['admin/nieuws/read/(:num)'] = 'admin_news/read';
	$route['admin/nieuws/update/(:num)'] = 'admin_news/update';
	$route['admin/nieuws/delete/(:num)'] = 'admin_news/delete';

	/* CMS/PAGES */
	$route['admin/paginas'] = 'admin_pages';
	$route['admin/paginas/(:num)'] = 'admin_pages/index/$1';
	$route['admin/paginas/read/(:num)'] = 'admin_pages/read';
	$route['admin/paginas/update/(:num)'] = 'admin_pages/update';

	/* CMS/UPLOAD */
	$route['admin/upload'] = 'upload';
	$route['admin/upload/do_upload'] = 'upload/do_upload';
	
	/* CMS/XML_PARSER */
	$route['admin/xml_parser'] = 'xml_parser';
	$route['admin/xml_parser/getxml'] ='xml_parser/getxml';
	/* CMS */


	$route['welcome'] = 'welcome'; /* default CI controller */



/* End of file routes.php */
/* Location: ./application/config/routes.php */