<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Advservice;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Class RelationController
 * @package App\Http\Controllers
 */
class RelationController extends Controller
{
    /**
     *  @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function get_advs_for_service (int $id) {
       $adv = Advservice::find($id);
       return $adv->adv;
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function get_advs_for_category ($id) {
       $cat = Category::find($id);
       return $cat->adv;
    }
    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public  function servicecategory(int $id){
        $adv = Advservice::find($id);
        return $adv->category;
    }
}
