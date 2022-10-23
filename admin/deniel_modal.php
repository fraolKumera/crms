<section class="content">

    <div class="modal fade" id="modal-defaut1">
        <div class="modal-dialog">
            <div class="modal-content" id="login" style="width: 500px">

                <div class="modal-header" style="background-color: #3c8dbc">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: #fff">Denial Reason</h4>
                </div>
                <div class="modal-body">

                    <?php
                   echo $reason = $_SESSION['id'];
                    $query = "SELECT * FROM `assigned_requests` WHERE `ID`='$reason'";
                    $result = $conn->query($query);
                    $rowcount = 0;
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                      

                                $denial_reason = $row['denial_reason'];
                        
                    ?>
                            <b><textarea name="reason" id="compose-textarea" class="common-input mb-20 form-control" style="height: 300px" disabled><?php echo $denial_reason ?></textarea></b></br></br></br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                </div>
            </div>


        <?php
                        }
                    }

                            ?>

        </div>
        <!-- /.modal-content -->
    </div>

    <!-- /.modal-dialog -->
</section>