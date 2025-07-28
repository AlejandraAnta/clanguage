<?php
/*
Template Name: Contacto
*/
get_header(); ?>

<main id="main" class="site-main">

    <header class="page-header">
        <div class="container">
            <h1><?php the_title(); ?></h1>
        </div>
    </header>

    <div class="page-content">
        <div class="container">
            <div class="contact-info">
                <p>Puedes contactarnos a través del siguiente formulario o enviando un correo electrónico a <a href="mailto:info@doneit.com.ar">info@doneit.com.ar</a>.</p>
            </div>

            <form id="contact-form" class="contact-form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
                <input type="hidden" name="action" value="contact_form">
                <p>
                    <label for="name">Nombre:</label>
                    <input type="text" id="name" name="name" required>
                </p>
                <p>
                    <label for="email">Correo electrónico:</label>
                    <input type="email" id="email" name="email" required>
                </p>
                <p>
                    <label for="message">Mensaje:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </p>
                <p>
                    <button type="submit">Enviar</button>
                </p>
            </form>
        </div>
    </div>

</main>

<?php get_footer(); ?>
