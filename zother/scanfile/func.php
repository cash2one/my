<?
/**
 * ��ȡ��ǰĿ¼����Ŀ¼�µ������ļ�
 * @param string $dir ·����
 * @return array �����ļ���·������
 */
function get_files1($dir) {
    $files = array();
 
    if(!is_dir($dir)) {
        return $files;
    }
 
    $handle = opendir($dir);
    if($handle) {
        while(false !== ($file = readdir($handle))) {
            if ($file != '.' && $file != '..') {
                $filename = $dir . "/"  . $file;
                if(is_file($filename)) {
                    $files[] = $filename;
                }else {
                    $files = array_merge($files, get_files($filename));
                }
            }
        }   //  end while
        closedir($handle);
    }
    return $files;
}  


/*
glob() �������� libc glob() ����ʹ�õĹ���Ѱ�������� pattern ƥ����ļ�·����������һ�� shells ���õĹ���һ������������д��չ����������
����һ��������ƥ���ļ���Ŀ¼�����顣��������� FALSE��
�˺�������������Զ���ļ����������ļ�����ͨ�����������ļ�ϵͳ���ʡ�

*/
/**
 * ��ȡ��ǰĿ¼�µ������ļ�
 * @param string $dir ·����
 * @return array �����ļ���·������
 */
function get_files($dir) {
    $dir = realpath($dir) . "/";
    $files  = array();
 
    if (!is_dir($dir)) {
        return $files;
    }
 
    $pattern =  $dir . "*";
    $file_arr = glob($pattern);
 
    foreach ($file_arr as $file) {
        if (is_dir($file)) {
            $temp = get_files($file);
 
            if (is_array($temp)) {
                $files = array_merge($files, $temp);
            }
        }else {
            $files[] = $file;
        }   //  end if
    }
    return $files;
}   //  end function


/*
���Ǹ���ð�������Ļ�������ȡһ��Ŀ¼��
dir() ������һ��Ŀ¼�����������һ��������������������������read() , rewind() �Լ� close()���������������Կ��á�handle ���Կ�����������Ŀ¼�������� readdir()��rewinddir() �� closedir() �С�path ���Ա���Ϊ���򿪵�Ŀ¼·����
���ɹ�����ú�������һ��Ŀ¼�������򷵻� false �Լ�һ�� error������ͨ���ں�����ǰ���� ��@�� ������ error �������

ע��: read �������ص�Ŀ¼���˳��������ϵͳ��
ע��: �������������ڲ��� Directory����ζ�Ų�������ͬ�������ֶ����û��Լ����ࡣ

*/

/**
 * �ݹ���ʾ��ǰָ��Ŀ¼�������ļ�
 * ʹ��dir����
 * @param string $dir Ŀ¼��ַ
 * @return array $files �ļ��б�
 */
function get_files3($dir) {
    $files = array();
 
    if (!is_dir($dir)) {
        return $files;
    }
 
    $d = dir($dir);
    while (false !== ($file = $d->read())) {
        if ($file != '.' && $file != '..') {
            $filename = $dir . "/"  . $file;
 
            if(is_file($filename)) {
                $files[] = $filename;
            }else {
                $files = array_merge($files, get_files($filename));
            }
        }
    }
    $d->close();
    return $files;
}



/**
 * �˷�����PHP 5.0��Ч
 * ʹ��RecursiveDirectoryIterator�����ļ����г������ļ�·��
 * @param RecursiveDirectoryIterator $dir ָ����Ŀ¼��RecursiveDirectoryIteratorʵ��
 * @return array $files �ļ��б�
 */
function get_files4($dir) {
    $files = array();
 
    for (; $dir->valid(); $dir->next()) {
        if ($dir->isDir() && !$dir->isDot()) {
            if ($dir->haschildren()) {
                $files = array_merge($files, get_files($dir->getChildren()));
            };
        }else if($dir->isFile()){
            $files[] = $dir->getPathName();
        }
    }
    return $files;
}
/*$path = "/var/www";
$dir = new RecursiveDirectoryIterator($path);
print_r(get_files($dir));
*/ 

$dir = "K:\picture\0a";
var_dump(get_files1($dir));
?>