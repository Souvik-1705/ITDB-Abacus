<?php
session_start();
include('includes/function.php');



if(isset($_SESSION['sid']) || isset($_SESSION['fid']))
{
if($_REQUEST['st']=='C'){
$sql="UPDATE `ab_student` SET `status`='C' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('student.php?page='.$_REQUEST['page']);
}
if($_REQUEST['st']=='D'){
$sql="UPDATE `ab_student` SET `status`='D' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

 $params = array(
        'page'     => $_REQUEST['page'],
        'search'   => $_REQUEST['search'],
        'course'   => $_REQUEST['course'],
        'category' => $_REQUEST['category'],
        'session'  => $_REQUEST['session']
    );

    // Build query string
    $queryString = http_build_query($params);

    redirect('student.php?' . $queryString);
	//redirect('student.php?page='.$_REQUEST['page']);

}

if($_REQUEST['st']=='R'){
$sql="UPDATE `ab_student` SET `status`='R' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);
//echo $_REQUEST['page'];
redirect('drop-student.php?page='.$_REQUEST['page']);
}

if($_REQUEST['actst']=='A'){
$sql="UPDATE `ab_student` SET `actstatus`='I' WHERE `id`='".mysqli_real_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('student.php?page='.$_REQUEST['page']);
}

}


?>