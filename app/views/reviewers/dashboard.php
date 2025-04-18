<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/revienavbar.php'; ?>
<style>
   body{
      background-color:#dcdcdc;
   }
</style>
<?php if($content['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom:0;margin-top:0">
        <?php echo $content['message'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>
<div class="container-fluid small">

  <div class="font-weight-bold h2 text-center mt-4">Reviewer</div>
  <form action="<?php echo URLROOT; ?>reviewers/agentsaccess" method="post">

   <div class="row m-5">
      <div class="col-sm-3"></div>
      <div class="col-sm-3">
         <div class="card w3-hover-shadow h-100">
            <div class="card-body text-center">
                <button class="btn" name="cases" id="cases" type="submit">
                <h2 style="display:block;margin:auto"><img src="<?php echo URLROOT.'/img/add.png';?>" alt=""> Cases</h2>
                </button>
            </div><!--card-body--->
         </div><!--card-->
      </div><!--col-sm-6--> 
      <div class="col-sm-3">
         <div class="card w3-hover-shadow h-100">
            <div class="card-body text-center">
                <button class="btn" name="request" id="request" type="submit">
                <h2 style="display:block;margin:auto"><img src="<?php echo URLROOT.'/img/add.png';?>" alt=""> Services</h2>
                </button>
            </div><!--card-body--->
         </div><!--card-->
      </div><!--col-sm-6--> 
      <div class="col-sm-3"></div>
   </div>
 
   <div class="row m-5">
      <div class="col-sm-12">
         <div class="card w3-hover-shadow h-100">
            <div class="card-body">
               <div class="text-center"><h3>Cases<span class="badge rounded-pill bg-secondary "><?php echo $data['total'];?></span></h3>
               <hr class="my-3">
                  <div class="row">
                     <div class="col-sm-4">
                        <div class="card p-2 w3-hover-shadow" >
                           <button class="btn btn-warning btn-sm" type="submit" style="width:50px;display:block;margin:auto" id="new" name="new">New </button> <span class="badge rounded-pill bg-secondary " style="width:20px;display:block;margin:auto"><?php echo $data['new'];?></span>
                           <div class="row">
                              <div class="col-sm-4">
                              <button class="btn" type="submit" style="color:red;font-size:20px;" id="newhigher" name="newhigher"><h6>High </h6> </button><br>
                              <span class="badge rounded-pill bg-secondary "><?php echo $data['newhigher'];?></span>
                              </div>
                              <div class="col-sm-4">
                              <button class="btn" type="submit" style="color:orange;font-size:20px;" id="newmedium" name="newmedium" ><h6>Medium </h6> </button><br>
                              <span class="badge rounded-pill bg-secondary "><?php echo $data['newmedium'];?></span>
                              </div>
                              <div class="col-sm-4">
                              <button class="btn" type="submit" style="color:#ffbf00;font-size:20px;" id="newlow" name="newlow"><h6>Low </h6> </button><br>
                              <span class="badge rounded-pill bg-secondary "><?php echo $data['newlow'];?></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="card p-2 w3-hover-shadow" >
                           <button class="btn btn-danger btn-sm" style="width:100px;display:block;margin:auto" type="submit" id="pending" name="pending">Pending</button>
                           <span class="badge rounded-pill bg-secondary " style="width:20px;display:block;margin:auto"><?php echo $data['pending'];?></span>
                           <div class="row">
                              <div class="col-sm-4">
                              <button class="btn" type="submit" style="color:red;font-size:20px;" id="pendinghigher" name="pendinghigher"><h6>High </h6> </button><br>
                              <span class="badge rounded-pill bg-secondary "><?php echo $data['pendinghigher'];?></span>
                              </div>
                              <div class="col-sm-4">
                              <button class="btn" type="submit" style="color:orange;font-size:20px;" id="pendingmedium" name="pendingmedium" ><h6>Medium </h6> </button><br>
                              <span class="badge rounded-pill bg-secondary "><?php echo $data['pendingmedium'];?></span>
                              </div>
                              <div class="col-sm-4">
                              <button class="btn" type="submit" style="color:#ffbf00;font-size:20px;" id="pendinglow"  name="pendinglow"> <h6>Low </h6> </button><br>
                              <span class="badge rounded-pill bg-secondary "><?php echo $data['pendinglow'];?></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                     <div class="col-sm-4">
                        <div class="card p-2 w3-hover-shadow" >
                           <button class="btn btn-success btn-sm" style="width:100px;display:block;margin:auto" type="submit" id="completed" name="completed">Completed</button>
                           <span class="badge rounded-pill bg-secondary" style="width:20px;display:block;margin:auto"><?php echo $data['completed'];?></span>
                           <div class="row">
                              <div class="col-sm-4">
                              <button class="btn" type="submit" style="color:red;font-size:20px;" id="completedhigher"  name="completedhigher"> <h6>High </h6> </button><br>
                              <span class="badge rounded-pill bg-secondary "><?php echo $data['completedhigher'];?></span>
                              </div>
                              <div class="col-sm-4">
                              <button class="btn" type="submit" style="color:orange;font-size:20px;" id="completedmedium" name="completedmedium" ><h6>Medium </h6> </button><br>
                              <span class="badge rounded-pill bg-secondary "><?php echo $data['completedmedium'];?></span>
                              </div>
                              <div class="col-sm-4">
                              <button class="btn" type="submit" style="color:#ffbf00;font-size:20px;" id="completedlow" name="completedlow"><h6>Low </h6> </button><br>
                              <span class="badge rounded-pill bg-secondary "><?php echo $data['completedlow'];?></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div><!--row-->
               </div><!--text-center-->
            </div><!--card-body--->
         </div><!--card-->
      </div><!--col-sm-6-->  
   </div><!--row m-5-->

   <div class="row m-5">
      <div class="col-sm-6">
         <div class="card w3-hover-shadow h-100">
            <div class="card-body text-center">
                <!-- <button class="btn" name="cases" id="cases" type="submit"> -->
                  
                <h2 style="display:block;margin:auto"> Serivces Request</h2>
                <div class="row mt-4">
                  <div class="col-sm-4">
                     <div class="card" style="border:none">
                        <button class="btn btn-warning btn-sm" style="width:100px;display:block;margin:auto" type="submit" id="servicenew" name="servicenew">New</button>
                        <span class="badge rounded-pill bg-secondary " style="width:20px;display:block;margin:auto"><?php echo $line['new'];?></span>
                     </div>
                  </div>
                  <div class="col-sm-4" >
                     <div class="card" style="border:none">
                        <button class="btn btn-danger btn-sm" style="width:100px;display:block;margin:auto" type="submit" id="servicepending" name="servicepending">Pending</button>
                        <span class="badge rounded-pill bg-secondary " style="width:20px;display:block;margin:auto"><?php echo $line['pending'];?></span>
                     </div>
                  </div>
                  <div class="col-sm-4" >
                     <div class="card" style="border:none">
                        <button class="btn btn-success btn-sm" style="width:100px;display:block;margin:auto" type="submit" id="servicecompleted" name="servicecompleted">Completed</button>
                        <span class="badge rounded-pill bg-secondary " style="width:20px;display:block;margin:auto"><?php echo $line['completed'];?></span>
                     </div>
                  </div>
                </div>
                <!-- </button> -->
            </div><!--card-body--->
         </div><!--card-->
      </div><!--col-sm-6--> 
      <div class="col-sm-6">
         <div class="card w3-hover-shadow h-100">
            <div class="card-body text-center">
                <button class="btn" name="search" id="search" type="submit">
                     <h2 style="display:block;margin:auto">Search</h2>
               </button>
            </div>
         </div> 
      </div>     
   </div>
</form> 
<form action="<?php echo URLROOT; ?>reviewers/listofsubcategory" method="post">       
   <div class="font-weight-bold h2 text-center mt-4">Case Summary</div>
      <div class="row m-5">
      
         <div class="col-md-12">
            <div class=" bg-light rounded">
               <div class="table-responsive">
                  <table class="table table-sm table-striped table-hover" style="margin-bottom:0">
                     <thead>
                        <tr class="table-success image-fluid">
                           <th scope="col">Complain Type</th>
                           <th scope="col">New Case</th>
                           <th scope="col">Pending</th>
                           <th scope="col">Complete</th>
                           <th scope="col">Total</th>
                        </tr>
                     </thead>
                     <tbody>

                     <!-- another method -->
                     <?php
                     $array1 = $additionalData;
                     $array2 = $moreData;
                     $array3 = $newData;
                     $array4 = $result;
                     $array5 = $store;
                     // print_r($array4);
                     if (count($array1) === count($array2)){
                        // Get the length of the arrays
                        $length = count($array1);
                        for ($i = 0; $i < $length; $i++) {
                           // Access corresponding elements from each array
                           $element1 = $array1[$i]->subcategory_desc;
                           $element2 = $array2[$i];
                           $element3 = $array3[$i];
                           $element4 = $array4[$i];
                           $element5 = $array5[$i];
                           $element6 = $array1[$i]->subcategory_id;
                           ?>
                           <tr>
									<th scope="row"><?php echo  $element1;?></th>
                           <input type="hidden" value="<?php echo $element6;?>" name="<?php echo 'subcategoryId'.$i;?>">
                           <td><button name="<?php echo 'newstatus'.$i;?>" id="<?php echo 'newstatus'.$i;?>" style="border:none;background:none"><span class="badge rounded-pill " style="width:20px;background:blue"><?php echo  $element2;?></span></button></td>
                           <td><button name="<?php echo 'pendingstatus'.$i;?>" id="<?php echo 'pendingstatus'.$i;?>" style="border:none;background:none"><span class="badge rounded-pill " style="width:20px;background:red"> <?php echo  $element3; ?></span></button></td>
                           <td><button name="<?php echo 'completedstatus'.$i;?>" id="<?php echo 'completedstatus'.$i;?>" style="border:none;background:none"><span class="badge rounded-pill " style="width:20px;background:green"><?php echo  $element4; ?></span></button></td>
							      <td><button name="<?php echo 'totalstatus'.$i;?>" id="<?php echo 'totalstatus'.$i;?>" style="border:none;background:none"><span class="badge rounded-pill " style="width:20px;background:gray"><?php echo  $element5; ?></span></button></td>
                           </tr>
                       <?php }
                     }
                     ?>
                      <input type="hidden" value="<?php echo $i;?>" name="totalcount" id="totalcount">           
                     <!-- <?php echo 'tttotalcount'.$i;?>  -->
                     <!-- another method -->
                     
                     </tbody>
                  </table>
               </div>    
            </div>
        </div>
      </div>
</form>


  </div><!--card-->

<?php require APPROOT . '/views/inc/footer.php'; ?>

