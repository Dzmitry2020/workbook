<?php


namespace Model;


trait PaginationTrait
{
    protected $pageSize;

    /**
     * @param mixed $pageSize
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
        return $this;
    }

    /**
     * @param $pageNumber
     * @return mixed
     */
    public function getPage($pageNumber)
    {
        $this->setLimit((($pageNumber - 1) * $this->pageSize) . ", $this->pageSize");
        return $this->get();
    }

    public function getPageCount()
    {
        $rowCount = $this->clear()->setSelect("Count(*) as c")->get()[0]['c'];
        return ceil($rowCount / $this->pageSize);
    }
}