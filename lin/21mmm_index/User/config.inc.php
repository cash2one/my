<?php

//ucexample_2.php �õ���Ӧ�ó������ݿ����Ӳ���
$dbhost = 'localhost';			// ���ݿ������
$dbuser = '21mmm';			// ���ݿ��û���
$dbpw = 'lin21mmm';				// ���ݿ�����
$dbname = '21mmm_tp';			// ���ݿ���
$pconnect = 0;				// ���ݿ�־����� 0=�ر�, 1=��
$tablepre = 'example_';   		// ����ǰ׺, ͬһ���ݿⰲװ�����̳���޸Ĵ˴�
$dbcharset = 'gbk';			// MySQL �ַ���, ��ѡ 'gbk', 'big5', 'utf8', 'latin1', ����Ϊ������̳�ַ����趨

//ͬ����¼ Cookie ����
$cookiedomain = ''; 			// cookie ������
$cookiepath = '/';			// cookie ����·��

// ============================================================================
// ucenter����

define('UC_CONNECT', 'mysql');
define('UC_DBHOST', 'localhost');
define('UC_DBUSER', '21mmm');
define('UC_DBPW', 'lin21mmm');
define('UC_DBNAME', '21mmm_ucenter');
define('UC_DBCHARSET', 'gbk');
define('UC_DBTABLEPRE', '`21mmm_ucenter`.uc_');
define('UC_DBCONNECT', '0');
define('UC_KEY', '2089z72im0dHgJ+dXf+9khzdvkkZ61eKDwjkZZY');
define('UC_API', 'http://www.21mmm.com/uc_server');
define('UC_CHARSET', 'gbk');
define('UC_IP', '');
define('UC_APPID', '6');
define('UC_PPP', '20');
