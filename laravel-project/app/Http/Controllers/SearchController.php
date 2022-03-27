<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\Language;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SearchController extends Controller
{

    public $filters = [
        'Code',
        'Language',
        'Post',
        'Tag',
    ];

    private function getValid(){
        return request()->validate([
            'keyword' => 'string',
            'filters' => 'sometimes',
            'filters.*' => Rule::in($this->filters),
            'limit' => 'sometimes'
        ]);
    }

    public function search(){
        $data = $this->getValid();

        if(request()->has('filters')){
            $selected = $data['filters'];
        }else{
            $selected = $this->filters;
        }
        
        if(request()->has('keyword')){
            $keyword = $data['keyword'];
        }else{
            $keyword = '';
        }

        if(request()->has('limit')){
            $limit = $data['limit'];
        }else{
            $limit = 5;
        }
        
        $total_results = [];

        foreach($this->filters as $filter){
            if(in_array($filter,$selected)){
                $model = app("App\Models\\".$filter);
                $total_results[$filter] = $model::search($keyword)->take($limit)->paginate(5);
            }
        }
        return view('result',['total_results'=>$total_results,'filters'=>$this->filters,'keyword'=>$keyword,'selected'=>$selected]);
    }
}
