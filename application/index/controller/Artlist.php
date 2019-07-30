<?php
namespace app\index\controller;
use app\index\model\Article;
class Artlist extends Common
{
    public function index()
    {
    	$article=new Article();
        $cateid=input('cid');
    	$artRes=$article->getAllArticles($cateid);
        $cate=new \app\index\model\Cate();
        $cateInfo=$cate->getCateInfo($cateid);
        $newArticles=db("article")->where('id',$cateid)->order("time desc")->limit(0,13)->select();
        $hotArticles=db("article")->where('id',$cateid)->order("click desc")->limit(0,13)->select();
        $subCates=db("cate")->field("id,catename")->where("pid",41)->select();

    	$this->assign(array(
    		'artRes'=>$artRes,
            'cateInfo'=>$cateInfo,
            'newArticles'=>$newArticles,
            'hotArticles'=>$hotArticles,
            "subCates"=>$subCates
    		));
        return view('artlist');
    }
}
