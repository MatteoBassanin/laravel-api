<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    
    public function index(){
        $projects = Project::with('type','tecnologies')->get();

        return response()->json([
            
            'success' => true,
            'result' => $projects

        ]);
    }


    public function show($slug){
        
        $project = Project::where('slug',$slug)->with('type','tecnologies')->first();

        if ($project){
            return response()->json([
                'success'=> true,
                'project' => $project
            ]);           
        }else {
            return response()->json([
                'success'=> false,
                'error' => "progetto non trovato"
            ]); 
        }

    }


}