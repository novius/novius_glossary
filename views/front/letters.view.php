<?php
if (empty($letters)) {
    return '';
}
?>
<ul class="letters">
    <?php
    foreach ($letters as $iletter) {
        $url   = \Nos\Tools_Enhancer::url('novius_glossary', array('letter' => $iletter));
        $class = '';
        if ($iletter == $letter) {
            $url   = null;
            $class = 'active';
        }
        ?>
        <li class="<?= $class ?>">

            <?php
            if (!empty($url)) {
            ?>
            <a href="<?= $url ?>">
                <?php
                }
                ?>
                <?= $iletter ?>
                <?php
                if (!empty($url)) {
                ?>
            </a>
        <?php
        }
        ?>
        </li>
    <?php
    }
    ?>
</ul>