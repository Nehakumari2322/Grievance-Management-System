<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.

/**
 * Description of User
 *
 * @author Software Development Wing <Penta Head Private Ltd.>
 */
class Executive {
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }
    public function login_verification($data){
        // return true;
        $this->db->query('SELECT * FROM login_details where login_id = :userid and password = :password and role= :role' );
        $this->db->bind(':userid', $data['userid']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':role', $data['role']);
        if($row = $this->db->single()){
            return true;
        }
        else{
            return false;
        }
               
    }
    public function getCountOfHighPriorityCase($branch){
        $this->db->query(' SELECT c.id,c.name,c.branch_id, c.ward_no,c.case_id, c.category_id, c.subcategory_id, '
                        .' c.description, c.status_id, c.case_priority, c.create_ts, c.created_by, '
                        .' c.last_updated_ts, c.last_updated_by,cc.category_desc,cs.subcategory_desc '
                        .' FROM complainant_details c,case_category cc,case_subcategory cs '
                        .' WHERE cc.category_id = c.category_id AND cs.subcategory_id = c.subcategory_id '
                        .' AND c.case_priority="Higher" AND branch_id=:branch_id ');
        $this->db->bind(':branch_id',$branch);
        $row = $this->db->resultSet();
        return $row;
    }
    public function getCountOfMediumPriorityCase($branch){
        $this->db->query(' SELECT c.id,c.name,c.branch_id, c.ward_no,c.case_id, c.category_id, c.subcategory_id, '
                        .' c.description, c.status_id, c.case_priority, c.create_ts, c.created_by, '
                        .' c.last_updated_ts, c.last_updated_by,cc.category_desc,cs.subcategory_desc '
                        .' FROM complainant_details c,case_category cc,case_subcategory cs '
                        .' WHERE cc.category_id = c.category_id AND cs.subcategory_id = c.subcategory_id '
                        .' AND c.case_priority="Medium" AND branch_id=:branch_id');
        $this->db->bind(':branch_id',$branch);
        $row = $this->db->resultSet();
        return $row;
    }
    public function getCountOfLowPriorityCase($branch){
        $this->db->query(' SELECT c.id,c.name,c.branch_id, c.ward_no,c.case_id, c.category_id, c.subcategory_id, '
                        .' c.description, c.status_id, c.case_priority, c.create_ts, c.created_by, '
                        .' c.last_updated_ts, c.last_updated_by,cc.category_desc,cs.subcategory_desc '
                        .' FROM complainant_details c,case_category cc,case_subcategory cs '
                        .' WHERE cc.category_id = c.category_id AND cs.subcategory_id = c.subcategory_id '
                        .' AND c.case_priority="Low" AND branch_id=:branch_id');
                        $this->db->bind(':branch_id',$branch);
        $row = $this->db->resultSet();
        return $row;
    }
    public function getTotalCase($branch){
        $this->db->query(' SELECT c.id,c.name,c.branch_id, c.ward_no,c.case_id, c.category_id, c.subcategory_id, '
                        .' c.description, c.status_id, c.case_priority, c.create_ts, c.created_by, '
                        .' c.last_updated_ts, c.last_updated_by,cc.category_desc,cs.subcategory_desc '
                        .' FROM complainant_details c,case_category cc,case_subcategory cs '
                        .' WHERE cc.category_id = c.category_id AND cs.subcategory_id = c.subcategory_id '
                        .' AND branch_id=:branch_id');
                        $this->db->bind(':branch_id',$branch);
        $row = $this->db->resultSet();
        return $row;
    }
    public function getwardDetails(){
        $this->db->query(' SELECT ward_id, ward_no '
                        .'FROM ward_details WHERE 1=1 ');
                        $row = $this->db->resultSet();
                        return $row;
    }
    public function getBranchDetails(){
        $this->db->query(' SELECT branch_id, branch_desc, ward_or_panchayat, ward_no, '
                        .' panchayat, vidhansabha, loksabha, create_ts  '
                        .'FROM branch WHERE 1=1 ');
                        $row = $this->db->resultSet();
                        return $row;
    }
    public function getdeskagentDetails(){
        $this->db->query(' SELECT desk_agent_id, agent_name, login_id,password,contact_no,d_o_b, gender, '
                        .'address, state,city, pincode, qualification, occupation, '
                        .' create_ts, create_by, last_update_ts, '
                        .' last_updated_by FROM desk_agent_details WHERE 1=1 ');
                        $row = $this->db->resultSet();
                        return $row;
    }
    public function getfieldagentDetails(){
        $this->db->query(' SELECT field_agent_id, agent_name,contact_no,d_o_b, gender, '
                        .'address, state,city, pincode, qualification, occupation, '
                        .' create_ts, create_by, last_update_ts, '
                        .' last_updated_by FROM field_agent_details WHERE 1=1 ');
                        $row = $this->db->resultSet();
                        return $row;
    }
    public function getreviewerDetails(){
        $this->db->query(' SELECT reviewer_id, reviewer_name, login_id,password,contact_no,d_o_b,'
                        .' gender,  address, state,city, pincode, qualification, '
                        .'  occupation, create_ts, create_by, last_update_ts, '
                        .' last_updated_by FROM reviewer_details WHERE 1=1 ');
        $row = $this->db->resultSet();
        return $row;
    }
    public function getcaseDetails(){
        $this->db->query(' SELECT * from complainant_details cd where 1=1 ');
        $row = $this->db->resultSet();
        return $row;
    }
    public function getcaseDetailsByBranchId($branch){
        $this->db->query(' SELECT * from complainant_details  where branch_id=:branch_id ');
        $this->db->bind(':branch_id', $branch);
        $row = $this->db->resultSet();
        return $row;
    }
    public function getAllCategory(){
        $this->db->query(' SELECT * FROM case_category WHERE 1 = 1 ');
        $row = $this->db->resultSet();
        return $row;
    }

    public function getAllSubCategory(){
        $this->db->query('SELECT * FROM case_subcategory WHERE 1 = 1');
        $row = $this->db->resultSet();
        return $row;
    }
    public function insertdeskagentDetails($agent_name,$loginId,$password,$branch,$dob,$gender,$address,$state,$city,$district,$ward,$pincode,$qualification,$institute,$passingYear,$contactNo,$companyName,$jobTitle,$workEmail,$officeAddress,$createTs,$createBy,$lastUpdatedBy,$lastUpdatedTs){
        $this->db->query('INSERT INTO desk_agent_details(desk_agent_id,agent_name,login_id,password,branch_id, '
                        .'d_o_b,gender,address,state,district,city,ward_no,pincode,qualification,institute, '
                        .'passing_year,contact_no,company_name,occupation,work_email,office_address, '
                        .'create_ts,create_by,last_updated_by,last_update_ts) '
                        .' VALUES (0,:agent_name,:login_id,:password,:branch_id,:d_o_b,:gender,:address,:state,'
                        .':district,:city,:ward_no,:pincode,:qualification,:institute,:passing_year,'
                        .':contact_no,:company_name,:occupation,:work_email,:office_address,'
                        .':create_ts,:create_by,:last_updated_by,:last_update_ts) ');
        $this->db->bind(':agent_name',$agent_name);
        $this->db->bind(':login_id',$loginId);
        $this->db->bind(':password',$password);
        $this->db->bind(':branch_id',$branch);
        $this->db->bind(':d_o_b',$dob);
        $this->db->bind(':gender',$gender);
        $this->db->bind(':address',$address);
        $this->db->bind(':state',$state);
        $this->db->bind(':district',$district);
        $this->db->bind(':city',$city);
        $this->db->bind(':ward_no',$ward);
        $this->db->bind(':pincode',$pincode);
        $this->db->bind(':qualification',$qualification);
        $this->db->bind(':contact_no',$contactNo);
        $this->db->bind(':institute',$institute);
        $this->db->bind(':passing_year',$passingYear);
        $this->db->bind(':company_name',$companyName);
        $this->db->bind(':occupation',$jobTitle);
        $this->db->bind(':work_email',$workEmail);
        $this->db->bind(':office_address',$officeAddress);
        $this->db->bind(':create_ts',$createTs);
        $this->db->bind(':create_by',$createBy);
        $this->db->bind(':last_updated_by',$lastUpdatedBy);
        $this->db->bind(':last_update_ts',$lastUpdatedTs);

       
        if($this->db->execute()){
            $agentId = $this->db->insertId();
            // return  $id;
            return true;
        }
        else {
            return false;
        }
}
public function insertfieldagentDetails($agent_name,$branch,$password,$dob,$gender,$address,$state,$city,$district,$ward,$pincode,$qualification,$institute,$passingYear,$contactNo,$companyName,$jobTitle,$workEmail,$officeAddress,$createTs,$createBy,$lastUpdatedBy,$lastUpdatedTs){
    $this->db->query('INSERT INTO field_agent_details(field_agent_id,agent_name,branch_id,password, '
                    .'d_o_b,gender,address,state,district,city,ward_no,pincode,qualification,institute, '
                    .'passing_year,contact_no,company_name,occupation,work_email,office_address, '
                    .'create_ts,create_by,last_updated_by,last_update_ts) '
                    .' VALUES (0,:agent_name,:branch_id,:password,:d_o_b,:gender,:address,:state,'
                    .':district,:city,:ward_no,:pincode,:qualification,:institute,:passing_year,'
                    .':contact_no,:company_name,:occupation,:work_email,:office_address,'
                    .':create_ts,:create_by,:last_updated_by,:last_update_ts) ');
    $this->db->bind(':agent_name',$agent_name);
    $this->db->bind(':branch_id',$branch);
    $this->db->bind(':password',$password);
    $this->db->bind(':d_o_b',$dob);
    $this->db->bind(':gender',$gender);
    $this->db->bind(':address',$address);
    $this->db->bind(':state',$state);
    $this->db->bind(':district',$district);
    $this->db->bind(':city',$city);
    $this->db->bind(':ward_no',$ward);
    $this->db->bind(':pincode',$pincode);
    $this->db->bind(':qualification',$qualification);
    $this->db->bind(':contact_no',$contactNo);
    $this->db->bind(':institute',$institute);
    $this->db->bind(':passing_year',$passingYear);
    $this->db->bind(':company_name',$companyName);
    $this->db->bind(':occupation',$jobTitle);
    $this->db->bind(':work_email',$workEmail);
    $this->db->bind(':office_address',$officeAddress);
    $this->db->bind(':create_ts',$createTs);
    $this->db->bind(':create_by',$createBy);
    $this->db->bind(':last_updated_by',$lastUpdatedBy);
    $this->db->bind(':last_update_ts',$lastUpdatedTs);

   
    if($this->db->execute()){
        $agentId = $this->db->insertId();
        return  $agentId;
        // return true;
    }
    else {
        return false;
    }
}
public function assignBranchToFieldAgent($agentId,$category){
    $this->db->query('INSERT INTO field_agent_branch_assign(id,desk_agent_id,branch_id) '
                    .' VALUES (0,:desk_agent_id,:branch_id,) ');
    $this->db->bind(':desk_agent_id',$agentId);
    $this->db->bind(':branch_id',$category);

    if($this->db->execute()){
        // $agentId = $this->db->insertId();
        // return  $agentId;
        return true;
    }
    else {
        return false;
    }
}
public function insertreviewerDetails($reviewerName,$branch,$loginId,$password,$dob,$gender,$address,$state,$city,$district,$ward,$pincode,$qualification,$institute,$passingYear,$contactNo,$companyName,$jobTitle,$workEmail,$officeAddress,$createTs,$createBy,$lastUpdatedBy,$lastUpdatedTs){
    $this->db->query('INSERT INTO reviewer_details(reviewer_id,reviewer_name,branch_id,login_id,password,d_o_b, '
                    .'gender,address,state,district,city,ward_no,pincode,qualification,institute,'
                    .'passing_year,contact_no,company_name,occupation,work_email,office_address,'
                    .'create_ts,create_by,last_updated_by,last_update_ts) '
                    .' VALUES (0,:reviewer_name,branch_id,:login_id,:password,:d_o_b,:gender,:address,:state,'
                    .':district,:city,:ward_no,:pincode,:qualification,:institute,:passing_year,'
                    .':contact_no,:company_name,:occupation,:work_email,:office_address,'
                    .':create_ts,:create_by,:last_updated_by,:last_update_ts) ');
    $this->db->bind(':reviewer_name',$reviewerName);
    $this->db->bind(':branch_id',$branch);
    $this->db->bind(':login_id',$loginId);
    $this->db->bind(':password',$password);
    $this->db->bind(':d_o_b',$dob);
    $this->db->bind(':gender',$gender);
    $this->db->bind(':address',$address);
    $this->db->bind(':state',$state);
    $this->db->bind(':district',$district);
    $this->db->bind(':city',$city);
    $this->db->bind(':ward_no',$ward);
    $this->db->bind(':pincode',$pincode);
    $this->db->bind(':qualification',$qualification);
    $this->db->bind(':contact_no',$contactNo);
    $this->db->bind(':institute',$institute);
    $this->db->bind(':passing_year',$passingYear);
    $this->db->bind(':company_name',$companyName);
    $this->db->bind(':occupation',$jobTitle);
    $this->db->bind(':work_email',$workEmail);
    $this->db->bind(':office_address',$officeAddress);
    $this->db->bind(':create_ts',$createTs);
    $this->db->bind(':create_by',$createBy);
    $this->db->bind(':last_updated_by',$lastUpdatedBy);
    $this->db->bind(':last_update_ts',$lastUpdatedTs);

   
    if($this->db->execute()){
        $reviewerId = $this->db->insertId();
        // return  $id;
        return true;
    }
    else {
        return false;
    }
}
public function getComplainantDetailsByCaseId($caseId){
    $this->db->query(' SELECT c.id, c.case_id, c.name, c.d_o_b, c.guardian_name, c.gender, c.contact_no, '
                    .' c.occupation, c.educational_qualification, c.address_line_1, c.address_line_2, '
                    .' c.district, c.state, c.city, c.pincode, c.lok_sabha, c.vidhan_sabha, c.ward_no,  '
                    .' c.category_id,c.subcategory_id, c.description, c.status_id, c.case_priority, c.create_ts,  '
                    .'c.created_by, c.last_updated_ts, c.last_updated_by, cc.category_desc,cs.subcategory_desc,	 '
                    .' w.ward_id FROM complainant_details c,case_category cc,case_subcategory cs,ward_details w '
                    .'WHERE case_id=:case_id ');
    $this->db->bind(':case_id',$caseId);
    $row = $this->db->single();
    return $row;
}
    public function updateCaseDetailsByCaseId($caseId,$gname,$dob,$mobile,$gender,$occupation,$address1,$address2,$ward,$district,$pincode,$vidhamSabha,$lokSabha,$qualification,$city,$category,$subcategory,$desc,$priority,$status,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy){
        $this->db->query('UPDATE complainant_details SET d_o_b=:dob,guardian_name=:gname,gender=:gender, '
                        .'contact_no=:mobile,occupation=:occupation,educational_qualification=:qualification, '
                        .'address_line_1=:address1,address_line_2=:address2,district=:district,city=:city, '
                        .'pincode=:pincode,lok_sabha=:lokSabha,vidhan_sabha=:vidhamSabha,ward_no=:ward, '
                        .'category_id=:category,subcategory_id=:subcategory,description=:desc,status_id=:status, '
                        .'case_priority=:priority,create_ts=:createdTs,created_by=:createdBy, '
                        .'last_updated_ts=:lastUpdatedTs,last_updated_by=:lastUpdatedBy '
                        .'WHERE case_id=:case_id');
        $this->db->bind(':case_id', $caseId);
        $this->db->bind(':dob', $dob);
        $this->db->bind(':gname', $gname);
        $this->db->bind(':gender', $gender);
        $this->db->bind(':mobile', $mobile);
        $this->db->bind(':occupation', $occupation);
        $this->db->bind(':qualification', $qualification);
        $this->db->bind(':address1', $address1);
        $this->db->bind(':address2', $address2);
        $this->db->bind(':district', $district);
        $this->db->bind(':city', $city);
        $this->db->bind(':pincode', $pincode);
        $this->db->bind(':lokSabha', $lokSabha);
        $this->db->bind(':vidhamSabha', $vidhamSabha);
        $this->db->bind(':ward', $ward);
        $this->db->bind(':category', $category);
        $this->db->bind(':subcategory', $subcategory);
        $this->db->bind(':desc', $desc);
        $this->db->bind(':status', $status);
        $this->db->bind(':priority', $priority);
        $this->db->bind(':lastUpdatedTs', $lastUpdatedTs);
        $this->db->bind(':createdTs', $createdTs);
        $this->db->bind(':createdBy', $createdBy);
        $this->db->bind(':lastUpdatedBy', $lastUpdatedBy);
        if($this->db->execute()){
            $result = $this->db->insertId();
            return $result;
        }
        else {
            return false;
        }
    }
    public function getDeskAgentDetailsById($agentId){
        $this->db->query(' SELECT desk_agent_id, agent_name, login_id, password, contact_no, d_o_b, '
                        .' gender, address, state, district, city, ward_no, pincode, qualification,  '
                        .' institute, passing_year, occupation, company_name, work_email, office_address, '
                        .' create_ts, create_by, last_update_ts, last_updated_by  '
                        .' FROM desk_agent_details  '
                        .' WHERE desk_agent_id=:desk_agent_id ');
        $this->db->bind(':desk_agent_id', $agentId);
        $row = $this->db->single();
        return $row;
    }
    public function getFieldAgentDetailsById($agentId){
        $this->db->query(' SELECT field_agent_id, agent_name, contact_no, d_o_b, '
                        .' gender, address, state, district, city, ward_no, pincode, qualification,  '
                        .' institute, passing_year, occupation, company_name, work_email, office_address, '
                        .' create_ts, create_by, last_update_ts, last_updated_by  '
                        .' FROM field_agent_details  '
                        .' WHERE field_agent_id=:field_agent_id ');
        $this->db->bind(':field_agent_id', $agentId);
        $row = $this->db->single();
        return $row;
    }
    public function getReviewerDetailsById($reviewerId){
        $this->db->query(' SELECT reviewer_id, reviewer_name, login_id, password, contact_no, d_o_b, '
                        .' gender, address, state, district, city, ward_no, pincode, qualification, institute, ' 
                        .' passing_year, occupation, company_name, work_email, office_address, create_ts,  '
                        .' create_by, last_update_ts, last_updated_by '
                        .' FROM reviewer_details  '
                        .' WHERE reviewer_id=:reviewer_id ');
        $this->db->bind(':reviewer_id', $reviewerId);
        $row = $this->db->single();
        return $row;
    }
    public function updateDeskAgentDetailsById($agentId,$password,$dob,$gender,$address,$state,$city,$district,$ward,$pincode,$qualification,$institute,$passingYear,$contactNo,$companyName,$jobTitle,$workEmail,$officeAddress,$createTs,$createBy,$lastUpdatedBy,$lastUpdatedTs){
        $this->db->query(' UPDATE desk_agent_details SET password=:password,contact_no=:contact_no, '
                        .' d_o_b=:d_o_b,gender=:gender,address=:address,state=:state,district=:district, '
                        .' city=:city,ward_no=:ward_no,pincode=:pincode, '
                        .' qualification=:qualification,institute=:institute, '
                        .' passing_year=:passing_year, occupation=:occupation, '
                        .' company_name=:company_name,work_email=:work_email, '
                        .' office_address=:office_address,create_ts=:create_ts,create_by=:create_by, '
                        .' last_update_ts=:last_update_ts,last_updated_by=:last_updated_by ' 
                        .' WHERE desk_agent_id=:desk_agent_id ');
        $this->db->bind(':desk_agent_id',$agentId);
        $this->db->bind(':password',$password);
        $this->db->bind(':d_o_b',$dob);
        $this->db->bind(':gender',$gender);
        $this->db->bind(':address',$address);
        $this->db->bind(':state',$state);
        $this->db->bind(':district',$district);
        $this->db->bind(':city',$city);
        $this->db->bind(':ward_no',$ward);
        $this->db->bind(':pincode',$pincode);
        $this->db->bind(':qualification',$qualification);
        $this->db->bind(':contact_no',$contactNo);
        $this->db->bind(':institute',$institute);
        $this->db->bind(':passing_year',$passingYear);
        $this->db->bind(':company_name',$companyName);
        $this->db->bind(':occupation',$jobTitle);
        $this->db->bind(':work_email',$workEmail);
        $this->db->bind(':office_address',$officeAddress);
        $this->db->bind(':create_ts',$createTs);
        $this->db->bind(':create_by',$createBy);
        $this->db->bind(':last_updated_by',$lastUpdatedBy);
        $this->db->bind(':last_update_ts',$lastUpdatedTs);

       if($this->db->execute()){
            // $agentId = $this->db->insertId();
            return true;
        }
        else {
            return false;
        }
    }  
    public function updateFieldAgentDetailsById($agentId,$password,$dob,$gender,$address,$state,$city,$district,$ward,$pincode,$qualification,$institute,$passingYear,$contactNo,$companyName,$jobTitle,$workEmail,$officeAddress,$createTs,$createBy,$lastUpdatedBy,$lastUpdatedTs){
        $this->db->query(' UPDATE field_agent_details SET contact_no=:contact_no,password=:password, '
                        .' d_o_b=:d_o_b,gender=:gender,address=:address,state=:state,district=:district, '
                        .' city=:city,ward_no=:ward_no,pincode=:pincode, '
                        .' qualification=:qualification,institute=:institute, '
                        .' passing_year=:passing_year, occupation=:occupation, '
                        .' company_name=:company_name,work_email=:work_email, '
                        .' office_address=:office_address,create_ts=:create_ts,create_by=:create_by, '
                        .' last_update_ts=:last_update_ts,last_updated_by=:last_updated_by ' 
                        .' WHERE field_agent_id=:field_agent_id ');
        $this->db->bind(':field_agent_id',$agentId);
        $this->db->bind(':password',$password);
        $this->db->bind(':d_o_b',$dob);
        $this->db->bind(':gender',$gender);
        $this->db->bind(':address',$address);
        $this->db->bind(':state',$state);
        $this->db->bind(':district',$district);
        $this->db->bind(':city',$city);
        $this->db->bind(':ward_no',$ward);
        $this->db->bind(':pincode',$pincode);
        $this->db->bind(':qualification',$qualification);
        $this->db->bind(':contact_no',$contactNo);
        $this->db->bind(':institute',$institute);
        $this->db->bind(':passing_year',$passingYear);
        $this->db->bind(':company_name',$companyName);
        $this->db->bind(':occupation',$jobTitle);
        $this->db->bind(':work_email',$workEmail);
        $this->db->bind(':office_address',$officeAddress);
        $this->db->bind(':create_ts',$createTs);
        $this->db->bind(':create_by',$createBy);
        $this->db->bind(':last_updated_by',$lastUpdatedBy);
        $this->db->bind(':last_update_ts',$lastUpdatedTs);

       if($this->db->execute()){
            // $agentId = $this->db->insertId();
            return true;
        }
        else {
            return false;
        }
    }  
    public function updateReviewerDetailsById($reviewerId,$password,$dob,$gender,$address,$state,$city,$district,$ward,$pincode,$qualification,$institute,$passingYear,$contactNo,$companyName,$jobTitle,$workEmail,$officeAddress,$createTs,$createBy,$lastUpdatedBy,$lastUpdatedTs){
        $this->db->query(' UPDATE reviewer_details SET password=:password,contact_no=:contact_no, '
                        .' d_o_b=:d_o_b,gender=:gender,address=:address,state=:state,district=:district, '
                        .' city=:city,ward_no=:ward_no,pincode=:pincode, '
                        .' qualification=:qualification,institute=:institute, '
                        .' passing_year=:passing_year, occupation=:occupation, '
                        .' company_name=:company_name,work_email=:work_email, '
                        .' office_address=:office_address,create_ts=:create_ts,create_by=:create_by, '
                        .' last_update_ts=:last_update_ts,last_updated_by=:last_updated_by ' 
                        .' WHERE reviewer_id=:reviewer_id ');
        $this->db->bind(':reviewer_id',$reviewerId);
        $this->db->bind(':password',$password);
        $this->db->bind(':d_o_b',$dob);
        $this->db->bind(':gender',$gender);
        $this->db->bind(':address',$address);
        $this->db->bind(':state',$state);
        $this->db->bind(':district',$district);
        $this->db->bind(':city',$city);
        $this->db->bind(':ward_no',$ward);
        $this->db->bind(':pincode',$pincode);
        $this->db->bind(':qualification',$qualification);
        $this->db->bind(':contact_no',$contactNo);
        $this->db->bind(':institute',$institute);
        $this->db->bind(':passing_year',$passingYear);
        $this->db->bind(':company_name',$companyName);
        $this->db->bind(':occupation',$jobTitle);
        $this->db->bind(':work_email',$workEmail);
        $this->db->bind(':office_address',$officeAddress);
        $this->db->bind(':create_ts',$createTs);
        $this->db->bind(':create_by',$createBy);
        $this->db->bind(':last_updated_by',$lastUpdatedBy);
        $this->db->bind(':last_update_ts',$lastUpdatedTs);

       if($this->db->execute()){
            $reviewerId = $this->db->insertId();
            return true;
        }
        else {
            return false;
        }
    }      
    public function getServiceDetails(){
        $this->db->query(' SELECT id, service_id, name, guardians_name, dob, mobile, gender, occupation, qualification, address1, address2, ward, district, state, pincode, vidhamSabha, lokSabha, city, services, status, createdTs, createdBy, lastUpdatedTs, lastUpdatedBy FROM customer_service WHERE 1=1 ');
        $row = $this->db->resultSet();
        return $row;
    }
    public function getCountOfNewService($data){
        $this->db->query(' SELECT id,service_id,name,branch_id,services,ward,dob,guardians_name,gender,mobile,occupation,status FROM customer_service WHERE status= "New" AND branch_id = :data '); 
        $this->db->bind(':data', $data);
        $row = $this->db->resultSet();
        return $row;
    }

    public function getCountOfPendingService($data){
        $this->db->query(' SELECT id,service_id,name,branch_id,services,ward,dob,guardians_name,gender,mobile,occupation,status FROM customer_service WHERE status= "Pending" AND branch_id = :data '); 
        $this->db->bind(':data', $data);
        $row = $this->db->resultSet();
        return $row;
    }

    public function getCountOfCompletedService($data){
        $this->db->query(' SELECT id,service_id,name,branch_id,services,ward,dob,guardians_name,gender,mobile,occupation,status FROM customer_service WHERE status= "Completed" AND branch_id = :data');
        $this->db->bind(':data', $data); 
        $row = $this->db->resultSet();
        return $row;
    }
    public function getCountOfTotalService($data){
        $this->db->query(' SELECT id,service_id,name,branch_id,services,ward,dob,guardians_name,gender,mobile,occupation,status FROM customer_service WHERE branch_id = :data');
        $this->db->bind(':data', $data); 
        $row = $this->db->resultSet();
        return $row;
    }
    public function insertbranchDetails($branchDesc,$lokSabha,$vidhanSabha,$wardNo,$wardOrPanchayat,$panchayat,$createTs){
        $this->db->query('INSERT INTO branch(branch_id,branch_desc,loksabha,vidhansabha, '
                        .' ward_no,ward_or_panchayat,panchayat,create_ts) '
                        .' VALUES (0,:branch_desc,:loksabha,:vidhansabha,:ward_no, '
                        .' :ward_or_panchayat,:panchayat,:create_ts) ');
        $this->db->bind(':branch_desc',$branchDesc);
        $this->db->bind(':loksabha',$lokSabha);
        $this->db->bind(':vidhansabha',$vidhanSabha);
        $this->db->bind(':ward_no',$wardNo);
        $this->db->bind(':ward_or_panchayat',$wardOrPanchayat);
        $this->db->bind(':panchayat',$panchayat);
        $this->db->bind(':create_ts',$createTs);
       
        if($this->db->execute()){
            $branchId = $this->db->insertId();
            // return  $id;
            return true;
        }
        else {
            return false;
        }
    }
    public function getblockDetails(){
        $this->db->query(' SELECT branch_id, branch_desc, ward_or_panchayat, ward_no, panchayat, '
                        .' vidhansabha, loksabha, create_ts FROM branch WHERE 1=1 ');
        $row = $this->db->resultSet();
        return $row;
    }
    public function getBranchAccess($agentId){
        $this->db->query(' SELECT id, field_agent_id, branch_id, branch_desc '
                        .' FROM field_agent_branch_assign '
                        .' WHERE field_agent_id=:field_agent_id ');
        $this->db->bind(':field_agent_id', $agentId);
        $row = $this->db->resultSet();
        return $row;
    }
    public function getBranchAccessByReviewer($reviwerId){
        $this->db->query(' SELECT id, reviewer_id, branch_id '
                        .' FROM reviewer_branch_assign '
                        .' WHERE reviewer_id=:reviewer_id ');
        $this->db->bind(':reviewer_id', $reviwerId);
        $row = $this->db->resultSet();
        return $row;
    }
    public function deleteAgent($agentId,$branch){
        $this->db->query(' DELETE FROM field_agent_branch_assign WHERE field_agent_id=:field_agent_id and branch_id=:branch_id ');
        $this->db->bind(':field_agent_id', $agentId);
        $this->db->bind(':branch_id', $branch);
        $row = $this->db->single();
        return $row; 
    }
    public function insertBranch($agentId,$branch){
        $this->db->query('INSERT INTO field_agent_branch_assign(id,field_agent_id,branch_id) '
                        .' VALUES (0,:field_agent_id,:branch_id) ');
        $this->db->bind(':field_agent_id',$agentId);
        $this->db->bind(':branch_id',$branch);
       
        if($this->db->execute()){           
            return true;
        }
        else {
            return false;
        }
    }
    public function deleteReviewer($agentId,$branch){
        $this->db->query(' DELETE FROM reviewer_branch_assign WHERE reviewer_id=:reviewer_id and branch_id=:branch_id ');
        $this->db->bind(':reviewer_id', $agentId);
        $this->db->bind(':branch_id', $branch);
        $row = $this->db->single();
        return $row; 
    }
    public function insertBranchByReviewer($reviwerId,$branch){
        $this->db->query('INSERT INTO reviewer_branch_assign(id,reviewer_id,branch_id) '
                        .' VALUES (0,:reviewer_id,:branch_id) ');
        $this->db->bind(':reviewer_id',$reviwerId);
        $this->db->bind(':branch_id',$branch);
       
        if($this->db->execute()){           
            return true;
        }
        else {
            return false;
        }
    }
}
