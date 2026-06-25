<?php
namespace App\Http\Controllers;

use App\Models\HasilPanen;
use App\Http\Requests\StoreHarvestRequest;
use App\Http\Resources\HarvestResource;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HarvestController extends Controller
{
    // GET /api/harvests?commodity=xxx
    public function index(Request $request)
    {
        $query = HasilPanen::query();

        if ($request->has('commodity')) {
            $query->where('nama_komoditas', 'like', '%' . $request->commodity . '%');
        }

        $harvests = $query->paginate(10);
        return HarvestResource::collection($harvests);
    }

    // POST /api/harvests
    public function store(StoreHarvestRequest $request)
    {
        $harvest = HasilPanen::create($request->validated());
        return (new HarvestResource($harvest))
            ->additional(['message' => 'Data panen berhasil dicatat'])
            ->response()
            ->setStatusCode(201);
    }

    // GET /api/harvests/{id}
    public function show($id)
    {
        try {
            $harvest = HasilPanen::findOrFail($id);
            return new HarvestResource($harvest);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error'   => 'Resource tidak ditemukan',
                'message' => 'Data panen dengan ID ' . $id . ' tidak ada di sistem.'
            ], 404);
        }
    }
}