<link rel="stylesheet" href="mystyle.css">
<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<?php 
	  $post_id = $_GET['post_id'];
	  if($post_id == ''){
	  ?>
		<script>
		window.location = "assignment_student.php<?php echo '?id='.$get_id; ?>";
		</script>
	  <?php
	  }
	
 ?>
    <body style="background-image: url('black.png')" id="studentTableDiv">
		<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('assignment_link_student.php'); ?>
                <div class="span6" id="content">
                     <div class="row-fluid">
					   <!-- breadcrumb -->
				
										<?php $class_query = mysqli_query($conn,"select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_class_id = '$get_id'")or die(mysqli_error());
										$class_row = mysqli_fetch_array($class_query);
										?>
					     <ul class="breadcrumb">
							<li><a href="#"><b><?php echo $class_row['class_name']; ?></b></a> <span class="divider">/</span></li>
							<li><a href="#"><b><?php echo $class_row['subject_code']; ?></b></a> <span class="divider">/</span></li>
							<li><a href="#"><b>School Year: <?php echo $class_row['school_year']; ?></b></a> <span class="divider">/</span></li>
							<li><a href="#"><b>Uploaded Assignments</b></a></li>
						</ul>
						 <!-- end breadcrumb -->
						
						
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<?php
										$query1 = mysqli_query($conn,"select * FROM assignment where assignment_id = '$post_id'")or die(mysqli_error());
										$row1 = mysqli_fetch_array($query1);
									
									?>
									<div class="alert alert-success">Submit Assignment in : <?php echo $row1['fname']; ?></div>
									
									<div id="">
  											
												
				<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
						
										<thead>
										        <tr>
												<th>Date Upload</th>
												<th>File Name</th>
												<th>Description</th>
												<th>Submitted by:</th>
												<th>Grade</th>
												</tr>
												
										</thead>
										<tbody>
											
                              		<?php
										$query = mysqli_query($conn,"select * FROM student_assignment 
										LEFT JOIN student on student.student_id  = student_assignment.student_id
										where assignment_id = '$post_id'  order by assignment_fdatein DESC")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
										$id  = $row['student_assignment_id'];
										$student_id = $row['student_id'];
									?>                              
										<tr>
										 <td><?php echo $row['assignment_fdatein']; ?></td>
                                         <td><?php  echo $row['fname']; ?></td>
                                         <td><?php echo $row['fdesc']; ?></td>                                                                        
                                         <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>   
										 <?php if ($session_id == $student_id){ ?>
                                         <td>
										 <span class="badge badge-success"><?php echo $row['grade']; ?></span>
										 </td>
										 <?php }else{ ?>
										 <td></td>
										 <?php } ?>										 
                                </tr>
                         
						 <?php } ?>
						   
                              
										</tbody>
									</table>
									</div>
								
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
					<?php include('submit_assignment_sidebar.php') ?>
				
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>