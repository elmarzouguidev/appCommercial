<?php


namespace App\Services\Mail;


use Swift_SmtpTransport;
use Swift_TransportException;

class CheckConnection
{

    public static function isConnected()
    {
        try {
            $transport = new Swift_SmtpTransport(config('mail.mailers.smtp.host'), config('mail.mailers.smtp.port'), config('mail.mailers.smtp.encryption'));
            $transport->setUsername(config('mail.mailers.smtp.username'));
            $transport->setPassword(config('mail.mailers.smtp.password'));
            $mailer = new \Swift_Mailer($transport);
            $mailer->getTransport()->start();
            return true;
        } catch (Swift_TransportException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
