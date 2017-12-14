<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| AUTO-LOADER
| -------------------------------------------------------------------
| This file specifies which systems should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default. For example,
| the database is not connected to automatically since no assumption
| is made regarding whether you intend to use it.  This file lets
| you globally define which systems you would like loaded with every
| request.
|
| -------------------------------------------------------------------
| Instructions
| -------------------------------------------------------------------
|
| These are the things you can load automatically:
|
| 1. Packages
| 2. Libraries
| 3. Drivers
| 4. Helper files
| 5. Custom config files
| 6. Language files
| 7. Models
|
*/

/*
| -------------------------------------------------------------------
|  Auto-load Packages
| -------------------------------------------------------------------
| Prototype:
|
|  $autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');
|
*/
$autoload['packages'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| These are the classes located in system/libraries/ or your
| application/libraries/ directory, with the addition of the
| 'database' library, which is somewhat of a special case.
|
| Prototype:
|
|	$autoload['libraries'] = array('database', 'email', 'session');
|
| You can also supply an alternative library name to be assigned
| in the controller:
|
|	$autoload['libraries'] = array('user_agent' => 'ua');
*/
$autoload['libraries'] = array('session', 'database', 'form_validation', 'main_lib', 'template', 'pdf');

/*
| -------------------------------------------------------------------
|  Auto-load Drivers
| -------------------------------------------------------------------
| These classes are located in system/libraries/ or in your
| application/libraries/ directory, but are also placed inside their
| own subdirectory and they extend the CI_Driver_Library class. They
| offer multiple interchangeable driver options.
|
| Prototype:
|
|	$autoload['drivers'] = array('cache');
|
| You can also supply an alternative property name to be assigned in
| the controller:
|
|	$autoload['drivers'] = array('cache' => 'cch');
|
*/
$autoload['drivers'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['helper'] = array('url', 'file');
*/
$autoload['helper'] = array('url');

/*
| -------------------------------------------------------------------
|  Auto-load Config files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['config'] = array('config1', 'config2');
|
| NOTE: This item is intended for use ONLY if you have created custom
| config files.  Otherwise, leave it blank.
|
*/
$autoload['config'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Language files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['language'] = array('lang1', 'lang2');
|
| NOTE: Do not include the "_lang" part of your file.  For example
| "codeigniter_lang.php" would be referenced as array('codeigniter');
|
*/
$autoload['language'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['model'] = array('first_model', 'second_model');
|
| You can also supply an alternative model name to be assigned
| in the controller:
|
|	$autoload['model'] = array('first_model' => 'first');
*/
$autoload['model'] = array(
	'Auth_model'	=> 'Auth',
	'User_model'	=> 'User',
	'Unit_model'	=> 'Unit',
	'Vendor_model'	=> 'Vendor',
	'Barang_model'	=> 'Barang',
	'PPB_model'		=> 'PPB',
	'Approval_model'=> 'Approval'
);

function convertToIDdate($date)
{
	//20170731
	$date = str_replace("-", "", $date);
	$hari = substr($date, 6,2);
	$bulan = convertToMonth(substr($date, 4,2));
	$tahun = substr($date, 0,4);

	return $hari." ".$bulan." ".$tahun;
}

function convertToMonth($month)
{
	if($month == '01'){
		$bln = 'Januari';
	} elseif($month == '02'){
		$bln = 'Februari';
	} elseif($month == '03'){
		$bln = 'Maret';
	} elseif($month == '04'){
		$bln = 'April';
	} elseif($month == '05'){
		$bln = 'Mei';
	} elseif($month == '06'){
		$bln = 'Juni';
	} elseif($month == '07'){
		$bln = 'Juli';
	} elseif($month == '08'){
		$bln = 'Agustus';
	} elseif($month == '09'){
		$bln = 'September';
	} elseif($month == '10'){
		$bln = 'Oktober';
	} elseif($month == '11'){
		$bln = 'November';
	} else {
		$bln = 'Desember';
	}

	return $bln;
}

function rewindDate($date)
{
	$date = str_replace("-", "", $date);
	$hari = substr($date, 6,2);
	$bulan = substr($date, 4,2);
	$tahun = substr($date, 0,4);

	return $hari."/".$bulan."/".$tahun;
}