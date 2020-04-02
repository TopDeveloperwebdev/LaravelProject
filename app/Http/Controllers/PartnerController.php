<?php

namespace App\Http\Controllers;

use App\Claim;
use App\Partners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($partnerID)

    {

        $partners = Partners::all();
        $costItems = [
            (object) [
                'partner_id' => $partnerID,
                'cost_item' => 'A01',
                'description' => 'Directly incurred: Staff',
            ],
            (object) [
                'partner_id' => $partnerID,
                'cost_item' => 'A02',
                'description' => 'Directly incurred: Travel & subsistence',
            ],
            (object) [
                'partner_id' => $partnerID,
                'cost_item' => 'A03',
                'description' => 'Directly incurred: Equipment',
            ],
            (object) [
                'partner_id' => $partnerID,
                'cost_item' => 'A04',
                'description' => 'Directly incurred: Other cost',
            ],
            (object) [
                'partner_id' => $partnerID,
                'cost_item' => 'A04a',
                'description' => 'Directly incurred: Exceptions Other',
            ],
            (object) [
                'partner_id' => $partnerID,
                'cost_item' => 'A05',
                'description' => 'Directly allocated: Investigators',
            ],
            (object) [
                'partner_id' => $partnerID,
                'cost_item' => 'A06',
                'description' => 'Directly allocated: Estates',
            ],
            (object) [
                'partner_id' => $partnerID,
                'cost_item' => 'A07',
                'description' => 'Directly allocated: Other cost',
            ],
            (object) [
                'partner_id' => $partnerID,
                'cost_item' => 'A08',
                'description' => 'Indirect costs',
            ],
            (object) [
                'partner_id' => $partnerID,
                'cost_item' => 'A09',
                'description' => 'Exceptions: Staff',
            ],
            (object) [
                'partner_id' => $partnerID,
                'cost_item' => 'A10',
                'description' => 'Exceptions: Travel & Subsistence',
            ],
            (object) [
                'partner_id' => $partnerID,
                'cost_item' => 'A11',
                'description' => 'Exceptions: Student Internships',
            ],
            (object) [
                'partner_id' => $partnerID,
                'cost_item' => 'A12',
                'description' => 'Exceptions: Other cost'
            ],
        ];


        $makers = ['A1', 'A2', 'A3', 'A4', 'A4a', 'A5', 'A6', 'A7', 'A8', 'A9', 'A10', 'A11', 'A12'];
        $columns = [
            'total_budget', 'q1', 'q2', 'q3', 'q4', 'q5', 'q6', 'q7', 'q8', 'q9', 'q10', 'q11', 'q12', 'projectTotal', 'projectVariance', 'y1_budget', 'YEAR_1', 'VARIANCE_1', 'y2_budget', 'YEAR_2', 'VARIANCE_2', 'y3_budget', 'YEAR_3', 'VARIANCE_3'
        ];

        $ColumnsFull = [
            'cost_item', 'description', 'total_budget', 'q1', 'q2', 'q3', 'q4', 'q5', 'q6', 'q7', 'q8', 'q9', 'q10', 'q11', 'q12', 'y1_budget', 'y2_budget', 'y3_budget'
        ];
        foreach ($costItems as $key => $item) {
            foreach ($columns as $subkey => $col)
                $costItems[$key]->$col = "0.00";
        }


        $temp =  DB::select("SELECT project_start_date , project_role FROM `project_partners` WHERE `user_id` = '$partnerID'");
        $project_role = $temp[0]->project_role;

        $startDate = $temp[0]->project_start_date;
        $startDate = date('Y-m', strtotime($startDate));
        $dateArray = [];

        $currentDate = date('Y-m');
        for ($i = 1; $i <= 12; $i++) {
            $endDate = date('Y-m', strtotime("+2 months", strtotime(date("Y-m", strtotime($startDate)))));
            if ($startDate <= $currentDate && $currentDate <= $endDate) {
                $isCurrent = "CURRENT";
            } else if ($startDate > $currentDate) {
                $isCurrent = "FORECAST";
            } else {
                $isCurrent = "HISTORIC";
            }

            $dateObject =   (object) [
                'partner_id' => $partnerID,
                'Qn' => 'Q' . $i,
                'header' => strtoupper(date('My', strtotime($startDate)) . '-' . date('My', strtotime($endDate))),
                'isCurrent' => $isCurrent
            ];
            array_push($dateArray, $dateObject);
            $startDate  = date('Y-m', strtotime("+1 months", strtotime(date("Y-m", strtotime($endDate)))));
        }
        if ($project_role == 'owner') {
            $table = DB::select("SELECT
            SUM(total_budget) as total_budget,
           SUM(q1) as q1,
            SUM(q2) as q2,
             SUM(q3) as q3,
              SUM(q4) as q4,
              SUM(q5) as q5,
              SUM(q6) as q6,
               SUM(q7) as q7,
                SUM(q8) as q8,
                SUM(q9) as q9,
               SUM(q10) as q10,
                SUM(q11) as q11,
                SUM(q12) as q12,
                (SUM(q1) + SUM(q2) +SUM(q3) + SUM(q4) +SUM(q5) +SUM(q6) +SUM(q7) + SUM(q8) +SUM(q9) +SUM(q10) +SUM(q11) + SUM(q12) ) as projectTotal,
             (SUM(q1) + SUM(q2) +SUM(q3) + SUM(q4)) as YEAR_1,
            (SUM(q5) +SUM(q6) +SUM(q7) + SUM(q8)) as YEAR_2,
            (SUM(q9) +SUM(q10) +SUM(q11) + SUM(q12)) as YEAR_3,
             SUM(y1_budget) as y1_budget,
             SUM(y2_budget) as y2_budget,
             SUM(y3_budget) as y3_budget  ,
             ( SUM(total_budget)  - (SUM(q1) + SUM(q2) +SUM(q3) + SUM(q4) +SUM(q5) +SUM(q6) +SUM(q7) + SUM(q8) +SUM(q9) +SUM(q10) +SUM(q11) + SUM(q12) )) as projectVariance,
             ( SUM(y1_budget)  - (SUM(q1) + SUM(q2) +SUM(q3) + SUM(q4))) as VARIANCE_1,
            ( SUM(y2_budget) - (SUM(q5) +SUM(q6) +SUM(q7) + SUM(q8))) as VARIANCE_2,
            ( SUM(y3_budget) - (SUM(q9) +SUM(q10) +SUM(q11) + SUM(q12))) as VARIANCE_3,
            GROUP_CONCAT(DISTINCT partner_id) partner_id,
            GROUP_CONCAT(DISTINCT cost_item) cost_item,
            GROUP_CONCAT(DISTINCT `description`) `description`
            FROM `claim_new` GROUP by cost_item");
        } else {
            $table = DB::select("SELECT partner_id, cost_item,`description`, total_budget,
            q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q11, q12,
            (q1 + q2 + q3 + q4 + q5 + q6 + q7 + q8 + q9 + q10 + q11 + q12) as projectTotal,
            (total_budget - (q1 + q2 + q3 + q4 + q5 + q6 + q7 + q8 + q9 + q10 + q11 + q12)) as projectVariance,
            (q1 + q2 + q3 + q4) as YEAR_1,
            (q5 + q6 + q7 + q8) as YEAR_2,
            (q9 + q10 + q11 + q12) as YEAR_3,
            (y1_budget - (q1 + q2 + q3 + q4)) as VARIANCE_1,
            (y2_budget - (q5 + q6 + q7 + q8)) as VARIANCE_2,
            (y3_budget - (q9 + q10 + q11 + q12)) as VARIANCE_3,
           y1_budget,
           y2_budget,
           y3_budget
                FROM `claim_new` WHERE `partner_id` = '$partnerID' order by cost_item ASC");
        }

        if (!count($table)) $table = $costItems;

        foreach ($table as $trindex => $row) {
            foreach ($columns as $tdindex => $col) {
                $colSum[$trindex][$tdindex / 4] = 0.00;
            }
        }
        $count = 4;
        foreach ($table as  $row) {
            foreach ($columns as $colIndex => $col) {
                $colSum[$colIndex] = "0.00";
                $col2Sum[$colIndex] = "0.00";
            }
        }

        foreach ($table as  $row) {
            foreach ($columns as $colIndex => $col) {
                if ($row->$col == null) $colSum[$colIndex] += 0;
                else $colSum[$colIndex]  += $row->$col;
                if ($colIndex > 0 && $colIndex < 13) {
                    $col2Sum[$colIndex]  = $colSum[$colIndex] + $col2Sum[$colIndex - 1];
                }
            }
        }


        return view('partner.index', compact('partners','project_role', 'makers', 'dateArray', 'col2Sum', 'colSum', 'ColumnsFull', 'table', 'columns', 'costItems', 'partnerID'));
    }


    /**
     *
     */

    public function claim(Request $request)

    {
        $all = $request->all();
        DB::delete("delete from claim_new where partner_id='$all[partnerID]'");
        $table = $all['table'];
        foreach ($table  as $key => $row) {
            DB::insert("INSERT INTO `claim_new` (`id`, `partner_id`, `cost_item`, `description`, `total_budget`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `y1_budget`, `y2_budget`, `y3_budget`) VALUES (NULL, '$all[partnerID]', '$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$row[6]', '$row[7]', '$row[8]', '$row[9]', '$row[10]', '$row[11]', '$row[12]', '$row[13]', '$row[14]', '$row[15]','$row[16]', '$row[17]');");
        }
    }
}
