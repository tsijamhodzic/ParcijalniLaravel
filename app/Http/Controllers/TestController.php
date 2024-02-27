<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdRequest;
use App\Models\TestModel;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke()
    {
        return [
            'Ids' => TestModel::all()
        ];
    }

    public function index()
    {
        $ids = TestModel::all();

        return view('test.index')
            ->with('title', 'Ids')
            ->with('id', $ids);
    }

    public function show(int $id)
    {
        $id = TestModel::findOrFail($id);

        return view('test.show')
            ->with('id', $id);
    }

    public function create()
    {
        return view('test.create', [
            'id' => TestModel::all(),
        ]);
    }

    public function store(StoreIdRequest $request)
    {
        $validated = $request->validated();

        $id = new TestModel();
        $id->id = $validated['id'];
        $id->save();

        return redirect()->route('test.index');
    }

    public function destroy(int $id)
    {
        TestModel::destroy($id);

        return redirect()->route('test.index');
    }
}
