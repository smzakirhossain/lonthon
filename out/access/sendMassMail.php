<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts-text-editor.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<?php include_once (ebaccess.'/access_permission_admin_minimum.php'); ?>

<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7'>
<div class='well'>
<h2 title='Send Mass eMail'>Send Mass eMail</h2>
</div>
<?php include_once(ebformmail.'/massMail.php'); ?>
<?php $formMail = new ebapps\formmail\formMail(); ?>
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php
/* Initialize valitation */
$error = 0;
$formKey_error = "";
$subjectfor_error = "";
$messagepre_error = "";
$captcha_error = "";

?>
<?php
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
?>
<?php
if (isset($_REQUEST['massMailSend']))
{
extract($_REQUEST);

/* Form Key*/
if(isset($_REQUEST["form_key"]))
{
$form_key = preg_replace('#[^a-zA-Z0-9]#i','',$_POST["form_key"]);
if($formKey->read_and_check_formkey($form_key) == true)
{

}
else
{
$formKey_error = "<b class='text-warning'>Sorry the server is currently too busy please try again later.</b>";
$error = 1;
}
}

/* subjectfor */
if (empty($_REQUEST["subjectfor"]))
{
$subjectfor_error = "<b class='text-warning'>Subject required.</b>";
$error =1;
}
/* valitation subjectfor*/
elseif(! preg_match("/^([A-Za-z.,0-9\'\-\?\ ]+){4,180}$/",$subjectfor))
{
$subjectfor_error = "<b class='text-warning'>Use A-Za-z0-9., mini 4 max 180.</b>";
$error =1;
}
else
{
$subjectfor = $sanitization ->test_input($_POST["subjectfor"]);
}
/* message */

if (empty($_REQUEST["messagepre"]))
{
$messagepre_error = "<b class='text-warning'>How to solve description required</b>";
$error =1;
} 

elseif (!preg_match("/^([a-zA-Z0-9\<\,\>\.\?\/\|\'\"\!\@\#\(\)\-\_\=\+\ ]{3,50000})/",$messagepre))
{
$messagepre_error = "<b class='text-warning'>Certain special characters are not allowed.</b>";
$error =1;
}
else 
{
$messagepre = $sanitization -> testArea($_POST["messagepre"]);
}	

/* Captcha */
if (empty($_REQUEST["answer"]))
{
$captcha_error = "<b class='text-warning'>Captcha required.</b>";
$error =1;
}
elseif (isset($_SESSION['captcha']) and $_POST['answer'] !==$_SESSION['captcha'])
{
unset($_SESSION['captcha']);
$captcha_error = "<b class='text-warning'>Captcha?</b>";
$error =1;
}
else
{
$sanitization->test_input($_POST["answer"]);
}
/* Submition form */
if($error ==0)
{
extract($_REQUEST);
$formMail->ebMassMail($subjectfor,$messagepre);
echo "<pre><b>Mass eMail Sent.</b></pre>";
}
}
?>
<div class='well'>
<form method='post' enctype="multipart/form-data">
          <fieldset class='group-select'>
                <input type='hidden' name='form_key' value='<?php echo $formKey->outputKey(); ?>' />
				<?php echo $formKey_error; ?>
                <?php echo $subjectfor_error;  ?>
                <input class='form-control' type='text' name='subjectfor' placeholder='Subject' required />
                <?php echo $messagepre_error;  ?>			  
			  <textarea class="form-control" name="messagepre" placeholder="Certain special characters are not allowed." id="HowToDo"></textarea>
			  
                <?php echo $captcha_error;  ?>
				<?php
                include_once(ebfromeb.'/captcha.php');
                $cap = new ebapps\captcha\captchaClass();	
                $captcha = $cap -> captchaFun();
                echo "<b class='btn btn-Captcha btn-sm gradient'>$captcha</b>";
                ?>
                <input class='form-control' type='text' name='answer' placeholder='Enter captcha here' required />
                <div class='buttons-set'><button type='submit' name='massMailSend' title='Send Mass eMail' class='button submit'> <span> Send Mass eMail </span> </button></div>
          </fieldset>
        </form>
</div>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once ("access-my-account.php"); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer-edit.php'); ?>