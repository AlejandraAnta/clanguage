<?php
function doneit_theme_setup() {
    // Soporte para menús de navegación
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'doneit' ),
    ) );
}
add_action( 'after_setup_theme', 'doneit_theme_setup' );

function doneit_enqueue_scripts() {
    wp_enqueue_script( 'doneit-main-js', get_template_directory_uri() . '/js/main.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'doneit_enqueue_scripts' );

// Procesamiento del formulario de contacto
function doneit_contact_form() {
    if ( isset( $_POST['name'] ) && isset( $_POST['email'] ) && isset( $_POST['message'] ) ) {
        $name    = sanitize_text_field( $_POST['name'] );
        $email   = sanitize_email( $_POST['email'] );
        $message = sanitize_textarea_field( $_POST['message'] );
        $to      = 'info@doneit.com.ar';
        $subject = 'Nuevo mensaje de contacto desde el sitio web';
        $body    = "Nombre: $name\n\nEmail: $email\n\nMensaje:\n$message";
        $headers = "From: $name <$email>";

        if ( wp_mail( $to, $subject, $body, $headers ) ) {
            wp_redirect( home_url( '/contacto/gracias/' ) );
        } else {
            wp_redirect( home_url( '/contacto/error/' ) );
        }
        exit;
    }
}
add_action( 'admin_post_nopriv_contact_form', 'doneit_contact_form' );
add_action( 'admin_post_contact_form', 'doneit_contact_form' );
