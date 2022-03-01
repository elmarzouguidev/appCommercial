<?php


namespace App\Actions\Application\Ticket;


use App\Models\Ticket;

class GenerateTicketCode
{
    const UNAMBIGUOUS_ALPHABET = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';

    public function handle(int $characters = 7): string
    {
        do {
            $code = $this->generateCode($characters);
        } while(Ticket::where('code', $code)->exists());

        return $code;
    }

    protected function generateCode(int $characters): string
    {
        return substr(str_shuffle(str_repeat(static::UNAMBIGUOUS_ALPHABET, $characters)), 0, $characters);
    }
}
