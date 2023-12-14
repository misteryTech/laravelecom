<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\Models\Activity as ModelsActivity;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;


class DashboardComponents extends Component
{

    use WithPagination;

    // public function test(){
    //     $data = Category::all();
    //     // $categoryss=[];
    //     // foreach($data as $categoryss => $values){
    //     //         $categoryss[]=$categoryss();
    //     // }
    //     return view('test',['data'=>$data]);
    // }
    public function render()
    {



        //use for dataAnalysis
        $data = Category::select('id', 'name')
        ->withCount(['products' => function ($query) {
            $query->select(DB::raw('count(*) as product_count'))->groupBy('category_id');
        }])
        ->get();

        $perPage = 10;

        $countProducts = Product::all()->count();
        $totalProducts = Product::all();

          // this end month is for product
        $addedstartDate = Carbon::now()->startOfMonth()->subMonth();
        $addedendDate = Carbon::now()->endOfMonth()->subMonth();

         // this end month is for activityLog
        $startDate = Carbon::today();
        $endDate = Carbon::tomorrow();

        $listCategory = Category::all();
        $chartData = "";
        foreach($listCategory as $result){
            $chartData.="['".$result->category."',],";

            $arr['chartData']=rtrim($chartData,",");
        }

        $lastMonthCount = Product::whereBetween('created_at', [$addedstartDate, $addedendDate])->count();

        $activityLogs = ModelsActivity::whereBetween('created_at', [$startDate, $endDate])
        ->orderBy('created_at', 'desc')
        ->paginate($perPage,)
       ;

        // $activityLogs = ModelsActivity::all();
        return view('livewire.dashboard-components',['activityLogs'=>$activityLogs,
        'countProducts'=>$countProducts,
        'lastMonthCount'=>$lastMonthCount,
        'totalProducts'=>$totalProducts,
        'listCategory'=>$listCategory,
        'data'=>$data]);
    }
}
