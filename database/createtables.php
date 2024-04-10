<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require_once $path . "/student-attendance-management-system/database/database.php";
function clearTable($dbo, $tabName)
{
    $c = "delete from :tabname";
    $s = $dbo->conn->prepare($c);

    try {
        $s->execute([":tabname" => $tabName]);
    } catch (PDOException $o) {
        echo ("<br>Error while deleting tabname.");
    }
}

$dbo = new Database();

//----------------------------------------------------------------
//STUDENT_DETAILS TABLE
$c = "create table student_details 
(
    id int auto_increment primary key,
    roll_no varchar(20) unique,
    name varchar(50)
)";

$s = $dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>Table student_details is created");

} catch (PDOException $o) {
    echo ("<br>Error with table student_details");
}

//----------------------------------------------------------------
//COURSE_DETAILS TABLE
$c = "create table course_details 
(
    id int auto_increment primary key,
    title varchar(50),
    code varchar(20) unique,
    credit int
)";

$s = $dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>Table course_details is created");

} catch (PDOException $o) {
    echo ("<br>Error with table course_details");
}

//----------------------------------------------------------------
//FACULTY_DETAILS TABLE
$c = "create table faculty_details 
(
    id int auto_increment primary key,
    user_name varchar(20) unique,
    name varchar(100),
    password varchar(50)
)";

$s = $dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>Table faculty_details is created");

} catch (PDOException $o) {
    echo ("<br>Error with table faculty_details");
}

//----------------------------------------------------------------
//SESSION_DETAILS TABLE
$c = "create table session_details 
(
    id int auto_increment primary key,
    year int,
    term varchar(50),
    unique (year,term)
)";

$s = $dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>Table session_details is created");

} catch (PDOException $o) {
    echo ("<br>Error with table session_details");
}

//----------------------------------------------------------------
//COURSE_REGISTRATION TABLE
$c = "create table course_registration
(
    student_id int,
    course_id int,
    session_id int,
    primary key (student_id, course_id, session_id)
)";

$s = $dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>Table course_registration is created");

} catch (PDOException $o) {
    echo ("<br>Error with table course_registration");
}


//----------------------------------------------------------------
//COURSE_ALLOTMENT TABLE
$c = "create table course_allotment
(
    faculty_id int,
    course_id int,
    session_id int,
    primary key (faculty_id, course_id, session_id)
)";

$s = $dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>Table course_allotment is created");

} catch (PDOException $o) {
    echo ("<br>Error with table course_allotment");
}

//----------------------------------------------------------------
//ATTENDANCE_DETAILS TABLE
$c = "create table attendance_details
(
    faculty_id int,
    course_id int,
    session_id int,
    student_id int,
    on_date date,
    status varchar(10),
    primary key (faculty_id, course_id, session_id, student_id, on_date)
)";

$s = $dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>Table attendance_details is created");

} catch (PDOException $o) {
    echo ("<br>Error with table attendance_details");
}


