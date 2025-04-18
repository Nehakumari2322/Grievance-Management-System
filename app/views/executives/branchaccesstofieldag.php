<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/executive/navbar.php'; ?>

<div id="main">    
  <div class="w3-container">
    <div class="wrapper">
        <div class="title text-center"><h2>BRANCH ACCESS TO FIELD AGENT</h2></div>
    
        <form action="<?php echo URLROOT; ?>executives/editFieldAgentDetails" method="post"> 
      
            <table class="table table-sm">  
                <div class="table-header text-center"><h4><?php echo $moreData['agent_name']?></h4></div>
                <input type="hidden" name="field_agent_id" value="<?php echo $moreData['field_agent_id']?>">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Field Agent Id</th>
                            <th scope="col">Branch Code</th>
                            <!-- <th scope="col">Branch Desc</th> -->
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count=0; foreach($additionalData as $dataline){ ?> 
                            
                        <tr>
                            <td><?php echo $dataline->field_agent_id;?></td>
                            <td><?php echo $dataline->branch_id;?></td>
                            <!-- <td><?php echo $dataline->branch_desc;?></td> -->
                            <input type="hidden" name="<?php echo 'field_agent_id'.$count;?>" value="<?php echo $dataline->field_agent_id;?>">
                            <input type="hidden" name="<?php echo 'branch_id'.$count;?>" value="<?php echo $dataline->branch_id;?>">

                            <td><button type="submit" name="<?php echo 'deletesite'.$count;?>" class="btn btn-danger btn-sm"><img src="<?php echo URLROOT.'/img/icons8-delete-24.png';?>" height="15px" alt=""></button></td>
                        </tr>
                        <?php $count++;} ?>
                        <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">           
                        <!-- <?php echo 'totalcount'.$count;?> -->
                    </tbody>
            </table>
                        </form>

            <form action="<?php echo URLROOT; ?>executives/getaccess" method="post"> 

            <input type="hidden" value="<?php echo $count;?>" name="totalcount" id="totalcount">          
            <input type="hidden" name="field_agent_id" value="<?php echo $moreData['field_agent_id']?>">
            <select multiple class="form-control" id="branch_id" name="branch_id[]" >
                <?php foreach($data as $dataline): ?>
                    <option value="<?php echo $dataline->branch_id ?>"><?php echo $dataline->branch_desc ?></option>
                <?php endforeach;?>
            </select>

            <div class="d-flex justify-content-center mt-3">
                <button type="submit" name="grantaccessbtn" class="btn btn-info ">Grant Access</button>
            </div>
        </form>
    </div><!-- WRAPPER-->
  </div><!-- W3-container-->
</div><!-- main-->
<?php require APPROOT . '/views/inc/executive/footer.php'; ?>
