# Secure Contact Form Plugin

A simple yet secure WordPress plugin that demonstrates key development concepts including:
- Admin form handling
- Custom database insertion
- Frontend hooks (`wp_footer`, `the_content`)
- Filterable and reusable frontend components
- Enqueued scripts and styles (CSS/JS)

---

## 🚀 Features

- ✅ Admin panel with a secure contact form
- ✅ Custom database table to store form submissions
- ✅ Clean frontend message added to blog posts
- ✅ Footer message added site-wide using `wp_footer` hook
- ✅ Custom CSS and JS support
- ✅ Developer-friendly structure and reusable frontend components

---

## 🗂️ File Structure

secure-contact-form/
│
├── admin/
│ ├── admin-settings.php # Registers admin menu and loads the form page
│ ├── form-handler.php # Handles form POST request with nonce check and sanitization
│ ├── form-view.php # Displays the contact form HTML
│ └── message-list.php # Displays submitted messages below the form
│
├── css/
│ └── scf-frontend.css # Frontend CSS for thank-you and footer messages
│
├── includes/
│ ├── enqueue-css-file.php # Enqueues the scf-frontend.css file for frontend
│ ├── enqueue-js-file.php # Enqueues scf-admin.js only on the admin form page
│ ├── filter-content.php # Adds thank-you message to post content via the_content
│ ├── footer-message.php # Adds a footer message via wp_footer
│ └── reusable-message.php # Outputs a reusable message via a PHP function and filter
│
├── js/
│ └── scf-admin.js # Admin JS file (optional, used for future enhancements)
│
├── Readme.md # You’re reading it!
│
└── wp-learning-admin-form.php # Main plugin file (registers hooks and includes components)


---

## 🔧 Admin Form Functionality

- Appears under **Form Demo** in the WordPress admin menu
- Accepts a user-entered message
- On submission:
  - Verifies a security nonce
  - Sanitizes the input using `sanitize_text_field()`
  - Stores the message with a timestamp into a custom DB table `wp_secure_contact_form`
- Below the form, previously submitted messages are displayed in reverse order

---

## 🌐 Frontend Functionality

1. **Thank-you Message on Posts**  
   - Hook: `the_content`  
   - Description: Appends a "Thank you for reading!" type message to the end of each post  
   - Customizable via the `scf_thank_you_message` filter

2. **Footer Message on Every Page**  
   - Hook: `wp_footer`  
   - Description: Adds a blue message at the bottom of the page  
   - Customizable via the `scf_footer_message_text` filter

3. **Reusable Message**  
   - File: `includes/reusable-message.php`  
   - Usage: Outputs a message block with a default message and filter (`scf_reusable_message_text`)  
   - Call this function from a theme or another plugin to reuse the message

---

## 🎨 Assets

### scf-frontend.css

- Targets:
  - Thank-you message styles
  - Footer message styling (e.g., blue background, padding, font)

### scf-admin.js

- Currently empty but:
  - Loaded on the admin form page only
  - Can be extended to handle alerts, validation, AJAX, etc.

---

## 🛡️ Security Practices

- `wp_nonce_field()` and `wp_verify_nonce()` for CSRF protection
- `sanitize_text_field()` for input sanitization
- `esc_html()` for safe output
- `current_user_can()` check can be added for further role-based access

---

## 🗃️ Database Table

**Name:** `wp_secure_contact_form` (with prefix based on your WordPress install)

**Fields:**
- `id` (Primary key)
- `message` (Text field)
- `created_at` (Timestamp)

The table is created automatically on first form submission if it doesn’t exist.

---

## 🧑‍💻 Developer Notes

- To change messages, use WordPress filters:
```php
add_filter('scf_thank_you_message', function($message) {
    return 'Hope you enjoyed the post! 😊';
});
