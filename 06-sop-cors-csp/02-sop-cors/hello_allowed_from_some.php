<?php
$doctor = array(
    "id" => 1,
    "name" => "Folamour",
    "email" => "fou@fou.fou",
    "specialist" => "cardio",
    "created" =>  date_create()->format('Y-m-d H:i:s')
);
echo json_encode($doctor);
