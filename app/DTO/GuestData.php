<?php

namespace App\DTO;

class GuestData
{
    public function __construct(
        public string $first_name,
        public string $last_name,
        public string $phone_number,
        public ?string $email = null,
        public ?string $country = null
    ) {}
}

?>