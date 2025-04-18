<?php require APPROOT . '/views/inc/executive/header.php'; ?>
<?php require APPROOT . '/views/inc/executive/navbar.php'; ?>
    <style>
      body {
        background-color: #f8f9fa;
      }
      .card {
        margin-top: 20px;
        box-shadow: 0 8px 32px 0px rgb(131, 131, 202);
      }
      .card-header {
        background-color: #BA0000;
        color: white;
        text-align: center;
      }
      .btn-primary {
        background-color: #007bff;
        border: none;
      }
      .btn-primary:hover {
        background-color: #0056b3;
      }
      .form-section {
        padding: 20px;
        border-bottom: 1px solid #dee2e6;
      }
      .photo-preview img {
        max-width: 50px; /* Decreased photo size */
        height: 50px;
        margin-top: 10px;
        margin-left: 70px; /* Adjusted margin for spacing */
      }
    </style>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              <h3>Update Desk Agent Details</h3>
            </div>
            <div class="card-body">
              <div class="form">
                <h4>Personal Details</h4>
                <form action="<?php echo URLROOT; ?>executives/updateDeskAgentDetails" method="post">
                <input type="hidden" name="<?php echo 'desk_agent_id';?>" id="<?php echo 'desk_agent_id';?>"  value="<?php echo $data->desk_agent_id;?>">

                  <div class="row">
                    <div class="mb-3 col-sm-6">
                      <label for="fullname" class="form-label">Full Name</label>
                      <input
                        type="text"
                        class="form-control is-invalid"
                        id="agent_name" name="agent_name" value="<?php echo $data->agent_name;?>"
                      />
                    </div>
                    <div class="mb-3 col-sm-6">
                      <label for="password" class="form-label">Password</label>
                      <input
                        type="password"
                        class="form-control"
                        id="password" name="password" value="<?php echo $data->password;?>"
                        
                      />
                    </div>
                  </div>
                  <div class="row">
                    <!-- <div class="mb-3 col-sm-6">
                      <label for="password" class="form-label">Password</label>
                      <input
                        type="password"
                        class="form-control"
                        id="password" name="agent_name"
                        placeholder="Enter your password"
                        required
                      />
                    </div> -->
                    <!-- <div class="mb-3 col-sm-6">
                      <label for="email" class="form-label"
                        >Email Address</label
                      >
                      <input
                        type="email"
                        class="form-control"
                        id="email" name="agent_name"
                        placeholder="Enter your email address"
                        required
                      />
                    </div> -->
                  </div>
                  <div class="row">
                    <div class="mb-3 col-sm-6">
                      <label for="dob" class="form-label">Date of Birth</label>
                      <input
                        type="date"
                        class="form-control"
                        id="d_o_b" name="d_o_b" value="<?php echo $data->d_o_b;?>"
                      />
                    </div>
                    <div class="mb-3 col-sm-6">
                      <label for="gender" class="form-label is-invalid"
                        >Gender</label
                      >
                      <select class="form-select" id="gender" name="gender">
                        <option value="<?php echo $data->gender;?>"><?php echo $data->gender;?></option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <label for="phone" class="form-label">Phone Number</label>
                      <input
                        type="number"
                        class="form-control is-invalid"
                        id="contact_no" name="contact_no" value="<?php echo $data->contact_no;?>"
                        placeholder="Enter your phone number"
                        required
                      />
                    </div>

                  </div>
                <!-- </form> -->
              </div>
              <br />
              <hr style="border: 2px solid black" />
              <!----address-->
              <div class="form">
                <h4>Address Details</h4>
                <div class="form-group">
                  <label for="address">Address:</label>
                  <textarea type="textArea" class="form-control" id="address" name="address" value="<?php echo $data->address;?>" rows="3"></textarea>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="ward">Ward:</label>
                    <input
                      type="text"
                      class="form-control is-invalid"
                      id="ward_no" name="ward_no" value="<?php echo $data->ward_no;?>"
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="post">City:</label>
                    <input
                      type="text"
                      class="form-control is-invalid"
                      id="city" name="city" value="<?php echo $data->city;?>"
                    />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="district">District:</label>
                    <input
                      type="text"
                      class="form-control is-invalid"
                      id="district" name="district" value="<?php echo $data->district;?>"
                    />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="state">State:</label>
                    <input
                      type="text"
                      class="form-control is-invalid"
                      id="state" name="state" value="<?php echo $data->state;?>"
                    />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-4">
                    <label for="pincode">Pincode:</label>
                    <input
                      type="text"
                      class="form-control is-invalid"
                      id="pincode" name="pincode" value="<?php echo $data->pincode;?>"
                    />
                  </div>
                  <!-- <div class="form-group col-md-4">
                    <label for="vidhamSabha">Vidhan Sabha:</label>
                    <input
                      type="text"
                      class="form-control is-invalid"
                      id="vidhamSabha" name="agent_name"
                    />
                  </div> -->

                  <!-- <div class="col-md-4">
                    <div class="form-group">
                      <label for="lokSabha">Lok Sabha:</label>
                      <input
                        type="text"
                        class="form-control is-invalid"
                        id="lokSabha"
                      />
                    </div>
                  </div> -->
                </div>
              </div>
              <br />
              <hr style="border: 2px solid black" />
              <!----Educational details-->
              <div class="form">
                <h4>Qualification Details</h4>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="qualification">Qualification:</label>
                      <input
                        type="text"
                        class="form-control is-invalid"
                        id="qualification" name="qualification" value="<?php echo $data->qualification;?>"
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="institute">Institute:</label>
                      <input type="text" class="form-control" id="institute" name="institute" value="<?php echo $data->institute;?>"/>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="passingYear">Passing Year:</label>
                      <input
                        type="text"
                        class="form-control"
                        id="passing_year" name="passing_year" value="<?php echo $data->passing_year;?>"
                      />
                    </div>
                  </div>
                </div>
              </div>
              <br />
              <hr style="border: 2px solid black" />
              <!-------professional details-->
              <div class="form">
                <h4>Professional Details</h4>
                <!-- <form> -->
                  <div class="row">
                    <div class="mb-3 col-sm-4">
                      <label for="company" class="form-label"
                        >Company Name</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="company_name" name="company_name" value="<?php echo $data->company_name;?>"
                        placeholder="Enter your company name"
                        required
                      />
                    </div>
                    <div class="mb-3 col-sm-4">
                      <label for="job_title" class="form-label"
                        >Profession</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="occupation" name="occupation" value="<?php echo $data->occupation;?>"
                        placeholder="Enter your job title"
                        required
                      />
                    </div>
                    <div class="mb-3 col-sm-4">
                      <label for="work_email" class="form-label"
                        >Work Email Address</label
                      >
                      <input
                        type="email"
                        class="form-control"
                        id="work_email" name="work_email" value="<?php echo $data->work_email;?>"
                        
                      />
                    </div>
                  </div>
                  <div class="row">
                    <div class="mb-3 col-sm-12">
                    <label for="address" class="form-label">Address</label>
                  <textarea class="form-control" type="textArea" id="office_address" name="office_address" value="<?php echo $data->office_address;?>" rows="3"></textarea>
                    </div>
                    
                  </div>
                  <div class="row">
                    <!-- <div class="mb-3 col-sm-6">
                      <label for="address" class="form-label">Address</label>
                      <textarea
                        class="form-control"
                        id="office_address" name="office_address" value="<?php echo $data->agent_name;?>"
                        rows="3"
                        placeholder="Enter your office address"
                        required
                      ></textarea>
                    </div> -->
                    <!-- <div class="form-group col-sm-6">
                      <label for="photo">Photo:</label>
                      <input
                        type="file"
                        class="form-control-file"
                        id="photo"
                        onchange="previewPhoto(event)"
                        required
                      />
                      <div id="photoPreview" class="photo-preview">
                        <img id="previewImg" src="#" alt="" />
                      </div>
                    </div> -->
                  </div>
                <!-- </form> -->
              </div>
            
              <div class="d-grid gap-2 col-6 mx-auto my-5">
                <button class="btn btn-primary" type="submit" id="updatedeskagentdetails" name="updatedeskagentdetails">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      function previewPhoto(event) {
        var reader = new FileReader();
        reader.onload = function () {
          var output = document.getElementById("previewImg");
          output.src = reader.result;
          document.getElementById("photoPreview").style.display = "block";
        };
        reader.readAsDataURL(event.target.files[0]);
      }
    </script>
 <?php require APPROOT . '/views/inc/executive/footer.php'; ?>
