<?php
foreach ($doc_data as $item) {

    if ($item['result'] == "true") {
        ?>
        <tr>
            <td scope="row"><?php echo $item['data_of']; ?></td>
            <td><?php if($item['file']==""){
                    ?>
                    <a href="./adhaar">Go For Document Verification</a>
                    <?php
                }
                else{
                    echo $item['file'];
                    ?>
                    <?php
                }

                ?></td>
            <?php
            if ($item['status'] == 'verified') {

                ?>
                <td class="text-success">Verified <i class="fa fa-check-circle"></i></td>
            <?php } else {

                ?>
                <td class="text-danger">Failed <i class="fa fa-times-circle"></i></td>
            <?php } ?>
        </tr>
        <?php
    }
}
?>