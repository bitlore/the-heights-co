<?php

$titleString = get_the_title();
$titleID = strtolower($titleString);
$class = get_field('class');
$lineage = get_field('lineage');
$source = get_field('source');

$imageSrc = get_field('strain_image')['url'];
$breeder = get_field('breeder');
$thc = get_field('thc');
$terpines = get_field('prominent_terpines');
$aromas = get_field('aromas');
$harvest_date = get_field('harvest_date');
$labs_url = get_field('link_to_lab_results');
$available = get_field('available');

$available_date = get_field('available_date');

?>

<section id="<?php echo $titleID; ?>" class="single-strain coming-soon section-top-padding text-center">
    <div class="grid-x grid-padding-x">
        <div class="strain-head  small-12 cell">
            <h3 class="soon-title"><?php echo the_title(); ?></h3>
            <?php if(!empty($available_date)) { ?>
                <h5>AVAILABLE <span>|</span> <?php echo $available_date; ?></h5>
            <?php } ?>
        </div>
    </div>
    <div class="more-info grid-x grid-padding-x">
        <ul class="accordion small-12 cell" data-accordion data-allow-all-closed="true">
          <li class="accordion-item" data-accordion-item>
            <a href="#" class="accordion-title">MORE INFO
                <svg width="28px" height="18px" viewBox="0 0 28 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>Right Arrow</title>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="arrow" transform="translate(1.000000, 2.000000)" stroke="#CFD2D3" stroke-width="3">
                            <path d="M0.5,6.98662024 L12.3483915,6.98662024" id="Line" stroke-linecap="square"></path>
                            <polygon id="Triangle" transform="translate(17.714773, 7.033327) rotate(90.000000) translate(-17.714773, -7.033327) " points="17.7147735 1.66694453 23.7610308 12.3997085 11.6685162 12.3997085"></polygon>
                        </g>
                    </g>
                </svg>
            </a>
            <div class="accordion-content grid-x" data-tab-content style="display: none;" data-equalizer data-equalize-on="medium">
                <ul class="details top-level display-flex justify-center">
                    <?php if(!empty($lineage)) { ?>
                        <li>
                            <p class="label">LINEAGE</p>
                            <div class="item display-flex">
                                <img class="detail-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-lineage.svg" /><span><?php echo $lineage; ?></span>
                            </div>
                        </li>
                    <?php } ?>
                    <?php if(!empty($breeder)) { ?>
                        <li>
                            <p class="label">BREEDER</p>
                            <div class="item display-flex">
                                <img class="detail-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-breeder.svg" /><span><?php echo $breeder; ?></span>
                            </div>
                        </li>
                    <?php } ?>
                    <?php if(!empty($source)) { ?>
                        <li>
                            <p class="label">SOURCE</p>
                            <div class="item display-flex">
                                <img class="detail-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-source.svg" /><span><?php echo $source; ?></span>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
                <?php if (!empty($imageSrc)) { ?>
                    <a data-equalizer-watch class="gallery-link small-12 medium-5 cell" href="<?php echo get_site_url(); ?>/gallery">
                        <img class="strain-image" src="<?php echo $imageSrc ?>" alt="Strain Image">
                    </a>
                <?php } else {
                    $opacity = get_field('fallback_opacity', 'options');
                    $opacityDecimal = $opacity / 100;
                    ?>
                    <div data-equalizer-watch class=" small-12 medium-5 cell fallback-cell display-flex justify-center">
                        <img style="opacity: <?php echo $opacityDecimal ?>;" class="strain-image fallback" src="<?php echo get_field('strain_fallback_image', 'options')['url']; ?>" alt="Strain Image">
                    </div>
                <?php } ?>
                <ul data-equalizer-watch class="details low-level small-12 medium-7 large-5 cell">
                    <div class="mobile-details">
                        <?php if(!empty($lineage)) { ?>
                            <li>
                                <p class="label">LINEAGE</p>
                                <div class="item display-flex">
                                    <img class="detail-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-lineage.svg" /><span><?php echo $lineage; ?></span>
                                </div>
                            </li>
                        <?php } ?>
                        <?php if(!empty($breeder)) { ?>
                            <li>
                                <p class="label">BREEDER</p>
                                <div class="item display-flex">
                                    <img class="detail-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-breeder.svg" /><span><?php echo $breeder; ?></span>
                                </div>
                            </li>
                        <?php } ?>
                        <?php if(!empty($source)) { ?>
                            <li>
                                <p class="label">SOURCE</p>
                                <div class="item display-flex">
                                    <img class="detail-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-source.svg" /><span><?php echo $source; ?></span>
                                </div>
                            </li>
                        <?php } ?>
                    </div>
                    <?php if(!empty($class)) { ?>
                        <li>
                            <p class="label">CLASS</p>
                            <div class="item display-flex">
                                <img class="detail-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-class.svg" /><span><?php echo $class; ?></span>
                            </div>
                        </li>
                    <?php } ?>
                  <?php if(!empty($thc)) { ?>
                      <li>
                          <p class="label">THC</p>
                          <div class="item display-flex">
                              <img class="detail-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-thc.svg" /><span><?php echo $thc; ?></span>
                          </div>
                      </li>
                  <?php } ?>
                  <?php if(!empty($terpines)) { ?>
                      <li>
                          <p class="label">PROMINENT TERPINES</p>
                          <div class="item display-flex">
                            <img class="detail-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-terpines.svg" /><span><?php echo $terpines; ?></span>
                          </div>
                      </li>
                  <?php } ?>
                  <?php if(!empty($aromas)) { ?>
                      <li>
                          <p class="label">AROMAS</p>
                          <div class="item display-flex">
                            <img class="detail-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-aromas.svg" /><span><?php echo $aromas; ?></span>
                          </div>
                      </li>
                  <?php } ?>
              </ul>
              <div data-equalizer-watch class="action-items small-12 medium-12 large-2 cell">
                  <?php if(!empty($harvest_date)) { ?>
                      <div class="harvest">
                          <p>HARVEST DATE<span class="tiny">:</span></p>
                          <h4><?php echo $harvest_date; ?></h4>
                      </div>
                  <?php } ?>
                  <?php if(!empty($labs_url)) { ?>
                      <a class="labs" href="<?php echo $labs_url; ?>" target="blank">LAB RESULTS ></a>
                  <?php } ?>
              </div>
            </div>
          </li>
        </ul>
    </div>
</section>
