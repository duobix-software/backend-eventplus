<?php

namespace Duobix\Client\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Duobix\Client\Transformers\EventResource;
use Duobix\Event\Repositories\EventRepository;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct(
        protected EventRepository $eventRepository
    ) {}

    public function index(Request $request)
    {
        $defaultParams = ['status' => ['active'], 'limit' => 10];
        $events = $this->eventRepository->getAll(array_merge($defaultParams, $request->all()));
        return EventResource::collection($events);
    }

    public function show(Request $request)
    {
        $event = $this->eventRepository->findByField('slug', $request->route('event'))->first();

        return new EventResource($event);
    }
}
