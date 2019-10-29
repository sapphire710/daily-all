<?php

namespace app\index\controller;

use think\Db;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $method = $this->request->method();
        $data = $this->request->post();
        $data['ctime'] = date('Y-m-d', time());
        $result = Db::table('daily')->insert($data);
//        return json($result);

        if ($result) {
            return json([
                'code' => 200
                , 'msg' => '日报填写成功',
            ]);
        } else {
            return json([
                'code' => 404,
                'msg' => '日报填写失败',
            ]);
        }
    }

    public function query()
    {
        $data = $this->request->get();
        $names = $data['names'];
        $page = $data['page'];
        $size = $data['size'];
        $content = $data['content'];
        $ctime = $data['ctime'];
        $sarr = ['names' => $names];

//        if(isset($data['page']&&!empty($data['page']))){
//            $page=$data['page'];
//        }else{
//            $page=1;
//        }
//        if(isset($data['ordertype']))

//        $daily = Db::table()->where($sarr)->page($page,$limit)->order($order,$ordertype)->select();

        if(isset($data['content'])&&!empty($data['content'])){

        }

//        whereOr或者-条件
        $dailyall = Db::table('daily')->where($sarr)->page($page, $size)->select();
        $daily = Db::table('daily')->where($sarr)->select();
        $count = count($daily);


        if ($count > 0 && $dailyall > 0) {
            return json([
                'code' => 200,
                'msg' > '',
                'data' => $dailyall,
                'count' => $count
            ]);
        } else {
            return json([
                'code' => 404,
                'msg' => '',
            ]);
        }
    }
}

//异常处理，try尝试、可以吧不确定的代码放进去，如果有错误，不会影响后面的代码（语法错误除外）
/*public function query()
{
    try {

    } catch () {

    }
}*/
