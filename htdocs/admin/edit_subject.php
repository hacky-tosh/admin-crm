<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body style="background-image: url('black.png')">
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('subject_sidebar.php'); ?>
		
						<div class="span9" id="content">
		                    <div class="row-fluid">
									 
		                        <!-- block -->
		                        <div id="" class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="pull-left">Edit Subject</div>
		                            </div>
		                            <div class="block-content collapse in">
									<a style="color:green" href="subjects.php"><i class="icon-arrow-left"></i> Back</a>
									
									<?php
									$query = mysqli_query($conn,"select * from subject where subject_id = '$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
									
									    <form class="form-horizontal" method="post">
										<div class="control-group">
											<label class="control-label" for="inputEmail">Subject Code</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['subject_code']; ?>" name="subject_code" id="inputEmail" placeholder="Subject Code">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Subject Title</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['subject_title']; ?>" class="span8" name="title" id="inputPassword" placeholder="Subject Title" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Number of Units</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['unit']; ?>" class="span1" name="unit" id="inputPassword" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Description</label>
											<div class="controls">
													<textarea name="description" id="ckeditor_full">
													<?php echo $row['description']; ?>
													</textarea>
											</div>
										</div>
												
																		
											
										<div class="control-group">
										<div class="controls">
										
										<button name="update" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i> Update</button>
										</div>
										</div>
										</form>
										
										<?php
										if (isset($_POST['update'])){
										$subject_code = $_POST['subject_code'];
										$title = $_POST['title'];
										$unit = $_POST['unit'];
										$description = $_POST['description'];
										
										
									
										mysqli_query($conn,"update subject set subject_code = '$subject_code' ,
																		subject_title = '$title',
																		unit  = '$unit',
																		description = '$description'
																		where subject_id = '$get_id' ")or die(mysqli_error());
																		
										mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Edit Subject $subject_code')")or die(mysqli_error());
										
										?>
										<script>
										window.location = "subjects.php";
										</script>
										<?php
										}
										
										
										?>
									
								
		                            </div>
		                        </div>
		                        <!-- /block -->
		                    </div>
		                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>