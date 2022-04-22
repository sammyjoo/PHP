  
    </section>
    <footer>
        <div class="row">
            <div class="col-md-6 purple bas-gauche">
            <?php dynamic_sidebar('colonne-bas-gauche') ?>
            </div>
            <div class="col-md-6 green bas-droit">
            <?php dynamic_sidebar('colonne-bas-droit') ?>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
<script src="<?php bloginfo('template_directory') ?>/js/boostrap.bundle.min.js"></script>
</body>
</html>
