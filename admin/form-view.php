<?php
/**
 * Renders the admin form:
 * - Uses the POST method
 * - Includes a nonce field for CSRF protection
 * - Simple text input with label
 */
?>

<form method="post" action="">

    <?php 
    // Output nonce field for CSRF protection
    // This adds a hidden input like: <input type="hidden" name="_wpnonce" value="...">
    wp_nonce_field('my_nonce_action'); 
    ?>

    <!-- Label and input for the user to type a message -->
    <label for="admin_form_message">Your Message:</label><br>

    <!-- Input field for message submission -->
    <input type="text" id="admin_form_message" name="admin_form_message"><br>

    <!-- Submit button to send the form data -->
    <button type="submit">Submit</button>

</form>
