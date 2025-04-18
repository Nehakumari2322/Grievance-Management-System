<?php 

class Reviewer{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    public function login_verification($data){
        // return true;
        $this->db->query('SELECT * FROM login_details where login_id = :userid AND password = :password AND role= :role AND branch_id = :branch ' );
        $this->db->bind(':userid', $data['userid']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':role', $data['role']);
        $this->db->bind(':branch', $data['branchId']);
        if($row = $this->db->single()){
            return true;
        }
        else{
            return false;
        }
               
    }

    public function insertCaseDetail($caseId,$name,$gname,$dob,$mobile,$gender,$occupation,$address1,$address2,$ward,$district,$state,$pincode,$vidhamSabha,$lokSabha,$qualification,$city,$category,$subcategory,$desc,$priority,$status,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy,$image,$image2,$image3,$branch_id){
        // echo "caseId".$caseId;
        $this->db->query(' INSERT INTO complainant_details(id, case_id,branch_id, name, d_o_b, guardian_name, gender, contact_no, occupation, educational_qualification, address_line_1, address_line_2, district, state, city, pincode, lok_sabha, vidhan_sabha, ward_no, category_id, subcategory_id, description, status_id, case_priority,document1, document2, document3,  create_ts, created_by, last_updated_ts, last_updated_by) VALUES (0,:caseId,:branch,:name,:dob,:gname,:gender,:mobile,:occupation,:qualification,:address1,:address2,:district,:state,:city,:pincode,:lokSabha,:vidhamSabha,:ward,:category,:subcategory,:desc,:status,:priority,:image,:image2,:image3,:createdTs,:createdBy,:lastUpdatedTs,:lastUpdatedBy)');
        $this->db->bind(':caseId', $caseId);
        $this->db->bind(':branch', $branch_id);
        $this->db->bind(':name', $name);
        $this->db->bind(':dob', $dob);
        $this->db->bind(':gname', $gname);
        $this->db->bind(':gender', $gender);
        $this->db->bind(':mobile', $mobile);
        $this->db->bind(':occupation', $occupation);
        $this->db->bind(':qualification', $qualification);
        $this->db->bind(':address1', $address1);
        $this->db->bind(':address2', $address2);
        $this->db->bind(':district', $district);
        $this->db->bind(':state', $state);
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
        $this->db->bind(':image', $image);
        $this->db->bind(':image2', $image2);
        $this->db->bind(':image3', $image3);
        $this->db->bind(':lastUpdatedTs', $lastUpdatedTs);
        $this->db->bind(':createdTs', $createdTs);
        $this->db->bind(':createdBy', $createdBy);
        $this->db->bind(':lastUpdatedBy', $lastUpdatedBy);
        if($this->db->execute()){
            $id = $this->db->insertId();
            return $id;
        }
        else {
            return false;
        }
    }


