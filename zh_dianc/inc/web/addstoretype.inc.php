<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
	$info = pdo_get('wpdc_storetype',array('uniacid' => $_W['uniacid'],'id'=>$_GPC['id']));
		if(checksubmit('submit')){
			$data['img']=$_GPC['img'];
			$data['num']=$_GPC['num'];
			$data['type_name']=$_GPC['type_name'];
			$data['uniacid']=$_W['uniacid'];
			$data['commission2']=$_GPC['commission2'];
            $data['commission']=$_GPC['commission'];
            $data['poundage']=$_GPC['poundage'];
			if($_GPC['id']==''){				
				$res=pdo_insert('wpdc_storetype',$data);
				if($res){
					message('添加成功',$this->createWebUrl('storetype',array()),'success');
				}else{
					message('添加失败','','error');
				}
			}else{
				$res = pdo_update('wpdc_storetype', $data, array('id' => $_GPC['id']));
				if($res){
					message('编辑成功',$this->createWebUrl('storetype',array()),'success');
				}else{
					message('编辑失败','','error');
				}
			}
		}
include $this->template('web/addstoretype');