<?php

class classroom extends configuration {
	public $classname,$video;
		
	public function classroomdata($ID) {
		$query = $this->connect->query("SELECT * FROM `course_class` WHERE `class_ID`='$ID' ");
		$result = $query->fetch_assoc();
		$this->classname = $result['class_name'];
		$this->video	 = $result['class_video'];
		}
		
		public function video($file,$classID) {
			
			$query = $this->connect->query("UPDATE `course_class` SET `class_video`='$file' WHERE `class_ID`='$classID' ");
			
			}
		
		public function assignment($classID){
			$query = $this->connect->query("SELECT * FROM `class_assignment` WHERE `class_ID`='$classID' ");
			
			while($result = $query->fetch_assoc()){
				
				?>
					
                    	<tr>
                        	<td><?php echo $result['title'];?></td>
                            <td><a class="btn" onclick="ManageAssing('delete','<?php echo $result['assignmentID']?>','<?php echo $result['class_ID'];?>')">Delete</a></td>
                            <td><a class="btn" onclick="ManageAssing('edit','<?php echo $result['assignmentID']?>','<?php echo $result['class_ID'];?>')">Edit</a></td>
                        </tr>
                    
				<?php
				
				}
				
				
				
				?>
					<script>
                    	function ManageAssing(action,assignmentID,classID){
							
							$.post("configuration/master_handler.php",{action:action,classID:classID,assignmentID:assignmentID,handle:"assignment"},function(data) {
								//alert("hello");
								$(".resources").html(data);
																
								});
								
							}
                    </script>
				<?php
			}
			
			
	}

?>