    public function insertServiceDetail($serviceId,$name,$gname,$dob,$mobile,$gender,$occupation,$address1,$address2,$ward,$branch_id,$district,$state,$pincode,$vidhamSabha,$lokSabha,$qualification,$city,$status,$createdTs,$createdBy,$lastUpdatedTs,$services,$lastUpdatedBy){
        $this->db->query('INSERT INTO customer_service(id, service_id, name, guardians_name, dob, mobile, gender, occupation, qualification, address1, address2, ward,branch_id, district, state, pincode, vidhamSabha,lokSabha, city, services, status, createdTs, createdBy, lastUpdatedTs, lastUpdatedBy)  VALUES (0,:serviceId,:name,:gname,:dob,:mobile,:gender,:occupation,:qualification,:address1,:address2,:ward,::branch,:district,:state,:pincode,:vidhamSabha,:lokSabha,:city,:services,:status,:createdTs,:createdBy,:lastUpdatedTs,:lastUpdatedBy)');
        $this->db->bind(':serviceId', $serviceId);
        $this->db->bind(':name', $name);
        $this->db->bind(':dob', $dob);
        $this->db->bind(':gname', $gname);
        $this->db->bind(':gender', $gender);
        $this->db->bind(':mobile', $mobile);
        $this->db->bind(':occupation', $occupation);
        $this->db->bind(':qualification', $qualification);
        $this->db->bind(':address1', $address1);
        $this->db->bind(':address2', $address2);
        $this->db->bind(':district', $district);
        $this->db->bind(':state', $state);
        $this->db->bind(':city', $city);
        $this->db->bind(':pincode', $pincode);
        $this->db->bind(':lokSabha', $lokSabha);
        $this->db->bind(':vidhamSabha', $vidhamSabha);
        $this->db->bind(':ward', $ward);
        $this->db->bind(':branch', $branch_id);
        $this->db->bind(':status', $status);
        $this->db->bind(':services', $services);
        $this->db->bind(':lastUpdatedTs', $lastUpdatedTs);
        $this->db->bind(':createdTs', $createdTs);
        $this->db->bind(':createdBy', $createdBy);
        $this->db->bind(':lastUpdatedBy', $lastUpdatedBy);
        if($this->db->execute()){
            $id = $this->db->insertId();
            return $id;
        }
        else {
            return false;
        }
    }

    public function getNewSubCategoryCase($subcategoryId){
        $this->db->query(' SELECT * FROM complainant_details WHERE status_id = "new" AND subcategory_id = :subcategoryId ');
        $this->db->bind(':subcategoryId', $subcategoryId);
        $row = $this->db->resultSet();
        return $row;
    }

    public function getPendingSubCategoryCase($subcategoryId){
        $this->db->query(' SELECT * FROM complainant_details WHERE status_id = "pending" AND subcategory_id = :subcategoryId ');
        $this->db->bind(':subcategoryId', $subcategoryId);
        $row = $this->db->resultSet();
        return $row;
    }

    public function getCompletedSubCategoryCase($subcategoryId){
        $this->db->query(' SELECT * FROM complainant_details WHERE status_id = "completed" AND subcategory_id = :subcategoryId ');
        $this->db->bind(':subcategoryId', $subcategoryId);
        $row = $this->db->resultSet();
        return $row;
    }

    public function gettoalSubCategoryCase($subcategoryId){
        $this->db->query(' SELECT * FROM complainant_details WHERE  subcategory_id = :subcategoryId ');
        $this->db->bind(':subcategoryId', $subcategoryId);
        $row = $this->db->resultSet();
        return $row;
    }

    public function getAllCategory(){
        $this->db->query(' SELECT * FROM case_category WHERE 1 = 1 ');
        $row = $this->db->resultSet();
        return $row;
    }

    public function getAllSubCategory(){
        $this->db->query('SELECT subcategory_id,subcategory_desc FROM case_subcategory WHERE 1 = 1');
        $row = $this->db->resultSet();
        return $row;
    }

    public function getAllWard(){
        $this->db->query(' SELECT * FROM ward_details WHERE 1=1 ');
        $row = $this->db->resultSet();
        return $row;
    }

   public function getAllCasesDetails($Id){
        $this->db->query(' SELECT * FROM complainant_details WHERE case_id = :id ');
        $this->db->bind(':id', $Id);
        $row = $this->db->single();
        return $row;
   }

   public function getSubcategoryname($subcategoryId){
    $this->db->query(' SELECT subcategory_desc FROM case_subcategory WHERE subcategory_id = :subcategoryId ');
    $this->db->bind(':subcategoryId', $subcategoryId);
    $row = $this->db->single();
    return $row;
   }

    public function getNewHigherPriority(){
        $this->db->query(' SELECT c.case_id,c.description,c.status_id,cs.subcategory_desc,cc.category_desc,c.case_priority FROM complainant_details c,case_category cc,case_subcategory cs WHERE  status_id = "new" AND cc.category_id = c.category_id AND cs.subcategory_id = c.subcategory_id AND case_priority ="higher" ;');
        $row = $this->db->resultSet();
        return $row;
    }

