<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MainController extends Controller
{
    public function index()
    {
        // INSERT

        // Add a new client
        
        /* $new_client = [
            'client_name' => 'John Doe',
            'email' => 'johndoe@gmail.com'
        ];
        DB::table('clients')->insert($new_client); */

        /* DB::table('clients')->insert([
            'client_name' => 'John Doe',
            'email' => 'johndoe@gmail.com'
        ]); */

        // add two clients
        /* DB::table('clients')->insert([
            [
                'client_name' => 'Client 1',
                'email' => 'client1@gmail.com'
            ],
            [
                'client_name' => 'Client 2',
                'email' => 'client2@gmail.com'
            ]
        ]); */

        /* DB::table('clients')->insert([
            [
                'client_name' => 'Client 1',
                'email' => 'client1@gmail.com',
                'created_at' => Carbon::now()
            ],
            [
                'client_name' => 'Client 2',
                'email' => 'client2@gmail.com',
                'created_at' => Carbon::now()
            ]
        ]); */

        // UPDATE
        /* DB::table('clients')
            ->where('id', 1)
            ->update([
                'client_name' => 'UPDATED',
                'email' => 'updated@gmail.com',
            ]); */

        /* DB::table('clients')
            ->where('client_name', 'Catarina Melany Cunha')
            ->update([
                'email' => 'new@gmail.com',
            ]); */

        // DELETE - HARD
        /* DB::table('clients')
             ->where('id', 10)
             ->delete();
         */

        // DELETE - SOFT
        DB::table('clients')
             ->where('id', 11)
             ->update([
                'deleted_at' => Carbon::now()
             ]);
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
