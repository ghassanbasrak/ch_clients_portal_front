<?php
        helper('menu');
?>
<ul>
    <li class="logo">
        <div class="font-italic font-weight-bold" style="font-size: 28px; color: rgba(0, 0, 0, .5)">
            CognitHUB
        </div>
    </li>
    <li class="menu-toggle">
        <button onclick="toggleMenu();">&#9776;</button>
    </li>

    <?php foreach (admin_tabs() as $tab_name => $tab){ ?>
        <li class="menu-item hidden"><a href="<?php echo $tab ?>"><?php echo $tab_name ?></a></li>
    <?php } ?>
    <li class="menu-item hidden"><a href="<?php echo site_url('authentication/logout')?>">Logout</a></li>
</ul>