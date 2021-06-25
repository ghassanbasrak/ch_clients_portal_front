
<div class="heroe">

    <?php
    $session = \Config\Services::session();
    if($session->getFlashdata('success')){ ?>
        <div class="alert alert-success" role="alert">
            <?php echo $session->getFlashdata('success') ?>
        </div>
    <?php } ?>

    <?php if($session->getFlashdata('danger')){ ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $session->getFlashdata('danger') ?>
        </div>
    <?php } ?>


    <?php if(isset($title)){ ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><?php echo $title ?></li>
        </ol>
    </nav>

    <?php } ?>

</div>