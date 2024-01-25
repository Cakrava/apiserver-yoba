<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Http\Resources\MatakuliahResource;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Matakuliah::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('kdmatkul2010041', 'LIKE', "%{$search}%")
                ->orWhere('namamat2010041', 'LIKE', "%{$search}%");
        }
        $matakuliah = $query->paginate(8);
        return MatakuliahResource::collection($matakuliah);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kdmatkul2010041' => 'required|unique:matakuliah2010041,kdmatkul2010041|min:7|max:7',
            'namamat2010041' => 'required|max:100',
            'sks2010041' => 'required|max:100',
        ], [
            'kdmatkul2010041.required' => ':atribut tidak boleh kosong',
            'kdmatkul2010041.unique' => ':atribut sudah ada',
            'kdmatkul2010041.min' => ':Minimal 7 Karakter',
            'kdmatkul2010041.max' => ':Maximal 7 Karakter',
            'namamat2010041.required' => ':atribut tidak boleh kosong',
            'sks2010041.required' => ':atribut tidak boleh kosong',
        ], [
            'kdmatkul2010041' => 'Kode Matakuliah',
            'namamat2010041' => 'Matakuliah',
            'sks2010041' => 'SKS',
        ]);
        $matakuliah = Matakuliah::create($data);

        return new MatakuliahResource($matakuliah);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $kdmatkul2010041)
    {
        $matakuliah = Matakuliah::find($kdmatkul2010041);
        if (!$matakuliah) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        return response()->json($matakuliah);
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kdmatkul2010041)
    {
        $matakuliah = Matakuliah::find($kdmatkul2010041);
        if (!$matakuliah) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        $data = $request->validate([
            'namamat2010041' => 'required|max:100',
            'sks2010041' => 'required|max:100',
        ]);

        $matakuliah->update($data);

        return response()->json($matakuliah, 200);


    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kdmatkul2010041)
    {
        $matakuliah = Matakuliah::find($kdmatkul2010041);

        if (!$matakuliah) {
            return response()->json(['Message' => 'Data ndak ado'], 404);
        }

        $matakuliah->delete();

        return response()->json(['message' => 'Data alah tahapuih'], 200);

    }
    public function uploadImage(Request $request, $kdmatkul2010041)
    {
        $matakuliah = Matakuliah::find($kdmatkul2010041);
        if (!$matakuliah) {
            return response()->json([
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        }

        $validateData = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        if ($request->hasFile('foto')) {
            if ($matakuliah->foto && file_exists(public_path($matakuliah->foto))) {
                unlink(public_path($matakuliah->foto));
                unlink(public_path($matakuliah->foto_thumb));
            }

            $file = $request->file('foto');
            $fileName = time() . '-' . $file->getClientOriginalName();

            $file->move(public_path('images'), $fileName);

            $filePath = public_path('images') . '/' . $fileName;
            $fileName_thumb = 'thumb-' . $fileName;
            $thumbPath = public_path('images/thumb/' . $fileName_thumb);

            switch ($file->getClientOriginalExtension()) {
                case 'jpeg':
                    $resource = imagecreatefromjpeg($filePath);
                    break;
                case 'jpg':
                    $resource = imagecreatefromjpeg($filePath);
                    break;
                case 'png':
                    $resource = imagecreatefrompng($filePath);
                    break;
                default:
                    return response()->json(['message' => 'Format tidak didukung'], 400);
            }

            if (!$resource) {
                return response()->json(['message' => 'Gagal Memproses Gambar'], 500);
            }

            imagejpeg($resource, $thumbPath, 10);
            imagedestroy($resource);

            $matakuliah->foto = '/images/' . $fileName;
            $matakuliah->foto_thumb = '/images/thumb/' . $fileName_thumb;

            $matakuliah->save();
            return response()->json(['message' => 'Berhasil upload gambar', 'data' => $matakuliah], 200);

        }

        return response()->json(['message' => 'Gambar kosong'], 400);
    }
}
