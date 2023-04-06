<style>
    /* bg_color_footer : 'color de background' */
    body {
        background-color: <?php echo $config->bg_color_footer ?>;
        /* color: <?php echo $config->texte_color ?>; */
    }

    #header.header-scrolled {
        background: <?php echo $config->bg_color_menu ?>;
        padding: 12px 0;
    }

    .ico-circle {
        box-shadow: 0 0 0 10px <?php echo $config->bg_color_menu ?> ;
    }

    .line-mf {
        background-color: <?php echo $config->bg_color_menu ?> ;
    }

    .service-box {
        background-color: <?php echo $config->bg_color_footer ?>;
    }

    footer {
        background : <?php echo $config->bg_color_menu ?>;
    }
</style>