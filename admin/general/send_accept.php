<style>
     
      #login {

    position: absolute;
    background: rgba(0,0,0,.5);
    transform: translate (-50%,-50%);
      }
      </style>
      <section class="content" >
      
       <div class="modal fade" id="modal-accept">
          <div class="modal-dialog">
            <div class="modal-content" id="login">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              
               <form method="post">
                <div class="modal-body">
                <h1 style="color: #999">Enter a Reason</h1>
         <textarea name="reason" id="compose-textarea" class="common-input mb-20 form-control" style="height: 300px"></textarea></br></br></br>
              </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" name="send" value="SEND"></button>
              </div>
        </form>
          <?php
  include('conn.php');
 // $user= $_SESSION['username'];
  
    if (isset($_POST["send"])) {
  // Fetch User details sent
  $reason=$_POST["reason"];
  $_SESSION['username'] = $user;
  // Check if user input is blank
  if ($reason=="") {
    ?><script>
    alert("Enter your reason");
    </script>
    <?php
    exit();
  } else {
     $sql="INSERT INTO `requests` (denial_reason , executive_officer) VALUES ('".$reason."' , '".$user."')";
      if($conn->query($sql)===TRUE)
{
  ?><script>alert('Reason Sent');</script><?php
}
else
{
  ?><script>alert('Reason not Sent');</script><?php
}
 }
}
?>