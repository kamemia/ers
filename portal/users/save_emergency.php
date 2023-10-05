<?php
session_start();
include('includes/connect.php');

$a = $_POST['emergency_id'];
$b = $_POST['agency_id'];
$c = $_POST['case_severity'];
$d = $_POST['emergency_category'];
$e = $_POST['phone_number'];
$f = $_POST['officer'];
$g = $_POST['name'];
$h = $_POST['state'];
$i = $_POST['status'];
$j = $_POST['victim_id'];
$k = $_POST['dates'];
$l = $_POST['email'];
$m = $_POST['description'];
$u = $_POST['latitude']; 
$o = $_POST['longitude']; 
$r = $_POST['region']; 
$s = $_POST['mapLink']; 
$t = $_POST['action'];


$file_name = '';
$file_name_new = '';

if (!empty($_FILES['photo']['name'])) {
    $file_name = strtolower($_FILES['photo']['name']);
    $file_ext = substr($file_name, strrpos($file_name, '.'));
    $prefix = 'emergency' . md5(time() * rand(1, 9999));
    $file_name_new = $prefix . $file_ext;
    $path = '../../uploads/' . $file_name_new;

    if (@move_uploaded_file($_FILES['photo']['tmp_name'], $path)) {
        // File uploaded successfully
    } else {
        // Handle file upload error
        header("location:report-emergency.php?failed=true");
        exit;
    }
}

$sql = "INSERT INTO emergency (emergency_id,agency_id,case_severity,emergency_category,phone_number,officer,name,state,status,victim_id,dates,email,description,photo,latitude,longitude,region,mapLink,action) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:u,:o,:r,:s,:t)";
$q = $db->prepare($sql);
$q->bindParam(':a', $a);
$q->bindParam(':b', $b);
$q->bindParam(':c', $c);
$q->bindParam(':d', $d);
$q->bindParam(':e', $e);
$q->bindParam(':f', $f);
$q->bindParam(':g', $g);
$q->bindParam(':h', $h);
$q->bindParam(':i', $i);
$q->bindParam(':j', $j);
$q->bindParam(':k', $k);
$q->bindParam(':l', $l);
$q->bindParam(':m', $m);
$q->bindParam(':u', $u);
$q->bindParam(':o', $o);
$q->bindParam(':r', $r);
$q->bindParam(':s', $s);
$q->bindParam(':t', $t);
$q->bindParam(':n', $file_name_new);

if ($q->execute()) {
    header("location:report-emergency.php?success=true");
} else {
    header("location:report-emergency.php?failed=true");
}
?>
