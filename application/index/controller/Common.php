<?php
namespace app\index\controller;
use think\Controller;
use think\Cookie;
use app\index\model\Cate as CateModel;
class Common extends Controller
{
    public function _initialize(){
        //网站配置项
    	$this->configs=$this->getConfigs();
        //网站顶部导航
        $cateres=$this->getNavCates();
        //logo
        $logo=db("advertisement")->where("type=3")->find();
        //产品信息
        $products=db("cate")->where(["pid"=>95])->select();
        $services=db("cate")->where(["pid"=>93])->select();

        $this->assign(array(
            "products"=>$products,
            "services"=>$services,
            'logo'=>$logo,
            'configs'=>$this->configs,
            "cateres"=>$cateres
        ));
    }

    public function getNavCates(){
        $cateres=db('cate')->where(array('pid'=>0))->select();
//        foreach ($cateres as $k => $v) {
//            $children=db('cate')->where(array('pid'=>$v['id']))->select();
//            if($children){
//                $cateres[$k]['children']=$children;
//            }else{
//                $cateres[$k]['children']=0;
//            }
//        }
        return $cateres;
    }

    public function getConfigs(){
        $conf=new \app\index\model\Conf();
        $_configs=$conf->getAllConf();
        $configs=array();
        foreach ($_configs as $k => $v) {
            $configs[$v['enname']]=$v['value'];
        }
        return $configs;
    }

    public function getPos($cateid){
        $cate= new \app\index\model\Cate();
        $posArr=$cate->getparents($cateid);
        $this->assign('posArr',$posArr);
    }

    public function changelang(){
        $lang=input("lang");
        switch ($lang){
            case 'en':
                cookie('think_var','en-us');
                break;
            case 'zh':
                cookie('think_var','zh-cn');
                break;
            default:
                break;
        }
        echo json_encode(array('status'=>1));
    }


}
