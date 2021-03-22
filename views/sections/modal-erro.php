<?php
if ($errors) :
    ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
    <?php
    foreach ($errors as $key => $value) :
        ?>
          <p><?=$value ?></p>
        <?php
    endforeach;
    ?>

</div>
    <?php
endif;
?>

