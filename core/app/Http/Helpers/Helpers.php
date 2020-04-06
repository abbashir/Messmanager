<?php

 function  send_email($to, $name, $subject, $message) {

        $settings = \App\GeneralSetting::first();
        $template = $settings->email_template;
        $from = $settings->email_sent_form;

            $headers = "From:$settings->websiteTitle  <$from> \r\n";
            $headers .= "Reply-To: $settings->websiteTitle <$from> \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $mm = str_replace("{{name}}", $name, $template);
            $message = str_replace("{{message}}", $message, $mm);

            mail($to, $subject, $message, $headers);

    }



function get_user($user_id){

      $users = \App\Admin\Admin::where('id', $user_id)->first();

   return $users->name;
}





