<?php

require_once 'Connection.php';
class IncentiveApplicationRecord 
{

    
    public function sendForm($partner_ic, $partner_name, $partner_gender, $partner_age, $partner_salary, $applicant_ic, $applicant_name, $applicant_gender,$applicant_age, $applicant_salary, $purpose) {

       
        $dbConnection = new DatabaseConnection('localhost', 'emuna1', 'root', '');

        $mysqli = $dbConnection->getMysqli();

        try 
        {
            $mysqli->autocommit(false);
        
            $sql1 = "INSERT INTO partner (partner_ic, partner_name, partner_gender, partner_age, partner_salary) VALUES (?, ?, ?, ?, ?)";
            $stmt1 = $mysqli->prepare($sql1);
            $stmt1->bind_param("sssis", $partner_ic, $partner_name, $partner_gender, $partner_age, $partner_salary);
            $stmt1->execute();
            $partner_id = $stmt1->insert_id;

            $sql2 = "INSERT INTO applicant (applicant_ic, applicant_name, applicant_gender, applicant_age, applicant_salary, partner_ic) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt2 = $mysqli->prepare($sql2);
            $stmt2->bind_param("ssssis", $applicant_ic, $applicant_name, $applicant_gender, $applicant_age, $applicant_salary, $partner_ic);
            $stmt2->execute();

            $applicant_id = $stmt2->insert_id;

            $sql3 = "INSERT INTO incentive (applicant_ic) VALUES (?)";
            $stmt3 = $mysqli->prepare($sql3);
            $stmt3->bind_param("s", $applicant_ic);
            $stmt3->execute();

            $mysqli->commit();
            
        }catch (Exception $e) {
            $mysqli->rollback();
            die("Error inserting data: " . $e->getMessage());
        } finally {
            $mysqli->autocommit(true);
        }

        $dbConnection->close();
    }

    public function viewAllApplication(){
        
        $dbConnection = new DatabaseConnection('localhost', 'emuna1', 'root', '');
        $mysqli = $dbConnection->getMysqli();

        try {
            $sql = "SELECT p.*, a.* FROM partner p LEFT JOIN applicant a ON p.partner_ic = a.partner_ic";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0){
                $data = $result->fetch_all(MYSQLI_ASSOC);

                return $data;
            } else {
                return [];
            }
        } catch (Exception $e){
            die("Error retrieving data: " . $e->getMessage());
        } finally {
            $dbConnection->close();
        }
    }

    public function searchIC($applicantIC)
    {
        $dbConnection = new DatabaseConnection('localhost', 'emuna1', 'root', '');
        $mysqli = $dbConnection->getMysqli();

        try
        {
            $sql =  "SELECT p.*, a.*, c.*, w.*
            FROM partner p LEFT JOIN applicant a ON p.partner_ic = a.partner_ic
            LEFT JOIN consultation c ON  a.applicant_ic = c.applicant_ic 
            LEFT JOIN appointment w ON c.consultation_id = w.consultation_id
            WHERE c.applicant_ic = '$applicantIC'";

            $result = $mysqli->query($sql);

            if ($result && $result->num_rows > 0)
            {
                $data = $result->fetch_assoc();
                return $data;

                
            } else {
                return null;
            }
        } catch (Exception $e){
            die("Error retrieving data: " . $e->getMessage());
        } finally {
            $dbConnection->close();
        }
    }

    public function viewDetail($applicantIC)
    {
        $dbConnection = new DatabaseConnection('localhost', 'emuna1', 'root', '');
        $mysqli = $dbConnection->getMysqli();

        try
        {
            $sql =  "SELECT p.*, a.*, c.*
                    FROM partner p LEFT JOIN applicant a ON p.partner_ic = a.partner_ic
                    LEFT JOIN consultation c ON  a.applicant_ic = c.applicant_ic WHERE c.applicant_ic = '$applicantIC'";
            $result = $mysqli->query($sql);

            if ($result && $result->num_rows > 0)
            {
                $data = $result->fetch_assoc();
                return $data;
            } else {
                return null;
            }
        } catch (Exception $e){
            die("Error retrieving data: " . $e->getMessage());
        } finally {
            $dbConnection->close();
        }
    }

    public function apptInfo($application_status, $applicantIC)
    {
        $dbConnection = new DatabaseConnection('localhost', 'emuna1', 'root', '');

        $mysqli = $dbConnection->getMysqli();

        try 
        {
            $mysqli->autocommit(false);
        
            $sql1 = "SELECT staff_id FROM jaip_staff";
            $result = $mysqli->query($sql1);

            if ($result && $result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    $staff_id = $row['staff_id'];
                }
            }
            
           $sql2 = "SELECT incentive_id FROM incentive WHERE applicant_ic = '$applicantIC' ";
            $result = $mysqli->query($sql2);

            if ($result && $result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    $incentive_id = $row['incentive_id'];
                }
            }

            $sql3 = "INSERT INTO incentive (application_status, staff_id, incentive_id) VALUES (?, ?, ?)";
            $stmt2 = $mysqli->prepare($sql3);
            $stmt2->bind_param("ssi", $application_status, $staff_id, $consultation_id);
            $stmt2->execute();
                
            $mysqli->commit();
            
        }catch (Exception $e) {
            $mysqli->rollback();
            die("Error inserting data: " . $e->getMessage());
        } finally {
            $mysqli->autocommit(true);
        }

        
        

        $dbConnection->close();
    }

    public function viewAppt($applicantIC)
    {
        $dbConnection = new DatabaseConnection('localhost', 'emuna1', 'root', '');
        $mysqli = $dbConnection->getMysqli();

        try
        {
            $sql =  "SELECT p.*, a.*, c.*, w.*
            FROM partner p LEFT JOIN applicant a ON p.partner_ic = a.partner_ic
            LEFT JOIN consultation c ON  a.applicant_ic = c.applicant_ic 
            LEFT JOIN appointment w ON c.consultation_id = w.consultation_id
            WHERE c.applicant_ic = '$applicantIC'";
            $result = $mysqli->query($sql);

            if ($result && $result->num_rows > 0)
            {
                $data = $result->fetch_assoc();
                return $data;
            } else {
                return null;
            }
        } catch (Exception $e){
            die("Error retrieving data: " . $e->getMessage());
        } finally {
            $dbConnection->close();
        }
    }


    public function EditAppointment($appointment_location, $appointment_date, $appointment_time, $consultation_id)
    {
        $dbConnection = new DatabaseConnection('localhost', 'emuna1', 'root', '');

        $mysqli = $dbConnection->getMysqli();

        try
        {
            $mysqli->begin_transaction();

            $sql = "UPDATE appointment SET appointment_location = ?, appointment_date = ?, appointment_time = ? WHERE consultation_id = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("sssi", $appointment_location, $appointment_date, $appointment_time, $consultation_id);
            $stmt->execute();

            if ($stmt->affected_rows>0)
            {
                echo "Data updated successfully";
                $mysqli->commit();
            } else {
                echo "Failed to update data";
            }

        }catch (Exception $e) {
            $mysqli->rollback();
            die("Error inserting data: " . $e->getMessage());
        } finally {
            $mysqli->autocommit(true);
        }

        $dbConnection->close();
    }    
}

?>