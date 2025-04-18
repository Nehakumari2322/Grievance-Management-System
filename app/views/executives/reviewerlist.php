<?php require APPROOT . '/views/inc/executive/header.php'; ?>
<?php require APPROOT . '/views/inc/executive/navbar.php'; ?>
<form class="row gy-2 gx-3 align-items-center" action="<?php echo URLROOT; ?>executives/editreviewerdetails" method="post">

<?php if($additionalData['message'] == 'ReviewerUpdated'){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! Agent Data Inserted Successfully !! </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
        </div>
   <?php } elseif ($additionalData['message'] == 'FailToUpdateReviewer') { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed to Insert Data, Try Again Later !! </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
         </div>
    <?php }; ?>  

<div class="card">
    <div class="card-body">
      <h5 class="card-title text-center">Reviewer</h5>
      <div class="table-responsive">
        <table class="table table-striped table-hover table-sm" >
          <thead>
            <tr class="bg-primary text-white text-center">
              <th scope="col">#</th>
              <th scope="col">Login Id</th>
              <th scope="col">Name</th>
              <th scope="col">Password</th>
              <th scope="col">State</th>
              <th scope="col">City</th>
              <th scope="col">Pincode</th>
              <th scope="col">Contact No</th>
              <th>Action</th>

            </tr>
          </thead>
            <?php $count=0; foreach($data as $dataline){ { echo '<tr>'; ?>
              <tr>
                <th scope="row"><?php echo $count+1;?></th>
                <td><?php echo $dataline->login_id;?></td>
                <td><?php echo $dataline->reviewer_name;?></td>
                <td><?php echo $dataline->password;?></td>
                <td><?php echo $dataline->state;?></td>
                <td><?php echo $dataline->city;?></td>
                <td><?php echo $dataline->pincode;?></td>
                <td><?php echo $dataline->contact_no;?></td>
                <input type="hidden" value="<?php echo $dataline->reviewer_id;?>" name="<?php echo 'reviewer_id'.$count;?>">
                <td><button type="submit" class="btn btn-primary btn-sm" id="<?php echo 'editreviewerdetailsbtn'.$count;?>" name="<?php echo 'editreviewerdetailsbtn'.$count;?>"><img src="<?php echo URLROOT.'/img/icons8-pencil-24.png';?>" height="15px" alt=""></button>
                <!-- <button type="submit" class="btn btn-success btn-sm" id="<?php echo 'branchaccessbtn'.$count;?>" name="<?php echo 'branchaccessbtn'.$count;?>">Add Branch</button></td> -->


              <?php echo '</tr>';}
                $count++;} ?>
              <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">           
              <!-- <?php echo 'tttotalcount'.$count;?>  -->
        </table>
      </div>
    </div>
  </div>
</form>


<?php require APPROOT . '/views/inc/footer.php'; ?>
