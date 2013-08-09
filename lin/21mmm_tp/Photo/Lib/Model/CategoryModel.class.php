<?
class CategoryModel extends Model {
	
	var $arr = array();
	public function __construct(){
		Model::__construct();
		$this->cache = F('category');
		if(!$this->cache){
			$this->getAllChild(0);
			$this->cache = $this->arr;
			F('category',$this->cache);
		}
	}
	
	/**
     * ����1�������Ϣ
     * @param mixed $id  ���ID
     * @return record
     */
	public function getOne($id,$code = ''){
		if($code){
			//ͨ��code
			return  $this->find($id);
		}
		return $this->find($id);
		//Ĭ��ͨ��id
	}

	/*
     * ���������������
     * @param mixed $id  ��ID
     * @return string
     */
	public function getChild($pid,$deep = 0){
		if(!$deep){
			return $this->where("parentid = $pid")->select();
		}else{
			
		}
	}
	
	public function getAllChild($pid){
		$r = $this->where("parentid = $pid")->select();
		if($r){
			foreach($r as $k => $v){
				$this->arr[] = $v;
				if($this->hasChild($v['id'])){
					$this->getAllChild($v['id']);
				}
			}
		}
	}
	
	/*
     * �Ƿ��������
     * @param mixed $id  
     * @return string
     */
	public function hasChild($id){
		if($this->cache){
			foreach($this->cache as $k => $v){
				if($v['parentid'] == $id){
					return true;
				}
			}
		}else{ //�޻���ʱ�������в�ѯ
			$r = $this->where("parentid = $id")->select();
			if($r){
				return true;
			}
		}
	}
	
	/**
     * ���»���
     */
	public function updateCache(){
		$this->getAllChild(0);
		$this->cache = $this->arr;
		F('category',$this->cache);
	}
	
	/**
	 * ���������б��
	 *
	 * @param unknown_type $cid
	 * @param unknown_type $parentid
	 * @param unknown_type $type
	 * @param unknown_type $lel
	 * @param unknown_type $act
	 * @return unknown
	 */
	function createSelecte($cid,$parentid,$type,$lel=0,$act="")
	{
		$html="<select id='cid' name='cid'>";
		switch($act){
			case 1:
				$html="<select id=catid name=catid onchange=\"showsubslt(this.value)\">";
				break;
			case 2:
				$html="<select id=catid name=catid onchange=\"location.href='?type={$type}&catid='+this.value\">";
				break;
			case 3:
				$html.="<option value=0>����</option>";
				break;
			case 4:
				$html.="<option value=''>��ѡ��</option>";
				break;
			default:
				$html.="<option value=0>�����</option>";
		}
		$html.=$this->createOption($cid,$parentid,$type,$lel,$act);
		$html.="</select>";
		
		return $html;
	}
	
	/**
	 * ���������б���е�ֵ
	 *
	 * @param unknown_type $cid
	 * @param unknown_type $parentid
	 * @param unknown_type $type
	 * @param unknown_type $lel
	 * @param unknown_type $act
	 * @return unknown
	 */
	function createOption($cid,$parentid,$type,$lel=0,$act=""){
		if(!$this->cache)return;
		$t="";
		for($i=0;$i<$lel;$i++){
			$t.="&nbsp;&nbsp;&nbsp;";
		}
		
		foreach($this->cache as $key =>$v){
			if($v['parentid']==$parentid){
				if($this->hasChild($v['id'])){
					
					if($cid== $v['id']){
						$html.="<option value={$v['id']} selected>{$t}{$v['title']}</option>";
					}else{
						$html.="<option value={$v['id']}>{$t}{$v['title']}</option>";
					}
					$lel++;
					$html.=$this->createOption($cid,$v['id'],$type,$lel,$act);
					$lel--;
				}else{
					if($cid==$v['id']){
						$html.="<option value={$v['id']} selected>{$t}{$v['title']}</option>";
					}else{
						$html.="<option value={$v['id']}>{$t}{$v['title']}</option>";
					}
				}
			}
		}
		return $html;
	}

}
?>