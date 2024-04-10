<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once $path . "/student-attendance-management-system/database/database.php";
class SessionDetails
{
    public function getSessions($dbo)
    {
        $rv = [];
        $c = "select * from session_details";
        $s = $dbo->conn->prepare($c);
        try {
            $s->execute();
            $rv = $s->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {

        }
        return $rv;
    }
}
?>