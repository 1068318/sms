<?php
namespace app\home\api;

use app\common\controller\Base as Generic;
use think\facade\Request;
use think\facade\Validate;
use app\home\model\User as UserModel;

class User extends Generic {
    
    //不执行父类initialize方法,为了下面的的beforeactionlist生效
    protected function initialize(){}
    
    protected $beforeActionList = [
        'authVerifyDeny'	=>	['except' => 'login'],
        'authVerifySure'	=>	['only' => 'login'],
    ];

	//用户登陆
	public function login()
	{
		if (Request::isPost()) {
	        $tokeName = config('site.form_token_name');
	        //Request::post(['passwd' => hash_secret(Request::param('passwd'))]);

	        //$where = Request::except(['submit', $tokeName]);
			$where = [['username', '=', Request::param('username')],['passwd', '=', hash_secret(Request::param('passwd'))]];
	        
			$row = UserModel::where($where)->field(true)->find();//
	       
			if (!$row) {//$row->isEmpty(),find无结果都是null，所以可以这样判断
	            $this->error('用户名或密码不正确，请重试');
	            exit();
	        }
// 	        UserModel::getLastSql();
// 	        halt(Request::param($tokeName));
	        ///////////////////////
	        if (!Validate::token($tokeName, '',[$tokeName => Request::param($tokeName)])) {
	            $this->error('令牌数据无效,非法请求');
	            exit();
	        }
	        
	        session('userinfo', $row);//object into session
			
			//30天免登陆
			if (Request::param('rememberme') == 1) {
				cookie('');
			}

	        $this->redirect('index/index');//href to home
	    }
	    
	    return view();

	}

	//logout
	public function logout()
	{
	    if (session('?userinfo')) {
	        session('userinfo', null);//删除session，下面叫清除
	        session(null);//清除所有session，不止是userinfo。有时候如果还有其他session的数据要用，比如上面的userinfo1.这句话就不需要了。
	    }

	    $this->redirect('index/index');
	}

	
    public function updatePasswd()
    {
        if (Request::isPost()) {
            $update = UserModel::update(['id' => session('userinfo.id'), 'passwd' => Request::param('passwd')]);
            
			if ($update) {
				return "
				<script type='text/javascript'>alert('恭喜你，密码修改成功');
				window.opener=null;window.open('','_self');window.close();
				</script>";
            }
        }

        return view();
    }
    
	/**
     * @用户列表页面
     */
    public function userList()
    {
		$username = Request::param('username');
		$where = [];
		if ($username) {
			$where[] = ['username', 'like', "%{$username}%"];
		}

        $rowset = UserModel::where($where)->order('create_time DESC')->paginate(15, false, [
			//'path'	   =>'javascript:ajax_page([PAGE]);',
			'query'    => Request::param(),
		]);

		$this->assign('res', $rowset);
        return view();
    }

	public function ajaxList()
	{
		if (Request::isAjax()) {
			$page = Request::param('page', 0);
			
			if ($page) {
				//$username = Request::param('username');
				//$where = [];
				//if ($username) {
				//	$where[] = ['username', 'like', "%{$username}%"];
				//}

				$rowset = UserModel::where($where)->order('create_time DESC')->paginate(2,false,[
					//'type'     => 'Bootstrap',
					//'var_page' => 'page',
					//'page'	   => $page,
					'path'     => 'javascript:ajax_page([PAGE]);',
					'query'    => Request::param(),
				]);
			}

			$page = $rowset->render();

			//return $rowset->toArray();
			return json(['page'=>$page, 'rowset'=>$rowset]);
			//return UserModel::select()->toJson();//该方式不行
		}
	}

    /**
     * 添加用户
     */
    public function userAdd()
    {
      if(Request::isPost()){

              $list = Request::param();
              if (UserModel::where('username','=',$list['username'])->find()){
//                  echo  "<script>alert('用户名已经存在，请重新添加');</script>";
                  $this->success('该用户名已经存在,请重新添加','user/useradd');
//                  die;
              } else {
                  $res_list = UserModel::create([
                      'username' => $list['username'],
                      'name' => $list['adminuser'],
                      'passwd'=> $list['password'],
                      'create_time' => Request::time(),
                  ]);
                  if($res_list){
                      $this->success('恭喜你，添加用户成功','user/userlist');
                  }
              }

          }else{
              return view();
          }

    }

    public function ajaxUserDelete()
    {
        if (Request::isAjax())
        {
            $id = Request::param('id_val');
            $res = UserModel::destroy($id);
            
			if ($res) {
                return ['status' => 0, 'message' => '删除成功'];
            } else {
                return ['status' => 1, 'message' => '删除失败'];
            }
        }

    }
    

	 

	
}