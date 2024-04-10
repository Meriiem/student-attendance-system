<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once $path . "/student-attendance-management-system/database/database.php";
require_once $path . "/student-attendance-management-system/database/sessionDetails.php";
require_once $path . "/student-attendance-management-system/database/facultyDetails.php";
require_once $path . "/student-attendance-management-system/database/courseRegistrationDetails.php";
require_once $path . "/student-attendance-management-system/database/attendanceDetails.php";
function createCSVReport($list, $filename)
{
    $error = 0;
    $path = $_SERVER['DOCUMENT_ROOT'];
    $finalFileName = $path . $filename;
    try {
        $fp = fopen($finalFileName, "w");
        foreach ($list as $line) {
            fputcsv($fp, $line);
        }
    } catch (Exception $e) {
        $error = 1;
    }
}
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
    if ($action == "getSession") {

        $dbo = new Database();
        $sobj = new SessionDetails();
        $rv = $sobj->getSessions($dbo);

        echo json_encode($rv);
    }
    if ($action == "getFacultyCourses") {
        //get the courses taken by fac in sess
        $facid = $_POST['facid'];
        $sessionid = $_POST['sessionid'];
        $dbo = new Database();
        $fo = new faculty_details();
        $rv = $fo->getCoursesInASession($dbo, $sessionid, $facid);
        echo json_encode($rv);
    }

    if ($action == "getStudentList") {
        $classid = $_POST['classid'];
        $sessionid = $_POST['sessionid'];
        $facid = $_POST['facid'];
        $ondate = $_POST['ondate'];
        $dbo = new Database();
        $crgo = new CourseRegistrationDetails();
        $allstudents = $crgo->getRegisteredStudents($dbo, $sessionid, $classid);
        $ado = new attendanceDetails();
        $presentStudents = $ado->getPresentListOfAClassByAFacOnADate($dbo, $sessionid, $classid, $facid, $ondate);
        for ($i = 0; $i < count($allstudents); $i++) {
            $allstudents[$i]['isPresent'] = 'NO';//by default NO
            for ($j = 0; $j < count($presentStudents); $j++) {
                if ($allstudents[$i]['id'] == $presentStudents[$j]['student_id']) {
                    $allstudents[$i]['isPresent'] = 'YES';
                    break;
                }
            }
        }
        echo json_encode($allstudents);
    }

    if ($action == "saveattendance") {
        $courseid = $_POST['courseid'];
        $sessionid = $_POST['sessionid'];
        $studentid = $_POST['studentid'];
        $facultyid = $_POST['facultyid'];
        $ondate = $_POST['ondate'];
        $status = $_POST['ispresent'];
        $dbo = new Database();
        $ado = new attendanceDetails();
        $rv = $ado->saveAttendance($dbo, $sessionid, $courseid, $facultyid, $studentid, $ondate, $status);
        echo json_encode($rv);
    }

    if ($action == "downloadReport") {
        $courseid = $_POST['classid'];
        $sessionid = $_POST['sessionid'];
        $facultyid = $_POST['facid'];

        $dbo = new Database();
        $ado = new attendanceDetails();

        $list = [
            [1, "MCJ21001", 20.00],
            [2, "BBM21002", 30.00],
            [3, "COM21003", 40.00]
        ];
        $list = $ado->getAttenDanceReport($dbo, $sessionid, $courseid, $facultyid);
        $filename = "/student-attendance-management-system/report.csv";
        $rv = ["filename" => $filename];
        createCSVReport($list, $filename);
        echo json_encode($rv);
    }
}
?>