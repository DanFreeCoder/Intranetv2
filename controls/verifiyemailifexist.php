<?php
 session_start();
 $email = $_POST['email'];
 //$email = "arnie.abante@innogroup.com.ph";

 //call the connections and the objects here...by Arnie 
  include "../objects/clsEmployee.php";
  include "../config/clsConnection.php";
  include "../objects/clsUsers.php";

  
  $database = new clsConnection();
  $db = $database->connect();

  $employee = new Employee($db);
  $employee->emailadd = $email;

  $users= new Users($db);
  

  $view_emp = $employee->verify_email_if_exist();
  
  while($row = $view_emp->fetch(PDO::FETCH_ASSOC))
  {
  	$id = $row['id'];
  	if($id > 0)
  	{
  		//generate a code then email the verification code..
        $verification_code = mt_rand(1111, 9999);
        $users->empid = $row['id'];
        $_SESSION['empid'] = $row['id'];
        //$users->empid = 85;
        $users->verification_code = $verification_code;
        
        if($users->update_code())
        {
        	//Mail to our innogroup email addresses
        	 $from = "intranet.admin<noreply>@innogroup.com.ph";
             $to = $email;
             $subject = "Intranet Verification code";
             $message = "<html>
                               <head>
                                </head>
                                 <body style='margin: 0 auto; padding: 10px; border: 1px solid #e1e1e1; font-family:Calibri'>
                                    <div style='background-color: #00C957; padding: 5px; color: white'>
                                        <h3 style='padding: 0; margin: 0;'>Sit down and relax, your acccount will be recover soon!</h3>
                                    </div>
                                    <div style='border: 1px solid #e1e1e1; padding: 5px'>    
                                         Your Verification Code : ".$verification_code."
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
            //Text-notifications

            //$from1 = "INTRANET";
            //$to1 = "09325967992@192.168.6.8";
            //$subject1 = "Intranet Verification code";
            //$message1 = "Your Verification Code : ".$verification_code."";
            //$headers1 .= "From: ".$from."" . "\r\n" ;

            //mail($to1,$subject1,$message1,$headers1);
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
  }

?>