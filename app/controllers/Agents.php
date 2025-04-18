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
class Agents extends Controller{

    public function __construct() {
       // echo 'executives construct';
        $this->agent = $this->model('Agent');
    }

    public function logmein()
    {
        $this->view('agents/login');
    } 

    public function agentLogin() {
       // echo 'i am in executivesLogin';
       $data = null;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($_POST['submit'])){
                $data = [
                    'userid' => trim($_POST['userid']),
                    'password' => trim($_POST['password']),
                    'branchId' => trim($_POST['branch']),
                    'role' =>'agent'
                ];
                $matched = $this->agent->login_verification($data);

                if($matched == true ){
                    // echo 'matched';
                    $data = $this->priority();
                    $adata = $this->agent->getAllSubCategory();
                    $mdata = $this->caseNewSummary();
                    $ndata = $this->casePendingSummary();
                    $rdata = $this->caseCompletedSummary();
                    $sdata = $this->caseTotalSummary();
                    $ldata = $this->serviceCount();
                   $this->view('agents/dashboard',$data,$adata,$mdata,$ndata,$rdata,$sdata,$cdata,$ldata);
                }
                else{
                    // echo 'not matched';
                    $data = "password_mismatch";
                    $this->view('agents/login', $data);
                }
            }
            
        }
    }

    public function serviceCount(){
        $data1 = $this->agent->getNewService();
        $ldata['new'] = count($data1);
        $data2 = $this->agent->getPendingService();
        $ldata['pending'] = count($data2);
        $data3 = $this->agent->getCompletedService();
        $ldata['completed'] = count($data3);
        return $ldata;
    }


    public function caseNewSummary(){
        $data = $this->agent->getAllSubCategory();
        $i=0;
        $mdata = array();
        foreach($data as $dataline){
            $subcategory_id = $dataline->subcategory_id;
            $data1 = $this->agent->getCountOfNewCase($subcategory_id);
            $mdata[] = count($data1);  
        }
        // print_r($mdata);
        return $mdata;    
    }

    public function casePendingSummary(){
        $data = $this->agent->getAllSubCategory();
        $i=0;
        $ndata = array();
        foreach($data as $dataline){
            $subcategory_id = $dataline->subcategory_id;
            $data2 = $this->agent->getCountOfPendingCase($subcategory_id);
            $ndata[] = count($data2);   
        }
        // print_r($ndata);
        return $ndata; 
    }


    public function caseCompletedSummary(){
        $data = $this->agent->getAllSubCategory();
        $i=0;
        $rdata = array();
        foreach($data as $dataline){
            $subcategory_id = $dataline->subcategory_id;
            $data2 = $this->agent->getCountOfCompletedCase($subcategory_id);
            $rdata[] = count($data2);   
        }
        // print_r($rdata);
        return $rdata; 
    }

    public function caseTotalSummary(){
        $data = $this->agent->getAllSubCategory();
        $i=0;
        $sdata = array();
        foreach($data as $dataline){
            $subcategory_id = $dataline->subcategory_id;
            $data2 = $this->agent->getCountOfTotalCase($subcategory_id);
            $sdata[] = count($data2);   
        }
        // print_r($sdata);
        return $sdata; 
    }


    public function priority(){
        $data1 = $this->agent->getNewHigherPriority();
        $data2 = $this->agent->getNewMediumPriority();
        $data3 = $this->agent->getNewLowPriority();
        $data8 = $this->agent->getPendingHigherPriority();
        $data9 = $this->agent->getPendingMediumPriority();
        $data10 = $this->agent->getPendingLowPriority();
        $data11 = $this->agent->getCompletedHigherPriority();
        $data12 = $this->agent->getCompletedMediumPriority();
        $data13 = $this->agent->getCompletedLowPriority();
        $data4 = $this->agent->new();
        $data5 = $this->agent->pending();
        $data6 = $this->agent->completed();
        $data7 = $this->agent->totalCases();
        $data['newhigher'] = count($data1);
        $data['newmedium'] = count($data2);
        $data['newlow'] = count($data3);
        $data['pendinghigher'] = count($data8);
        $data['pendingmedium'] = count($data9);
        $data['pendinglow'] = count($data10);
        $data['completedhigher'] = count($data11);
        $data['completedmedium'] = count($data12);
        $data['completedlow'] = count($data13);

        $data['new'] = count($data4);
        $data['pending'] = count($data5);
        $data['completed'] = count($data6);
        $data['total'] = count($data7);
        return $data;
    }

    public function navbar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($_POST['dashboardbtn'])){

                $data = $this->priority();
                $adata = $this->agent->getAllSubCategory();
                $mdata = $this->caseNewSummary();
                $ndata = $this->casePendingSummary();
                $rdata = $this->caseCompletedSummary();
                $sdata = $this->caseTotalSummary();
                $ldata = $this->serviceCount();
                $this->view('agents/dashboard',$data,$adata,$mdata,$ndata,$rdata,$sdata,$cdata,$ldata);

            }
        }
    }

    public function listofsubcategory(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $totalcount = trim($_POST['totalcount']);
            for ($count=0; $count<$totalcount; $count++) {
                if(isset($_POST['newstatus'.$count])){
                    $subcategoryId=trim($_POST['subcategoryId'.$count]);
                    $data=$this->agent->getNewSubCategoryCase($subcategoryId);
                    $data1 = $this->agent->getSubcategoryname($subcategoryId);
                    $adata['name'] = $data1->subcategory_desc;
                    $adata['status'] = 'New';
                    $this->view('agents/subcategorycaselist',$data,$adata);
                }
                else if(isset($_POST['pendingstatus'.$count])){
                    $subcategoryId=trim($_POST['subcategoryId'.$count]);
                    $data=$this->agent->getPendingSubCategoryCase($subcategoryId);
                    $data1 = $this->agent->getSubcategoryname($subcategoryId);
                    $adata['name'] = $data1->subcategory_desc;
                    $adata['status'] = 'Pending';
                    $this->view('agents/subcategorycaselist',$data,$adata);
                }
                else if(isset($_POST['completedstatus'.$count])){
                    $subcategoryId=trim($_POST['subcategoryId'.$count]);
                    $data=$this->agent->getCompletedSubCategoryCase($subcategoryId);
                    $data1 = $this->agent->getSubcategoryname($subcategoryId);
                    $adata['name'] = $data1->subcategory_desc;
                    $adata['status'] = 'Completed';
                    $this->view('agents/subcategorycaselist',$data,$adata);
                }
                else if(isset($_POST['totalstatus'.$count])){
                    $subcategoryId=trim($_POST['subcategoryId'.$count]);
                    $data=$this->agent->gettoalSubCategoryCase($subcategoryId);
                    $data1 = $this->agent->getSubcategoryname($subcategoryId);
                    $adata['name'] = $data1->subcategory_desc;
                    $adata['status'] = 'ALL';
                    $this->view('agents/subcategorycaselist',$data,$adata);
                }
            }
        }
    }

    public function agentsaccess(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($_POST['cases'])){
                $data = $this->agent->getAllWard();
                $adata = $this->agent->getAllCategory();
                $mdata = $this->agent->getAllSubCategory();
                $rdata = $this->agent->getAllBranch();
                $this->view('agents/complain_personal_form',$data,$adata,$mdata,$ndata,$rdata);
            }
            else if(isset($_POST['request'])){
                $data = $this->agent->getAllWard();
                $aData = $this->agent->getAllBranch();
                $this->view('agents/requestform',$data,$aData);
            }
            else if(isset($_POST['newhigher'])){
                $data = $this->agent-> getNewHigherPriority();
                $adata['priority'] = 'Higher';
                $adata['status'] = 'New';
                $this->view('agents/priority',$data,$adata);
            }
            else if(isset($_POST['newmedium'])){
                $data = $this->agent->getNewMediumPriority();
                $adata['priority'] = 'Medium';
                $adata['status'] = 'New';
                $this->view('agents/priority',$data,$adata);
            }
            else if(isset($_POST['newlow'])){
                $data = $this->agent->getNewLowPriority();
                $adata['priority'] = 'Low';
                $adata['status'] = 'New';
                $this->view('agents/priority',$data,$adata);
            }
            else if(isset($_POST['pendinghigher'])){
                $data = $this->agent->getPendingHigherPriority();
                $adata['priority'] = 'Higher';
                $adata['status'] = 'Pending';
                $this->view('agents/priority',$data,$adata);
            }
            else if(isset($_POST['pendingmedium'])){
                $data = $this->agent->getPendingMediumPriority();
                $adata['priority'] = 'Medium';
                $adata['status'] = 'Pending';
                $this->view('agents/priority',$data,$adata);
            }
            else if(isset($_POST['pendinglow'])){
                $data = $this->agent->getPendingLowPriority();
                $adata['priority'] = 'Low';
                $adata['status'] = 'Pending';
                $this->view('agents/priority',$data,$adata);
            }
            else if(isset($_POST['completedhigher'])){
                $data = $this->agent->getCompletedHigherPriority();
                $adata['priority'] = 'Higher';
                $adata['status'] = 'Completed';
                $this->view('agents/priority',$data,$adata);
            }
            else if(isset($_POST['completedmedium'])){
                $data = $this->agent-> getCompletedMediumPriority();
                $adata['priority'] = 'Medium';
                $adata['status'] = 'Completed';
                $this->view('agents/priority',$data,$adata);
            }
            else if(isset($_POST['completedlow'])){
                $data = $this->agent->getCompletedLowPriority();
                $adata['priority'] = 'Low';
                $adata['status'] = 'Completed';
                $this->view('agents/priority',$data,$adata);
            }
            else if(isset($_POST['new'])){
                $data = $this->agent->new();
                $adata['status'] = 'New';
                $this->view('agents/casestatus',$data,$adata);
            }
            else if(isset($_POST['pending'])){
                $data = $this->agent->pending();
                $adata['status'] = 'Pending';
                $this->view('agents/casestatus',$data,$adata);
            }
            else if(isset($_POST['completed'])){
                $data = $this->agent->completed();
                $adata['status'] = 'Completed';
                $this->view('agents/casestatus',$data,$adata);
            }
            else if(isset($_POST['servicenew'])){
                $data = $this->agent->getNewService();
                $this->view('agents/servicestatus',$data);
            }
            else if(isset($_POST['servicepending'])){
                $data = $this->agent->getPendingService();
                $this->view('agents/servicestatus',$data);
            }
            else if(isset($_POST['servicecompleted'])){
                $data = $this->agent->getCompletedService();
                $this->view('agents/servicestatus',$data);
            }
            else if(isset($_POST['search'])){
                $this->view('agents/search');
            }
        }
    }

    public function complainPersonalDetail(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // echo"WERF";
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($_POST['submit'])){
                // echo"ewrf";
                $caseId = 'CAS'.mt_rand(10000,99999).mt_rand(10,99);
                $name = trim($_POST['name']);
                $gname = trim($_POST['gname']);
                $dob = trim($_POST['dob']);
                $mobile = trim($_POST['mobile']);
                $gender = trim($_POST['gender']);
                $occupation = trim($_POST['occupation']);
                $qualification = trim($_POST['qualification']);
                $address1 = trim($_POST['address1']);
                $address2 = trim($_POST['address2']);
                $ward = trim($_POST['ward']);
                $branch_id = trim($_POST['branch']);
                $district = trim($_POST['district']);
                $state = trim($_POST['state']);
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
                $createdBy = 'agent';
                $lastUpdatedTs = $this->getCurrentTs();
                $lastUpdatedBy  = 'agent';
                $targetDir = "casedocument/";
                $allowTypes = array('jpg', 'png', 'jpeg','pdf','doc');
                $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
                $fileNames = array('image', 'image2','image3');
                
                if (!empty($_FILES)) {
                    foreach ($fileNames as $fileKey) {
                        if (!empty($_FILES[$fileKey]['name'])) {
                            // File upload path
                            $fileName = basename($_FILES[$fileKey]['name']);
                            $targetFilePath = $targetDir . $fileName;

                            // Check whether file type is valid
                            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                            if (in_array($fileType, $allowTypes)) {
                                // Upload file to server
                                if (move_uploaded_file($_FILES[$fileKey]["tmp_name"], $targetFilePath)) {
                                    // Image db insert sql
                                    $insertValuesSQL .= "('".$fileName."', NOW()),";
                                } else {
                                    $errorUpload .= $_FILES[$fileKey]['name'] . ' | ';
                                }
                            } else {
                                $errorUploadType .= $_FILES[$fileKey]['name'] . ' | ';
                            }
                        }
                    }
                }

                if (!empty($insertValuesSQL)) {
                    // Remove trailing comma
                    $insertValuesSQL = rtrim($insertValuesSQL, ',');
    
                    // Insert image info into the database
                    // echo"hiii";
                    $id = $this->agent->insertCaseDetail($caseId,$name,$gname,$dob,$mobile,$gender,$occupation,$address1,$address2,$ward,$district,$state,$pincode,$vidhamSabha,$lokSabha,$qualification,$city,$category,$subcategory,$desc,$priority,$status,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy,$_FILES['image']['name'], $_FILES['image2']['name'], $_FILES['image3']['name'],$branch_id);
                    $case = $this->agent->getcaseid($id);
                    if($id != null){
                    
                        $ndata['message'] = 'CaseRegistered'  ;
                        $ndata['id'] = $case->case_id ;
                    }
                    if (!empty($errorUpload)) {
                        $errorMsg .= 'Error uploading: ' . $errorUpload;
                    }
                    if (!empty($errorUploadType)) {
                        $errorMsg .= 'Invalid file types: ' . $errorUploadType;
                    }
                    if (!empty($errorMsg)) {
                        $ndata['message'] = $errorMsg;
                    } 
                    $data = $this->agent->getAllWard();
                    $adata = $this->agent->getAllCategory();
                    $mdata = $this->agent->getAllSubCategory();
                    $rdata = $this->agent->getAllBranch();
                    $this->view('agents/complain_personal_form',$data,$adata,$mdata,$ndata,$rdata);
                    // $id = $this->report->insertEmployeePersonalData($name, $father_name, $husband_name, $doj, $phone, $gender, $dob,
                    //     $_FILES['image']['name'], $_FILES['signature']['name'], $createdTs, $createdBy,$lastUpdatedTs, $lastUpdatedBy,$address,$email);   
                }
            }
            else if(isset($_POST['print'])){
                $caseId=trim($_POST['caseid']);
                $data=$this->agent->getCaseDetailsByCaseId($caseId); 
              
                $htmlText = $this->buildHTMLTextForPDFReport1($data);
                // echo $htmlText;
                $this->buildHTMLToPDF($htmlText); 
            } 
        }
    }

    public function buildHTMLTextForPDFReport1($data){
    
        date_default_timezone_set('Asia/Kolkata'); 
        $last_update_ts=date('d/m/Y H:i:s'); 
        $html1=' <!DOCTYPE html>
         <html lang="en">
         <head>
             <meta charset="UTF-8">
             <meta http-equiv="X-UA-Compatible" content="IE=edge">
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <title>Details Pdf</title>
             <style>

             th{
                color:grey;
             }
             </style>
         </head>
         <body>
         
         <table style="table-layout: fixed; width: 100%">
         <tr>
        <th style="width:10%"><img src="img/logoo.jpg" height="80px"></th>
        <th style="width:30%"></th>
        <th style="width: 60%;text-align: right; color:black;">'.SITENAME.'</th>
         </tr>
         </table>
             <hr class="my-5"> 
             <table width="100%" style="font-size:10px; text-align: center;table-layout:fixed;border-collapse:collapse;"">
               <thead>
                 
                 <tr>
                     <th><b>S N</b></th>
                     <th><b>Case Id</b></th>
                     <th><b>Name</b></th>
                     <th><b>Status</b></th>
                     <th><b>Phone No</b></th>
                     <th><b>Ward</b></th>
                     <th><b>Category</b></th>
                     <th><b>Subcategory</b></th>
                     <th><b>Date</b></th>
                     
                     

                 </tr>
               </thead> <tr><td colspan="10"><hr/></td></tr> ';
        
               $html2=" ";
       
            $html2=$html2.
            
                    ' <tr>
                        <td>'.'1'.'</td>
                        <td>'.$data->case_id.'</td>
                        <td style="word-wrap: break-word;width:50px;">'.$data->name.'</td>
                        <td>'.$data->status_id.'</td>
                        <td>'.$data->contact_no.'</td>
                        <td>'.$data->ward_no.'</td>
                        <td>'.$data->category_desc.'</td>
                        <td>'.$data->subcategory_desc.'</td>
                        <td>'.date("d-m-Y", strtotime($data->create_ts)).'</td>
                        
                         
                    </tr> ';
           
            $html3='        </table>
                        </body>
                    </html> ';
        
        $html=$html1.$html2.$html3;
        return $html;
    }
    public function buildHTMLToPDF($htmlText){
        $dompdf = new Dompdf();
        $html = $htmlText;
        // $html = file_get_contents('../app/views/maintainbooks/details_pdf.php');
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A5', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        // $dompdf->stream('details_pdf1.pdf',['Attachment'=>false]);
        $dompdf->stream("new file", array('Attachment'=>0));
        // $dompdf->stream("file.pdf");
    }

    public function takeservices(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($_POST['submit'])){
                $serviceId = 'SER'.mt_rand(10000,99999).mt_rand(10,99);
                $name = trim($_POST['name']);
                $gname = trim($_POST['gname']);
                $dob = trim($_POST['dob']);
                $mobile = trim($_POST['mobile']);
                $gender = trim($_POST['gender']);
                $occupation = trim($_POST['occupation']);
                $qualification = trim($_POST['qualification']);
                $address1 = trim($_POST['address1']);
                $address2 = trim($_POST['address2']);
                $ward = trim($_POST['ward']);
                $branch_id = trim($_POST['branch']);
                $district = trim($_POST['district']);
                $state = trim($_POST['state']);
                $pincode = trim($_POST['pincode']);
                $vidhamSabha = trim($_POST['vidhamSabha']);
                $lokSabha = trim($_POST['lokSabha']);
                $city = trim($_POST['city']);
                $adata['message'] = null;
                $services = trim($_POST['services']);
                $status = 'new';
                $createdTs = $this->getCurrentTs();
                $createdBy = 'agent';
                $lastUpdatedTs = $this->getCurrentTs();
                $lastUpdatedBy  = 'agent';
                $id = $this->agent->insertServiceDetail($serviceId,$name,$gname,$dob,$mobile,$gender,$occupation,$address1,$address2,$ward,$branch_id,$district,$state,$pincode,$vidhamSabha,$lokSabha,$qualification,$city,$status,$createdTs,$createdBy,$lastUpdatedTs,$services,$lastUpdatedBy);
                if($id != null){
                    $adata['message'] = 'Services request register successfully' ;
                }
                $data = $this->agent->getAllWard();
                $aData = $this->agent->getAllBranch();
                $this->view('agents/requestform',$data,$adata);

            }
        }
    }

    public function casesreport(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($_POST['submit'])){
                $caseId = trim($_POST['caseid']);
                // echo"id".$caseId;
                $cdata['message'] = null;
                $category = trim($_POST['category']);
                $subcategory = trim($_POST['subcategory']);
                $desc = trim($_POST['desc']);
                $priority = trim($_POST['priority']);
                $status = 'new';
                $createdTs = $this->getCurrentTs();
                $createdBy = 'agent';
                $lastUpdatedTs = $this->getCurrentTs();
                $lastUpdatedBy  = 'agent';
                $id = $this->agent->insertCases($caseId,$category,$subcategory,$desc,$priority,$status,$createdTs,$createdBy,$lastUpdatedTs,$lastUpdatedBy);

                if($id != null){
                    $cdata['message'] = 'cases register successfully' ;
                }

                $data = $this->priority();
                $adata = $this->agent->getAllSubCategory();
                $mdata = $this->caseNewSummary();
                $ndata = $this->casePendingSummary();
                $rdata = $this->caseCompletedSummary();
                $sdata = $this->caseTotalSummary();
                $ldata = $this->serviceCount();
                $this->view('agents/dashboard',$data,$adata,$mdata,$ndata,$rdata,$sdata,$cdata,$ldata);
            }
        }
    }

    public function updateservicestatus(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $totalcount = trim($_POST['totalcount']);
            for($count=0; $count<=$totalcount; $count++) {
                if(isset($_POST['update'.$count])){
                    $Id=trim($_POST['id'.$count]);
                    $cdata['message'] = null;
                    $status = trim($_POST['status'.$count]);
                    $lastUpdatedTs = $this->getCurrentTs();
                    $lastUpdatedBy  = 'agent';
                    $data1 = $this->agent->updateServiceStatus($Id,$status,$lastUpdatedTs,$lastUpdatedBy);
                    if($data1 != null){
                        $cdata['message']= "Services Status Updated Successfully !!";
                    }
                    $data = $this->priority();
                    $adata = $this->agent->getAllSubCategory();
                    $mdata = $this->caseNewSummary();
                    $ndata = $this->casePendingSummary();
                    $rdata = $this->caseCompletedSummary();
                    $sdata = $this->caseTotalSummary();
                    $ldata = $this->serviceCount();
                    $this->view('agents/dashboard',$data,$adata,$mdata,$ndata,$rdata,$sdata,$cdata,$ldata);
                }
            }
        }
    }

    public function assignCaseUpdateStatus(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                if(isset($_POST['update'])){
                    $Id=trim($_POST['caseid']);
                    $mdata['message'] = null;
                    $status = trim($_POST['status']);
                    $assignTo = trim($_POST['assignto']);
                    $lastUpdatedTs = $this->getCurrentTs();
                    $lastUpdatedBy  = 'agent';
                    $data1 = $this->agent->updateCaseStatus($Id,$status,$assignTo,$lastUpdatedTs,$lastUpdatedBy);
                    if($data1 != null){
                        $mdata['message']= "Status Updated Successfully !!";
                    }
                    $data = $this->agent->getAllCasesDetails($Id);
                    $adata = $this->agent->getAllFieldAgent();
                    $this->view('agents/detailCasedetail',$data,$adata,$mdata);
                    
                }
            
        }
    }

    public function UpdateCaseStatus(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $totalcount = trim($_POST['totalcount']);
                for($count=0; $count<=$totalcount; $count++) {
                    if(isset($_POST['update'.$count])){
                        $Id=trim($_POST['id'.$count]);
                        $data = $this->agent->getAllCasesDetails($Id);
                        $adata = $this->agent->getAllFieldAgent();
                        $this->view('agents/detailCasedetail',$data,$adata);
                    }
                }
            }
    }

    public function searchbymobileorcasesid(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($_POST['submit'])){
                $search = trim($_POST['flexRadioDefault']);
                if( $search == 'mobile'){
                    $mobile = trim($_POST['mobileInput']);
                    $data = $this->agent->getAllCaseByMobileNumber($mobile);
                    $htmlText = $this->buildHTMLTextForPDFReport1($data);
                    // echo $htmlText;
                    $this->buildHTMLToPDF($htmlText); 
                }
                else if($search == 'case'){
                    $caseId = trim($_POST['caseIdInput']);
                    $data=$this->agent->getCaseDetailsByCaseId($caseId); 
                    $htmlText = $this->buildHTMLTextForPDFReport1($data);
                    // echo $htmlText;
                    $this->buildHTMLToPDF($htmlText); 
                }
                $caseId = trim($_POST['caseid']);
            }
        }
    }


}

?>


