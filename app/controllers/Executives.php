<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Software Development Wing <Penta Head Private Ltd.>
 */
use Dompdf\Dompdf;
class Executives extends Controller{

    public function __construct() {
       // echo 'executives construct';
        $this->executiveModel = $this->model('Executive');
    }

    public function logmein()
    {
        $this->view('executives/login');
    } 

    public function executivesLogin(){
       // echo 'i am in executivesLogin';
       $data = null;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($_POST['loginexecutive'])){
                $data = [
                    'userid' => trim($_POST['userid']),
                    'password' => trim($_POST['password']),
                    'role' => 'executive'
                ];
                $matched = $this->executiveModel->login_verification($data);

                if($matched == true ){
                    // $data=$this->executiveModel->getcaseDetails();
                    // $adata = $this->executiveModel->getwardDetails();
                    $adata = $this->executiveModel->getBranchDetails();
                    $mdata = $this->casePriorityHigh();
                    $ndata = $this->casePriorityMedium();
                    $rdata = $this->casePriorityLow();
                    $sdata = $this->caseTotalPriority();
                    $data=$this->executiveModel->getwardDetails();
                    $this->view('executives/executive_dash', $data);
                    // $this->view('executives/complaintlist',$data,$adata,$mdata,$ndata,$rdata,$sdata);
                }
                else{
                    $data = "password_mismatch";
                    $this->view('executives/login',$data);
                }
            }
        }
    }

    public function navform(){
        if (isset($_POST['dashboardbtn'])) {
            $data=$this->executiveModel->getwardDetails();
            $this->view('executives/executive_dash', $data);
        }
        else if (isset($_POST['adddeskagentbtn'])) {
            $data=$this->executiveModel->getblockDetails();
            $this->view('executives/deskagentdetails',$data);
        }
        else if (isset($_POST['addfieldagentbtn'])){
            $data=$this->executiveModel->getblockDetails();
            $this->view('executives/fieldagentdetails',$data);
        }
        else if (isset($_POST['addreviewerbtn'])) {
            $data=$this->executiveModel->getBranchDetails();
            $this->view('executives/reviewerdetails',$data);
        }
        else if (isset($_POST['deskagentlistbtn'])) {
            $data=$this->executiveModel->getdeskagentDetails();
            $this->view('executives/deskagentlist',$data);
        }
        else if (isset($_POST['fieldagentlistbtn'])) {
            $data=$this->executiveModel->getfieldagentDetails();
            $this->view('executives/fieldagentlist',$data);
        }
        else if (isset($_POST['agentlistbtn'])) {
            $data=$this->executiveModel->getfieldagentDetails();
            $this->view('executives/fieldagentlist',$data);
        }
        else if (isset($_POST['reviewerlistbtn'])) {
            $data=$this->executiveModel->getreviewerDetails();
            $this->view('executives/reviewerlist',$data);
        }
        else if (isset($_POST['complaintlistbtn'])) {
            $data=$this->executiveModel->getcaseDetails();
            // $adata = $this->executiveModel->getwardDetails();
            $adata = $this->executiveModel->getBranchDetails();
            $mdata = $this->casePriorityHigh();
            $ndata = $this->casePriorityMedium();
            $rdata = $this->casePriorityLow();
            $sdata = $this->caseTotalPriority();
            $this->view('executives/complaintlist',$data,$adata,$mdata,$ndata,$rdata,$sdata);
        }
        else if (isset($_POST['servicelistbtn'])) {
            $data=$this->executiveModel->getServiceDetails();
            // $adata = $this->executiveModel->getwardDetails();
            $adata = $this->executiveModel->getBranchDetails();
            $mdata = $this->serviceNewSummary();
            $ndata = $this->servicePendingSummary();
            $rdata = $this->serviceCompletedSummary();
            $sdata = $this->serviceTotalSummary();
            $this->view('executives/servicelist',$data,$adata,$mdata,$ndata,$rdata,$sdata);
        }
        else if (isset($_POST['branchbtn'])) {
            $this->view('executives/branchsearch');
        }
        else if (isset($_POST['addbranch'])) {
            $data=$this->executiveModel->getwardDetails();
            $this->view('executives/branch',$data);
        }
    }    
    public function casePriorityHigh(){
        $data = $this->executiveModel->getBranchDetails();
        $i=0;
        $mdata = array();
        foreach($data as $dataline){
            // $wardNo = $dataline->ward_no;
            $branch = $dataline->branch_id;
            $data1 = $this->executiveModel->getCountOfHighPriorityCase($branch);
            $mdata[] = count($data1);  
        }
        return $mdata;    
    }

    public function casePriorityMedium(){
        $data = $this->executiveModel->getBranchDetails();
        $i=0;
        $ndata = array();
        foreach($data as $dataline){
            // $wardNo = $dataline->ward_no;
            $branch = $dataline->branch_id;
            $data2 = $this->executiveModel->getCountOfMediumPriorityCase($branch);
            $ndata[] = count($data2);   
        }
        return $ndata; 
    }

    public function casePriorityLow(){
        $data = $this->executiveModel->getBranchDetails();
        $i=0;
        $rdata = array();
        foreach($data as $dataline){
            // $wardNo = $dataline->ward_no;
            $branch = $dataline->branch_id;
            $data2 = $this->executiveModel->getCountOfLowPriorityCase($branch);
            $rdata[] = count($data2);   
        }
        return $rdata; 
    }
    public function caseTotalPriority(){
        $data = $this->executiveModel->getBranchDetails();
        $i=0;
        $sdata = array();
        foreach($data as $dataline){
            // $wardNo = $dataline->ward_no;
            $branch = $dataline->branch_id;
            $data2 = $this->executiveModel->getTotalCase($branch);
            $sdata[] = count($data2);   
        }
        return $sdata; 
    }
    public function serviceNewSummary(){
        $data = $this->executiveModel->getBranchDetails();
        $i=0;
        $mdata = array();
        foreach($data as $dataline){
            $branch = $dataline->branch_id;
            $data1 = $this->executiveModel->getCountOfNewService($branch);
            $mdata[] = count($data1);  
        }
        return $mdata;    
    }

    public function servicePendingSummary(){
        $data = $this->executiveModel->getBranchDetails();
        $i=0;
        $ndata = array();
        foreach($data as $dataline){
            $branch = $dataline->branch_id;
            $data2 = $this->executiveModel->getCountOfPendingService($branch);
            $ndata[] = count($data2);   
        }
        return $ndata; 
    }


    public function serviceCompletedSummary(){
        $data = $this->executiveModel->getBranchDetails();
        $i=0;
        $rdata = array();
        foreach($data as $dataline){
            $branch = $dataline->branch_id;
            $data2 = $this->executiveModel->getCountOfCompletedService($branch);
            $rdata[] = count($data2);   
        }
        return $rdata; 
    }

    public function serviceTotalSummary(){
        $data = $this->executiveModel->getBranchDetails();
        $i=0;
        $sdata = array();
        foreach($data as $dataline){
            $branch = $dataline->branch_id;
            $data2 = $this->executiveModel->getCountOfTotalService($branch);
            $sdata[] = count($data2);   
        }
        return $sdata; 
    }

    public function deskagentdetails(){
        if (isset($_POST['submitdeskagentDetails'])){
            $agent_name=trim($_POST['agent_name']);
            $loginId='AG'.mt_rand(10000,99999).mt_rand(10,99);
            $password=trim($_POST['password']);
            $branch=trim($_POST['branch_id']);
            $dob=trim($_POST['d_o_b']);
            $gender=trim($_POST['gender']);
            $address=trim($_POST['address']);
            $state=trim($_POST['state']);
            $city=trim($_POST['city']);
            $district=trim($_POST['district']);
            $ward=trim($_POST['ward_no']);
            $pincode=trim($_POST['pincode']);
            $qualification=trim($_POST['qualification']);
            $institute=trim($_POST['institute']);
            $passingYear=trim($_POST['passing_year']);
            $contactNo=trim($_POST['contact_no']);
            $companyName=trim($_POST['company_name']);
            $jobTitle=trim($_POST['occupation']);
            $workEmail=trim($_POST['work_email']);
            $officeAddress=trim($_POST['office_address']);
            $createTs=$this->getCurrentTs();
            $lastUpdatedBy='executive';
            $lastUpdatedTs=$this->getCurrentTs();
            $createBy='executive';
            $agentId=$this->executiveModel->insertdeskagentDetails($agent_name,$loginId,$password,$branch,$dob,$gender,$address,$state,$city,$district,$ward,$pincode,$qualification,$institute,$passingYear,$contactNo,$companyName,$jobTitle,$workEmail,$officeAddress,$createTs,$createBy,$lastUpdatedBy,$lastUpdatedTs);
         
            if($agentId){
                $message = 'AgentCreated';
            }
            else{
                $message = 'FailToCreateAgent';
            }
                $data['message'] = $message;
        }
        $this->view('executives/deskagentdetails',$data); 
    }
    public function fieldagentdetails(){
        if (isset($_POST['submitfieldagentDetails'])){
            $agent_name=trim($_POST['agent_name']);
            $branch=trim($_POST['branch_id']);
            $password=trim($_POST['password']);
            $dob=trim($_POST['d_o_b']);
            $gender=trim($_POST['gender']);
            $address=trim($_POST['address']);
            $state=trim($_POST['state']);
            $city=trim($_POST['city']);
            $district=trim($_POST['district']);
            $ward=trim($_POST['ward_no']);
            $pincode=trim($_POST['pincode']);
            $qualification=trim($_POST['qualification']);
            $institute=trim($_POST['institute']);
            $passingYear=trim($_POST['passing_year']);
            $contactNo=trim($_POST['contact_no']);
            $companyName=trim($_POST['company_name']);
            $jobTitle=trim($_POST['occupation']);
            $workEmail=trim($_POST['work_email']);
            $officeAddress=trim($_POST['office_address']);
            $createTs=$this->getCurrentTs();
            $lastUpdatedBy='executive';
            $lastUpdatedTs=$this->getCurrentTs();
            $createBy='executive';
            $agentId=$this->executiveModel->insertfieldagentDetails($agent_name,$branch,$password,$dob,$gender,$address,$state,$city,$district,$ward,$pincode,$qualification,$institute,$passingYear,$contactNo,$companyName,$jobTitle,$workEmail,$officeAddress,$createTs,$createBy,$lastUpdatedBy,$lastUpdatedTs);
            
            if($agentId){
                foreach($branch as $category){
                echo "im in for category with value ".$category;
                $result = $this->executiveModel->assignBranchToFieldAgent($agentId,$category);
                }
                    
            }
                
            if($agentId){
                $message = 'AgentCreated';
            }
            else{
                $message = 'FailToCreateAgent';
            }
                $data['message'] = $message;
        }
        $this->view('executives/fieldagentdetails',$data); 
    }
    public function reviewerDetails(){
        if (isset($_POST['submitreviewerdetails'])){
            $reviewerName=trim($_POST['reviewer_name']);
            $loginId='RE'.mt_rand(10000,99999).mt_rand(10,99);
            $branch=trim($_POST['branch_id']);
            $password=trim($_POST['password']);
            $dob=trim($_POST['d_o_b']);
            $gender=trim($_POST['gender']);
            $address=trim($_POST['address']);
            $state=trim($_POST['state']);
            $city=trim($_POST['city']);
            $district=trim($_POST['district']);
            $ward=trim($_POST['ward_no']);
            $pincode=trim($_POST['pincode']);
            $qualification=trim($_POST['qualification']);
            $institute=trim($_POST['institute']);
            $passingYear=trim($_POST['passing_year']);
            $contactNo=trim($_POST['contact_no']);
            $companyName=trim($_POST['company_name']);
            $jobTitle=trim($_POST['occupation']);
            $workEmail=trim($_POST['work_email']);
            $officeAddress=trim($_POST['office_address']);
            $createTs=$this->getCurrentTs();
            $lastUpdatedBy='executive';
            $lastUpdatedTs=$this->getCurrentTs();
            $createBy='executive';
            
            $reviewerId=$this->executiveModel->insertreviewerDetails($reviewerName,$branch,$loginId,$password,$dob,$gender,$address,$state,$city,$district,$ward,$pincode,$qualification,$institute,$passingYear,$contactNo,$companyName,$jobTitle,$workEmail,$officeAddress,$createTs,$createBy,$lastUpdatedBy,$lastUpdatedTs); 

            if($reviewerId){
                $message = 'ReviewerCreated';
            }
            else{
                $message = 'FailToCreateReviewer';
            }
                $data['message'] = $message;
        }
        $this->view('executives/reviewerdetails',$data); 
    }
    
    public function searchwardDetails(){
        if(isset($_POST['showDetailsbtn'])){
        $branch=trim($_POST['branch_id']);
        $data = $this->executiveModel->getcaseDetailsByBranchId($branch);
        $this->view('executives/branchsearch',$data);
      }
   }
   public function editCaseDetails(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $totalcount = trim($_POST['totalcount']);
            for ($count=0; $count<$totalcount; $count++) {
                if(isset($_POST['editcasedetailsbtn'.$count])){
                    $caseId=trim($_POST['case_id'.$count]);
                    // echo "caseId".$caseId;
                    $data=$this->executiveModel->getComplainantDetailsByCaseId($caseId);
                    $aData =$this->executiveModel->getwardDetails();
                    $this->view('executives/editcasedetails',$data,$aData);
                }
            }
        }
    }
    public function updateCaseDetails(){
        if(isset($_POST['updatecasedetailsbtn'])){
                $caseId= trim($_POST['case_id']);
                $gname = trim($_POST['gname']);
                $dob = trim($_POST['dob']);
                $mobile = trim($_POST['mobile']);
                $gender = trim($_POST['gender']);
                $occupation = trim($_POST['occupation']);
                $qualification = trim($_POST['qualification']);
                $address1 = trim($_POST['address1']);
                $address2 = trim($_POST['address2']);
                $ward = trim($_POST['ward']);
                $district = trim($_POST['district']);
                $pincode = trim($_POST['pincode']);
                $vidhamSabha = trim($_POST['vidhamSabha']);
                $lokSabha = trim($_POST['lokSabha']);
                $city = trim($_POST['city']);
                $ndata['message'] = null;
                $category = trim($_POST['category']);
                $subcategory = trim($_POST['subcategory']);
                $desc = trim($_POST['desc']);
                $priority = trim($_POST['priority']);
                $status = 'new';
                $createdTs = $this->getCurrentTs();
                $createdBy = 'executive';
                $lastUpdatedTs = $this->getCurrentTs();
                $lastUpdatedBy  = 'executive';
                $result = $this->executiveModel->updateCaseDetailsByCaseId($caseId,$gname,$dob,$mobile,$gender,$occupation,$address1,$address2,$ward,$district,$pincode,$vidhamSabha,$lokSabha,$qualification,$city,$category,$subcategory,$desc,$priority,$status,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy);
                if($result != null){
                    $data['message'] = 'Case Updated Successfully !!' ;
                }
                else{
                    $data['message'] = 'Fail to Update Case !!' ;
                }
                
                $this->view('executives/branchsearch',$data);
        }
    }
    public function editDeskAgentDetails(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $totalcount = trim($_POST['totalcount']);
            for ($count=0; $count<$totalcount; $count++) {
                if(isset($_POST['editdeskagentdetailsbtn'.$count])){
                    $agentId=trim($_POST['desk_agent_id'.$count]);
                    $data=$this->executiveModel->getDeskAgentDetailsById($agentId);
                    $this->view('executives/editdeskagentdetails',$data);
                }
            }
        }
    }
    public function editFieldAgentDetails(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $totalcount = trim($_POST['totalcount']);
            for ($count=0; $count<$totalcount; $count++) {
                if(isset($_POST['editfieldagentdetailsbtn'.$count])){
                    $agentId=trim($_POST['field_agent_id'.$count]);
                    $data=$this->executiveModel->getFieldAgentDetailsById($agentId);
                    $this->view('executives/editfieldagentdetails',$data);
                }
                else if(isset($_POST['editfieldagentaccessdetailsbtn'.$count])){
                    $agentId=trim($_POST['field_agent_id'.$count]);
                    $agentName=trim($_POST['agent_name'.$count]);
                    $mData['field_agent_id'] = $agentId;
                    $mData['agent_name'] = $agentName;
                    $data=$this->executiveModel->getBranchDetails();
                    $aData=$this->executiveModel->getBranchAccess($agentId);
                    $this->view('executives/branchaccesstofieldag',$data,$aData,$mData);
                }
                else if(isset($_POST['deletesite'.$count])){
                    $agentId=trim($_POST['field_agent_id']);
                    $branch = trim($_POST['branch_id'.$count]); 
                    $aData=$this->executiveModel->deleteAgent($agentId,$branch);
                    $data=$this->executiveModel->getfieldagentDetails();
                    $mData['message']="Site deleted Successfully !!";
                    $this->view('executives/fieldagentlist',$data,$aData,$mData);
                }
            }
        }
    }

    public function getAccess(){
        if(isset($_POST['grantaccessbtn'])){
            $agentId=trim($_POST['field_agent_id']);
             $totalcount = trim($_POST['totalcount']);
            for($count=0; $count<=$totalcount; $count++){
                // $branch = trim($_POST['branch_id'][$count]); 
                // if($branch!=''){
                    $branch = trim($_POST['branch_id'][$count]);
                    $lastUpdateTs=$this->getCurrentTs();
                    $lastUpdateBy ='admin';
                $aData=$this->executiveModel->insertBranch($agentId,$branch);
                $mData['message']="Branch Added Successfully !!";
                $data=$this->executiveModel->getfieldagentDetails();
                $this->view('executives/fieldagentlist',$data,$aData,$mData);
                // }
            }
        }
    }
    public function updateDeskAgentDetails(){
        if (isset($_POST['updatedeskagentdetails'])){
            $agentId=trim($_POST['desk_agent_id']);
            $password=trim($_POST['password']);
            $dob=trim($_POST['d_o_b']);
            $gender=trim($_POST['gender']);
            $address=trim($_POST['address']);
            $state=trim($_POST['state']);
            $city=trim($_POST['city']);
            $district=trim($_POST['district']);
            $ward=trim($_POST['ward_no']);
            $pincode=trim($_POST['pincode']);
            $qualification=trim($_POST['qualification']);
            $institute=trim($_POST['institute']);
            $passingYear=trim($_POST['passing_year']);
            $contactNo=trim($_POST['contact_no']);
            $companyName=trim($_POST['company_name']);
            $jobTitle=trim($_POST['occupation']);
            $workEmail=trim($_POST['work_email']);
            $officeAddress=trim($_POST['office_address']);
            $createTs=$this->getCurrentTs();
            $lastUpdatedBy='executive';
            $lastUpdatedTs=$this->getCurrentTs();
            $createBy='executive';
            $agentId=$this->executiveModel->updateDeskAgentDetailsById($agentId,$password,$dob,$gender,$address,$state,$city,$district,$ward,$pincode,$qualification,$institute,$passingYear,$contactNo,$companyName,$jobTitle,$workEmail,$officeAddress,$createTs,$createBy,$lastUpdatedBy,$lastUpdatedTs); 

            if($agentId){
                $message = 'AgentUpdated';
            }
            else{
                $message = 'FailToUpdateAgent';
            }
                $aData['message'] = $message;
        }
        $data=$this->executiveModel->getdeskagentDetails();
        $this->view('executives/deskagentlist',$data,$aData); 
    }
    public function updateFieldAgentDetails(){
        if (isset($_POST['updatefieldagentdetails'])){
            $agentId=trim($_POST['field_agent_id']);
            $password=trim($_POST['password']);
            $dob=trim($_POST['d_o_b']);
            $gender=trim($_POST['gender']);
            $address=trim($_POST['address']);
            $state=trim($_POST['state']);
            $city=trim($_POST['city']);
            $district=trim($_POST['district']);
            $ward=trim($_POST['ward_no']);
            $pincode=trim($_POST['pincode']);
            $qualification=trim($_POST['qualification']);
            $institute=trim($_POST['institute']);
            $passingYear=trim($_POST['passing_year']);
            $contactNo=trim($_POST['contact_no']);
            $companyName=trim($_POST['company_name']);
            $jobTitle=trim($_POST['occupation']);
            $workEmail=trim($_POST['work_email']);
            $officeAddress=trim($_POST['office_address']);
            $createTs=$this->getCurrentTs();
            $lastUpdatedBy='executive';
            $lastUpdatedTs=$this->getCurrentTs();
            $createBy='executive';
            $agentId=$this->executiveModel->updateFieldAgentDetailsById($agentId,$password,$dob,$gender,$address,$state,$city,$district,$ward,$pincode,$qualification,$institute,$passingYear,$contactNo,$companyName,$jobTitle,$workEmail,$officeAddress,$createTs,$createBy,$lastUpdatedBy,$lastUpdatedTs); 

            if($agentId){
                $message = 'AgentUpdated';
            }
            else{
                $message = 'FailToUpdateAgent';
            }
                $aData['message'] = $message;
        }
        $data=$this->executiveModel->getfieldagentDetails();
        $this->view('executives/fieldagentlist',$data,$aData); 
    }
    public function editReviewerDetails(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $totalcount = trim($_POST['totalcount']);
            for ($count=0; $count<$totalcount; $count++){
                if(isset($_POST['editreviewerdetailsbtn'.$count])){
                    $reviewerId=trim($_POST['reviewer_id'.$count]);
                    $data=$this->executiveModel->getReviewerDetailsById($reviewerId);
                    $this->view('executives/editreviewer',$data);
                }
                else if(isset($_POST['branchaccessbtn'.$count])){
                    $reviwerId=trim($_POST['reviewer_id'.$count]);
                    $reviewerName=trim($_POST['reviewer_name'.$count]);
                    $mData['reviewer_id'] = $reviwerId;
                    $mData['reviewer_name'] = $reviewerName;
                    $data=$this->executiveModel->getBranchDetails();
                    $aData=$this->executiveModel->getBranchAccessByReviewer($reviwerId);
                    $this->view('executives/branchaccesstoreviewer',$data,$aData,$mData);
                }
                else if(isset($_POST['delete'.$count])){
                    $reviwerId=trim($_POST['reviewer_id'.$count]);
                    $branch = trim($_POST['branch_id'.$count]); 
                    $aData=$this->executiveModel->deleteReviewer($reviwerId,$branch);
                    $data=$this->executiveModel->getreviewerDetails();
                    $mData['message']="Site deleted Successfully !!";
                    $this->view('executives/reviewerlist',$data,$aData,$mData);
                }
            }
        }
    }
    public function getReviewerAccess(){
        if(isset($_POST['grantaccess'])){
            $reviwerId=trim($_POST['reviewer_id']);
             $totalcount = trim($_POST['totalcount']);
            for($count=0; $count<=$totalcount; $count++){
                // $branch = trim($_POST['branch_id'][$count]); 
                // if($branch!=''){
                    $branch = trim($_POST['branch_id'][$count]);
                    $lastUpdateTs=$this->getCurrentTs();
                    $lastUpdateBy ='admin';
                $aData=$this->executiveModel->insertBranchByReviewer($reviwerId,$branch);
                $mData['message']="Branch Added Successfully !!";
                $data=$this->executiveModel->getreviewerDetails();
                $this->view('executives/reviewerlist',$data,$aData,$mData);
                // }
            }
        }
    }
    public function updateReviewerDetails(){
        if (isset($_POST['updatereviewerdetails'])){
            $reviewerId=trim($_POST['reviewer_id']);
            $password=trim($_POST['password']);
            $dob=trim($_POST['d_o_b']);
            $gender=trim($_POST['gender']);
            $address=trim($_POST['address']);
            $state=trim($_POST['state']);
            $city=trim($_POST['city']);
            $district=trim($_POST['district']);
            $ward=trim($_POST['ward_no']);
            $pincode=trim($_POST['pincode']);
            $qualification=trim($_POST['qualification']);
            $institute=trim($_POST['institute']);
            $passingYear=trim($_POST['passing_year']);
            $contactNo=trim($_POST['contact_no']);
            $companyName=trim($_POST['company_name']);
            $jobTitle=trim($_POST['occupation']);
            $workEmail=trim($_POST['work_email']);
            $officeAddress=trim($_POST['office_address']);
            $createTs=$this->getCurrentTs();
            $lastUpdatedBy='executive';
            $lastUpdatedTs=$this->getCurrentTs();
            $createBy='executive';
            $agentId=$this->executiveModel->updateReviewerDetailsById($reviewerId,$password,$dob,$gender,$address,$state,$city,$district,$ward,$pincode,$qualification,$institute,$passingYear,$contactNo,$companyName,$jobTitle,$workEmail,$officeAddress,$createTs,$createBy,$lastUpdatedBy,$lastUpdatedTs); 
            if($reviewerId){
                $message = 'ReviewerUpdated';
            }
            else{
                $message = 'FailToUpdateReviewer';
            }
                $aData['message'] = $message;
        }
        $data=$this->executiveModel->getreviewerDetails();
        $this->view('executives/reviewerlist',$data,$aData); 
    }
    public function priorityDetails(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $totalcount = trim($_POST['totalcount']);
            for ($count=0; $count<$totalcount; $count++) {
                if(isset($_POST['highprioritybtn'.$count])){
                    $branch=trim($_POST['branch_id'.$count]);
                    $data=$this->executiveModel->getCountOfHighPriorityCase($branch);
                    $this->view('executives/highprioritycase',$data);
                }
                else if(isset($_POST['mediumprioritybtn'.$count])){
                    $branch=trim($_POST['branch_id'.$count]);
                    $data=$this->executiveModel->getCountOfMediumPriorityCase($branch);
                    $this->view('executives/mediumprioritycase',$data);
                }
                else if(isset($_POST['lowprioritybtn'.$count])){
                    $branch=trim($_POST['branch_id'.$count]);
                    $data=$this->executiveModel->getCountOfLowPriorityCase($branch);
                    $this->view('executives/lowprioritycase',$data);
                }
                else if(isset($_POST['totalprioritybtn'.$count])){
                    $branch=trim($_POST['branch_id'.$count]);
                    $data=$this->executiveModel->getTotalCase($branch);
                    $this->view('executives/totalcase',$data);
                }
            }
        }
    }
    public function serviceDetails(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $totalcount = trim($_POST['totalcount']);
            for ($count=0; $count<$totalcount; $count++) {
                if(isset($_POST['newservicebtn'.$count])){
                    $branch=trim($_POST['branch_id'.$count]);
                    $data=$this->executiveModel->getCountOfNewService($branch);
                    $this->view('executives/newservice',$data);
                }
                else if(isset($_POST['pendingservicebtn'.$count])){
                    $branch=trim($_POST['branch_id'.$count]);
                    $data=$this->executiveModel->getCountOfPendingService($branch);
                    $this->view('executives/pendingservice',$data);
                }
                else if(isset($_POST['completedservicebtn'.$count])){
                    $branch=trim($_POST['branch_id'.$count]);
                    $data=$this->executiveModel->getCountOfCompletedService($branch);
                    $this->view('executives/completedservice',$data);
                }
                else if(isset($_POST['totalservicebtn'.$count])){
                    $branch=trim($_POST['branch_id'.$count]);
                    $data=$this->executiveModel->getCountOfTotalService($branch);
                    $this->view('executives/totalservice',$data);
                }
            }
        }
    }
    public function branchDetails(){
        if (isset($_POST['submitbranchDetails'])){
            $branchDesc=trim($_POST['branch_desc']);
            $lokSabha=trim($_POST['loksabha']);
            $vidhanSabha=trim($_POST['vidhansabha']);
            $wardOrPanchayat=trim($_POST['ward_or_panchayat']);
            $wardNo=trim($_POST['ward_no']);
            $panchayat=trim($_POST['panchayat']);
            $createTs=$this->getCurrentTs();
            // $lastUpdatedBy='executive';
            // $lastUpdatedTs=$this->getCurrentTs();
            // $createBy='executive';
            
            $branchId=$this->executiveModel->insertbranchDetails($branchDesc,$lokSabha,$vidhanSabha,$wardNo,$wardOrPanchayat,$panchayat,$createTs); 

            if($branchId){
                $message = 'BranchCreated';
            }
            else{
                $message = 'FailToCreateBranch';
            }
                $aData['message'] = $message;
        }
        $data=$this->executiveModel->getwardDetails();
        $this->view('executives/branch',$data,$aData); 
    }
}


