<?php require APPROOT . '/views/inc/executive/header.php'; ?>
<?php require APPROOT . '/views/inc/executive/navbar.php'; ?>
<style>
   body{
      background-color:#dcdcdc;
   }
</style>
<div class="container">
<form method="post" action="<?php echo URLROOT;?>executives/navform">

   <div class="row mt-5">
      <div class="col-sm-4">
         <div class="card">
            <div class="card-body">
               <div class="card-header text-center bold h4">Field Agent</div>
               <div class="row my-3">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-5">
                     <button class="btn btn-danger btn-sm" type="submit" id="<?php echo 'addfieldagentbtn';?>" name="<?php echo 'addfieldagentbtn'?>">+Field Agent</button><br>
                  </div>
                  <div class="col-sm-6">
                     <button class="btn btn-warning btn-sm" type="submit" id="<?php echo 'fieldagentlistbtn';?>" name="<?php echo 'fieldagentlistbtn'?>">Field Agent List</button><br>
                  </div>
               </div><!--row-->
            </div>
         </div>
      </div>
      <div class="col-sm-4">
         <div class="card">
            <div class="card-body">
            <div class="card-header text-center bold h4">Desk Agent</div>
               <div class="row my-3">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-5">
                     <button class="btn btn-danger btn-sm" type="submit" id="<?php echo 'adddeskagentbtn';?>" name="<?php echo 'adddeskagentbtn'?>">+Desk Agent</button><br>
                  </div>
                  <div class="col-sm-6">
                     <button class="btn btn-warning btn-sm" type="submit" id="<?php echo 'deskagentlistbtn';?>" name="<?php echo 'deskagentlistbtn'?>">Desk Agent List</button><br>
                  </div>
               </div><!--row-->
            </div>
         </div>
      </div>
      <div class="col-sm-4">
         <div class="card">
            <div class="card-body">
            <div class="card-header text-center bold h4">Reviewer</div>
               <div class="row my-3">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-4">
                     <button class="btn btn-danger btn-sm" type="submit" id="<?php echo 'addreviewerbtn';?>" name="<?php echo 'addreviewerbtn'?>">+Reviewer</button><br>
                  </div>
                  <div class="col-sm-6">
                     <button class="btn btn-warning btn-sm" type="submit" id="<?php echo 'reviewerlistbtn';?>" name="<?php echo 'reviewerlistbtn'?>">Reviewer List</button><br>
                  </div>
               </div><!--row-->
            </div>
         </div>
      </div>
   </div>

   <hr class="my-5">
   <div class="row mt-3">
      <div class="col-sm-4">
         <div class="card h-100">
            <div class="card-body">
               <div class="card-header text-center bold h4">List</div>
               <div class="row my-3">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-5">
                     <button class="btn btn-danger btn-sm" type="submit" id="<?php echo 'complaintlistbtn';?>" name="<?php echo 'complaintlistbtn'?>">Complaint</button><br>
                  </div>
                  <div class="col-sm-4">
                     <button class="btn btn-warning btn-sm" type="submit" id="<?php echo 'servicelistbtn';?>" name="<?php echo 'servicelistbtn'?>">Service</button><br>
                  </div>
               </div><!--row-->
            </div>
         </div>
      </div>
      <div class="col-sm-4">
         <div class="card h-100">
            <button type="submit" id="addbranch" name="addbranch" style="background:none;border:none;">
            <div class="card-body">
            <h3 class="text-center bold my-4">+Branch</h3>
            </div>
            </button>
         </div>
      </div>
      <div class="col-sm-4">
         <div class="card h-100">
            <button type="submit" id="branchbtn" name="branchbtn"  style="background:none;border:none;">
            <div class="card-body">
            <h3 class="text-center bold my-4"><img src="<?php echo URLROOT.'/img/search.png'?>" height="50px" alt="">Search</h3>
         </div>
         </button>
      </div>
   </div>
</form>
</div>


 <?php require APPROOT . '/views/inc/executive/footer.php'; ?>