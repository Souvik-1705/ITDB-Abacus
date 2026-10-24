<?php  
include('includes/function.php');  
 
$course=trim($_GET['course']); 
 
if($course!="") 
{ 
    $course=mysqli_real_escape_string($conn,$course); 
 
    $sql="SELECT * FROM `ab_course` WHERE `code`='".$course."' ORDER BY `level` ASC"; 
    $res=query($conn,$sql); 
 
    if(numrows($res)>0) 
    { 
        while($fetch=fetcharray($res)) 
        { 
 
            $level=$fetch['level']; 
?> 
 
<div class="col-md-12"> 
<div style="background:#023278; color:#FFFFFF; padding:10px 15px; margin-top:15px; margin-bottom:15px; border-radius:5px; font-weight:bold;"> 
Level <?=$level?> 
</div> 
</div> 
 
<div class="col-md-12"> 
<div class="form-group"> 
<label>Level Duration <b style="color:#FF0000;">*</b></label> 
 
<input type="text"  
       class="form-control border-primary"  
       placeholder="Level <?=$level?> Duration"  
       name="level_duration[<?=$level?>]"  
       required> 
 
</div> 
</div> 
 
 
<div class="col-md-12"> 
<div class="form-group"> 
<label>Description <b style="color:#FF0000;">*</b></label> 
 
<textarea class="form-control border-primary"  
          placeholder="Level <?=$level?> Description"  
          name="description[<?=$level?>]"  
          rows="4"  
          required></textarea> 
 
</div> 
</div> 
 
 
<div class="col-md-12"> 
<div class="form-group"> 
 
<label>Age <b style="color:#FF0000;">*</b></label> 
 
<select name="age[<?=$level?>]" class="form-control border-primary" required> 
 
<option value="">Select Age</option> 
 
<option value="1-2 Years">1-2 Years</option> 
<option value="2-3 Years">2-3 Years</option> 
<option value="3-4 Years">3-4 Years</option> 
<option value="4-5 Years">4-5 Years</option> 
<option value="5-6 Years">5-6 Years</option> 
<option value="6-7 Years">6-7 Years</option> 
<option value="7-8 Years">7-8 Years</option> 
<option value="8-10 Years">8-10 Years</option> 
 
</select> 
 
</div> 
</div> 
 
<?php 
        } 
    } 
} 
?>