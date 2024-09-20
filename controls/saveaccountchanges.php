<?php
  session_start();

  include "../objects/clsUsers.php";
  include "../config/clsConnection.php";
  include "../objects/clsEmployee.php";

  $database = new clsConnection();
  $db = $database->connect();

  $user = new Users($db);

  //get the data...
  $user->password = mysql_escape_string(md5($_POST['p']));
  $user->security_q = mysql_escape_string($_POST['q']);	
  $user->security_a = mysql_escape_string($_POST['a']);
  $user->empid = $_SESSION['empid'];

  //$user->password = mysql_escape_string(md5('password'));
  //$user->security_q = mysql_escape_string('Who is the girl you first kissed?'); 
  //$user->security_a = mysql_escape_string('Melanie');
  //$user->empid = 85;

  $employee = new Employee($db);
  $employee->id = $_SESSION['empid'];

  $view_emailadd = $employee->view_employee();

  $email = "";
  $name = "";

  while($row = $view_emailadd->fetch(PDO::FETCH_ASSOC))
  {
    $email = $row["emailadd"];
    $name = $row["Firstname"];
  }
  
  if($user->update_account_changes())
  {
    //Mail to our innogroup email addresses
             $from = "intranet.admin<noreply>@innogroup.com.ph";  
             $to = $email;
             $subject = "Account Settings for Innogroup Intranet";
             $message = "<html>
                               <head>
                                </head>
                                 <body style='margin: 0 auto; padding: 10px; border: 1px solid #e1e1e1; font-family:Calibri'>
                                    <div style='background-color: #00C957; padding: 5px; color: white'>
                                        <h3 style='padding: 0; margin: 0;'>Status: Your account settings has been successfully updated.</h3>
                                    </div>
                                    <div style='border: 1px solid #e1e1e1; padding: 5px'>    
                                         Hi ".$name.", <br><br> Your account settings has been succesfully updated. If you don't remember this activity, please report immediately to IT Department at it@innogroup.com.ph. <br> Thank You... <br><br> Best Regards, <br>Administrator
                                    </div>
                                    <br/>
                                    <br/>
                                    <div style='padding:10px 0px; text-align: center; font-size: 11px; border-top: 1px solid #e1e1e1'>
                                    Intranet System &middot; <a href='http://www.innogroup.com.ph'>Innogroup</a>
                                    </div>
                            </body>
                        </html>";

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
            $headers .= "From: ".$from."" . "\r\n" ;

            if(mail($to,$subject,$message,$headers))
            {
              echo 1;
            }
            else
            {
                echo 0;
            }
  }
  else
  {
  	echo 0;
  }
  
?>