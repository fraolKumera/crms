

      
<?php
     if(isset($_POST['send']))
                {
                  include('../conn.php');
         $u_id=$_POST['u_id'];
         $off_name=$_POST['off_name'];
					$reason=$_POST['reason'];
             ?><!--<script>alert('Accepted');</script>--><?php
            $sql = "UPDATE `assigned_requests` SET `denial_reason` = '$reason' , `executive_officer_status` = 2 WHERE `ID` = '".$u_id."'";
             $sql1 = "UPDATE `assigned_requests` SET `executive_officer_name` = '".$off_name."' WHERE `ID` = '".$u_id."'";
			
             if(!mysqli_query($conn,$sql) && !mysqli_query($conn,$sql1))
            {
              echo 'not updated';
                 
              }
              else
			  {
				  ?><script>alert('Denial Reason Successfully inserted')
          window.location.href = "../assined_requests.php";</script><?php

			  }
		  
            }                     
       /*$time=date('h:i:s');
       $selectedTime = $time;
       $endTime = strtotime("+15 minutes", strtotime($selectedTime));
       echo date('h:i:s', $endTime);
                if(!isset($_POST['send']) && $endTime >= $time)
                {
                  
    
                  ?><script>alert('it has been 15 minutes since id <?php echo $_SESSION['ID']?> has request');</script><?php
                }
*/
            
            ?>
