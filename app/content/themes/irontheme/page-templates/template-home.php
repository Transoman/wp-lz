<?php
/**
 * Template Name: Главная
 */
get_header(); ?>

<?php

if ( have_rows('home_layout') ):

  while ( have_rows('home_layout') ) : the_row();

    if ( get_row_layout() == 'hero' ): ?>

      <?php $type_bg = get_sub_field( 'type_bg' );

      if ($type_bg == 'img' && get_sub_field( 'bg' )) {
        $bg_img = ' style="background-image: url(' . get_sub_field( 'bg' ) . ');"';
      }
      elseif ($type_bg == 'video' and get_sub_field( 'video' )) {
        $bg_video = '<video class="hero__video" autoplay loop muted><source src="' . get_sub_field( 'video' ) . '" type="video/mp4"></video>';
      }
      ?>

      <section class="hero"<?php echo $bg_img ?: ''; ?>>
        <?php echo $bg_video ?: ''; ?>
        <div class="container">
          <div class="hero__content">
            <?php
            $tag = get_sub_field( 'tag' );
            $title = get_sub_field( 'title' );
            $descr = get_sub_field( 'descr' );

            if ($tag): ?>
              <p class="hero__tag"><?php echo $tag; ?></p>
            <?php endif; ?>
            <?php if ($title): ?>
              <h1 class="hero__title"><?php echo $title; ?></h1>
            <?php endif; ?>
            <?php if ($descr): ?>
              <p class="hero__descr"><?php echo $descr; ?></p>
            <?php endif; ?>
          </div>

          <a href="#about" class="btn-down"><?php ith_the_icon( 'arrow-down' ); ?></a>
        </div>
      </section>
    
    <?php elseif( get_row_layout() == 'about' ): ?>

      <section class="about" id="about">
        <div class="container">
          <?php $title = get_sub_field( 'title' );
          if ($title): ?>
            <h2 class="section-title"><?php echo $title; ?></h2>
          <?php endif; ?>

          <?php if (have_rows( 'list' )): ?>
            <div class="about-list">
              <?php while (have_rows( 'list' )): the_row(); ?>
                <div class="about-list__item">
                  <?php $icon = get_sub_field( 'icon' );
                  if ($icon): ?>
                    <div class="about-list__icon">
                      <img src="<?php echo $icon; ?>" width="60" alt="">
                    </div>
                  <?php endif; ?>
                  <h3 class="about-list__title">
                    <?php the_sub_field( 'title' ); ?>

                    <?php
                      $video = get_sub_field( 'video' );
	                    $descr = get_sub_field( 'descr' );

	                    if ($video || $descr['title']):
                      ?>
                      <div class="btn-group">
                        <?php if ($video): ?>
                          <a href="#" class="btn-play"><span>
                              <?php ith_the_icon( 'icon-play', 'btn-play__play' ); ?>
                              <?php ith_the_icon( 'icon-pause', 'btn-play__pause' ); ?>
                            </span></a>

                          <div class="float-video about-list__video">
                            <button type="button" class="float-video__close btn-close"><?php ith_the_icon( 'close' ); ?></button>
                            <video>
                              <source src="<?php echo $video; ?>" type="video/mp4">
                            </video>
                          </div>
                        <?php endif; ?>

                        <?php if ($descr['title']): ?>
                          <a href="#" class="btn-text"><span>
                              <?php ith_the_icon( 'text', 'btn-text__icon' ); ?>
                              <?php ith_the_icon( 'close', 'btn-text__close' ); ?>
                            </span></a>

                          <div class="float-descr">
                            <button type="button" class="float-descr__close btn-close"><?php ith_the_icon( 'close' ); ?></button>
                            <h4 class="float-descr__title"><?php echo $descr['title']; ?></h4>
                            <div class="float-descr__wrap" data-simplebar data-simplebar-auto-hide="false">
                              <?php echo $descr['text'] ?: ''; ?>
                            </div>
                          </div>
                        <?php endif; ?>
                      </div>
                    <?php endif; ?>
                  </h3>

                </div>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>

        </div>

        <img src="<?php echo THEME_URL; ?>/images/general/star.svg" class="parallax parallax-1" alt="">

      </section>

    <?php elseif( get_row_layout() == 'why' ): ?>

      <section class="why" id="program">
        <div class="container">
          <?php $title = get_sub_field( 'title' );
          if ($title): ?>
            <h2 class="section-title text-center"><?php echo $title; ?></h2>
          <?php endif; ?>

          <?php if (have_rows( 'list' )): ?>
            <div class="why-list">
              <?php while (have_rows( 'list' )): the_row(); ?>
			          <?php if (have_rows( 'list_row' )): ?>
                  <div class="why-list__row row">
				            <?php while (have_rows( 'list_row' )): the_row(); ?>
                      <div class="why-list__item<?php echo get_sub_field( 'minus' ) ? ' why-list__item--minus' : ''; ?>">
                        <div class="why-list__content">
                          <h3 class="why-list__title"><?php the_sub_field( 'title' ); ?></h3>
                          <?php the_sub_field( 'descr' ); ?>
                        </div>

                        <div class="btn-group">
                          <?php $video = get_sub_field( 'video' );
	                          $descr = get_sub_field( 'add_descr' );
                          if ($video): ?>
                            <a href="#" class="btn-play"><span>
                                <?php ith_the_icon( 'icon-play', 'btn-play__play' ); ?>
                                <?php ith_the_icon( 'icon-pause', 'btn-play__pause' ); ?>
                              </span></a>

                            <div class="float-video why-list__video">
                              <button type="button" class="float-video__close btn-close"><?php ith_the_icon( 'close' ); ?></button>
                              <video>
                                <source src="<?php echo $video; ?>" type="video/mp4">
                              </video>
                            </div>
                          <?php endif; ?>

                          <?php if ($descr['title']): ?>
                            <a href="#" class="btn-text"><span>
                                <?php ith_the_icon( 'text', 'btn-text__icon' ); ?>
                                <?php ith_the_icon( 'close', 'btn-text__close' ); ?>
                              </span></a>

                            <div class="float-descr">
                              <button type="button" class="float-descr__close btn-close"><?php ith_the_icon( 'close' ); ?></button>
                              <h4 class="float-descr__title"><?php echo $descr['title']; ?></h4>
                              <div class="float-descr__wrap" data-simplebar data-simplebar-auto-hide="false">
		                            <?php echo $descr['text'] ?: ''; ?>
                              </div>
                            </div>
                          <?php endif; ?>
                        </div>

                      </div>
                    <?php endwhile; ?>
                  </div>
                <?php endif; ?>
              <?php endwhile; ?>
              </div>
          <?php endif; ?>

        </div>

        <img src="<?php echo THEME_URL; ?>/images/general/star.svg" class="parallax parallax-2" alt="">

      </section>

    <?php elseif( get_row_layout() == 'statistics' ): ?>

      <section class="statistics">
        <div class="container">
          <div class="row">
            <div class="statistics__left">
              <?php $title_1 = get_sub_field( 'title_1' );
              $descr_1 = get_sub_field( 'descr_graph_1' );
              if ($title_1): ?>
                <h3 class="statistics__title"><?php echo $title_1; ?></h3>
              <?php endif ?>
              <?php echo wp_get_attachment_image( get_sub_field( 'graph_1' ), 'full', '', array('class' => 'statistics__graph' ) ); ?>
              <?php if ($descr_1): ?>
                <p class="statistics__graph-descr"><?php the_sub_field( 'descr_graph_1' ); ?></p>
              <?php endif; ?>
            </div>

            <div class="statistics__right">
              <?php $title_2 = get_sub_field( 'title_2' );
              $descr_2 = get_sub_field( 'descr_graph_2' );
              if ($title_2): ?>
                <h3 class="statistics__title"><?php echo $title_2; ?></h3>
              <?php endif ?>
              <?php echo wp_get_attachment_image( get_sub_field( 'graph_2' ), 'full', '', array('class' => 'statistics__graph' )); ?>
              <?php if ($descr_2): ?>
                <p class="statistics__graph-descr"><?php the_sub_field( 'descr_graph_2' ); ?></p>
              <?php endif; ?>
            </div>
          </div>

          <div class="statistics__bottom">
            <?php echo wp_get_attachment_image( get_sub_field( 'img' ), 'full' ); ?>
            <div class="statistics__bottom-info">
              <h3 class="statistics__bottom-title"><?php the_sub_field( 'title' ); ?></h3>
              <p class="statistics__bottom-descr"><?php the_sub_field( 'descr' ); ?></p>
            </div>
          </div>
        </div>
      </section>

    <?php elseif( get_row_layout() == 'faq' ): ?>

      <section class="faq">
        <div class="container">
          <?php $title = get_sub_field( 'title' );
          if ($title): ?>
            <h2 class="section-title text-center"><?php echo $title; ?></h2>
          <?php endif; ?>

          <?php if (have_rows( 'list' )): ?>
            <div class="faq-list row">
              <?php while (have_rows( 'list' )): the_row(); ?>
                <div class="faq-list__item">
                  <h3 class="faq-list__title"><?php the_sub_field( 'title' ); ?></h3>

                  <div class="btn-group">
		                <?php $video = get_sub_field( 'video' );
			                $descr = get_sub_field( 'descr' );
			                if ($video): ?>
                        <a href="#" class="btn-play"><span>
                            <?php ith_the_icon( 'icon-play', 'btn-play__play' ); ?>
                            <?php ith_the_icon( 'icon-pause', 'btn-play__pause' ); ?>
                          </span></a>

                        <div class="float-video faq-list__video">
                          <button type="button" class="float-video__close btn-close"><?php ith_the_icon( 'close' ); ?></button>
                          <video>
                            <source src="<?php echo $video; ?>" type="video/mp4">
                          </video>
                        </div>
			                <?php endif; ?>

		                <?php if ($descr['title']): ?>
                      <a href="#" class="btn-text"><span>
                          <?php ith_the_icon( 'text', 'btn-text__icon' ); ?>
                          <?php ith_the_icon( 'close', 'btn-text__close' ); ?>
                        </span></a>

                      <div class="float-descr">
                        <button type="button" class="float-descr__close btn-close"><?php ith_the_icon( 'close' ); ?></button>
                        <h4 class="float-descr__title"><?php echo $descr['title']; ?></h4>
                        <div class="float-descr__wrap" data-simplebar data-simplebar-auto-hide="false">
					                <?php echo $descr['text'] ?: ''; ?>
                        </div>
                      </div>
		                <?php endif; ?>
                  </div>

                </div>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>

        </div>

        <img src="<?php echo THEME_URL; ?>/images/general/star-2.svg" class="parallax parallax-3" alt="">

      </section>

    <?php elseif( get_row_layout() == 'price' ): ?>

      <section class="price" id="price">
        <div class="container">
          <div class="section-head text-center">
            <?php $title = get_sub_field( 'title' );
            $descr = get_sub_field( 'descr' );
            if ($title): ?>
              <h2 class="section-title"><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if ($descr): ?>
              <p class="section-descr"><?php echo $descr; ?></p>
            <?php endif; ?>
          </div>

          <?php if (have_rows( 'list' )): ?>
            <div class="price-list">
              <?php while (have_rows( 'list' )): the_row(); ?>
                <div class="price-list__item">
                  <p class="price-list__name">
                    <?php echo wp_get_attachment_image( get_sub_field( 'icon' ) ); ?>
                    <span><?php the_sub_field( 'name' ); ?></span>
                  </p>
                  <div class="price-list__inner">
                    <div class="price-list__row price-list__row--price" data-title="Базовая стоимость"><div><?php echo get_sub_field( 'base_price' ) ?: '—'; ?></div></div>
                    <div class="price-list__row" data-title="Ежегодный взнос"><div><?php echo get_sub_field( 'fee' ) ?: '—'; ?></div></div>
                    <div class="price-list__row" data-title="Питание четырехразовое"><div><?php echo get_sub_field( 'meals' ) ?: '—'; ?></div></div>
                    <div class="price-list__row" data-title="Скидка семьям с 2-мя и более детьми"><div><?php echo get_sub_field( 'discount' ) ?: '—'; ?></div></div>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </div>

        <img src="<?php echo THEME_URL; ?>/images/general/star-2.svg" class="parallax parallax-4" alt="">
        <img src="<?php echo THEME_URL; ?>/images/general/star.svg" class="parallax parallax-5" alt="">

      </section>

    <?php elseif( get_row_layout() == 'instagram' ): ?>

      <section class="instagram">
        <div class="container">
          <div class="row">
            <div class="instagram__left">
              <img src="<?php echo THEME_URL; ?>/images/general/instagram.svg" class="instagram__icon" alt="">

              <div class="section-head">
                <h2 class="section-title"><?php the_sub_field( 'title' ); ?></h2>
                <p class="section-descr"><?php the_sub_field( 'descr' ); ?></p>
              </div>

              <?php $insta_link = get_sub_field( 'insta_link' );
              if ($insta_link): ?>
                <a href="<?php echo esc_url( $insta_link ); ?>" class="instagram__link" target="_blank">Мы в Instagram</a>
              <?php endif; ?>
            </div>
            <div class="instagram__right">
              <div class="instagram-photos">
                <img src="<?php echo THEME_URL; ?>/images/general/insta-1.jpg" alt="">
                <img src="<?php echo THEME_URL; ?>/images/general/insta-2.jpg" alt="">
                <img src="<?php echo THEME_URL; ?>/images/general/insta-3.jpg" alt="">
                <img src="<?php echo THEME_URL; ?>/images/general/insta-4.jpg" alt="">
              </div>
            </div>
          </div>

          <?php $insta_link = get_sub_field( 'insta_link' );
          if ($insta_link): ?>
          <div class="text-center">
            <a href="<?php echo esc_url( $insta_link ); ?>" class="instagram__link instagram__link-bottom" target="_blank">Мы в Instagram</a>
          </div>
          <?php endif; ?>
        </div>

        <img src="<?php echo THEME_URL; ?>/images/general/star-3.svg" class="parallax parallax-6" alt="">

      </section>

    <?php elseif( get_row_layout() == 'contact' ): ?>

      <section class="contact" id="contact">
        <div id="contact-map" class="contact__map"></div>
        <div class="container">
          <div class="contact__wrap">
            <?php
            $title = get_sub_field( 'title' );
            $address = get_sub_field( 'address' );
            $phone = get_sub_field( 'phone' );
            $email = get_sub_field( 'e-mail' );
            $whatsapp = get_sub_field( 'whatsapp' );
            $insta = get_sub_field( 'instagram' );

            if ($title): ?>
              <h2 class="section-title"><?php echo $title; ?></h2>
            <?php endif; ?>
            <?php if ($address): ?>
              <div class="contact__item contact__item--address">
                <?php ith_the_icon( 'location' ); ?>
                <?php echo $address; ?>
              </div>
            <?php endif; ?>
            <?php if ($phone): ?>
              <div class="contact__item contact__item--phone">
                <?php ith_the_icon( 'phone' ); ?>
                <a href="<?php echo preg_replace( '![^0-9/+]+!', '', $phone ); ?>"><?php echo $phone; ?></a>
              </div>
            <?php endif; ?>
            <?php if ($email): ?>
              <div class="contact__item contact__item--email">
                <?php ith_the_icon( 'email' ); ?>
                <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
              </div>
            <?php endif; ?>

            <?php if ($whatsapp || $insta): ?>
              <div class="contact__social">
                <?php if ($whatsapp): ?>
                  <a href="<?php echo esc_url( $whatsapp ); ?>" class="contact__social-whatsapp">WhatsApp</a>
                <?php endif; ?>
                <?php if ($insta): ?>
                  <a href="<?php echo esc_url( $insta ); ?>" class="contact__social-insta">Instagram</a>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <script>
          var myMap;
          function init() {
            <?php $location = get_sub_field( 'location' ); ?>
            var locations = [<?php echo (float) $location['lat']; ?>, <?php echo (float) $location['lng']; ?>];

            myMap = new ymaps.Map('contact-map', {
              center: locations,
              controls: [],
              zoom: 16
            });

            myMap.behaviors.disable('scrollZoom');

            myPlacemark = new ymaps.Placemark(locations);

            myMap.geoObjects.add(myPlacemark);
          }
        </script>
        <script async defer src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&onload=init"></script>
      </section>

    <?php endif;
  endwhile;
endif;
?>

<?php get_footer();