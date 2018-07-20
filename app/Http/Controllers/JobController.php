<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Category;
use App\City;
use App\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('category', 'city', 'company', 'source', 'type')->latest()->simplePaginate(6);
        return view('welcome', compact('jobs', 'categories', 'cities'));
    }

    public function show(Request $request, $slug)
    {
        if($request->ajax()) {
            $job = Job::with('category', 'city', 'company', 'source', 'type')->where('slug', $slug)->firstOrFail();  
            return View::make('load.job', compact('job'));
        }
        return view('load.job', compact('job'));
    }

    public function searchByCategory(Request $request, $id)
    {
        $query = ['category_id' => $id];
        return $this->search($request, $query);
    }


    public function searchByLocation(Request $request, $id)
    {
        $query = ['city_id' => $id];
        return $this->search($request, $query);
    }


    private function search($request, $query)
    {
        $jobs = Job::with('category', 'city', 'company', 'source', 'type')->where($query)->paginate(6);

        if($request->ajax()){
            return View::make('load.jobs', compact('jobs'))->render();
        }

        return view('load.jobs', compact('jobs'));
    }
}
