<?php
session_start();
include '../../config/clsConnectionTicketing.php';
include '../../objects/clsTicketing.php';

$database = new clsConnectionTicketing();
$db = $database->connect();

$ticket = new Ticketing($db);

//get the Manila time by timezone
date_default_timezone_set('Asia/Manila');

//get the current ticket number
$get = $ticket->get_ticket_no();
while($row = $get->fetch(PDO:: FETCH_ASSOC))
{
	$ticket_no = $row['ticket_id'];
	if($ticket_no == 0)
	{
		$ticket_no = 1;
	}
}

$req_id = str_pad($ticket_no, 5, '0', STR_PAD_LEFT);
$yr = date('y');
$month = date('m');
$ticket_no = $yr.'-'.$month.$req_id;

//get the email address of requestor
$ticket->id = $_POST['requested_by'];
$get_email = $ticket->get_email_by_id();
while($row = $get_email->fetch(PDO:: FETCH_ASSOC))
{
	$email_add = $row['email'];
}

//Initialize data for database
$ticket->ticket_no = $ticket_no;
$ticket->requested_by = $_POST['requested_by'];
$ticket->location = $_POST['location'];
$ticket->category_id = $_POST['category'];
$ticket->sub_cat_id = $_POST['subcat'];
$ticket->handled_by = 0;
$ticket->details = $_POST['details'];
$ticket->urgency = $_POST['urgency'];
$ticket->date_requested = date('Y-m-d H:i');
$ticket->status = 1;

$send = $ticket->send_ticket();

	if($send)
	{
		//send email notification if successful
		$from = "system.administrator<(noreply@innogroup.com.ph)>"; 
	    $to = $email_add;
	    $requestor = $_SESSION['firstname'];

	    $subject = "IT Ticketing Request Confirmation";
        $message = "<html>
                        <body style='margin: 0 auto; padding: 10px; border: 1px solid #e1e1e1; font-family:Calibri'>
                              <div style='background-color: #00C957; padding: 5px; color: white'>
                                  <h3 style='padding: 0; margin: 0;'>Notice: </h3>
                              </div>
                              <div style='border: 1px solid #e1e1e1; padding: 5px'>    
                                  Hi ".$requestor.", <br>Greetings!<br>We have received your request with the Ticket No. of <strong><u>".$ticket_no.". Rest assured that a feedback will be provided the soonest. If you would like to follow-up your request, please call the IT Department local 124 and provide your ticket number.<br><br>
                                  Thank you. <br><br> Best Regards, <br>IT Department
                              </div>
                              <br/>
                              <br/>
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