<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Cookie&family=Dancing+Script:wght@400..700&family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&family=Noticia+Text:ital,wght@0,400;0,700;1,400;1,700&family=Press+Start+2P&family=Yeseva+One&display=swap');
</style>
<div class="container-fluid">
    <h1 class="text-center mt-2" style="font-family: Noticia Text, serif;"><?php echo $additionalData['name']?> List Status <?php echo $additionalData['status']?></h1>
    <div class="row">
        <div class="col-sm-12">
            <div class="card mt-4" style="border:none">
                 <table class="table table-striped table-hover table-sm">
                <thead>
                    <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Case Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Description</th>
                    <th scope="col">Mobile</th>
                    <th scope="col"> Branch Id</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <form action="<?php echo URLROOT; ?>agents/updatecasestatus" method="post">
                    <?php $count=0; foreach($data as $dataline){ ?>
                    <tr>
                        <td ><?php echo  $count+1?></td>       
                        <td ><?php echo $dataline->case_id;?></td>
                        <td ><?php echo $dataline->name;?></td> 
                        <td ><?php echo $dataline->status_id;?>
                            
                        </td>
                        <td ><?php echo $dataline->description;?></td>
                        <td ><?php echo $dataline->contact_no;?></td>
                        <td ><?php echo $dataline->branch_id;?></td>
                        <input type="hidden" value="<?php echo $dataline->case_id;?>" name="<?php echo 'id'.$count;?>">
        
                        <td> 
                        <button class="btn" type="submit" name="<?php echo 'update'.$count;?>" id="<?php echo 'update'.$count;?>"  style="background:blue;color:white">view <img src="<?php echo URLROOT.'/img/icons8-sun-glasses-64.png';?>" height="30px"></button>
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