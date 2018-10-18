<?php
namespace app\admin\controller;

use app\admin\model\Tree;


class DispatchController extends BaseController {
    
    //列表
    public function dispatch()
    {
        $tree = new Tree();
        $area['type']=1;
        $pro=$tree->where($area)->select();
        return $this->fetch('dispatch', [
             'pro' => $pro
        ]);
     }

   

	//城市
    public function getCity(){
        $tree = new Tree();
        if(request()->isPost()){
            $pid=$this->request->param('pro');

            $a['pid']=$pid;
            $city=$tree->where($a)->select();

            return json($city);
        }
    }
	//区/县
    public function getCounty(){
        $tree = new Tree();
        if(request()->isPost()){

            $pid=input('city');
            $a['pid']=$pid;
            $county=$tree->where($a)->select();

            return json($county);
        }
    }


}