    public function getNewMediumPriority(){
        $this->db->query(' SELECT c.case_id,c.description,c.status_id,cs.subcategory_desc,cc.category_desc,c.case_priority FROM complainant_details c,case_category cc,case_subcategory cs WHERE  status_id = "new" AND cc.category_id = c.category_id AND cs.subcategory_id = c.subcategory_id AND case_priority ="medium" ;');
        $row = $this->db->resultSet();
        return $row;
    }

    public function getNewLowPriority(){
        $this->db->query(' SELECT c.case_id,c.description,c.status_id,cs.subcategory_desc,cc.category_desc,c.case_priority FROM complainant_details c,case_category cc,case_subcategory cs WHERE  status_id = "new" AND cc.category_id = c.category_id AND cs.subcategory_id = c.subcategory_id AND case_priority ="low" ;');
        $row = $this->db->resultSet();
        return $row;
    }

    public function getPendingHigherPriority(){
        $this->db->query(' SELECT c.case_id,c.description,c.status_id,cs.subcategory_desc,cc.category_desc,c.case_priority FROM complainant_details c,case_category cc,case_subcategory cs WHERE  status_id = "pending" AND cc.category_id = c.category_id AND cs.subcategory_id = c.subcategory_id AND case_priority ="higher"');
        $row = $this->db->resultSet();
        return $row;
    }

    public function getPendingMediumPriority(){
        $this->db->query(' SELECT c.case_id,c.description,c.status_id,cs.subcategory_desc,cc.category_desc,c.case_priority FROM complainant_details c,case_category cc,case_subcategory cs WHERE  status_id = "pending" AND cc.category_id = c.category_id AND cs.subcategory_id = c.subcategory_id AND case_priority ="medium" ');
        $row = $this->db->resultSet();
        return $row;
    }

    public function getPendingLowPriority(){
        $this->db->query(' SELECT c.case_id,c.description,c.status_id,cs.subcategory_desc,cc.category_desc,c.case_priority FROM complainant_details c,case_category cc,case_subcategory cs WHERE  status_id = "pending" AND cc.category_id = c.category_id AND cs.subcategory_id = c.subcategory_id AND case_priority ="low" ');
        $row = $this->db->resultSet();
        return $row;
    }

    public function getCompletedHigherPriority(){
        $this->db->query('SELECT c.case_id,c.description,c.status_id,cs.subcategory_desc,cc.category_desc,c.case_priority FROM complainant_details c,case_category cc,case_subcategory cs WHERE  status_id = "completed" AND cc.category_id = c.category_id AND cs.subcategory_id = c.subcategory_id AND case_priority ="higher"');
        $row = $this->db->resultSet();
        return $row;
    }

    public function getCompletedMediumPriority(){
        $this->db->query('SELECT c.case_id,c.description,c.status_id,cs.subcategory_desc,cc.category_desc,c.case_priority FROM complainant_details c,case_category cc,case_subcategory cs WHERE  status_id = "completed" AND cc.category_id = c.category_id AND cs.subcategory_id = c.subcategory_id AND case_priority ="medium"');
        $row = $this->db->resultSet();
        return $row;
    }

    public function getCompletedLowPriority(){
        $this->db->query('SELECT c.case_id,c.description,c.status_id,cs.subcategory_desc,cc.category_desc,c.case_priority FROM complainant_details c,case_category cc,case_subcategory cs WHERE  status_id = "completed" AND cc.category_id = c.category_id AND cs.subcategory_id = c.subcategory_id AND case_priority ="low"');
        $row = $this->db->resultSet();
        return $row;
    }

