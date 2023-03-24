<?php

/*echo "<p>" . $A_View['helloworld']  . "</p>";*/



echo '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';
echo '<form id="comment_form" action="validFormLogin" method="post" required>
<input type="text" name="username" placeholder="Type your username" size="40"><br><br>
<input type="password" name="password" placeholder="Type your password" size="40"><br><br>
<div class="g-recaptcha" data-sitekey="6LeY9gQkAAAAADOj3LUTEVLbcpzxtSD1zbuaibqM"></div>
<input type="submit" name="submit" value="Submit"><br><br>
</form>';