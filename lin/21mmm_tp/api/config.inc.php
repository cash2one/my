<?php

//ucexample_2.php �õ���Ӧ�ó������ݿ����Ӳ���
$dbhost = 'localhost';			// ���ݿ������
$dbuser = 'root';			// ���ݿ��û���
$dbpw = '';				// ���ݿ�����
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
define('UC_DBUSER', 'root');
define('UC_DBPW', '');
define('UC_DBNAME', '21mmm_ucenter');
define('UC_DBCHARSET', 'gbk');
define('UC_DBTABLEPRE', '`21mmm_ucenter`.uc_');
define('UC_DBCONNECT', '0');
define('UC_KEY', '2089z72im0dHgJ+dXf+9khzdvkkZ61eKDwjkZZY');
define('UC_API', 'http://tp.21mmm.cn/uc_server');
define('UC_CHARSET', 'gbk');
define('UC_IP', '');
define('UC_APPID', '6');
define('UC_PPP', '20');
