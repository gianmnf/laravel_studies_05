<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        // returning all data from a table
        // $clients = DB::table('clients')->get();

        // show in a array
        // $clients = DB::table('clients')->get()->toArray();

        // show in a array of arrays
        // $results = DB::table('products')->get()->map(function($item){
        //     return (array) $item;
        // });

        // show data from the results
        // $products = DB::table('products')->get();
        // foreach ($products as $product) {
        //     echo $product->product_name . '<br>';
        // }

        // get only a few columns
        // $products = DB::table('products')->get(['product_name', 'price']);
        // $this->showDataTable($products);

        // pluck - get data from a column in a simple way
        // $results = DB::table('products')->pluck('product_name');
        // $this->showRawData($results);

        // return only the first line of a result
        // $results = DB::table('products')->get()->first();
        // $this->showRawData($results);

        // return only the last line of result
        // $results = DB::table('products')->get()->last();
        // $this->showRawData($results);

        // specific id
        // $results = DB::table('products')->find(10);
        // $this->showRawData($results);

        // select with where clause
        // $products = DB::table('products')->where('id', 20)->first();
        // $products = DB::table('products')->where('id', '>=', 10)->get();
                
        // $products = DB::table('products')
        //             ->select('product_name', 'price')
        //             ->get();
        // $this->showDataTable($products);

        // $products = DB::table('products')
        //             ->select('product_name')->get();
        // $this->showDataTable($products);

        // $products = DB::table('products')
        //             ->where('price', '>', 50)
        //             ->get();
        // $this->showDataTable($products);

        // $products = DB::table('products')
        //             ->where('price', '>', 50)
        //             ->where('product_name', 'like', 'A%')
        //             ->get();
        // $this->showDataTable($products);

        // $products = DB::table('products')
        //             ->where('price', '>', 80)
        //             ->orWhere('product_name', 'like', 'A%')
        //             ->get();
        // $this->showDataTable($products);

        // $products = DB::table('products')
        //             ->where([
        //                 ['price', '>', 50],
        //                 ['product_name', 'like', 'A%']
        //             ])
        //             ->get();
        // $this->showDataTable($products);

        $products = DB::table('products')
                    ->where('price', '>', 90)
                    ->orWhere(function(Builder $query) {
                        $query->where('product_name', 'Banana')
                        ->orWhere('product_name', 'Cereja');
                    })
                    ->get();
        $this->showDataTable($products);

        //$this->showRawData($products);
        // $this->showDataTable($clients);
    }

    private function showRawData($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

    private function showDataTable($data)
    {
        echo '<table border="1">';
        // header
        echo '<tr>';
        foreach($data[0] as $key=>$value){
            echo '<th>' . $key . '</th>';
        }
        echo '</tr>';
        foreach ($data as $row) {
            echo '<tr>';
            foreach ($row as $key => $value) {
                echo '<td>' . $value . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}
