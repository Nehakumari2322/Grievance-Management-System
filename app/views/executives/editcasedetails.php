<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/executive/navbar.php'; ?>



<div class="container mt-3">
    <h1 class="text-center">New Case</h1>

<form action="<?php echo URLROOT; ?>executives/updateCaseDetails" method="post">
<input type="hidden" name="<?php echo 'case_id';?>" value="<?php echo $data->case_id;?>">

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card" style="box-shadow: 0px 8px 32px 0px rgb(104, 149, 210);">
                <div class="card-header">Personal Information</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $data->name ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fatherName">Father's/Husband/Guardian's Name:</label>
                                <input type="text" class="form-control" id="gname" name="gname" value="<?php echo $data->guardian_name ?>">
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="dob">Date of Birth:</label>
                                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $data->d_o_b ?>">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="occupation">Occupation:</label>
                                <select name="occupation" id="occupation" class="form-control " style="margin-top:0">
                                    <option value="<?php echo $data->occupation ?>" ><?php echo $data->occupation ?></option>
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
                                    <option value="<?php echo $data->educational_qualification ?>"><?php echo $data->educational_qualification ?></option>
                                    <option value="10th Pass" >10th Pass</option>
                                    <option value="12th Pass">12th Pass</option>
                                    <option value="Graduated">Graduated</option>
                                    <option value="Post Graduated">Post Graduated</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="mobile">Mobile:</label>
                                <input type="number" class="form-control" id="mobile" name="mobile" value="<?php echo $data->contact_no ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Gender:</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male"
                                        value="Male" <?php if($data->gender=='Male')  { echo "checked";}?>>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="Female" <?php if($data->gender=='Female')  { echo "checked";}?>>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="other"
                                        value="Other" <?php if($data->gender=='Other')  { echo "checked";}?>>
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
                            <input type="text" class="form-control" id="address1" name="address1" value="<?php echo $data->address_line_1 ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="post">Address Line 2:</label>
                            <input type="text" class="form-control" id="address2" name="address2" value="<?php echo $data->address_line_2 ?>">
                        </div>
                    </div>
                    <div class="form-row">
                       
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="district">District:</label>
                            <input type="text" class="form-control" id="district" name="district" value="<?php echo $data->district ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="state">State:</label>
                            <input type="text" class="form-control" id="state" name="state" value="Jharkhand" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="state">City:</label>
                            <input type="text" class="form-control" id="city" name="city" value="<?php echo $data->city ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pincode">Pincode:</label>
                            <input type="text" class="form-control" id="pincode" name="pincode" value="<?php echo $data->pincode ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="ward">Ward:</label>
                            <select  name="ward" id="ward" class="form-select">
                                <option value="<?php echo $data->ward_no ?>"><?php echo $data->ward_no ?></option>
                               
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="vidhamSabha">Vidhan Sabha:</label>
                           
                                <select name="vidhamSabha" id="vidhamSabha" class="form-control " style="margin-top:0">
                                    <option value="<?php echo $data->vidhan_sabha ?>"><?php echo $data->vidhan_sabha ?></option>
                                    <option value="Tamar " >Tamar </option>
                                    <option value="Silli">Silli</option>
                                    <option value="Khijri">Khijri</option>
                                    <option value="Ranchi">Ranchi</option>
                                    <option value="Other">Hatia</option>
                                    <option value="Other">Kanke</option>
                                    <option value="Other">Mandar</option>
                                </select>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lokSabha">Lok Sabha:</label>
                              
                                <select name="lokSabha" id="lokSabha" class="form-control " style="margin-top:0">
                                    <option value="<?php echo $data->lok_sabha ?>"><?php echo $data->lok_sabha ?></option>
                                    <option value="Silli" >Silli</option>
                                    <option value="Khijri ">Khijri </option>
                                    <option value="Hatia">Hatia</option>
                                    <option value="Kanke">Kanke</option>
                                    <option value="Kanke">Ranchi</option>
                                </select>
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
                <div class="card-header">Case Details</div>  
                <div class="card-body">   
                    <div class="row g-3 px-5">
                        <div class="col-md-6">
                        <label for="inputAddress" class="form-label">Type of Complains</label>
                            <select  name="category" id="category" class="form-select" readonly>
                                <option value="<?php echo $data->category_id ?>"><?php echo $data->category_desc ?></option>
                                
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">Personal/Social Complains</label>
                            <select  name="subcategory" id="subcategory" class="form-select" readonly>
                                <option value="<?php echo $data->subcategory_id ?>"><?php echo $data->subcategory_desc ?></option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Description</label>
                            <textarea type="textArea" class="form-control" id="desc" name="desc" value="<?php echo $data->description ?>"></textarea>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cases Priority:</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="priority" id="Higher" value="Higher" <?php if($data->case_priority=='Higher')  { echo "checked";}?>>
                                    <label class="form-check-label" for="male">Higher</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="priority" id="Medium"  value="Medium" <?php if($data->case_priority=='Medium')  { echo "checked";}?>>
                                    <label class="form-check-label" for="female">Medium</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="priority" id="low" value="low" <?php if($data->case_priority=='low')  { echo "checked";}?>>
                                    <label class="form-check-label" for="other">low</label>
                                </div>
                            </div>

                        </div>
                        
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3" name="updatecasedetailsbtn" id="updatecasedetailsbtn">Submit</button>
</form>
</div>


 
<?php require APPROOT . '/views/inc/executive/footer.php'; ?>
