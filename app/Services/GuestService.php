<?php

namespace App\Services;

use App\Models\Guest;
use App\DTO\GuestData;

class GuestService
{
    public function create(GuestData $data): Guest
    {
        $data->country = $data->country ?? $this->detectCountry($data->phone_number);

        return Guest::create((array) $data);
    }
    public function delete(Guest $guest)
    {
        $guest->delete();
    }
    public function update(Guest $guest, GuestData $data): Guest
    {
        $data->country = $data->country ?? $this->detectCountry($data->phone_number);
        
        $guest->update((array) $data);

        return $guest;
    }

    public function list(): array
    {
        return Guest::all()->toArray();
    }

    private function detectCountry(string $phone): mixed
    {
        return match (true) {
            str_starts_with($phone, '+7') => 'Russia',
            str_starts_with($phone, '+1') => 'USA',
            str_starts_with($phone, '+49') => 'Germany',
            default => null,
        };
    }
}

?>