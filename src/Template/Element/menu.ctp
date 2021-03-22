<?php
$session_data = $this->getRequest()->getSession()->read();
//echo "<pre>";print_r($session_data);
if(isset($session_data['Auth']['User']) && !empty($session_data['Auth']['User'])){
    $groupId = $session_data['Auth']['User']['group_id'];
    $user_id = $session_data['Auth']['User']['id'];
    $username = $session_data['Auth']['User']['username'];
}else{
    $groupId = '';
    $user_id = '';
    $username = '';
}
?>
<style type="text/css">
    .bar1, .bar2, .bar3 {
        width: 25px;
        height: 3px;
        background-color: #fff;
        margin: 5px 0;
        transition: 0.4s;
    }

    .change .bar1 {
        -webkit-transform: rotate(-45deg) translate(-5px, 5px);
        transform: rotate(-45deg) translate(-5px, 5px);
    }
    .change .bar2 {opacity: 0;}

    .change .bar3 {
        -webkit-transform: rotate(45deg) translate(-5px, -7px);
        transform: rotate(45deg) translate(-5px, -7px);
    }
</style>
<div class="globalnav-bg">
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-dark px-0">
            <div class="d-flex w-100 b-nav-mobile">
                <button class="navbar-toggler align-self-center b-btn-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" onclick="myFunction(this)">
                    <span style="display:none;">Menu</span>
                    <div>
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav main-menu d-flex">
                    <?php
                      if($groupId == 12){ // DSO ?>
<!--                          <li class="nav-item d-block"> <a href="index.html" class="nav-link active">Home</a> </li>-->
                          <?php if(!empty($groupId) && !empty($user_id)){ ?>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('Home',['class'=>'nav-link']), ['controller' => 'Users', 'action' => 'dsoHome']);?>
                              </li>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('MPR Summary Report',['class'=>'nav-link']),  ['controller' => 'SecyDmfSmfBlocks', 'action' => 'mprSumRprt']);?>
                              </li>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('MPR',['class'=>'nav-link']),  ['controller' => 'SecySmpDmps', 'action' => 'forms']);?>
                              </li>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('RP',['class'=>'nav-link']),  ['controller' => 'users', 'action' => 'resetPass']);?>
                              </li>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('CP',['class'=>'nav-link']),  ['controller' => 'users', 'action' => 'changePass']);?>
                              </li>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('Mobile',['class'=>'nav-link']),  ['controller' => 'users', 'action' => 'changeMobileNo']);?>
                              </li>
                              <li class="nav-item d-block ml-auto b-loginbut" data-toggle="modal" data-target="#login-modal">
                                  <?php echo $this->Html->link(__('LOG OUT',['class'=>'nav-link']), ['controller' => 'Users', 'action' => 'logout']);?>
                              </li>
                          <?php } ?>
                      <?php }
                      elseif ($groupId == 13) { // DEPT. ?>
<!--                          <li class="nav-item d-block"> <a href="index.html" class="nav-link active">Home</a> </li>-->
                          <?php if(!empty($groupId) && !empty($user_id)){ ?>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('Home',['class'=>'nav-link']), ['controller' => 'Users', 'action' => 'departmentHome']);?>
                              </li>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('MPR Summary Report',['class'=>'nav-link']),  ['controller' => 'SecyDmfSmfBlocks', 'action' => 'mprSumRprt']);?>
                              </li>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('MPR',['class'=>'nav-link']),  ['controller' => 'SecySmpDmps', 'action' => 'forms']);?>
                              </li>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('RP',['class'=>'nav-link']),  ['controller' => 'users', 'action' => 'resetPass']);?>
                              </li>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('RP',['class'=>'nav-link']),  ['controller' => 'users', 'action' => 'resetPass']);?>
                              </li>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('CP',['class'=>'nav-link']),  ['controller' => 'users', 'action' => 'changePass']);?>
                              </li>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('Mobile',['class'=>'nav-link']),  ['controller' => 'users', 'action' => 'changeMobileNo']);?>
                              </li>
                              <li class="nav-item d-block ml-auto b-loginbut" data-toggle="modal" data-target="#login-modal">
                                  <?php echo $this->Html->link(__('LOG OUT',['class'=>'nav-link']), ['controller' => 'Users', 'action' => 'logout']);?>
                              </li>
                          <?php } ?>
                      <?php }
                      elseif ($groupId == 20) { // BSO ?>
<!--                          <li class="nav-item d-block"> <a href="index.html" class="nav-link active">Home</a> </li>-->
                          <?php if(!empty($groupId) && !empty($user_id)){ ?>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('Home',['class'=>'nav-link']), ['controller' => 'Users', 'action' => 'bsoHome']);?>
                              </li>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('MPR Summary Report',['class'=>'nav-link']),  ['controller' => 'SecyDmfSmfBlocks', 'action' => 'mprSumRprt']);?>
                              </li>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('MPR',['class'=>'nav-link']),  ['controller' => 'SecySmpDmps', 'action' => 'forms']);?>
                              </li>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('RP',['class'=>'nav-link']),  ['controller' => 'users', 'action' => 'resetPass']);?>
                              </li>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('CP',['class'=>'nav-link']),  ['controller' => 'users', 'action' => 'changePass']);?>
                              </li>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('Mobile',['class'=>'nav-link']),  ['controller' => 'users', 'action' => 'changeMobileNo']);?>
                              </li>
                              <li class="nav-item d-block ml-auto b-loginbut" data-toggle="modal" data-target="#login-modal">
                                  <?php echo $this->Html->link(__('LOG OUT',['class'=>'nav-link']), ['controller' => 'Users', 'action' => 'logout']);?>
                              </li>
                          <?php } ?>
                      <?php }
                      elseif ($groupId == 22) { // SECRETORY ?>
<!--                          <li class="nav-item d-block"> <a href="index.html" class="nav-link active">Home</a> </li>-->
                          <?php if(!empty($groupId) && !empty($user_id)){ ?>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('Home',['class'=>'nav-link']), ['controller' => 'Users', 'action' => '']);?>
                              </li>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('MPR Summary Report',['class'=>'nav-link']),  ['controller' => 'SecyDmfSmfBlocks', 'action' => 'mprSumRprt']);?>
                              </li>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('MPR',['class'=>'nav-link']),  ['controller' => '', 'action' => '']);?>
                              </li>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('RP',['class'=>'nav-link']),  ['controller' => 'users', 'action' => 'resetPass']);?>
                              </li>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('CP',['class'=>'nav-link']),  ['controller' => 'users', 'action' => 'changePass']);?>
                              </li>
                              <li class="nav-item d-block">
                                  <?php echo $this->Html->link(__('Mobile',['class'=>'nav-link']),  ['controller' => 'users', 'action' => 'changeMobileNo']);?>
                              </li>
                              <li class="nav-item d-block ml-auto b-loginbut" data-toggle="modal" data-target="#login-modal">
                                  <?php echo $this->Html->link(__('LOG OUT',['class'=>'nav-link']), ['controller' => 'Users', 'action' => 'logout']);?>
                              </li>
                          <?php } ?>
                     <?php } ?>
                </ul>
            </div>

        </nav>
    </div>
</div>
<script>
function myFunction(x) {
  x.classList.toggle("change");
}
</script>
