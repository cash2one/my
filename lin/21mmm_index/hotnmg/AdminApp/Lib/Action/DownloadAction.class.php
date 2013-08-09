<?php 
/**
 * 
 * Download(下载)
 *
 * @package      	shuguangCMS_Corp
 * @author          shuguang QQ:5565907 <web@sgcms.cn>
 * @copyright     	Copyright (c) 2008-2010  (http://www.sgcms.cn)
 * @license         http://www.sgcms.cn/license.txt
 * @version        	$Id: DownloadAction.class.php v2.0 2010-01-01 06:59:03 shuguang $

 */

class DownloadAction extends GlobalAction
{
    protected $category, $dao;
    function _initialize()
    {
        parent::_initialize();
        $getData = getCache('Config');
        $data['runSystem'] = $getData['run_system'];
        //取所有分类，过滤出新闻模块主ID
        $category = D('Category')->Order('display_order DESC,id DESC')->findAll();
        foreach ((array)$category as $row){
            if($row['module'] == 'Download'){
                $parentId = $row['id'];
            }
        }
        //取主ID下属分类
        $this->assign('parentId', $parentId);
        $this->assign('category', $category);
        $this->assign($data);
        $this->dao = D('Download');
    }

    /**
     * 列表
     *
     */
    public function index()
    {
        //parent::_checkPermission();
        $condition = array();
        $title = formatQuery($_GET['title']);
        $orderBy = trim($_GET['orderBy']);
        $orderType = trim($_GET['orderType']);
        $recommend = intval($_GET['recommend']);
        $categoryId = intval($_GET['categoryId']);
        $status =  intval($_GET['status']);
        $istop = intval($_GET['istop']);
        $createTime = trim($_GET['createTime']);
        $createTime1 = trim($_GET['createTime1']);
        $viewCount = intval($_GET['viewCount']);
        $viewCount1 = intval($_GET['viewCount1']);
        $setOrder = setOrder(array(array('viewCount', 'a.view_count'),'a.id'), $orderBy, $orderType, 'a');
        $setTime = setTime($createTime, $createTime1);
        $setViewCount = setViewCount($viewCount, $viewCount1);
        $pageSize = intval($_GET['pageSize']);
        $title &&  $condition['a.title'] = array('like', '%'.$title.'%');
        $recommend &&  $condition['a.recommend'] = array('eq', $recommend);
        $categoryId &&  $condition['a.category_id'] = array('eq', $categoryId);
        $status && $condition['a.status'] = array('eq', $status);
        $istop &&  $condition['a.istop'] = array('eq', $istop);
        $createTime1 && $condition['a.create_time'] = array('between', $setTime);
        $viewCount1 && $condition['a.view_count'] = array('between', $setViewCount);
        $count = $this->dao->where($condition)->count();
        $listRows = empty($pageSize) || $pageSize > 100 ? 15 : $pageSize ;
        $p = new page($count, $listRows);
        $dataList = $this->dao->Table(C('DB_PREFIX').'download a')->Join(C('DB_PREFIX').'category b on a.category_id=b.id')->Field('a.*,b.title as category')->Order($setOrder)->Where($condition)->Limit($p->firstRow.','.$p->listRows)->findAll();
        $page = $p->show();
        if($dataList !== false)
        {
            $this->assign('page', $page);
            $this->assign('dataList', $dataList);
        }
        parent::_sysLog('index');
        $this->display();
    }

    /**
     * 录入
     *
     */
    public function insert()
    {
        parent::_checkPermission();
        $this->display();
    }

