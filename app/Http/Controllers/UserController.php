<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class UserController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function fileImportExport()
    {
        return view('file-import');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */

    public function fileImport(Request $request)
    {
        Excel::import(new UsersImport, $request->file('file')->store('temp'));
        return back();
    }

    /**
     * @return BinaryFileResponse
     */
    public function fileExport()
    {
        return Excel::download(new UsersExport, 'users-collection.xlsx');
    }
}