//----------------------------------------------------------------
//----------------------------------------------------------------
//INSERT STUDENT DETAILS DATA
$c = "insert into student_details (id, roll_no, name) VALUES
(1, 'CS120001', 'Emma Johnson'),
(2, 'CS120002', 'Liam Smith'),
(3, 'CS120003', 'Olivia Williams'),
(4, 'CS120004', 'Noah Jones'),
(5, 'CS120005', 'Ava Brown'),
(6, 'CS120006', 'Isabella Davis'),
(7, 'CS120007', 'Sophia Miller'),
(8, 'CS120008', 'Mia Wilson'),
(9, 'CS120009', 'Charlotte Moore'),
(10, 'CS120010', 'Amelia Taylor'),
(11, 'CS220011', 'Harper Anderson'),
(12, 'CS220012', 'Evelyn Thomas'),
(13, 'CS220013', 'Abigail Jackson'),
(14, 'CS220014', 'Emily White'),
(15, 'CS220015', 'Elizabeth Harris'),
(16, 'CS220016', 'Sofia Martin'),
(17, 'CS220017', 'Madison Thompson'),
(18, 'CS220018', 'Avery Garcia'),
(19, 'CS220019', 'Ella Martinez'),
(20, 'CS220020', 'Scarlett Robinson'),
(21, 'CS320021', 'Grace Clark'),
(22, 'CS320022', 'Chloe Rodriguez'),
(23, 'CS320023', 'Victoria Lewis'),
(24, 'CS320024', 'Riley Lee'),
(25, 'CS320025', 'Aria Walker'),
(26, 'CS320026', 'Lily Hall'),
(27, 'CS320027', 'Zoey Allen'),
(28, 'CS320028', 'Natalie Young'),
(29, 'CS320029', 'Addison Hernandez'),
(30, 'CS320030', 'Luna King'),
(31, 'CS420031', 'Brooklyn Wright'),
(32, 'CS420032', 'Paisley Lopez'),
(33, 'CS420033', 'Savannah Hill'),
(34, 'CS420034', 'Claire Adams'),
(35, 'CS420035', 'Skylar Baker'),
(36, 'CS420036', 'Kennedy Gonzalez'),
(37, 'CS420037', 'Sadie Nelson'),
(38, 'CS420038', 'Quinn Carter'),
(39, 'CS420039', 'Penelope Mitchell'),
(40, 'CS420040', 'Eleanor Perez'),
(41, 'CS520041', 'Julia Roberts'),
(42, 'CS520042', 'Maya Turner'),
(43, 'CS520043', 'Aurora Phillips'),
(44, 'CS520044', 'Cora Campbell'),
(45, 'CS520045', 'Amara Parker'),
(46, 'CS520046', 'Violet Evans'),
(47, 'CS520047', 'Hazel Edwards'),
(48, 'CS520048', 'Norah Collins'),
(49, 'CS520049', 'Eliza Stewart'),
(50, 'CS520050', 'Ariana Morris'),
(51, 'CS620051', 'Ellie Murphy'),
(52, 'CS620052', 'Stella Alexander'),
(53, 'CS620053', 'Natalia Cooper'),
(54, 'CS620054', 'Alexis Bailey'),
(55, 'CS620055', 'Lucy Reed'),
(56, 'CS620056', 'Alaina Dawson'),
(57, 'CS620057', 'Melanie Fisher'),
(58, 'CS620058', 'Ivy Wright'),
(59, 'CS620059', 'Isabelle Cook'),
(60, 'CS620060', 'Megan Russell')";

$s = $dbo->conn->prepare($c);
try {
    $s->execute();

} catch (PDOException $o) {
    echo ("<br>Duplicate entry");
}

//----------------------------------------------------------------
//----------------------------------------------------------------
//INSERT FACULTY DETAILS DATA
$c = "insert into faculty_details 
(id, user_name, password, name) 
VALUES
(1, 'jdoe', 'pass123', 'John Doe'),
(2, 'asmith', 'pass123', 'Anna Smith'),
(3, 'bwilliams', 'pass123', 'Bob Williams'),
(4, 'cjones', 'pass123', 'Carol Jones'),
(5, 'djohnson', 'pass123', 'David Johnson'),
(6, 'ewright', 'pass123', 'Emma Wright'),
(7, 'fthomas', 'pass123', 'Frank Thomas'),
(8, 'gwhite', 'pass123', 'Grace White'),
(9, 'hmoore', 'pass123', 'Henry Moore'),
(10, 'ijackson', 'pass123', 'Irene Jackson'),
(11, 'jmartin', 'pass123', 'James Martin'),
(12, 'klee', 'pass123', 'Karen Lee'),
(13, 'lhall', 'pass123', 'Larry Hall'),
(14, 'mmiller', 'pass123', 'Megan Miller'),
(15, 'nallen', 'pass123', 'Nathan Allen'),
(16, 'odavis', 'pass123', 'Olivia Davis'),
(17, 'ptaylor', 'pass123', 'Paul Taylor'),
(18, 'qanderson', 'pass123', 'Quinn Anderson'),
(19, 'rclark', 'pass123', 'Rebecca Clark'),
(20, 'swalker', 'pass123', 'Scott Walker'),
(21, 'tmoore', 'pass123', 'Tina Moore'),
(22, 'uroberts', 'pass123', 'Ursula Roberts'),
(23, 'vthompson', 'pass123', 'Victor Thompson'),
(24, 'wwilson', 'pass123', 'Wendy Wilson'),
(25, 'xhernandez', 'pass123', 'Xavier Hernandez'),
(26, 'yperez', 'pass123', 'Yvonne Perez'),
(27, 'zscott', 'pass123', 'Zachary Scott'),
(28, 'amorris', 'pass123', 'Alice Morris'),
(29, 'bcooper', 'pass123', 'Bruce Cooper'),
(30, 'cking', 'pass123', 'Cynthia King')";

$s = $dbo->conn->prepare($c);
try {
    $s->execute();

} catch (PDOException $o) {
    echo ("<br>Duplicate entry");
}


