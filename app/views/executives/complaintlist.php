<?php require APPROOT . '/views/inc/executive/header.php'; ?>
<?php require APPROOT . '/views/inc/executive/navbar.php'; ?>
<form class="row gy-2 gx-3 align-items-center" action="<?php echo URLROOT; ?>executives/prioritydetails" method="post">

  <div class="card">
    <div class="card-body">
      <h5 class="card-title text-center">BRANCHWISE COMPLAINT DETAILS</h5>
        <div class="col-md-12">
            <div class=" bg-light rounded">
               <div class="table-responsive">
                  <table class="table table-sm table-striped table-hover" style="margin-bottom:0">
                     <thead>
                        <tr class="table-primary image-fluid">
                           <th scope="col">Branch Number</th>
                           <th scope="col">High</th>
                           <th scope="col">Medium</th>
                           <th scope="col">Low</th>
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
                           <td><button name="<?php echo 'highprioritybtn'.$i;?>" id="<?php echo 'highprioritybtn'.$i;?>" style="border:none;background:none"><span class="badge bg-danger"><?php echo $element2; ?></span></button></td>
                           <td><button name="<?php echo 'mediumprioritybtn'.$i;?>" id="mediumprioritybtn" style="border:none;background:none"><span class="badge bg-warning"><?php echo $element3; ?></span></td></button>
                           <td><button name="<?php echo 'lowprioritybtn'.$i;?>" id="lowprioritybtn" style="border:none;background:none"><span class="badge bg-info"><?php echo $element4; ?></span></td></button>
							      <td><button name="<?php echo 'totalprioritybtn'.$i;?>" id="totalprioritybtn" style="border:none;background:none"><span class="badge bg-secondary"><?php echo $element5;?></span></td></button>
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
