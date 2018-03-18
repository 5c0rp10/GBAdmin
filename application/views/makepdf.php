<?php

$inmateID = '';
$name = '';
$Address = '';
$DOB = '';

if(!empty($userInfo))
{
    foreach ($userInfo as $uf)
    {
    	$inmateID = $uf->inm_id;
        $name = $uf->inm_name;
        $Address = $uf->inm_address;
        $DOB = $uf->inm_dob;
    }
}


?>

<!DOCTYPE html>

<html>

<head>

<title>Inmate - <?php echo $name ?></title>

</head>

<body>

<h1 style="text-align: center;"><span style="color: #993366;"><strong>GandiBhavan</strong></span></h1>
<p>&nbsp;</p>
<img style="display: block; margin-left: auto; margin-right: auto;" src="<?php echo base_url()."uploads/photo/inmate/photo_".$inmateID.".jpg"; ?>" alt="Inmate Photo" width="233" height="300" />
<h2 style="text-align: center;"><span style="color: #000000; background-color: #ffffff;"><strong>Name : <?php echo $name; ?></strong></span></h2>
<h2 style="text-align: center;"><span style="color: #000000; background-color: #ffffff;"><strong>Address : <?php echo $Address; ?></strong></span></h2>
<h2 style="text-align: center;"><span style="color: #000000; background-color: #ffffff;"><strong>DOB : <?php echo $DOB; ?></strong></span></h2>

</body>

</html>