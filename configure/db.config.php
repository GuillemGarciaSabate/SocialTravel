<?php

if( DEV_MODE )
{

	$config['default']['db_driver']		= 'mysqli';
	$config['default']['db_host']		= 'localhost';
	$config['default']['db_user']		= 'root';
	$config['default']['db_password']	= 'root';
	$config['default']['db_name']		= 'socialtravel';

	/*$config['default']['db_host']		= 'sql5.freemysqlhosting.net';
	$config['default']['db_user']		= 'sql577162';
	$config['default']['db_password']	= 'pQ7!yB1!';
	$config['default']['db_name']		= 'sql577162';*/
	//$config['default']['db_port']		= '3306';

	/*$config['default']['db_host']		= 'db4free.net';
	$config['default']['db_user']		= 'grup4';
	$config['default']['db_password']	= 'lasalle';
	$config['default']['db_name']		= 'socialtravel';
	$config['default']['db_port']		= '3306';*/

}
else
{
	$config['default']['db_driver']		= 'mysqli';
	$config['default']['db_host']		= 'db4free.net';
	$config['default']['db_user']		= 'grup4';
	$config['default']['db_password']	= 'lasalle';
	$config['default']['db_name']		= 'socialtravel';
	$config['default']['db_port']		= '3306';


}