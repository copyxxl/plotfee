<?php
  
        if($_POST) {
            $vorname = "";
            $nachname = "";
            $besucher-email = "";
			$besucher-telefon = "";
            $besucher-nachricht = "";
            $email_body = "<div>";
              
            if(isset($_POST['vorname'])) {
                $vorname = filter_var($_POST['vorname'], FILTER_SANITIZE_STRING);
                $email_body .= "<div>
                                   <label><b>Vorname:</b></label>&nbsp;<span>".$vorname."</span>
                                </div>";
            }
			
			if(isset($_POST['nachname'])) {
                $nachname = filter_var($_POST['nachname'], FILTER_SANITIZE_STRING);
                $email_body .= "<div>
                                   <label><b>Nachname:</b></label>&nbsp;<span>".$nachname."</span>
                                </div>";
            }
         
            if(isset($_POST['besucher-email'])) {
                $besucher-email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['besucher-email']);
                $besucher-email = filter_var($besucher-email, FILTER_VALIDATE_EMAIL);
                $email_body .= "<div>
                                   <label><b>Email:</b></label>&nbsp;<span>".$besucher-email."</span>
                                </div>";
            }
			
			if(isset($_POST['besucher-telefon'])) {
                $besucher-telefon = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['besucher-telefon']);
                $besucher-telefon = filter_var($besucher-telefon, FILTER_VALIDATE_EMAIL);
                $email_body .= "<div>
                                   <label><b>Telefon:</b></label>&nbsp;<span>".$besucher-telefon."</span>
                                </div>";
            }
                            
            if(isset($_POST['besucher-nachricht'])) {
                $besucher-nachricht = htmlspecialchars($_POST['besucher-nachricht']);
                $email_body .= "<div>
                                   <label><b>Nachricht:</b></label>
                                   <div>".$besucher-nachricht."</div>
                                </div>";
            }
              
			$recipient = "info@plottfee.de";
              
            $email_body .= "</div>";
         
            $headers  = 'MIME-Version: 1.0' . "\r\n"
            .'Content-type: text/html; charset=utf-8' . "\r\n"
            .'From: ' . $besucher-email . "\r\n";
              
            if(mail($recipient, $email_title, $email_body, $headers)) {
                echo "<p>Danke für Ihre Nachricht. Wir melden uns so schnell wie möglich bei Ihnen zurück.</p>";
            } else {
                echo '<p>Leider ist Ihre Nachricht nicht versendet worden. Bitte versuchen Sie es später erneut.</p>';
            }
              
        } else {
            echo '<p>Something went wrong</p>';
        }
        ?>