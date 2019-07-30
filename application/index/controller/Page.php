<?php
/**
 * Created by PhpStorm.
 * User: Sovell-ZhouZhihua
 * Date: 2019/7/17
 * Time: 14:30
 */

namespace app\index\controller;

class Page extends Common
{
    public function detail($url_prefix){
        if($url_prefix=="partner_frame"){
           $cate=db("cate")->where(["url_prefix"=>"partner"])->find();
        }else{
            $cate=db("cate")->where(["url_prefix"=>$url_prefix])->find();
            if(!$cate){
                echo "页面不存在";
                die();
            }
        }
        if ($url_prefix=="partner"||$url_prefix=="partner_frame"){
            $end_users=db("partner")->where(["type"=>0])->order("sort asc")->limit(0,48)->select();
            $epc_clients=db("partner")->where(["type"=>1])->order("sort asc")->paginate(12);
            $this->assign(array(
                "end_users"=>$end_users,
                "epc_clients"=>$epc_clients,
            ));
        }
        $this->assign(array(
            "current_cate"=>$cate,
            "nav_index"=>$cate["id"],
            "title"=>$cate["title"],
            "keywords"=>$cate["keywords"],
            "description"=>$cate["desc"],
        ));
        return view("page/{$url_prefix}");
    }
}