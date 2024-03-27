<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'code' => 21445574,
            'phone' => '(03737)48145',
            'address' => 'Чернівецька область, Заставнівський район, с.Васловівці, вул. Головна, 52',
            'schedule' => 'пн-пт 8:00-17:00',
            'email' => 'nvk.vaslovivzi@gmail.com',
            'contact_phone' => '0372 226375',
            'manager' => 'Перепелюк Микола Михайлович',
        ]);
    }
}
