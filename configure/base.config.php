<?php
/*
 * Archivo de configuraci�n de las clases que usaremos
 * Se llama desde Configure::getClass('NombreClase');
 */

/**
 * Engine:  Don't modify.
 */
//$config['factory']						=  PATH_ENGINE . 'factory.class.php';
//$config['sql']							=  PATH_ENGINE . 'sql.class.php';

$config['mail']							=  PATH_ENGINE . 'mail.class.php';
$config['session']						=  PATH_ENGINE . 'session.class.php';
$config['user']							=  PATH_ENGINE . 'user.class.php';
$config['url']							=  PATH_ENGINE . 'url.class.php';
$config['images']						=  PATH_ENGINE . 'images.class.php';
$config['uploader']						=  PATH_ENGINE . 'uploader.class.php';


$config['dispatcher']					=  PATH_ENGINE . 'dispatcher.class.php';

/** 
 * Controllers & Models
 *
 */

// 404 Controller
$config['ErrorError404Controller']		= PATH_CONTROLLERS . 'error/error404.ctrl.php';
$config['ErrorError403Controller']		= PATH_CONTROLLERS . 'error/error403.ctrl.php';
$config['ErrorErrorloginController']	= PATH_CONTROLLERS . 'error/errorlogin.ctrl.php';

// Home Controller
$config['HomeHomeController']			= PATH_CONTROLLERS . 'home/home.ctrl.php';

//project Controllers
$config['ProjectParentController']			= PATH_CONTROLLERS . 'project/parent.ctrl.php';
$config['ProjectMainController']			= PATH_CONTROLLERS . 'project/main.ctrl.php';
$config['ProjectSignUpController']          = PATH_CONTROLLERS . 'project/signup.ctrl.php';
$config['ProjectWelcomeController']         = PATH_CONTROLLERS . 'project/welcome.ctrl.php';
$config['ProjectHomeController']            = PATH_CONTROLLERS . 'project/home.ctrl.php';
$config['ProjectTravelController']          = PATH_CONTROLLERS . 'project/travel.ctrl.php';
$config['ProjectMostrarViatgeController']   = PATH_CONTROLLERS . 'project/mostrarViatge.ctrl.php';
$config['ProjectFollowController']          = PATH_CONTROLLERS . 'project/follow.ctrl.php';
$config['ProjectCommentController']         = PATH_CONTROLLERS . 'project/comment.ctrl.php';
$config['ProjectHashtagController']         = PATH_CONTROLLERS . 'project/hashtag.ctrl.php';
$config['ProjectYourCommentsController']    = PATH_CONTROLLERS . 'project/yourComments.ctrl.php';
$config['ProjectYourTravelsController']     = PATH_CONTROLLERS . 'project/yourTravels.ctrl.php';

//project Models
$config['MainModel']                    = PATH_MODELS      . 'main.model.php';

// Shared controllers
$config['SharedHeadController']			= PATH_CONTROLLERS . 'shared/head.ctrl.php';
$config['SharedFooterController']		= PATH_CONTROLLERS . 'shared/footer.ctrl.php';