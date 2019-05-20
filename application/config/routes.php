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
$route['default_controller'] = 'site';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'usuarios/login';
$route['registrar'] = 'usuarios/register';
$route['sair'] = 'usuarios/logout';
$route['dashboard'] = 'usuarios';
$route['recovery'] = 'usuarios/redefine_password';
$route['forgetpassword'] = 'usuarios/forget_password';
$route['administrativo/novoprofessor'] = 'adms/criarprofessor';
$route['administrativo/excluirusuarios'] = 'adms/excluirusuarios';
$route['administrativo/novamateria'] = 'adms/criarmateria';
$route['administrativo/configs'] = 'adms/config_site';
$route['administrativo/fazerbackup'] = 'adms/fazerbackup';
$route['perfil'] = 'usuarios/perfil';
$route['perfil/(:any)'] = 'usuarios/perfil/$1';
$route['turma/(:any)'] = 'turmas/view/$1';
$route['turma/(:any)/(:any)'] = 'turmas/view/$1/$2';
$route['turma/(:any)/excluir/(:num)'] = 'professor/excluirLista/$1/$2';
$route['criarlista/turma/(:any)'] = 'professor/cadastrarQuestoes/$1';
$route['turma/(:any)/editar/(:num)'] = 'professor/editarLista/$1/$2';
$route['turma/(:any)/lista/(:num)/delfoto/(:num)'] = 'professor/excluirfotolista/$1/$2/$3';
$route['aviso/turma/(:any)'] = 'professor/avisos/$1';
$route['turma/(:any)/corrigir/(:num)/(:num)'] = 'professor/corrigirlista/$1/$2/$3';
$route['turma/(:any)/responder/(:num)'] = 'alunos/responderlista/$1/$2';
$route['turma/(:any)/respostas/(:num)'] = 'professor/listaresposta/$1/$2';
$route['turma/(:any)/reggabarito/(:num)'] = 'professor/registrar_gabarito/$1/$2';
$route['turma/(:any)/vergabarito/(:num)'] = 'alunos/ver_gabarito/$1/$2';
$route['alunos/boletim'] = 'alunos/meuboletim';

$route['turma/(:any)/pdf/(:num)/(:num)'] = 'pdf/resposta_lista/$1/$2/$3';