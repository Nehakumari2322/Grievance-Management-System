<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<form action="<?php echo URLROOT; ?>agents/casesreport" method="post">
    <div class="container pt-5" >
        <div class="card" style="box-shadow: 0px 8px 32px 0px rgb(104, 149, 210);">
            <div class="col-sm-12">
            <p class="card-text text-center fs-1 fw-bold" style="color: #6895D2;">Complain Here!!</p>
            <div class="row g-3 px-5">
               <input type="hidden" value="<?php echo $data->case_id?>" name="caseid" id="caseid" />
                <div class="col-md-6">
                  <label for="inputAddress" class="form-label">Type of Complains</label>
                    <select  name="category" id="category" class="form-select">
                        <option value="">Please select the complain type</option>
                        <?php $count=0; foreach($additionalData as $dataline){ ?> 
                           <option value="<?php echo $dataline->category_id;?>"><?php echo $dataline->category_desc;?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputAddress" class="form-label">Personal/Social Complains</label>
                    <select  name="subcategory" id="subcategory" class="form-select">
                        <option value="">Please select the complain sub type</option>
                        <?php $count=0; foreach($moreData as $dataline){ ?> 
                           <option value="<?php echo $dataline->subcategory_id ;?>"><?php echo $dataline->subcategory_desc;?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Description</label>
                    <textarea type="textArea" class="form-control" id="desc" name="desc"></textarea>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Cases Priority:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="priority" id="Higher" value="Higher">
                            <label class="form-check-label" for="male">Higher</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="priority" id="Medium"  value="Medium">
                            <label class="form-check-label" for="female">Medium</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="priority" id="low" value="low">
                            <label class="form-check-label" for="other">low</label>
                        </div>
                    </div>

                </div>
                
                <div class="col-12 mb-5">
                  <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    // Load district options on page load
    $.ajax({
        url: 'Agent/getAllCategory',
        success: function(adata) {
            $('#category').html(data);
            
        }
    });
    $('#course_id').change(function() {
        var selectedcategory = $(this).val();
        $.ajax({
            url: 'get_police_stations.php',
            method: 'POST',
            data: { category: selectedcategory },
            success: function(data) {
                $('#subcategory').html(data);
            }
        });
    });

});
</script>

 
<?php require APPROOT . '/views/inc/footer.php'; ?>