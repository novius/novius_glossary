<div class="pagination">
    <?php

    echo $count.' '.__('words');

    $enhancerParams = array();

    if (!empty($letter)) {
        $enhancerParams['letter'] = $letter;
    }

    ?>

    <ul class="links">
        <?php
        for ($i = 1; $i <= $numPages; $i++) {
            $enhancerParams['page'] = $i;
            $url                    = \Nos\Tools_Enhancer::url('novius_glossary', $enhancerParams);
            $class                  = '';
            if ($i == $page) {
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
                    <?= $i ?>
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
</div>