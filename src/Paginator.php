<?php
/**
 * The MIT License (MIT)
 * Copyright (c) 2018 Serhii Popov
 * This source file is subject to The MIT License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/MIT
 *
 * @category Popov
 * @package Popov_Paginator
 * @author Serhii Popov <popow.serhii@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Popov\Paginator;

class Paginator
{
    /**
     * General number of items
     *
     * @var int
     */
    protected $total;

    /**
     * Number of items per page
     *
     * @var int
     */
    protected $perPage = 36;

    /**
     * Current page
     *
     * @var int
     */
    protected $currentPage = 1;

    public function __construct(int $total = null, int $perPage = null)
    {
        $this->total = $total;
        $this->perPage = $perPage;
    }

    public function getNumberPages()
    {
        $numberPages = 1;
        if ($this->total > $this->perPage) {
            $numberPages = ceil($this->total / $this->perPage);
        }

        return $numberPages;
    }

    public function setCurrentPage($page)
    {
        $this->currentPage = $page;

        return $this;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    public function hasNextPage()
    {
        $currentPage = $this->getCurrentPage();
        $numberPages = $this->getNumberPages();

        return $currentPage < $numberPages;
    }

    public function getNextPage()
    {
        return $this->hasNextPage() ? ++$this->currentPage : false;
    }

    /**
     * Advance the internal pointer to next page and return current
     *
     * @return int
     */
    public function advanceNextPage()
    {
        $current = $this->currentPage;
        $this->hasNextPage() ? $this->currentPage++ : false;

        return $current;
    }

    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;

        return $this;
    }

    public function getPerPage()
    {
        return $this->perPage;
    }
}