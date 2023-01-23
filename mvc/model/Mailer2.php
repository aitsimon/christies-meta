<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'repositories/correo/vendor/phpmailer/phpmailer/src/Exception.php';
require 'repositories/correo/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'repositories/correo/vendor/phpmailer/phpmailer/src/SMTP.php';
require 'repositories/correo/vendor/autoload.php';
class Mailer2
{
    public string $remitente;
    public string $destinatario;
    public string $asunto;
    public string $mensaje;

    /**
     * @param string $remitente
     * @param string $destinatario
     * @param string $asunto
     * @param string $mensaje
     */
    public function __construct(string $remitente, string $destinatario, string $asunto, string $mensaje)
    {
        $this->remitente = $remitente;
        $this->destinatario = $destinatario;
        $this->asunto = $asunto;
        $this->mensaje = $mensaje;
    }

    public function parteComun(){
        $mail = new PHPMailer(true);
        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = $this->remitente;                     //SMTP username
            $mail->Password = 'crzndivgzlwkkchq';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port = 587;
            $mail->setFrom($this->remitente, 'Mailer');
            $mail->addAddress($this->destinatario);     //Add a recipient
        }catch(Exception $e){
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        return($mail);
    }
    public function mandarMail()
    {
            $mail = $this->parteComun();
            try {
                //Recipients
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $this->asunto;
                $mail->Body = $this->mensaje;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    /**
     * @return string
     */
    public function getRemitente(): string
    {
        return $this->remitente;
    }

    /**
     * @param string $remitente
     */
    public function setRemitente(string $remitente): void
    {
        $this->remitente = $remitente;
    }

    /**
     * @return string
     */
    public function getDestinatario(): string
    {
        return $this->destinatario;
    }

    /**
     * @param string $destinatario
     */
    public function setDestinatario(string $destinatario): void
    {
        $this->destinatario = $destinatario;
    }

    /**
     * @return string
     */
    public function getAsunto(): string
    {
        return $this->asunto;
    }

    /**
     * @param string $asunto
     */
    public function setAsunto(string $asunto): void
    {
        $this->asunto = $asunto;
    }

    /**
     * @return string
     */
    public function getMensaje(): string
    {
        return $this->mensaje;
    }

    /**
     * @param string $mensaje
     */
    public function setMensaje(string $mensaje): void
    {
        $this->mensaje = $mensaje;
    }
    public function __toString(): string
    {
        return ("$this->remitente.,.$this->destinatario.,.$this->asunto.,.$this->mensaje");
    }

}