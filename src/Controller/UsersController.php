<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use http\Env\Response;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    // public $components = array('BarCode.BarCode');
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

        /*$this->paginate = [
            //'contain' => ['Roles', 'DsoMasters', 'SdoMasters', 'BsoMasters', 'MoMasters', 'DepotMasters', 'DmsfcMasters', 'Groups', 'Districts', 'BlockCities', 'SubDivisions']
            'contain' => []
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));*/
    }

    // Login ----------------------------------------------------------------------
    public function login()
    {
        $this->set("title", "Login");
        if ($this->request->is('post')) {
            if ($this->Auth->user('id')) { //if already loggedin
                $this->Flash->error(__('You are already logged in!'));
                return $this->redirect(['controller' => 'Users', 'action' => 'index']);
            } else {
                $user = $this->Auth->identify();
                // echo $user['id'];
                $this->request->session()->write('loggedinUser.id', $user['id']);
                $this->request->session()->write('loggedinUser.username', $user['username']);
                // For correct  Login
                if ($user) {
                    $this->Auth->setUser($user);
                    $this->Flash->success(__('Login Successfull'));
                    //return $this->redirect(['controller'=>'users', 'action'=>'index']);
                    //echo "<pre>";print_r($user);die;
                    if (($user['group_id'] == 12)) {
                        $this->Flash->success(__('Login Successfull'));
                        return $this->redirect(['controller' => 'Users', 'action' => 'dsoHome']);
                    }
                    if (($user['group_id'] == 13)) {
                        $this->Flash->success(__('Login Successfull'));
                        return $this->redirect(['controller' => 'Users', 'action' => 'departmentHome']);
                    }
                    if (($user['group_id'] == 20)) {
                        $this->Flash->success(__('Login Successfull'));
                        return $this->redirect(['controller' => 'Users', 'action' => 'bsoHome']);
                    }
                }
                // For incorrect Login
                $this->Flash->error(__('Incorrect Login'));
            }
        }
    }

    // *logout*-----------------------------------------------------------
    public function logout()
    {
        $this->Flash->success(__('Logout successfully'));
        return $this->redirect($this->Auth->logout());
    }

    public function departmentHome()
    {
        $this->set('title', 'Department Home');
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $groups = [13];
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }
    }

    public function dsoHome()
    {
        $this->set('title', 'District Supervision Officer Home');
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $groups = [12];
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }
    }

    public function bsoHome()
    {
        $this->set('title', 'Block Supervision Officer Home');
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
        $user_id = $session_data['Auth']['User']['id'];
        $groupId = $session_data['Auth']['User']['group_id'];
        $groups = [20];
        if (!in_array($groupId, $groups)) {
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller' => 'Users', 'action' => 'logout']);
        }
    }

    public function resetPass()
    {
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
//        echo "<pre>"; print_r($session_data); "<pre>"; die;
        $sUserId = $session_data['Auth']['User']['id'];
        $sGroupId = $session_data['Auth']['User']['group_id'];
        $sDist = $session_data['Auth']['User']['rgi_district_code'];
        $sBlok = $session_data['Auth']['User']['rgi_block_code'];
        $sGroups = [12,11,14,19,20,21,28];


        if ($this->request->is('post')) {

            $username = $this->request->data['username'];

            $check = $connection->execute("SELECT group_id,rgi_district_code, username from users where username='" . $username . "'");
            $check = $check->fetchAll('assoc');
            echo $dist  = $check[0]['rgi_district_code']; //die;
            $usrNm = $check[0]['username'];
            $grpId = $check[0]['group_id'];

            if (!empty($username)) {
                // check same district
                /*if (($sDist != $dist)) {
                    $this->Flash->success('Username does not belong to your district.');
                    return $this->redirect(['controller' => 'users', 'action' => 'resetPass']);
                }*/
                if ($sGroupId == 12) {
                    if (in_array($grpId, $sGroups)) {
                        if (count($check) == 1) {
                            $check = $check[0]['username'];
                            $true = $connection->execute("UPDATE users SET password = '1d04e026a75e3ac75ee8bbae7e4e976557ebac88' WHERE username ='" . $usrNm . "'");
                            if ($true) {
                                $this->Flash->success('Your Password has been reset.');
                                return $this->redirect(['controller' => 'users', 'action' => 'dsoHome']);
                            }
                        } else {
                            $this->Flash->error('Please Enter Correct Username');
                            return $this->redirect(['controller' => 'users', 'action' => 'resetPass']);
                        }
                    }
                    else {
                        $this->Flash->success('You are not authorised to change this password');
                        return $this->redirect(['controller' => 'users', 'action' => 'resetPass']);
                    }

                } else if($sGroupId == 13) {
                    if (count($check) == 1) {
                        $check = $check[0]['username'];
                        $true = $connection->execute("UPDATE users SET password = '1d04e026a75e3ac75ee8bbae7e4e976557ebac88' WHERE username ='" . $usrNm . "'");
                        if ($true) {
                            $this->Flash->success('Your Password has been reset.');
                            return $this->redirect(['controller' => 'users', 'action' => 'departmentHome']);
                        }
                    } else {
                        $this->Flash->error('Please Enter Correct Username');
                        return $this->redirect(['controller' => 'users', 'action' => 'resetPass']);
                    }
                }else {
                    $this->Flash->success('You are not authorised to change this password');
                    return $this->redirect(['controller' => 'users', 'action' => 'resetPass']);
                }
            }
        }
    }

    public function getOtp()
    {
        //$this->autoRender = false;
        $connection  = ConnectionManager::get('default');

        $this->viewBuilder()->layout('stakeholder_layout');
        $this->set("title", "Change Mobile No");
        $group_id= $this->getRequest()->getSession()->read('Auth')['User']['group_id'];
        $user_id= $this->getRequest()->getSession()->read('Auth')['User']['id'];
        $mobile_no= $this->getRequest()->getSession()->read('Auth')['User']['mobile_no'];
        $username= $this->getRequest()->getSession()->read('Auth')['User']['username']; //die;

        //$flag=1;
        $otp = chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)) . rand(100, 999);
        $this->response->body(json_encode($otp));

        if($this->request->is('ajax')){

            if($mobile_no<6000000000 && $mobile_no>9999999999){
                $this->Flash->error('Invalid Mobile No');
                $flag=0;
            }else{
                $flag = 1;
            }


            if($flag==1){
//            $otp = chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)) . rand(100, 999);

                $msg        ="Otp for Change Mobile Number is $otp. Otp is valid only for 5 minutes.";
                $curdate    =date('Y-m-d H:i:s');
                $created    =date('Y-m-d H:i:s');
                $range      =time()+30;
                $validity   =date('Y-m-d H:i:s',$range);
                $id                = Text::uuid();

                $insert=$connection->insert('centralize_otps',[
                    'id'                =>$id,
                    'mobile'            =>'7633009330',
                    'otppassword'       =>$otp,
                    'user_id'           =>$user_id,
                    'activityType'      =>'2',
                    'otp_time'          =>date('Y-m-d H:i:s'),
                    'validation_time'   =>$validity,
                    'status'            =>'0',
                    'created'           =>$created,
                ]);
                if($insert){
                    // fetching otp from stored table
                    $getOtp = $connection->prepare("SELECT id,otppassword, validation_time from centralize_otps where user_id = ? and status = '0'");
                    $getOtp->bindValue(1,$user_id);
                    $getOtp->execute();
                    $getOtps = $getOtp->fetchAll('assoc');
                    if(!empty($getOtps)) {
                        foreach ($getOtps as $key => $val) {
                            $cOid       = $val['id'];
                            $validTime  = $val['validation_time'];
//                        echo $cOid."<br>"; //die();
                            // checking already existing stored otps
                            if($curdate > $validTime){
                                $moveOtp = $connection->execute("INSERT INTO centralize_otp_backups(id, mobile, otppassword, user_id, activityType, otp_time, validation_time, status, created) SELECT id, mobile, otppassword, user_id, '2', otp_time, validation_time, '1', '$curdate' FROM centralize_otps WHERE id = '$cOid'");
                                if($moveOtp) {
                                    $delOtp = $connection->execute("Delete FROM centralize_otps WHERE id = '$cOid'");
                                }
                            }
                        }
//                    die();
                    }
                    $result = [
                        'otp' => $otp,
                        'message' => 'OTP has been successfully sent to your number.'
                    ];
                }else{
                    $result = [
                        'otp' => "",
                        'message' => 'OTP not generated.'
                    ];
                }
            }
            else{
                $result = [
                    'otp' => "",
                    'message' => 'Error occured while sending Otp.'
                ];
                //$this->Flash->error('Error occured while sending Otp.');
            }
        }

        $this->response->body(json_encode($result));
        return $this->response;
    }

    public function changePass()
    {
        $connection = ConnectionManager::get('default');
        $session_data = $this->getRequest()->getSession()->read();
//        echo "<pre>"; print_r($session_data); "<pre>"; die;
        $sUserId = $session_data['Auth']['User']['id'];
        $sUserNm = $session_data['Auth']['User']['username'];
        $sGroupId = $session_data['Auth']['User']['group_id'];
        $sDist = $session_data['Auth']['User']['rgi_district_code'];
        $sBlok = $session_data['Auth']['User']['rgi_block_code'];
        $sMobile = $session_data['Auth']['User']['c_no']; //die();
//        $sGroups = [12];
        $otp = '';

        if ($this->request->is('post')){
            $request_data = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die;
            $oldpassword    = $request_data['oldpassword'];
            $random         = $request_data['random'];
            $password       = $request_data['password'];
            $confirmpassword= $request_data['confirmpassword'];
            $reqOtp         = $request_data['otp'];
            $random_one     = $request_data['random_one'];
            $currTime       = date('Y-m-d H:i:s');

            $this->loadModel('UsersTable');
            $passchange = TableRegistry::getTableLocator()->get('users')->find('all', array('fields'=>array('users.password'), 'conditions'=>array('users.username='."'".$sUserNm."'")));
            $obj_to_array_passchange    = $passchange->toArray();
            $db_pass                    = $obj_to_array_passchange[0]['password'];
            $enc_pass                   = sha1($db_pass.$random);
            $random_one                 = sha1($random_one);

            if($password != $confirmpassword) {
                $this->Flash->error(__('New and Confirm Password do not match.'));
                return $this->redirect(['controller'=>'Users','action' => 'changePass']);
            }

            if($enc_pass == $oldpassword){
                // fetching otp from stored table
                $getOtp = $connection->prepare("SELECT id,otppassword, validation_time from centralize_otps where user_id = ? order by created desc limit 1");
                $getOtp->bindValue(1,$sUserId);
                $getOtp->execute();
                $getOtps = $getOtp->fetchAll('assoc');

                if(!empty($getOtps)) {
                    $cOid       = $getOtps[0]['id'];
                    $mOtp       = $getOtps[0]['otppassword'];
                    $validTime  = $getOtps[0]['validation_time'];

                    //
                    if ($currTime > $validTime) {
                        $moveOtp = $connection->execute("INSERT INTO centralize_otp_backups(id, mobile, otppassword, user_id, activityType, otp_time, validation_time, status, created) SELECT id, mobile, otppassword, user_id, '1', otp_time, validation_time, '1', '$currTime' FROM centralize_otps WHERE id = '$cOid'");
                        if ($moveOtp) {
                            $delOtp = $connection->execute("Delete FROM centralize_otps WHERE id = '$cOid'");
                        }
                        $this->Flash->error(__('Otp has been expired'));
                        return $this->redirect(['controller'=>'Users','action' => 'changePass']);
                    }
                }else{
                    $cOid       = '';
                    $mOtp       = '';
                    $validTime  = '';
                }

                // matching otp
                if(($reqOtp != $mOtp)){
                    $this->Flash->error(__('OTP mismatch'));
                    return $this->redirect(['controller'=>'Users','action' => 'changePass']);
                }

                if($mOtp == $reqOtp) {
                    $update = $connection->prepare("update users set password = ? where username = ? ");
                    $update->bindValue(1,$random_one);
                    $update->bindValue(2,$sUserNm);
                    $updates = $update->execute();

                    if ($updates) {
                        $moveOtp = $connection->execute("INSERT INTO centralize_otp_backups(id, mobile, otppassword, user_id, activityType, otp_time, validation_time, status, created) SELECT id, mobile, otppassword, user_id, '2', otp_time, validation_time, '2', '$currTime' FROM centralize_otps WHERE id = '$cOid'");
                        if ($moveOtp) {
                            $delOtp = $connection->execute("Delete FROM centralize_otps WHERE id = '$cOid'");
                        }
                        $this->Flash->success(__('Password has been updated'));
                        return $this->redirect(['controller'=>'Users','action' => 'index']);
                    }

                }
            }else{
                $this->Flash->error('Incorrect Old Password');
                return $this->redirect(['controller'=>'users', 'action'=>'changepass']);
            }
        }
        $this->set(compact('otp'));
    }

    public function changeMobileNo()
    {
        $connection     = ConnectionManager::get('default');
        $session_data   = $this->getRequest()->getSession()->read();
//        echo "<pre>"; print_r($session_data); "<pre>"; die;
        $sUserId        = $session_data['Auth']['User']['id'];
        $sUserNm        = $session_data['Auth']['User']['username'];
        $sGroupId       = $session_data['Auth']['User']['group_id'];
        $sDist          = $session_data['Auth']['User']['rgi_district_code'];
        $sBlok          = $session_data['Auth']['User']['rgi_block_code'];
        $sMobile        = $session_data['Auth']['User']['c_no']; //die();
        $otp            = '';

        $mobNo = $connection->execute("select c_no from users where username = '$sUserNm'")->fetchAll('assoc');
        $mobiNo = $mobNo[0]['c_no'];

        if($this->getRequest()->is('post')){
            $requestData = $this->getRequest()->getData();
//            echo "<pre>"; print_r($requestData); "<pre>"; die;
            $reqMobile   = $requestData['newMobileNo'];
            $reqOtp      = $requestData['otp'];
            $currTime    = date('Y-m-d H:i:s');

            if(count($mobNo) > 0){
                // fetching otp from stored table
                $getOtp = $connection->prepare("SELECT id,otppassword, validation_time from centralize_otps where user_id = ? order by created desc limit 1");
                $getOtp->bindValue(1,$sUserId);
                $getOtp->execute();
                $getOtps = $getOtp->fetchAll('assoc');

                if(!empty($getOtps)) {
                    $cOid       = $getOtps[0]['id'];
                    $mOtp       = $getOtps[0]['otppassword'];
                    $validTime  = $getOtps[0]['validation_time'];

                    //
                    if ($currTime > $validTime) {
                        $moveOtp = $connection->execute("INSERT INTO centralize_otp_backups(id, mobile, otppassword, user_id, activityType, otp_time, validation_time, status, created) SELECT id, mobile, otppassword, user_id, '1', otp_time, validation_time, '1', '$currTime' FROM centralize_otps WHERE id = '$cOid'");
                        if ($moveOtp) {
                            $delOtp = $connection->execute("Delete FROM centralize_otps WHERE id = '$cOid'");
                        }
                        $this->Flash->error(__('Otp has been expired'));
                        return $this->redirect(['controller'=>'Users','action' => 'changeMobileNo']);
                    }
                }else{
                    $cOid       = '';
                    $mOtp       = '';
                    $validTime  = '';
                }

                // matching otp
                if(($reqOtp != $mOtp)){
                    $this->Flash->error(__('OTP mismatch'));
                    return $this->redirect(['controller'=>'Users','action' => 'changeMobileNo']);
                }

                if($mOtp == $reqOtp) {

//                    echo "update users set c_no = $reqMobile where username = $sUserNm "; die();
                    $update = $connection->prepare("update users set c_no = ? where username = ? ");
                    $update->bindValue(1,$reqMobile);
                    $update->bindValue(2,$sUserNm);
                    $updates = $update->execute();

                    if ($updates) {
                        $moveOtp = $connection->execute("INSERT INTO centralize_otp_backups(id, mobile, otppassword, user_id, activityType, otp_time, validation_time, status, created) SELECT id, mobile, otppassword, user_id, '3', otp_time, validation_time, '2', '$currTime' FROM centralize_otps WHERE id = '$cOid'");
                        if ($moveOtp) {
                            $delOtp = $connection->execute("Delete FROM centralize_otps WHERE id = '$cOid'");
                        }
                        $this->Flash->success(__('New Mobile No has been updated'));
                        return $this->redirect(['controller'=>'Users','action' => 'index']);
                    }

                }
            }else{
                $this->Flash->error('Incorrect Mobile NO.');
                return $this->redirect(['controller'=>'users', 'action'=>'changeMobileNo']);
            }
        }
        $this->set(compact('otp','sUserNm','mobiNo'));
    }
}
