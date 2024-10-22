<?php

namespace Duobix\Admin\Http\Controllers\Organisation;

use App\Http\Controllers\Controller;
use Duobix\Organisation\Repositories\OrganisationRequestRepository;
use Illuminate\Http\Request;

class OrganisationRequestController extends Controller
{

    public function __construct(
        protected OrganisationRequestRepository $organisationRequestRepository
    ) {}

    public function index()
    {
        $this->organisationRequestRepository->getAll();

        
    }

    public function show(Request $request)
    {
        $organisation = $this->organisationRequestRepository->findOrFail($request->route('organisation'));

        return view('admin::organisation.request', [
            'organisation' => $organisation
        ]);
    }

    public function accept(Request $request)
    {
        $this->organisationRequestRepository->accept($request->route('organisation'));

        return redirect(route('admin.organisation.request.index'))->with('alert', [
            'status' => 'success',
            'message' => trans('admin::app.organisation.request.accepte-success')
        ]);
    }

    public function reject(Request $request)
    {
        $this->organisationRequestRepository->reject($request->route('organisation'));

        return redirect(route('admin.organisation.request.index'))->with('alert', [
            'status' => 'success',
            'message' => trans('admin::app.organisation.request.reject-success'),
        ]);
    }
}
