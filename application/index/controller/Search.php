<?php
namespace app\index\controller;
use app\index\model\Article;
class Search extends Common
{
    public function index()
    {
        $arcs=[];
    	if (input('title')){
            $keywords=trim(input('title'));
            $map['title']=["like","%$keywords%"];
            $arcs=db("article")->where($map)->paginate(12);
        }elseif (input('body')){
            $keywords=trim(input('body'));
            $map['content']=["like","%$keywords%"];
            $arcs=db("article")->where($map)->paginate(12);
        }
        $this->assign(
            [
                "keywords"=>$keywords,
                "arcs"=>$arcs
            ]
        );
        return view();
    }
}
