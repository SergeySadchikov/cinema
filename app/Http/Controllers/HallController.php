<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hall;
use App\Models\Seat;

class HallController extends Controller
{

    public function index()
    {
        $halls = Hall::with('seats')->get();
        return response($halls);
    }
    public function create()
    {
        $lastHall = Hall::orderBy('id', 'desc')->first();
        if (isset($lastHall)) {
            $lastHallName = $lastHall->name;
            $lastHallNumber = (int) preg_replace('/\D/', '', $lastHallName);
            $hallNumber = ++$lastHallNumber;
        } else {
            $hallNumber = 1;
        }
        $newHall = new Hall();
        $newHall->name = 'Зал '.$hallNumber;
        $newHall->save();
        //Создание пустых мест созданного зала
        $createdHall = Hall::find($newHall->id);
        for ($i = 1; $i <= $createdHall->rows; $i++) {
            for ($z = 1; $z <= $createdHall->seats; $z++) {
                $createdHall->seats()->create([
                    'number' => $z,
                    'row' => $i,
                    'type' => 'disabled',
                    'price' => 0
                ]);
            }
        }
    }
    public function destroy($id)
    {
        $hall = Hall::find($id);
        $hall->delete();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
