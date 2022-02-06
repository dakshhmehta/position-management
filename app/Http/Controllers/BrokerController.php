<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBrokerRequest;
use App\Http\Requests\UpdateBrokerRequest;
use App\Repositories\BrokerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BrokerController extends AppBaseController
{
    /** @var BrokerRepository $brokerRepository*/
    private $brokerRepository;

    public function __construct(BrokerRepository $brokerRepo)
    {
        $this->brokerRepository = $brokerRepo;
    }

    /**
     * Display a listing of the Broker.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $brokers = $this->brokerRepository->all();

        return view('brokers.index')
            ->with('brokers', $brokers);
    }

    /**
     * Show the form for creating a new Broker.
     *
     * @return Response
     */
    public function create()
    {
        return view('brokers.create');
    }

    /**
     * Store a newly created Broker in storage.
     *
     * @param CreateBrokerRequest $request
     *
     * @return Response
     */
    public function store(CreateBrokerRequest $request)
    {
        $input = $request->all();

        $broker = $this->brokerRepository->create($input);

        Flash::success('Broker saved successfully.');

        return redirect(route('brokers.index'));
    }

    /**
     * Display the specified Broker.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $broker = $this->brokerRepository->find($id);

        if (empty($broker)) {
            Flash::error('Broker not found');

            return redirect(route('brokers.index'));
        }

        return view('brokers.show')->with('broker', $broker);
    }

    /**
     * Show the form for editing the specified Broker.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $broker = $this->brokerRepository->find($id);

        if (empty($broker)) {
            Flash::error('Broker not found');

            return redirect(route('brokers.index'));
        }

        return view('brokers.edit')->with('broker', $broker);
    }

    /**
     * Update the specified Broker in storage.
     *
     * @param int $id
     * @param UpdateBrokerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBrokerRequest $request)
    {
        $broker = $this->brokerRepository->find($id);

        if (empty($broker)) {
            Flash::error('Broker not found');

            return redirect(route('brokers.index'));
        }

        $broker = $this->brokerRepository->update($request->all(), $id);

        Flash::success('Broker updated successfully.');

        return redirect(route('brokers.index'));
    }

    /**
     * Remove the specified Broker from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $broker = $this->brokerRepository->find($id);

        if (empty($broker)) {
            Flash::error('Broker not found');

            return redirect(route('brokers.index'));
        }

        $this->brokerRepository->delete($id);

        Flash::success('Broker deleted successfully.');

        return redirect(route('brokers.index'));
    }
}
