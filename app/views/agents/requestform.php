
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<style>
.required-field::before {
  content: "*";
  color: red;
}
</style>

<?php if($additionalData['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom:0;margin-top:0">
        <?php echo $additionalData['message'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>

<div class="container mt-3">
    <h1 class="text-center">Add Service Request</h1>

<form action="<?php echo URLROOT; ?>agents/takeservices" method="post">

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
                                <input type="date" class="form-control" id="dob" name="dob">
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
                                <input type="number" class="form-control" id="mobile" name="mobile" required min='1111111111' max="9999999999">
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
                            <input type="text" class="form-control" id="pincode" name="pincode" required min='111111' max="999999">
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
                                <?php $count=0; foreach($additionalData as $dataline){ ?> 
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
                            <label for="inputAddress" class="form-label">Services</label><span class="required-field"></span>
                            <select  name="services" id="services" class="form-select">
                                <option value="">Please select the Services</option>
                                <option value="Water Tank">Ambulance</option>
                                <option value="Funeral">Funeral</option>
                                <option value="Water Tank">Water Tank</option>
                            </select>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3" name="submit" id="submit">Submit</button>
</form>
</div>


 
<?php require APPROOT . '/views/inc/footer.php'; ?>
