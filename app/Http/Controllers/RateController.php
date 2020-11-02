<?php


namespace App\Http\Controllers;
use App\Models\Rate;
use App\Services\RateControlMicroService;
use Illuminate\Http\Request;
use League\CommonMark\Inline\Element\Link;

class RateController extends Controller
{
///////////////////// kurs dollara //////////////////////
    public function course($curr)
    {
        $date = file_get_contents(Rate::Link);
        $courses = json_decode($date, true);
        foreach ($courses as $cours)
        {
            if($cours['code_currency'] == $curr)
            {
                $curse_curr = $cours['rate'];
                break;
            }
        }
        return $curse_curr;
    }
/////////////// Dollar
    public function index()
    {
        $course = $this->course('840');
        return view('dollar',compact('course'));
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'sum'=>'required|integer',
        ]);

        $history = new Rate($request->all());
        $history->total = $request->sum/$this->course('USD');
        $history->save();

        if ($history)
        {
            return redirect()->route('dollar.index')
                ->with(['history'=>$history->total . '$']);
        }
        else{
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
    /////////////////// Euro
    public function euroIndex()
    {

        $course = $this->course('978');
        return view('euro',compact('course'));
    }

    public function euroStore(Request $request)
    {
        $this->validate($request,[
            'sum'=>'required|integer',
        ]);

        $history = new Rate($request->all());
        $history->total = $request->sum/$this->course('EUR');
        $history->save();

        if ($history)
        {
            return redirect()->route('euro.index')
                ->with(['history'=>$history->total . '€']);
        }
        else{
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
    ///////////////// Ruble ///////////////////////
    public function rubleIndex()
    {
        $course = $this->course('643');
        return view('ruble',compact('course'));
    }

    public function rubleStore(Request $request)
    {
        $this->validate($request,[
            'sum'=>'required|integer',
        ]);

        $history = new Rate($request->all());
        $history->total = $request->sum/$this->course('RUR');
        $history->save();

        if ($history)
        {
            return redirect()->route('ruble.index')
                ->with(['history'=>$history->total]);
        }
        else{
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
}
