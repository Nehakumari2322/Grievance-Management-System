<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/revienavbar.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card mt-4" style="border:none">
                 <table class="table table-striped table-hover table-sm">
                <thead>
                    <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Service Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Serivces</th>
                    <th scope="col">Mobile</th>
                    <th scope="col"> Ward</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <form action="<?php echo URLROOT; ?>reviewers/updateservicestatus" method="post">
                    <?php $count=0; foreach($data as $dataline){ ?>
                    <tr>
                        <td ><?php echo  $count+1?></td>       
                        <td ><?php echo $dataline->service_id;?></td>
                        <td ><?php echo $dataline->name;?></td> 
                        <td >
                            <select name="<?php echo 'status'.$count;?>" id="<?php echo 'status'.$count;?>" class="form-control " style="margin-top:0">
                                <option value="<?php echo $dataline->status;?>"><?php echo $dataline->status;?></option>
                                <option value="New" >New</option>
                                <option value="Pending">Pending</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </td>
                        <td ><?php echo $dataline->services;?></td>
                        <td ><?php echo $dataline->mobile;?></td>
                        <td ><?php echo $dataline->ward;?></td>
                        <input type="hidden" value="<?php echo $dataline->service_id;?>" name="<?php echo 'id'.$count;?>">
        
                        <td> 
                        <button class="btn" type="submit" name="<?php echo 'update'.$count;?>" id="<?php echo 'update'.$count;?>" style="background:red;color:white">Update</button>
                        </td>
                    </tr>
                    <?php  $count++;} ?>
                    <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">
                    </form>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

 
<?php require APPROOT . '/views/inc/footer.php'; ?>