<?php
namespace correo;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
class Mailer
{
    public string $remitente;
    public string $destinatario;
    public string $destinatarioCC;
    public string $pathFile;

    /**
     * @param string $remitente
     * @param string $destinatario
     * @param string $destinatarioCC
     * @param string $pathFile
     */
    public function __construct(string $remitente, string $destinatario, $destinatarioCC=false, $pathFile=false)
    {
        $this->remitente = $remitente;
        $this->destinatario = $destinatario;
        if($destinatarioCC){
            $this->destinatarioCC = $destinatarioCC;
        }else{
           $this->destinatarioCC = '';
        }
        if($pathFile){
            $this->pathFile=$pathFile;
        }else{
            $this->pathFile = '';
        }
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
    public function mandarMail(){
        if($this->destinatarioCC!=''&&$this->pathFile!=''){
            $mail=$this->parteComun();
            try {
                //Recipients
                $mail->addCC($this->destinatarioCC);

                //Attachments
                $mail->addAttachment($this->pathFile);         //Add attachments
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Here is the subject';
                $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }else if($this->destinatarioCC==''&&$this->pathFile!=''){
            $mail=$this->parteComun();
            try {
                //Recipients

                //Attachments
                $mail->addAttachment($this->pathFile);         //Add attachments
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Here is the subject';
                $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }else if($this->destinatarioCC!=''&&$this->pathFile==''){
            $mail=$this->parteComun();
            try {
                //Recipients
                $mail->addCC($this->destinatarioCC);

                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Here is the subject';
                $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }else if($this->destinatarioCC==''&&$this->pathFile==''){
            $mail=$this->parteComun();
            try {
                //Recipients

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Here is the subject';
                $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
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
    public function getDestinatarioCC(): string
    {
        return $this->destinatarioCC;
    }

    /**
     * @param string $destinatarioCC
     */
    public function setDestinatarioCC(string $destinatarioCC): void
    {
        $this->destinatarioCC = $destinatarioCC;
    }

    /**
     * @return string
     */
    public function getPathFile(): string
    {
        return $this->pathFile;
    }

    /**
     * @param string $pathFile
     */
    public function setPathFile(string $pathFile): void
    {
        $this->pathFile = $pathFile;
    }

    public function __toString(): string
    {
        return ("$this->remitente.,.$this->destinatario.,.$this->destinatarioCC.,.$this->pathFile");
    }

}