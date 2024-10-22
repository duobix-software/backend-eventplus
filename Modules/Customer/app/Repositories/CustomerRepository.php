<?php

namespace Duobix\Customer\Repositories;

use Duobix\Core\Eloquent\Repository;
use Duobix\Customer\Models\Customer;

class CustomerRepository extends Repository
{
    public function model()
    {
        return Customer::class;
    }

    /** 
     * @return Customer
     */
    public function create(array $attributes)
    {
        return $this->model->query()->create($attributes);
    }

    /** 
     * @return Customer
     */
    public function findByUsername(string $username)
    {
        return $this->model->query()->where(function ($query) use ($username) {
            $query->orWhere('username', $username);
            $query->orWhere('email', $username);
            $query->orWhere('phone', $username);
        })->first();
    }
}