//----------------------------------------------------------------
//----------------------------------------------------------------
//INSERT SESSION DETAILS DATA
$c = "insert into session_details 
(id, year, term)
VALUES
(1, 2024, 'Summer'),
(2, 2022, 'Spring'),
(3, 2022, 'Summer'),
(4, 2020, 'Winter'),
(5, 2022, 'Fall'),
(6, 2023, 'Fall'),
(7, 2024, 'Winter'),
(8, 2020, 'Spring')";

$s = $dbo->conn->prepare($c);
try {
    $s->execute();

} catch (PDOException $o) {
    echo ("<br>Duplicate entry");
}

//----------------------------------------------------------------
//----------------------------------------------------------------
//INSERT COURSE DETAILS DATA
$c = "insert into course_details 
(id, title, code, credit)
VALUES
(1, 'Database Management System Lab', 'CO321', 2),
(2, 'Introduction to Programming', 'CS101', 3),
(3, 'Advanced Algorithms', 'CS302', 4),
(4, 'Web Development Fundamentals', 'WD123', 3),
(5, 'Object Oriented Programming', 'CS202', 3),
(6, 'Data Structures', 'CS303', 4),
(7, 'Software Engineering', 'SE401', 3),
(8, 'Operating Systems', 'OS500', 4),
(9, 'Network Security', 'NS301', 3),
(10, 'Artificial Intelligence', 'AI400', 4),
(11, 'Machine Learning', 'ML350', 3),
(12, 'Digital Signal Processing', 'EE250', 4),
(13, 'Cloud Computing', 'CC410', 3),
(14, 'Computer Graphics', 'CG201', 3),
(15, 'Human-Computer Interaction', 'HCI330', 3),
(16, 'Quantum Computing', 'QC101', 4),
(17, 'Mobile Application Development', 'MAD202', 3),
(18, 'Game Development', 'GD300', 3),
(19, 'Cybersecurity Fundamentals', 'CSF102', 4),
(20, 'Internet of Things', 'IOT500', 3)";

$s = $dbo->conn->prepare($c);
try {
    $s->execute();

} catch (PDOException $o) {
    echo ("<br>Duplicate entry");
}


//----------------------------------------------------------------
//----------------------------------------------------------------
//INSERT COURSE REGISTRATION DATA

//if any records already exist, delete them
clearTable($dbo, "course_registration");
$c = "insert into course_registration
(student_id, course_id, session_id)
VALUES
(:sid, :cid, :sessid)";
$s = $dbo->conn->prepare($c);

//iterate over all 60 students 
//for each student choose max 3 random courses, from 1 to 20
for ($i = 1; $i <= 60; $i++) {
    for ($j = 0; $j < 6; $j++) {
        $cid = rand(1, 20);
        // insert the selected courses into the course_registration table 
        //session 1 and student_id $i
        try {
            $s->execute([":sid" => $i, ":cid" => $cid, ":sessid" => 1]);

        } catch (PDOException $o) {
            echo ("<br>Error in course_registration session 1 data entry.");
        }

        // repeat for session 2
        $cid = rand(1, 20);

        try {
            $s->execute([":sid" => $i, ":cid" => $cid, ":sessid" => 2]);

        } catch (PDOException $o) {
            echo ("<br>Error in course_registration session 2 data entry.");
        }

        // continuo for other sessions 

    }
}


//----------------------------------------------------------------
//----------------------------------------------------------------
//INSERT COURSE ALLOTMENT DATA

//if any records already exist, delete them
clearTable($dbo, "course_allotment");
$c = "insert into course_allotment
(faculty_id, course_id, session_id)
VALUES
(:fid, :cid, :sessid)";
$s = $dbo->conn->prepare($c);

//iterate over all 30 faculty members  
//for each student choose max 2 random courses, from 1 to 20
for ($i = 1; $i <= 30; $i++) {
    for ($j = 0; $j < 5; $j++) {
        $cid = rand(1, 20);
        // insert the selected courses into the course_allotment table 
        //session 1 and faculty_id $i
        try {
            $s->execute([":fid" => $i, ":cid" => $cid, ":sessid" => 1]);

        } catch (PDOException $o) {
            echo ("<br>Error in course_allotment session 1 data entry.");
        }

        // repeat for session 2
        $cid = rand(1, 20);

        try {
            $s->execute([":fid" => $i, ":cid" => $cid, ":sessid" => 2]);

        } catch (PDOException $o) {
            echo ("<br>Error in course_allotment session 2 data entry.");
        }

        // continuo for other sessions 
    }
}

?>