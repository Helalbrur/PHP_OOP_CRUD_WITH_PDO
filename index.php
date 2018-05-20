<?php
spl_autoload_register( function($class){

	include "classes/".$class.".php";

});

$st=new Student();
if (isset($_GET['delete'])) {

		$id=$_GET['delete'];
		$st->delete($id);

}

?>


<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="heading">
			<center><h1>PHP OOP CRUD</h1></center>
			<center><a href="index.php">For Student</a> ||
			<a href="Teacher.php">For Teacher</a></center>
		</div>
		<div class="main">
			<section class="mainleft">
				<?php

					if(isset($_GET['edit'])){ 
						$id=$_GET['edit'];
						$res=$st->readById($id);



						?>
							<form action="" method="post">
								<table>
									<tr>
										<td>Name : </td>
										<td> <input type="text" name="name" value=" <?php echo $res['name']; ?> "  required="1"> </td>
									</tr>
									<tr>
										<td>Department : </td>
										<td> <input type="text" name="dep" value=" <?php echo $res['dep']; ?> "  required="1"> </td>
									</tr>
									<tr>
										<td>Age : </td>
										<td> <input type="text" name="age" value=" <?php echo $res['age']; ?> " required="1"> </td>
									</tr>
									<tr>
										<td> </td>
										<td><input type="submit" name="create" value="Submit"></td>
									</tr>
								</table>
							</form>

					<?php	
						if(isset($_POST['create'])){
							$name =  $_POST['name'];
							$dep  =  $_POST['dep'];
							$age  =  $_POST['age'];
							$id   =  $_GET['edit'];

							$st->setName($name);
							$st->setDep($dep);
							$st->setAge($age);
							$st->update($id);
						}
				} 
				else{



				?>
				

				<form action="" method="post">
					<table>
						<tr>
							<td>Name : </td>
							<td> <input type="text" name="name" placeholder=" your name ... " required="1"> </td>
						</tr>
						<tr>
							<td>Department : </td>
							<td> <input type="text" name="dep" placeholder=" your department ... " required="1"> </td>
						</tr>
						<tr>
							<td>Age : </td>
							<td> <input type="text" name="age" placeholder=" your age ... " required="1"> </td>
						</tr>
						<tr>
							<td> </td>
							<td><input type="submit" name="create" value="Submit"></td>
						</tr>
					</table>
				</form>
			<?php

					if(isset($_POST['create'])){
						$name=$_POST['name'];
						$dep=$_POST['dep'];
						$age=$_POST['age'];

						$st->setName($name);
						$st->setDep($dep);
						$st->setAge($age);
						$st->insert();
					}

			 }?>
			</section>
			<section class="mainright">
				<table class="tbl">
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Department</th>
						<th>Age</th>
						<th>Actions</th>
					</tr>

					<?php

						$i=0;
						
						foreach ( $st->readAll() as $value) 
						{ $i++; ?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $value['name']; ?></td>
								<td><?php echo $value['dep']; ?></td>
								<td><?php echo $value['age']; ?></td>
								<td>
									<a href="index.php?edit= <?php echo $value['id']; ?> ">Edit</a> ||
									<a href="index.php?delete= <?php echo $value['id']; ?>">Delete</a>
								</td>
							</tr>
							
				<?php	}
					?>
					
				</table>
			</section>
		</div>
	</body>
</html>