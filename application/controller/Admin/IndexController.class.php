<?php
namespace application\controller\Admin;
use framework\core\Controller;
use framework\core\Factory;
use framework\libraries\Autoupdate;

/**
* 后台首页控制器
*/
class IndexController extends Controller{

    public function __construct(){
        $this->checksession();
    }

	// 显示后台首页
	public function IndexAction(){
        if ($_SESSION['authen']['role']) {
            $result = Factory::M('IndexModel');
            if (function_exists("imagecreate")) {
                if (function_exists('gd_info')) {
                    $ver_info = gd_info();
                    $gd_ver = $ver_info['GD Version'];
                } else{
                    $gd_ver = '支持';
                }
            } else{
                $gd_ver = '不支持';
            }
            $this->assign('prefix',$result->getPrefix());
            $this->assign('gd_ver',$gd_ver);
            $this->assign('version',$result->getVersion());
        }else{
            $res = Factory::M('UserModel')->user_fetch($_SESSION['authen']['uid']);
            $this->assign('ip',$res['ip']);
            $this->assign('time',date('Y-m-d H:i:s',$res['time']));
            $this->assign('email',$res['email']);
            $this->assign('count',Factory::M('PicModel')->pic_count('WHERE uid= '.$_SESSION['authen']['uid']));
        }
        $this->assign('username',$_SESSION['authen']['role']=='admin'?'管理员':$_SESSION['authen']['username']);
		$this->display('application/view/Admin/header.php');
		$this->display('application/view/Admin/index.php');
		$this->display('application/view/Admin/footer.php');
	}
}
