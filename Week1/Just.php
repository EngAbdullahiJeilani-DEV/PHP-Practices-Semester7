
<?php

echo "<h2 style='color: #0a43bd; text-align: center; font-size: 50px; font-weight: bold;'>Jamhuuriya University of Science and Technology</h2>";

$sub_header1 = "About Information";

echo "<p style='color: green; padding-left: 30px; font-weight: 700; font-size: 30px;'>$sub_header1</p>";

$about = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime quod placeat culpa officiis corporis laudantium id at, dolor deserunt harum iste hic ea non consequatur nobis cupiditate qui laborum voluptatum. ";

echo "<p style='color: #0b0a0a; font-size: 20px; padding-left: 30px; line-height: 1.5;'>$about</p>";

$sub_header2 = "Contact Information";

echo "<p style='color: green; font-weight: 700; padding-left: 30px; font-size: 30px;'>$sub_header2</p>";

$email = "info@just.edu.so";
$phone = "+252-61-2223999";
$address = "Digfeer Street, Hodan District, Banadir Region, Mogadishu, Somalia";
$website = "www.just.edu.so";

echo "<p style='padding-left: 30px; font-size: 22px;'>
        <strong style='color: #0c0c0c;'>Email:</strong> $email
      </p>";

echo "<p style='padding-left: 30px; font-size: 22px;'>
        <strong style='color: #080808;'>Phone:</strong> $phone
      </p>";

echo "<p style='padding-left: 30px; font-size: 22px;'>
        <strong style='color: #050506;'>Address:</strong> $address
      </p>";

echo "<p style='padding-left: 30px; font-size: 22px;'> 
<strong style='color: #0a0a0a;'>Website:</strong> <a href='https://$website' target='_blank' style='color: #0a43bd; font-weight: bold;'> $website </a> </p>";

?>

