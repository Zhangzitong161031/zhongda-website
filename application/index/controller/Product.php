<?php
namespace app\index\controller;

class Product extends Common
{
    public function lst()
    {
        $artid=input('id');
        db('article')->where(array('id'=>$artid))->setInc('click');
        $article=db('article')->find($artid);
        $cateid=$article['cateid'];
        $where["id"]=array("gt",$article['id']);
        $nextArticle=db('article')->field("id,title")->order('id asc')->where($where)->limit(0,1)->select();
        $where["id"]=array("lt",$article['id']);
        $preArticle=db('article')->field("id,title")->order('id desc')->where($where)->limit(0,1)->select();
        $subCates=db("cate")->field("id,catename")->where("pid",41)->select();
        if($nextArticle){
            $nextArticle=$nextArticle[0];
        }else{
            $nextArticle="";
        }
        if($preArticle){
            $preArticle=$preArticle[0];
        }else{
            $preArticle="";
        }
        $newArticles=db("article")->order("time desc")->limit(0,13)->select();
        $hotArticles=db("article")->order("click desc")->limit(0,13)->select();
        $this->assign(array(
            'article'=>$article,
            "preArticle"=>$preArticle,
            "nextArticle"=>$nextArticle,
            'newArticles'=>$newArticles,
            'hotArticles'=>$hotArticles,
            "subCates"=>$subCates,
        ));
        return view('article');
    }
    public function detail($cid=241)
    {
        $cate=db("cate")->find($cid);
        $cates=db("cate")->where(["pid"=>239])->select();
        $this->assign(array(
            "cur_cate"=>$cate,
            "cates"=>$cates,
            "nav_index"=>239,
            'title'=>$cate['title'],
            'keywords'=>$cate['keywords'],
            'description'=>$cate['desc']
        ));
        return view('detail');
    }
}
