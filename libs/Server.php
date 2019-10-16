<?php
	define('SERVERTYPE','local');
	define('URL',SERVERTYPE == 'local' ? '/dev_growth_adaptability_recruitment/' : '/dev_growth_adaptability_recruitment/');
	
	/*DATABASE CONNECTION*/

	// define('DATABASE_HOST',SERVERTYPE == 'local' ? 'dt0014' : 'localhost');
	// define('DATABASE_USER',SERVERTYPE == 'local' ? 'root' : 'jobaccou_user');
	// define('DATABASE_PASS',SERVERTYPE == 'local' ? '' : '.{7=J0^Qd50I');
	// define('DATABASE_NAME',SERVERTYPE == 'local' ? 'jobaccou_gat_recruitment' : (SERVERTYPE == 'test' ? 'jobaccou__test_gat_recruitment' : (SERVERTYPE == 'local' ? 'jobaccou_gat_recruitment' : '')));

	define('DATABASE_HOST', 'localhost');
	define('DATABASE_USER', 'root');
	define('DATABASE_PASS', '');
	define('DATABASE_NAME', 'jobaccou_gat_recruitment');

	define('DOMAIN_DS',SERVERTYPE == 'local' ? 'http://dt036/dev_ejournal.v2/' : (SERVERTYPE == 'test' ? 'http://test-admin-v2.dashsuccess.com/' : (SERVERTYPE == 'local' ? 'http://adminv2.dashsuccess.com' : '')));
	
	date_default_timezone_set('Asia/Taipei');
	
	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', 300);
	ini_set('session.gc_maxlifetime', 60*60*24);