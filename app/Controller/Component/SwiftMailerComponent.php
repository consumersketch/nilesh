<?php

App::import('Vendor', 'Swift', array('file' => 'SwiftMailer' . DS . '/lib/swift_required.php'));

class SwiftMailerComponent extends Component
{

    var $controller = false;
    public $layout = 'Emails';
    public $viewPath = '/Emails';
    var $from = null;
    var $fromName = null;
    var $to = null;
    var $toName = null;
    /**
     * CC recipients
     *
     * @var Mixed
     *         Array - address/name pairs (e.g.: array(example@address.com => name, ...)
     *         String - address to send email to
     * @access Public
     */
    var $cc = null;
    /**
     * BCC recipients
     *
     * @var Mixed
     *         Array - address/name pairs (e.g.: array(example@address.com => name, ...)
     *         String - address to send email to
     * @access Public
     */
    var $bcc = null;
    /**
     * List of files that should be attached to the email.
     *
     * @var array - list of file paths
     * @access public
     */
    var $attachments = array();
    /**
     * When the email is opened, if the mail client supports it
     * a notification will be sent to this address
     *
     * @var String - email address for notification
     * @access Public
     */
    var $readNotifyReceipt = null;
    /**
     * Array of errors refreshed after send function is executed
     *
     * @var Array - Error container
     * @access Public
     */
    var $postErrors = array();

    function startup(&$controller)
    {
        $this->controller = & $controller;
    }

    function initialize(&$controller)
    {
        $this->controller =& $controller;
    }

    function beforeRender()
    {

    }

    function beforeRedirect()
    {

    }

    function shutdown()
    {

    }

    function _getBodyText($view)
    {

        // Temporarily store vital variables used by the controller.
        $tmpLayout = $this->controller->layout;
        $tmpAction = $this->controller->action;
        $tmpOutput = $this->controller->output;
        $tmpRender = $this->controller->autoRender;

        // Render the plaintext email body.
        ob_start();
        $this->controller->output = null;

        $body = $this->controller->render($this->viewPath . DS . 'text' . DS . $view . '_text', $this->layout . DS . $view . '_text');
        ob_end_clean();

        // Restore the layout, view, output, and autoRender values to the controller.
        $this->controller->layout = $tmpLayout;
        $this->controller->action = $tmpAction;
        $this->controller->output = $tmpOutput;
        $this->controller->autoRender = $tmpRender;

        return $body;
    }

    function _getBodyHTML($view)
    {

        // Temporarily store vital variables used by the controller.
        $tmpLayout = $this->controller->layout;
        $tmpAction = $this->controller->action;
        $tmpOutput = $this->controller->output;
        $tmpRender = $this->controller->autoRender;

        //        pr($this->viewPath . DS .'html' . DS .$view . '_html');
        //        pr($this->layout . DS . $view . '_html');

        ob_start();
        $this->controller->output = null;
        $body = $this->controller->render($this->viewPath . DS . 'html' . DS . $view, $this->layout . DS . 'html' . DS . 'default');
        ob_end_clean();

        // Restore the layout, view, output, and autoRender values to the controller.
        $this->controller->layout = $tmpLayout;
        $this->controller->action = $tmpAction;
        $this->controller->output = $tmpOutput;
        $this->controller->autoRender = $tmpRender;

        return $body;
    }

    function send($view = 'default', $subject = '')
    {
        // Create the message, and set the message subject.
        $message = & Swift_Message::newInstance();

        $message->setSubject($subject);

        // Append the HTML and plain text bodies.
        $bodyHTML = $this->_getBodyHTML($view);
        //        $bodyText = $this->_getBodyText($view);

        //$message->setBody($bodyText, "text/plain");
        $message->addPart($bodyHTML, "text/html");

        // Add attachments if any
        if (!empty($this->attachments)) {
            foreach($this->attachments as $attachment) {
                if (!file_exists($attachment)) {
                    continue;
                }
                $message->attach(Swift_Attachment::fromPath($attachment));
            }
        }
        // On read notification if supported
        if (!empty($this->readNotifyReceipt)) {
            $message->setReadReceiptTo($this->readNotifyReceipt);
        }

        // Set the from address/name.
        $message->setFrom(array($this->from => $this->fromName));
        $message->setReplyTo(array($this->from => $this->fromName));

        // Create the recipient list.
        //$recipients =& new Swift_RecipientList();
        $setarray = "";

        if (is_array($this->to)) {
            $recsize = sizeof($this->to);
            for ($i = 0; $i < $recsize; $i++) {
                $setarray[$this->to[$i]] = $this->toName[$i];
            }
        } else {
            $setarray = array($this->to => $this->toName);
        }

        // Add all CC recipients.
        if (!empty($this->cc)) {
            if (is_array($this->cc)) {
                foreach($this->cc as $address => $name) {
                    $message->addCc($address, $name);
                }
            }
            else {
                $message->addCc($this->cc);
            }
        }

        // Add all BCC recipients.
        if (!empty($this->bcc)) {
            if (is_array($this->bcc)) {
                foreach($this->bcc as $address => $name) {
                    $message->addBcc($address, $name);
                }
            }
            else {
                $message->addBcc($this->bcc);
            }
        }

        $message->setTo($setarray);

        $transport = Swift_SmtpTransport::newInstance();

        $transport->setHost('smtp.gmail.com');
        $transport->setPort(587);
        $transport->setEncryption('tls');
        $transport->setUsername('ecom@nividaweb.com');
        $transport->setPassword('Finacle@12345');

        $mailer = Swift_Mailer::newInstance($transport);
        // Attempt to send the email.
        //$result = $mailer->send($message);

       // return $result;
        return $mailer->send($message, $this->postErrors);

    }

}

?>