    /**
     * 提交录入
     *
     */
    public function doInsert()
    {
        parent::_checkPermission('Download_insert');
        parent::_setMethod('post');
        if($daoCreate = $this->dao->create())
        {
            $style = createStyle($_POST);
            $this->dao->title_style = $style['title_style'];
            $this->dao->title_style_serialize = $style['title_style_serialize'];
            $this->dao->tags = formatTags($_POST['tags']);
            $this->dao->user_id = parent::_getAdminUid();
            $this->dao->username = parent::_getAdminName();
            $uploadFile = upload($this->getActionName());
            if ($uploadFile)
            {
                $this->dao->attach = 1;
                $this->dao->attach_image = formatAttachPath($uploadFile[0]['savepath']) . $uploadFile[0]['savename'];
                $this->dao->attach_thumb = fileExit($uploadFile[0]['savepath'] . splitThumb($uploadFile[0]['savename'])) ? formatAttachPath($uploadFile[0]['savepath']) . splitThumb($uploadFile[0]['savename']) : '' ;

            }
            $daoAdd = $this->dao->add();
            if(false !== $daoAdd)
            {
                parent::_tags('insert', $_POST['tags'], $daoAdd);
                parent::_sysLog('insert', "录入:$daoAdd");
                parent::_message('success', '录入成功');
            }else
            {
                parent::_message('error', '录入失败');
            }
        }else
        {
            parent::_message('error', $this->dao->getError());
        }
    }

    /**
     * 编辑
     *
     */
    public function modify()
    {
        parent::_checkPermission();
        $item = intval($_GET["id"]);
        $record = $this->dao->Where('id='.$item)->find();
        if (empty($item) || empty($record)) parent::_message('error', '记录不存在');
        $this->assign('vo', $record);
        $this->display();
    }

    /**
     * 提交编辑
     *
     */
    public function doModify()
    {
        parent::_checkPermission('Download_modify');
        parent::_setMethod('post');
        $item = intval($_POST['id']);
        empty($item) && parent::_message('error', '记录不存在');
        if($doaCreate = $this->dao->create())
        {
            $style = createStyle($_POST);
            $this->dao->title_style = $style['title_style'];
            $this->dao->title_style_serialize = $style['title_style_serialize'];
            $this->dao->tags = formatTags($_POST['tags']);
            $uploadFile = upload($this->getActionName());
            if ($uploadFile)
            {
                $this->dao->attach = 1;
                $this->dao->attach_image = formatAttachPath($uploadFile[0]['savepath']) . $uploadFile[0]['savename'];
                $this->dao->attach_thumb = fileExit($uploadFile[0]['savepath'] . splitThumb($uploadFile[0]['savename'])) ? formatAttachPath($uploadFile[0]['savepath']) . splitThumb($uploadFile[0]['savename']) : '' ;

                @unlink('./'.$this->upload.$_POST['old_image']);
                @unlink('./'.$this->upload.$_POST['old_thumb']);
            }
            $daoSave = $this->dao->save();
            if(false !== $daoSave)
            {
                parent::_tags('modify', $_POST['tags'], $item);
                parent::_sysLog('modify', "编辑:$item");
                parent::_message('success', '更新完成');
            }else
            {
                parent::_message('error', '更新失败');
            }
        }else
        {
            parent::_message('error', $this->dao->getError());
        }
    }

    /**
     * 批量操作
     *
     */
    public function doCommand()
    {
        parent::_checkPermission('Download_command');
        if(getMethod() == 'get'){
            $operate = trim($_GET['operate']);
        }elseif(getMethod() == 'post'){
            $operate = trim($_POST['operate']);
        }else{
            parent::_message('error', '只支持POST,GET数据');
        }
        $newCategory = intval($_POST['newCategory']);
        switch ($operate){
            case 'delete': parent::_delete(0, 0, array('attach_image', 'attach_thumb'));break;
            case 'recommend': parent::_recommend('set');break;
            case 'unRecommend': parent::_recommend('unset');break;
            case 'setTop': parent::_setTop('set');break;
            case 'unSetTop': parent::_setTop('unset');break;
            case 'setStatus': parent::_setStatus('set');break;
            case 'unSetStatus': parent::_setStatus('unset');break;
            case 'update': parent::_batchModify(0, $_POST, array('title'));break;
            case 'move': parent::_move($newCategory);break;
            default: parent::_message('error', '操作类型错误') ;
        }

    }
}
