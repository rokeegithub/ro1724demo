<?php
namespace App\Traits;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
trait paginatetool{
     /**
     * create pagination.Remove from cntroller using traits.
     */
    public function createPagination($MasterData,$id)
    {
        # code...
         //This would contain all data to be sent to the view
         $data = array();
         //Get current page form url e.g. &page=6
         $currentPage = LengthAwarePaginator::resolveCurrentPage();
         //Create a new Laravel collection from the array data
         $collection = new Collection($MasterData);
         //Define how many items we want to be visible in each page
         $per_page = 5;
         //Slice the collection to get the items to display in current page
         $currentPageResults = $collection->slice(($currentPage-1) * $per_page, $per_page)->all();
         //Create our paginator and add it to the data array
         $data['results'] = new LengthAwarePaginator($currentPageResults, count($collection), $per_page);
         //Set base url for pagination links to follow e.g custom/url?page=6
         $data['results']->setPath($id);
         //Set data content to return to calling function.
         $datacontent=$data['results'];

         return $datacontent;
    }

    
}