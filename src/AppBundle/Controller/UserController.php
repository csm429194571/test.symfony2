<?php
/**
* 用户业务逻辑控制器类
* 时间：2016年05月06日
*author:chushangming  
*/
namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/userinfo/list", name="userinfo_list")
     */
    public function indexAction()
    {
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getRepository("AppBundle:User");
        $user_list = $repository->findAll();
        return $this->render("default/user_info_list.html.twig",['list'=>$user_list]);
    }
    
    /**
     * 编辑用户信息
     * @Route("/admin/edit/{user_id}",requirements={"user_id" : "\d+"},name="user_edit")
     */
    public function editAction(Request $request)
    {
        $user_id = intval($request->get('user_id'));
        //根据user_id获得用户数据
        $user_manager = $this->getDoctrine()->getManager();
        $user_info = $user_manager->getRepository('AppBundle:User')->find($user_id);
        if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
            //获取表单数据
            $name = $request->get('username');
            $email = trim($request->get('email'));
            $mobile = trim($request->get('mobile'));
            $qq = trim($request->get('qq'));
            $sex = trim($request->get('sex'));
            $user_type = trim($request->get('user_type'));
            //根据表单内容更新对象
            if($email != $user_info->email) $user_info->email = $email;
            if($mobile != $user_info->mobile) $user_info->mobile = $mobile;
            if($sex != $user_info->sex) $user_info->sex = $sex;
            if($qq != $user_info->qq) $user_info->qq = $qq;
            if($user_type != $user_info->user_type) $user_info->user_type = $user_type;
            $user_info->update_time = time();
            $user_manager->flush();
            
            return $this->redirectToRoute('userinfo_list');
        }
        return $this->render("default/user_info_edit.html.twig",['user_info' => $user_info]);
    }
    
    /**
     * 添加新用户
     * @Route("/user/add",name="user_add")
     * @param Request $request
     *
     * @return Response
     */
    public function addAction(Request $request)
    {
        #post提交处理数据,get请求展示页面
        if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
            $username = $request->get('username');
            $password = trim($request->get('password'));
            $password2 = $request->get('password2');
            $email = trim($request->get('email'));
            $mobile = trim($request->get('mobile'));
            $qq = trim($request->get('qq'));
            $user_type = trim($request->get('user_type'));
            $sex = trim($request->get('sex'));
            $is_effect = trim($request->get('is_effect'));
            $db_result = true;
            try{
                $user_mananger = $this->getDoctrine()->getManager();
                $user = new User();
                $user->username = $username;
                $user->password = md5($password);
                $user->email = $email;
                $user->mobile = $mobile;
                $user->qq = $qq;
                $user->user_type = $user_type;
                $user->sex = $sex;
                $user->setIsActive(true);
                $user->register_time = time();
                $user->update_time = time();
                $user->is_effect = $is_effect;
                $user_mananger->persist($user);
                $user_mananger->flush();
            }catch (Exception $e){
                $db_result = false;
            }
            //重定向到用户列表页
            return $this->redirectToRoute('userinfo_list');
        }
        return $this->render('default/user_info_add.html.twig');
    }
    
    /**
     * 删除用户
     * @Route("/admin/delete/{user_id}",requirements={"user_id" : "\d+"},name="user_delete")
     * @param Request $request
     * @return Response
     */
    function deleteAction(Request $request){
        $user_id = intval($request->get('user_id'));
        //根据user_id获得用户数据
        $user_manager = $this->getDoctrine()->getManager();
        $user_info = $user_manager->getRepository('AppBundle:User')->find($user_id);
        $user_manager->remove($user_info);
        $user_manager->flush();
        //重定向到用户列表页
        return $this->redirectToRoute('userinfo_list');
    }
}
