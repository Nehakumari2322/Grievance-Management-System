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
<?php if($additionalData['message'] == 'BranchCreated'){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! Agent Data Inserted Successfully !! </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
        </div>
   <?php } elseif ($additionalData['message'] == 'FailToCreateBranch') { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed to Insert Data, Try Again Later !! </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
         </div>
    <?php }; ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              <h3>Add Branch Details</h3>
            </div>
            <div class="card-body">
              <div class="form">
                <form action="<?php echo URLROOT; ?>executives/branchdetails" method="post">
                  <div class="row mb-2">
                    <div class="col-sm-4"></div>
                    <div class="mb-3 col-sm-4">
                      <label for="fullname" class="form-label text-center">Branch</label>
                      <input
                        type="text"
                        class="form-control"
                        id="branch_desc" name="branch_desc"
                        placeholder="Enter your Branch name"
                        required
                      />
                    </div>
                    <div class="col-sm-4"></div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                        <div class="form-check-sm form-check-inline my-1 " >
                              <label class="form-check-label small">Lok Sabha</label>
                              <select id="loksabha" name="loksabha">
                                  <option value="" >Select</option>
                                  <option value="Ranchi">Ranchi</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check-sm form-check-inline">
                            <label class="form-check-label small">Vidhan Sabha</label>
                            <select id="vidhansabha" name="vidhansabha">
                                <option value="" >Select</option>
                                <option value="Tamar" >Tamar </option>
                                <option value="Silli">Silli</option>
                                <option value="Khijri">Khijri</option>
                                <option value="Ranchi">Ranchi</option>
                                <option value="Hatia">Hatia</option>
                                <option value="Kanke">Kanke</option>
                                <option value="Mandar">Mandar</option>
                        </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-2"></div>
                      <div class="col-sm-4">
                        <div class="form-check-sm form-check-inline">
                            <input class="form-check-input" type="radio" name="ward_or_panchayat" id="inlineRadio1" value="Ward" onclick="igstClick()" required>
                            <label class="form-check-label small" for="inlineRadio2">Ward</label>
                            <select id="ward_no" name="ward_no">
                                <option value="">Select Ward</option>
                                <?php $count=0; foreach($data as $dataline){ ?> 
                                <option value="<?php echo $dataline->ward_no;?>"><?php echo $dataline->ward_no;?></option>
                                <?php } ?>
                        </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-check-sm form-check-inline">
                            <input class="form-check-input" type="radio" name="ward_or_panchayat" id="inlineRadio2" value="Panchayat" onclick="igstClick()" required>
                            <label class="form-check-label small" for="inlineRadio2">Panchayat</label>
                            <input type="text" name="panchayat" id="panchayat">
                            <!-- <select id="panchayat" name="panchayat">
                                <option value="">Select Ward</option>
                                <?php $count=0; foreach($data as $dataline){ ?> 
                                <option value="<?php echo $dataline->ward_no;?>"><?php echo $dataline->ward_no;?></option>
                                <?php } ?>
                        </select> -->
                        </div><!--form-->
                      </div><!--col-sm-6-->
                      <!-- <div class="col-sm-3"></div> -->
                    </div><!--row-->
                  </div>
              
                <div class="d-grid gap-2 col-6 mx-auto my-5">
                  <button class="btn btn-primary" type="submit" id="submitbranchDetails" name="submitbranchDetails">Submit</button>
                </div>
                </form>
              </div><!--form-->
            </div><!--card-body-->
          </div><!--card-->
        </div><!--col-md-8-->
      </div><!--row-->
    </div><!--container-fluid-->

 <?php require APPROOT . '/views/inc/executive/footer.php'; ?>
