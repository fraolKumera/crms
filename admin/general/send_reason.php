                      <form method="POST" action="p.php" enctype="multipart/form-data">
                              <select class="form-control" name="request_service">
                                <?php 
                                $sql12="SELECT * FROM `departments`";
                                $result12 = mysqli_query($conn,$sql12);
                                while ($row=mysqli_fetch_array($result12)) {
                                ?>
                                <option value="<?php echo $row['d_name'];?>"> 
                                <?php echo $row['d_name'];?></option>
                                <?php
                                }
                                ?>
                             </select>
                          <br>
                        <div class="modal-footer">
                         
                          <button type="submit" class="btn btn-success btn-flat pull-right" name="send1"> Send </button>
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                        </div>
                      </form>
                    
                    