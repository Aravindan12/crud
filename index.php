<?php require_once('server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link  rel="stylesheet" href= "https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready( function () {
    $('#myTable').DataTable({
   // "pagging" = true
    //"ordering" = true
    //"info" = true
    //"serching" = true
    });
} );
  </script>
    </head>
    <body>        
    <?php $db = mysqli_connect('localhost','root','','popup'); ?>
    <?php  $result = mysqli_query($db,"SELECT * FROM save"); ?>


    <table id='myTable' >
        <thead>
        <tr>
        <th>name</th>
        <th>email</th>
        <th>subject</th>
        <th>message</th>
        <th>edit</th>
        <th>delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while($row = mysqli_fetch_array($result)): ?>

        <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['subject']; ?></td>
        <td><?php echo $row['message']; ?></td>
        <td><a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a></td>
        <td><a href="server.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php endwhile; ?>
        </tbody>
        </table>
        
        <?php mysqli_close($db); ?>


       <form action = "index.php" method= "POST" width='90%'>
			<?php include('errors.php');?>
				<div class="row">
                    <div class="form-group">
                    <input type="hidden" class="btn btn-primary"  name = "id" value="<?php echo $id ?>" >
                    </div>	
                    <div class="form-group">
                    <input type="text" class="form-control" id="name" value="<?php echo $name ?>" placeholder="Name" name="name">
                    </div>	        
                    <div class="form-group">
                    <input type="email" class="form-control" id="mail" value="<?php echo $email ?>" placeholder="Email"  name="email">
                    </div>        
                    <div class="form-group">
                    <input type="text" class="form-control" id="sub" value="<?php echo $subject ?>" placeholder="Subject" name="subject">
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" id="mes"  value="<?php echo $message ?>" placeholder="Message" name="message">
                    </div>
                    <div class="form-group">
                    <?php if($update==true): ?>
                    <input type="submit" class="btn btn-primary" name="update" value="update">
                    <?php else: ?>
                    <input type="submit" class="btn btn-primary" name="submit" value="submit">
                    <?php endif; ?>
                    </div>
				</div>
		</form>
    </body>
</html>