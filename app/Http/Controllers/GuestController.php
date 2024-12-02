<?php
namespace App\Http\Controllers;

use App\Models\Guest;
use App\Services\GuestService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use libphonenumber\PhoneNumberUtil;

class GuestController extends Controller
{
    protected $guestService;

    public function __construct(GuestService $guestService) 
    {
        $this->guestService = $guestService;
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|unique:guest,email',
               'phone' => 'required|unique:guest,phone_number|regex:/^\+([0-9]{1,3})?[0-9]{10,15}$/',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422); // Код 422 для ошибки валидации
        }  
        // Определяем страну по телефону
        $phoneUtil = PhoneNumberUtil::getInstance();
        $phoneNumber = $phoneUtil->parse($request->phone, null);
        $country = $phoneUtil->getRegionCodeForNumber($phoneNumber);

        $guest = Guest::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone,
            'country' => $request->country ?? $country,
        ]);

        return response()->json($guest, 201);
    }

    public function index()
    {
        $guests = Guest::all();
        return response()->json($guests);
    }

    public function show($id)
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        return response()->json($guest);
    }

    public function update(Request $request, $id)
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:guest,email,' . $id,
            'phone' => 'required|regex:/^\+([0-9]{1,3})?[0-9]{10,15}$/|unique:guest,phone_number,' . $id,
        ]);

        // Определяем страну по телефону
        $phoneUtil = PhoneNumberUtil::getInstance();
        $phoneNumber = $phoneUtil->parse($request->phone, null);
        $country = $phoneUtil->getRegionCodeForNumber($phoneNumber);

        $guest->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone,
            'country' => $country,
        ]);

        return response()->json($guest);
    }

    public function destroy($id)
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return response()->json(['message' => 'Guest not found'], 404);
        }

        $guest->delete();

        return response()->json(['message' => 'Guest deleted successfully']);
    }
}
