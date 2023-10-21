<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class CountController extends Controller
{
    public function calculateAverage($code) {
        $average = Answer::whereHas('questions', function ($query) use ($code) {
            $query->where('code', $code)->where('type', 'numeric');
        })->avg('answer');
    
        return $average;
    }
    
    public function productCount($code,$product) {
        $product = Answer::whereHas('questions', function ($query) use ($code) {
            $query->where('code', $code)->where('type', 'qcm')->where('product', $product);
        })->avg('answer');

        return $product;
    }
}
