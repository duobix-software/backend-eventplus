<?php

namespace Duobix\Organisation\Repositories;

use Duobix\Core\Eloquent\Repository;
use Duobix\Organisation\Models\OrganisationRequest;
use Duobix\User\Repositories\OrganizerRepository;
use Illuminate\Support\Facades\DB;

class OrganisationRequestRepository extends Repository
{
    public function model()
    {
        return OrganisationRequest::class;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function getAll($params = [])
    {
        $queryBuilder = $this->model->query()->select("*");

        return $queryBuilder->paginate($params['limit'] ?? 10);
    }

    /**
     * @return OrganisationRequest
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOrFail($id, array $columns = ['*'])
    {
        return $this->model->query()->where('id', $id)->firstOrFail($columns);
    }

    public function accept($id, $data = []): void
    {
        $request = $this->findOrFail($id);

        DB::transaction(function () use ($data, $request) {
            // create the organisation
            $organisation = app(OrganisationRepository::class)->create([
                'logo' => data_get($data, 'organisation_logo', null),
                'website' => data_get($data, 'organisation_website', null),
                'is_verified' => data_get($data, 'organisation_is_verified', false),

                'country' => data_get($data, 'organisation_country'),
                'state' => data_get($data, 'organisation_state'),
                'postcode' => data_get($data, 'organisation_postcode'),
                'city' => data_get($data, 'organisation_city'),
                'address' => data_get($data, 'organisation_address'),

                data_get($data, 'locale') => [
                    'name' => data_get($data, 'organisation_name'),
                    'slogan' => data_get($data, 'organisation_slogan'),
                    'description' => data_get($data, 'organisation_description'),
                ]
            ]);

            // create the main organizer for the organisation
            $organizer = app(OrganizerRepository::class)->create([
                'fullname' => data_get($data, 'fullname'),
                'phone' => data_get($data, 'phone'),
                'email' => data_get($data, 'email'),
                'password' => data_get($data, 'password', 'abcdef'),
                'is_verified' => data_get($data, 'organizer_is_verified', false),
            ]);

            // attach the organizer with thier organisation.
            $organizer->organisations()->attach($organisation->id);

            // mark the organisation request as accepted.
            $request->update([
                'organisation_id' => $organisation->getKey(),
                'organizer_id' => $organizer->getKey(),
                'status' => 'accepted',
            ]);
        });
    }

    public function reject($id): void
    {
        $request = $this->findOrFail($id);

        // mark the organisation request as rejected.
        $request->update([
            'status' => 'rejected'
        ]);
    }
}
