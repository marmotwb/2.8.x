
Maileinstellungen in Optionen ( nur Superadmin )
------------------------------------------------
Standard "VON" Adresse: SERVER_EMAIL
Standard Absender Name: WBMAILER_DEFAULT_SENDERNAME

E-Mail Optionen in Formular Einstellungen
-----------------------------------------
E-Mail Empfänger: wenn leer dann wird automatisch mit Superadmin (user_id==1) E-Mail vorbelegt
E-Mail Absender:  Benutzerdefiniert oder Field E-Mail Adresse
Angezeigter Name: Benutzerdefiniert oder Field Name
E-Mail Betreff: wenn leer dann senden mit $MOD_FORM['EMAIL_SUBJECT']

E-Mail Bestätigung in Formular Einstellungen
--------------------------------------------
E-Mail Empfänger: wenn leer dann keine Bestätigungs E-Mail an Sender
E-Mail Absender:  wenn leer dann Vorbelegung mit SERVER_EMAIL (Eintrag unter Optionen Maileinstellungen)
Angezeigter Name: wenn leer dann Vorbelegung mit WBMAILER_DEFAULT_SENDERNAME (Eintrag unter Optionen Maileinstellungen)
E-Mail Betreff:   wenn leer dann senden mit $MOD_FORM['SUCCESS_EMAIL_SUBJECT'] 
E-Mail Text:      wenn leer dann senden mit $MOD_FORM['SUCCESS_EMAIL_TEXT'].$MOD_FORM['SUCCESS_EMAIL_TEXT_GENERATED']

