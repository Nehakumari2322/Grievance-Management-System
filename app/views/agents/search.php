<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<form action="<?php echo URLROOT; ?>agents/searchbymobileorcasesid" method="post">

<div class="container">
    <div class="row">
        <div class="col-sm-6" style="display:block;margin:auto">
            <div class="card mt-4 p-3">
                <h3 class="text-center">Search :</h3>
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="mobile" onclick="toggleInput(this)">
                            <label class="form-check-label" for="flexRadioDefault1">
                               By Mobile
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="case" onclick="toggleInput(this)" >
                            <label class="form-check-label" for="flexRadioDefault2">
                               By Case Id
                            </label>
                        </div>
                    </div>
                </div>
                <div class="m-3">
                    <input type="number" class="form-control" id="mobileInput" name="mobileInput" placeholder="Enter Number" aria-describedby="emailHelp">
                </div>
                <div class="m-3 ">
                    <input type="text" class="form-control" id="caseIdInput" name="caseIdInput" placeholder="Enter CaseId" aria-describedby="emailHelp" >
                   
                </div>
                <button type="submit" class="btn btn-primary" name="submit" id="submit" onclick="changeFormTarget(this)" >Submit</button>
            </div>
        </div>
    </div>
</div>
</form>
<script>
    function toggleInput(selectedRadio) {
        var mobileInput = document.getElementById("mobileInput");
        var caseIdInput = document.getElementById("caseIdInput");
        
        if (selectedRadio.id === "flexRadioDefault1") {
            mobileInput.disabled = false;
            caseIdInput.disabled = true;
            caseIdInput.value = ""; // Clear the value when hiding
        } else {
            mobileInput.disabled = true;
            mobileInput.value = ""; // Clear the value when hiding
            caseIdInput.disabled = false;
        }
    }
</script>

<script>
    function changeFormTarget(el) {
       el.form.setAttribute('target', '_blank')
    }
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>
