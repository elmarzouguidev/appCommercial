<?php


namespace App\Actions\Backup;


use App\Mail\Backup\Client\ClientDataExportReady;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ExportUserData
{
    public static function handle(Client $user): void
    {
        // Extract and store user data as a JSON file.
        $content = json_encode($this->getAllUserData($user));

        $path = sprintf('user_exports/%s.json', $user->id);
        Storage::disk('public')->replace($path, $content);

        // Send JSON file temporaty URL via email.
        Mail::to($user)->send(new ClientDataExportReady($user, $path));
    }

    protected function getAllUserData(Client $user): array
    {
        return [
            'profile' => $user->toArray(),
            'articles' => $user->invoices->toArray(),
        ];
    }
}
