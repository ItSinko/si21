			
				<?php
				$con= mysqli_connect("localhost","root","","kontrol_db");
                $query = mysqli_query($con,"SELECT * FROM efaktur INNER JOIN infofaktur ON
											efaktur.noref=infofaktur.norefinfo WHERE  noref='".$_POST["efak"]."' and stok = '1' ORDER BY noefak ");
											
                while ($row = mysqli_fetch_array($query)) {
                
				?>
                    <option value="<?php echo $row['noefak']; ?>"><?php echo $row['noefak']; ?></option>		    
			 <?php
                }
		     ?>  