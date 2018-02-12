	<!-- my team -->
<?php		
// global $wp_customize;

$violet_ourteam_title = get_theme_mod('violet_ourteam_title',__('Our Team','violet'));
$violet_ourteam_subtitle = get_theme_mod('violet_ourteam_subtitle',__('Prove that you have real people working for you, with some nice looking profile pictures and links to social media.','violet'));

?>
    <!-- my team -->
    <section id="team" class="teams section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="title text-center">
                        <?php if( !empty($violet_ourteam_title) ):
                        echo '<h2 class="wow fadeInUp">'.wp_kses_post( $violet_ourteam_title ).'</h2>';
                        endif; ?>
                        <?php if( !empty($violet_ourteam_subtitle) ):
                        echo '<div class="wow fadeInUp section-s-t">'.wp_kses_post( $violet_ourteam_subtitle ).'</div>';
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
            
            
            <?php $args = array( 'post_type' => 'team');
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
                    $post_id = get_the_ID();
                    $post_custom = get_post_custom($post_id);
                    $member_name = $post_custom["team_name"][0];
                    $member_position = $post_custom["team_position"][0];

                    $facebook = $post_custom["facebook"][0];
                    $twitter = $post_custom["twitter"][0];
                    $linkedin = $post_custom["linkedin"][0];
                    $github = $post_custom["github"][0];

                    $skill_1_name = $post_custom["skill_1_name"][0];
                    $skill_1_percent = $post_custom["skill_1_percent"][0];

                    $skill_2_name = $post_custom["skill_2_name"][0];
                    $skill_2_percent = $post_custom["skill_2_percent"][0];

                    $skill_3_name = $post_custom["skill_3_name"][0];
                    $skill_3_percent = $post_custom["skill_3_percent"][0];

                    $skills = array(
                            array($skill_1_name,$skill_1_percent),
                            array($skill_2_name,$skill_2_percent),
                            array($skill_3_name,$skill_3_percent)
                        ); ?>
          

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="member">
                        <div class="member-profile">
                            
                            
            <?php
                if ( has_post_thumbnail() ) {
                    $member_photo = wp_get_attachment_url( get_post_thumbnail_id() );?>
                    <div class="member-photo" style="background-image: url(<?php echo $member_photo;?>);"></div>

            <?php }else{
                echo '<div class="member-photo"></div>';
                } ?>
                    
                            <div class="name_job">
                                <h4 class="wow fadeInUp"><?php echo $member_name; ?></h4>
                                <p class="wow fadeInUp"><?php echo $member_position; ?></p>
                            </div>
                        </div>
                        <div class="member-hover animated zoomIn">
                            <div class="full-profile">
                                <div class="name_job">
                                    <h4><?php echo $member_name; ?></h4>
                                    <p><?php echo $member_position; ?></p>
                                </div>

                            <?php for ($i=0; $i <= 2; $i++) {
                                $m_sk_nm = $skills[$i][0];
                                $m_sk_pr = $skills[$i][1];
                                if ($m_sk_pr !='') {
                             ?>
                                <div class="skill">
                                    <div class="name"><?php echo $m_sk_nm; ?></div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $m_sk_pr; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $m_sk_pr; ?>%";>
                                        <div class="progress_label">
                                        <?php
                                            if($m_sk_pr>79){
                                                echo '<span class="progress_percent top">'.$m_sk_pr.'%</span>';
                                            }else{
                                                echo '<span class="progress_percent">'.$m_sk_pr.'%</span>';
                                            }
                                        ?>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            <?php }} ?>
                            </div>
                            <div class="footer"><hr/>
                                <ul class="member-social">
                                    <li><a href="<?php echo $facebook; ?>" target="_blank"><i class="fa fa-facebook">&nbsp;</i></a></li>
                                    <li><a href="<?php echo $twitter; ?>" target="_blank"><i class="fa fa-twitter">&nbsp;</i></a></li>
                                    <li><a href="<?php echo $linkedin; ?>" target="_blank"><i class="fa fa-linkedin">&nbsp;</i></a></li>
                                    <li><a href="<?php echo $github; ?>" target="_blank"><i class="fa fa-github">&nbsp;</i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile;?>

            </div>
        </div>
    </section>