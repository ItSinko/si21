<?php //$con=mysqli_connect("localhost","root","","tutorial");
?>

<style>
.edit{
 width: 100%;
 height: 25px;
}
.editMode{
 border: 1px solid black;
}

/* Table Layout */
table {
 border:3px solid lavender;
 border-radius:3px;
}

table tr:nth-child(1){
 background-color:dodgerblue;
}
table tr:nth-child(1) th{
 color:white;
 padding:10px 0px;
 letter-spacing: 1px;
}

/* Table rows and columns */
table td{
 padding:10px;
}
table tr:nth-child(even){
 background-color:lavender;
 color:black;
}

.txtedit{
 display: none;
 width: 99%;
 height: 30px;
}
</style>
<table width='100%' border='0'>
 <tr>
  <th width='10%'>S.no</th>
  <th width='40%'>Username</th>
  <th width='40%'>Name</th>
 </tr>
 <?php 
 $query = "SELECT * FROM users";
 $result = mysqli_query($con,$query);

 while($row = mysqli_fetch_array($result) ){
  $ide = $row['nocoo_on'];
  $username = $row['username'];
  $sembarang = $row['naeme'];
 ?>
 <tr>
  <td>1</td>
  
  <td> 
    <?php echo $sembarang; ?><

  </td>
 

  <td> 
   
    <div class="edit" > <?php echo $username; ?></div> 
    <input type="text" class="txtedit" value='<?php echo $username; ?>' id="username_<?php echo $ide; ?>" >
  
  </td>
 
 
 

 </tr>
 <?php
 }

 ?>

 
</table>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
 
 // Show Input element
 $('.edit').click(function(){
  $('.txtedit').hide();
  $(this).next('.txtedit').show().focus();
  $(this).hide();
 });

 // Save data
 $(".txtedit").focusout(function(){
  
  // Get edit id, field name and value
  var id = this.id;
  var split_id = id.split("_");
  var field_name = split_id[0];
  var edit_id = split_id[1];
  var value = $(this).val();
  
  
  // Hide Input element
  $(this).hide();

  // Hide and Change Text of the container with input elmeent
  $(this).prev('.edit').show();
  $(this).prev('.edit').text(value);

  
  // Sending AJAX request
  $.ajax({
   url: 'update.php',
   type: 'post',
   data: { field:field_name, value:value, id:edit_id },
   success:function(response){
    console.log('Save successfully'); 
   }
  });
 
 });

});
</script>