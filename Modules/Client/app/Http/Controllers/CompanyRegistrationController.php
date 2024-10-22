<?php

namespace Duobix\Client\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Duobix\Client\Http\Requests\CompnayRegistrationRequest;
use Duobix\Organisation\Events\OrganisationRequest;
use Duobix\Organisation\Repositories\OrganisationRequestRepository;

class CompanyRegistrationController extends Controller
{

    public function __construct(
        protected OrganisationRequestRepository $organisationRequestRepository
    ) {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompnayRegistrationRequest $request)
    {
        $this->organisationRequestRepository->create($request->all());

        OrganisationRequest::dispatch();

        return response()->json();
    }
}
