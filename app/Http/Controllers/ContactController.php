<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|numeric'
        ]);

        $apiKey = env('API_KEY');
        $adminId = env('AdminID');

        $message = "*🌍✈️ Yangi bog‘lanish so‘rovi!*\n\n" .
                   "*📌 Foydalanuvchi quyidagi ma’lumotlarni qoldirdi:*\n\n" .
                   "*👤 Ism:* " . $request->full_name . "\n" .
                   "*📧 Email:* " . $request->email . "\n" .
                   "*📱 Telefon:* " . $request->phone_number . "\n\n" .
                   "🧳 Sayohat xizmatlariga qiziqmoqda.\n" .
                   "📥 Iltimos, aloqaga chiqing va kerakli ma'lumotlarni taqdim eting.";

        $text = urlencode($message);

        $url = "https://api.telegram.org/bot{$apiKey}/sendMessage?" . http_build_query([
            'chat_id' => $adminId,
            'text' => $message,
            'parse_mode' => 'Markdown'
        ]);

        $response = $response = Http::get("https://api.telegram.org/bot{$apiKey}/sendMessage", [
            'chat_id' => $adminId,
            'text' => $message,
            'parse_mode' => 'Markdown'
        ]);

        return response()->json(['success' => true]);
    }
}