
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<?php if($moreData['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom:0;margin-top:0">
        <?php echo $moreData['message'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>

<div class="container mt-3">
    <h1 class="text-center">Case Id <?php echo $data->case_id ?></h1>

<form action="<?php echo URLROOT; ?>agents/assignCaseUpdateStatus" method="post" enctype="multipart/form-data">
<input type="hidden" name="caseid" id="caseid" value="<?php echo $data->case_id ?>">
    <div class="row">
        <div class="col-sm-12">
            <div class="card" style="box-shadow: 0px 8px 32px 0px rgb(104, 149, 210);">
            <div class="card-header">Make Changes</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="name">Assign Field Agent</label>
                            <select  name="assignto" id="assignto" class="form-select" required>
                                <option value="">Select Field Agent </option>
                                <?php $count=0; foreach($additionalData as $dataline){ ?> 
                                <option value="<?php echo $dataline->field_agent_id;?>"><?php echo $dataline->agent_name;?></option>
                                <?php } ?>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Change Status</label>
                                <select name="status" id="status" class="form-control " style="margin-top:0" required>
                                    <option value="<?php echo $data->status_id?>" ><?php echo $data->status_id?></option>
                                    <option value="New" >New</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </div>
                        </div>

                        <button class="btn" name="update" id="update" type="submit" style="background:blue ; color:white; width:80%;display:block;margin:auto">Update</button>
                    </div>
                </div>
            </div>
        </div>

</form>      

    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card" style="box-shadow: 0px 8px 32px 0px rgb(104, 149, 210);">
                <div class="card-header">Personal Information</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $data->name?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fatherName">Father's/Husband/Guardian's Name:</label>
                                <input type="text" class="form-control" id="gname" name="gname" value="<?php echo $data->guardian_name?>" readonly>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="dob">Date of Birth:</label>
                                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $data->d_o_b?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="occupation">Occupation:</label>
                                <input type="text" class="form-control" id="dob" name="dob" value="<?php echo $data->occupation?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="occupation">educational_qualification:</label>
                                <input type="text" class="form-control" id="dob" name="dob" value="<?php echo  $data->educational_qualification?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="mobile">Mobile:</label>
                                <input type="number" class="form-control" id="mobile" name="mobile" value="<?php echo $data->contact_no?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Gender:</label><br>
                                <p><?php echo $data->gender?></p>
                            </div>
                        </div>
                        
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card" style="box-shadow: 0px 8px 32px 0px rgb(104, 149, 210);">
                <div class="card-header">Address Information</div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ward">Address Line 1:</label>
                            <input type="text" class="form-control" id="address1" name="address1" value="<?php echo $data->address_line_1?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="post">Address Line 2:</label>
                            <input type="text" class="form-control" id="address2" name="address2" value="<?php echo $data->address_line_2?>">
                        </div>
                    </div>
                    <div class="form-row">
                       
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="district">District:</label>
                            <input type="text" class="form-control" id="district" name="district" value="<?php echo $data->district?>" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="state">State:</label>
                            <input type="text" class="form-control" id="state" name="state" value="Jharkhand" value="<?php echo $data->state?>" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="state">City:</label>
                            <input type="text" class="form-control" id="city" name="city" value="<?php echo $data->city?>" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pincode">Pincode:</label>
                            <input type="text" class="form-control" id="pincode" name="pincode" value="<?php echo $data->pincode?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lokSabha">Lok Sabha:</label>
                                <input type="text" class="form-control" id="dob" name="dob" value="<?php echo $data->lok_sabha?>" readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="vidhamSabha">Vidhan Sabha:</label>
                            <input type="text" class="form-control" id="dob" name="dob" value="<?php echo $data->vidhan_sabha?>" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ward">Ward:</label>
                            <input type="text" class="form-control" id="dob" name="dob" value="<?php echo $data->ward_no?>" readonly>   
                        </div>     
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card" style="box-shadow: 0px 8px 32px 0px rgb(104, 149, 210);">  
                <div class="card-header">Case Details</div>  
                <div class="card-body">   
                    <div class="row g-3 px-5">
                        <div class="col-md-6">
                        <label for="inputAddress" class="form-label">Type of Complains</label>
                        <input type="text" class="form-control" id="dob" name="dob" value="<?php echo $data->d_o_b?>" readonly>
                          
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">Personal/Social Complains</label>
                            <input type="text" class="form-control" id="dob" name="dob" value="<?php echo $data->d_o_b?>" readonly>
                          
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Description</label>
                            <textarea type="textArea" class="form-control" id="desc" name="desc" readonly></textarea>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cases Priority:</label><br>
                                <p><?php echo $data->case_priority?></p>
                            </div>

                        </div>
                        
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card" style="box-shadow: 0px 8px 32px 0px rgb(104, 149, 210);">  
                <div class="card-header">Upload Documents</div>  
                <div class="card-body">   
                    <div class="row g-3 px-5">
                    <div class="col-sm-4">
                        <img src="<?php echo URLROOT.'/casedocument/'.$data->document1;?>" height="150px" alt="">
                    </div>
                    <div class="col-sm-4">
                        <img src="<?php echo URLROOT.'/casedocument/'.$data->document2;?>" height="150px" alt="">
                    </div>
                    <div class="col-sm-4">
                        <img src="<?php echo URLROOT.'/casedocument/'.$data->document3;?>" height="150px" alt="">
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</div>


<script>
    function changeFormTarget(el) {
       el.form.setAttribute('target', '_blank')
    }
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
