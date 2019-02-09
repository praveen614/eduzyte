<?php include "includes/header.php"; ?>
          <tr>
            <td align="left" valign="top" class="welcometxt">Enquiry</td>
          </tr>
          
          <tr>
            <td height="300" align="center" valign="middle" ><script language="javascript">
function validate_contact()
{ 
 if(document.contact.name.value == '' || document.contact.name.value == 'Name')
   {
   alert('Invalid Name');
			  document.contact.name.focus();
			  return false;
   }
    if(document.contact.mobile.value == '' || document.contact.mobile.value == 'Mobile No')
   {
   alert('Invalid Mobile');
			  document.contact.mobile.focus();
			  return false;
   }

		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	 var address = document.contact.email.value;
		   if(reg.test(address) == false) {
			  alert('Invalid Email');
			  document.contact.email.focus();
			  return false;
			 }
			
	 if(document.contact.message.value == '' || document.contact.message.value == 'Message')
   {
   alert('Invalid Message');
			  document.contact.message.focus();
			  return false;
   }
     if(document.contact.captcha.value == '')
   {
   alert('Invalid Security Code');
			  document.contact.captcha.focus();
			  return false;
   }
	 
}
</script>
							  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="contact" id="contact-form"  class="form-horizontal box" onsubmit="return validate_contact()">
                <table border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="right" valign="middle" class="bodytext">Name :</td>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td height="40" align="left" valign="middle"><input name="name" type="text" onfocus="if(this.value=='Name'){this.value=''}"  onblur="if(this.value==''){this.value='Name'}"  style="background-color:#fff; border:#ccc solid 1px; color:#999999; width:300px; height:28px; padding-left:5px;" value="Name"/></td>
                  </tr>
                  <tr>
                    <td align="right" valign="middle" class="bodytext">Mobile No : </td>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td height="40" align="left" valign="middle"><input name="mobile" type="text"  onfocus="if(this.value=='Mobile No'){this.value=''}"  onblur="if(this.value==''){this.value='Mobile No'}"   style="background-color:#fff; border:#ccc solid 1px; color:#999999; width:300px;  height:28px; padding-left:5px;" value="Mobile No" /></td>
                  </tr>
                  <tr>
                    <td align="right" valign="middle" class="bodytext">Email Id : </td>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td height="40" align="left" valign="middle"><input name="email" type="text"  onfocus="if(this.value=='Email'){this.value=''}"  onblur="if(this.value==''){this.value='Email'}"  style="background-color:#fff; border:#ccc solid 1px; color:#999999; width:300px;  height:28px; padding-left:5px;" value="Email" /></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" class="bodytext">Messeage : </td>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td height="40" align="left" valign="middle"><textarea name="message"  onfocus="if(this.value=='Message'){this.value=''}"  onblur="if(this.value==''){this.value='Message'}"  style="background-color:#fff; font-size:14px; font-family:Arial, Helvetica, sans-serif; border:#ccc solid 1px; color:#999999; width:300px;  padding-left:5px;" rows="7">Message</textarea></td>
                  </tr>
				  <tr>
                    <td align="right" valign="top" class="bodytext">Security Code : </td>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td height="40" align="left" valign="middle">
					<img src="captcha_code_file.php?rand=" width="120" height="40" class="capcha" id='captchaimg' />
														  <a href='javascript: refreshCaptcha();'><img style="background:#000000;" src="refresh.png" width="25" height="25" /></a>
														  <input type="text" name="captcha" style="width:60px;" />
					</td>
                  </tr>
                  <tr>
                    <td align="right" valign="bottom">&nbsp;</td>
                    <td align="left" valign="bottom">&nbsp;</td>
                    <td height="30" align="left" valign="bottom"><input type="submit" name="submit" value="Submit" /></td>
                  </tr>
                  <tr>
                    <td align="right" valign="middle">&nbsp;</td>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td align="left" valign="middle">&nbsp;</td>
                  </tr>
                </table>
            </form></td>
          </tr>
          
          <tr>
            <td align="center" valign="top" class="bodytext">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="top" class="bodytext">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
 <?php include "includes/footer.php"; ?>
 
 <script type='text/javascript'>

function refreshCaptcha()

{

	var img = document.images['captchaimg'];

	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;

}

</script> 

<?php
  if(isset($_POST['name']))
  {
  
  if(empty($_SESSION['6_letters_code'] ) ||
		strcasecmp($_SESSION['6_letters_code'], $_POST['captcha']) != 0)
	{  
		echo "<script>alert('Invalid Security Code')</script>";
	}else{
  $name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$message = $_POST['message'];

$subject = "Enquiry - Vallabha Feeds Pvt Ltd";
$message = "Hi <br />
Details : <br />
Name : $name <br />
Mobile : $mobile <br />
Email : $email <br />
Message : $message <br />";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
				
				// Additional headers
				$headers .= 'From: '.$email . "\r\n";
				$headers .= 'Reply-To: '.$email . "\r\n";
				
			
				
				$to = "info@vallabhafeeds.in";
				if(mail($to, $subject, $message, $headers))
				{
				echo "<script>alert('Your Enquiry Has Succssfully Sent.')</script>";
				}
				}
  }
?>