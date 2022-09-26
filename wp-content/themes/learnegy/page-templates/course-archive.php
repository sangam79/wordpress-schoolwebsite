<?php
    /**
     * Template Name: Course Archive
     */

    get_header();
?>

    <main id="content">
        <!-- course-saection-start -->
        <section>
            <div class="main-container">
                <div class="section-header pb-0">
                    <h4>
                        <?php esc_html_e(get_theme_mod('learnegy_course_subheading_settings', 'Welcome')); ?>
                    </h4>
                    <h2>
                        <?php esc_html_e(get_theme_mod('learnegy_course_heading_settings', 'Couress We Offer')); ?>
                    </h2>
                </div>
                <?php
                    $learnegy_course = new WP_Query(array(
                        'category_name'         =>  'course',
                        'posts_per_page'        =>  8,
                    ));

                    if($learnegy_course->post_count >= 1) :
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="courses-items mt-5">
                                <div class="row">
                                    <?php
                                        while($learnegy_course->have_posts()) :
                                            $learnegy_course->the_post();
                                    ?>
                                    <div class="col-xl-3 col-md-6 card-items" data-item="computer">
                                        <div class="card mt-4 course-card computer">
                                            <?php
                                                if(has_post_thumbnail()) {
                                                    the_post_thumbnail( 'large', array('class'=>'computer-img h-auto') );
                                                }
                                            ?>
                                            <h4>
                                                <?php the_title(); ?>
                                            </h4>
                                            <p>
                                                <?php echo wp_trim_words( get_the_content(), 20, '...' ); ?>
                                            </p>
                                            <div
                                                class="d-flex justify-content-between align-items-center course-card-footer">
                                                <div class="date d-flex">
                                                    <span><i class="far fa-calendar"></i></span>
                                                    <p>
                                                        <?php esc_html(the_field('time_length')); ?>
                                                    </p>
                                                </div>
                                                <div class="read-more d-flex">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php _e('Read More', 'learnegy'); ?>
                                                    </a>
                                                    <span><i class="fas fa-arrow-right"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </section>
        <!-- course-section-close  -->
         
        <?php get_template_part('template-parts/learnegy-newsletter'); ?>
    </main>
      
<?php
    get_footer();