<?php
namespace App\Http\Controllers;

use App\DTO\GuestData;
use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use App\Models\Guest;
use App\Services\GuestService;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    protected $guestService;

    public function __construct(GuestService $guestService) 
    {
        $this->guestService = $guestService;
    }
    public function store(StoreGuestRequest $request)
    {
        $guestData = new GuestData(...$request->validated());

        $guest = $this->guestService->create($guestData);

        return response()->json($guest, 201);
    }

    public function index()
    {
        $guests = $this->guestService->list();

        return response()->json($guests, 200);
    }

    public function show(int $id)
    {
        $guest = Guest::findOrFail($id);

        return response()->json($guest);
    }

    public function update(UpdateGuestRequest $request, int $id)
    {
        $guest = Guest::findOrFail($id);
        $guestData = new GuestData(...$request->validated());

        $updatedGuest = $this->guestService->update($guest, $guestData);

        return response()->json($updatedGuest);
    }

    public function destroy(int $id)
    {
        $guest = Guest::findOrFail($id);
        $this->guestService->delete($guest);

        return response()->json(['message' => 'Guest deleted'], 200);
    }
}
