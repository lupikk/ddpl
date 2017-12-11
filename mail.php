    <?php
    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    // Konfigurasi SMTP
    $mail->isSMTP();
    $mail->Host = 'mail.pranscorpora.co.id';
    $mail->SMTPAuth = true;
    $mail->Username = 'admin@pranscorpora.co.id';
    $mail->Password = 'Pwadmin123';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 25;
    $mail->setFrom('admin@pranscorpora.co.id', 'Pranscorpora');
    $mail->addReplyTo('admin@pranscorpora.co.id', 'Pranscorpora');
    // Menambahkan penerima
    $mail->addAddress('pranscorpora@gmail.com');
    // Menambahkan cc atau bcc 
    /*$mail->addCC('cc@contoh.com');
    $mail->addBCC('bcc@contoh.com');*/
    // Subjek email
    $fields = array('name' => 'Name', 'surname' => 'Surname', 'phone' => 'Phone', 'email' => 'Email', 'message' => 'Message'); 
    
    $emailText = "You have a new message from your contact form<br>=============================<br>";

    foreach ($_POST as $key => $value) {
        // If the field exists in the $fields array, include it in the email 
        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value<br>";
        }
    }
    $mail->Subject = 'New message from contact form';
    // Mengatur format email ke HTML
    $mail->isHTML(true);
    // Konten/isi email
    /*$mailContent = "<h1>Mengirim Email HTML menggunakan SMTP di PHP</h1>
        <p>Ini adalah email percobaan yang dikirim menggunakan email server SMTP dengan PHPMailer.</p>";*/
    $mail->Body = $emailText;
    // Kirim email
    if(!$mail->send()){
        echo 'Pesan tidak dapat dikirim.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        echo "<br/>";
        echo "<a href='..'>Kembali</a>";
    }else{
        echo 'Pesan telah terkirim';
        echo "<br/>";
        echo "<a href='..'>Kembali</a>";
    }