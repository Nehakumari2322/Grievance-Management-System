<?php require APPROOT . '/views/inc/executive/header.php'; ?>
<?php require APPROOT . '/views/inc/executive/navbar.php'; ?>
<style>
   body{
      background-color:#dcdcdc;
   }
</style>

<div class="container-fluid small">

  <div class="font-weight-bold h2 text-center mt-4">Cases</div>
   <form class="align-items-center" action="<?php echo URLROOT; ?>executives/getdashboard" method="post">

   <div class="row m-5">

      <div class="col-sm-6">
         <div class="card w3-hover-shadow h-100">
            <div class="card-body mt-4">
            <div class="text-center"><h3>Add Complaint</h3>
            </div><!--text-center-->
            </div><!--card-body--->
         </div><!--card-->
      </div><!--col-sm-6--> 
 

      <div class="col-sm-6">
         <div class="card w3-hover-shadow h-100">
            <div class="card-body">
               <div class="text-center"><h3>Complaints<span class="badge rounded-pill bg-secondary ">1</span></h3>
            <!-- <button style="background:none;border:none;" class="btn btn-primary btn-sm" type="submit" id="<?php echo 'showalldistriorder';?>" name="<?php echo 'showalldistriorder'?>"></button> -->
               <hr class="my-3">
                  <div class="row">
                     <div class="col-sm-4">
                     <button class="btn btn-success btn-sm" type="submit" id="<?php echo 'shownewstoreorder';?>" name="<?php echo 'shownewstoreorder'?>">New</button><br>
                     <p class="badge rounded-pill bg-secondary ">1</p>
                     </div>
                     <div class="col-sm-4">
                     <button class="btn btn-danger btn-sm" type="submit" id="<?php echo 'showpendingstoreorder';?>" name="<?php echo 'showpendingstoreorder'?>">Pending</button><br>
                     <p class="badge rounded-pill bg-secondary ">2</p>
                     </div>
                     <div class="col-sm-4">
                     <button class="btn btn-warning btn-sm" type="submit" id="<?php echo 'showshippedstoreorder';?>" name="<?php echo 'showshippedstoreorder'?>">Completed</button><br>
                     <p class="badge rounded-pill bg-secondary ">5</p>
                     </div>
                  </div><!--row-->
               </div><!--text-center-->
            </div><!--card-body--->
         </div><!--card-->
      </div><!--col-sm-6-->  
   </div><!--row m-5-->
          
   <div class="font-weight-bold h2 text-center mt-4">Priority</div>
   <div class="row m-5">
      <div class="col-sm-4">
         <div class="card w3-hover-shadow h-100">
            <div class="card-body">
            <div class="text" style="color:red;font-size:20px;"><h6>High Priority</h6>
            <p><b>230</b></p>
            </div><!--text-center-->
            </div><!--card-body--->
         </div><!--card-->
      </div><!--col-sm-6--> 
         
      <div class="col-sm-4">
         <div class="card w3-hover-shadow h-100">
            <div class="card-body">
            <div class="text" style="color:orange;font-size:20px;"><h6>Medium Priority</h6>
            <p ><b>230</b></p>
            </div><!--text-center-->
            </div><!--card-body--->
         </div><!--card-->
      </div><!--col-sm-6-->  

      <div class="col-sm-4">
         <div class="card w3-hover-shadow h-100">
            <div class="card-body">
            <div class="text" style="color:#ffbf00;font-size:20px;"><h6>Low Priority</h6>
            <p><b>230</b></p>
            </div><!--text-center-->
            </div><!--card-body--->
         </div><!--card-->
      </div><!--col-sm-6-->  
   </div><!--row m-5-->
</form>
  </div><!--card-->

<?php require APPROOT . '/views/inc/executive/footer.php'; ?>

 
