<?php

include 'dbConnection.php';

//for announcement
$getPost = "SELECT * FROM announcements ORDER BY uploadId DESC ";
$resultGetPost = mysqli_query($conn, $getPost);

//end of announcement

//for Staff List
$getStaff = "SELECT * FROM staff";
$resultGetStaff = mysqli_query($conn, $getStaff);
//end of Staff List

//for  applicants
$getApplicant = "SELECT * FROM registration WHERE status = 'undefined'";
$resultGetApplicant = mysqli_query($conn, $getApplicant);

$getApplicantApprove = "SELECT * FROM registration WHERE status = 'approved'";
$resultGetApplicantApprove = mysqli_query($conn, $getApplicantApprove);

$getApplicantDenied = "SELECT * FROM registration WHERE status = 'denied'";
$resultGetApplicantDenied = mysqli_query($conn, $getApplicantDenied);

//end of applicants
