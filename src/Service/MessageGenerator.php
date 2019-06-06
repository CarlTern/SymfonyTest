<?php
namespace App\Service;

class MessageGenerator
{
    public function getWelcomeMessage()
    {
        $enMessages = [
            'Hello!',
            'Welcome!',
            'Good Day!',
        ];
        $frMessages = [
            'Bienvenue',
            'Bienvenu',
            'Salut!',
            'Bonjour!',
        ];


        $index = array_rand($enMessages);

        return $enMessages[$index];
    }
}