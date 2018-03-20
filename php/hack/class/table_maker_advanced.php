

<?php
foreach ($doc_data as $item) {

    if ($item['result'] == "true") {
        ?>
        <tr>
            <td scope="row"><?php echo $item['data_of']; ?></td>
            <td><?php if($item['file_name']=="null" and $item['status'] == "upload"){
                    ?>
                    <a href="./upload_doc">UPLOAD DOC</a>
                    <?php
                }
                else{
                    echo $item['file_name']."||".$item['link'];
                    ?>
                    <?php
                }

                ?></td>
            <?php
            if ($item['status'] == 'true') {

                ?>
                <td class="text-success">Verified <i class="fa fa-check-circle"></i></td>
            <?php }
            else if($item['status'] == 'false'){ ?>
                <td class="text-danger">Failed <i class="fa fa-times-circle"></i></td>
                <?php
            }

            else {
                ?>
                <td class="text-danger">Please Upload! <i class="fa fa-upload" aria-hidden="true"></i></td>
            <?php } ?>
        </tr>
        <?php
    }
}
?>
