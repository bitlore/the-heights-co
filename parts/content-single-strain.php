<?php

$iconSrc = get_field('strain_icon')['url'];
$description = get_field('description');
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

?>

<section class="single-strain section-top-padding text-center">
    <div class="strain-head grid-x grid-padding-x">
        <div class="small-12 cell">
            <?php if (!empty($iconSrc)) { ?>
                <img class="strain-icon" src="<?php echo $iconSrc; ?>" alt="<?php echo the_title(); ?> Icon">
            <?php } ?>
            <h3><?php echo the_title(); ?></h3>
            <?php if (!empty($description)) { ?>
                <p class="teaser"><?php echo $description; ?></p>
            <?php } ?>
            <ul class="details top-level display-flex justify-center">
                <?php if(!empty($class)) { ?>
                    <li>
                        <p class="label">CLASS</p>
                        <div class="item display-flex">
                            <img class="detail-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-class.svg" /><span><?php echo $class; ?></span>
                        </div>
                    </li>
                <?php } ?>
                <?php if(!empty($lineage)) { ?>
                    <li>
                        <p class="label">LINEAGE</p>
                        <div class="item display-flex">
                            <img class="detail-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-lineage.svg" /><span><?php echo $lineage; ?></span>
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
        </div>
    </div>
    <div class="more-info grid-x grid-padding-x">
        <ul class="accordion small-12 cell" data-accordion data-allow-all-closed="true">
          <li class="accordion-item" data-accordion-item>
            <a href="#" class="accordion-title">MORE INFO</a>
            <div class="accordion-content grid-x" data-tab-content style="display: none;" data-equalizer data-equalize-on="medium">
                <?php if (!empty($imageSrc)) { ?>
                    <a data-equalizer-watch class="gallery-link small-12 medium-5 cell" href="<?php echo get_site_url(); ?>/gallery"><div data-equalizer-watch class="bg-image strain-image" style="background-image: url('<?php echo $imageSrc ?>');"></div>
                    </a>
                <?php } ?>
                <ul data-equalizer-watch class="details low-level small-12 medium-7 large-5 cell">
                    <div class="mobile-details">
                        <?php if(!empty($class)) { ?>
                            <li>
                                <p class="label">CLASS</p>
                                <div class="item display-flex">
                                    <img class="detail-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-class.svg" /><span><?php echo $class; ?></span>
                                </div>
                            </li>
                        <?php } ?>
                        <?php if(!empty($lineage)) { ?>
                            <li>
                                <p class="label">LINEAGE</p>
                                <div class="item display-flex">
                                    <img class="detail-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-lineage.svg" /><span><?php echo $lineage; ?></span>
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
                  <?php if(!empty($breeder)) { ?>
                      <li>
                          <p class="label">BREEDER</p>
                          <div class="item display-flex">
                              <img class="detail-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-breeder.svg" /><span><?php echo $breeder; ?></span>
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
                  <a class="order-link" href="<?php echo get_site_url(); ?>/order">ORDER ></a>
              </div>
            </div>
          </li>
        </ul>
    </div>
</section>
