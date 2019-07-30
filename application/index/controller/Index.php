<?php
namespace app\index\controller;

class Index extends Common
{
    public function index()
    {
        //轮播
        $slides=db("advertisement")->order("sort asc")->where("type",0)->select();
        //合作伙伴
        $partners=db("partner")->order("sort asc")->limit(0,36)->select();
        $this->assign(
            array(
                "title"=>$this->configs["home_title"],
                "keywords"=>$this->configs["home_keywords"],
                "description"=>$this->configs["home_desc"],
                "slides"=>$slides,
                "partners"=>$partners,
                "nav_index"=>0
            )
        );
        return view();
    }
}
