<?php
/**
 * Class User
 * 用户实体映射表类
 * 时间：2016/05/06
 *author:chushangming
 */
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class User
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Entity\UserRepository")
 * @ORM\Table(name="admin_user")
 *
 * @property int    $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $sex
 * @property string $mobile
 * @property string $qq
 * @property int $user_type
 * @property int $register_time
 * @property int $update_time
 * @property int $is_effect
 */
class User implements UserInterface,\Serializable
{
    /**
     * @var int $id
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var
     * @ORM\Column(type="string",length=60)
     */
    public $username;


    /**
     * @var string $password
     * @ORM\Column(type="string",length=32)
     */
    public $password;

    /**
     * @var
     * @ORM\Column(type="string",length=60)
     */
    public $email;

    /**
     * @var integer $sex
     * @ORM\Column(type="integer",length=1)
     */
    public $sex;

    /**
     * @var string $mobile
     * @ORM\Column(type="string",length=20)
     */
    public $mobile;

    /**
     * @var
     * @ORM\Column(name="qq",type="string",length=30)
     */
    public $qq;
    
    /**
     * @var
     * @ORM\Column(name="user_type",type="integer",length=1)
     */
    public $user_type;

    /**
     * @var integer $register_time
     * @ORM\Column(name="register_time",type="integer",length=11)
     */
    public $register_time;

    /**
     * @var integer $update_time
     * @ORM\Column(name="update_time",type="integer",length=11)
     */
    public $update_time;

    /**
     * @var integer $is_effect
     * @ORM\Column(name="is_effect", length=1)
     */
    public $is_effect;

    public function __call($name, $arguments)
    {

    }

    /**
     * 获得salt值
     */
    public function getSalt()
    {
        return null;
    }

     /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUserName($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->username;
    }
    
     /**
     * Set user_type
     *
     * @param string $user_type
     *
     * @return User
     */
    public function setUserType($user_type)
    {
        $this->user_type = $user_type;

        return $this;
    }

    /**
     * Get user_type
     *
     * @return string
     */
    public function getUserType()
    {
        return $this->user_type;
    }
    
    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
    
    /**
     * 获得用户密码加密字符串
     * @return string
     */
    public function getPassword(){
        return $this->password;
    }

    /**
     * 获得用户角色
     * @return array
     */
    public function getRoles(){
        return ['ROLE_USER','ROLE_ADMIN'];
    }

    public function eraseCredentials(){

    }

    /**
     * 获得用户数组序列化信息
     * @return string
     */
    public function serialize(){
        return serialize([
            $this->id,
            $this->username,
            $this->password
                         ]);
    }

    public function unserialize($serialized){
        list (
            $this->id,
            $this->username,
            $this->password
            ) = unserialize($serialized);
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set sex
     *
     * @param string $sex
     *
     * @return User
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return User
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set qq
     *
     * @param string $qq
     *
     * @return User
     */
    public function setQq($qq)
    {
        $this->qq = $qq;

        return $this;
    }

    /**
     * Get qq
     *
     * @return string
     */
    public function getQq()
    {
        return $this->qq;
    }

    /**
     * Set registerTime
     *
     * @param \integer $register_time
     *
     * @return User
     */
    public function setRegisterTime($register_time)
    {
        $this->register_time = $register_time;

        return $this;
    }

    /**
     * Get registerTime
     *
     * @return \integer
     */
    public function getRegisterTime()
    {
        return $this->register_time;
    }

    /**
     * Set updateTime
     *
     * @param \DateTime $updateTime
     *
     * @return User
     */
    public function setUpdateTime($updateTime)
    {
        $this->update_time = $updateTime;

        return $this;
    }

    /**
     * Get updateTime
     *
     * @return \DateTime
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsEffect($is_effect)
    {
        $this->is_effect = $is_effect;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsEffect()
    {
        return $this->is_effect;
    }
}
