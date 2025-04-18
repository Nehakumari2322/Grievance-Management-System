<?php require APPROOT . '/views/inc/executive/header.php'; ?>
<?php require APPROOT . '/views/inc/executive/navbar.php'; ?>
<form class="row gy-2 gx-3 align-items-center" action="<?php echo URLROOT; ?>executives/servicedetails" method="post">

  <div class="card">
    <div class="card-body">
      <h5 class="card-title text-center">BRANCHWISE SERVICE DETAILS</h5>
        <div class="col-md-12">
            <div class=" bg-light rounded">
               <div class="table-responsive">
                  <table class="table table-sm table-striped table-hover" style="margin-bottom:0">
                     <thead>
                        <tr class="table-primary image-fluid">
                           <th scope="col">Branch Number</th>
                           <th scope="col">New</th>
                           <th scope="col">Pending</th>
                           <th scope="col">Completed</th>
                           <th scope="col">Total</th>
                        </tr>
                     </thead>
                     <tbody>

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
                           $element1 = $array1[$i]->branch_id;
                           $element2 = $array2[$i];
                           $element3 = $array3[$i];
                           $element4 = $array4[$i];
                           $element5 = $array5[$i];
                           ?>
                           <tr>
									<th scope="row"><?php echo  $element1;?></th>
                           <input type="hidden" value="<?php echo $element1;?>" name="<?php echo 'branch_id'.$i;?>">
                           <td><button name="<?php echo 'newservicebtn'.$i;?>" id="<?php echo 'newservicebtn'.$i;?>" style="border:none;background:none"><span class="badge bg-danger"><?php echo $element2; ?></span></button></td>
                           <td><button name="<?php echo 'pendingservicebtn'.$i;?>" id="pendingservicebtn" style="border:none;background:none"><span class="badge bg-warning"><?php echo $element3; ?></span></td></button>
                           <td><button name="<?php echo 'completedservicebtn'.$i;?>" id="completedservicebtn" style="border:none;background:none"><span class="badge bg-info"><?php echo $element4; ?></span></td></button>
							      <td><button name="<?php echo 'totalservicebtn'.$i;?>" id="totalservicebtn" style="border:none;background:none"><span class="badge bg-secondary"><?php echo $element5;?></span></td></button>
                        </tr>
                       <?php }
                     }
                     ?>
                     <input type="hidden" value="<?php echo $i;?>" name="totalcount" id="totalcount">           
                     <!-- <?php echo 'tttotalcount'.$i;?>  -->
                     </tbody>
                  </table>
               </div>    
            </div>
        </div>

    </div>
  </div>
</form>


<?php require APPROOT . '/views/inc/executive/footer.php'; ?>
