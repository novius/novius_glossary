<?php

$curLetter = null;

/** @var \Novius\Glossary\Model_Word[] $items */
foreach ($items as $item) {

$letter = \Str::lower(\Str::sub($item->title_item(), 0, 1));

if ($letter != $curLetter) {
if ($curLetter !== null) {
    ?>
    </section>
<?php
}
$curLetter = $letter;
?>
<hgroup>
    <?= $letter ?>
</hgroup>
<section class="block">
    <?php
    }

    echo \View::forge('novius_glossary::front/item', array(
        'item'   => $item,
        'config' => $config,
    ), false);
    ?>
    <?php

    }
    ?>
</section>
