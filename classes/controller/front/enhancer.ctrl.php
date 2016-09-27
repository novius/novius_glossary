<?php

namespace Novius\Glossary;

use Fuel\Core\DB;

class Controller_Front_Enhancer extends \Enhancer\Controller_Front_Application_Enhancer
{
    protected static $_routes = array(
        '/'              => 'home',
        '/:page'         => 'home',
        '/:letter'       => 'home',
        '/:letter/:page' => 'home',
    );

    protected static $_params = array(
        'page'   => array('match' => 'is_numeric'),
        'letter' => array('match' => 'is_string'),
    );

    protected function getLetters()
    {
        $numSymbol    = \Arr::get($this->config, 'numeric-symbol');
        $lettersQuery = DB::select(
            array(
                \DB::expr('LOWER(SUBSTR('.Model_Word::title_property().',1,1)) collate utf8_general_ci '), 'initial'
            )

        )
            ->from(Model_Word::table())
            ->group_by('initial')
            ->order_by('initial', 'asc')
            ->execute();
        $letters      = array();
        foreach ($lettersQuery as $let) {
            $let['initial'] = iconv('UTF-8', 'ASCII//TRANSLIT', $let['initial']);
            if (!preg_match('/[a-z]/i', $let['initial'])) {
                $let['initial'] = $numSymbol;
            }
            if (in_array($let['initial'], $letters)) {
                continue;
            }
            $letters[] = $let['initial'];
        }
        return $letters;
    }

    public function action_home()
    {
        $config    = $this->config;
        $limit     = \Arr::get($this->config, 'limit');
        $numSymbol = \Arr::get($this->config, 'numeric-symbol');
        $page      = $this->routeParam('page') ? : 1;
        $letter    = $this->routeParam('letter');

        $letters = $this->getLetters();
        $items   = Model_Word::query()
            ->where('published', 1)
            ->order_by(Model_Word::title_property());

        if (!empty($letter)) {
            if ($letter === $numSymbol) {
                $checkLetter = array_map('strval', range(0, 9));
                $items->where(
                    \DB::expr('LOWER(SUBSTR('.Model_Word::title_property().',1,1))'), 'NOT', \DB::expr("REGEXP '[a-z]|[:space:]'")
                );
            } else {
                $items->where(
                    \DB::expr('LOWER(SUBSTR('.Model_Word::title_property().',1,1))'), $letter
                );
            }
        }

        $countTotal = $items->count();
        if ($limit) {
            $offset = ($page - 1) * $limit;
            $items->rows_limit($limit)->rows_offset($offset);
        }


        $numPage = ceil($countTotal / $limit);
        $items   = $items->get();

        return \View::forge('novius_glossary::front/list', array(
            'letters'  => $letters,
            'numPages' => $numPage,
            'items'    => $items,
            'count'    => $countTotal,
            'page'     => $page,
            'letter'   => $letter,
            'config'   => $config,
        ), false);
    }


}
