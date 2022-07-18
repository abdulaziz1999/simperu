<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Storage;
use PDF;
use App\Exports\FeedbackExport;
use Maatwebsite\Excel\Facades\Excel;


class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedback = Feedback::latest()->paginate(5);
        return view('admin-feedback.index', compact('feedback'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'keterangan_feedback' => 'required',
            'poin' => 'required',
        ]);

        Feedback::create($request->all());
        return redirect('/feedback')->with('success', 'Data Feedback Baru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Feedback $feedback)
    {
        $feedback = Feedback::find($feedback->id);
        return view('admin-feedback.show')->with('feedback', $feedback);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        $feedback = Feedback::find($feedback->id);
        return view('admin-feedback.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        $request->validate([
            'keterangan_feedback' => 'required',
            'poin' => 'required',
        ]);
        $feedback->update($request->all());
        return redirect('/feedback')->with('success', 'Feedback Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect('/feedback')->with('success', 'Data Feedback Berhasil Dihapus');
    }

    public function generatePDF()
    {
        $data = Feedback::orderBy('id', 'desc')->get();
        $pdf = PDF::loadView('admin-feedback/pdf', ['feedback' => $data]);

        return $pdf->download('feedback.pdf');
    }

    public function generateExcel()
    {
        return Excel::download(new FeedbackExport, date('d-m-y') . '_feedback.xlsx');
    }
}
