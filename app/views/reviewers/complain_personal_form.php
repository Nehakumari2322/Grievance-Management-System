
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/revienavbar.php'; ?>

<style>
.required-field::before {
  content: "*";
  color: red;
}
</style>

<?php if($newData['message'] == 'CaseRegistered'){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom:0;margin-top:0">
        <form action="<?php echo URLROOT; ?>reviewers/complainpersonaldetail" method="post">
        <input type="hidden" name="caseid" id="caseid" value="<?php echo $newData['id'];?>">
        <strong>Case Registered Successfully !! Your case is id</strong><button name="print" id="print"  onclick="changeFormTarget(this)" style="border:none;background:none;"><?php echo $newData['id'];?></button>
        </form>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>

<div class="container mt-3">
    <h1 class="text-center">New Case</h1>

<form action="<?php echo URLROOT; ?>reviewers/complainpersonaldetail" method="post" enctype="multipart/form-data">

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card" style="box-shadow: 0px 8px 32px 0px rgb(104, 149, 210);">
                <div class="card-header">Personal Information</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name:</label><span class="required-field"></span>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fatherName">Father's/Husband/Guardian's Name:</label><span class="required-field"></span>
                                <input type="text" class="form-control" id="gname" name="gname" required>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="dob">Date of Birth:</label>
                                <input type="date" class="form-control" id="dob" name="dob" >
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="occupation">Occupation:</label>
                                <select name="occupation" id="occupation" class="form-control " style="margin-top:0">
                                    <option value="New" >Select</option>
                                    <option value="Government job" >Government job</option>
                                    <option value="Private Job">Private Job</option>
                                    <option value="Business">Business</option>
                                    <option value="Farmer">Farmer</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="occupation">Qualification:</label>
                                <select name="qualification" id="qualification" class="form-control " style="margin-top:0">
                                    <option value="New" >Select</option>
                                    <option value="10th Pass" >10th Pass</option>
                                    <option value="12th Pass">12th Pass</option>
                                    <option value="Graduated">Graduated</option>
                                    <option value="Post Graduated">Post Graduated</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="mobile">Mobile:</label><span class="required-field"></span>
                                <input type="number" class="form-control" id="mobile" name="mobile" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Gender:</label><span class="required-field"></span><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male"
                                        value="Male">
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="Female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="other"
                                        value="Other">
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
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
                            <input type="text" class="form-control" id="address1" name="address1" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="post">Address Line 2:</label>
                            <input type="text" class="form-control" id="address2" name="address2">
                        </div>
                    </div>
                    <div class="form-row">
                       
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="district">District:</label>
                            <input type="text" class="form-control" id="district" name="district" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="state">State:</label>
                            <input type="text" class="form-control" id="state" name="state" value="Jharkhand" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="state">City:</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pincode">Pincode:</label><span class="required-field"></span>
                            <input type="text" class="form-control" id="pincode" name="pincode" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="lokSabha">Lok Sabha:</label><span class="required-field"></span>
                              
                                <select name="lokSabha" id="lokSabha" class="form-control " style="margin-top:0" required>
                                    <option value="New" >Select</option>
                                    <option value="Ranchi">Ranchi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="vidhamSabha">Vidhan Sabha:</label><span class="required-field"></span>
                           
                                <select name="vidhamSabha" id="vidhamSabha" class="form-control " style="margin-top:0" required>
                                    <option value="New" >Select</option>
                                    <option value="Tamar " >Tamar </option>
                                    <option value="Silli">Silli</option>
                                    <option value="Khijri">Khijri</option>
                                    <option value="Ranchi">Ranchi</option>
                                    <option value="Hatia">Hatia</option>
                                    <option value="Kanke">Kanke</option>
                                    <option value="Mandar">Mandar</option>
                                </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="ward">Ward:</label><span class="required-field"></span>
                            <select  name="ward" id="ward" class="form-select" required>
                                <option value="">Select Ward</option>
                                <?php $count=0; foreach($data as $dataline){ ?> 
                                <option value="<?php echo $dataline->ward_no;?>"><?php echo $dataline->ward_no;?></option>
                                <?php } ?>
                            </select>
                        </div>
                       
                        <div class="form-group col-md-3">
                            <label for="ward">Branch Id:</label><span class="required-field"></span>
                            <select  name="branch" id="branch" class="form-select" required>
                                <option value="">Select Branch Id</option>
                                <?php $count=0; foreach($result as $dataline){ ?> 
                                <option value="<?php echo $dataline->branch_id;?>"><?php echo $dataline->branch_id;?></option>
                                <?php } ?>
                            </select>
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
                            <select  name="category" id="category" class="form-select" required>
                                <option value="">Please select the complain type</option><span class="required-field"></span>
                                <?php $count=0; foreach($additionalData as $dataline){ ?> 
                                <option value="<?php echo $dataline->category_id;?>"><?php echo $dataline->category_desc;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">Personal/Social Complains</label>
                            <select  name="subcategory" id="subcategory" class="form-select" required>
                                <option value="">Please select the complain sub type</option><span class="required-field"></span>
                                <?php $count=0; foreach($moreData as $dataline){ ?> 
                                <option value="<?php echo $dataline->subcategory_id ;?>"><?php echo $dataline->subcategory_desc;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Description</label><span class="required-field"></span>
                            <textarea type="textArea" class="form-control" id="desc" name="desc" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cases Priority:</label><span class="required-field"></span><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="priority" id="Higher" value="Higher">
                                    <label class="form-check-label" for="male">Higher</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="priority" id="Medium"  value="Medium">
                                    <label class="form-check-label" for="female">Medium</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="priority" id="low" value="low">
                                    <label class="form-check-label" for="other">low</label>
                                </div>
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
                    <div class="col-sm-6">
                        <label for="image">Document 1</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/jpeg,image/png,image/jpg"/>
                    </div>
                    <div class="col-sm-6">
                        <label for="signature">Document 2</label>
                        <input type="file" class="form-control" id="image2" name="image2" accept="image/jpeg,image/png,image/jpg"/>
                    </div>
                    <div class="col-sm-6">
                        <label for="signature">Document 3</label>
                        <input type="file" class="form-control" id="image3" name="image3" accept="image/jpeg,image/png,image/jpg"/>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3" name="submit" id="submit">Submit</button>
</form>
</div>


<script>
    function changeFormTarget(el) {
       el.form.setAttribute('target', '_blank')
    }
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
