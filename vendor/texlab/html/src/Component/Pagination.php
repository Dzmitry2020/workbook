<?php

namespace TexLab\Html\Component;

use TexLab\Html\AbstractTag;

class Pagination extends AbstractTag
{
    /**
     * @var int
     */
    protected $pageCount = 1;
    /**
     * @var string
     */
    protected $urlPrefix = '';
    /**
     * @var string
     */
    protected $urlPageVariableName = 'page';
    /**
     * @var int
     */
    protected $currentPage = 1;
    /**
     * @var string
     */
    protected $currentPageCssClass = 'current';

    /**
     * @param string $urlPrefix
     * @return $this
     */
    public function setUrlPrefix(string $urlPrefix)
    {
        $this->urlPrefix = $urlPrefix;
        return $this;
    }

    /**
     * @param int $pageCount
     * @return $this
     */
    public function setPageCount(int $pageCount)
    {
        $this->pageCount = ($pageCount > 0) ? $pageCount : 1;
        return $this;
    }

    /**
     * @param int $pageCurrent
     * @return $this
     */
    public function setCurrentPage(int $pageCurrent)
    {
        $this->currentPage =
            ($pageCurrent <= 0) ? 1 : (($pageCurrent > $this->pageCount) ? $this->pageCount : $pageCurrent);

        return $this;
    }

    /**
     * @return string
     */
    public function html()
    {
        $str = "<div$this->class$this->style$this->id>\n";

        for ($i = 1; $i <= $this->pageCount; $i++) {
            $classCurrentPage = ($i == $this->currentPage) ? " class='$this->currentPageCssClass'" : '';
            $str .= "\t<a href='$this->urlPrefix&$this->urlPageVariableName=$i'$classCurrentPage>$i</a>\n";
        }

        $str .= "</div>";

        return $str;
    }
}
