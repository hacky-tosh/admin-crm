   <div class="row-fluid">
    
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Edit Department</div>
                            </div>
							<?php 
							$query = mysqli_query($conn,"select * from department where department_id = '$get_id'")or die(mysqli_error());
							$row = mysqli_fetch_array($query);
							?>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['department_name']; ?>" id="focusedInput" name="d" type="text" placeholder = "Deparment">
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['dean']; ?>" id="focusedInput" name="dn" type="text" placeholder = "Person Incharge">
                                          </div>
                                        </div>
								
										
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <a href="department.php" class="btn btn-success"><i class="icon-arrow-left icon-large"></i> Back </a>
                        <!-- /block -->
                    </div>
					
 <?php
 if (isset($_POST['update'])){
 

 $dn = $_POST['dn'];
 $d = $_POST['d'];
 
 mysqli_query($conn,"update department set department_name = '$dn' , dean  = '$d' where department_id = '$get_id' ")or die(mysqli_error());
 ?>
 <script>
 window.location='department.php'; 
 </script>
 <?php 
 }
 ?>
 