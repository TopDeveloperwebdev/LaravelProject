<?php

namespace App\Http\Controllers;

use App\Claim;
use Illuminate\Http\Request;

class ClaimController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $cl = Claim::where('user_id', '!=', null)->first();
        // if($cl) {
        foreach ($request->items as $key => $item) {
            // dd($item);
            $claim = new Claim;
            $claim->user_id = auth()->user()->id;
            $claim->partner_id = $request->partner;
            $claim->item = $item['id'];
            $claim->field = $item['field'];
            $claim->value = $item['value'];
            if ($item['field'] == 'q1' || $item['field'] == 'q2' || $item['field'] == 'q3' || $item['field'] == 'q4') {
                $claim->year = 1;
            }
            if ($item['field'] == 'q5' || $item['field'] == 'q6' || $item['field'] == 'q7' || $item['field'] == 'q8') {
                $claim->year = 2;
            }
            if ($item['field'] == 'q9' || $item['field'] == 'q10' || $item['field'] == 'q11' || $item['field'] == 'q12') {
                $claim->year = 3;
            }
            $claim->save();
        }
        // }
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
    public function destroy($id)
    {
        //
    }
}
