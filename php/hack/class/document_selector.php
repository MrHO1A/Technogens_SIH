<?php
// Will Generate Select Document For Forms
// And Will Get Data From RESTapi
//Getting Details For label Of Select
// will recive CSV name an paramaters
function doc_names($names){
    //Getting UID From Session
    $uid = $_SESSION['uid'];
    //End
    $names_label = explode(',',$names);
    //Getting File Names From OTP class
    include_once "otp_verif_fun.php";
    $otp_c = new otp_verif_fun();
    $data = $otp_c->get_document_list($uid);
    //End
    foreach ($names_label as $label){?>
        <div class="form-group">
            <label> <?php echo strtoupper($label); ?> </label>
            <select class="form-control" name="<?php echo $label; ?>">
                <option selected value="nill">Default</option>
            <?php
            //For File List
            foreach ($data as $value){
                ?>
                <option value="<?php echo $value; ?>"> <?php echo $value; ?> </option>
                <?php


            }
            ?>
            </select>
        </div>
<?php
    }
}
?>



