<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSymbolRequest;
use App\Http\Requests\UpdateSymbolRequest;
use App\Repositories\SymbolRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SymbolController extends AppBaseController
{
    /** @var SymbolRepository $symbolRepository*/
    private $symbolRepository;

    public function __construct(SymbolRepository $symbolRepo)
    {
        $this->symbolRepository = $symbolRepo;
    }

    /**
     * Display a listing of the Symbol.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $symbols = $this->symbolRepository->all();

        return view('symbols.index')
            ->with('symbols', $symbols);
    }

    /**
     * Show the form for creating a new Symbol.
     *
     * @return Response
     */
    public function create()
    {
        return view('symbols.create');
    }

    /**
     * Store a newly created Symbol in storage.
     *
     * @param CreateSymbolRequest $request
     *
     * @return Response
     */
    public function store(CreateSymbolRequest $request)
    {
        $input = $request->all();

        $symbol = $this->symbolRepository->create($input);

        Flash::success('Symbol saved successfully.');

        return redirect(route('symbols.index'));
    }

    /**
     * Display the specified Symbol.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $symbol = $this->symbolRepository->find($id);

        if (empty($symbol)) {
            Flash::error('Symbol not found');

            return redirect(route('symbols.index'));
        }

        return view('symbols.show')->with('symbol', $symbol);
    }

    /**
     * Show the form for editing the specified Symbol.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $symbol = $this->symbolRepository->find($id);

        if (empty($symbol)) {
            Flash::error('Symbol not found');

            return redirect(route('symbols.index'));
        }

        return view('symbols.edit')->with('symbol', $symbol);
    }

    /**
     * Update the specified Symbol in storage.
     *
     * @param int $id
     * @param UpdateSymbolRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSymbolRequest $request)
    {
        $symbol = $this->symbolRepository->find($id);

        if (empty($symbol)) {
            Flash::error('Symbol not found');

            return redirect(route('symbols.index'));
        }

        $symbol = $this->symbolRepository->update($request->all(), $id);

        Flash::success('Symbol updated successfully.');

        return redirect(route('symbols.index'));
    }

    /**
     * Remove the specified Symbol from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $symbol = $this->symbolRepository->find($id);

        if (empty($symbol)) {
            Flash::error('Symbol not found');

            return redirect(route('symbols.index'));
        }

        $this->symbolRepository->delete($id);

        Flash::success('Symbol deleted successfully.');

        return redirect(route('symbols.index'));
    }
}