    public function updateCaseStatus($Id,$status,$assignTo,$lastUpdatedTs,$lastUpdatedBy){
        $this->db->query(' UPDATE complainant_details SET status_id=:status,case_assigned_to=:assignTo,last_updated_ts=:lastUpdatedTs,last_updated_by=:lastUpdatedBy WHERE case_id = :Id');
        $this->db->bind(':lastUpdatedTs', $lastUpdatedTs);
        $this->db->bind(':Id', $Id);
        $this->db->bind(':assignTo', $assignTo);
        $this->db->bind(':status', $status);
        $this->db->bind(':lastUpdatedBy', $lastUpdatedBy);
        if($this->db->execute()){
            $id = $this->db->insertId();
            return $id;
        }
        else {
            return false;
        }
    }

    public function getAllBranch(){
        $this->db->query(' SELECT branch_id, branch_desc, ward_or_panchayat, ward_no, '
            .' panchayat, vidhansabha, loksabha, create_ts  '
            .'FROM branch WHERE 1=1 ');
        $row = $this->db->resultSet();
        return $row;
    }

        public function updateServiceStatus($Id,$status,$lastUpdatedTs,$lastUpdatedBy){
            $this->db->query(' UPDATE customer_service SET status=:status,lastUpdatedTs=:lastUpdatedTs,lastUpdatedBy=:lastUpdatedBy WHERE service_id = :Id ');
            $this->db->bind(':lastUpdatedTs', $lastUpdatedTs);
            $this->db->bind(':Id', $Id);
            $this->db->bind(':status', $status);
            $this->db->bind(':lastUpdatedBy', $lastUpdatedBy);
            if($this->db->execute()){
                $id = $this->db->insertId();
                return $id;
            }
            else {
                return false;
            } 
        }


    public function new(){
        $this->db->query('SELECT c.case_id,c.description,c.status_id,cs.subcategory_desc,cc.category_desc,c.ward_no,c.contact_no,c.branch_id FROM complainant_details c,case_category cc,case_subcategory cs WHERE  cc.category_id = c.category_id AND cs.subcategory_id = c.subcategory_id AND status_id = "new" ');
        $row = $this->db->resultSet();
        return $row;
    }

