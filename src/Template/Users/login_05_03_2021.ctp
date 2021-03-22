<?php echo $this->Html->script('sha1');?>

<script>
	 function pass(){
	 var random_no=Math.floor(Math.random()*90000) + 10000;
	 var pass1 = sha1(document.getElementById("password").value);
	  document.getElementById("password").value=sha1(pass1+random_no);
	 document.getElementById("random").value = random_no;
	 }
	 // creating captcha
     function createCaptcha() {
         //clear the contents of captcha div first
         document.getElementById('captcha').innerHTML = "";
         // alert('captcha');
         var charsArray ="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
         var lengthOtp  = 6;
         var captcha    = [];
         for (var i = 0; i < lengthOtp; i++) {
             //below code will not allow Repetition of Characters
             var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
             if (captcha.indexOf(charsArray[index]) == -1)
                 captcha.push(charsArray[index]);
             else i--;
         }
         var canv = document.createElement("canvas");
         canv.id     = "captcha";
         canv.width  = 100;
         canv.height = 50;
         var ctx     = canv.getContext("2d");
         ctx.font    = "25px Georgia";
         ctx.strokeText(captcha.join(""), 0, 30);
         //storing captcha so that can validate you can save it somewhere else according to your specific requirements
         code = captcha.join("");
         document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
     }
     function validateCaptcha() {
         //event.preventDefault();
         //debugger
         if (document.getElementById("cpatchaTextBox").value == code) {
             //alert("Valid Captcha")
             return true;
         }else{
             alert("Invalid Captcha.try Again");
             createCaptcha();
             return false;
         }
     }
     function validCapt() {
	     // alert ('Aghori');
         var user = document.getElementById("username").value;
         var pswd = document.getElementById("password").value;
         var cap  = document.getElementById("cpatchaTextBox").value;
         if (user == ""){
             alert("username Is Required.");
             return false;
             window.location.reload();
         }
         if (pswd == ""){
             alert("Password Is Required.");
             return false;
             window.location.reload();
         }
         if (cap == ""){
             alert("captcha Is Required.");
             return false;
             window.location.reload(true);
         }
         return true;
     }


</script>
<style>

#captcha{
    margin-left:10px;
}
/*#captcha {*/
/*    width: 47%;*/
/*    margin-left: 6px;*/
/*    height: 19%;*/
/*    width: 87%;*/
/*    margin-bottom: -52px;*/
/*}*/
.capBox {
    display: inline-block;
    width: 66%;
    margin: -9px 0px 0px -18px;
}
.capRef {
    float: right;
    margin-top: -62px;
}
.for{
    width: 28%;
    margin: 0px auto;
    border: 1px solid #9e96ab52;
    padding: 17px;
    box-shadow: 2px 2px 11px #e6b5b5;
    background-color: white;
    margin-top: 4%;
	}
.for_password{
    display: inline;
    margin-left: 164px;
}
button.success.but {
    background-color: #3e9797;
    font-weight: 900;
    border: none;
    border-radius: 4px;
    width: 100%;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
}
button.success.but:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
h4.ali {
    display: inline;
}
</style>
<body onLoad="createCaptcha()">
    <div class="for">
        <h1 class="center">Login</h1>
        <?= $this->Form->create() ?>
        <?= $this->Form->control('username',['label'=>'','autocomplete'=>'off','value'=>'Admin','placeholder'=>'username']) ?>
        <?= $this->Form->control('password',['label'=>'','size' => 40,'autocomplete'=>'off', 'onBlur' => 'return pass();','onfocus'=>'this.setAttribute("type","password")','placeholder'=>'password' ]) ?>
        <div id="captcha"></div>
            <div class="capBox">
                <?= $this->Form->control('captcha',['label'=>'','type'=>'text','placeholder'=>'Enter Captcha', 'id'=>'cpatchaTextBox','onchange'=>'validateCaptcha()','style'=>'margin-left: 18px;width: 150%;','maxlength'=>'6']) ?>
            </div>

        <div class="capRef">
            <?php echo $this->Form->button('Refresh',['label'=>'','onClick'=>'return createCaptcha()','style'=>'border-radius: 5px; padding: 12px 32px 12px 29px;']) ?>
<!--            <img  src="--><?php //echo $this->request->webroot; ?><!--webroot/img/refresh.jpg"  width="50px" height="50px">-->
        </div>
<!--            <div></div>-->

        <?= $this->Form->button('Login',['label'=>'','class'=>'success but','onclick'=>'return validCapt();']) ?>
        <?=  $this->Form->hidden('random',array('id'=>'random'));?>
        <h4 class="ali"><?= $this->Html->link(__('Forget Password'), ['controller'=>'Users','action' => 'forgetpass']) ?></h4>
        <?= $this->Form->end() ?>
    </div>
</body>

