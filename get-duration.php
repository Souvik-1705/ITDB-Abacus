<?php
include('administrator/includes/function.php');

$category=output($_REQUEST['category']);
?>

<select name="duration" id="duration" onChange="getCourseList()" required>

<option value="">Select Duration</option>

<?php

if($category!="")
{
    $sql="SELECT * FROM `ab_duration` WHERE `category`='".$category."' ORDER BY `id`";
    $res=query($conn,$sql);
    $num=numrows($res);

    if($num>0)
    {
        while($fetch=fetcharray($res))
        {
?>
<option value="<?=$fetch['id']?>">
<?=ucwords(strtolower($fetch['duration']))?>
</option>
<?php
        }
    }
}

?>

</select>