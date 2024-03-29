<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        return view('admin.report.index');
    }
    public function uindex(){
        $users=User::with('role')->orderBy('id', 'desc')->paginate(12);
        return view('admin.report.uindex',compact('users'));
    }
    public function postreport(Request $request)
    {
        $year = $request->input('year',Carbon::now()->year);
        $month = $request->input('month',Carbon::now()->month);
        $action = $request->input('action');
       // $name = $user->name;
       $user = User::whereId(auth()->id())->value('firstname');
        $e_post = Post::where('user_id',auth()->id())->whereDate('created_at','<=',date("{$year}-{$month}-31"))->count();
        $o_post = Post::where('user_id',auth()->id())->whereDate('created_at','<=',date("{$year}-{$month}-01"))->count();
        $o_comment = User::find(auth()->id())->postcomments()->whereDate('post_user.created_at','<=',date("{$year}-{$month}-01"))->count();
        $e_comment = User::find(auth()->id())->postcomments()->whereDate('post_user.created_at','<=',date("{$year}-{$month}-31"))->count();
        
        
        $data=[
            [
                'user'=>$user,
                'date'=> date ("{$year}-{$month}-01"),
                'post'=>$o_post,
                'comments'=>$o_comment
            ],

            [
                'user'=>'',
                'date'=> 'post increase',
                'post'=>$e_post-$o_post,
                'comments'=>''
            ],

            [
                'user'=>'',
                'date'=>'comment increase',
                'post'=>'',
                'comments'=>'$e_comment-$o_comment'
            ],

            [
                'user'=>$user,
                'date'=>date("{$year}-{$month}-31"),
                'post'=>$e_post,
                'comments'=>$e_comment
            ],
        ];
        if ($action == 'pdf'){
            $pdf = PDF::loadView('admin.report.export.postreport', [
                'data' => $data, 
                'year' => $year,
                'month' =>$month,
                'user' =>$user            
        ]); 
        
        return $pdf->download("post-report-{$year}-{$month}.pdf");
        }
        $years = range(Carbon::now()->year, 2018);
        $months = CarbonPeriod::create('2021-01-01', '1 month', '2021-12-31');
        return view('admin.report.postreport',compact('years','data','year','months','month'));
    }
}
