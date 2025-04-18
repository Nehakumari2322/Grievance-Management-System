<?php require APPROOT . '/views/inc/executive/header.php'; ?>
<?php require APPROOT . '/views/inc/executive/navbar.php'; ?>

<?php if($data['message']){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom:0;margin-top:0">
        <?php echo $data['message'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>

<div class="container-fluid">
    <div class="card-body">
        <div class="card">
            <div class="card-header font-weight-bold h5 text-center text-light" style="background-color:#BA0000">
                    Search Complaints by Branch 
            </div>
            <div class="card-body">
            <form class="row gy-2 gx-3 align-items-center" action="<?php echo URLROOT; ?>executives/searchwardDetails" method="post">
                <div class="row"><!--row1--->
                    <label for="Branch" class="text-center">Branch Code</label>
                    <div class="col text-center">
                        <input type="number" name="branch_id" id="branch_id">&nbsp;&nbsp;<button type="submit" class="btn btn-primary btn-sm rounded text-center" name="showDetailsbtn" id="showDetailsbtn"><img src="<?php echo URLROOT.'/img/icons8-search-50.png';?>" alt="se" height="20px" ></button>
                    </div>
                </div><!--row1--->
            </form>
            </div>
        </div>
    </div>

    <div class="card-body">
    <form action="<?php echo URLROOT; ?>executives/editcasedetails" method="post">
        <div class="card mt-3">
            <div class="card-header font-weight-bold h5 text-center text-light" style="background-color:#BA0000">
            Complaints Lists
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-borderless">
                        <thead>
                            <tr class="bg-primary text-white text-center">
                                <th scope="col">SN</th>
                                <th scope="col">Branch</th>
                                <th scope="col">Case Id</th>
                                <th scope="col">Category</th>
                                <th scope="col">Subcategory</th>
                                <th scope="col">Status</th>
                                <th scope="col">Case Priority</th>
                                <th scope="col">Ward No</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php $count = 0; foreach($data as $datarow):?>
                        <tbody>
                            <tr class="<?php echo ($count%2)? 'bg-white':'bg-light';?> text-center">
                                <th scope="row"><?php echo $count+1?></th>
                                <td><?php echo $datarow->branch_id;?></td>
                                <td><?php echo $datarow->case_id;?></td>
                                <td><?php echo $datarow->category_id;?></td>
                                <td><?php echo $datarow->subcategory_id;?></td>
                                <!-- <td><?php echo $datarow->description;?></td> -->
                                <td><?php echo $datarow->status_id;?></td>
                                <td><?php echo $datarow->case_priority;?></td>
                                <td><?php echo $datarow->ward_no;?></td>
                                <td>                          
                                    <input type="hidden" name="<?php echo 'case_id'.$count;?>" value="<?php echo $datarow->case_id;?>">
                                        <button type="submit" class="btn btn-primary btn-sm" id="<?php echo 'editcasedetailsbtn'.$count;?>" name="<?php echo 'editcasedetailsbtn'.$count;?>"><img src="<?php echo URLROOT.'/img/icons8-pencil-24.png';?>" alt=""></button>
                                    
                                </td>
                            </tr>
                        </tbody>
                        <?php $count++; endforeach; ?>
                        <input type="hidden" name="totalcount" value="<?php echo $count;?>">
                    </table>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>

<?php require APPROOT . '/views/inc/executive/footer.php'; ?>
