<div class="novius_glossary">
    <?php

    if ($config['show-letter-list']) {
        echo \View::forge('novius_glossary::front/letters', array(
            'letters' => $letters,
            'letter'  => $letter,
            'config'  => $config,
        ));
    }

    if (!empty($items)) {
        echo \View::forge('novius_glossary::front/item-list', array(
            'items'  => $items,
            'config' => $config,
        ), false);

    }


    if ($numPages > 1) {
        echo \View::forge('novius_glossary::front/pagination', array(
            'page'     => $page,
            'count'    => $count,
            'letter'   => $letter,
            'numPages' => $numPages,
            'config'   => $config,
        ));
    }
    ?>
</div>