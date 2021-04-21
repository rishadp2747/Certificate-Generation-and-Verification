<?php


namespace App\Http\Controllers\ImportExcel;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\ImportContacts;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;



class ImportExcelController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('created_at','DESC')->get();

        $events = DB::table('event')->get();


        return view('pages.import',['contacts'=> $contacts, 'events' => $events]);
    }
 
    public function import(Request $request)
    {
        $request->validate([
            'event' => 'required|min:1|not_in:0',
            'import_file' => 'required'
        ]);

        $event  = $request->event;

        Excel::import(new ImportContacts($event), request()->file('import_file'));
        return back()->with('success', 'Participants imported successfully.');
    }
}
