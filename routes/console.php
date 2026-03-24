<?php

use Illuminate\Support\Facades\Artisan;
use Mailtrap\Helper\ResponseHelper;
use Mailtrap\MailtrapClient;
use Mailtrap\Mime\MailtrapEmail;
use Symfony\Component\Mime\Address;

Artisan::command('send-mail', function () {
    $email = (new MailtrapEmail())
        ->from(new Address('hello@demomailtrap.co', 'Mailtrap Test'))
        ->to(new Address('95izg9nkr6@lnovic.com'))
        ->subject('Prueba desde Activity9')
        ->category('Integration Test')
        ->text('¡El correo llegó correctamente!')
    ;

    $response = MailtrapClient::initSendingEmails(
        apiKey: env('MAILTRAP_API_KEY')
    )->send($email);

    var_dump(ResponseHelper::toArray($response));

})->purpose('Enviar correo de prueba');