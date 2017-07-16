<?php
/**
 * The template part for displaying single posts
 *
 * @package Jannah
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

<?php

$post_layout = jannah_get_object_option( 'post_layout', 'cat_post_layout', 'tie_post_layout' );
$post_layout = ! empty( $post_layout ) ? $post_layout : 1;

if ( have_posts() ) : while ( have_posts()): the_post(); ?>

    <div <?php jannah_content_column_attr(); ?>>

        <?php

        # Above Post Banner ----------
        jannah_above_post_ad();

        ?>

        <article <?php jannah_article_attr(); ?>>

            <?php

            # Before post title action ----------
            do_action( 'jannah_before_single_post_title' );


            if( $post_layout == 2 || $post_layout == 3 || $post_layout == 4 || $post_layout == 5 || $post_layout == 8 ){
                get_template_part( 'framework/parts/post', 'featured' );
            }

            if( $post_layout == 1 || $post_layout == 2 || $post_layout == 6 ){
                get_template_part( 'framework/parts/post', 'head' );
            }

            # Get the top share buttons ----------
            jannah_get_template_part( 'framework/parts/post', 'share', array( 'share_position' => 'top' ) );

            if( $post_layout == 1 ){
                get_template_part( 'framework/parts/post', 'featured' );
            }

            ?>

            <div class="entry-content entry clearfix">

                <?php

                # Above Post content action ----------
                do_action('jannah_below_post_content');

                $story_highlights = jannah_get_postdata('tie_highlights_text');
                if (!empty($story_highlights) && is_array($story_highlights)) {
                    echo '
							<div id="story-highlights">
								<div class="widget-title"><h4>' . __ti('Story Highlights') . '</h4></div>
								<ul>';
                    foreach ($story_highlights as $highlight) {
                        echo '<li>' . $highlight . '</li>';
                    }
                    echo '
								</ul>
							</div>
						';
                }

                the_content();

                # Post content navigation ----------
                $args = array(
                    'before' => '<div class="multiple-post-pages clearfix">',
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>',
                    'next_or_number' => 'next_and_number',
                );
                wp_link_pages($args);


                # Get Source and Via ----------
                $source_via = array(
                    'tie_via' => array(
                        'title' => __ti('Via'),
                        'icon' => 'fa-external-link',
                    ),
                    'tie_source' => array(
                        'title' => __ti('Source'),
                        'icon' => 'fa-link',
                    ),
                );

                foreach ($source_via as $item => $args) {

                    $get_data = jannah_get_postdata($item);

                    if (!empty($get_data) && is_array($get_data)) {
                        echo '
								<div class="post-bottom-meta">
									<div class="post-bottom-meta-title">
										<span class="fa ' . $args['icon'] . '" aria-hidden="true"></span> ' . $args['title'] . '
									</div>
									<span class="tagcloud">';
                        foreach ($get_data as $data) {
                            if (!empty($data['text'])) {

                                $url = !empty($data['url']) ? 'href="' . $data['url'] . '" target="_blank" rel="nofollow"' : '';

                                echo '<a ' . $url . '">' . $data['text'] . '</a>';
                            }
                        }
                        echo '
									</span>
								</div>
							';
                    }
                }
                ?>

                <!-- Блок скриншотов -->

                <?php if (types_render_field("mods_images", array(rel => "lightbox", "style" => "width: 49%;",))) { ?>
                    <div class="video-gallery">
                        <div class="head-video-gallery">Скриншоты модификации</div>
                        <div class="images-gallery">


                            <?php if (types_render_field("mods_images", array("output" => "raw", "index" => "0",))) { ?>
                                <div class="item-gallery">
                                    <a href="<?php echo types_render_field("mods_images", array("output" => "raw", "index" => "0",)); ?>"
                                       rel="lightbox"> <?php echo types_render_field("mods_images", array("index" => "0", "alt" => get_the_title(),)); ?></a>
                                </div>
                            <?php } ?>


                            <?php if (types_render_field("mods_images", array("output" => "raw", "index" => "1",))) { ?>
                                <div class="item-gallery">
                                    <a href="<?php echo types_render_field("mods_images", array("output" => "raw", "index" => "1",)); ?>"
                                       rel="lightbox"> <?php echo types_render_field("mods_images", array("index" => "1", "alt" => get_the_title(),)); ?></a>
                                </div>
                            <?php } ?>

                            <?php if (types_render_field("mods_images", array("output" => "raw", "index" => "2",))) { ?>
                                <div class="item-gallery">
                                    <a href="<?php echo types_render_field("mods_images", array("output" => "raw", "index" => "2",)); ?>"
                                       rel="lightbox"> <?php echo types_render_field("mods_images", array("index" => "2", "alt" => get_the_title(),)); ?></a>
                                </div>
                            <?php } ?>

                            <?php if (types_render_field("mods_images", array("output" => "raw", "index" => "3",))) { ?>
                                <div class="item-gallery">
                                    <a href="<?php echo types_render_field("mods_images", array("output" => "raw", "index" => "3",)); ?>"
                                       rel="lightbox"> <?php echo types_render_field("mods_images", array("index" => "3", "alt" => get_the_title(),)); ?></a>
                                </div>
                            <?php } ?>

                            <?php if (types_render_field("mods_images", array("output" => "raw", "index" => "4",))) { ?>
                                <div class="item-gallery">
                                    <a href="<?php echo types_render_field("mods_images", array("output" => "raw", "index" => "4",)); ?>"
                                       rel="lightbox"> <?php echo types_render_field("mods_images", array("index" => "4", "alt" => get_the_title(),)); ?></a>
                                </div>
                            <?php } ?>

                            <?php if (types_render_field("mods_images", array("output" => "raw", "index" => "5",))) { ?>
                                <div class="item-gallery">
                                    <a href="<?php echo types_render_field("mods_images", array("output" => "raw", "index" => "5",)); ?>"
                                       rel="lightbox"> <?php echo types_render_field("mods_images", array("index" => "5", "alt" => get_the_title(),)); ?></a>
                                </div>
                            <?php } ?>

                            <?php if (types_render_field("mods_images", array("output" => "raw", "index" => "6",))) { ?>
                                <div class="item-gallery">
                                    <a href="<?php echo types_render_field("mods_images", array("output" => "raw", "index" => "6",)); ?>"
                                       rel="lightbox"> <?php echo types_render_field("mods_images", array("index" => "6", "alt" => get_the_title(),)); ?></a>
                                </div>
                            <?php } ?>

                            <?php if (types_render_field("mods_images", array("output" => "raw", "index" => "7",))) { ?>
                                <div class="item-gallery">
                                    <a href="<?php echo types_render_field("mods_images", array("output" => "raw", "index" => "7",)); ?>"
                                       rel="lightbox"> <?php echo types_render_field("mods_images", array("index" => "7", "alt" => get_the_title(),)); ?></a>
                                </div>
                            <?php } ?>

                            <?php if (types_render_field("mods_images", array("output" => "raw", "index" => "8",))) { ?>
                                <div class="item-gallery">
                                    <a href="<?php echo types_render_field("mods_images", array("output" => "raw", "index" => "8",)); ?>"
                                       rel="lightbox"> <?php echo types_render_field("mods_images", array("index" => "8", "alt" => get_the_title(),)); ?></a>
                                </div>
                            <?php } ?>

                            <?php if (types_render_field("mods_images", array("output" => "raw", "index" => "9",))) { ?>
                                <div class="item-gallery">
                                    <a href="<?php echo types_render_field("mods_images", array("output" => "raw", "index" => "9",)); ?>"
                                       rel="lightbox"> <?php echo types_render_field("mods_images", array("index" => "9", "alt" => get_the_title(),)); ?></a>
                                </div>
                            <?php } ?>

                            <?php if (types_render_field("mods_images", array("output" => "raw", "index" => "10",))) { ?>
                                <div class="item-gallery">
                                    <a href="<?php echo types_render_field("mods_images", array("output" => "raw", "index" => "10",)); ?>"
                                       rel="lightbox"> <?php echo types_render_field("mods_images", array("index" => "10", "alt" => get_the_title(),)); ?></a>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                <?php } ?>

                <!-- Блок скриншотов конец -->

                <!-- Блок видео -->

                <?php if (types_render_field("mods_video", array())) { ?>
                    <div class="video-gallery">
                        <div class="head-video-gallery">Видео обзор модификации</div>
                        <?php echo types_render_field("mods_video", array()); ?>
                    </div>
                <?php } ?>

                <!-- Блок видео конец -->

                <!-- Блок информация о файле -->
                <!-- Показ блока при наличии поля "размер файла" -->
                <?php if (types_render_field("file_size", array())) { ?>
                    <div class="video-gallery">
                        <div class="head-video-gallery">Информация о файле</div>

                        <div class="info-list">
                            <?php if (types_render_field("mods_author", array())) { ?>
                                <section><span><i class="fa fa-users" aria-hidden="true"></i> Авторы:</span>
                                <b><?php echo types_render_field("mods_author", array()); ?></b></section><?php } ?>
                            <?php if (types_render_field("select_game", array())) { ?>
                                <section><span><i class="fa fa-gamepad" aria-hidden="true"></i> Мод для:</span>
                                <b><?php echo types_render_field("select_game", array()); ?></b></section><?php } ?>
                            <?php if (types_render_field("steam_id", array())) { ?>
                                <section><span><i class="fa fa-steam" aria-hidden="true"></i> Steam ID:</span>
                                <b><?php echo types_render_field("steam_id", array()); ?></b></section><?php } ?>
                            <?php if (types_render_field("mods_version", array())) { ?>
                                <section><span><i class="fa fa-info-circle" aria-hidden="true"></i> Версия модификации:</span>
                                <b><?php echo types_render_field("mods_version", array()); ?></b></section><?php } ?>
                            <?php if (types_render_field("last_updated", array())) { ?>
                                <section><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Последнее обновление:</span>
                                <b><?php echo types_render_field("last_updated", array()); ?></b></section><?php } ?>
                            <?php if (types_render_field("game_version", array())) { ?>
                                <section><span><i class="fa fa-check"
                                                  aria-hidden="true"></i> Тест на версии игры:</span>
                                <b><?php echo types_render_field("game_version", array()); ?></b></section><?php } ?>
                        </div>

                        <hr class="style13">

                        <div class="file-detail">
                            <div class="file-detail-item"><span><i class="fa fa-folder-open" aria-hidden="true"></i> Размер:</span>
                                <b><?php echo types_render_field("file_size", array()); ?> mb</b></div>
                            <div class="file-detail-item"><span><i class="fa fa-file-archive-o"
                                                                   aria-hidden="true"></i> Формат:</span>
                                <b><?php echo types_render_field("mods_format", array()); ?></b></div>
                            <div class="file-detail-item"><span><i class="fa fa-download"
                                                                   aria-hidden="true"></i> Скачали раз:</span>
                                <b>100500</b></div>
                        </div>

                        <!-- Вывод ссылок на файл (можно добавлять больше одной -->
                        <?php if (types_render_field("file_url", array("output" => "raw", "index" => "0",))) { ?>
                            <div class="download-url">
                                <a href="<?php echo types_render_field("file_url", array("output" => "raw", "index" => "0",)); ?>"
                                   class="button" title="Скачать мод" target="_blank" rel="nofollow"><i
                                            class="fa fa-cloud-download" aria-hidden="true"></i>
                                    <?php if (types_render_field("url_anchor", array("index" => "0",))) {
                                        echo types_render_field("url_anchor", array("output" => "raw", "index" => "0",));
                                    } else {
                                        echo('Скачать мод');
                                    }
                                    ?></a>
                            </div>
                        <?php } ?>

                        <?php if (types_render_field("file_url", array("output" => "raw", "index" => "1",))) { ?>
                            <div class="download-url">
                                <a href="<?php echo types_render_field("file_url", array("output" => "raw", "index" => "1",)); ?>"
                                   class="button" title="Скачать мод" target="_blank" rel="nofollow"><i
                                            class="fa fa-cloud-download" aria-hidden="true"></i>
                                    <?php if (types_render_field("url_anchor", array("index" => "1",))) {
                                        echo types_render_field("url_anchor", array("output" => "raw", "index" => "1",));
                                    } else {
                                        echo('Скачать мод');
                                    }
                                    ?></a>
                            </div>
                        <?php } ?>

                        <!-- Steam ссылка -->
                        <?php if (types_render_field("steam_file_url", array())) { ?>
                            <div class="download-url">
                                <!--noindex--><a
                                        href="<?php echo types_render_field("steam_file_url", array("output" => "raw")); ?>"
                                        class="button" title="Перейти в Steam" target="_blank" rel="nofollow"><i
                                            class="fa fa-steam-square" aria-hidden="true"></i> Мод в Steam</a>
                                <!--/noindex-->
                            </div>
                        <?php } ?>

                        <!-- Ссылки для CCD ручн. и авто -->
                        <?php if (types_render_field("file_url_manual_install", array())) { ?>
                            <div class="download-url">
                                <!--noindex--><a
                                        href="<?php echo types_render_field("file_url_manual_install", array("output" => "raw")); ?>"
                                        class="button" title="Скачать мод" target="_blank" rel="nofollow"><i
                                            class="fa fa-cloud-download" aria-hidden="true"></i> Скачать (ручная
                                    установка)</a><!--/noindex-->
                            </div>
                        <?php } ?>

                        <?php if (types_render_field("file_url_auto_install", array())) { ?>
                            <div class="download-url">
                                <!--noindex--><a
                                        href="<?php echo types_render_field("file_url_auto_install", array("output" => "raw")); ?>"
                                        class="button" title="Скачать мод" target="_blank" rel="nofollow"><i
                                            class="fa fa-cloud-download" aria-hidden="true"></i> Скачать (автоматическая
                                    установка)</a><!--/noindex-->
                            </div>
                        <?php } ?>

                        <!-- Блок перехода на страницу загрузки (взять атрибут href) -->
                        <!--	<a href="/download?id=<?php the_ID(); ?>" title="Скачать мод" target="_blank" rel="nofollow">Перейти к загрузке файла</a> -->


                        <div class="ad-after-info">
                            <?php if (function_exists('the_ad_placement')) the_ad_placement('posle-knopki-skachat'); ?>
                        </div>

                    </div>

                <?php } ?>

                <?php
                # Get post tags ----------
                if ((jannah_get_option('post_tags') && !jannah_get_postdata('tie_hide_tags')) || jannah_get_postdata('tie_hide_tags') == 'no') {
                    the_tags('<div class="post-bottom-meta"><div class="post-bottom-meta-title"><span class="fa fa-tags" aria-hidden="true"></span> ' . __ti('Tags') . '</div><span class="tagcloud">', ' ', '</span></div>');
                }

                # Below Post content action ----------
                do_action('jannah_below_post_content');

                ?>

            </div><!-- .entry-content /-->

            <?php

            # End of Post action ----------
            do_action('jannah_end_of_post');

            # Get the bottom share buttons ----------
            jannah_get_template_part('framework/parts/post', 'share', array('share_position' => 'bottom'));

            ?>

        </article><!-- #the-post /-->


        <?php

        # Below Post Banner ----------
        jannah_below_post_ad();

        ?>


        <div class="post-components">
            <?php

            # Get About author box ----------
            if (((jannah_get_option('post_authorbio') && !jannah_get_postdata('tie_hide_author')) || jannah_get_postdata('tie_hide_author') == 'no') && !jannah_is_mobile_and_hidden('post_authorbio')) {
                jannah_author_box(get_the_author(), get_the_author_meta('ID'));
            }

            # Newsletter box ----------
            get_template_part('framework/parts/post', 'newsletter');

            # Next / Prev posts ----------
            if (((jannah_get_option('post_nav') && !jannah_get_postdata('tie_hide_nav')) || jannah_get_postdata('tie_hide_nav') == 'no') && !jannah_is_mobile_and_hidden('post_nav')) {

                echo '<div class="prev-next-post-nav container-wrapper media-overlay">';
                jannah_prev_post();
                jannah_next_post();
                echo '</div><!-- .prev-next-post-nav /-->';
            }

            # Related posts ----------
            get_template_part('framework/parts/post', 'related');

            # Comments ----------
            comments_template();

            ?>
        </div><!-- .post-components /-->

    </div><!-- .main-content -->

    <?php

    # Fly check also ----------
    get_template_part('framework/parts/post', 'fly-box');

endwhile; endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
