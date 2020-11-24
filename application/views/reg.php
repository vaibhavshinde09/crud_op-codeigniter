<html>
	<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	<title>Billing Sysyem</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
	.card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
}

</style>
    </head>
	<body>
	<br/></br/>
	
	<?php
	if($this->uri->segment(2) == "inserted")  
	{
		echo '<p class="text-success">Data Inserted</p>';  

	}
	if($this->uri->segment(3) == "updated")  
	{  
		 echo '<p class="text-success">Data Updated</p>';  
	}  

	?>
	<form method="POST"  action="<?php echo base_url();?>Main/Reg">
	<div class="card" style="width: 17rem;">
		<div class="card-header">
    Registration Here..
  </div>
	<div class="col-md-12" style="padding-top:10px;">
	
	<?php  
           if(isset($user_data))  
           {  
                foreach($user_data->result() as $row)  
                {  
           ?>  

	<div class="form-group">
    <label for="lbl">Full Name</label>
	<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Your Name" value="<?php echo $row->fname;?>">
	<span class="text-danger"><?php echo form_error("fname"); ?></span>  

  </div>
  <div class="form-group">
    <label for="lbl">Email</label>
	<input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email"value="<?php echo $row->email;?>">
	<span class="text-danger"><?php echo form_error("email"); ?></span>  

  </div>
  <!-- <div class="form-group">
    <label for="lbl">Username</label>
	<input type="text" class="form-control" id="username"  name="username" placeholder="Enter Your Username">
	<span class="text-danger"><?php echo form_error("username"); ?></span>  
  </div> -->
  <div class="form-group">
    <label for="lbl">Phone Number</label>
	<input type="text" class="form-control" id="phone_no"   name="phone_no" placeholder="Enter Your Mobile No." value="<?php echo $row->phone_no;?>">
	<span class="text-danger"><?php echo form_error("phone_no"); ?></span>  

  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Gender</label>
    <select class="form-control" id="gender" name="gender">
	<option value="none" selected="selected">Select Gender</option>
      <option value="3" <?php echo $row->gender=="3" ? ' selected="selected"' : ''?>>Male</option>
	  <option value="1" <?php echo $row->gender=="1" ? ' selected="selected"' : ''?>>Female</option>
	  <option value="2" <?php echo $row->gender=="2" ? ' selected="selected"' : ''?>>Other</option>
   </select>
  </div>
	<span class="text-danger"><?php echo form_error("gender"); ?></span>  
  
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1" checked>Check me out</label>
  </div><br/>
  <input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>" />  
 <input type="submit" name="update" value="update" class="btn btn-success"> <br/> <br/>
 <span id="success_message"></span>


<?php
				}
			}
			else
			{

	?>
	<div class="form-group">
    <label for="lbl">Full Name</label>
	<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Your Name">
	<span class="text-danger"><?php echo form_error("fname"); ?></span>  

  </div>
  <div class="form-group">
    <label for="lbl">Email</label>
	<input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email">
	<span class="text-danger"><?php echo form_error("email"); ?></span>  

  </div>
  <div class="form-group">
    <label for="lbl">Phone Number</label>
	<input type="text" class="form-control" id="phone_no"   name="phone_no" placeholder="Enter Your Mobile No.">
	<span class="text-danger"><?php echo form_error("phone_no"); ?></span>  

  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Gender</label>
    <select class="form-control" id="gender" name="gender">
	<option value="none" selected="selected">Select Gender</option>
      <option value="3">Male</option>
	  <option value="1">Female</option>
	  <option value="2">Other</option>
   </select>
  </div>
	<span class="text-danger"><?php echo form_error("gender"); ?></span>  
  
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1" checked>Check me out</label>
  </div><br/>
 <input type="submit" name="save" value="save" class="btn btn-success"><br/> <br/>
 <span id="success_message"></span>

 </div>
</div>
			<?php }?>
</form>
<div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th>ID</th>  
                     <th>First Name</th>  
					 <th>Mobile No</th>  
					 <th>Email</th>  
                     <th>Gender</th>  
                     <th>Delete</th>  
                     <th>Update</th>  
				</tr> 
           <?php  
           if($result->num_rows() > 0)  
           {  
                foreach($result->result() as $row)  
                {  
           ?>  
                <tr>  
				
                     <td><?php echo $row->id; ?></td>  
                     <td><?php echo $row->fname; ?></td>  
					 <td><?php echo $row->phone_no; ?></td>  
					 <td><?php echo $row->email; ?></td>  
					 <td><?php echo($row->gender == 1 ? "Other" : ($row->gender == 2 ? "Female" : 
					 ($row->gender == 3 ? "Male" : "unknown")));?></td>

                     <td><a href="#" class="delete_data" id="<?php echo $row->id; ?>">Delete</a></td>  
                     <td><a href="<?php echo base_url(); ?>Main/edit_data/<?php echo $row->id; ?>">Edit</a></td>  
                </tr>  
           <?php       
                }  
           }  
           else  
           {  
           ?>  
                <tr>  
                     <td colspan="5">No Data Found</td>  
                </tr>  
           <?php  
           }  
           ?>  
           </table>  
      </div>  
      <script>  
      $(document).ready(function(){  
           $('.delete_data').click(function(){  
                var id = $(this).attr("id");  
                if(confirm("Are you sure you want to delete this?"))  
                {  
                     window.location="<?php echo base_url(); ?>Main/delete_data/"+id;  
                }  
                else  
                {  
                     return false;  
                }  
           });  
      });  
      </script>  

	</body>
</html>
