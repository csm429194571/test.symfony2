<?php
/**
* 用户管理系统登录登出控制器类
* 时间：2016年05月06日
*author:chushangming  
*/

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    /**
     * 用户管理系统登录页面
     * @Route("/", name="AdminLogin")
     */
    public function indexAction(Request $request)
    {	
        //管理员数据入session 获取有无session
        $session = $request->getSession();
        $admin_info = $session->get("admin_info");
        if($admin_info){
            //渲染页面
            return $this->redirectToRoute('userinfo_list');
        }
        //post提交管理员登录数据
        if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
            $username = $request->get("username");
            $password = $request->get("password");
            //验证登录信息是否正确 正确则跳转到用户管理页面
            $manager = $this->getDoctrine()->getManager();
            $user_info = $manager->getRepository('AppBundle:User')->findOneByUsername($username);
            if(md5($password) == $user_info->password){
                //管理员数据入session
                $session->set("admin_info", $user_info );
                //渲染页面
                return $this->redirectToRoute('userinfo_list');
            }else{
                return $this->redirectToRoute('AdminLogin');
            }           
        }else{
            return $this->render('default/login.html.twig');
        }
    }
    
    /**
     * 用户管理系统登出页面
     * @Route("/logout", name="AdminLogout")
     */
    public function logoutAction(Request $request)
    {	
        // 管理员登出系统
        $session = $request->getSession();//清除session
        $session->clear();
        //登出后跳转到登录页面
        return $this->render('default/login.html.twig',[]);
    }
}
