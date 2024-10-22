<?php

namespace Duobix\Client\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Duobix\Client\Transformers\OrganisationResource;
use Duobix\Organisation\Repositories\OrganisationRepository;
use Illuminate\Http\Request;

class OrganisationController extends Controller
{
    public function __construct(
        protected OrganisationRepository $organisationRepository
    ) {}

    public function index()
    {
        return OrganisationResource::collection($this->organisationRepository->all());
    }

    public function show($organisation)
    {
        return new OrganisationResource($this->organisationRepository->with(['category', 'events'])->findByField('slug', $organisation)->first());
    }
}