    public function getcaseid($id){
        $this->db->query(' SELECT  case_id FROM complainant_details WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function pending(){
        $this->db->query(' SELECT c.case_id,c.description,c.status_id,cs.subcategory_desc,cc.category_desc,c.ward_no,c.contact_no,c.branch_id  FROM complainant_details c,case_category cc,case_subcategory cs WHERE  cc.category_id = c.category_id AND cs.subcategory_id = c.subcategory_id AND status_id = "pending" ');
        $row = $this->db->resultSet();
        return $row;
    }

    public function completed(){
        $this->db->query('SELECT c.case_id,c.description,c.status_id,cs.subcategory_desc,cc.category_desc,c.ward_no,c.contact_no,c.branch_id  FROM complainant_details c,case_category cc,case_subcategory cs WHERE  cc.category_id = c.category_id AND cs.subcategory_id = c.subcategory_id AND status_id = "completed"');
        $row = $this->db->resultSet();
        return $row;
    }

    public function getNewService(){
        $this->db->query('SELECT c.service_id,c.name,c.status,c.services,c.createdTs,c.mobile,c.ward FROM customer_service c WHERE status= "new"');
        $row = $this->db->resultSet();
        return $row;  
    }

    public function getPendingService(){
        $this->db->query('SELECT c.service_id,c.name,c.status,c.services,c.createdTs,c.mobile,c.ward FROM customer_service c WHERE status= "pending"');
        $row = $this->db->resultSet();
        return $row;  
    }

    public function getCompletedService(){
        $this->db->query('SELECT c.service_id,c.name,c.status,c.services,c.createdTs,c.mobile,c.ward FROM customer_service c WHERE status= "completed"');
        $row = $this->db->resultSet();
        return $row;  
    }

    public function totalCases(){
        $this->db->query( 'SELECT c.case_id,c.description,c.status_id,cs.subcategory_desc,cc.category_desc FROM complainant_details c,case_category cc,case_subcategory cs WHERE  cc.category_id = c.category_id AND cs.subcategory_id = c.subcategory_id  ');
        $row = $this->db->resultSet();
        return $row;
    }

    public function getCountOfNewCase($data){
        $this->db->query(' SELECT id,case_id,name,d_o_b,guardian_name,gender,contact_no,occupation,status_id,case_priority,description,subcategory_desc FROM complainant_details cd , case_subcategory cs WHERE cd.subcategory_id = cs.subcategory_id AND status_id= "new" AND cs.subcategory_id = :data'); 
        $this->db->bind(':data', $data);
        $row = $this->db->resultSet();
        return $row;
    }

    public function getCountOfPendingCase($data){
        $this->db->query('SELECT id,case_id,name,d_o_b,guardian_name,gender,contact_no,occupation,status_id,case_priority,description,subcategory_desc FROM complainant_details cd , case_subcategory cs WHERE cd.subcategory_id = cs.subcategory_id AND status_id= "pending" AND cs.subcategory_id = :data'); 
        $this->db->bind(':data', $data);
        $row = $this->db->resultSet();
        return $row;
    }

    public function getCountOfCompletedCase($data){
        $this->db->query(' SELECT id,case_id,name,d_o_b,guardian_name,gender,contact_no,occupation,status_id,case_priority,description,subcategory_desc FROM complainant_details cd , case_subcategory cs WHERE cd.subcategory_id = cs.subcategory_id AND status_id= "completed" AND cs.subcategory_id =  :data');
        $this->db->bind(':data', $data); 
        $row = $this->db->resultSet();
        return $row;
    }

    public function getCountOfTotalCase($data){
        $this->db->query(' SELECT id,case_id,name,d_o_b,guardian_name,gender,contact_no,occupation,status_id,case_priority,description,subcategory_desc FROM complainant_details cd , case_subcategory cs WHERE cd.subcategory_id = cs.subcategory_id AND (status_id= "completed" OR status_id= "new" OR status_id= "pending") AND cs.subcategory_id = :data');
        $this->db->bind(':data', $data);
        $row = $this->db->resultSet();
        return $row;
    }

    public function getCaseDetailsByCaseId($caseId){
        $this->db->query('SELECT c.id, c.ward_no,c.case_id,c.name,c.contact_no, c.category_id, c.subcategory_id, '
        .' c.description, c.status_id, c.case_priority, c.create_ts, c.created_by, '
        .' c.last_updated_ts, c.last_updated_by,cc.category_desc,cs.subcategory_desc '
        .' FROM complainant_details c,case_category cc,case_subcategory cs '
        .' WHERE cc.category_id = c.category_id AND cs.subcategory_id = c.subcategory_id AND case_id=:caseid ');
        $this->db->bind(':caseid', $caseId);
        $row = $this->db->single();
        return $row;
    }

    public function getAllCaseByMobileNumber($mobile){
        $this->db->query(' SELECT c.id, c.ward_no,c.case_id,c.name,c.contact_no, c.category_id, c.subcategory_id, c.description, c.status_id, c.case_priority, c.create_ts, c.created_by, c.last_updated_ts, c.last_updated_by,cc.category_desc,cs.subcategory_desc  FROM complainant_details c,case_category cc,case_subcategory cs WHERE cc.category_id = c.category_id AND cs.subcategory_id = c.subcategory_id AND contact_no =  :mobile ');
        $this->db->bind(':mobile', $mobile);
        $row = $this->db->single();
        return $row;
    }

    public function getAllFieldAgent(){
        $this->db->query(' SELECT field_agent_id,agent_name,branch_id FROM field_agent_details WHERE 1 = 1 ');
        $row = $this->db->resultSet();
        return $row;
    }
     
   

    
}
?>

