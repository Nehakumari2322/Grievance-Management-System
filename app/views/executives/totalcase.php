<?php require APPROOT . '/views/inc/executive/header.php'; ?>
<?php require APPROOT . '/views/inc/executive/navbar.php'; ?>


<div class="container-fluid">
    <div class="card-body">
    <form action="<?php echo URLROOT; ?>executives/editcasedetails" method="post">
        <div class="card mt-3">
            <div class="card-header font-weight-bold h5 text-center">
            Complaints Lists
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-borderless">
                        <thead>
                            <tr class="bg-primary text-white text-center">
                                <th scope="col">SN</th>
                                <th scope="col">Case Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Subcategory</th>
                                <th scope="col">Status</th>
                                <th scope="col">Case Priority</th>
                                <th scope="col">Ward No</th>
                                <!-- <th scope="col">Action</th> -->
                            </tr>
                        </thead>
                        <?php $count = 0; foreach($data as $datarow):?>
                        <tbody>
                            <tr class="<?php echo ($count%2)? 'bg-white':'bg-light';?> text-center">
                                <th scope="row"><?php echo $count+1?></th>
                                <td><?php echo $datarow->case_id;?></td>
                                <td><?php echo $datarow->name;?></td>
                                <td><?php echo $datarow->category_desc;?></td>
                                <td><?php echo $datarow->subcategory_desc;?></td>
                                <!-- <td><?php echo $datarow->description;?></td> -->
                                <td><?php echo $datarow->status_id;?></td>
                                <td><?php echo $datarow->case_priority;?></td>
                                <td><?php echo $datarow->ward_no;?></td>
                                <!-- <td>                          
                                    <input type="hidden" name="<?php echo 'case_id'.$count;?>" value="<?php echo $datarow->case_id;?>">
                                        <button type="submit" class="btn btn-primary btn-sm" id="<?php echo 'editcasedetailsbtn'.$count;?>" name="<?php echo 'editcasedetailsbtn'.$count;?>"><img src="<?php echo URLROOT.'/img/icons8-pencil-24.png';?>" alt=""></button>
                                    
                                </td> -->
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
