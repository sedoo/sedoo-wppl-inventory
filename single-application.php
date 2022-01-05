<?php get_header(); ?>
    
<div>

        
        <main  class="">
            <?php if (have_posts()) : ?>
            
                <?php while (have_posts()) : the_post(); ?>
                <article class="flexRowCenter w80">
                    <div class="imageBloc w50 borderBox textAlignRight animate__animated animate__fadeInLeft">
                        <?php the_post_thumbnail( 'large'); ?>
                    </div><!--
                    --><div class="w50  borderBox padding100px">
                        <h1 class="title fontsize35px margin0">
                        <?php  the_title(); ?>
                        </h1>
                        <div class="content">
                            <?php the_content(); ?>
                            <a class="inlineBlockMid padding10 bgColorBlack colorWhite" href="http://localhost/theme-de-greg/membre">Retour</a>
                        </div>
                </article>
                <style>
                    article{
                        padding:50px 0;
                    }
                </style>
                <?php endwhile; ?>
            <?php endif; ?>


        </main>
            




    </div>

<?php get_footer(); ?> 