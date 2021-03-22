<?php
if ($error) :
    ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <p><?=$error ?></p>
</div>
    <?php
endif;

if ($errors) :
    ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
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
